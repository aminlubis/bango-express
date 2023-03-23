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
    
    <hr class="separator">
    <!-- div.dataTables_borderWrap -->
    <div style="margin-top:-27px">
    <table id="dynamic-table" base-url="transaksi/T_pickup_order" data-id="flag=" url-detail="transaksi/T_create_order/get_detail" class="table table-bordered table-hover">
       <thead>
       <tr>  
          <th width="30px" class="center"></th>
          <!-- <th width="40px" class="center"></th> -->
          <th width="40px" class="center"></th>
          <th width="40px"></th>
          <th>No. Order</th>
          <th>Tgl Order</th>
          <th>Pengirim</th>
          <!-- <th>No Telp/HP</th> -->
          <th>Jenis Barang</th>
          <!-- <th>Jumlah</th> -->
          <!-- <th>Note</th> -->
          <!-- <th>Tarif</th> -->
          <th>Keterangan</th>
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


