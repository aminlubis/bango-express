<div class="row">
<!-- content here -->
    <div class="col-sm-12">
        <table width="100%" border="0">
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