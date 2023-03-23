<div class="row" style="background-color: #0e7aa41f">
<!-- content here -->
    <div class="col-sm-12">
        <!-- data pengirim -->
        <div class="col-sm-2">
            <address>
                <b>PENGIRIM</b><br>
                <?php echo strtoupper($value->nama_pengirim)?> <br>
                (<?php echo $value->tlp_pengirim; ?>)<br>
                <?php echo $value->alamat_pengirim; ?>
            </address>
        </div>

        <div class="col-sm-2">
            <address>
                <b>PENERIMA</b><br>
                <?php echo strtoupper($value->nama_penerima)?> <br> (<?php echo $value->tlp_penerima; ?>)<br>
                <?php echo $value->alamat_penerima; ?>
            </address>
        </div>

        <div class="col-sm-8">
            <div class="col-sm-5">
                <b>LOKASI PICK UP</b><br>
                <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_pengirim)?><br>
                <i class="fa fa-user red"></i> <?php echo strtoupper($value->nama_kurir_pickup)?> <br> 
                <i class="fa fa-history blue"></i> <?php echo $this->tanggal->formatDateTime($value->pickup_time)?>
            </div>
            <div class="col-sm-5">
                <b>TUJUAN PENGIRIMAN</b><br>
                <i class="fa fa-map-marker green"></i> <?php echo strtoupper($value->kel_penerima)?><br>
                <i class="fa fa-user red"></i> <?php echo strtoupper($value->nama_kurir_pickup)?> <br> 
                <i class="fa fa-history blue"></i> <?php echo $this->tanggal->formatDateTime($value->estimasi_waktu)?> <br>(Estimasi waktu sampai)
            </div>
            <!-- <div class="col-sm-2">
                <b>TIPE KIRIM</b><br>
                <b></i>"Direct"</i></b> 
                <BR>(Kirim Langsung ke Alamat Tujuan)
            </div> -->
        </div>

    </div>    
<!-- end content here -->
</div>

<div class="row">
    <center><b>LOG PENGIRIMAN BARANG</b></center>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <?php foreach($log as $keylog=>$rowlog) : ?>
        <div class="timeline-container timeline-style2">
            <span class="timeline-label">
                <b><?php echo $this->tanggal->formatDate($keylog);?></b>
            </span>

            <div class="timeline-items">
                
                <?php foreach($rowlog as $subrow) : ?>
                <div class="timeline-item clearfix">
                    <div class="timeline-info">
                        <span class="timeline-date"><?php echo $this->tanggal->formatDateTimeToTime($subrow->created_date)?></span>

                        <i class="timeline-indicator btn btn-info no-hover"></i>
                    </div>

                    <div class="widget-box transparent">
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <?php echo $subrow->keterangan; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div><!-- /.timeline-items -->
        </div>
        <?php endforeach; ?>

    </div>
</div>
