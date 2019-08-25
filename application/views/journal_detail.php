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

<script>
    $(document).ready(function(){

    $("#ubah_coa").click(function(){
        $("#panelanggota1").hide(500);
        $("#tambah1").show(500);
        $("#tambah2").hide(500);
    });
    });
</script>
<script>
    function showDeskripsi(str) {
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
                xmlhttp.open("GET","showDeskripsi/"+str,true);
                xmlhttp.send();
            }
        }
</script>
</head>
<body class="open">
     
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
        <!-- //pesan berhasil -->
                 <?php

          if ($this->session->flashdata('result_update_journal')) {
        ?>
            
            <div class="content mt-3">
            <?php echo $this->session->flashdata('result_update_journal'); ?>
            </div>
        <?php }elseif($this->session->flashdata('result_tidak_sama')){ ?>
            <div class="content mt-3">
            <?php echo $this->session->flashdata('result_tidak_sama'); ?>
            <div class="col-sm-12">
                <?php 
                foreach($this->input->post('id_coa') AS $key => $val1){ //$val =  offset nilainya bisa berapa saja
                $debit = $this->input->post('debit[]');
                if(preg_match("/^[0-9,]+$/", $debit[$key])) 
                    { $debit1 = str_replace(',', '', $debit); }

                $kredit = $this->input->post('kredit[]');
                if(preg_match("/^[0-9,]+$/", $kredit[$key])) 
                    { $kredit1 = str_replace(',', '', $kredit); }
                }

                ?>
                <b><label>Jumlah debit = Rp. <?php echo array_sum($debit1); ?></label><br>
                <label>Jumlah kredit = Rp. <?php echo array_sum($kredit1); ?></label></b>
            </div> 
            </div>
        <?php } ?>


