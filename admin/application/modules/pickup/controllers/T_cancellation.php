<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_cancellation extends MX_Controller {

    /*function constructor*/
    function __construct() {

        parent::__construct();
        /*breadcrumb default*/
        $this->breadcrumbs->push('Index', 'pickup/T_cancellation');
        /*session redirect login if not login*/
        if($this->session->userdata('logged')!=TRUE){
            echo 'Session Expired !'; exit;
        }
        /*load model*/
        $this->load->model('T_cancellation_model');
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
        $this->load->view('T_cancellation/index', $data);
    }

    public function get_detail( $id )
    {
        $data = array();
        $this->breadcrumbs->push('View '.strtolower($this->title).'', 'T_cancellation/'.strtolower(get_class($this)).'/'.__FUNCTION__.'/'.$id);
        /*define data variabel*/
        $data['value'] = $this->T_cancellation_model->get_by_id( $id );
        // $data['log'] = $this->T_cancellation_model->get_log_detail( $id );
        // echo '<pre>';print_r($data);
        $html = $this->load->view('T_cancellation/detail_table', $data, true);      

        echo json_encode( array('html' => $html) );
    }

    public function get_data()
    {
        /*get data from model*/
        $list = $this->T_cancellation_model->get_datatables();
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
            
            $row[] = '<a href="#" onclick="getMenu('."'transaksi/T_create_order/detail/".$row_list->id."'".')"><b>'.strtoupper($row_list->code).'</b></a>';
            $row[] = $this->tanggal->formatDateTime($row_list->request_date);
            $row[] = strtoupper($row_list->name);
            $row[] = $row_list->pickup_location;
            $row[] = $row_list->address_detail;
            $row[] = $row_list->telp;
            $row[] = $row_list->qty;
            $row[] = $row_list->note;
            
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
                        "recordsTotal" => $this->T_cancellation_model->count_all(),
                        "recordsFiltered" => $this->T_cancellation_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    
}

/* End of file example.php */
/* Location: ./application/functiones/example/controllers/example.php */
