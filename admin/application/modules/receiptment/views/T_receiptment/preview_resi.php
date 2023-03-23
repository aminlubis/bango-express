<script src="<?php echo base_url().'assets/barcode-master/prototype/sample/prototype.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/barcode-master/prototype/prototype-barcode.js'?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

<script type="text/javascript">

window.onload = generateBarcode;

  function generateBarcode(){

    $("barcodeTarget").update();
    var value = "<?php echo $value->no_order; ?>";
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

<body>
  <div id="barPrint" style="float: right">
    <button class="tular" onClick="window.close()">Tutup</button>
    <button class="tular" onClick="print()">Cetak</button>
  </div>

  
  
  <div class="col-sm-12 no-padding">
    <table width="100%" border="0">
      <tr>
        <td width="200px" align="center"><img src="<?php echo base_url().PATH_IMG_DEFAULT.$app->app_logo?>" alt="" width="200px"></td>
      </tr>
    </table>
    <div style="padding: 4px">
      <small><i><b>No. Order : </b></i></small>
      <h2><b><?php echo strtoupper($value->no_order)?></b> <small style="font-size: 12px"><i><?php echo $this->tanggal->formatDateTime($value->tgl_order); ?></i></small></h2>
      <?php echo $value->nama_jenis_pengiriman?><br>
    </div>
    <table class="table-custom" style="width: 100% !important">
        <tr>
            <td width="30%">Kategori/Jenis</td>
            <td width="60%">: <?php echo $value->nama_kategori_barang; ?> / <?php echo $value->nama_jenis_barang; ?></td>
        </tr>

        <tr>
            <td width="30%">Luas Volume</td>
            <td width="60%">: <?php echo $value->luas_volume; ?> m2</td>
        </tr>

        <tr>
            <td width="30%">Berat Barang</td>
            <td width="60%">: <?php echo $value->berat_kg; ?> kg</td>
        </tr>

        <tr>
            <td width="30%">Note</td>
            <td width="60%">: <b><?php echo $value->note_pengirim; ?></b></td>
        </tr>

        <tr>
            <td width="30%">Kota Asal</td>
            <td width="60%">: <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_pengirim)?> </td>
        </tr>

        <tr>
            <td width="30%">Kota Tujuan</td>
            <td width="60%">: <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_penerima)?> </td>
        </tr>
        <tr>
            <td width="100%" colspan="2"><hr></td>
        </tr>

    </table>

    <table class="table-custom" style="width: 100% !important">

        <tr>
            <td width="30%" colspan="2"><b>PENGIRIM</b></td>
        </tr>

        <tr>
            <td width="30%">Nama Pengirim</td>
            <td width="60%">:  <?php echo strtoupper($value->nama_pengirim)?> No. Telp (<?php echo $value->tlp_pengirim; ?>) </td>
        </tr>

        <tr>
            <td width="30%">Alamat</td>
            <td width="60%">: <?php echo $value->alamat_pengirim; ?> </td>
        </tr>

        <tr>
            <td width="30%" colspan="2"><b>PENERIMA</b></td>
        </tr>

        <tr>
            <td width="30%">Nama Penerima</td>
            <td width="60%">:  <?php echo strtoupper($value->nama_penerima)?> No. Telp (<?php echo $value->tlp_penerima; ?>) </td>
        </tr>

        <tr>
            <td width="30%">Alamat</td>
            <td width="60%">: <?php echo $value->alamat_penerima; ?> </td>
        </tr>

    </table>

    <div id="barcodeTarget" class="barcodeTarget"></div>

  </div>
  <hr>

</body>