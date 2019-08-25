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

    <link href="<?php echo base_url()."asset/css/font_google.css"; ?>" rel='stylesheet' type='text/css'>

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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Nama PT. </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Daftar Chart of Account</strong>
                        </div>
                        <br>
                        <div class="card-body">
                            <form action="" method="post" class="loginForm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" list="browsers" required>
                                            <datalist id="browsers">
                                                <option value="Internet Explorer">
                                                <option value="Firefox">
                                                <option value="Chrome">
                                                <option value="Opera">
                                                <option value="Safari">
                                            </datalist>
                                        <span class="bar"></span>
                                        <label style="text-transform: capitalize;" class="label-input">Account Id</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="username" name="username" class="form-control" required>
                                        <span class="bar"></span>
                                        <label style="text-transform: capitalize;" class="label-input">Deskrisi</label>
                                        <button type="submit" name="login" class="btn btn-success" style="float: right">Sign in</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped">
                            <br><br><br><br>
                            <br><thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First</th>
                                  <th scope="col">Last</th>
                                  <th scope="col">Handle</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Larry</td>
                                  <td>the Bird</td>
                                  <td>@twitter</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    <div class="col-lg-4 col-md-6">
                        <section class="card">
                            <div class="twt-feed bg-success">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                               
                                <div class="media">
                                    
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url()."images/admin.jpg"; ?>">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">Journal</h2>
                                        <p class="text-light">General Journal Entry</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>750</h5>
                                        Tweets
                                    </li>
                                    <li>
                                        <h5>865</h5>
                                        Following
                                    </li>
                                    <li>
                                        <h5>3645</h5>
                                        Followers
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <section class="card">
                            <div class="twt-feed bg-secondary">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                               
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url()."images/admin.jpg"; ?>">
                                    </a>
                                    <div class="media-body">
                                        <h3 class="text-white display-6">All Financial Statements</h3>
                                        <p class="text-light"></p>
                                    </div>
                                </div> 
                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>750</h5>
                                        Tweets
                                    </li>
                                    <li>
                                        <h5>865</h5>
                                        Following
                                    </li>
                                    <li>
                                        <h5>3645</h5>
                                        Followers
                                    </li>
                                </ul>
                            </div>
                        </section>
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
