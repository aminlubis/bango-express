<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_complaintment extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'shipment/T_complaintment');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_complaintment_model');
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
        $this->load->view('T_complaintment/index', $data);
    }

    public function form($id='')
    {
        /*if id is not null then will show form edit*/
        if( $id != '' ){
            /*breadcrumbs for edit*/
            $this->breadcrumbs->push('Edit '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
            /*get value by id*/
            $data['value'] = $this->T_complaintment_model->get_by_id($id);
            /*initialize flag for form*/
            $data['flag'] = "update";
        }else{
            /*breadcrumbs for create or add row*/
            $this->breadcrumbs->push('Add '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/form');
            /*initialize flag for form add*/
            $data['flag'] = "create";
        }
        // echo '<pre>';print_r($data);die;
        /*title header*/
        $data['title'] = $this->title;
        /*show breadcrumbs*/
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_complaintment/form', $data);
    }
    /*function for view data only*/
    public function show($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_complaintment_model->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_complaintment/form', $data);
    }

    public function print_preview($id)
    {
        /*breadcrumbs for view*/
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_complaintment_model->get_by_id($id);
        $data['title'] = $this->title;
        $data['flag'] = "read";
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        /*load form view*/
        $this->load->view('T_complaintment/print_preview', $data);
    }

    public function get_detail( $id )
    {
        $data = array();
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_complaintment_model->get_by_id( $id );
        $data['log'] = $this->T_complaintment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $html = $this->load->view('T_complaintment/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function detail( $id )
    {
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_complaintment/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        $data = array(
            'title' => $this->title,
            'breadcrumbs' => $this->breadcrumbs->show()
        );
        
        $data['value'] = $this->T_complaintment_model->get_by_id( $id );
        $data['log'] = $this->T_complaintment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $this->load->view('T_complaintment/detail_form', $data);      
    }

    public function preview_resi( $id )
    {
        $data['app'] = $this->db->get_where('tmp_profile_app', array('id' => 1))->row();
        $data['value'] = $this->T_complaintment_model->get_by_id( $id );
        $data['log'] = $this->T_complaintment_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $this->load->view('T_complaintment/preview_resi', $data);      
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_complaintment_model->get_datatables();
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
            // $row[] = '<div class="center"><div class="btn-group">
            //             <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">
            //                 <span class="ace-icon fa fa-caret-down icon-on-right"></span>
            //             </button>
            //             <ul class="dropdown-menu dropdown-inverse">
            //                 <li>'.$this->authuser->show_button('shipment/T_complaintment','R',$row_list->id,67).'</li>
            //                 <li>'.$this->authuser->show_button('shipment/T_complaintment','U',$row_list->id,67).'</li>
            //                 <li>'.$this->authuser->show_button('shipment/T_complaintment','D',$row_list->id,6).'</li>
            //             </ul>
            //           </div></div>';
            $row[] = '<a href="#" onclick="getMenu('."'shipment/T_complaintment/detail/".$row_list->id."'".')"><b>'.$row_list->no_order.'</b></a>';
            $row[] = $this->tanggal->formatDateTime($row_list->tgl_order);
            $row[] = strtoupper($row_list->nama_pengirim);
            // $row[] = $row_list->tlp_pengirim;
            $row[] = $row_list->nama_jenis_barang;
            // $row[] = $row_list->jumlah_brg;
            // $row[] = $row_list->note_pengirim;
            // $row[] = number_format($row_list->tarif);
            $row[] = $this->master->get_status_order($row_list->status_proses);
            $row[] = ($row_list->is_active == 'Y')?'<span style="font-weight: bold; color: green">on process..</span>':'<span style="font-weight: bold; color: red">canceled</span>';

            $row[] = '<div class="center">
                    <a title="pickup order" href="#" class="btn btn-xs btn-danger" onclick="getMenu('."'transaksi/T_pickup_order/form/".$row_list->id."'".')"> Complain </a>
                    </div>'; 
                      

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_complaintment_model->count_all(),
                        "recordsFiltered" => $this->T_complaintment_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function process()
    {
        
        $this->load->library('form_validation');
        $val = $this->form_validation;
        
        
        $val->set_rules('nama_pengirim', 'Nama Pengirim', 'trim|required');
        $val->set_rules('telp_pengirim', 'No Telp Pengirim', 'trim|required');
        $val->set_rules('alamat_pengirim', 'Alamat Pengirim', 'trim|required');
        $val->set_rules('provinsiHiddenPengirim', 'Provinsi Pengirim', 'trim|required');
        $val->set_rules('kotaHiddenPengirim', 'Kota Pengirim', 'trim|required');
        $val->set_rules('kecamatanHiddenPengirim', 'Kecamatan Pengirim', 'trim|required');
        $val->set_rules('area_pengirim', 'Kelurahan Pengirim', 'trim|required');

        $val->set_rules('nama_penerima', 'Nama Penerima', 'trim|required');
        $val->set_rules('telp_penerima', 'No Telp Penerima', 'trim|required');
        $val->set_rules('alamat_penerima', 'Alamat Penerima', 'trim|required');
        $val->set_rules('provinsiHiddenPenerima', 'Provinsi Penerima', 'trim|required');
        $val->set_rules('kotaHiddenPenerima', 'Kota Penerima', 'trim|required');
        $val->set_rules('kecamatanHiddenPenerima', 'Kecamatan Penerima', 'trim|required');
        $val->set_rules('area_penerima', 'Kelurahan Penerima', 'trim|required');

        $val->set_rules('jenis_brg', 'Jenis Barang', 'trim|required');
        $val->set_rules('kategori_brg', 'Kategori Barang', 'trim|required');
        $val->set_rules('berat_kg', 'Berat', 'trim|required');
        $val->set_rules('luas_volume', 'Luas Volume (P x L x T)', 'trim|required');
        $val->set_rules('jumlah_brg', 'Jumlah Barang', 'trim|required');
        $val->set_rules('note_pengirim', 'Catatan', 'trim|required');

        $val->set_rules('jenis_pengiriman', 'Kelurahan Penerima', 'trim|required');
        $val->set_rules('metode_pembayaran', 'Kelurahan Penerima', 'trim|required');
        $val->set_rules('tarif', 'Kelurahan Penerima', 'trim|required');


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
                'nama_pengirim' => $this->regex->_genRegex( $val->set_value('nama_pengirim'), 'RGXQSL' ),
                'tlp_pengirim' => $this->regex->_genRegex( $val->set_value('telp_pengirim'), 'RGXQSL' ),
                'alamat_pengirim' => $this->regex->_genRegex( $val->set_value('alamat_pengirim'), 'RGXQSL' ),
                'area_pengirim' => $this->regex->_genRegex( $val->set_value('area_pengirim'), 'RGXQSL' ),

                'nama_penerima' => $this->regex->_genRegex( $val->set_value('nama_penerima'), 'RGXQSL' ),
                'tlp_penerima' => $this->regex->_genRegex( $val->set_value('telp_penerima'), 'RGXQSL' ),
                'alamat_penerima' => $this->regex->_genRegex( $val->set_value('alamat_penerima'), 'RGXQSL' ),
                'area_tujuan' => $this->regex->_genRegex( $val->set_value('area_penerima'), 'RGXQSL' ),

                'jenis_brg' => $this->regex->_genRegex( $val->set_value('jenis_brg'), 'RGXQSL' ),
                'kategori_brg' => $this->regex->_genRegex( $val->set_value('kategori_brg'), 'RGXQSL' ),
                'berat_kg' => $this->regex->_genRegex( $val->set_value('berat_kg'), 'RGXQSL' ),
                'luas_volume' => $this->regex->_genRegex( $val->set_value('luas_volume'), 'RGXQSL' ),
                'jumlah_brg' => $this->regex->_genRegex( $val->set_value('jumlah_brg'), 'RGXQSL' ),
                'note_pengirim' => $this->regex->_genRegex( $val->set_value('note_pengirim'), 'RGXQSL' ),

                'jenis_pengiriman' => $this->regex->_genRegex( $val->set_value('jenis_pengiriman'), 'RGXQSL' ),
                'metode_pembayaran' => $this->regex->_genRegex( $val->set_value('metode_pembayaran'), 'RGXQSL' ),
                'tarif' => $this->regex->_genRegex( $val->set_value('tarif'), 'RGXQSL' ),
                'user_id' => $this->regex->_genRegex( $this->session->userdata('user')->user_id, 'RGXINT' ),
                'hub_id' => $this->regex->_genRegex( $this->session->userdata('user')->hub_id, 'RGXINT' ),
                'is_active' => $this->regex->_genRegex( 'Y', 'RGXQSL' ),
            );

            // echo '<pre>'; print_r($dataexc);die;
            if($id==0){
                // create no order
                $dataexc['tgl_order'] = date('Y-m-d H:i:s');
                $dataexc['no_order'] = $this->master->get_no_order($dataexc);
                $dataexc['status_proses'] = 1;

                $dataexc['created_date'] = date('Y-m-d H:i:s');
                $dataexc['created_by'] = $this->session->userdata('user')->fullname;
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*save post data*/
                $this->T_complaintment_model->save($dataexc);
                $newId = $this->db->insert_id();
                // insert for the first log
                $this->db->insert('t_order_log', array('order_id' => $newId, 'status_order_id' => 1, 'keterangan' => 'Menunggu Pickup', 'is_active' => 'Y', 'created_date' => date('Y-m-d H:i:s'), 'created_by' => $this->session->userdata('user')->fullname ) );

            }else{
                $dataexc['updated_date'] = date('Y-m-d H:i:s');
                $dataexc['updated_by'] = $this->session->userdata('user')->fullname;
                /*update record*/
                $this->T_complaintment_model->update(array('id' => $id), $dataexc);
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
            if($this->T_complaintment_model->delete_by_id($toArray)){
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
