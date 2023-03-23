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
        <!-- #section:plugins/fuelux.wizard -->
        <div id="fuelux-wizard-container">
            <div>
                <!-- #section:plugins/fuelux.wizard.steps -->
                <ul class="steps">
                    <li data-step="1" class="active">
                        <span class="step">1</span>
                        <span class="title">Data Pengirim</span>
                    </li>

                    <li data-step="2">
                        <span class="step">2</span>
                        <span class="title">Data Penerima</span>
                    </li>

                    <li data-step="3">
                        <span class="step">3</span>
                        <span class="title">Data Barang</span>
                    </li>

                    <li data-step="4">
                        <span class="step">4</span>
                        <span class="title">Pembayaran</span>
                    </li>

                    <li data-step="5">
                        <span class="step">5</span>
                        <span class="title">Selesai</span>
                    </li>
                </ul>

                <!-- /section:plugins/fuelux.wizard.steps -->
            </div>

            <hr />

            <!-- #section:plugins/fuelux.wizard.container -->
            <div class="step-content pos-rel">
                <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('transaksi/T_create_order/process')?>" enctype="multipart/form-data" autocomplete="off">
                <!-- hidden form -->
                <input type="hidden" name="id" value="<?php echo isset($value->id)?$value->id:''?>">
                    <div class="step-pane active" data-step="1">
                        
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Pengirim</label>
                            <div class="col-md-2">
                                <input name="nama_pengirim" id="nama_pengirim" value="<?php echo isset($value->nama_pengirim)?$value->nama_pengirim:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">No Telp/HP</label>
                            <div class="col-md-2">
                                <input type="text" name="telp_pengirim" class="form-control" value="<?php echo isset($value->tlp_pengirim)?$value->tlp_pengirim:''?>">
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 4px">
                            <label class="control-label col-md-2">Alamat Pengirim</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="alamat_pengirim" style="height: 60px !important"><?php echo isset($value)?$value->alamat_pengirim:''?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Provinsi</label>
                            <div class="col-md-2">
                                <input id="inputProvinsiPengirim" class="form-control" name="provinsiPengirim" type="text" placeholder="Masukan 3 karakter" value="" readonly/>
                                <input type="hidden" name="provinsiHiddenPengirim" value="" id="provinsiHiddenPengirim">
                            </div>


                            <label class="control-label col-md-2">Kota / Kabupaten</label>
                            <div class="col-md-2">
                                <input id="inputKotaPengirim" class="form-control" name="kota" type="text" placeholder="Masukan 3 karakter" value="" readonly/>
                                <input type="hidden" name="kotaHiddenPengirim" value="" id="kotaHiddenPengirim">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Kecamatan</label>
                            <div class="col-md-2">
                                <input id="inputKecamatanPengirim" class="form-control" name="kecamatanPengirim" type="text" placeholder="Masukan 3 karakter" value=""/>
                                <input type="hidden" name="kecamatanHiddenPengirim" value="" id="kecamatanHiddenPengirim">
                            </div>

                            <label class="control-label col-md-1">Kelurahan</label>
                            <div class="col-md-2">
                                <input id="inputKelurahanPengirim" class="form-control" name="kelurahanPengirim" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->kel_pengirim:''?>"/>
                                <input type="hidden" name="area_pengirim" value="<?php echo isset($value)?$value->area_tujuan:''?>" id="area_pengirim">
                            </div>
                        </div>

                    </div>

                    <div class="step-pane" data-step="2">
                        
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Penerima</label>
                            <div class="col-md-2">
                                <input name="nama_penerima" id="nama_penerima" value="<?php echo isset($value->nama_penerima)?$value->nama_penerima:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">No Telp/HP</label>
                            <div class="col-md-2">
                                <input type="text" name="telp_penerima" class="form-control" value="<?php echo isset($value->tlp_penerima)?$value->tlp_penerima:''?>">
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 4px">
                            <label class="control-label col-md-2">Alamat Penerima</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="alamat_penerima" style="height: 60px !important"><?php echo isset($value)?$value->alamat_penerima:''?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Provinsi</label>
                            <div class="col-md-2">
                                <input id="inputProvinsiPenerima" class="form-control" name="provinsiPenerima" type="text" placeholder="Masukan 3 karakter" value="" readonly/>
                                <input type="hidden" name="provinsiHiddenPenerima" value="" id="provinsiHiddenPenerima">
                            </div>


                            <label class="control-label col-md-2">Kota / Kabupaten</label>
                            <div class="col-md-2">
                                <input id="inputKotaPenerima" class="form-control" name="kota" type="text" placeholder="Masukan 3 karakter" value="" readonly/>
                                <input type="hidden" name="kotaHiddenPenerima" value="" id="kotaHiddenPenerima">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Kecamatan</label>
                            <div class="col-md-2">
                                <input id="inputKecamatanPenerima" class="form-control" name="kecamatanPenerima" type="text" placeholder="Masukan 3 karakter" value=""/>
                                <input type="hidden" name="kecamatanHiddenPenerima" value="" id="kecamatanHiddenPenerima">
                            </div>

                            <label class="control-label col-md-1">Kelurahan</label>
                            <div class="col-md-2">
                                <input id="inputKelurahanPenerima" class="form-control" name="kelurahanPenerima" type="text" placeholder="Masukan 3 karakter" value="<?php echo isset($value)?$value->kel_penerima:''?>"/>
                                <input type="hidden" name="area_penerima" value="<?php echo isset($value)?$value->area_tujuan:''?>" id="area_penerima">
                            </div>
                        </div>

                    </div>

                    <div class="step-pane" data-step="3">
                        <div class="form-group">
                            <label class="control-label col-md-2">Jenis Barang</label>
                            <div class="col-md-2">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'jenis_barang'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->jenis_brg:'','jenis_brg','jenis_brg','chosen-slect form-control','','');?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Kategori Barang</label>
                            <div class="col-md-2">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'kategori_barang'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->kategori_brg:'','kategori_brg','kategori_brg','chosen-slect form-control','','');?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2">Jumlah Barang</label>
                            <div class="col-md-1">
                                <input name="jumlah_brg" id="jumlah_brg" value="<?php echo isset($value)?$value->jumlah_brg:''?>"  class="form-control" type="text">
                            </div>
                            <label class="control-label col-md-1">Berat (Kg)</label>
                            <div class="col-md-1">
                                <input name="berat_kg" id="berat_kg" value="<?php echo isset($value)?$value->berat_kg:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Luas Volume (m)</label>
                            <div class="col-md-2">
                                <input name="luas_volume" id="luas_volume" value="<?php echo isset($value)?$value->luas_volume:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Catatan</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="note_pengirim" style="height: 60px !important"><?php echo isset($value)?$value->note_pengirim:''?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="step-pane" data-step="4">
                        <div class="form-group">
                            <label class="control-label col-md-2">Jenis Pengiriman</label>
                            <div class="col-md-3">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'jenis_pengiriman'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->jenis_pengiriman:'','jenis_pengiriman','jenis_pengiriman','chosen-slect form-control','','');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Metode Pembayaran</label>
                            <div class="col-md-3">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'metode_pembayaran'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->metode_pembayaran:'','metode_pembayaran','metode_pembayaran','chosen-slect form-control','','');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Total Bayar</label>
                            <div class="col-md-2">
                                <input name="tarif" id="tarif" value="<?php echo isset($value)?$value->tarif:''?>"  class="form-control format_number" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="step-pane" data-step="5">
                        <div class="center">
                            <h3 class="green">Congrats!</h3>
                            Your product is ready to ship! Click finish to continue!
                        </div>
                    </div>
                </form>
            </div>

            <!-- /section:plugins/fuelux.wizard.container -->
        </div>

        <hr />
        <div class="wizard-actions">
            <!-- #section:plugins/fuelux.wizard.buttons -->
            <button class="btn btn-sm btn-prev">
                <i class="ace-icon fa fa-arrow-left"></i>
                Prev
            </button>

            <button class="btn btn-sm btn-success btn-next" data-last="Finish">
                Next
                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>

            <!-- /section:plugins/fuelux.wizard.buttons -->
        </div>
    </div>
    
    
