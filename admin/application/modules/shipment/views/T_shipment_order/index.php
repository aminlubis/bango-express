<div class="row">
  <div class="col-xs-12">

    <div class="page-header">
      <h1>
        <?php echo $title?>
        <small>
          <i class="ace-icon fa fa-angle-double-right"></i>
          <?php echo isset($breadcrumbs)?$breadcrumbs:''?>
        </small>
      </h1>
    </div><!-- /.page-header -->

    <div class="clearfix" style="margin-bottom:-5px" id="show_button">
      <?php echo $this->authuser->show_button('shipment/T_shipment_order','C','',1)?>
      <?php echo $this->authuser->show_button('shipment/T_shipment_order','D','',5)?>
      <?php echo $this->authuser->show_button('shipment/T_shipment_order','EX','',1)?>
    </div>
    
    <hr class="separator">
    <!-- div.dataTables_borderWrap -->
    <div style="margin-top:-27px">
    <table id="dynamic-table" base-url="shipment/T_shipment_order" data-id="flag=" url-detail="shipment/T_shipment_order/get_detail" class="table table-bordered table-hover">
       <thead>
        <tr>  
          <th width="30px" class="center"></th>
          <!-- <th width="40px" class="center"></th> -->
          <th width="40px" class="center"></th>
          <th width="40px"></th>
          <th>No. Order</th>
          <th>Tgl Order</th>
          <th>Pengirim</th>
          <th>Alamat Pengirim</th>
          <th>Tujuan Pengiriman</th>
          <!-- <th>Jumlah</th> -->
          <!-- <th>Note</th> -->
          <!-- <th>Tarif</th> -->
          <!-- <th>Keterangan</th> -->
          <th>Status</th>
          <th width="150px"></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->

<script src="<?php echo base_url().'assets/js/custom/als_datatable_with_detail_custom_url.js'?>"></script>



