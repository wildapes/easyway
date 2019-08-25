  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easyway - Accounting Application</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/normalize.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/bootstrap.css"; ?>">
    
    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
    <link href="<?php echo base_url()."asset/css/select2-3.5.min.css"; ?>" rel="stylesheet"/>
    <script src="<?php echo base_url()."asset/js/bootstrap-3.3.7.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/select2-3.5.min.js"; ?>"></script>

    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css"> -->

    <link rel="stylesheet" href="<?php echo base_url()."asset/css/font-awesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/themify-icons.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/flag-icon.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/cs-skin-elastic.css"; ?>">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/widgets.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/style.css"; ?>">
 

    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
<style type="text/css">
tr {
width: 100%;
display: inline-table;
height:60px;
table-layout: fixed;
}

table{
 height:370px; 
 display: -moz-groupbox;
}
tbody{
  overflow-y: scroll;
  height: 300px;
  /*width: 100%;*/
  position: absolute;
}
th{
  width: 100%;
}
</style>
<body class="open">
    <!-- Right Panel -->
        <div class="content mt-3">
            <div class="animated fadeIn">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 >Balance Sebelum periode awal dimulai</h3>    
                  </div>
                  <div class="card-body">
                    <div style="float:left; margin-bottom: 10px">
                      <button name="reset" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="new_button">Pilih Periode &nbsp; <i class="fa fa-calendar"></i></button>
                    </div>
                    <div class="loginForm">
                      <div class="form-group">
                      <form action="" method="post">
                        <table class="table table-striped">
                          <thead>
                            <tr style="background-color: lightgrey">
                              <th >No Account</th>
                              <th>Deskripsi Account</th>
                              <th>Tipe Account</th>
                              <th>Assets, Expenses</th>
                              <th>Liability, Equity, Income</th>
                            </tr></thead>
                          <tbody>
                            <?php foreach ($detail2->result() as $list) {
                              $periode = $_SESSION['periode'][0];
                              if(!empty($list->balance)){
                              ?>
                            <tr>
                              <?php if(isset($_POST['beginning_balance'])){ ?>
                            <input type="text" name="periode_balance[]" value= "<?php echo $this->input->post('periode_beginning'); ?>"> 
                            <?php }else{ ?>
                            <input hidden type="text" name="periode_balance[]" value= "<?php echo $list->periode_balance; ?>">
                            <?php } ?>
                            <input hidden type="text" name="id_balance[]" value="<?php echo $list->id ?>">
                            <input hidden value="<?php echo $list->id_coa ?>" name="id_coa[]">
                              <td><?php echo $list->no_account."-".$list->id_coa ?></td>
                              <td><?php echo $list->deskripsi_coa ?></td>
                              <td><?php echo $list->tipe_akun ?></td>
                              <?php if($list->tipe_akun == 'Cash' || $list->tipe_akun == 'Accounts Receivable' || $list->tipe_akun == 'Inventory' || $list->tipe_akun == 'Other Current Assets' || $list->tipe_akun == 'Fixed Assets' || $list->tipe_akun == 'Other Assets' || $list->tipe_akun == 'Cost of Sales' || $list->tipe_akun == 'Expenses'){ ?>
                              <td>
                                <?php if($list->periode_balance == $periode){ ?>
                                  <input class="input-td" type="text" name="balance[]" value="<?php echo $list->balance ?>">
                                <?php }else{ ?>
                                  <input class="input-td" type="text" value="" name="balance[]">  
                                <?php } ?>
                              </td>
                              <td><input class="input-td" type="text" disabled=""></td> 
                            <?php }else{ ?>
                              <td><input class="input-td" type="text" disabled=""></td>
                              <td>
                                <?php if($list->periode_balance == $periode){ ?>
                                  <input class="input-td" type="text" name="balance[]" value="<?php echo $list->balance ?>">
                                <?php }else{ ?>
                                  <input class="input-td" type="text" value="" name="balance[]">  
                                <?php } ?>
                              </td>
                            <?php } ?>
                            </tr>
                            <?php }else{ ?>
                              <tr>
                                <?php if(isset($_POST['beginning_balance'])){ ?>
                            <input type="text" name="periode_balance[]" value= "<?php echo $this->input->post('periode_beginning'); ?>"> 
                            <?php }else{ ?>
                            <input hidden type="text" name="periode_balance[]" value= "<?php echo $list->periode_balance; ?>">
                            <?php } ?>
                            <input hidden type="text" name="id_balance[]" value="<?php echo $list->id ?>">
                            <input hidden value="<?php echo $list->id_coa ?>" name="id_coa[]">
                            
                              <td><?php echo $list->no_account ?></td>
                              <td><?php echo $list->deskripsi_coa ?></td>
                              <td><?php echo $list->tipe_akun ?></td>
                              <?php if($list->tipe_akun == 'Cash' || $list->tipe_akun == 'Accounts Receivable' || $list->tipe_akun == 'Inventory' || $list->tipe_akun == 'Other Current Assets' || $list->tipe_akun == 'Fixed Assets' || $list->tipe_akun == 'Other Assets' || $list->tipe_akun == 'Cost of Sales' || $list->tipe_akun == 'Expenses'){ ?>
                              <td><input class="input-td" type="text" value="" name="balance[]"></td>
                              <td><input class="input-td" type="text" value="" disabled></td>
                            <?php }else{ ?>
                              <td><input class="input-td" type="text" value="" name="balance[]" disabled></td>
                              <td><input class="input-td" type="text" value=""></td>
                            <?php } ?>
                            </tr>
                            <?php }} ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div style="float:right; margin-bottom: 10px">
                      <button name="save_balance" class="btn btn-success" id="new_button"><i class="fa fa-dot-circle-o"></i>&nbsp;Simpan </button>
                    </div>
                </form>
                  </div>
            
                </div><!-- .animated -->
              </div><!-- .content -->
            </div>
        </div>
</body>

<div style="display: none" class="modal fade" id="myModal" role="dialog">
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
                <div class="col-md-8">
                <select type="text" class="form-control" name="periode_beginning" multiple="" height="100%" size="10">
                    <?php
                        foreach($detail->result() as $list){
                        $periode_due_date = strtotime('-12 month', strtotime($list->tanggal_awal));
                        $periode_due_date_v = strtotime('-13 month', strtotime($list->tanggal_awal));
                        $a = date('Y-m-d', $periode_due_date);
                        $b = date('Y-m-d', $periode_due_date_v);
                        $time_v = strtotime($b);
                        $date_v = date('01-m-Y', $time_v);
                        // create a time stamp of the date
                        $time = strtotime($a); ?>
                        <option value="<?php echo $date_v; ?>"><?php echo "Sebelum ".date('01-m-Y', $time) ?></option>
                        <?php
                        for($i=0;$i<12;$i++){
                        // convert timestamp back to date string
                        $date = date('01-m-Y', $time);
                        $date_o = date('Y-m-01', $time);
                        $date2 = date('t-m-Y', $time);
                        $due_dates[] = $date;
                        // move to next timestamp
                        $time = strtotime('+1 month', $time);
                    ?>
                    <option value="<?php echo $date_o; ?>"><?php echo $date." sampai ".$date2; ?></option>
                    <?php }} ?>
                </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" name="beginning_balance">Lihat data</button>
        </div>
      </div>
    </form>

    </div><!-- modal dialog -->
  </div>