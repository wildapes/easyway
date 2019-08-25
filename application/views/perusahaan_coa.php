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
    
    <script src="<?php echo base_url()."asset/js/js_modal/jquery-1.9.1.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
    <link href="<?php echo base_url()."asset/css/select2-3.5.min.css"; ?>" rel="stylesheet"/>
    <script src="<?php echo base_url()."asset/js/bootstrap-3.3.7.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/select2-3.5.min.js"; ?>"></script>
    <!-- <link rel="stylesheet" href="<?php echo base_url()."asset/css/1-col-portfolio.css"; ?>"> -->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css"> -->
    <link href="<?php echo base_url()."asset/css/font_google.css"; ?>" rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/font-awesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/themify-icons.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/flag-icon.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/cs-skin-elastic.css"; ?>">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/1-col-portfolio.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/normalize.css"; ?>">

    
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/widgets.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/style.css"; ?>">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url()."asset/alert/sweet-alert.min.css"; ?>">
    <!-- <script src="<?php echo base_url()."asset/alert/jquery-2.1.4.min.js"; ?>"></script> -->
    <script src="<?php echo base_url()."asset/alert/sweet-alert.min.js"; ?>"></script>
        <script>
            function showCoa(str) {
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
                xmlhttp.open("GET","drop_table/"+str,true);
                xmlhttp.send();

            }
        }
            
    function showPeriode(str, callback) {
            if (str == "") {
                document.getElementById("bootstrap-data-table").innerHTML = "";
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
                        document.getElementById("bootstrap-data-table").innerHTML = this.responseText;
                    }
                };
                // xmlhttp.open("GET","drop_table.php?q="+str,true);
                xmlhttp.open("GET","periode_history/"+str,true);
                xmlhttp.send();
            }
        }
    </script>
<script type="text/javascript">
$(document).ready(function(){
    $("#new_button").click(function(){
        $("#txtHint").load("drop_table_new/"+1);
    });
});
</script>

