<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_lokasi_hub extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'reference/T_lokasi_hub');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_lokasi_hub_model', 'T_lokasi_hub');
        /*enable profiler*/
        $this->output->enable_profiler(false);
        /*profile class*/
        $this->title = ($this->lib_menus->get_menu_by_class(get_class($this)))?$this->lib_menus->get_menu_by_class(get_class($this))->name : 'Title';

    }

    public function index() { 
        //echo '<pre>';print_r($this->session->all_userdata());
        /*define variable data*/
        $data = array(
            'title' => $this->title,
            'breadcrumbs' => $this->breadcrumbs->show(),
        );
        /*load view index*/
        $this->load->view('T_lokasi_hub/index', $data);
    }

    public function form($id='')
    {
        /*if id is not null then will show form edit*/
        if( $id != '' ){
            /*breadcrumbs for edit*/
            $this->breadcrumbs->push('Edit '.strtolower($this->title).'', 'T_lokasi_hub/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
            /*get value by id*/
            $data['value'] = $this->T_lokasi_hub->get_by_id($id);
            /*initialize flag for form*/
            $data['flag'] = "update";
        }else{
            /*breadcrumbs for create or add row*/
            $this->breadcrumbs->push('Add '.strtolower($this->title).'', 'T_lokasi_hub/'.strtolower(get_class($this)).'/form');
            /*initialize flag for form add*/
            $data['flag'] = "create";
        }
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_lokasi_hub/form', $data);
    }
    /*function for view data only*/
    public function show($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_lokasi_hub/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_lokasi_hub->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_lokasi_hub/form', $data);
    }


    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_lokasi_hub->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $row_list) {
            $no++;
            $row = array();
            $row[] = '<div class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace" name="selected_id[]" value="'.$row_list->hub_id.'"/>
                            <span class="lbl"></span>
                        </label>
                      </div>';
            $row[] = '<div class="center">
                        '.$this->authuser->show_button('reference/T_lokasi_hub','R',$row_list->hub_id,2).'
                        '.$this->authuser->show_button('reference/T_lokasi_hub','U',$row_list->hub_id,2).'
                        '.$this->authuser->show_button('reference/T_lokasi_hub','D',$row_list->hub_id,2).'
                      </div>'; 
            $row[] = '<div class="left">'.$row_list->kode_hub.'</div>';
            $row[] = strtoupper($row_list->nama_hub);
            $row[] = $row_list->alamat;
            $row[] = $row_list->no_telp;
            $row[] = $row_list->pic;
            $row[] = ($row_list->is_active == 'Y') ? '<div class="center"><span class="label label-sm label-success">Active</span></div>' : '<div class="center"><span class="label label-sm label-danger">Not active</span></div>';
            $row[] = $this->logs->show_logs_record_datatable($row_list);
                   
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_lokasi_hub->count_all(),
                        "recordsFiltered" => $this->T_lokasi_hub->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function process()
    {
       
        $this->load->library('form_validation');
        $val = $this->form_validation;
        $val->set_rules('nama_hub', 'Nama HUB', 'trim|required');
        $val->set_rules('pic', 'PIC', 'trim|required');
        $val->set_rules('alamat', 'Alamat', 'trim|required');
        $val->set_rules('no_telp', 'No Telp', 'trim|required');
        $val->set_rules('prov_id', 'Provinsi', 'trim|required');
        $val->set_rules('kab_id', 'Kab/Kota', 'trim|required');
        $val->set_rules('kec_id', 'Kecamatan', 'trim|required');
        $val->set_rules('kel_id', 'Kelurahan', 'trim|required');
        $val->set_rules('kode_pos', 'Kode POS', 'trim|required');

        $val->set_message('required', "Silahkan isi field \"%s\"");

        if ($val->run() == FALSE)
        {
            $val->set_error_delimiters('<div style="color:white">', '</div>');
            echo json_encode(array('status' => 301, 'message' => validation_errors()));
        }
        else
        {                       
            $this->db->trans_begin();
            $id = ($this->input->post('id'))?$this->regex->_genRegex($this->input->post('id'),'RGXINT'):0;

            $dataexc = array(
                'nama_hub' => $this->regex->_genRegex($val->set_value('nama_hub'), 'RGXQSL'),
                'pic' => $this->regex->_genRegex($val->set_value('pic'), 'RGXQSL'),
                'alamat' => $this->regex->_genRegex($val->set_value('alamat'), 'RGXQSL'),
                'no_telp' => $this->regex->_genRegex($val->set_value('no_telp'), 'RGXQSL'),
                'prov_id' => $this->regex->_genRegex($val->set_value('prov_id'), 'RGXQSL'),
                'kab_id' => $this->regex->_genRegex($val->set_value('kab_id'), 'RGXQSL'),
                'kec_id' => $this->regex->_genRegex($val->set_value('kec_id'), 'RGXQSL'),
                'kel_id' => $this->regex->_genRegex($val->set_value('kel_id'), 'RGXQSL'),
                'kode_pos' => $this->regex->_genRegex($val->set_value('kode_pos'), 'RGXQSL'),
                'is_active' => $this->regex->_genRegex($this->input->post('is_active'),'RGXAZ'),
            );
            //print_r($dataexc);die;
            if($id==0){
                $dataexc['kode_hub'] = $this->master->set_kode_hub($dataexc);
                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = json_encode(array('user_id' =>$this->regex->_genRegex($this->session->userdata('user')->user_id,'RGXINT'), 'fullname' => $this->regex->_genRegex($this->session->userdata('user')->fullname,'RGXQSL')));
                $newId = $this->T_lokasi_hub->save($dataexc);
                /*save logs*/
                $this->logs->save('mst_hub', $newId, 'insert new record on '.$this->title.' module', json_encode($dataexc),'hub_id');
            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = json_encode(array('user_id' =>$this->regex->_genRegex($this->session->userdata('user')->user_id,'RGXINT'), 'fullname' => $this->regex->_genRegex($this->session->userdata('user')->fullname,'RGXQSL')));
                /*update record*/
                $this->T_lokasi_hub->update(array('hub_id' => $id), $dataexc);
                $newId = $id;
                 /*save logs*/
                $this->logs->save('mst_hub', $newId, 'update record on '.$this->title.' module', json_encode($dataexc),'hub_id');
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
            if($this->T_lokasi_hub->delete_by_id($toArray)){
                $this->logs->save('mst_hub', $id, 'delete record', '', 'hub_id');
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
/* Location: ./application/modules/example/controllers/example.php */
