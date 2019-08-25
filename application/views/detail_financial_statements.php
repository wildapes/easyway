<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Easyway - Accounting Application</title>
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url()."asset/css/1-col-portfolio.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/normalize.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/font-awesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/themify-icons.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/flag-icon.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/cs-skin-elastic.css"; ?>">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/widgets.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/style.css"; ?>">

    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>


</head>
<body class="open">
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('coa/'.$this->uri->segment('2')); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <?php 
                        $nama_perusahaan = $detail_pt->row()->nama_perusahaan;
                        ?>
                        <h1><?php echo $nama_perusahaan; ?></h1>
                    </div>
                </div>
            </div>
        </div>
<form action="" method="post">
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <center><h3><?php echo $nama_perusahaan; ?></h3></center>
                            <center><h5>Detail Financial Statements</h5></center>
                            <?php 
                                $periode1_v = $this->uri->segment('4');
                                $periode2_v = $this->uri->segment('5');
                                $periode1 =date('d-m-Y',strtotime($periode1_v));
                                $periode2 =date('d-m-Y',strtotime($periode2_v));
                             ?>
                            <center><h7><?php echo "periode ".$periode1." sampai ".$periode2 ?></h7></center>
                        </div>
                        <br>
                        <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="background-color: lightgrey;">
                      <tr>
                        <th>No Account<br>Account Description</th> 
                        <th>Date</th>
                        <th>Reference</th>
                        <th>Trans description</th>
                        <th>Debit Amount</th>
                        <th>Credit Amount</th>
                        <th>Balance</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    if(empty($detail->result())){
                     if(substr($periode1_v, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){ ?>
                        <tr>
                            <td><?php echo $nama_coa->row()->no_account."<br>".$nama_coa->row()->deskripsi_coa; ?></td>
                            <td colspan="5"><b>Beginning balance / Saldo Awal</b></td>
                            <td class = "points"><?php echo $beginning_balance->row()->balance; if($beginning_balance->row()->balance == NULL){echo '0'; }?></td>
                            <td></td>
                        </tr>
                    <?php }else{ ?>
                        <tr>
                            <td><?php echo $nama_coa->row()->no_account."<br>".$nama_coa->row()->deskripsi_coa ?></td>
                            <td colspan="5"><b>Beginning balance / Saldo Awal</b></td>
                            <td class = "points"><?php echo $beginning_balance->row()->balance + ($total_beginning->row()->debit - $total_beginning->row()->kredit); ?></td>
                            <td></td> 
                        </tr>
                    <?php }
                    }else{
                        if(substr($periode1_v, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){ ?>
                        <tr>
                            <td colspan="6"><b>Beginning balance / Saldo Awal</b></td>
                            <td class = "points"><?php echo $beginning_balance->row()->balance; if($beginning_balance->row()->balance == NULL){echo '0'; }?></td>
                            <td></td>
                        </tr>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="6"><center><b>Beginning balance / Saldo Awal</b></center></td>
                            <td class = "points"><?php echo $beginning_balance->row()->balance + ($total_beginning->row()->debit - $total_beginning->row()->kredit); ?></td>
                            <td></td> 
                        </tr>
                    <?php }
                    } ?>

                        <?php
                        $groupedRows = array();

                        foreach ($detail->result_array() as $result) {
                         $groupBy = $result['no_account'].'<br>'.$result['deskripsi_coa']; 
                             $groupedRows[$groupBy][] = $result;
                         }

                        $displayed = array();
                        foreach ($groupedRows as $groupedBy => $group) {
                        $rowSpan = count($group);
                        ?>
                        <?php foreach ($group as $result) {
                        echo "<tr>";
                        if (empty($displayed[$groupedBy])){
                        $displayed[$groupedBy] = true;
                        echo"<td rowspan='".$rowSpan."' width=15%>" . $groupedBy."</td>";
                        }

                        echo"<td align=left> " . $result['tanggal_transaksi'] . "</td>";
                        echo"<td align=left> " . $result['refrensi'] . "</td>";
                        // echo"<td align=left> &nbsp; &nbsp;" . $result['refrensi'] . "</td>";
                        echo"<td align=left> &nbsp; &nbsp;" . $result['deskripsi_jurnal'] . "</td>";
                        echo"<td class=points align=left> " . $result['debit'] . "</td>";
                        echo"<td class=points align=left> " . $result['kredit'] . "</td>";
                        echo"<td align=left> " . "</td>"; ?>
                        <td align='center'><a href='' onclick="window.open('<?php echo base_url().'journal_detail/'.$result["id_perusahaan"].'/'.$result["id_inputan"]; ?>', 'newwindow', 'width=1100, height=650,'); return false;" class='btn-sm btn-primary'>Detail</a></td>
                        <?php echo "</tr>";
                        }
                        } ?>
                        <?php 
                        $id_perusahaan = $this->uri->segment('2');
                        $id_coa = $this->uri->segment('3');
                        $periode1 = $this->uri->segment('4');
                        $periode2 = $this->uri->segment('5');
                        $sql =(" SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal WHERE id_perusahaan = '$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND id_coa = '$id_coa'
                                ");
                                 $query = $this->db->query($sql);
                                 $debit = $query->row()->debit;
                                 // die(var_dump($debit));
                                 $kredit = $query->row()->kredit; 
                                 if(substr($periode1_v, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                    $beginning_balance = $beginning_balance->row()->balance;
                                 }else{
                                    $beginning_balance = $beginning_balance->row()->balance + ($total_beginning->row()->debit - $total_beginning->row()->kredit);
                                 }
                                 ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Current Period Change</b></td>
                            <td class = "points"><?php echo $debit; ?></td>
                            <td class = "points"><?php echo $kredit; ?></td>
                            <td class = "points"><?php echo $debit - $kredit; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3"><b>Saldo Akhir / Ending Balance</b></td>
                            <td class = "points"><?php echo $beginning_balance + ($debit - $kredit); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                  </table>
                  <table id="header-fixed"></table>
</form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->




    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/popper.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/main.js"; ?>"></script>

    <!--  Chart js -->
    <script src="<?php echo base_url()."asset/js/lib/chart-js/Chart.bundle.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/widgets.js"; ?>"></script>

</body>
<script>
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }
    $('.points').each(function(){
    var v_pound = $(this).html();
    v_pound = numberWithCommas(v_pound);

    $(this).html(v_pound)
        
        })

</script>

</html>
