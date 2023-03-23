
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<script>
function printpage() {
    //Get the print button and put it into a variable
    var printButton = document.getElementById("btn-print");
    //Set the print button visibility to 'hidden' 
    printButton.style.visibility = 'hidden';
    //Print the page content
    window.print()
    printButton.style.visibility = 'visible';
}
</script>
<div id="btn-print" style="padding: 20px">
  <a href="#" class="btn btn-xs btn-primary" onclick="printpage()"><i class="fa fa-print"></i> Print Invoice</a>
</div>

<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
          <div class="widget-body">
            <div class="widget-main">
              <div class="col-md-3" style="width: 40%; margin-top: 43px; margin-left: 35px; float: left;">
                <table style ="width: 100%" >
                  <tr>
                    <td colspan="2" class="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" style="width: 50%; padding-left: 10px;"><?php echo $value->invoice_no?></td>
                    <td align="left" style="width: 50%; padding-left: 28px;"><?php echo number_format($value->amount)?></td>
                  </tr>
                  <?php for($i=1; $i<11; $i++) :?>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php endfor; ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="left" style="padding-left: 28px; padding-top: 3px;"><?php echo number_format($value->amount)?></td>
                  </tr>

                </table>
                <br><br>
                <table style="width: 100%">
                  <tr>
                    <td colspan="2" class="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" style="width: 50%; padding-left: 80px; padding-top: 5px;"><?php echo $value->check_no?></td>
                    <td align="left" style="width: 50%; padding-left: 30px; padding-top: 5px;"><?php echo number_format($value->check_amount)?></td>
                  </tr>
                  <?php for($i=1; $i<6; $i++) :?>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php endfor; ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="left" style="padding-left: 30px; padding-top: 2px "><?php echo number_format($value->check_amount)?></td>
                  </tr>

                </table>

              </div>

              <div class="col-md-9" style="width: 55%; float: right; margin-top: -3px; ">
                  <br>
                  <br>
                  <br>
                  <br>
                    <table  style="width: 100%; line-height: 20px">
                      <tr>
                        <td style="width: 55%">&nbsp;</td>
                        <td style="width: 45%; padding-left: 75px;" align="left"> <?php echo $value->letter_no?></td>
                      </tr>
                      <tr>
                        <td style="width: 55%">&nbsp;</td>
                        <td style="width: 45%" align="left"><?php echo $this->tanggal->formatDate($value->invoice_date)?></td>
                      </tr>

                      <tr>
                        <td colspan="2" style="padding-top: 10px; line-height: 30px !important">
                          <span style="padding-left: 100px"><?php echo strtoupper($value->received_from)?> <br></span>
                          <span style="padding-left: 10px; width: 100%; "><?php echo ucwords($value->address)?></span>
                        </td>
                      </tr>

                      <tr><td colspan="2">&nbsp;</td></tr>
                      <tr><td colspan="2">&nbsp;</td></tr>
                      <tr><td colspan="2">&nbsp;</td></tr>
                      <tr><td colspan="2">&nbsp;</td></tr>
                      <!-- jumlah -->
                      <?php 
                        $jumlah_all = $value->amount + $value->check_amount;
                      ?>
                      <tr>
                        <td colspan="2" style="padding-top: 35px;min-height: 100px; font-style: italic">
                         <?php $terbilang = new Kuitansi(); echo ucwords($terbilang->terbilang($jumlah_all))?> Rupiah
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 55%"></td>
                        <td style="width: 45%; padding-left: 8px;" align="left"><?php echo number_format($jumlah_all) ?></td>
                      </tr>

                    </table>
              </div>

            </div>
          </div>
    
    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

