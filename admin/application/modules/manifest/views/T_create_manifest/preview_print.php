<html>
  <head>
    <title>BANGO EX - MANIFEST FILE</title>
    <script src="<?php echo base_url().'assets/barcode-master/prototype/sample/prototype.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/barcode-master/prototype/prototype-barcode.js'?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

    <script type="text/javascript">

    window.onload = generateBarcode;

      function generateBarcode(){

        $("barcodeTarget").update();
        var value = "<?php echo $kode_manifest; ?>";
        var btype = "code128";
        
        var settings = {
          output:"css",
          bgColor: "#FFFFFF",
          color: "#000000",
          barWidth: 2,
          barHeight: 35,
          moduleSize: 20,
          fontSize: 12,
          posX: 20,
          posY: 20,
          addQuietZone: false
        };
        $("barcodeTarget").update().show().barcode(value, btype, settings);


      }
        
    </script> 

    <style>

    .barcodeTarget{
      font-weight: bold;margin-top: 5px;letter-spacing: 11px;
    }

    body, table, p{
      font-family: arial;
      font-size: 14px;
      background-color: white;
      width: 100%;
    }
    .table-utama{
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 2px;
      text-align: left;
    }
    h2{
      margin: 0px !important;
    }
    @media print{ #barPrint{
        display:none;
      }
    }
    </style>
  </head>
  <body>

    <div class="row">
    <!-- content here -->
        <div class="col-sm-12">
            <table width="100%" border="0">
                <tr>
                    <td width="200px" align="center"><img src="<?php echo base_url().PATH_IMG_DEFAULT.$app->app_logo?>" alt="" width="200px"></td>
                </tr>
                </table>
                <div style="padding: 4px">
                <small><i><b>Manifest code : </b></i></small>
                <h2><b><?php echo strtoupper($kode_manifest)?></b></h2>
                </div>
                <table class="table-custom" style="width: 100% !important">
                <tr>
                    <td width="20%">Tgl Manifest</td>
                    <td width="60%">:  <?php echo $this->tanggal->formatDateTime($value[0]->tgl_manifest); ?></td>
                </tr>
                <tr>
                    <td width="20%">Area Tujuan</td>
                    <td width="60%">: <?php echo strtoupper($value[0]->area_tujuan_kirim); ?> </td>
                </tr>
                <tr>
                    <td width="20%">Pengirim</td>
                    <td width="60%">: <?php echo strtoupper($value[0]->nama_kurir_manifest); ?> </td>
                </tr>
                <tr>
                    <td width="20%">Jumlah barang</td>
                    <td width="60%">: <?php echo strtoupper($value[0]->jumlah_order); ?> </td>
                </tr>

            </table>

        

            <br>
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
            <br><br>
            <div id="barcodeTarget" class="barcodeTarget" style="float: right"></div>
        </div>    
    <!-- end content here -->
    </div>
  </body>
</html>