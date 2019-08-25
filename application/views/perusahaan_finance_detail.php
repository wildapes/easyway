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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?php echo base_url()."images/logo.png"; ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url()."images/logo2.png"; ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Navigasi</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Chart of Account</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-exchange"></i>Journal</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Financial Statements</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Data Perusahaan</a>
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

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="page-title"><br>
                        <center>
                        	<h5>Nama PT. </h5>
                        	<h6>as of 1 january 2018</h6><br>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="float: left">Account Summary Report</h3>
                            <div class="button-journal">
                                <button type="submit" name="reset" id="reset" class="btn btn-warning"><i class="fa fa-refresh"></i>&nbsp Reset</button>
                                <button type="submit" name="login" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp Delete</button>
                                <button type="submit" name="login" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp Save</button>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Account Id & Account Description</th>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Jrnl</th>
                                    <th>Trans Description</th>
                                    <th>Debit Amt</th>
                                    <th>Credit Amt </th>
                                    <th>Balance</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td rowspan="2">1.1.101<br>Kas & Bank</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>sasasa</td>
                                    <td>sasasa</td>
                                    <td>sasasa</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>$86,500.000.</td>
                                    <td>London</td>
                                    <td>London</td>
                                    <td>London</td>
                                  </tr>

                                </tbody>
                            </table>
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

    <script>
    jQuery(document).ready(function($){
        $("#reset").click(function(){
        $('#no_account').val('');
        $('#deskripsi_coa').val('');
      });

    });


    </script>
</body>
</html>
