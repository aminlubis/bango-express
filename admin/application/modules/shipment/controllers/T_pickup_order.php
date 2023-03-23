<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pickup_order extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'transaksi/T_pickup_order');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_pickup_order_model');
        $this->load->model('T_pickup_order_model');
        /*enable profiler*/
        $this->output->enable_profiler(false);
        /*profile class*/
        $this->title = ($this->lib_menus->get_menu_by_class(get_class($this)))?$this->lib_menus->get_menu_by_class(get_class($this))->name : 'Title';
        
    }

    public function index() { 
        /*define variable data*/
        $data = array(
            'title' => $this->title,
            'breadcrumbs' => $this->breadcrumbs->show()
        );
        /*load view index*/
        $this->load->view('T_pickup_order/index', $data);
    }

    public function form($id='')
    {
        /*if id is not null then will show form edit*/
        if( $id != '' ){
            /*breadcrumbs for edit*/
            $this->breadcrumbs->push('Edit '.strtolower($this->title).'', 'T_pickup_order/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
            /*get value by id*/
            $data['value'] = $this->T_pickup_order_model->get_by_id($id);
            /*initialize flag for form*/
            $data['flag'] = "update";
        }

        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_pickup_order/form', $data);
    }

    public function get_detail( $id )
    {
        $data = array();
        $data['value'] = $this->T_pickup_order_model->get_by_id( $id );
        $html = $this->load->view('T_pickup_order/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_pickup_order_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $row_list) {
            $no++;
            $row = array();
            $row[] = '<div class="center"><label class="pos-rel">
                        <input type="checkbox" class="ace" name="selected_id[]" value="'.$row_list->id.'"/>
                        <span class="lbl"></span>
                    </label></div>';
            $row[] = '';
            $row[] = $row_list->id;
            $row[] = '<a href="#" onclick="getMenu('."'transaksi/T_create_order/detail/".$row_list->id."'".')"><b>'.$row_list->no_order.'</b></a>';
            $row[] = $this->tanggal->formatDateTime($row_list->tgl_order);
            $row[] = strtoupper($row_list->nama_pengirim);
            // $row[] = $row_list->tlp_pengirim;
            $row[] = $row_list->nama_jenis_barang;
            // $row[] = $row_list->jumlah_brg;
            // $row[] = $row_list->note_pengirim;
            // $row[] = number_format($row_list->tarif);
            $row[] = $this->master->get_status_order($row_list->status_proses);
            
            $row[] = ($row_list->is_active == 'Y')?'<span style="font-weight: bold; color: green">on process..</span>':'<span style="font-weight: bold; color: red">canceled</span>';

            if($row_list->is_active == 'Y'){
                if($row_list->pickup_log_id == null){
                    $row[] = '<div class="center">
                    <a title="pickup order" href="#" class="btn btn-xs btn-primary" onclick="getMenu('."'transaksi/T_pickup_order/form/".$row_list->id."'".')"> <i class="fa fa-truck"></i> Pickup </a>
                    </div>';    

                }else{
                    $row[] = '<div class="center">
                    <a title="pickup order" href="#" class="btn btn-xs btn-warning" onclick="getMenu('."'transaksi/T_pickup_order/form/".$row_list->id."'".')"> <i class="fa fa-undo"></i> Cancel Pickup </a>
                    </div>';    
                }
                
            }else{
                $row[] = '<div class="center">-</div>';
            }
                

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_pickup_order_model->count_all(),
                        "recordsFiltered" => $this->T_pickup_order_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function process()
    {
        // print_r($_POST);die;
        $this->load->library('form_validation');
        $val = $this->form_validation;
        
        
        $val->set_rules('id', 'Order ID', 'trim|required');
        $val->set_rules('kurir_id', 'Nama Kurir', 'trim|required');
        $val->set_rules('tipe_kirim', 'Tipe Kirim', 'trim|required');
        $val->set_rules('hub_id', 'Hub', ($_POST['tipe_kirim'] == 1) ? 'trim' : 'trim|required');
        $val->set_rules('catatan', 'Catatan', 'trim');

        

        $val->set_message('required', "Silahkan isi field \"%s\"");

        if ($val->run() == FALSE)
        {
            $val->set_error_delimiters('<div style="color:white">', '</div>');
            echo json_encode(array('status' => 301, 'message' => validation_errors()));
        }
        else
        {                       
            $this->db->trans_begin();
            $id = ($this->input->post('id'))?$this->input->post('id'):0;

            $dataexc = array(
                'kurir_id' => $this->regex->_genRegex( $val->set_value('kurir_id') , 'RGXINT'),
                'order_id' => $this->regex->_genRegex( $id , 'RGXINT'),
                'pickup_time' => $this->regex->_genRegex( date('Y-m-d H:i:s') , 'RGXQSL'),
                'tipe_kirim' => $this->regex->_genRegex( $val->set_value('tipe_kirim') , 'RGXINT'),
                'hub_tujuan' => $this->regex->_genRegex( $val->set_value('hub_id') , 'RGXINT'),
                'note' => $this->regex->_genRegex( $val->set_value('catatan') , 'RGXQSL'),
            );

            if(isset($_FILES['file_image']['name'])){
                /*hapus dulu file yang lama*/
                if( $id != 0 ){
                    $file_ex = $this->T_pickup_order_model->get_by_id($id);
                    if ($file_ex->file_image != NULL) {
                        unlink(PATH_IMG_DEFAULT.$file_ex->file_image.'');
                    }
                }
                $dataexc['file_image'] = $this->upload_file->doUpload('file_image', PATH_IMG_DEFAULT);
            }

            // cek pickup log
            $ex_dt = $this->db->get_where('t_pickup_log', array('order_id' => $id) )->num_rows();

            if($ex_dt==0){
                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = $this->session->userdata('user')->fullname;
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*save post data*/
                $this->T_pickup_order_model->save('t_pickup_log', $dataexc);
                $newId = $this->db->insert_id();

                // update status telah diterima kurir
                $this->db->update('t_order', array('status_proses' => 2), array('id' => $id) );
                // save log
                $this->db->insert('t_order_log', array('order_id' => $id, 'status_order_id' => 2, 'keterangan' => 'Sudah dipickup oleh kurir pada '.$this->tanggal->formatDateTimeShort(date('Y-m-d H:i:s')).'', 'created_date' => date('Y-m-d H:i:s'), 'created_by' => $this->session->userdata('user')->fullname) );

            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->T_pickup_order_model->update('t_pickup_log', array('order_id' => $id), $dataexc);
                // print_r($this->db->last_query());die;
                $newId = $id;
            }

            

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                echo json_encode(array('status' => 301, 'message' => 'Maaf Proses Gagal Dilakukan'));
            }
            else
            {

                $this->db->trans_commit();
                echo json_encode(array('status' => 200, 'message' => 'Proses Berhasil Dilakukan'));
            }
        }
    }

    public function delete()
    {
        $id=$this->input->post('ID')?$this->regex->_genRegex($this->input->post('ID',TRUE),'RGXQSL'):null;
        $toArray = explode(',',$id);
        if($id!=null){
            if($this->T_pickup_order_model->delete_by_id($toArray)){
                $this->logs->save('t_invoice', $id, 'delete record', '', 'id');
                echo json_encode(array('status' => 200, 'message' => 'Proses Hapus Data Berhasil Dilakukan'));

            }else{
                echo json_encode(array('status' => 301, 'message' => 'Maaf Proses Hapus Data Gagal Dilakukan'));
            }
        }else{
            echo json_encode(array('status' => 301, 'message' => 'Tidak ada item yang dipilih'));
        }
        
    }

    public function find_data()
    {   
        $output = array( "data" => http_build_query($_POST) . "\n" );
        echo json_encode($output);
    }


}

/* End of file example.php */
/* Location: ./application/functiones/example/controllers/example.php */
