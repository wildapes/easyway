<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easyway - Accounting Application</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url()."asset/img/e.png"; ?>" rel="shortcut icon">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

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
<div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('coa/'.$this->uri->segment('2')); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->

        <?php
          if ($this->session->flashdata('result_insert')) { ?>
              <div class="content mt-3">
              <?php echo $this->session->flashdata('result_insert'); ?>
              </div>
        <?php }elseif($this->session->flashdata('result_update')){ ?>
                    <div class="content mt-3">
              <?php echo $this->session->flashdata('result_update'); ?>
              </div>
        <?php } ?>
    <!-- Right Panel -->
        <div class="content mt-3">
            <div class="animated fadeIn">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 >Balance Sebelum periode awal dimulai</h3>    
                  </div>
                  <div class="card-body">
                    <div class="loginForm">
                      <div class="form-group">
                      <form action="" method="post">
                        <table class="table table-striped">
                          <thead>
                            <tr style="background-color: lightgrey"><th >No Account</th><th>Deskripsi Account</th><th>Tipe Account</th><th>Assets, Expenses</th><th>Liability, Equity, Income</th></tr></thead>
                          <tbody>
                            <?php foreach ($detail2->result() as $list) {
                              if($list->deskripsi_coa == NULL){
                                continue;
                              }
                              $periode = $this->input->post('periode_beginning');
                              ?>
                            <tr>
                            <input hidden type="text" name="id_balance[]" value="<?php echo $list->id ?>">
                            <input hidden value="<?php echo $list->id_coa ?>" name="id_coa[]">
                              <td><?php echo $list->no_account ?></td>
                              <td><?php echo $list->deskripsi_coa ?></td>
                              <td><?php echo $list->tipe_akun ?></td>
                              <?php if($list->tipe_akun == 'cash' || $list->tipe_akun == 'accounts receivable' || $list->tipe_akun == 'inventory' || $list->tipe_akun == 'other current assets' || $list->tipe_akun == 'fixed assets' || $list->tipe_akun == 'other assets' || $list->tipe_akun == 'cost of sales' || $list->tipe_akun == 'expenses'){ ?>
                              <td>
                                  <input class="input-td" type="text" id="balance1" name="balance[]" value="<?php echo $list->balance ?>">
                              </td>
                              <td><input class="input-td" type="text" disabled=""></td> 
                            <?php }else{ ?>
                              <td><input class="input-td" type="text" disabled=""></td>
                              <td><input class="input-td" type="text" id="balance2" name="balance[]" value="<?php echo $list->balance ?>"></td>
                            <?php } ?>
                            </tr>
                            <?php } ?>
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

