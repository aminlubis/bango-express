<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-multiselect.css" />
<div class="row">
<!-- content here -->
<div class="page-header">
      <h1>
        <?php echo $title?>
        <small>
          <i class="ace-icon fa fa-angle-double-right"></i>
          <?php echo isset($breadcrumbs)?$breadcrumbs:''?>
        </small>
      </h1>
    </div><!-- /.page-header -->
    <div class="col-sm-12">
        <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('kurir/T_kurir/process')?>" enctype="multipart/form-data" autocomplete="off">
        <!-- hidden form -->
        <input type="hidden" name="id" value="<?php echo isset($value)?$value->kurir_id:''?>">
        <br>
        <p><b>1. BIODATA</b></p>
        <div class="form-group">
            <label class="control-label col-md-2">No. ID (KTP/SIM/Passport)</label>
            <div class="col-md-2">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Nama Lengkap</label>
            <div class="col-md-3">
                <input name="nama" id="nama" value="<?php echo isset($value)?$value->nama:''?>"  class="form-control" type="text">
            </div>
        </div>
                
        <div class="form-group">
            <label class="control-label col-md-2">Tempat Lahir</label>
            <div class="col-md-2">
                <input name="tmp_lhr" id="tmp_lhr" value="<?php echo isset($value)?$value->tmp_lhr:''?>" placeholder="" class="form-control" type="text">
            </div>
            <label class="control-label col-md-1">Tanggal Lahir</label>  
            <div class="col-md-2">
                <div class="input-group">
                    <input name="tgl_lhr" id="tgl_lhr" value="<?php echo isset($value)?$value->tgl_lhr:''?>"  class="form-control date-picker" type="text">
                    <span class="input-group-addon">
                    <i class="ace-icon fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 4px">
            <label class="control-label col-md-2">Alamat (Sesuai KTP)</label>
            <div class="col-md-4">
            <textarea class="form-control" name="alamat" style="height: 60px !important"><?php echo isset($value)?$value->alamat_ktp:''?></textarea>
            </div>
        </div>

        <div class="form-group">

            <div id="prov" <?php echo isset($value) ?'':'style="display:none"'; ?>>
                <label class="control-label col-md-2">Provinsi</label>
                <div class="col-md-2">
                    <input id="inputProvinsi" style="margin-left:-9px;margin-bottom:3px;" class="form-control" name="provinsi" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_provinsi:''?>" readonly/>
                    <input type="hidden" name="provinsiHidden" value="<?php echo isset($value)?$value->provinsi:''?>" id="provinsiHidden">
                </div>


                <label class="control-label col-md-2" style="margin-left:-13px;">Kota / Kabupaten</label>
                <div class="col-md-2">
                    <input id="inputKota" style="margin-left:-9px" class="form-control" name="kota" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kabkota:''?>" readonly/>
                    <input type="hidden" name="kotaHidden" value="<?php echo isset($value)?$value->kabkota:''?>" id="kotaHidden">
                </div>
            </div>

            </div>

            <div class="form-group">
            <label class="control-label col-md-2">Kecamatan</label>
            <div class="col-md-2">
                <input id="inputKecamatan" class="form-control" name="kecamatan" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kecamatan:''?>"/>
                <input type="hidden" name="kecamatanHidden" value="<?php echo isset($value)?$value->kecamatan:''?>" id="kecamatanHidden">
            </div>
            
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">No Telp/HP</label>
            <div class="col-md-2">
            <input type="text" name="no_telp" class="form-control" value="<?php echo isset($value)?$value->no_telp:''?>">
            </div>
            <label class="control-label col-md-1">Email</label>
            <div class="col-md-2">
            <input type="text" name="email" class="form-control" value="<?php echo isset($value)?$value->email:''?>"">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Pendidikan Terakhir</label>
            <div class="col-md-2">
            <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'pendidikan'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->pendidikan_terakhir:'','pendidikan_terakhir','pendidikan_terakhir','chosen-slect form-control','','');?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Agama</label>
            <div class="col-md-2">
            <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'agama'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->agama:'','agama','agama','chosen-slect form-control','','');?>
            </div>
        </div>
        <br>

        <p><b>2. UPLOAD DOKUMEN</b></p>
        <div class="form-group">
            <label class="control-label col-md-2">Scan ID (KTP/SIM/Passport)</label>
            <div class="col-md-3">
              <input type="file" name="file_identitas" class="form-control">
            </div>
        </div>

        <?php 
          if(isset($value)) : 
            if(file_exists(PATH_IMG_DEFAULT.$value->scan_identitas)) :?>
          <div class="form-group">
            <label class="col-md-2">&nbsp;</label>
            <div class="col-md-3">
              <img src="<?php echo base_url(PATH_IMG_DEFAULT.$value->scan_identitas)?>" style="width: 200px">
            </div>
        </div>
        <?php endif; endif;?>

        <div class="form-group">
            <label class="control-label col-md-2">Pas Foto (3x4)</label>
            <div class="col-md-3">
            <input type="file" name="pas_foto" class="form-control">
            </div>
        </div>

        <?php 
          if(isset($value)) : 
            if(file_exists(PATH_IMG_DEFAULT.$value->pas_foto)) :?>
          <div class="form-group">
            <label class="col-md-2">&nbsp;</label>
            <div class="col-md-3">
              <img src="<?php echo base_url(PATH_IMG_DEFAULT.$value->pas_foto)?>" style="width: 200px">
            </div>
        </div>
        <?php endif; endif;?>
        <br>
        <p><b>3. PENEMPATAN WILAYAH</b></p>
        
        <!-- wilayah 1 -->
        <div class="form-group">
            <label class="control-label col-md-1">Provinsi</label>
            <div class="col-md-2">
                <?php echo $this->master->custom_selection_with_query(array('query' => 'select kode, nama from wilayah WHERE CHAR_LENGTH(kode) = 2', 'id' =>'kode', 'name' => 'nama'), '','provinsi','provinsi','form-control','','')?>
            </div>


            <label class="control-label col-md-1">Kab/Kota</label>
            <div class="col-md-2">
            <?php echo $this->master->custom_selection_with_query(array('query' => 'select kode, nama from wilayah WHERE CHAR_LENGTH(kode) = 5', 'id' =>'kode', 'name' => 'nama'), '','kabkota','kabkota','form-control','','')?>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-md-1">Kecamatan</label>
            <div class="col-md-2">
            <?php echo $this->master->custom_selection_with_query(array('query' => 'select kode, nama from wilayah WHERE CHAR_LENGTH(kode) = 8', 'id' =>'kode', 'name' => 'nama'), '','kecamatan','kecamatan','form-control','','')?>
            </div>
            <label class="control-label col-md-1">Kelurahan</label>
            <div class="col-md-2">
                <?php echo $this->master->onchange_custom_selection_with_query(array('query' => '', 'id' =>'kode', 'name' => 'nama'), '','kelurahan[]','kelurahan','form-control','','')?>
            </div>
        </div>


        <div class="form-actions center">
            <a onclick="getMenu('kurir/T_kurir')" href="#" class="btn btn-sm btn-success">
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
    
    
<!-- end content here -->
</div>

