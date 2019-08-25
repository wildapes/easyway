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
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="<?php echo base_url()."images/logo_test.png"; ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href=""><img src="<?php echo base_url()."images/logo2.png"; ?>" alt="Logo"></a>
            </div>

                        <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url('halaman_admin'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Navigasi</h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo base_url()."halaman_admin" ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Perusahaan</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo base_url()."daftar_pengguna/"; ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Pengguna</a>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="<?php echo base_url()."pengelolaan"; ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-recycle"></i>Pengelolaan</a>
                    </li>                        
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <div class= "col-md-12">
            <a href="<?php echo base_url('logout'); ?>" class="a btn-link d-print-none" style="float: right;">Logout</a>
            </div>
        </header><!-- /header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 30px">Dashboard Admin</h1>
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
            <div class="col-lg-4 col-md-6">
                <button type="button" class="btn btn-success" style="margin-bottom: 4px" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus"></i>
                    <span>Add Company</span>
                </button>
            </div>
            <div class="col-lg-4 col-md-6"></div>
            <div class="col-lg-4 col-md-6">
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
        <?php }elseif($this->session->flashdata('gagal_hapus_perusahaan')){ ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Error",
                            text: "Perusahaan gagal dihapus karena sudah memiliki data",
                            type: "error",
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script>

        <?php }elseif($this->session->flashdata('result_hapus_perusahaan')){ ?>
            <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menghapus Perusahaan",
                            type: "success",
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script>
        <?php }

         ?>

        <?php if(isset($_POST['search_perusahaan'])){
        foreach($search_perusahaan->result() as $list1){ ?>
            <!-- <div class="col mt-3"> -->
            <div class="col-lg-4 col-md-6">
              <a href="#" data-toggle="modal" data-target="#searchModal-<?php echo $list1->id_perusahaan ?>" aria-haspopup="true" aria-expanded="false">
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
    <!-- search modal -->
    <div class="modal fade" id="searchModal-<?php echo $list1->id_perusahaan ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                    <form action="" method="post" class="loginForm" autocomplete="off">
                        <div class="col-md-5">
                            <input style="display:none" type="text" name="id_perusahaan" value="<?php echo $list1->id_perusahaan ?>" class="form-control" required>

                            <div class="form-group">
                                <input type="text" name="nama_perusahaan" value="<?php echo $list1->nama_perusahaan ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" value="<?php echo $list1->alamat ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Alamat</label>
                            </div>
                            <div class="form-group">
                                <input type="text" id="telepon" name="telepon" value="<?php echo $list1->telepon ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Telepon</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" class="form-control" value="<?php echo $list1->fax ?>" required>
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
                                <input type="text" name="direktur" value="<?php echo $list1->direktur ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Pemimin Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $list1->tipe_bisnis; ?>" name="tipe_bisnis" class="form-control" list="browsers" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Tipe Bisnis</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" value="<?php echo $list1->website ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Website</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required value="<?php echo $list1->email ?>">
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Email</label>
                            </div>
                        </div>
                            <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">Tahun Fiscal Pertama</label>
                            <select maxlength="200" type="text"  class="form-control" name="bulan_awal">
                                <option value="01" <?php if(substr($list1->tanggal_awal, 5, 2) == '01') echo ' selected="selected"';  ?> >Januari</option>
                                <option value="02" <?php if(substr($list1->tanggal_awal, 5, 2) == '02') echo ' selected="selected"';  ?> >Februari</option>
                                <option value="03" <?php if(substr($list1->tanggal_awal, 5, 2) == '03') echo ' selected="selected"';  ?> >Maret</option>
                                <option value="04" <?php if(substr($list1->tanggal_awal, 5, 2) == '04') echo ' selected="selected"';  ?> >April</option>
                                <option value="05" <?php if(substr($list1->tanggal_awal, 5, 2) == '05') echo ' selected="selected"';  ?>>Mei</option>
                                <option value="06" <?php if(substr($list1->tanggal_awal, 5, 2) == '06') echo ' selected="selected"';  ?>>Juni</option>
                                <option value="07" <?php if(substr($list1->tanggal_awal, 5, 2) == '07') echo ' selected="selected"';  ?>>Juli</option>
                                <option value="08" <?php if(substr($list1->tanggal_awal, 5, 2) == '08') echo ' selected="selected"';  ?>>Agustus</option>
                                <option value="09" <?php if(substr($list1->tanggal_awal, 5, 2) == '09') echo ' selected="selected"';  ?>>September</option>
                                <option value="10" <?php if(substr($list1->tanggal_awal, 5, 2) == '10') echo ' selected="selected"';  ?>>Oktober</option>
                                <option value="11" <?php if(substr($list1->tanggal_awal, 5, 2) == '11') echo ' selected="selected"';  ?>>November</option>
                                <option value="12" <?php if(substr($list1->tanggal_awal, 5, 2) == '12') echo ' selected="selected"';  ?>>Desember</option>
                            </select>
                           </div>
                           <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">&nbsp;</label>
                            <select maxlength="200" type="text"  class="form-control" name="tahun_awal">
                            <?php
                                for ($i=-12; $i<=12; $i++) { ?> 
                                <option <?php if(substr($list1->tanggal_awal, 0, 4) == date('Y', strtotime("+$i year"))) echo ' selected="selected"';  ?> value="<?php echo date('Y', strtotime("+$i year")); ?>" > <?php echo date('Y', strtotime("+$i year")); ?></option>
                            <?php } ?>
                            </select>
                           </div>
                   
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #eaeaea">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="update_perusahaan">Update</button>
                </div>

                    </form>
               
            </div>
        </div>
    </div>    
    <!-- modal -->

        <?php }
        }else{
            foreach($listperusahaan as $list){ ?>
            <!-- <div class="col"> -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="corner-ribon black-ribon">
                        <a href="<?php echo base_url("hapus_perusahaan/".$list->id_perusahaan) ?>" onclick="return confirm('Ingin Menghapus Perusahaan?');" title="Hapus Perusahaan">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="card-header bg-secondary">
                        <strong class="card-title text-light"><?php echo $list->nama_perusahaan; ?></strong>
                    </div>
                    <div class="card-body text-white custom-1">
                        <p class="card-text text-light">alamat: <?php echo $list->alamat; ?></p>
                        <p class="card-text text-light">No hp: <?php echo $list->telepon; ?></p>
                        <a href="#" data-toggle="modal" data-target="#largeModal-<?php echo $list->id_perusahaan ?>" aria-haspopup="true" aria-expanded="false">
                        <i style="float: right" class="card-text text-light"><i class="fa fa-pencil"></i>&nbsp<u>Ubah Data Perusahaan</u></i>
                        </a>             
                    </div>
                </div>
            </div>

            <!-- modal -->
    <div class="modal fade" id="largeModal-<?php echo $list->id_perusahaan ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                            <input style="display:none" type="text" name="id_perusahaan" value="<?php echo $list->id_perusahaan ?>" class="form-control" required>

                            <div class="form-group">
                                <input type="text" name="nama_perusahaan" value="<?php echo $list->nama_perusahaan ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" value="<?php echo $list->alamat ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Alamat</label>
                            </div>
                            <div class="form-group">
                                <input type="text" id="telepon" name="telepon" value="<?php echo $list->telepon ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Telepon</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" class="form-control" value="<?php echo $list->fax ?>" required>
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
                                <input type="text" name="direktur" value="<?php echo $list->direktur ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Pemimin Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $list->tipe_bisnis; ?>" name="tipe_bisnis" class="form-control" list="browsers" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Tipe Bisnis</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" value="<?php echo $list->website ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Website</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required value="<?php echo $list->email ?>">
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Email</label>
                            </div>
                        </div>
                            <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">Tahun Fiscal Pertama</label>
                            <select maxlength="200" type="text"  class="form-control" name="bulan_awal">
                                <option value="01" <?php if(substr($list->tanggal_awal, 5, 2) == '01') echo ' selected="selected"';  ?> >Januari</option>
                                <option value="02" <?php if(substr($list->tanggal_awal, 5, 2) == '02') echo ' selected="selected"';  ?> >Februari</option>
                                <option value="03" <?php if(substr($list->tanggal_awal, 5, 2) == '03') echo ' selected="selected"';  ?> >Maret</option>
                                <option value="04" <?php if(substr($list->tanggal_awal, 5, 2) == '04') echo ' selected="selected"';  ?> >April</option>
                                <option value="05" <?php if(substr($list->tanggal_awal, 5, 2) == '05') echo ' selected="selected"';  ?>>Mei</option>
                                <option value="06" <?php if(substr($list->tanggal_awal, 5, 2) == '06') echo ' selected="selected"';  ?>>Juni</option>
                                <option value="07" <?php if(substr($list->tanggal_awal, 5, 2) == '07') echo ' selected="selected"';  ?>>Juli</option>
                                <option value="08" <?php if(substr($list->tanggal_awal, 5, 2) == '08') echo ' selected="selected"';  ?>>Agustus</option>
                                <option value="09" <?php if(substr($list->tanggal_awal, 5, 2) == '09') echo ' selected="selected"';  ?>>September</option>
                                <option value="10" <?php if(substr($list->tanggal_awal, 5, 2) == '10') echo ' selected="selected"';  ?>>Oktober</option>
                                <option value="11" <?php if(substr($list->tanggal_awal, 5, 2) == '11') echo ' selected="selected"';  ?>>November</option>
                                <option value="12" <?php if(substr($list->tanggal_awal, 5, 2) == '12') echo ' selected="selected"';  ?>>Desember</option>
                            </select>
                           </div>
                           <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">&nbsp;</label>
                            <select maxlength="200" type="text"  class="form-control" name="tahun_awal">
                            <?php
                                for ($i=-12; $i<=12; $i++) { ?> 
                                <option <?php if(substr($list->tanggal_awal, 0, 4) == date('Y', strtotime("+$i year"))) echo ' selected="selected"';  ?> value="<?php echo date('Y', strtotime("+$i year")); ?>" > <?php echo date('Y', strtotime("+$i year")); ?></option>
                            <?php } ?>
                            </select>
                           </div>
                   
                    </div>
                </div>
                
                <div class="modal-footer" style="background-color: #eaeaea">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="update_perusahaan">Update</button>
                </div>

                    </form>
               
            </div>
        </div>
    </div>    
    <!--  modal -->

        <?php }
        } ?>
        </div><!--/.col-->

        <!-- paginatinon     -->

            <div class ="col-md-12">
                <div class="content">
                <label  style="float: right"><?php echo $links; ?></label>
                </div>
            </div>            
        
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
                    <form action="" method="post" class="loginForm" autocomplete="off">
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
        <?php }elseif($this->session->flashdata('update_perusahaan')){ ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Mengubah Data Perusahaan",
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
