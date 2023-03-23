<style>
.table-utama{
  border: 1px solid grey;
  border-collapse: collapse;
}
th, td {
  padding: 2px;
  text-align: left;
}

</style>
<div class="row">
<!-- content here -->
    <div class="col-sm-12">
        <p style="font-weight: bold; font-size: 14px">MANIFEST DATA (<?php echo $kode_wilayah; ?>)</p>
        <table class="table-utama" style="width: 100% !important;margin-top: 10px; margin-bottom: 10px; padding: 5px" border="1">
            <thead>
                <tr style="background: #e4e4e4a1">
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
