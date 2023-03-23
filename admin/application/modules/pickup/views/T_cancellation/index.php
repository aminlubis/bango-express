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
      <?php echo $this->authuser->show_button('pickup/T_cancellation','C','',1)?>
      <?php echo $this->authuser->show_button('pickup/T_cancellation','D','',5)?>
      <?php echo $this->authuser->show_button('pickup/T_cancellation','EX','',1)?>
    </div>
    
    <hr class="separator">
    <!-- div.dataTables_borderWrap -->
    <div style="margin-top:-27px">
    <table id="dynamic-table" base-url="pickup/T_cancellation" data-id="flag=" url-detail="pickup/T_cancellation/get_detail" class="table table-bordered table-hover">
       <thead>
        <tr>  
          <th width="30px" class="center"></th>
          <th width="40px" class="center"></th>
          <th width="40px"></th>
          <th>Request Number</th>
          <th>Date</th>
          <th>Sender</th>
          <th style="max-width: 250px">Address</th>
          <th>partment, unit, suite, or floor #</th>
          <th>Phone</th>
          <th>Qty</th>
          <th>Note</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->

<script src="<?php echo base_url().'assets/js/custom/als_datatable_with_detail_custom_url.js'?>"></script>



