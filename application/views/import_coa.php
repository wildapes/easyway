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
<script>
jQuery(document).ready(function($){
  $('#select_all').click(function() {
    var c = this.checked;
    $('.form-check-input:checkbox').prop('checked',c);
});
  $('#select_coa').change(function() {
    $("#select_unselect").show(100);
});

});
</script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
        <script>
            function showCoa(str) {
                var my_id = <?php echo $this->uri->segment('2'); ?>;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                // xmlhttp.open("GET","drop_table.php?q="+str,true);
                xmlhttp.open("GET","get_coa_import/"+my_id+"/"+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('coa/'.$this->uri->segment('2')); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Back to Home</a>
            </div>
        </header><!-- /header -->


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
                <?php
            if ($this->session->flashdata('result_insert')) { ?>
                <div class="content mt-3">
                <?php echo $this->session->flashdata('result_insert'); ?>
                </div>
        <?php } ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="float: left">Import Chart of Account</h3>
                        </div>
                        <br>
                        <!-- <input type="checkbox" id="select_all" checked/> Select All / Unselect All -->
                        <div class="card-body">
                            <form method="post" class="loginForm">
                                <div class="form-group">
                                    <label class="control-label">Import Coa dari Persahaan Lain</label>
                                    <select id="select_coa" maxlength="200" type="text"  class="form-control" onchange="showCoa(this.value);">
                                        <option>Pilih Perusahaan</option>
                                        <optgroup label="Daftar Perusahaan">
                                            <?php foreach ($listperusahaan->result() as $list) { ?>
                                            <option value="<?php echo $list->id_perusahaan ?>"><?php echo $list->nama_perusahaan ?></option>    
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div id="select_unselect" style="display: none">
                                    <input type="checkbox" id="select_all" name="select_all" style=""><b>&nbsp; Select All/Unselect All </b>
                                </div>
                                    <div class="form-group" id="txtHint"></div>
                                <!-- <div id="txtHint"></div> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>

    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/popper.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/main.js"; ?>"></script>

    <!--  Chart js -->
    <script src="<?php echo base_url()."asset/js/lib/chart-js/Chart.bundle.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/widgets.js"; ?>"></script>

</body>
</html>
