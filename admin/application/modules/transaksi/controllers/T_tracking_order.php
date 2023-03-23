<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_tracking_order extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'transaksi/T_tracking_order');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_tracking_order_model');
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
        $this->load->view('T_tracking_order/index', $data);
    }

    public function get_detail( $id )
    {
        $data = array();
        $data['value'] = $this->T_tracking_order_model->get_by_id( $id );
        $html = $this->load->view('T_tracking_order/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function get_data()
    {
        /*get data from model*/
        $list = isset($_GET['keyword']) ? $this->T_tracking_order_model->get_datatables() : [];
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

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->T_tracking_order_model->count_all(),
                        "recordsFiltered" => $this->T_tracking_order_model->count_filtered(),
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
