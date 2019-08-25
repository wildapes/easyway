<!DOCTYPE html>
<html>
<body>
<form method="post" id="form-user">
<?php foreach($query->result() as $list){ ?>
	<div class="row form-group">
        <div class="col col-md-2"><label for="text-input" class="form-control-label">No Account : </label></div>
		<div class="col-12 col-md-10"><input type="text" class="form-control" id="no_account" name="no_account" value="<?php echo $list->no_account; ?>" ></div>
	</div>
	<div class="row form-group">
		<div class="col col-md-2"><label for="text-input" class="form-control-label">Deskripsi : </label></div>
		<div class="col-12 col-md-10"><input type="text" class="form-control" id="deskripsi_coa" name="deskripsi_coa" value="<?php echo $list->deskripsi_coa; ?>"></div>
	</div>
<div class="row form-group">
		<div class="col col-md-2"><label for="text-input" class="form-control-label">Tipe Akun : </label></div>
		<div class="col-12 col-md-10">
			<select ="text" class="form-control" list="tipeakun" id="tipe_akun" name="tipe_akun" value="<?php echo $list->tipe_akun; ?>">
			<!-- <datalist id="tipeakun"> -->
				<option value="accounts payable" <?php if($list->tipe_akun == 'accounts payable') echo ' selected="selected"'; ?> >accounts payable</option>
				<option <?php if($list->tipe_akun == 'accounts receivable') echo ' selected="selected"'; ?> value="accounts receivable">accounts receivable</option>
				<option <?php if($list->tipe_akun == 'accumulated depreciation') echo ' selected="selected"'; ?> value="accumulated depreciation">accumulated depreciation</option>
				<option <?php if($list->tipe_akun == 'cash') echo ' selected="selected"'; ?> value="cash">cash</option>
				<option <?php if($list->tipe_akun == 'cost of sales') echo ' selected="selected"'; ?> value="cost of sales">cost of sales</option>
				<option <?php if($list->tipe_akun == 'equity-doesnt close') echo ' selected="selected"'; ?> value="equity-doesnt close">equity-doesn't close</option>
				<option <?php if($list->tipe_akun == 'equity-gets close') echo ' selected="selected"'; ?> value="equity-gets close">equity-gets close</option>
				<option <?php if($list->tipe_akun == 'equity-retained earnings') echo ' selected="selected"'; ?> value="equity-retained earnings">equity-retained earnings</option>
				<option <?php if($list->tipe_akun == 'expenses') echo ' selected="selected"'; ?> value="expenses">expenses</option>
				<option <?php if($list->tipe_akun == 'fixed assets') echo ' selected="selected"'; ?> value="fixed assets">fixed assets</option>
				<option <?php if($list->tipe_akun == 'income') echo ' selected="selected"'; ?> value="income">income</option>
				<option <?php if($list->tipe_akun == 'inventory') echo ' selected="selected"'; ?> value="inventory">inventory</option>
				<option <?php if($list->tipe_akun == 'long term liabilities') echo ' selected="selected"'; ?> value="long term liabilities">long term liabilities</option>
				<option <?php if($list->tipe_akun == 'other assets') echo ' selected="selected"'; ?> value="other assets">other assets</option>
				<option <?php if($list->tipe_akun == 'other current assets') echo ' selected="selected"'; ?> value="other current assets">other current assets</option>
				<option <?php if($list->tipe_akun == 'other current liabilities') echo ' selected="selected"'; ?>  value="other current liabilities">other current liabilities</option>
			<!-- </datalist> -->
		</select>
		</div>
	</div>
	<input style="hidden" type="text" class="form-control" id="id_perusahaan" name="id_perusahaan" value="<?php echo $list->id_perusahaan; ?>"  readonly hidden>
	<input type="text" class="form-control" id="id_coa" name="id_coa" value="<?php echo $list->id_coa; ?>"  readonly hidden>
	<div class="form-group" style="float: right; margin: 0px 5px 0px 20px;">
		<button onclick="return confirm('Ingin Menghapus Chart of Account?');" id="tombol-simpan" name="hapus_coa" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp Delete</button>
		<button  name="update_coa" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp Save</button>
	</div> 
<?php } ?>
</form>
</body>
&nbsp;
<hr style="margin-top: 30px">
</html>