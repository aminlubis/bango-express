
<div class="row">
<!-- content here -->
    <div class="col-sm-12">

        <div class="page-header">
        <h1>
            <?php echo $title?>
            <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?php echo isset($breadcrumbs)?$breadcrumbs:''?>
            </small>
        </h1>
        </div>
        
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
                <tr>
                    <td width="120px" colspan="2"><hr></td>
                </tr>

                <tr>
                    <td width="120px" colspan="2">
                        <a href="#" class="btn btn-xs btn-success" onclick="PopupCenter('transaksi/T_create_order/preview_resi/<?php echo $value->id?>', 'CETAK RESI', 500, 450)"><i class="fa fa-print"></i> Cetak Resi</a>
                    </td>
                </tr>

                
            </table>
        </div>

        <div class="col-sm-6 no-padding">
        <left><b>LOG PENGIRIMAN BARANG</b></left>
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
<!-- end content here -->
</div>