<!-- end content here -->
</div>

<script type="text/javascript" src="<?php echo base_url()?>assets/jquery_number/jquery.number.js"></script>
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>

<script>
    jQuery(function($) {  

        $('.format_number').number( true, 2 );

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
      
        // change pengirim
        var kel_pengirim = $('#area_pengirim').val() ? $('#area_pengirim').val() : 0;
        $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + kel_pengirim, '', function (data) {  
            // split kode
            var str_split = kel_pengirim.split(".");
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

        // change penerima
        var kel_penerima = $('#area_penerima').val() ? $('#area_penerima').val() : 0;
        $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + kel_penerima, '', function (data) {  
            // split kode
            var str_split = kel_penerima.split(".");
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

<!-- page specific plugin scripts -->
<script src="<?php echo base_url()?>assets/js/fuelux/fuelux.wizard.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url()?>assets/js/additional-methods.js"></script>
<script src="<?php echo base_url()?>assets/js/bootbox.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>assets/js/select2.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
    
    
        var $validation = false;
        $('#fuelux-wizard-container')
        .ace_wizard({
            //step: 2 //optional argument. wizard will jump to step "2" at first
            //buttons: '.wizard-actions:eq(0)'
        })
        .on('actionclicked.fu.wizard' , function(e, info){
            if(info.step == 5 && $validation) {
                if(!$('#validation-form').valid()) e.preventDefault();
            }
        })
        .on('finished.fu.wizard', function(e) {
            
            $("#form-default").submit();


            // bootbox.dialog({
            //     message: "Thank you! Your information was successfully saved!", 
            //     buttons: {
            //         "success" : {
            //             "label" : "OK",
            //             "className" : "btn-sm btn-primary"
            //         }
            //     }
            // });
            
            

        }).on('stepclick.fu.wizard', function(e){
            //e.preventDefault();//this will prevent clicking and selecting steps
        });
    
    
        //jump to a step
        /**
        var wizard = $('#fuelux-wizard-container').data('fu.wizard')
        wizard.currentStep = 3;
        wizard.setState();
        */
    
        //determine selected step
        //wizard.selectedItem().step
    
    
    
        //hide or show the other form which requires validation
        //this is for demo only, you usullay want just one form in your application
        // $('#skip-validation').removeAttr('checked').on('click', function(){
        //     $validation = this.checked;
        //     if(this.checked) {
        //         $('#sample-form').hide();
        //         $('#validation-form').removeClass('hide');
        //     }
        //     else {
        //         $('#validation-form').addClass('hide');
        //         $('#sample-form').show();
        //     }
        // })
    
    
    
        //documentation : http://docs.jquery.com/Plugins/Validation/validate
    
    
        // $.mask.definitions['~']='[+-]';
        // $('#phone').mask('(999) 999-9999');
    
        // jQuery.validator.addMethod("phone", function (value, element) {
        //     return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        // }, "Enter a valid phone number.");
    
        // $('#validation-form').validate({
        //     errorElement: 'div',
        //     errorClass: 'help-block',
        //     focusInvalid: false,
        //     ignore: "",
        //     rules: {
        //         email: {
        //             required: true,
        //             email:true
        //         },
        //         password: {
        //             required: true,
        //             minlength: 5
        //         },
        //         password2: {
        //             required: true,
        //             minlength: 5,
        //             equalTo: "#password"
        //         },
        //         name: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             phone: 'required'
        //         },
        //         url: {
        //             required: true,
        //             url: true
        //         },
        //         comment: {
        //             required: true
        //         },
        //         state: {
        //             required: true
        //         },
        //         platform: {
        //             required: true
        //         },
        //         subscription: {
        //             required: true
        //         },
        //         gender: {
        //             required: true,
        //         },
        //         agree: {
        //             required: true,
        //         }
        //     },
    
        //     messages: {
        //         email: {
        //             required: "Please provide a valid email.",
        //             email: "Please provide a valid email."
        //         },
        //         password: {
        //             required: "Please specify a password.",
        //             minlength: "Please specify a secure password."
        //         },
        //         state: "Please choose state",
        //         subscription: "Please choose at least one option",
        //         gender: "Please choose gender",
        //         agree: "Please accept our policy"
        //     },
    
    
        //     highlight: function (e) {
        //         $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        //     },
    
        //     success: function (e) {
        //         $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
        //         $(e).remove();
        //     },
    
        //     errorPlacement: function (error, element) {
        //         if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
        //             var controls = element.closest('div[class*="col-"]');
        //             if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
        //             else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        //         }
        //         else if(element.is('.select2')) {
        //             error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        //         }
        //         else if(element.is('.chosen-select')) {
        //             error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
        //         }
        //         else error.insertAfter(element.parent());
        //     },
    
        //     submitHandler: function (form) {
        //     },
        //     invalidHandler: function (form) {
        //     }
        // });
    
        
        
        
        $('#modal-wizard-container').ace_wizard();
        // $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
        
        
        /**
        $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
            $(this).closest('form').validate().element($(this));
        });
        
        $('#mychosen').chosen().on('change', function(ev) {
            $(this).closest('form').validate().element($(this));
        });
        */
        
        
        $(document).one('ajaxloadstart.page', function(e) {
            //in ajax mode, remove remaining elements before leaving page
            $('[class*=select2]').remove();
        });
    })
</script>

