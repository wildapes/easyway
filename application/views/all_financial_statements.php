<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easyway - Accounting Application</title>
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
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/style_scroll.css"; ?>">    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">


    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/bootstrap-3.3.7.min.js"; ?>"></script>
    <!-- for modal load first time on page load -->
    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    <style>
    .floatingHeader {
      position: fixed;
      top: 0;
      visibility: hidden;
    }
    </style>

<?php if(empty($_POST)){ ?>
<script>
   $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<?php } ?>
<script>
    function UpdateTableHeaders() {
       $(".persist-area").each(function() {

           var el             = $(this),
               offset         = el.offset(),
               scrollTop      = $(window).scrollTop(),
               floatingHeader = $(".floatingHeader", this)

           if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
               floatingHeader.css({
                "visibility": "visible"
               });
           } else {
               floatingHeader.css({
                "visibility": "hidden"
               });
           };
       });
    }

    // DOM Ready
    $(function() {

       var clonedHeaderRow;

       $(".persist-area").each(function() {
           clonedHeaderRow = $(".persist-header", this);
           clonedHeaderRow
             .before(clonedHeaderRow.clone())
             .css("width", clonedHeaderRow.width())
             .addClass("floatingHeader");

       });

       $(window)
        .scroll(UpdateTableHeaders)
        .trigger("scroll");

    });
  </script>
</head>
<body>

    <!-- Right Panel -->

<div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12 d-print-none">
            <a href="<?php echo base_url('coa/'.$this->uri->segment('2')); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->


        

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

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <?php 
                              $nama_perusahaan = $detail->row()->nama_perusahaan;
                            ?>
                            <center><h3><?php echo $nama_perusahaan ; ?></h3></center>
                            <center><h5> General Ledger</h5></center>
                            <?php if(!empty($_POST)){ 
                                $periode1_v = $this->input->post('periode1');
                                $periode2_v = $this->input->post('periode2');
                                ?>
                            <center><h7><?php echo "periode ".$periode1_v." sampai ".$periode2_v ?></h7></center>
                           <?php } ?>
                        </div>
                            <div style="float:left; margin-top: 15px; margin-bottom: -5px" class="col-md-12">
                              <button name="reset" class="btn btn-info d-print-none" data-toggle="modal" data-target="#myModal" id="new_button">Pilih Periode &nbsp; <i class="fa fa-calendar"></i></button>\ 
                              <button name="reset" onclick="window.print()" class="btn btn-secondary d-print-none" >Print to PDF &nbsp; <i class="fa fa-print"></i></button>
                            </div>
                        <div class="card-body">
                    <table class="persist-area table-stripped table-bordered">
                    <thead>
                      <tr class="">
                        <th style="width:11%">No Account</th> 
                        <th style="width:19%">Deskripsi Account</th>
                        <th>Balance Awal</th>
                        <th>Debit Change</th>
                        <th>Credit Change</th>
                        <th>Net Change</th>
                        <th>Ending Balance</th>
                        <th style="width:8%" class="d-print-none">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($_POST)){
                        $periode1 =date('Y-m-d',strtotime($periode1_v));
                        $periode2 =date('Y-m-d',strtotime($periode2_v));
                        $id_perusahaan = $this->uri->segment('2');
                        
                            foreach ($query2 as $list2 => $key2) {
                            $sql =(" SELECT tanggal_awal from tb_perusahaan WHERE id_perusahaan = '$id_perusahaan'
                                ");
                                  $query = $this->db->query($sql);
                                 $tanggal_awal = $query->row()->tanggal_awal;

                            if(substr($periode1, 0, 7) == substr($tanggal_awal, 0, 7)){ //memberi nilai beginning balance 
                                $beginning_balance = $key2->balance; 
                            }else{
                                $tgl_awal = $detail->row()->tanggal_awal; //dapat dari query di modal
                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, id_coa from tb_jurnal WHERE id_coa = '$key2->id_coa' AND id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tgl_awal'
                                ");
                                  $query_b = $this->db->query($sql_b);
                                  $beginning_balance = $key2->balance + ($query_b->row()->debit - $query_b->row()->kredit);
                            } //memberi nilai beginning balance
                            
                            $sql =(" SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal WHERE id_perusahaan = '$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND id_coa = '$key2->id_coa'
                                ");
                                 $query = $this->db->query($sql);
                                 $debit = $query->row()->debit;
                                 $kredit = $query->row()->kredit;
                         // ?>
                        <tr>
                            <td ><?php echo $key2->no_account; ?></td>
                            <td><?php echo $key2->deskripsi_coa; ?></td>
                            <td class="points" align="right"><?php echo $beginning_balance; ?></td>
                            <td class="points" align="right"><?php if(!empty($debit)) echo $debit; else{ echo '0'; }; ?></td>
                            <td class="points" align="right"><?php if(!empty($kredit)) echo $kredit; else{ echo '0'; } ?></td>
                            <td class="points" align="right"><?php echo $debit - $kredit; ?></td>
                            <td class= "points" align="right"><?php echo $beginning_balance + ($debit - $kredit); ?></td>
                            <td align="center" class="d-print-none"><a href="" onclick="window.open('<?php echo base_url()."detail/$id_perusahaan/$key2->id_coa/$periode1/$periode2" ?>', 'newwindow', 'width=1100, height=650,'); return false;" class="btn-sm btn-primary">Detail</a></td>
                        </tr>
                        <?php 
                         } //end of foreach ?>
                         <?php 
                         $sql =(" SELECT tanggal_awal from tb_perusahaan WHERE id_perusahaan = '$id_perusahaan'
                                ");
                                  $query = $this->db->query($sql);
                                 $tanggal_awal = $query->row()->tanggal_awal;

                            if(substr($periode1, 0, 7) == substr($tanggal_awal, 0, 7)){ //memberi nilai beginning balance 
                                $total_beginning_balance = $total_balance->row()->balance; 
                            }else{
                                $tgl_awal = $detail->row()->tanggal_awal; //dapat dari query di modal
                                $sql_b =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_coa.id_coa = tb_jurnal.id_coa WHERE tb_jurnal.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tgl_awal'
                                ");
                                  $query_b = $this->db->query($sql_b);
                                  $total_beginning_balance = $total_balance->row()->balance + ($query_b->row()->debit - $query_b->row()->kredit);
                            }
                          ?>
                          <td style=" border: 0" ></td>
                          <td style="border:0px" align="center"><b>Total:</td>
                          <td style="border:0px;" align="right" class="points"><b>Rp. <?php echo $total_beginning_balance; ?></b></td>
                          <td style="border:0px" align="right" class="points"><b>Rp. <?php echo $total_debit_kredit->row()->debit; ?></td>
                          <td style="border:0px" align="right" class="points"><b>Rp. <?php echo $total_debit_kredit->row()->kredit; ?></td>
                          <td style="border:0px" align="right" class="points"><b>Rp. <?php echo $total_debit_kredit->row()->debit - $total_debit_kredit->row()->kredit; ?></td>
                          <td style="border:0px" align="right" class="points"><b>Rp. <?php echo $total_beginning_balance + ($total_debit_kredit->row()->debit - $total_debit_kredit->row()->kredit) ?></td>
                            <td style="border: 0px"></td>
                          <?php } //end of if !empty post ?>
                      <!-- <tr > -->
                      <!-- </tr> -->
<!--  -->
                    </tbody>
                    </table>

                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
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
    