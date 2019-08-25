<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
</head>
<form action= "" type="post">
<div style="float:right;">
    <button name="import_coa" class="btn btn-warning" id="import_button" type="submit"><i class="fa fa-paste"></i>&nbsp <b>Import<b></button>
</div>
<div class="row form-group col-md-10">
      <div class="form-check">
        <div class="checkbox">
        <?php
            $numOfCols = 2;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
         ?>
          <div class="row">
       
          <?php       
            foreach ($query as $list => $key){
              $my_id = $this->uri->segment('3');
              // die(var_dump($query[$list]->no_account));
              $my_no_account = $query[$list]->no_account; 
              $sql_my =(" SELECT no_account from tb_coa WHERE id_perusahaan = '$my_id' AND no_account = '$my_no_account'    
                      "); //query mengambil nilai pada perusahaan yg akan mengimport
              $query_my = $this->db->query($sql_my);
              $query_result = $query_my->row();

              // die(var_dump($query_result));
              if(!empty($query_result)){
                continue;
              }
              if($key->no_account == NULL){
                continue;
              }
            ?>
            <div class="col-md-<?php echo $bootstrapColWidth; ?>">
              <!-- <div> -->
              <input type="checkbox" id="select_all" name="no_account[]" value="<?php echo $key->no_account ?>" class="form-check-input">
              <label for="<?php echo $key->no_account ?>"><?php echo $key->no_account ?>
              </label>
              <input type="text" value="<?php echo $key->deskripsi_coa ?>" name="deskripsi_coa[]" hidden>
              <input type="text" value="<?php echo $key->tipe_akun ?>" name="tipe_akun[]" hidden>
              <?php echo $key->deskripsi_coa ?>
              
              <!-- </div> -->
            </div>
</form>
          <?php  $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">'; 
  } ?>
        </div>
      </div>
    </div>
</div>
<div class="form-group">
</div>
</b>