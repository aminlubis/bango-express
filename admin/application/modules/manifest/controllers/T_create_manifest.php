<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_create_manifest extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'manifest/T_create_manifest');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_create_manifest_model');
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
        $this->load->view('T_create_manifest/index', $data);
    }

    public function form( $kode_wilayah )
    {
        /*breadcrumbs for edit*/
        $this->breadcrumbs->push('Create Manifest '.strtolower($this->title).'', 'T_create_order/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$kode_wilayah);
        // echo '<pre>';print_r($data);die;
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['kode_wilayah'] = $kode_wilayah;
        $data['value'] = $this->T_create_manifest_model->get_by_kode_wilayah( $kode_wilayah );
        // echo '<pre>';print_r($data);die;
        $this->load->view('T_create_manifest/form', $data);      
    }

    public function preview_print( $kode_manifest )
    {
        $data['app'] = $this->db->get_where('tmp_profile_app', array('id' => 1))->row();
        $data['kode_manifest'] = $kode_manifest;
        $data['value'] = $this->T_create_manifest_model->get_by_kode_manifest( $kode_manifest );
        // echo '<pre>';print_r($data);die;
        $this->load->view('T_create_manifest/preview_print', $data);      
    }

    public function get_detail( $kode_wilayah )
    {
        $data = array();
        $data['kode_wilayah'] = $kode_wilayah;
        $data['value'] = $this->T_create_manifest_model->get_by_kode_wilayah( $kode_wilayah );
        // echo '<pre>';print_r($data);die;
        $html = $this->load->view('T_create_manifest/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_create_manifest_model->get_datatables();
        $getData = [];
        foreach($list as $row){
            $getData[$row->area_tujuan][] = $row;
        }
        $data = array();
        $no = $_POST['start'];
        foreach ($getData as $key_list=>$val_list) {
            $no++;
            $row = array();
            $row_list = isset($val_list[0])?$val_list[0]:[];
            $row[] = '<div class="center"><label class="pos-rel">
                        <input type="checkbox" class="ace" name="selected_id[]" value="'.$key_list.'"/>
                        <span class="lbl"></span>
                    </label></div>';
            $row[] = '';
            $row[] = $key_list;
            $row[] = $key_list;
            $row[] = strtoupper($row_list->kel_penerima);
            $row[] = count($getData[$key_list]);
            $row[] = '<div class="center"><a href="#" onclick="getMenu('."'manifest/T_create_manifest/form/".$key_list."?wil=".$row_list->kel_penerima."&jmlOrder=".count($getData[$key_list])."'".')" class="label label-primary"><i class="fa fa-edit"></i> Create Manifest </a></div>';
            $row[] = '<div class="center"><a href="#" class="label label-success"><i class="fa fa-print"></i> Print </a></div>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_create_manifest_model->count_all(),
                        "recordsFiltered" => $this->T_create_manifest_model->count_filtered(),
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
                
        $val->set_rules('kode_wilayah', 'Kode Wilayah', 'trim|required');
        $val->set_rules('kurir_id', 'Nama Kurir', 'trim|required');
        $val->set_rules('hub_id', 'Hub', 'trim|required');
        $val->set_rules('jumlah_order', 'Jumlah Order', 'trim|required');
        $val->set_rules('note', 'Keterangan', 'trim');

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
                'tgl_manifest' => $this->regex->_genRegex( date('Y-m-d H:i:s') , 'RGXQSL'),
                'kurir_id' => $this->regex->_genRegex( $val->set_value('kurir_id') , 'RGXINT'),
                'hub_id' => $this->regex->_genRegex( $val->set_value('hub_id') , 'RGXINT'),
                'jumlah_order' => $this->regex->_genRegex( $val->set_value('jumlah_order') , 'RGXINT'),
                'kode_wilayah_tujuan' => $this->regex->_genRegex( $val->set_value('kode_wilayah') , 'RGXQSL'),
                'note' => $this->regex->_genRegex( $val->set_value('catatan') , 'RGXQSL'),
            );

            if($id==0){

                $dataexc['kode_manifest'] = $this->master->get_kode_manifest($dataexc);
                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = $this->session->userdata('user')->fullname;
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*save post data*/
                $this->T_create_manifest_model->save('t_manifest', $dataexc);
                $newId = $this->db->insert_id();

            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->T_create_manifest_model->update('t_manifest', array('manifest_id' => $id), $dataexc);
                // print_r($this->db->last_query());die;
                $newId = $id;
            }
            // get hub
            $hub = $this->db->get_where('mst_hub', array('hub_id' => $dataexc['hub_id']) )->row();
            // uupdate manifest id ke tabel order id
            foreach($_POST['order_no'] as $row_post){
                // update status telah sampai di hub
                $this->db->update('t_order', array('manifest_id' =>$newId, 'status_proses' => 5), array('no_order' => $row_post)  );
                $order_dt = $this->db->get_where('t_order', array('no_order' =>$row_post) )->row();
                // save log
                $this->db->insert('t_order_log', array('order_id' => $order_dt->id, 'status_order_id' => 5, 'keterangan' => 'Sudah sampai di hub sortir ('.$hub->nama_hub.') pada '.$this->tanggal->formatDateTimeShort(date('Y-m-d H:i:s')).'', 'created_date' => date('Y-m-d H:i:s'), 'created_by' => $this->session->userdata('user')->fullname) );
                $this->db->trans_commit();
            }

            

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                echo json_encode(array('status' => 301, 'message' => 'Maaf Proses Gagal Dilakukan'));
            }
            else
            {

                $this->db->trans_commit();
                echo json_encode(array('status' => 200, 'message' => 'Proses Berhasil Dilakukan', 'manifest_kode' => $dataexc['kode_manifest']));
            }
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
