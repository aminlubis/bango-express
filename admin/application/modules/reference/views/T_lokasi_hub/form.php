<script src="<?php echo base_url()?>assets/js/date-time/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css" />
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>
<script src="<?php echo base_url()?>assets/js/custom/regional.js"></script>
<script>
jQuery(function($) {

  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
  })
  //show datepicker when clicking on the icon
  .next().on(ace.click_event, function(){
    $(this).prev().focus();
  });
});

$(document).ready(function(){
  
    $('#form_t_kurir').ajaxForm({
      beforeSend: function() {
        achtungShowLoader();  
      },
      uploadProgress: function(event, position, total, percentComplete) {
      },
      complete: function(xhr) {     
        var data=xhr.responseText;
        var jsonResponse = JSON.parse(data);

        if(jsonResponse.status === 200){
          $.achtung({message: jsonResponse.message, timeout:5});
          $('#page-area-content').load('reference/T_lokasi_hub?_=' + (new Date()).getTime());
        }else{
          $.achtung({message: jsonResponse.message, timeout:5, className: 'achtungFail'});
        }
        achtungHideLoader();
      }
    }); 

    

})

</script>

<div class="page-header">
  <h1>
    <?php echo $title?>
    <small>
      <i class="ace-icon fa fa-angle-double-right"></i>
      <?php echo $breadcrumbs?>
    </small>
  </h1>
</div><!-- /.page-header -->

