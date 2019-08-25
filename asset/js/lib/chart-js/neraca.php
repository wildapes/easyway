<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
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
</head>
<body>

        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url(); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <?php 
                        // $nama_perusahaan = $detail_pt->row()->nama_perusahaan;
                        ?>
                        <!-- <h1><?php echo $nama_perusahaan; ?></h1> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <center><h3>General Ledger</h3></center>
                            <?php if(!empty($_POST)){ 
                                $periode1_v = $this->input->post('periode1');
                                $periode2_v = $this->input->post('periode2');
                                ?>
                            <center><h7><?php echo "periode ".$periode1_v." sampai ".$periode2_v ?></h7></center>
                            <?php } ?>
                        </div>
                        <div style="float:left; margin-top: 15px; margin-bottom: -5px" class="col-md-12">
                              <button name="reset" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="new_button">Pilih Periode &nbsp; <i class="fa fa-calendar"></i></button>
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
                                    <td style="width : 60%"><?php echo $key_i->deskripsi_coa ?></td>
                                    <td style="width : 15%" align="right"><?php echo $key_i->balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td align="right" style="width : 15%">0.33</td> 
                                    <td align="center"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_i->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary"><i class="fa fa-link" align="right"></i>&nbsp;Detail</a></td> 
                                </tr>
                                <?php } 
                                ?>
                                <?php $total_income = ($total_income->row()->debit - $total_income->row()->kredit) + $balance_income->row()->balance; ?>
                                    <td style="border: 0; width : 60%" ><b>Total Pendapatan / Income<b> </td>
                                    <td style="border:0px; width : 15%;" align="right"><b>Rp. <?php echo $total_income ?></b></td>
                                    <td style="border:0px; width : 15%" align="right">100</td>
                                    <td style="border:0px; width : 15%" align="right"></td>       

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
                                    <td style="width : 60%"><?php echo $key_c->deskripsi_coa ?></td>
                                    <td style="width : 15%" align="right"><?php echo $key_c->balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right">0.33</td>
                                    <td align="center"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_c->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary"><i class="fa fa-link" align="right"></i>&nbsp;Detail</a></td> 


                                </tr>
                                <?php } ?>
                                <?php $total_cost = ($total_cost->row()->debit - $total_cost->row()->kredit) + $balance_cost->row()->balance; ?>
                                    <td style="border: 0; width : 60%" ><b>Total Harga Pembelian / cost of sales<b> </td>
                                    <td style="border:0px; width : 15%;" align="right"><b>Rp. <?php echo $total_cost ?></b></td>
                                    <td style="border:0px; width : 15%" align="right">100</td>
                                    <td style="border:0px; width : 15%" align="right"></td>
                            </tbody>
                                    <tr>
                                        <td><b>Laba Kotor / Gross Profit</b></td>
                                        <td align="right"><b>Rp. <?php echo $total_income - $total_cost; ?></b></td>
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
                                    <td style="width : 60%"><?php echo $key_e->deskripsi_coa ?></td>
                                    <td style="width : 15%" align="right"><?php echo $key_e->balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right">0.33</td>
                                    <td align="center"><a href="<?php echo base_url()."detail/$key_i->id_perusahaan/$key_e->id_coa/$periode1/$periode2" ?>" target="_blank" class="btn-sm btn-primary"><i class="fa fa-link" align="right"></i>&nbsp;Detail</a></td>  
                                </tr>
                                <?php } ?>
                                <?php $total_expenses = ($total_expenses->row()->debit - $total_expenses->row()->kredit)+ $balance_expenses->row()->balance; ?>
                                    <td style="border: 0; width : 60%" ><b>Total Biaya dikeluarkan / expenses<b> </td>
                                    <td style="border:0px; width : 15%;" align="right"><b>Rp. <?php echo $total_expenses; ?></b></td>
                                    <td style="border:0px; width : 15%" align="right">100</td>
                                    <td style="border:0px; width : 15%" align="right"></td>

                            </tbody>
                                <tr>
                                    <td><b>Laba Bersih / Net Income</b></td>
                                    <td align="right"><h6 style="border-bottom: 4px double;"><b>Rp. <?php echo ($total_income - $total_cost) - $total_expenses; ?></b></h6></td>
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
