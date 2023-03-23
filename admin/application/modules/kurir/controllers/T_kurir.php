<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kurir extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'kurir/T_kurir');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_kurir_model');
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
        $this->load->view('T_kurir/index', $data);
    }

    public function form($id='')
    {
        /*if id is not null then will show form edit*/
        if( $id != '' ){
            /*breadcrumbs for edit*/
            $this->breadcrumbs->push('Edit '.strtolower($this->title).'', 'T_kurir/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
            /*get value by id*/
            $data['value'] = $this->T_kurir_model->get_by_id($id);
            /*initialize flag for form*/
            $data['flag'] = "update";
        }else{
            /*breadcrumbs for create or add row*/
            $this->breadcrumbs->push('Add '.strtolower($this->title).'', 'T_kurir/'.strtolower(get_class($this)).'/form');
            /*initialize flag for form add*/
            $data['flag'] = "create";
        }
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_kurir/form', $data);
    }
    /*function for view data only*/
    public function show($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_kurir/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_kurir_model->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_kurir/form', $data);
    }

    public function print_preview($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_kurir/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_kurir_model->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_kurir/print_preview', $data);
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_kurir_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $row_list) {
            $no++;
            $row = array();
            $row[] = '<div class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace" name="selected_id[]" value="'.$row_list->kurir_id.'"/>
                            <span class="lbl"></span>
                        </label>
                      </div>';
            $row[] = '<div class="center">
                        '.$this->authuser->show_button('kurir/T_kurir','R',$row_list->kurir_id,2).'
                        '.$this->authuser->show_button('kurir/T_kurir','U',$row_list->kurir_id,2).'
                        '.$this->authuser->show_button('kurir/T_kurir','D',$row_list->kurir_id,2).'
                      </div>'; 
                      // image user
            // $img = ($row_list->pas_foto)?base_url().PATH_IMG_DEFAULT.$row_list->pas_foto:base_url().'assets/img/avatar.png';
            // $row[] = '<div class="center"><img src="'.$img.'" width="80px"></div>';
            $row[] = '<div class="left">'.$row_list->kode.'</div>';
            $row[] = $row_list->nama;
            $row[] = $row_list->alamat_ktp;
            $row[] = $row_list->no_telp;
            // $row[] = $row_list->email;~
            $row[] = $this->tanggal->formatDate($row_list->tgl_lhr);
            $row[] = $row_list->is_active;
            $row[] = $this->logs->show_logs_record_datatable($row_list);

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_kurir_model->count_all(),
                        "recordsFiltered" => $this->T_kurir_model->count_filtered(),
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
        
        
        $val->set_rules('no_identitas', 'No Identitas', 'trim|required');
        $val->set_rules('nama', 'Nama', 'trim|required');
        $val->set_rules('tmp_lhr', 'Tempat Lahir', 'trim|required');
        $val->set_rules('tgl_lhr', 'Tanggal Lahir', 'trim|required');
        $val->set_rules('alamat', 'Alamat', 'trim|required');
        $val->set_rules('provinsiHidden', 'Provinsi', 'trim|required',array('required' => 'Provinsi tidak ditemukan'));
        $val->set_rules('kotaHidden', 'Kab/Kota', 'trim|required',array('required' => 'Kab/Kota tidak ditemukan'));
        $val->set_rules('kecamatanHidden', 'Kecamatan', 'trim|required',array('required' => 'Kecamatan tidak ditemukan'));
        $val->set_rules('no_telp', 'No. Telp', 'trim|required');
        $val->set_rules('email', 'Email', 'trim|required|valid_email', array('valid_email' => "Format \"%s\" tidak sesuai") );
        $val->set_rules('pendidikan_terakhir', 'Pendidikan', 'trim|required');
        $val->set_rules('agama', 'Agama', 'trim|required');

        

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
                'no_id' => $this->regex->_genRegex( $val->set_value('no_identitas') , 'RGXQSL'),
                'nama' => $this->regex->_genRegex( $val->set_value('nama') , 'RGXQSL'),
                'no_telp' => $this->regex->_genRegex( $val->set_value('no_telp') , 'RGXQSL'),
                'email' => $this->regex->_genRegex( $val->set_value('email') , 'RGXQSL'),
                'alamat_ktp' => $this->regex->_genRegex( $val->set_value('alamat') , 'RGXQSL'),
                'provinsi' => $this->regex->_genRegex( $val->set_value('provinsiHidden') , 'RGXQSL'),
                'kabkota' => $this->regex->_genRegex( $val->set_value('kotaHidden') , 'RGXQSL'),
                'kecamatan' => $this->regex->_genRegex( $val->set_value('kecamatanHidden') , 'RGXQSL'),
                'kabkota' => $this->regex->_genRegex( $val->set_value('kotaHidden') , 'RGXQSL'),
                'tmp_lhr' => $this->regex->_genRegex( $val->set_value('tmp_lhr') , 'RGXQSL'),
                'tgl_lhr' => $this->regex->_genRegex( $val->set_value('tgl_lhr') , 'RGXQSL'),
                'agama' => $this->regex->_genRegex( $val->set_value('agama') , 'RGXQSL'),
                'pendidikan_terakhir' => $this->regex->_genRegex( $val->set_value('pendidikan_terakhir') , 'RGXQSL'),
                'is_active' => $this->regex->_genRegex( 'N' , 'RGXQSL'),
            );

            if(isset($_FILES['file_identitas']['name'])){
                /*hapus dulu file yang lama*/
                if( $id != 0 ){
                    $file_ex = $this->T_kurir_model->get_by_id($id);
                    if ($file_ex->scan_identitas != NULL) {
                        unlink(PATH_IMG_DEFAULT.$file_ex->scan_identitas.'');
                    }
                }
                $dataexc['scan_identitas'] = $this->upload_file->doUpload('file_identitas', PATH_IMG_DEFAULT);
            }

            if(isset($_FILES['pas_foto']['name'])){
                /*hapus dulu file yang lama*/
                if( $id != 0 ){
                    $file_ex = $this->T_kurir_model->get_by_id($id);
                    if ($file_ex->pas_foto != NULL) {
                        unlink(PATH_IMG_DEFAULT.$file_ex->pas_foto.'');
                    }
                }
                $dataexc['pas_foto'] = $this->upload_file->doUpload('pas_foto', PATH_IMG_DEFAULT);
            }

            
            if($id==0){
                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = $this->session->userdata('user')->fullname;
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = json_encode(array('user_id' =>'register user', 'fullname' => $_POST['nama']));
                /*save post data*/
                $this->T_kurir_model->save($dataexc);
                $newId = $this->db->insert_id();
            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->T_kurir_model->update(array('kurir_id' => $id), $dataexc);
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
            if($this->T_kurir_model->delete_by_id($toArray)){
                $this->logs->save('t_invoice', $id, 'delete record', '', 'id');
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