<script src="<?php echo base_url().'assets/js/custom/als_datatable.js'?>"></script>
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>

<script>
    jQuery(function($) {  


        $('.date-picker').datepicker({  
        autoclose: true,   
        todayHighlight: true,
        format: 'yyyy-mm-dd', 
        })  
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){  
        $(this).prev().focus();    
        });  

        jQuery(function($){
          
          //////////////////
          $('.multiselect').multiselect({
           enableFiltering: true,
           buttonClass: 'btn btn-white btn-primary',
           templates: {
            button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
            ul: '<ul class="multiselect-container dropdown-menu"></ul>',
            filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
            filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
            li: '<li><a href="javascript:void(0);"><label></label></a></li>',
            divider: '<li class="multiselect-item divider"></li>',
            liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
           }
          });
          
          
          //in ajax mode, remove remaining elements before leaving page
          /*$(document).one('ajaxloadstart.page', function(e) {
            $('.multiselect').multiselect('destroy');
          });*/
        
        });

    });

    $(document).ready(function(){
      
      $('#form-default').ajaxForm({
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
            $('#page-area-content').load('kurir/T_kurir');
          }else{
            $.achtung({message: jsonResponse.message, timeout:5, className: 'achtungFail'});
          }
          achtungHideLoader();
        }
      }); 

    $('select[name="provinsi"]').change(function () {      

        if ($(this).val()) {          

            $.getJSON("<?php echo site_url('Templates/References/getRegencyByProvince') ?>/" + $(this).val(), '', function (data) {              

                $('#kabkota option').remove();                

                $('<option value="">-Pilih Kab/Kota-</option>').appendTo($('#kabkota'));                

                $.each(data, function (i, o) {                  

                    $('<option value="' + o.kode + '">' + o.nama + '</option>').appendTo($('#kabkota'));                    

                });                

            });            

        } else {          

            $('#kabkota option').remove()            

        }     

    });

    $('select[name="kabkota"]').change(function () {      

        if ($(this).val()) {          

            $.getJSON("<?php echo site_url('Templates/References/getDistrictsByRegency') ?>/" + $(this).val(), '', function (data) {              

                $('#kecamatan option').remove();                

                $('<option value="">-Pilih Kecamatan-</option>').appendTo($('#kecamatan'));                

                $.each(data, function (i, o) {                  

                    $('<option value="' + o.kode + '">' + o.nama + '</option>').appendTo($('#kecamatan'));                    

                });                

            });            

        } else {          

            $('#kecamatan option').remove()            

        }     

    });

    $('select[name="kecamatan"]').change(function () {      

        if ($(this).val()) {          

            $.getJSON("<?php echo site_url('Templates/References/getVillageByRegency') ?>/" + $(this).val(), '', function (data) {              

                $('#kelurahan option').remove();                

                $('<option value="">-Pilih Kelurahan-</option>').appendTo($('#kelurahan'));                

                $.each(data, function (i, o) {                  

                    $('<option value="' + o.kode + '">' + o.nama + '</option>').appendTo($('#kelurahan'));                    

                });                

            });            

        } else {          

            $('#kelurahan option').remove()            

        }     

    });


        $('#tmp_lhr').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getRegencyByKeyword",
                    data: 'keyword=' + query ,         
                    dataType: "json",
                    type: "POST",
                    success: function (response) {
                        result($.map(response, function (item) {
                            return item;
                        }));
                    }
                });
            },
            afterSelect: function (item) {
                // do what is needed with item
                var val_item=item.split(':')[0];
                var label_item=item.split(':')[1];

                $('#tmp_lhr').val(label_item);
            }
        }); 

        $('#inputKecamatanPengirim').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getDistricts",
                    data: 'keyword=' + query ,         
                    dataType: "json",
                    type: "POST",
                    success: function (response) {
                        result($.map(response, function (item) {
                            return item;
                        }));
                    }
                });
            },
            afterSelect: function (item) {
                // do what is needed with item
                var val_item=item.split(':')[0];
                var label_item=item.split(':')[1];
                $('#inputKecamatanPengirim').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHiddenPengirim').val('');
                    $('#inputProvinsiPengirim').val('');
                    $('#kotaHiddenPengirim').val('');
                    $('#inputKotaPengirim').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getDistrictsById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        
                        $('#provinsiHiddenPengirim').val(prov_id);
                        $('#inputProvinsiPengirim').val(data.prov);

                        $('#kotaHiddenPengirim').val(kota_id);
                        $('#inputKotaPengirim').val(data.kota);     
                    }); 

                    $('#kecamatanHiddenPengirim').val(val_item);
                }      
            }
        });

        $('#inputKelurahanPengirim').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getVillage",
                    data: 'keyword=' + query +'&kec_id=' + $('#kecamatanHidden').val(),         
                    dataType: "json",
                    type: "POST",
                    success: function (response) {
                        result($.map(response, function (item) {
                            return item;
                        }));
                    }
                });
            },
            afterSelect: function (item) {
                // do what is needed with item
                var val_item=item.split(':')[0];
                var label_item=item.split(':')[1];
                $('#inputKelurahanPengirim').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHiddenPengirim').val('');
                    $('#inputProvinsiPengirim').val('');
                    $('#kotaHiddenPengirim').val('');
                    $('#inputKotaPengirim').val('');           
                    $('#inputKecamatanPengirim').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        var kec_id = str_split[0]+'.'+str_split[1]+'.'+str_split[2];
                        
                        $('#provinsiHiddenPengirim').val(prov_id);
                        $('#inputProvinsiPengirim').val(data.prov);

                        $('#kotaHiddenPengirim').val(kota_id);
                        $('#inputKotaPengirim').val(data.kota); 

                        $('#kecamatanHiddenPengirim').val(kec_id);
                        $('#inputKecamatanPengirim').val(data.kec.toUpperCase());     
                    }); 

                    $('#area_pengirim').val(val_item);
                    // $('#prov').show('fast');
                    // $('#village').show('fast'); 
                }      
            }
        });

        $('#inputKecamatanPenerima').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getDistricts",
                    data: 'keyword=' + query ,         
                    dataType: "json",
                    type: "POST",
                    success: function (response) {
                        result($.map(response, function (item) {
                            return item;
                        }));
                    }
                });
            },
            afterSelect: function (item) {
                // do what is needed with item
                var val_item=item.split(':')[0];
                var label_item=item.split(':')[1];
                $('#inputKecamatanPenerima').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHiddenPenerima').val('');
                    $('#inputProvinsiPenerima').val('');
                    $('#kotaHiddenPenerima').val('');
                    $('#inputKotaPenerima').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getDistrictsById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        
                        $('#provinsiHiddenPenerima').val(prov_id);
                        $('#inputProvinsiPenerima').val(data.prov);

                        $('#kotaHiddenPenerima').val(kota_id);
                        $('#inputKotaPenerima').val(data.kota);     
                    }); 

                    $('#kecamatanHiddenPenerima').val(val_item);
                }      
            }
        });

        $('#inputKelurahanPenerima').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getVillage",
                    data: 'keyword=' + query +'&kec_id=' + $('#kecamatanHidden').val(),         
                    dataType: "json",
                    type: "POST",
                    success: function (response) {
                        result($.map(response, function (item) {
                            return item;
                        }));
                    }
                });
            },
            afterSelect: function (item) {
                // do what is needed with item
                var val_item=item.split(':')[0];
                var label_item=item.split(':')[1];
                $('#inputKelurahanPenerima').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHiddenPenerima').val('');
                    $('#inputProvinsiPenerima').val('');
                    $('#kotaHiddenPenerima').val('');
                    $('#inputKotaPenerima').val('');           
                    $('#inputKecamatanPenerima').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        var kec_id = str_split[0]+'.'+str_split[1]+'.'+str_split[2];
                        
                        $('#provinsiHiddenPenerima').val(prov_id);
                        $('#inputProvinsiPenerima').val(data.prov);

                        $('#kotaHiddenPenerima').val(kota_id);
                        $('#inputKotaPenerima').val(data.kota); 

                        $('#kecamatanHiddenPenerima').val(kec_id);
                        $('#inputKecamatanPenerima').val(data.kec.toUpperCase());     
                    }); 

                    $('#area_penerima').val(val_item);
                    // $('#prov').show('fast');
                    // $('#village').show('fast'); 
                }      
            }
        });

        
    })

</script>