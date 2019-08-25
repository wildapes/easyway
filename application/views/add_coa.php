    <div class="row form-group">
        <div class="col col-md-2"><label for="text-input" class="form-control-label">No Account : </label></div>
        <div class="col-12 col-md-10"><input type="text" id="no_account" name="no_account" class="form-control" required></div>
    </div>
    <div class="row form-group">
	    <div class="col col-md-2"><label  class="form-control-label">Deskripsi : </label></div>
	    <div class="col-12 col-md-10"><input type="text" id="deskripsi_coa" name="deskripsi_coa" class="form-control" required></div>
    </div>
    <div class="row form-group">
		<div class="col col-md-2"><label for="text-input" class="form-control-label">Tipe Akun : </label></div>
		<div class="col-12 col-md-10">
			<select name="tipe_akun" class="form-control" list="tipeakun" required>
			<!-- <datalist id="tipeakun"> -->
				<option value="accounts payable">accounts payable</option>
				<option value="accounts receivable">accounts receivable</option>
				<option value="accumulated depreciation">accumulated depreciation</option>
				<option value="cash">cash</option>
				<option value="cost of sales">cost of sales</option>
				<option value="equity-doesnt close">equity-doesn't close</option>
				<option value="equity-gets close">equity-gets close</option>
				<option value="equity-retained earnings">equity-retained earnings</option>
				<option value="expenses">expenses</option>
				<option value="fixed assets">fixed assets</option>
				<option value="income">income</option>
				<option value="inventory">inventory</option>
				<option value="long term liabilities">long term liabilities</option>
				<option value="other assets">other assets</option>
				<option value="other current assets">other current assets</option>
				<option value="other current liabilities">other current liabilities</option>
			<!-- </datalist> -->
		</select>
		</div>
	</div>
<div class="form-group" style="float: right; margin: 0px 5px 20px 0px;">
    <button type="submit" name="tambah_coa" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp Save</button>
</div>