</head>
<body >
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
                        <a href="<?php echo base_url(); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Navigasi</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Chart of Account</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-laptop"></i><a href="<?php echo base_url()."coa/".$this->uri->segment('2'); ?>">Coa</a></li>
                            <li><i class="fa fa-paste"></i><a href="<?php echo base_url()."import_coa/".$this->uri->segment('2'); ?>">Import Coa</a></li>
                        </ul>

                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo base_url()."beginning_balance/".$this->uri->segment('2'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dollar"></i>Beginning Balance</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo base_url()."journal/".$this->uri->segment('2'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-exchange"></i>Journal</a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>All financial statements</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-thumb-tack"></i><a href="<?php echo base_url()."financial/".$this->uri->segment('2'); ?>">General Ledger</a></li>
                            <li><i class="fa fa-bar-chart-o"></i><a href="<?php echo base_url()."neraca/".$this->uri->segment('2'); ?>">Neraca</a></li>
                            <li><i class="fa fa-dollar"></i><a href="<?php echo base_url()."laba_rugi/".$this->uri->segment('2'); ?>">Laba Rugi</a></li>
                        </ul>

                    </li>

<!--                     <li class="menu-item-has-children dropdown">
                        <a href="#" data-toggle="modal" data-target="#largeModal" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Data Perusahaan</a>
                    </li> -->

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php 
                              echo $detail_pt->row()->nama_perusahaan;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if ($this->session->flashdata('result_insert1')) { ?>
                <div class="content mt-3">
                <?php echo $this->session->flashdata('result_insert1'); ?>
                </div>
        <?php }elseif($this->session->flashdata('result')) { ?>
                <div class="content mt-3">
                <?php echo $this->session->flashdata('result'); ?>
                </div>
        <?php }elseif($this->session->flashdata('result_update')){ ?>
                <div class="content mt-3">
        <?php echo $this->session->flashdata('result_update'); ?>
                </div>
        <?php }elseif($this->session->flashdata('result_insert')){ ?>
                <div class="content mt-3">
                <?php echo $this->session->flashdata('result_insert'); ?>
                </div>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="float: left">Chart of Account</h3>
                            <div style="float:right; margin: 0px 5px 0px 0px;">
                                <button name="reset" class="btn btn-success" id="new_button"><i class="fa fa-file"></i>&nbsp New</button>
                                <a href="" class="btn btn-warning" id="new_button"><i class="fa fa-refresh"></i>&nbsp Refresh</a>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <form method="post" class="loginForm">
                                <div class="form-group">
                                    <label>Pilih Coa :</label>
                                    <select class="select2" id="multi" style="border-radius: 4px; width: 100%" onchange="showCoa(this.value); showPeriode(this.value)">
                                     <optgroup label='No Account' data-deskripsi='Deskripsi' data-type='Tipe Akun'>
                                        <?php foreach($listcoa->result() as $list){ ?>
                                        <option value="<?php echo $list->id_coa ?>" data-deskripsi="<?php echo $list->deskripsi_coa; ?>" data-type='<?php echo $list->tipe_akun; ?>'><?php echo $list->no_account ?></option>
                                        <?php } ?>
                                      </optgroup>
                                    </select>
                                </div>
                                <hr>
                                <div id="txtHint"></div>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Period History</th>
                                    <th>Debits</th>
                                    <th>Credits</th>
                                    <th>Period Activity</th>
                                    <th>Running Balance</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tanggal_awal->result() as $list2) { 
                                    $periode_due_date = strtotime('+1 month', strtotime($list2->tanggal_awal));
                                    $a = date('Y-m-d', $periode_due_date);
                                    // create a time stamp of the date
                                    $time = strtotime($a);
                                    for($i=0;$i<3;$i++){
                                    // convert timestamp back to date string
                                    $date = date('t-F-Y', $time);
                                    $due_dates[] = $date;
                                    // move to next timestamp
                                    $time = strtotime('-1 month', $time);
                                    ?>
                                  
                                  <tr>
                                    <td><?php echo $date; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                              <?php }} ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
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
                        <?php foreach ($listperusahaan->result() as $listperusahaan) { ?>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="nama_perusahaan" value="<?php echo $listperusahaan->nama_perusahaan ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" value="<?php echo $listperusahaan->alamat ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Alamat</label>
                            </div>
                            <div class="form-group">
                                <input type="text" id="telepon" name="telepon" value="<?php echo $listperusahaan->telepon ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Telepon</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" class="form-control" value="<?php echo $listperusahaan->fax ?>" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Fax</label>
                            </div>
                            
                        </div>
                    <?php } ?>
                        <div class="col-md-2">
                            <div style="border-left: 1px solid black; height: 250px; position: absolute; left: 50%;  top: 0;">
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="direktur" value="<?php echo $listperusahaan->direktur ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Nama Pemimin Perusahaan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $listperusahaan->tipe_bisnis; ?>" name="tipe_bisnis" class="form-control" list="browsers" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Tipe Bisnis</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="website" value="<?php echo $listperusahaan->website ?>" class="form-control" required>
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Website</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required value="<?php echo $listperusahaan->email ?>">
                                <span class="bar"></span>
                                <label style="text-transform: capitalize;" class="label-input">Email</label>
                            </div>
                        </div>
                            <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">Tahun Fiscal Pertama</label>
                            <select maxlength="200" type="text"  class="form-control" name="bulan_awal">
                                <option value="01" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '01') echo ' selected="selected"';  ?> >Januari</option>
                                <option value="02" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '02') echo ' selected="selected"';  ?> >Februari</option>
                                <option value="03" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '03') echo ' selected="selected"';  ?> >Maret</option>
                                <option value="04" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '04') echo ' selected="selected"';  ?> >April</option>
                                <option value="05" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '05') echo ' selected="selected"';  ?>>Mei</option>
                                <option value="06" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '06') echo ' selected="selected"';  ?>>Juni</option>
                                <option value="07" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '07') echo ' selected="selected"';  ?>>Juli</option>
                                <option value="08" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '08') echo ' selected="selected"';  ?>>Agustus</option>
                                <option value="09" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '09') echo ' selected="selected"';  ?>>September</option>
                                <option value="10" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '10') echo ' selected="selected"';  ?>>Oktober</option>
                                <option value="11" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '11') echo ' selected="selected"';  ?>>November</option>
                                <option value="12" <?php if(substr($listperusahaan->tanggal_awal, 5, 2) == '12') echo ' selected="selected"';  ?>>Desember</option>
                            </select>
                           </div>
                           <div style="margin-top: 25px" class="form-group col-md-6">
                            <label class="control-label">&nbsp;</label>
                            <select maxlength="200" type="text"  class="form-control" name="tahun_awal">
                            <?php
                                for ($i=-12; $i<=12; $i++) { ?> 
                                <option <?php if(substr($listperusahaan->tanggal_awal, 0, 4) == date('Y', strtotime("+$i year"))) echo ' selected="selected"';  ?> value="<?php echo date('Y', strtotime("+$i year")); ?>" > <?php echo date('Y', strtotime("+$i year")); ?></option>
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

    <script src="<?php echo base_url()."asset/js/vendor/jquery-2.1.4.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/popper.min.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/plugins.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/main.js"; ?>"></script>

    <!--  Chart js -->
    <script src="<?php echo base_url()."asset/js/lib/chart-js/Chart.bundle.js"; ?>"></script>
    <script src="<?php echo base_url()."asset/js/widgets.js"; ?>"></script>

<script>
  function formatResultMulti(data) {
  var deskripsi = $(data.element).data('deskripsi');
  var type = $(data.element).data('type');
  var classAttr = $(data.element).attr('class');
  var hasClass = typeof classAttr != 'undefined';
  classAttr = hasClass ? ' ' + classAttr : '';

  var $result = $(
    '<div class="row">' +
    '<div class="col-md-4 col-xs-4' + classAttr + '">' + data.text + '</div>' +
    '<div class="col-md-4 col-xs-4' + classAttr + '">' + deskripsi + '</div>' +
    '<div class="col-md-4 col-xs-4' + classAttr + '">' + type + '</div>' +
    '</div>'
  );
  return $result;
}

$(function() {
  $('#multi').select2({
    width: '100%',
    formatResult: formatResultMulti
  });
})
</script>
<script>
$(document).ready(function() {
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }
    $('.points').each(function(){
    var v_pound = $(this).html();
    v_pound = numberWithCommas(v_pound);

    $(this).html(v_pound)
        
        })
})
</script>
</body>
</html>
