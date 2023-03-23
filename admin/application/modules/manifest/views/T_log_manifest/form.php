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
        <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('transaksi/T_pickup_order/process')?>" enctype="multipart/form-data" autocomplete="off">
        
            <!-- hidden form -->
            <input type="hidden" name="id" value="<?php echo $value->id?>" id="id">

            <div class="row">
            <!-- content here -->
                <div class="col-sm-12">

                    
                    <h2><b><?php echo strtoupper($value->no_order)?></b> <small><i><?php echo $value->nama_jenis_pengiriman?></i></small></h2>
                    Tgl order. <?php echo $this->tanggal->formatDateTime($value->tgl_order); ?><br>
                    <?php echo strtoupper($value->nama_pengirim)?>  (<?php echo $value->tlp_pengirim; ?>)<br>
                    <?php echo $value->alamat_pengirim; ?><br>
                    Pickup area. <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_pengirim)?>
                    <div id="barcodeTarget" class="barcodeTarget"></div>

                    <hr>
                    <!-- data pengirim -->
                    <div class="col-sm-6 no-padding">
                        <table class="table-custom" >
                            <tr>
                                <td width="120px">Kategori/Jenis</td>
                                <td>: <?php echo $value->nama_kategori_barang; ?> / <?php echo $value->nama_jenis_barang; ?></td>
                            </tr>

                            <tr>
                                <td width="120px">Luas Volume</td>
                                <td>: <?php echo $value->luas_volume; ?> m2</td>
                            </tr>

                            <tr>
                                <td width="120px">Berat Barang</td>
                                <td>: <?php echo $value->berat_kg; ?> kg</td>
                            </tr>

                            <tr>
                                <td width="120px">Note</td>
                                <td>: <b><?php echo $value->note_pengirim; ?></b></td>
                            </tr>

                            <tr>
                                <td width="120px">Tujuan Pengiriman</td>
                                <td>: <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_penerima)?> </td>
                            </tr>
                            <tr>
                                <td width="120px" colspan="2"><hr></td>
                            </tr>

                            <tr>
                                <td width="120px" colspan="2"><b>PENERIMA</b></td>
                            </tr>

                            <tr>
                                <td width="120px">Tujuan Pengiriman</td>
                                <td>:  <?php echo strtoupper($value->nama_penerima)?> No. Telp (<?php echo $value->tlp_penerima; ?>) </td>
                            </tr>

                            <tr>
                                <td width="120px">Alamat Lengkap</td>
                                <td>: <?php echo $value->alamat_penerima; ?> </td>
                            </tr>

                            
                        </table>
                    </div>

                    <div class="col-sm-6 no-padding">
                        <b>DATA PICKUP</b>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Kurir</label>
                            <div class="col-md-6">
                                <?php echo $this->master->custom_selection(array('table'=>'t_kurir', 'where'=>array('is_active'=>'Y'), 'id'=>'kurir_id', 'name' => 'nama'),isset($this->session->userdata('user')->kurir_id)?$this->session->userdata('user')->kurir_id:isset($value->kurir_id)?$value->kurir_id:'','kurir_id','kurir_id','chosen-slect form-control','','');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="<?php echo ($value->pickup_time)?$value->pickup_time : $this->tanggal->formatDateTime(date('Y-m-d H:i:s'))?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tipe Pengiriman</label>
                            <div class="col-md-6">
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'tipe_kirim'), 'id'=>'value', 'name' => 'label'), ($value->tipe_kirim)?$value->tipe_kirim:1,'tipe_kirim','tipe_kirim','chosen-slect form-control','','');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Hub</label>
                            <div class="col-md-6">
                                <?php echo $this->master->custom_selection(array('table'=>'mst_hub', 'where'=>array('is_active'=>'Y'), 'id'=>'hub_id', 'name' => 'nama_hub'), ($value->kurir_id)?$value->kurir_id:'' ,'hub_id','hub_id','chosen-slect form-control','','');?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Upload Image</label>
                            <div class="col-md-5">
                            <input type="file" name="file_image" class="form-control" style="margin-left: 5px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Catatan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="catatan" style="height: 50px !important"></textarea>
                            </div>
                        </div>
                    </div>


                </div>    
            <!-- end content here -->
            </div>



        <div class="form-actions center">
            <a onclick="getMenu('transaksi/T_pickup_order')" href="#" class="btn btn-sm btn-success">
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
            $('#page-area-content').load('transaksi/T_pickup_order');
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

        
    })

</script>