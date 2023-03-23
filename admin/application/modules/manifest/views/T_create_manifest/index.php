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
    <div style="margin-top:-27px;">
      <table id="dynamic-table" base-url="manifest/T_create_manifest" data-id="flag=" url-detail="manifest/T_create_manifest/get_detail" class="table table-bordered table-hover">
        <thead>
        <tr>  
            <th width="30px" class="center"></th>
            <!-- <th width="40px" class="center"></th> -->
            <th width="40px" class="center"></th>
            <th width="40px"></th>
            <th>Kode Wilayah</th>
            <th>Nama Wilayah</th>
            <th>Total Order</th>
            <th width="100px"></th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->

<script src="<?php echo base_url().'assets/js/custom/als_datatable_with_detail_custom_url.js'?>"></script>


