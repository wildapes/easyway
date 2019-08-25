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
                            <center><h5>Laporan Neraca Keuangan</h5></center>
                            <?php if(!empty($_POST)){ 
                                $periode1_v = $this->input->post('periode1');
                                $periode2_v = $this->input->post('periode2');
                                ?>
                            <center><h7><?php echo "Periode ".$periode2_v ?></h7></center>
                            <?php }else{
                                $periode1_v = "error";
                                $periode2_v = "";
                            } ?>
                        </div>
                        <div style="float:left; margin-top: 15px; margin-bottom: -5px" class="col-md-12">
                              <button name="reset" class="btn btn-info d-print-none" data-toggle="modal" data-target="#myModal" id="new_button">Pilih Periode &nbsp; <i class="fa fa-calendar"></i></button>
                                <a href="" onclick="window.print()" name="reset" class="btn btn-secondary d-print-none" >Print to PDF &nbsp; <i class="fa fa-print"></i></a>
                        </div>
                        <hr style="margin: 12px; border-width: 5px">
                    
                        <div class="card-body">
                      
                        <?php if(!empty($_POST)){ 
                            $periode1_v = $this->input->post('periode1');
                            $periode2_v = $this->input->post('periode2');
                            $periode1 =date('Y-m-d',strtotime($periode1_v));
                            $periode2 =date('Y-m-d',strtotime($periode2_v));
                        ?>
                        <div class="col-md-6">
                        <table class="table" border=0>
                            <tbody>
                                <center><h3>Aktiva / Assets</h3></center><br>
                                <h5>Aset Lancar / Current Assets</h5>    
                                <?php foreach ($query_ca as $list_ca => $key_ca) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_ca->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                //menentukan nilai beginning balance / saldo awal
                                
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                    $balance = $key_ca->balance ;      
                                }else{
                                    $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                    $id_perusahaan = $this->uri->segment('2');
                                    $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_ca->id_coa'  
                                    ");
                                      $query1 = $this->db->query($sql1);
                                             
                                    $balance = $key_ca->balance + ($query1->row()->debit - $query1->row()->kredit);
                                }
                                //
                                 ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_ca->deskripsi_coa ?></a></td>
                                    <td class="points" style="width : 20%" align="right"><?php echo $balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right"></td>
                                    <td align="right"><a href="<?php echo base_url()."detail/$key_ca->id_perusahaan/$key_ca->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary d-print-none" target="_blank">detail</a></td>

                                </tr>
                                <?php } 
                                ?>
                                <?php 
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                    $total_balance = $balance_ca->row()->balance;      
                                } else{
                                    $total_balance = $balance_ca->row()->balance + ($total_beginning_ca->row()->debit - $total_beginning_ca->row()->kredit);

                                }
                                    $total_ca = ($total_ca->row()->debit - $total_ca->row()->kredit) + $total_balance; ?>
                                    <td style="border: 0; width : 55%" ><b>Total Aset Lancar / Current Assets<b> </td>
                                    <!-- <td  style="border:0px;" align="right"></td> -->
                                    <td class="points" colspan="3" style="border:0px; width : 30%;" align="right"><b>Rp. <?php echo $total_ca ?></b></td>
                            </tbody>
                        </table>
                        <table class="table" border=0>
                            <tbody>
                                <h5>Properti dan Peralatan / Property and Equipment</h5>    
                                <?php foreach ($query_p as $list_p => $key_p) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_p->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                 
                                 //menentukan nilai beginning balance / saldo awal
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                    $balance = $key_p->balance ;      
                                }else{
                                    $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                    $id_perusahaan = $this->uri->segment('2');
                                    $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_p->id_coa'  
                                    ");
                                      $query1 = $this->db->query($sql1);
                                             
                                    $balance = $key_p->balance + ($query1->row()->debit - $query1->row()->kredit);
                                }
                                 ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_p->deskripsi_coa ?></td>
                                    <td class="points" style="width : 20%" align="right"><?php echo $balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right"></td>
                                    <td align="right"><a href="<?php echo base_url()."detail/$key_p->id_perusahaan/$key_p->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary d-print-none" target="_blank">detail</a></td>
                                </tr>
                                <?php } 
                                ?>
                                <?php 
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                    $total_balance = $balance_p->row()->balance;      
                                } else{
                                    $total_balance = $balance_p->row()->balance + ($total_beginning_p->row()->debit - $total_beginning_p->row()->kredit);

                                }
                                    // $total_ca = ($total_ca->row()->debit - $total_ca->row()->kredit) + $total_balance; 
                                    $total_p = ($total_p->row()->debit - $total_p->row()->kredit) + $total_balance; ?>
                                    <td style="border: 0; width : 55%" ><b>Total Property and Equipment<b> </td>
                                    <!-- <td style="border:0px;" align="right"></td> -->
                                    <td class="points" colspan="3" style="border:0px; width : 30%;" align="right"><b>Rp. <?php echo $total_p ?></b></td>
                            </tbody>
                        </table>
                        <table class="table" border=0>
                            <tbody>
                                <h5>Asset Lainnya / Other Asset</h5>    
                                <?php foreach ($query_o as $list_o => $key_o) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_o->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                //menentukan nilai beginning balance / saldo awal
                                        if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                            $balance = $key_o->balance ;      
                                        }else{
                                            $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                            $id_perusahaan = $this->uri->segment('2');
                                            $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_o->id_coa'  
                                            ");
                                              $query1 = $this->db->query($sql1);
                                                     
                                            $balance = $key_o->balance + ($query1->row()->debit - $query1->row()->kredit);
                                        }
                                 ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_o->deskripsi_coa ?></td>
                                    <td style="width : 20%" align="right"><?php echo $balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right"></td>
                                    <td class="d-print-none" style="width : 15%" align="right"><a href="<?php echo base_url()."detail/$key_o->id_perusahaan/$key_o->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary" target="_blank">detail</a></td>
                                </tr>
                                <?php } 
                                ?>
                                <?php 
                                    if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $total_balance = $balance_o->row()->balance;      
                                    } else{
                                        $total_balance = $balance_o->row()->balance + ($total_beginning_o->row()->debit - $total_beginning_o->row()->kredit);
                                    }

                                    $total_o = ($total_o->row()->debit - $total_o->row()->kredit) + $total_balance; ?>
                                    <td style="width: 55%"><b>Total Aset Lainnya<b> </td>
                                     <td align="right"></td>
                                    <td colspan="2" align="right"><b>Rp. <?php echo $total_o ?></b></td>
                            </tbody>
                                <tr>
                                    <td><b>Total Aset</b></td>
                                    <!-- <td><b></b></td> -->
                                    <td class="points" colspan = "3" align="right"><h6 style="border-bottom: 4px double; width: 165px"><b>Rp. <?php echo $total_ca + $total_p + $total_o; ?></b></h6></td>
                                </tr>
                        </table>
                        </div>



                        <div class="col-md-6">
                        <table class="table" border=0>
                            <tbody>
                                <center><h3>Pasiva / Liabilities and Capital</h3></center><br>
                                <h5>Kewajiban saat ini / Current Liabilities</h5>    
                                <?php foreach ($query_li as $list_li => $key_li) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_li->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                
                                //menentukan nilai beginning balance / saldo awal
                                    if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $balance = $key_li->balance ;      
                                    }else{
                                        $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                        $id_perusahaan = $this->uri->segment('2');
                                        $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_li->id_coa'  
                                        ");
                                        $query1 = $this->db->query($sql1);
                                                     
                                        $balance = $key_li->balance + ($query1->row()->debit - $query1->row()->kredit);
                                        }
                                
                                // jangan dihapus buat di real project
                                // if($query_b->row()->debit == NULL OR $query_b->row()->debit == 0){
                                //     continue;
                                // }

                                 ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_li->deskripsi_coa ?></td>
                                    <td class="points" style="width : 20%" align="right"><?php echo abs($balance + ($query_b->row()->debit - $query_b->row()->kredit)) ?></td>
                                    <td align="right" style="width : 15%"></td>
                                    <td align="right" style="width : 15%"><a href="<?php echo base_url()."detail/$key_li->id_perusahaan/$key_li->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary d-print-none" target="_blank">detail</a></td>
                                </tr>
                                <?php } 
                                ?>
                                <?php 
                                    if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $total_balance = $balance_li->row()->balance;      
                                    } else{
                                        $total_balance = $balance_li->row()->balance + ($total_beginning_li->row()->debit - $total_beginning_li->row()->kredit);
                                    }

                                    $total_li = abs($total_li->row()->debit - $total_li->row()->kredit) + $total_balance; ?>

                                    <td style=" width : 55%; border: 1;" ><b>Total Kewajiban saat ini / Current Liabilities<b> </td>
                                    <td align="right"></td>
                                    <td class="points" colspan="2" align="right"><b>Rp. <?php echo $total_li ?></b></td>
                            </tbody>
                        </table>
                        <table class="table" border=0>
                            <tbody>
                                <h5>Kewajiban Jangka Panjang / Long-Term Liabilities</h5>    
                                <?php foreach ($query_lt as $list_lt => $key_lt) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_lt->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                
                                //menentukan nilai beginning balance / saldo awal
                                    if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $balance = $key_lt->balance ;      
                                    }else{
                                        $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                        $id_perusahaan = $this->uri->segment('2');
                                        $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_lt->id_coa'  
                                        ");
                                        $query1 = $this->db->query($sql1);
                                                     
                                        $balance = $key_lt->balance + ($query1->row()->debit - $query1->row()->kredit);
                                        }
                                
                                // jangan dihapus buat di real project. hanya di neraca
                                // if($query_b->row()->debit == NULL OR $query_b->row()->debit == 0){
                                //     continue;
                                // }
                                ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_lt->deskripsi_coa ?></td>
                                    <td class="points" style="width : 20%" align="right"><?php echo $balance + ($query_b->row()->debit - $query_b->row()->kredit) ?></td>
                                    <td style="width : 15%" align="right"></td>
                                    <td style="width : 15%" align="right"><a href="<?php echo base_url()."detail/$key_lt->id_perusahaan/$key_lt->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary d-print-none" target="_blank">detail</a></td>
                                </tr>
                                <?php } 
                                ?>
                                <?php 
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $total_balance = $balance_lt->row()->balance;      
                                    } else{
                                        $total_balance = $balance_lt->row()->balance + ($total_beginning_lt->row()->debit - $total_beginning_lt->row()->kredit);
                                    }

                                    $total_lt = ($total_lt->row()->debit - $total_lt->row()->kredit) + $total_balance; 
                                ?>
                                    <td style="width : 55%"><b>Total Kewajiban Jangka Panjang / Long-Term Liabilities<b> </td>
                                    <td align="right"></td>
                                    <td class="points" colspan="2" align="right"><b>Rp. <?php echo $total_lt ?></b></td>
                            </tbody>
                            <tr>
                                    <td style="width : 55%"><b>Total Kewajiban / Liabilities</b></td>
                                    <td><b></b></td>
                                    <td class="points" colspan = "2" align="right"><b>Rp. <?php echo $total_li + $total_lt; ?></b></td>
                                </tr>
                        </table>
                        <table class="table" border=0>
                            <tbody>
                                <h5>Modal / capital</h5>    
                                <?php foreach ($query_capital as $list_capital => $key_capital) {

                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key_capital->id_coa' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
                                        ");
                                          $query_b = $this->db->query($sql_b);
                                //sidang, untuk beginning balance laba ditahan
                                        $id_perusahaan = $this->uri->segment(2);
                                        $sql_new =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tb_coa.tipe_akun = 'income'  
                                        ");
                                        $query_new = $this->db->query($sql_new);
                                        $sql_new2 =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tb_coa.tipe_akun = 'cost of sales' OR tb_coa.tipe_akun = 'expenses'  
                                        ");
                                        $query_new2 = $this->db->query($sql_new2);

                                
                                 //menentukan nilai beginning balance / saldo awal
                                    if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $balance = $key_capital->balance ;      
                                    }else{
                                        $tanggal_awal = $tgl_awal->row()->tanggal_awal;
                                        $id_perusahaan = $this->uri->segment('2');
                                        $sql1 =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tb_jurnal.id_coa = '$key_capital->id_coa'  
                                        ");
                                        $query1 = $this->db->query($sql1);

                                        $balance = $key_capital->balance + ($query1->row()->debit - $query1->row()->kredit);
                                        }
                                
                                 ?>
                                <tr>
                                    <td style="width : 55%"><?php echo $key_capital->deskripsi_coa ?></td>
                                    <td class="points"  align="right" style="width: 20%"><?php echo $balance + ($query_b->row()->debit - $query_b->row()->kredit) + ($query_new->row()->balance - $query_new2->row()->balance) ?></td>
                                    <td style="width: 15%"></td>
                                    <td align="right"><a href="<?php echo base_url()."detail/$key_capital->id_perusahaan/$key_capital->id_coa/$periode1/$periode2" ?>" class="btn-sm btn-primary d-print-none" target="_blank">detail</a></td>
                                </tr>
                                <?php } 
                                //net income
                                $total_income = abs(($total_income->row()->debit - $total_income->row()->kredit));
                                $total_cost = abs(($total_cost->row()->debit - $total_cost->row()->kredit));
                                $total_expenses = abs(($total_expenses->row()->debit - $total_expenses->row()->kredit));
                                $total_net = ($total_income - $total_cost) - $total_expenses;
                                ?>
                                
                                    <tr>
                                    <td style="width: 55%">Laba Bersih / Net Income</td>
                                    <td style="width: 20%" class="points" align="right"><?php echo $total_net; ?></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 15%"></td>
                                    <!-- <td style="width : 15%" align="right"></td> -->
                                    </tr>
                                <?php
                                // die(var_dump(substr($tgl_awal->row()->tanggal_awal, 0, 7)));
                                if(substr($periode1, 0, 7) == substr($tgl_awal->row()->tanggal_awal, 0, 7)){
                                        $total_balance = $balance_capital->row()->balance;      
                                }else{
                                        $total_balance = $balance_capital->row()->balance + ($total_beginning_capital->row()->debit - $total_beginning_capital->row()->kredit);
                                    // echo "as";
                                }       
                                        $id_perusahaan = $this->uri->segment(2);
                                        $sql_new =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tb_coa.tipe_akun = 'income'  
                                        ");
                                        $query_new = $this->db->query($sql_new);
                                        $sql_new2 =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tb_coa.tipe_akun = 'cost of sales' OR tb_coa.tipe_akun = 'expenses'  
                                        ");
                                        $query_new2 = $this->db->query($sql_new2);
                                        $total_capital = ($total_capital->row()->debit - $total_capital->row()->kredit) + $total_balance + ($query_new->row()->balance - $query_new2->row()->balance);
                                // die(var_dump($total_capital->row()->tanggal_transaksi))
                                ?>
                                    <td style="border: 0; width : 55%" ><b>Total Modal / Capital<b> </td>
                                    <!-- <td style="border:0px;" align="right"></td> -->
                                    <td class="points" colspan="4" style="border:0px;" align="right"><b>Rp. <?php echo $total_capital + $total_net; ?></b></td>
                            </tbody>
                                <tr>
                                    <td style="width: 55%"><b>Total Kewajiban & Modal / Liabilities & Capital</b></td>
                                    
                                    <td class="points" colspan = "3" align="right"><h6 style="border-bottom: 4px double; width: 165px"><b>Rp. <?php echo ($total_li + $total_lt) + ($total_capital + $total_net); ?></b></h6></td>
                                </tr>
                        </table>
                    <?php } ?>
                        
                    
                    </div>
                    </div></div></div></div></div></div>

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
                                <select type="text" class="form-control" name="periode1" readonly>
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
