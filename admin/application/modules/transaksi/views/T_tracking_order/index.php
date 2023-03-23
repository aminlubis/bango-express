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
    
    <!-- form pencarian -->
    <form class="form-horizontal" method="post" id="form_search" action="<?php echo site_url('transaksi/T_tracking_order/find_data')?>" enctype="multipart/form-data">
      <br>
      
      <p><b>PENCARIAN DATA SAKIP</b></p>

      <div class="form-group">
        <label class="control-label col-md-2">Masukan No. Order</label>
        <div class="col-md-4">
          <input type="text" name="keyword" class="form-control">
        </div>
        <div class="col-md-3" style="margin-left: -2%">
          <button type="button" id="btn_search_data" name="submit" onclick="load_sakip_data()" class="btn btn-sm btn-info">
              <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
              Tampilkan Data
          </button>

        </div>
      </div>
      

    </form>
    
    <hr class="separator">
    <!-- div.dataTables_borderWrap -->
    <div style="margin-top:-27px;">
      <table id="dynamic-table" base-url="transaksi/T_tracking_order" data-id="flag=" url-detail="transaksi/T_create_order/get_detail" class="table table-bordered table-hover">
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
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->

<script src="<?php echo base_url().'assets/js/custom/als_datatable_with_detail_custom_url.js'?>"></script>


