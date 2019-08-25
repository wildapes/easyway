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

    <link href="<?php echo base_url()."asset/css/font_google.css"; ?>" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">


    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/bootstrap-3.3.7.min.js"; ?>"></script>
    <!-- for modal load first time on page load -->
    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url()."asset/alert/sweet-alert.min.css"; ?>">
    <script src="<?php echo base_url()."asset/alert/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/alert/sweet-alert.min.js"; ?>"></script>

    <style>
    .floatingHeader {
      position: fixed;
      top: 0;
      visibility: hidden;
    }
    </style>
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
                        <a href="<?php echo base_url()."halaman_admin"; ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
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
        <!-- Header-->
        <header id="header" class="header">
            <div class= "col-md-12 d-print-none">
            <a href="<?php echo base_url('halaman_admin'); ?>" class="a btn-link" style="float: right;"><i class="fa fa-mail-reply"></i>&nbsp; Dashboard Admin</a>
            </div>
        </header><!-- /header -->   
                <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 30px">Daftar Pengguna</h1>
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
                <button type="button" class="btn btn-success" style="margin-bottom: 4px" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i>
                    <span>Add User</span>
                </button>
            </div>
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Daftar User / Pengguna</h5>
                        </div>
                        
                        <div class="card-body">
                    <table class=" table-stripped table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Nama Pengguna</th>
                        <th>email</th>
                        <th>Level</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($detail->result() as $list) { ?>   
                    <tr>
                      <td><?php echo $list->username ?></td>
                      <td><?php echo $list->nama ?></td>
                      <td><?php echo $list->email ?></td>
                      <td><?php echo $list->level ?></td>
                      <td width="10%">
                        <!-- <center><a href="" class="btn btn-primary">ubah</a> -->
                        <?php if($list->level == 'admin'){ ?>
                          <center><button title="Tidak bisa menghapus admin" type="submit" disabled class="btn btn-danger"><i class="fa fa-trash"></i>
                    <span>Hapus</span></button></center>
                        <?php }else{ ?><center><a onclick="return confirm('Ingin Menghapus Pengguna?');" href="<?php echo base_url()."hapus_pengguna/".$list->username; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                    <span>Hapus</span></a></center> <?php } ?>
                      </td>
                    </tr>
                   <?php } ?>
                    </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
</body>
 <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary" >
                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i>&nbsp Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="login-form">                
                    <form action="" method="post" class="loginForm" autocomplete="off">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Pengguna</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Username</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="telepon" name="password" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Password</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Email</label>
                            </div>
                            
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
                            text: "Berhasil Menambahkan Pengguna baru",
                            type: "success",
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script>
        <?php }elseif($this->session->flashdata('result_hapus')){ ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menghapus Pengguna",
                            type: "success",
                            confirmButtonColor: '#f44242',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script>
        <?php }elseif($this->session->flashdata('result_insert_pengelolaan')){ ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil Menambahkan Data pengelola",
                            type: "success",
                            confirmButtonColor: '#f44242',
                            confirmButtonText: 'Ok!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        } 
                        );
                    });
                </script> <?php } 
                elseif($this->session->flashdata('result_hapus_pengelolaan')){ ?>
                <script>
                    $(window).load(function(){
                        swal({
                            title: "Berhasil",
                            text: "Berhasil menghapus data Pengelolaan",
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
    <!-- modal -->
</html>
