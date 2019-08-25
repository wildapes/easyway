<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easyway - Accounting Application</title>
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <!-- for modal load first time on page load -->
    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    
    <?php if(empty($_POST)){ ?>
    <script>
       $(window).load(function(){        
       $('#myModal').modal('show');
        }); 
    </script>
    <?php } ?>

</style>
</head>
<body>

<div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('coa/'.$this->uri->segment('2')); ?>" class="a btn-link d-print-none" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <?php 
                              $nama_perusahaan = $detail->row()->nama_perusahaan;
                            ?>
                            <center><h3><?php echo $nama_perusahaan ; ?></h3></center>
                            <center><h5>Laporan Laba Rugi</h5></center>
                            <?php if(!empty($_POST)){ 
                                $periode1_v = $this->input->post('periode1');
                                $periode2_v = $this->input->post('periode2');
                                ?>
                            <center><h7><?php echo "periode ".$periode1_v." sampai ".$periode2_v ?></h7></center>
                            <?php } ?>
                        </div>
                        <div style="float:left; margin-top: 15px; margin-bottom: -5px" class="col-md-12">
                              <button name="reset" class="btn btn-info d-print-none" data-toggle="modal" data-target="#myModal" id="new_button">Pilih Periode &nbsp; <i class="fa fa-calendar"></i></button>
                                <button onclick="window.print()" name="reset" class="btn btn-secondary d-print-none" >Print to PDF &nbsp; <i class="fa fa-print"></i></button>
                        </div>
                        <hr style="margin: 12px; border-width: 5px">
                    
                        <div class="card-body">
                      
                        <?php if(!empty($_POST)){ 
                            $periode1_v = $this->input->post('periode1');
                            $periode2_v = $this->input->post('periode2');
                            $periode1 =date('Y-m-d',strtotime($periode1_v));
                            $periode2 =date('Y-m-d',strtotime($periode2_v));
                        ?>
                        <table class="table" border=0>
                            <tbody>
                                <h5>Pendapatan / income</h5>    
                                <?php foreach ($query_income as $list_i => $key_i) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_i->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                 ?>
                                <tr>
                                    <td style="width: 30%"><?php echo $key_i->deskripsi_coa ?></td>
                                    <td style="width: 20%" class="points" align="right"><?php echo abs($query_b->row()->debit - $query_b->row()->kredit); ?></td>
                                    <td style="width : 15%"></td>
                                    <td style="width: 15%" align="right"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_i->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary d-print-none">Detail</a></td>
                                </tr>
                                <?php } 
                                ?>
                                <?php $total_income = abs($total_income->row()->debit - $total_income->row()->kredit); ?>
                                    <td style="border: 0; width : 55%" ><b>Total Pendapatan / Income<b> </td>
                                    <!-- <td style="border:0px;"></td> -->
                                    <td class="points" colspan="3" style="border:0px; width : 40%;" align="right"><b>Rp. <?php echo $total_income ?></b></td>
 
                            </tbody>
                        </table>

                        <table class="table" border=0>
                            <tbody>
                                <h5>Harga Pembelian / cost of sales</h5>    
                                <?php foreach ($query_cost as $list_c => $key_c) {

                                    $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_c->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1'  
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                 ?>
                                <tr>
                                    <td style="width: 30%" colspan="2"><?php echo $key_c->deskripsi_coa ?></td>
                                    <!-- <td></td> -->
                                    <!-- <td></td> -->
                                    <td class="points" align="right"  style="width: 20%"><?php echo ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%"></td>
                                    <td align="right" style="width: 15%"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_c->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary d-print-none">Detail</a></td>
                                    <!-- <td>&nbsp;</td> -->
                                   

                                </tr>
                                <?php } ?>
                                <?php $total_cost = ($total_cost->row()->debit - $total_cost->row()->kredit) ?>
                                    <td style="border: 0; width : 30%" colspan="2"><b>Total Harga Pembelian / cost of sales<b> </td>
                                    <!-- <td style="border:0px;"></td> -->
                                    <td class="points" colspan="3" style="border:0px; width : 55%;" align="right" align="right">
                                        <b>Rp. <?php echo $total_cost ?></b></td>
                                
                            </tbody>
                                    <tr>
                                        <td style="width: 55%"><b>Laba Kotor / Gross Profit</b></td>
                                        <!-- <td></td> -->
                                        <td colspan="4" class="points" align="right"><b>Rp. <?php echo $total_income - $total_cost; ?></b></td>
                                    </tr>

                        </table>
                        
                        <table class="table" border=0>
                            <tbody>
                                <h5>Biaya yang dikeluarkan / expenses</h5>    
                                <?php foreach ($query_expenses as $list_e => $key_e) {

                                    $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_e->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1'  
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                 ?>
                                <tr>
                                    <td style="width: 30%"><?php echo $key_e->deskripsi_coa ?></td>
                                    <!-- <td></td> -->
                                    <td class="points" align="right" style="width: 20%"><?php echo $query_b->row()->debit - $query_b->row()->kredit ?></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 15%" align="right"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_e->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary d-print-none">Detail</a></td>                                   

                                </tr>
                                <?php } ?>
                                <?php $total_expenses = $total_expenses->row()->debit - $total_expenses->row()->kredit ?>
                                    <td style="border: 0; width : 55%" ><b>Total Biaya dikeluarkan / expenses<b> </td>
                                    <!-- <td style="border:0px;"></td> -->
                                    <td colspan="3" class="points" style="border:0px;" align="right"><b>Rp. <?php echo $total_expenses; ?></b></td>

                            </tbody>
                                <tr>
                                    <td style="width: 55%"><b>Laba Bersih / Net Income</b></td>
                                    <!-- <td style="border:0px;"></td> -->
                                    <td colspan="4" style="width: 20%;" class="points border-bottom-class" align="right"><h6 style ="border-bottom: 4px double; width: 165px"><b>Rp. <?php echo ($total_income - $total_cost) - $total_expenses; ?></b></h6></td>
                                </tr>

                        </table>    
                    <?php } ?>
                        </div></div></div></div></div></div></div>
                         <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                    <form action="" method="post">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Pilih Periode</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                <label>Dari tanggal</label>
                                </div>
                                <div class="col-md-8">
                                <select type="text" class="form-control" name="periode1">
                                    <?php
                                        foreach($detail->result() as $list){
                                        $sales_due_date = $list->tanggal_awal;
                                        // create a time stamp of the date
                                        $time = strtotime($sales_due_date);
                                        for($i=0;$i<24;$i++){
                                        // convert timestamp back to date string
                                        $date = date('d-m-Y', $time);
                                        $due_dates[] = $date;
                                        // move to next timestamp
                                        $time = strtotime('+1 month', $time);
                                    ?>
                                    <option value="<?php echo $date; ?>">
                                        Periode <?php echo sprintf('%02d', $i+1); ?>,&nbsp; <?php echo $date; ?></option>
                                    <?php }} ?>
                                </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-md-4">
                                <label>Sampai</label>
                                </div>
                                <div class="col-md-8">
                                <select type="text" class="form-control" name="periode2">
                                    <?php
                                        foreach($detail->result() as $list){
                                        $sales_due_date = $list->tanggal_awal;
                                        // create a time stamp of the date
                                        $time = strtotime($sales_due_date);
                                        for($i=0;$i<24;$i++){
                                        // convert timestamp back to date string
                                        $date = date('t-m-Y', $time);
                                        $due_dates[] = $date;
                                        // move to next timestamp
                                        $time = strtotime('+1 month', $time);
                                    ?>
                                    <option value="<?php echo $date; ?>">
                                        Periode <?php echo sprintf('%02d', $i+1); ?>,&nbsp; <?php echo $date; ?></option>
                                    <?php }} ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info" name="range_periode">Lihat data</button>
                        </div>
                      </div>
                    </form>

                    </div><!-- modal dialog -->
                  </div>  <!-- end of modal -->      

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