<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
          <div class="widget-body">
            <div class="widget-main no-padding">
              <form class="form-horizontal" method="post" id="form_t_kurir" action="<?php echo site_url('reference/T_lokasi_hub/process')?>" enctype="multipart/form-data" autocomplete="off">
                <br>

                <div class="form-group">
                  <label class="control-label col-md-2">ID</label>
                  <div class="col-md-1">
                    <input name="id" id="id" value="<?php echo isset($value)?$value->hub_id:0?>" placeholder="Auto" class="form-control" type="text" readonly>
                  </div>
                  <label class="control-label col-md-1">Kode</label>
                  <div class="col-md-2">
                    <input name="kode_hub" id="kode_hub" value="<?php echo isset($value)?$value->kode_hub:''?>" placeholder="" class="form-control" type="text" readonly >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2">Nama HUB</label>
                  <div class="col-md-2">
                    <input name="nama_hub" id="nama_hub" value="<?php echo isset($value)?$value->nama_hub:''?>" placeholder="" class="form-control" type="text" <?php echo ($flag=='read')?'readonly':''?> >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2">No Telp</label>
                  <div class="col-md-2">
                    <input name="no_telp" id="no_telp" value="<?php echo isset($value)?$value->no_telp:''?>" placeholder="" class="form-control" type="text" <?php echo ($flag=='read')?'readonly':''?> >
                  </div>
                  <label class="control-label col-md-1">Nama PIC</label>
                  <div class="col-md-2">
                    <input name="pic" id="pic" value="<?php echo isset($value)?$value->pic:''?>" placeholder="" class="form-control" type="text" <?php echo ($flag=='read')?'readonly':''?> >
                  </div>
                </div>

                <div class="form-group">

                  <div id="prov" <?php echo isset($value) ?'':'style="display:none"'; ?>>
                    <label class="control-label col-md-2">Provinsi</label>

                    <div class="col-md-3">
                        <input id="inputProvinsi" style="margin-left:-9px;margin-bottom:3px;" class="form-control" name="provinsi" type="text" placeholder="Masukan keyword minimal 3 karakter" value="<?php echo isset($value)?$value->prov_name:''?>" <?php echo ($flag=='read')?'readonly':''?>/>
                        <input type="hidden" name="prov_id" value="<?php echo isset($value)?$value->prov_id:''?>" id="prov_id">
                    </div>


                    <label class="control-label col-md-2" style="margin-left:-13px;">Kota / Kabupaten</label>

                    <div class="col-md-3">
                        <input id="inputKota" style="margin-left:-9px" class="form-control" name="kota" type="text" placeholder="Masukan keyword minimal 3 karakter" value="<?php echo isset($value)?$value->kab_name:''?>" <?php echo ($flag=='read')?'readonly':''?>/>
                        <input type="hidden" name="kab_id" value="<?php echo isset($value)?$value->kab_id:''?>" id="kab_id">
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  
                  <label class="control-label col-md-2">Kecamatan</label>

                  <div class="col-md-3">
                      <input id="inputKecamatan" class="form-control" name="kecamatan" type="text" placeholder="Masukan keyword minimal 3 karakter" value="<?php echo isset($value)?$value->kec_name:''?>" <?php echo ($flag=='read')?'readonly':''?>/>
                      <input type="hidden" name="kec_id" value="<?php echo isset($value)?$value->kec_id:''?>" id="kec_id">
                  </div>
                  

                  <div id="village" <?php echo isset($value) ?'':'style="display:none"'; ?>>
                    <label class="control-label col-md-2">Kelurahan</label>

                    <div class="col-md-3">
                        <input id="inputKelurahan" style="margin-left:-9px" class="form-control" name="kelurahan" type="text" placeholder="Masukan keyword minimal 3 karakter" value="<?php echo isset($value)?$value->kel_name:''?>" <?php echo ($flag=='read')?'readonly':''?>/> 
                        <input type="hidden" name="kel_id" value="<?php echo isset($value)?$value->kel_id:''?>" id="kel_id">
                    </div>
                  </div>

                </div>
                
                <div class="form-group">

                  <label class="control-label col-md-2">Kode Pos</label>

                  <div class="col-md-1">
                      <input id="kode_pos" class="form-control" name="kode_pos" type="text" value="<?php echo isset($value)?$value->kode_pos:''?>" <?php echo ($flag=='read')?'readonly':''?>/>
                  </div>

                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-2">Alamat</label>
                  <div class="col-md-4">
                  <textarea name="alamat" class="form-control" <?php echo ($flag=='read')?'readonly':''?> style="height:50px !important"><?php echo isset($value)?$value->alamat:''?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2">Is active?</label>
                  <div class="col-md-2">
                    <div class="radio">
                          <label>
                            <input name="is_active" type="radio" class="ace" value="Y" <?php echo isset($value) ? ($value->is_active == 'Y') ? 'checked="checked"' : '' : 'checked="checked"'; ?> <?php echo ($flag=='read')?'readonly':''?> />
                            <span class="lbl"> Ya</span>
                          </label>
                          <label>
                            <input name="is_active" type="radio" class="ace" value="N" <?php echo isset($value) ? ($value->is_active == 'N') ? 'checked="checked"' : '' : ''; ?> <?php echo ($flag=='read')?'readonly':''?>/>
                            <span class="lbl">Tidak</span>
                          </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2">Last update</label>
                  <div class="col-md-8" style="padding-top:8px;font-size:11px">
                      <i class="fa fa-calendar"></i> <?php echo isset($value->updated_date)?$this->tanggal->formatDateTime($value->updated_date):isset($value)?$this->tanggal->formatDateTime($value->created_date):date('d-M-Y H:i:s')?> - 
                      by : <i class="fa fa-user"></i> <?php echo isset($value->updated_by)?$value->updated_by:isset($value->created_by)?$value->created_by:$this->session->userdata('user')->username?>
                  </div>
                </div>


                <div class="form-actions center">
                  <a onclick="getMenu('reference/T_lokasi_hub')" href="#" class="btn btn-sm btn-success">
                    <i class="ace-icon fa fa-arrow-left icon-on-right bigger-110"></i>
                    Kembali ke daftar
                  </a>
                  <?php if($flag != 'read'):?>
                    <button type="reset" id="btnReset" class="btn btn-sm btn-danger">
                      <i class="ace-icon fa fa-close icon-on-right bigger-110"></i>
                      Reset
                    </button>
                    <button type="submit" id="btnSave" name="submit" class="btn btn-sm btn-info">
                      <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
                      Submit
                    </button>
                  <?php endif; ?>
                </div>
              </form>
            </div>
          </div>
    
    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->


