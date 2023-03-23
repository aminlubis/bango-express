
<div class="row">
<!-- content here -->
    <div class="col-sm-12">

        
    <h2><b><?php echo strtoupper($value->code)?></b></h2>
    Tgl Request. <?php echo $this->tanggal->formatDateTime($value->request_date); ?><br>
    <?php echo strtoupper($value->name)?>  (<?php echo $value->telp; ?>)<br>
    <?php echo $value->pickup_location; ?><br><?php echo $value->address_detail; ?>
    <div id="barcodeTarget" class="barcodeTarget"></div>

        <hr>
        <!-- data pengirim -->
        <div class="col-sm-6 no-padding">
            <table class="table-custom" >
                <tr>
                    <td width="120px">Kategori/Jenis</td>
                    <td>: <?php echo $value->nm_jenis_brg; ?></td>
                </tr>

                <tr>
                    <td width="120px">Qty</td>
                    <td>: <?php echo $value->qty; ?></td>
                </tr>

                <tr>
                    <td width="120px">Note</td>
                    <td>: <b><?php echo $value->note; ?></b></td>
                </tr>
                <tr>
                    <td width="120px" colspan="2"><hr></td>
                </tr>

                <tr>
                    <td width="120px" colspan="2"><b>Pick Up</b></td>
                </tr>

                <tr>
                    <td width="120px">Kurir</td>
                    <td>:  <?php echo strtoupper($value->nama_kurir)?></td>
                </tr>
                <tr>
                    <td width="120px">Pick Up Time</td>
                    <td>:  <?php echo $this->tanggal->formatDateTime($value->pickup_time)?></td>
                </tr>

                
            </table>
        </div>



    </div>    
<!-- end content here -->
</div>
