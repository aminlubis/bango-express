<style>
    .input-inline{
        padding-bottom: 10px;
    }
</style>
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
                        <span class="title">About Sender</span>
                    </li>

                    <li data-step="2">
                        <span class="step">2</span>
                        <span class="title">About Recipient</span>
                    </li>

                    <li data-step="3">
                        <span class="step">3</span>
                        <span class="title">Package Detail</span>
                    </li>

                    <li data-step="4">
                        <span class="step">4</span>
                        <span class="title">Payment</span>
                    </li>

                    <li data-step="5">
                        <span class="step">5</span>
                        <span class="title">Finish</span>
                    </li>
                </ul>

                <!-- /section:plugins/fuelux.wizard.steps -->
            </div>

            <hr />

            <!-- #section:plugins/fuelux.wizard.container -->
            <div class="step-content pos-rel">
                <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('shipment/T_create_order/process')?>" enctype="multipart/form-data" autocomplete="off">
                <!-- hidden form -->
                <input type="hidden" name="id" value="<?php echo isset($value->id)?$value->id:''?>">
                    <div class="step-pane active" data-step="1">

                        <div class="row">
                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Pick Up Location *</label>
                                <input class="form-control input-mask-date" type="text" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" name="alamat_pengirim">
                                <!-- hidden -->
                                <input type="hidden" class="form-control" id="long_pengirim" name="long_pengirim" placeholder="long_pengirim" value="" disabled="true">
                                <input type="hidden" class="form-control" id="lat_pengirim" name="lat_pengirim" placeholder="lat_pengirim" value="" disabled="true">
                            </div>

                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Apartment, unit, suite, or floor #</label>
                                <input name="alamat_detail_pengirim" id="alamat_detail_pengirim" value="<?php echo isset($value->alamat_detail_pengirim)?$value->alamat_detail_pengirim:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">City</label>
                                <input class="form-control" id="administrative_area_level_2" type="text" value="<?php echo isset($value)?$value->nama_kab:'' ?>" name="city_pengirim"/>
                                <input type="hidden" name="kotaHidden" value="<?php echo isset($value)?$value->kabkota:'' ?>" id="kotaHidden">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Province</label>
                                <input class="form-control" id="administrative_area_level_1" disabled type="text" value="<?php echo isset($value)?$value->nama_prov:'' ?>" name="prov_pengirim"/>
                                    <input type="hidden" name="provinsiHidden" value="<?php echo isset($value)?$value->provinsi:'' ?>" id="provinsiHidden">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Postal Code</label>
                                <input name="zip_pengirim" id="zip_pengirim" value="<?php echo isset($value->zip_pengirim)?$value->zip_pengirim:''?>"  class="form-control" type="text">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Sender Name</label>
                                <input name="nama_pengirim" id="nama_pengirim" value="<?php echo isset($value->nama_pengirim)?$value->nama_pengirim:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Phone/Hp</label>
                                <input name="telp_pengirim" styid="telp_pengirim" value="<?php echo isset($value->telp_pengirim)?$value->telp_pengirim:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="step-pane" data-step="2">
                        
                        <div class="row">
                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Delivery Location *</label>
                                <input class="form-control input-mask-date" type="text" id="autocomplete2" name="alamat_penerima" placeholder="Enter your address" onFocus="geolocate()">
                                <!-- hidden -->
                                <input type="hidden" class="form-control" id="long_penerima" name="long_penerima" placeholder="long_penerima" value="" disabled="true">
                                <input type="hidden" class="form-control" id="lat_penerima" name="lat_penerima" placeholder="lat_penerima" value="" disabled="true">
                            </div>

                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Apartment, unit, suite, or floor #</label>
                                <input name="alamat_detail_penerima" id="alamat_detail_penerima" value="<?php echo isset($value->alamat_detail_penerima)?$value->alamat_detail_penerima:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">City</label>
                                <input class="form-control" id="administrative_area_level_2_penerima" type="text" value="<?php echo isset($value)?$value->nama_kab:'' ?>" name="city_penerima"/>
                                <input type="hidden" name="kotaHiddenPenerima" value="<?php echo isset($value)?$value->kabkota:'' ?>" id="kotaHiddenPenerima">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Province</label>
                                <input class="form-control" id="administrative_area_level_1_penerima" type="text" value="<?php echo isset($value)?$value->nama_prov:'' ?>" name="prov_penerima"/>
                                    <input type="hidden" name="provinsiHiddenPenerima" value="<?php echo isset($value)?$value->provinsi:'' ?>" id="provinsiHiddenPenerima">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Postal Code</label>
                                <input name="zip_penerima" id="zip_penerima" value="<?php echo isset($value->zip_penerima)?$value->zip_penerima:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Receipt Name</label>
                                <input name="nama_penerima" id="nama_penerima" value="<?php echo isset($value->nama_penerima)?$value->nama_penerima:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Phone/Hp</label>
                                <input name="telp_penerima" styid="telp_penerima" value="<?php echo isset($value->telp_penerima)?$value->telp_penerima:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="step-pane" data-step="3">

                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Item Detail</label>
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'jenis_barang'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->jenis_brg:'','jenis_brg','jenis_brg','chosen-slect form-control','','');?>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Qty</label>
                                <input name="jumlah_brg" styid="jumlah_brg" value="<?php echo isset($value->jumlah_brg)?$value->jumlah_brg:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="checkbox">
                                <label>
                                    <input name="form-field-checkbox" type="checkbox" class="ace" name="is_fragile" value="1">
                                    <span class="lbl"> fragile item</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Note</label>
                                <textarea class="form-control" name="note_pengirim" style="height: 60px !important"><?php echo isset($value)?$value->note_pengirim:''?></textarea>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="step-pane" data-step="4">
                        <!-- <ol class="dd-list">
                            <li class="dd-item dd2-item" data-id="13">
                                <div class="dd-handle dd2-handle">
                                    <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                </div>
                                <div class="dd2-content">OVO</div>
                            </li>

                            <li class="dd-item dd2-item" data-id="13">
                                <div class="dd-handle dd2-handle">
                                    <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                </div>
                                <div class="dd2-content">GOPAY</div>
                            </li>

                            <li class="dd-item dd2-item" data-id="13">
                                <div class="dd-handle dd2-handle">
                                    <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                </div>
                                <div class="dd2-content">Shopee Pay</div>
                            </li>

                            <li class="dd-item dd2-item" data-id="13">
                                <div class="dd-handle dd2-handle">
                                    <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                </div>
                                <div class="dd2-content">DANA</div>
                            </li>

                            <li class="dd-item dd2-item" data-id="13">
                                <div class="dd-handle dd2-handle">
                                    <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                                    <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                </div>
                                <div class="dd2-content">Cash On Pickup</div>
                            </li>

                        </ol> -->
                        
                        <!-- <div class="form-group">
                            <label class="control-label col-md-2">Jenis Pengiriman</label>
                            <div class="col-md-3">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'jenis_pengiriman'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->jenis_pengiriman:'','jenis_pengiriman','jenis_pengiriman','chosen-slect form-control','','');?>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Total Payment</label><br>
                                <b><span style="font-size: 16px">Rp.12,000,</span></b>
                                <input name="tarif" id="tarif" value="<?php echo isset($value)?$value->tarif:12000?>"  class="form-control format_number" type="hidden">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Metode Pembayaran</label>
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'metode_pembayaran'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->metode_pembayaran:'','metode_pembayaran','metode_pembayaran','chosen-slect form-control','','');?>
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
                $('#page-area-content').load('shipment/T_create_order');
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKjP-500lfTc-2Jio-IWIf-6w3yDEg2I&libraries=places"></script>
<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:

