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
        <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('transaksi/T_create_order/process')?>" enctype="multipart/form-data" autocomplete="off">
        <!-- hidden form -->
        <input type="hidden" name="id" value="<?php echo isset($value)?$value->kurir_id:''?>">
        <br>

        <div class="form-group">
            <label class="control-label col-md-2">No. Order</label>
            <div class="col-md-2">
                <input name="no_order" id="no_order" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
            <label class="control-label col-md-1">Tanggal</label>  
            <div class="col-md-2">
                <div class="input-group">
                    <input name="tgl_lhr" id="tgl_lhr" value="<?php echo isset($value)?$value->tgl_lhr:''?>"  class="form-control date-picker" type="text">
                    <span class="input-group-addon">
                    <i class="ace-icon fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>

        <hr>

        <p><b>1. DATA PENGIRIM</b></p>

        <div class="form-group">
            <label class="control-label col-md-2">Nama Pengirim</label>
            <div class="col-md-2">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">No Telp/HP</label>
            <div class="col-md-2">
            <input type="text" name="no_telp" class="form-control" value="<?php echo isset($value)?$value->no_telp:''?>">
            </div>
            <label class="control-label col-md-1">Email</label>
            <div class="col-md-2">
            <input type="text" name="email" class="form-control" value="<?php echo isset($value)?$value->email:''?>">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 4px">
            <label class="control-label col-md-2">Alamat (Sesuai KTP)</label>
            <div class="col-md-4">
            <textarea class="form-control" name="alamat" style="height: 60px !important"><?php echo isset($value)?$value->alamat_ktp:''?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Provinsi</label>
            <div class="col-md-2">
                <input id="inputProvinsi" class="form-control" name="provinsi" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_provinsi:''?>" readonly/>
                <input type="hidden" name="provinsiHidden" value="<?php echo isset($value)?$value->provinsi:''?>" id="provinsiHidden">
            </div>


            <label class="control-label col-md-2">Kota / Kabupaten</label>
            <div class="col-md-2">
                <input id="inputKota" class="form-control" name="kota" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kabkota:''?>" readonly/>
                <input type="hidden" name="kotaHidden" value="<?php echo isset($value)?$value->kabkota:''?>" id="kotaHidden">
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Kecamatan</label>
            <div class="col-md-2">
                <input id="inputKecamatan" class="form-control" name="kecamatan" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kecamatan:''?>"/>
                <input type="hidden" name="kecamatanHidden" value="<?php echo isset($value)?$value->kecamatan:''?>" id="kecamatanHidden">
            </div>

            <div class="form-group">
            <label class="control-label col-md-1">Kelurahan</label>
            <div class="col-md-2">
                <input id="inputKelurahan" class="form-control" name="kelurahan" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kelurahan:''?>"/>
                <input type="hidden" name="kelurahanHidden" value="<?php echo isset($value)?$value->kelurahan:''?>" id="kelurahanHidden">
            </div>
            
        </div>

        <br>
        <p><b>2. DATA PENERIMA</b></p>
        <div class="form-group">
            <label class="control-label col-md-2">Nama Penerima</label>
            <div class="col-md-2">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">No Telp/HP</label>
            <div class="col-md-2">
            <input type="text" name="no_telp" class="form-control" value="<?php echo isset($value)?$value->no_telp:''?>">
            </div>
            <label class="control-label col-md-1">Email</label>
            <div class="col-md-2">
            <input type="text" name="email" class="form-control" value="<?php echo isset($value)?$value->email:''?>">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 4px">
            <label class="control-label col-md-2">Alamat (Sesuai KTP)</label>
            <div class="col-md-4">
            <textarea class="form-control" name="alamat" style="height: 60px !important"><?php echo isset($value)?$value->alamat_ktp:''?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Provinsi</label>
            <div class="col-md-2">
                <input id="inputProvinsi" class="form-control" name="provinsi" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_provinsi:''?>" readonly/>
                <input type="hidden" name="provinsiHidden" value="<?php echo isset($value)?$value->provinsi:''?>" id="provinsiHidden">
            </div>


            <label class="control-label col-md-2">Kota / Kabupaten</label>
            <div class="col-md-2">
                <input id="inputKota" class="form-control" name="kota" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kabkota:''?>" readonly/>
                <input type="hidden" name="kotaHidden" value="<?php echo isset($value)?$value->kabkota:''?>" id="kotaHidden">
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Kecamatan</label>
            <div class="col-md-2">
                <input id="inputKecamatan" class="form-control" name="kecamatan" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kecamatan:''?>"/>
                <input type="hidden" name="kecamatanHidden" value="<?php echo isset($value)?$value->kecamatan:''?>" id="kecamatanHidden">
            </div>

            <div class="form-group">
            <label class="control-label col-md-1">Kelurahan</label>
            <div class="col-md-2">
                <input id="inputKelurahan" class="form-control" name="kelurahan" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->nama_kelurahan:''?>"/>
                <input type="hidden" name="kelurahanHidden" value="<?php echo isset($value)?$value->kelurahan:''?>" id="kelurahanHidden">
            </div>
            
        </div>

        <br>
        <p><b>3. DATA BARANG</b></p>
        <div class="form-group">
            <label class="control-label col-md-2">Jenis Barang</label>
            <div class="col-md-3">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Jumlah Barang</label>
            <div class="col-md-1">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
            <label class="control-label col-md-1">Berat (Kg)</label>
            <div class="col-md-1">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Catatan</label>
            <div class="col-md-4">
                <textarea class="form-control" name="alamat" style="height: 60px !important"><?php echo isset($value)?$value->alamat_ktp:''?></textarea>
            </div>
        </div>

        <br>
        <p><b>4. METODE PEMBAYARAN</b></p>
        <div class="form-group">
            <label class="control-label col-md-2">Metode Pembayaran</label>
            <div class="col-md-3">
                <input name="no_identitas" id="no_identitas" value="<?php echo isset($value)?$value->no_id:''?>"  class="form-control" type="text">
            </div>
        </div>


        <div class="form-actions center">
            <a onclick="getMenu('transaksi/T_create_order')" href="#" class="btn btn-sm btn-success">
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
            $('#page-area-content').load('transaksi/T_create_order');
          }else{
            $.achtung({message: jsonResponse.message, timeout:5, className: 'achtungFail'});
          }
          achtungHideLoader();
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

        $('#inputKecamatan').typeahead({
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
                $('#inputKecamatan').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHidden').val('');
                    $('#inputProvinsi').val('');
                    $('#kotaHidden').val('');
                    $('#inputKota').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getDistrictsById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        
                        $('#provinsiHidden').val(prov_id);
                        $('#inputProvinsi').val(data.prov);

                        $('#kotaHidden').val(kota_id);
                        $('#inputKota').val(data.kota);     
                    }); 

                    $('#kecamatanHidden').val(val_item);
                    $('#prov').show('fast');
                    $('#village').show('fast'); 
                }      
            }
        });

        $('#inputKelurahan').typeahead({
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
                $('#inputKelurahan').val(label_item.toUpperCase());

                if (val_item) {          

                    $('#provinsiHidden').val('');
                    $('#inputProvinsi').val('');
                    $('#kotaHidden').val('');
                    $('#inputKota').val('');           
                    $('#inputKecamatan').val('');           

                    $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + val_item, '', function (data) {  
                        // split kode
                        var str_split = val_item.split(".");
                        var prov_id = str_split[0];
                        var kota_id = str_split[0]+'.'+str_split[1];
                        var kec_id = str_split[0]+'.'+str_split[1]+'.'+str_split[2];
                        
                        $('#provinsiHidden').val(prov_id);
                        $('#inputProvinsi').val(data.prov);

                        $('#kotaHidden').val(kota_id);
                        $('#inputKota').val(data.kota); 

                        $('#kecamatanHidden').val(kec_id);
                        $('#inputKecamatan').val(data.kec.toUpperCase());     
                    }); 

                    $('#kelurahanidden').val(val_item);
                    // $('#prov').show('fast');
                    // $('#village').show('fast'); 
                }      
            }
        });

        
    })

</script>