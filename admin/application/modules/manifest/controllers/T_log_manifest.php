<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_log_manifest extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'transaksi/T_log_manifest');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_log_manifest_model');
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
        $this->load->view('T_log_manifest/index', $data);
    }

    public function get_detail( $kode_manifest )
    {
        $data = array();
        $data['app'] = $this->db->get_where('tmp_profile_app', array('id' => 1))->row();
        $data['kode_manifest'] = $kode_manifest;
        $data['value'] = $this->T_create_manifest_model->get_by_kode_manifest( $kode_manifest );
        // echo '<pre>';print_r($data);die;
        $html = $this->load->view('T_log_manifest/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_log_manifest_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $row_list) {
            $no++;
            $row = array();
            $row[] = '<div class="center"><label class="pos-rel">
                        <input type="checkbox" class="ace" name="selected_id[]" value="'.$row_list->manifest_id.'"/>
                        <span class="lbl"></span>
                    </label></div>';
            $row[] = '';
            $row[] = $row_list->kode_manifest;
            $row[] = '<a href="#" onclick="PopupCenter('."'manifest/T_create_manifest/preview_print/".$row_list->kode_manifest."'".','."'CETAK MANIFEST FILE'".',500,450)"><b>'.$row_list->kode_manifest.'</b></a>';
            $row[] = $this->tanggal->formatDateTime($row_list->tgl_manifest);
            $row[] = strtoupper($row_list->area_tujuan_kirim);
            $row[] = strtoupper($row_list->nama_kurir_manifest);
            $row[] = strtoupper($row_list->jumlah_order);
            $row[] = ucwords($row_list->note);
            $row[] = '<div class="center"><a href="#" class="label label-primary" onclick="PopupCenter('."'manifest/T_create_manifest/preview_print/".$row_list->kode_manifest."'".','."'CETAK MANIFEST FILE'".',500,450)"><i class="fa fa-print"></i> Manifest File</a></div>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_log_manifest_model->count_all(),
                        "recordsFiltered" => $this->T_log_manifest_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function find_data()
    {   
        $output = array( "data" => http_build_query($_POST) . "\n" );
        echo json_encode($output);
    }


}

/* End of file example.php */
/* Location: ./application/functiones/example/controllers/example.php */