$( "#autocomplete" )
  .keypress(function(event) {
    var keycode =(event.keyCode?event.keyCode:event.which); 
    if(keycode == 13){
      event.preventDefault();
      $('#administrative_area_level_1').focus();
    }
});

$( "#autocomplete2" )
  .keypress(function(event) {
    var keycode =(event.keyCode?event.keyCode:event.which); 
    if(keycode == 13){
      event.preventDefault();
      $('#administrative_area_level_1').focus();
    }
});

var placeSearch, autocomplete;

var componentForm = {
//   street_number: 'short_name',
//   route: 'long_name',
//   locality: 'long_name',
  administrative_area_level_1: 'short_name',
  administrative_area_level_2: 'short_name',
//   country: 'long_name',
//   postal_code: 'short_name'
};

var componentForm2 = {
//   street_number: 'short_name',
//   route: 'long_name',
//   locality: 'long_name',
  administrative_area_level_1: 'short_name',
  administrative_area_level_2: 'short_name',
//   country: 'long_name',
//   postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), 
        {types: ['geocode']}
  );

  autocomplete2 = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete2'), 
        {types: ['geocode']}
  );

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  // autocomplete.setFields(['address_component']);
  autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
  autocomplete2.addListener('place_changed', fillInAddress2);
  

}

function fillInAddress() {
  // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
        }
    }
    // empty locality
    $('#kotaHidden').val('');
    $('#locality').val('');  
    
    // get geometry
    var geometry = place.geometry;
    $('#lat_pengirim').val(geometry.location.lat);
    $('#lat_pengirim').attr('disabled', false);
    $('#long_pengirim').val(geometry.location.lng);
    $('#long_pengirim').attr('disabled', false);
}

function fillInAddress2() {
  // Get the place details from the autocomplete object.
    var place = autocomplete2.getPlace();

    for (var component in componentForm2) {
        document.getElementById(component+'_penerima').value = '';
        document.getElementById(component+'_penerima').disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm2[addressType]) {
        var val = place.address_components[i][componentForm2[addressType]];
        document.getElementById(addressType+'_penerima').value = val;
        }
    } 
    
    // get geometry
    var geometry = place.geometry;
    $('#lat_penerima').val(geometry.location.lat);
    $('#lat_penerima').attr('disabled', false);
    $('#long_penerima').val(geometry.location.lng);
    $('#long_penerima').attr('disabled', false);
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
      autocomplete2.setBounds(circle.getBounds());
    });
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKjP-500lfTc-2Jio-IWIf-6w3yDEg2I&libraries=places&callback=initAutocomplete" async defer></script>