<form action="" method="post">
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="float: left">Journal</h3>
                            <div class="button-journal">
                                <a href="" onclick="window.open('<?php echo base_url()."month_journal/".$this->uri->segment('2'); ?>', 'newwindow', 'width=1100, height=650,'); return false;" name="open" id="open" class="btn btn-success"><i class="fa  fa-arrow-right"></i>&nbsp open</a>
                                <button type="submit" name="update_id_inputan" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp Save</button>
                                <button type="submit" onclick="confirm('Ingin Menghapus Jurnal Transaksi?');" name= "delete_id_inputan" class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i>&nbsp Delete</a>
                            </div>

                        </div>
                        <br>
                        <div class="card-body">
                        <div class="loginForm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="<?php echo $listjurnal->row()->tanggal_transaksi ?>" name="tgl_transaksi" id="tgl_transaksi" required>
                                        <span class="bar"></span>
                                        <label style="text-transform: capitalize;" class="label-input date">Date</label>                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="reference" value="<?php echo $listjurnal->row()->refrensi ?>" name="reference" class="form-control" required>
                                        <span class="bar"></span>
                                        <label style="text-transform: capitalize;" class="label-input">Reference</label>
                                    </div>
                                </div>
                        </div>

                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="background-color: lightgrey">
                      <tr>
                        <th style="width: 100%">No Account</th> 
                        <th>Deskripsi Jurnal</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Job</th>
                      </tr>
                    </thead>
                    <tbody id="t">
                        <?php foreach ($listjurnal->result_array() as $list1) {
                            ?>
                       <tr class="blank-row">
                        <td style="min-width:500px">
                        <div class="form-group">
                        <select class="select2" id="multi" style="border-radius: 4px; width: 100%" name="id_coa[]" onchange="showDeskripsi(this.value);">
                                <optgroup label='No Account' data-deskripsi='Deskripsi' data-type='Tipe Akun'>
                                    <?php foreach($listcoa->result() as $list){ ?>
                                    <option value="<?php echo $list->id_coa ?>" <?php if($list->id_coa == $list1['id_coa']) echo 'selected ="selected"' ?> data-deskripsi="<?php echo $list->deskripsi_coa; ?>" data-type='<?php echo $list->tipe_akun; ?>'><?php echo $list->no_account ?></option>
                                    <?php } ?>
                                </optgroup>
                            </select>
                        </div>
                        </td>
                        <td><input class="input-td" type="text" id="deskripsi" name="deskripsi[]" placeholder="-" value="<?php echo $list1['deskripsi_jurnal']; ?>"></td>
                        <td><input class="input-td number points" type="text" id = "debit" name="debit[]" placeholder="0" value="<?php echo $list1['debit']; ?>"></td>
                        <td><input class="input-td number points" type="text" id="kredit" name="kredit[]" placeholder="0" value="<?php echo $list1['kredit']; ?>"></td>
                        <td><input style="max-width:60px" class="input-td" type="text" id="job" name="job[]" value="<?php echo $list1['job']; ?>"></td>
                      </tr>
                  <?php } ?>
                      <!-- <tr id="txtHint"></tr> -->

                    </tbody>
                  </table>
                    <!-- <div class="col-md-8"> -->
                        <a href="javascript:void(0)" name="add_row" id="add_row" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp Add row</a>
                        <a href="javascript:void(0)" name="remove_row" id="remove_row" class="btn btn-danger"><i class="fa fa-arrows-alt"></i>&nbsp Remove Row</a>
                    <!-- </div> -->
                    <!-- <div class="col-md-4" style="margin-top: 12px"> -->
                        <!-- ---------------------------------------------------------------------------------- -->
                        <!-- <h6 align="right">Terakhir diubah oleh : <?php echo $listjurnal->row()->username; ?></h6> -->
                    <!-- </div> -->
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

   
<script>
//     function myCreateFunction() {
//         var table = document.getElementById("bootstrap-data-table");
//         var x = document.getElementById("bootstrap-data-table").rows.length;
//         var row = table.insertRow(x);
//         var cell1 = row.insertCell(0);
//         var cell2 = row.insertCell(1);
//         var cell3 = row.insertCell(2);
//         var cell4 = row.insertCell(3);
//         var cell5 = row.insertCell(4);
//         cell1.innerHTML = `<input class="form-control no_account" size="100" name="no_account[]" value="2" />`;
//         cell2.innerHTML = `<input class="input-td" style="border-radius: 4px" type="text" name="deskripsi[]" placeholder="Description">`;
//         cell3.innerHTML = `<input class="input-td" type="text" name="debit[]" placeholder="Debit">`;
//         cell4.innerHTML = `<input class="input-td" type="text" name="kredit[]" placeholder="Credit">`;
//         cell5.innerHTML = `<input class="input-td" type="text" name="job[]" placeholder="Job">`;
//     }
// </script>

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
  $('.select2').select2({
    formatResult: formatResultMulti
  });
});

$('#add_row').click(function(e) {
    $latest_tr  = $('#bootstrap-data-table tr:last');
    $('select.select2').select2('destroy');

    $clone = $latest_tr.clone();

    $latest_tr.after($clone);
    $('select.select2').select2({
        formatResult: formatResultMulti
    });
    $clone.find(':text').val('');
// mulai mendefinisikan ulang row untuk autoformat
$('input.number').keyup(function(event) {  
  // skip for arrow keys
if(event.which >= 37 && event.which <= 40){
   event.preventDefault();
  }

  $(this).val(function(index, value) {
      value = value.replace(/,/g,'');
      return numberWithCommas(value);
  });
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
    
});

$('#remove_row').click(function(e) {
    // item--;
    var rows = document.getElementById("bootstrap-data-table").getElementsByTagName("tr").length;
    if(rows > 3){
        $latest_tr  = $('#bootstrap-data-table tr:last');
        $latest_tr.remove();
        e.preventDefault(); 
    }else{
        alert("jumlah baris terlalu sedikit");
    }

    // show_hide_item(item);
});

$(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }


});
</script>

<!-- auto money value -->
<script>
$('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
   event.preventDefault();
  }

  $(this).val(function(index, value) {
      value = value.replace(/,/g,'');
      return numberWithCommas(value);
  });
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
</script>
</body>
</html>
