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
      <?php echo $this->authuser->show_button('kurir/T_kurir','C','',1)?>
      <?php echo $this->authuser->show_button('kurir/T_kurir','D','',5)?>
      <?php echo $this->authuser->show_button('kurir/T_kurir','EX','',1)?>
    </div>
    
    <hr class="separator">
    <!-- div.dataTables_borderWrap -->
    <div style="margin-top:-27px">
      <table id="dynamic-table" base-url="kurir/T_kurir" class="table table-bordered table-hover">
       <thead>
        <tr>  
          <th width="30px" class="center"></th>
          <th width="120px">&nbsp;</th>
          <!-- <th>Pas Foto</th> -->
          <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No. Telp</th>
          <th>Tanggal Aktif</th>
          <th>Status</th>
          <th width="100px">Last Update</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->

<script src="<?php echo base_url().'assets/js/custom/als_datatable.js'?>"></script>



