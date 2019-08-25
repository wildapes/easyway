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

    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
    <link href="<?php echo base_url()."asset/css/select2-3.5.min.css"; ?>" rel="stylesheet"/>
    <script src="<?php echo base_url()."asset/js/bootstrap-3.3.7.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/select2-3.5.min.js"; ?>"></script>

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
    
    <link href="<?php echo base_url()."asset/css/jquery.inputpicker.css"; ?>" rel="stylesheet"/>
    <script src="<?php echo base_url()."asset/js/jquery.inputpicker.js"; ?>"></script>


</head>
<body class="open">
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Nama PT. </h1>
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
                            <h3 style="float: left">Journal</h3>    
                        </div>
                        <br>
                        <div class="card-body">
                        <div class="loginForm">
                                <div>
                                    <div class="form-group">
                                    <form action="" type="post">
                                        <select type="text" class="form-control" name="periode">
                                            <?php
                                                foreach($detail->result() as $list){
                                                $sales_due_date = $list->tanggal_awal;
                                                // create a time stamp of the date
                                                $time = strtotime($sales_due_date);
                                                for($i=0;$i<24;$i++){
                                                    // convert timestamp back to date string
                                                    $date = date('F-Y', $time);
                                                    $due_dates[] = $date;
                                                    $date2 = date('m-Y', $time);
                                                    $due_dates2[] = $date2;
                                                    // move to next timestamp
                                                    $time = strtotime('+1 month', $time)
                                                    
                                                ?>
                                                <option value="<?php echo sprintf('%02d', $i+1).$date2; ?>"> Periode <?php echo sprintf('%02d', $i+1); ?>&nbsp;&nbsp;&nbsp;<?php echo $date2; ?></option>
                                            <?php }
                                        } 
                                        ?>
                                        </select>
                                        <button type="submit" name="month_journal" class="col-md-12 btn btn-primary" style="margin:10px 0 30px 0"><i class="fa fa-search"></i>&nbsp Lihat jurnal</button>
                                    </form>
                                    </div>
                                </div>
                        </div>

                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Periode</th> 
                        <th>Tanggal</th>
                        <th>Referensi</th>
                        <th>Amount</th>
                        <th>Deskripsi Akun</th>
                      </tr>
                    </thead>
                    <tbody id="t">
                        <?php foreach($detail2->result() as $list){ ?>
                       <tr class="blank-row">
                        <td><?php echo "01" ?></td>
                        <td><?php 
                        $cal_date=$list->tanggal_transaksi;
                        $date=date('d-F-Y',strtotime($cal_date));
                        echo $date;  ?>
                        </td>
                        <td><?php echo $list->refrensi ?></td>
                        <td><?php echo "Amount" ?></td>
                        <td><?php echo $list->deskripsi_jurnal ?></td>
                      </tr>
                  <?php } ?>
                      <!-- <tr id="txtHint"></tr> -->

                    </tbody>
                  </table>

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
</html>
