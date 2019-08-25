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
    
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/style.css"; ?>">
    <link href="<?php echo base_url()."asset/css/lib/vector-map/jqvmap.min.css"; ?>" rel="stylesheet">

    <link href="<?php echo base_url()."asset/css/font_google.css"; ?>" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/socials.css"; ?>">

<link rel="stylesheet" href="<?php echo base_url()."asset/alert/sweet-alert.min.css"; ?>">
<script src="<?php echo base_url()."asset/alert/jquery-2.1.4.min.js"; ?>"></script>
<script src="<?php echo base_url()."asset/alert/sweet-alert.min.js"; ?>"></script>

<style>
.custom-1{
    background-color: #878787;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
.active{
    background-color: lightgrey;
}
</style>
</head>
<body>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('logout'); ?>" class="a btn-link d-print-none" style="float: right;">logout</a>
            </div>
        </header><!-- /header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 30px">Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                          <!--   <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">sort by <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><label>Submenu 1-1</label><label>Submenu 1-1</label><label>Submenu 1-1</label></a>
                                    <a class="dropdown-item" href="#">Submenu 1-2</a>
                                    <a class="dropdown-item" href="#">Submenu 1-3</a>
                                </div>
                            </li>                            
                           -->  
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            
            <!-- <div class="col-lg-4 col-md-6"></div> -->
            <div class="col-lg-12 col-md-12">
            <form action="" method="post">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <?php if(isset($_POST['search_perusahaan'])){ ?>
                            <input type="text" id="search" name="search" value="<?php echo $this->input->post('search'); ?>" placeholder="Search Company" class="form-control">
                            <?php }else{ ?>
                            <input type="text" id="search" name="search" placeholder="Search Company" class="form-control">
                            <?php } ?> 
                            <div class="input-group-btn">
                                <button type="submit" name = "search_perusahaan" class="btn btn-seconday">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>   
            </form>
            </div>
        </div>

        <div class = "col mt-3"> 
         <?php
          if ($this->session->flashdata('result_insert')) {
        ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menambahkan Perusahaan baru",
                            type: "success",
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script>
        <?php } ?>

        <?php if(isset($_POST['search_perusahaan'])){
        foreach($search_perusahaan->result() as $list1){ ?>
            <!-- <div class="col mt-3"> -->
            <div class="col-lg-3 col-md-6">
              <a href="<?php echo base_url()."coa/".$list1->id_perusahaan; ?>">
                <div class="card">
                    <div class="corner-ribon black-ribon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="card-header bg-secondary">
                        <strong class="card-title text-light"><?php echo $list1->nama_perusahaan; ?></strong>
                    </div>
                    <div class="card-body text-white custom-1">
                        <p class="card-text text-light">alamat: <?php echo $list1->alamat; ?></p>
                        <p class="card-text text-light">No hp: <?php echo $list1->telepon; ?></p>
                        <i style="float: right" class="card-text text-light"><i class="fa fa-folder-open-o"></i>&nbsp<u>Open Company</u></i>
                    </div>
                </div>
              </a>             
            </div>
        <?php }
        }else{
            foreach($listperusahaan->result() as $list){ ?>
            <!-- <div class="col"> -->
            <div class="col-lg-3 col-md-6">
              <a href="<?php echo base_url()."coa/".$list->id_perusahaan; ?>">
                <div class="card">
                    <div class="corner-ribon black-ribon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="card-header bg-secondary">
                        <strong class="card-title text-light"><?php echo $list->nama_perusahaan; ?></strong>
                    </div>
                    <div class="card-body text-white custom-1">
                        <p class="card-text text-light">alamat: <?php echo $list->alamat; ?></p>
                        <p class="card-text text-light">No hp: <?php echo $list->telepon; ?></p>
                        <i style="float: right" class="card-text text-light"><i class="fa fa-folder-open-o"></i>&nbsp<u>Open Company</u></i>
                    </div>
                </div>
              </a>             
            </div>
        <?php }
        } ?>
        </div><!--/.col-->
        <!-- paginatinon     -->
        
        </div> <!-- .content -->
    </div>

    <!-- modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary" >
                    <h5 class="modal-title" id="largeModalLabel"><i class="fa fa-book"></i>&nbsp Informasi Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="login-form">                
                    <form action="" method="post" class="loginForm">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="nama_perusahaan" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Alamat</label>
                            </div>
                            <div class="form-group">
                                <input type="text" id="telepon" name="telepon" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Telepon</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Fax</label>
                            </div>
                            
                        </div>

                        <div class="col-md-2">
                            <div style="border-left: 1px solid black; height: 250px; position: absolute; left: 50%;  top: 0;">
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="direktur" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Pemimin Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tipe_bisnis" class="form-control" list="browsers" required>
                                  <datalist id="browsers">
                                    <option value="Corporation">
                                    <option value="S Corporation">
                                    <option value="Prtnership">
                                    <option value="Sole Propietorship">
                                    <option value="Limited Liability Company">
                                  </datalist>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Tipe Bisnis</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Website</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Email</label>
                            </div>
                        </div>
                            <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">Tahun Fiscal Pertama</label>
                            <select maxlength="200" type="text"  class="form-control" name="bulan_awal">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                           </div>
                           <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">&nbsp;</label>
                            <select maxlength="200" type="text"  class="form-control" name="tahun_awal">
                            <?php
                                for ($i=12; $i>=0; $i--) { 
                                    ?> 
                                <option value="<?php echo date('Y', strtotime("-$i year")); ?>" selected><?php echo date('Y', strtotime("-$i year")); ?></option>
                            <?php } ?>
                            <?php
                                for ($i=1; $i<=12; $i++) { ?> 
                                <option value="<?php echo date('Y', strtotime("+$i year")); ?>" > <?php echo date('Y', strtotime("+$i year")); ?></option>
                            <?php } ?>
                            </select>
                           </div>
                   
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #eaeaea">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="add_perusahaan">Add</button>
                </div>

                    </form>
               
            </div>
        </div>
    </div>    
    <!-- modal -->
    <form method="post" action="">
    <!-- <button type="submit" class="btn btn-primary" name="add_perusahaan">Add</button> -->
    </form>
    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/popper.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/main.js"; ?>"></script>
    <script>
    jQuery(document).ready(function($){
    //untuk number type
      $(function() {
        $("#telepon").keypress(function(event) {
            if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                $(".alert").html("Enter only digits!").show().fadeOut(2000);
                return false;
            }
        });
        });

    });
    </script>
    
</body>
</html>
