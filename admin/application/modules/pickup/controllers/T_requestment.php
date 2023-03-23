<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_requestment extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'pickup/T_requestment');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_requestment_model');
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
        $this->load->view('T_requestment/index', $data);
    }

    public function form($id='')
    {
        /*if id is not null then will show form edit*/
        if( $id != '' ){
            /*breadcrumbs for edit*/
            $this->breadcrumbs->push('Edit '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
            /*get value by id*/
            $data['value'] = $this->T_requestment_model->get_by_id($id);
            /*initialize flag for form*/
            $data['flag'] = "update";
        }else{
            /*breadcrumbs for create or add row*/
            $this->breadcrumbs->push('Add '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/form');
            /*initialize flag for form add*/
            $data['flag'] = "create";
        }
        // echo '<pre>';print_r($data);die;
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_requestment/form', $data);
    }
    /*function for view data only*/
    public function show($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_requestment_model->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_requestment/form', $data);
    }

    public function form_pickup($id)
    {
        /*if id is not null then will show form edit*/
       /*breadcrumbs for edit*/
       $this->breadcrumbs->push('Pick Up '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
       /*get value by id*/
       $data['value'] = $this->T_requestment_model->get_by_id($id);
       /*initialize flag for form*/
       $data['flag'] = "update";
        // echo '<pre>';print_r($data);die;
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_requestment/form_pickup', $data);
    }

    public function get_detail( $id )
    {
        $data = array();
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_requestment_model->get_by_id( $id );
        // $data['log'] = $this->T_requestment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $html = $this->load->view('T_requestment/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function detail( $id )
    {
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_requestment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        $data = array(
            'title' => $this->title,
            'breadcrumbs' => $this->breadcrumbs->show()
        );
        
        $data['value'] = $this->T_requestment_model->get_by_id( $id );
        $data['log'] = $this->T_requestment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $this->load->view('T_requestment/detail_form', $data);      
    }

    public function preview_resi( $id )
    {
        $data['app'] = $this->db->get_where('tmp_profile_app', array('id' => 1))->row();
        $data['value'] = $this->T_requestment_model->get_by_id( $id );
        $data['log'] = $this->T_requestment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $this->load->view('T_requestment/preview_resi', $data);      
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_requestment_model->get_datatables();
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
            
            $row[] = '<a href="#" onclick="getMenu('."'transaksi/T_create_order/detail/".$row_list->id."'".')"><b>'.strtoupper($row_list->code).'</b></a><br>'.$this->tanggal->formatDateTime($row_list->request_date);
            $row[] = strtoupper($row_list->name);
            $row[] = $row_list->pickup_location.'<br>'.$row_list->address_detail;
            $row[] = $row_list->telp;
            // $row[] = $row_list->qty;
            // $row[] = $row_list->note;
            
            // $row[] = ($row_list->is_active == 'Y')?'<span style="font-weight: bold; color: green">on process..</span>':'<span style="font-weight: bold; color: red">canceled</span>';

            if($row_list->pickup_log_id == NULL){
                $row[] = '<div class="center">
                        <a title="pickup order" href="#" class="btn btn-xs btn-primary" onclick="getMenu('."'pickup/T_requestment/form_pickup/".$row_list->id."'".')"> <i class="fa fa-truck"></i> Pickup </a>
                        </div>'; 
                $row[] = '<div class="center">
                '.$this->authuser->show_button('pickup/T_requestment','R',$row_list->id,68).'
                '.$this->authuser->show_button('pickup/T_requestment','U',$row_list->id,68).'
                '.$this->authuser->show_button('pickup/T_requestment','D',$row_list->id,9).'
                </div>';
            }else{
                $row[] = '<div class="center" style="font-size: 10px">'.$this->tanggal->formatDateTime($row_list->pickup_time).'</div>';
                $row[] = '<div class="center" style="font-size: 10px">'.$row_list->nama_kurir.'</div>';
            }

            if($row_list->pickup_log_id == NULL){
            
            }else{
                $row[] = '';
            }

                      

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_requestment_model->count_all(),
                        "recordsFiltered" => $this->T_requestment_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function process()
    {
        // echo '<pre>';print_r($_POST);die;
        $this->load->library('form_validation');
        $val = $this->form_validation;
        
        $val->set_rules('pickup_location', 'Pickup Location', 'trim|required');
        $val->set_rules('address_detail', 'Address Detail', 'trim|required');
        $val->set_rules('name', 'Sender Name', 'trim|required');
        $val->set_rules('telp', 'Phone', 'trim|required');
        $val->set_rules('city', 'Phone', 'trim|required');
        $val->set_rules('province', 'Phone', 'trim|required');
        $val->set_rules('postal_code', 'Phone', 'trim|required');
        $val->set_rules('latitude', 'Latitude', 'trim|required', array('required' => 'Unknown Location'));
        $val->set_rules('longitude', 'Longitude', 'trim|required', array('required' => 'Unknown Location'));
        $val->set_rules('item_type', 'Item Type', 'trim|required');
        $val->set_rules('qty', 'Qty', 'trim|required');
        $val->set_rules('note', 'Note', 'trim');
        $val->set_rules('is_fragile', 'Note', 'trim');


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
                'name' => $this->regex->_genRegex( $val->set_value('name'), 'RGXQSL' ),
                'telp' => $this->regex->_genRegex( $val->set_value('telp'), 'RGXQSL' ),
                'pickup_location' => $this->regex->_genRegex( $val->set_value('pickup_location'), 'RGXQSL' ),
                'address_detail' => $this->regex->_genRegex( $val->set_value('address_detail'), 'RGXQSL' ),
                'is_fragile' => $this->regex->_genRegex( $val->set_value('is_fragile'), 'RGXINT' ),
                'latitude' => $this->regex->_genRegex( $val->set_value('latitude'), 'RGXQSL' ),
                'longitude' => $this->regex->_genRegex( $val->set_value('longitude'), 'RGXQSL' ),
                'city' => $this->regex->_genRegex( $val->set_value('city'), 'RGXQSL' ),
                'province' => $this->regex->_genRegex( $val->set_value('province'), 'RGXQSL' ),
                'postal_code' => $this->regex->_genRegex( $val->set_value('postal_code'), 'RGXQSL' ),
                'item_type' => $this->regex->_genRegex( $val->set_value('item_type'), 'RGXQSL' ),
                'qty' => $this->regex->_genRegex( $val->set_value('qty'), 'RGXINT' ),
                'is_fragile' => $this->regex->_genRegex( $val->set_value('is_fragile'), 'RGXQSL' ),
                'note' => $this->regex->_genRegex( $val->set_value('note'), 'RGXQSL' ),
                'user_id' => $this->regex->_genRegex( $this->session->userdata('user')->user_id, 'RGXINT' ),
                'is_active' => $this->regex->_genRegex( 'Y', 'RGXINT' ),
            );

            // echo '<pre>'; print_r($dataexc);die;
            if($id==0){
                // create no order
                $dataexc['request_date'] = date('Y-m-d H:i:s');
                $dataexc['code'] = $this->master->get_no_request($dataexc);

                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = $this->session->userdata('user')->fullname;
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*save post data*/
                $this->T_requestment_model->save($dataexc);
                $newId = $this->db->insert_id();

            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->T_requestment_model->update(array('id' => $id), $dataexc);
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

    public function process_pickup()
    {
        // print_r($_POST);die;
        $this->load->library('form_validation');
        $val = $this->form_validation;
        
        
        $val->set_rules('id', 'Order ID', 'trim|required');
        $val->set_rules('kurir_id', 'Courier', 'trim|required');
        $val->set_rules('hub_id', 'Hub', 'trim|required');
        $val->set_rules('catatan', 'Note', 'trim');

        

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
                'request_id' => $this->regex->_genRegex( $id , 'RGXINT'),
                'pickup_time' => $this->regex->_genRegex( date('Y-m-d H:i:s') , 'RGXQSL'),
                'tipe_kirim' => $this->regex->_genRegex( 2 , 'RGXINT'),
                'hub_tujuan' => $this->regex->_genRegex( $val->set_value('hub_id') , 'RGXINT'),
                'note' => $this->regex->_genRegex( $val->set_value('catatan') , 'RGXQSL'),
            );

            if(isset($_FILES['file_image']['name'])){
                /*hapus dulu file yang lama*/
                if( $id != 0 ){
                    $file_ex = $this->t_requestment->get_by_id($id);
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
                $this->db->insert('t_pickup_log', $dataexc);
                $newId = $this->db->insert_id();

                // update status telah diterima kurir
                $this->db->update('t_pickup_request', array('pickup_log_id' => $newId), array('id' => $id) );
                
            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->db->update('t_pickup_log', $dataexc, array('order_id' => $id));
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
            if($this->T_requestment_model->delete_by_id($toArray)){
                $this->logs->save('t_order', $id, 'delete record', '', 'id');
                echo json_encode(array('status' => 200, 'message' => 'Proses Hapus Data Berhasil Dilakukan'));

            }else{
                echo json_encode(array('status' => 301, 'message' => 'Maaf Proses Hapus Data Gagal Dilakukan'));
            }
        }else{
            echo json_encode(array('status' => 301, 'message' => 'Tidak ada item yang dipilih'));
        }
        
    }


}

/* End of file example.php */
/* Location: ./application/functiones/example/controllers/example.php */
