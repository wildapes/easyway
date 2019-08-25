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
    
    <!-- <link rel="stylesheet" href="<?php echo base_url()."asset/css/bootstrap.min.css"; ?>"> -->
    <link href="<?php echo base_url()."asset/css/bootstrap-3.3.0.min.css"; ?>" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="<?php echo base_url()."asset/css/font-awesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/themify-icons.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/flag-icon.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/css/cs-skin-elastic.css"; ?>">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/widgets.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url()."asset/scss/style.css"; ?>">
    <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<style>
body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>

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
                xmlhttp.open("GET","test/get_coa/"+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<div class="container">
 <div class="box">
  <center><h3>Setup Perusahaan Baru</h3></center><br><br>
  <div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
  <br><br><br><br>

  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-8 col-md-offset-2">
        <div class="col-md-12 col-sm-12 col-lg-12">
        <h3> Step 1</h3><br>
          <div class="form-group">
            <label class="control-label">Nama Perusahaan</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Alamat </label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address"  />
          </div>
          <div class="form-group">
            <label class="control-label">Telepon</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Fax</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address"  />
          </div>
          <div class="form-group">
            <label class="control-label">Nama Pimpinan</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Tipe Bisnis</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address"  />
          </div>
          <div class="form-group">
            <label class="control-label">Website</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address"  />
          </div>
          <button class="btn btn-success nextBtn btn-lg pull-right" type="button" > Next &nbsp<i class="fa fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
    
    <div class="row setup-content" id="step-2">
      <div class="col-xs-8 col-md-offset-2">
        <div class="col-md-12">
          <h3> Step 2</h3><br>
          <div class="form-group">
            <label class="control-label">Import Coa dari Persahaan Lain</label>
            <select maxlength="200" type="text"  class="form-control" onchange="showCoa(this.value);">
            	<option>Pilih Perusahaan</option>
            	<optgroup label="Daftar Perusahaan">
            		<?php foreach ($listperusahaan->result() as $list) { ?>
            		<option value="<?php echo $list->id_perusahaan ?>"><?php echo $list->nama_perusahaan ?></option>	
            		<?php } ?>
            	</optgroup>
            	<optgroup label="Default">
            	<option>Biarkan Coa Kosong</option>
            	</optgroup>
            </select>
          </div>
          <div class="form-group" id="txtHint"></div>

          <button class="btn btn-success nextBtn btn-lg pull-right" type="button" >Next  &nbsp<i class="fa fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-8 col-md-offset-2">
        <div class="col-md-12">
          <h3> Step 3</h3><br>
          <div class="form-group">
          	<label class="control-label">Periode Accounting</label><br>
          		<input type="radio">Periode 12 bulan akuntansi <br>
          		<input type="radio">Atur Periode
          </div><br><br>
          <div class="form-group">
            <label class="control-label">Tahun Fiscal Pertama</label>
          	<select maxlength="200" type="text"  class="form-control">
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
           <div class="form-group">
          	<select maxlength="200" type="text"  class="form-control">
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

          <br><br>
          <button class="btn btn-success btn-lg pull-right" type="submit">Finish</button>
        </div>
      </div>
    </div>
  </form>
  
</div>
</div>

</body>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

<script>
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

</html>
