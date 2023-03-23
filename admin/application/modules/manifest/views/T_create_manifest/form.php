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
        <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('manifest/T_create_manifest/process')?>" enctype="multipart/form-data" autocomplete="off">
        
            <!-- hidden form -->
            <input type="hidden" name="id" value="<?php echo isset($manifest_id)?$manifest_id:0; ?>" id="id">
            <input type="hidden" name="kode_wilayah" value="<?php echo $kode_wilayah; ?>" id="kode_wilayah">

            <div class="row">
            <!-- content here -->
                <div class="col-sm-12">
                    
                    <h2><b><?php echo strtoupper($kode_wilayah)?> - <?php echo strtoupper($_GET['wil'])?></b></h2>
                    <div class="form-group">
                        <label class="control-label col-md-2">Kode Manifest</label>
                        <div class="col-md-2">
                            <input name="kode" id="kode" value="" placeholder="(Auto)" readonly class="form-control" type="text">
                        </div>
                        <label class="control-label col-md-1">Tanggal</label>
                        <div class="col-md-2">
                            <input name="kode" id="kode" value="<?php echo date('Y-m-d H:i:s')?>"  class="form-control" type="text" readonlye>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Kurir</label>
                        <div class="col-md-3">
                            <?php echo $this->master->custom_selection(array('table'=>'t_kurir', 'where'=>array('is_active'=>'Y'), 'id'=>'kurir_id', 'name' => 'nama'),'','kurir_id','kurir_id','chosen-slect form-control','','');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Hub</label>
                        <div class="col-md-3">
                            <?php echo $this->master->custom_selection(array('table'=>'mst_hub', 'where'=>array('is_active'=>'Y'), 'id'=>'hub_id', 'name' => 'nama_hub'), '' ,'hub_id','hub_id','chosen-slect form-control','','');?>
                        </div>
                        <label class="control-label col-md-1">Wilayah</label>
                        <div class="col-md-3">
                            <input name="kode" id="kode" value="<?php echo $kode_wilayah.' -  '.strtoupper($_GET['wil'])?>"  class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Jumlah Order</label>
                        <div class="col-md-1">
                            <input name="jumlah_order" id="jumlah_order" value="<?php echo $_GET['jmlOrder']?>"  class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Keterangan</label>
                        <div class="col-md-6">
                            <textarea class="form-control" style="height: 60px !important" name="note"></textarea>
                        </div>
                    </div>

                    <br>
                    <p style="font-weight: bold; font-size: 16px">DAFTAR MANIFEST</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background: #e4e4e4a1; color: black">
                                <th style="border-bottom: 1px solid grey" class="center">No</th>
                                <th style="border-bottom: 1px solid grey">No. Order</th>
                                <th style="border-bottom: 1px solid grey">Tgl Order</th>
                                <th style="border-bottom: 1px solid grey">Pengirim</th>
                                <th style="border-bottom: 1px solid grey">Penerima</th>
                                <th style="border-bottom: 1px solid grey">Alamat Pengiriman</th>
                                <th style="border-bottom: 1px solid grey">Area</th>
                                <th style="border-bottom: 1px solid grey" class="center">Berat<br>(Kg)</th>
                                <th style="border-bottom: 1px solid grey" class="center">Dimensi<br>(m2)</th>
                                <th style="border-bottom: 1px solid grey">Jenis Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=0; 
                            foreach($value as $key_dt=>$row_dt) : $no++;  
                            ?>
                                <!-- hidden  -->
                                <input type="hidden" name="order_no[]" value="<?php echo $row_dt->no_order?>">
                                <tr>
                                <td class="center"><?php echo $no?></td>
                                <td><?php echo $row_dt->no_order?></td>
                                <td><?php echo $row_dt->tgl_order?></td>
                                <td><?php echo $row_dt->nama_pengirim.' ('.$row_dt->tlp_pengirim.')';?></td>
                                <td><?php echo $row_dt->nama_penerima.' ('.$row_dt->tlp_penerima.')';?></td>
                                <td><?php echo $row_dt->alamat_penerima;?></td>
                                <td><?php echo $row_dt->kel_penerima;?></td>
                                <td class="center"><?php echo $row_dt->berat_kg;?></td>
                                <td class="center"><?php echo $row_dt->luas_volume;?></td>
                                <td><?php echo $row_dt->nama_jenis_barang;?></td>
                                </tr>
                                <?php endforeach;?>

                        </tbody>
                    </table>
                </div>    
            <!-- end content here -->
            </div>



        <div class="form-actions center">
            <a onclick="getMenu('manifest/T_create_manifest')" href="#" class="btn btn-sm btn-success">
              <i class="ace-icon fa fa-arrow-left icon-on-right bigger-110"></i>
              Kembali ke daftar
            </a>
            <button type="submit" id="btnSave" name="submit" class="btn btn-sm btn-info">
              <i class="ace-icon fa fa-check-square-o icon-on-right bigger-110"></i>
              Submit
            </button>
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
            $('#page-area-content').load('manifest/T_create_manifest');
            PopupCenter('manifest/T_create_manifest/preview_print/'+jsonResponse.manifest_kode+'','CETAK MANIFEST FILE',500,450)
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