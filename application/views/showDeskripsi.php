<?php 
foreach ($query->result() as $list) {
	echo $list->deskripsi_coa;
}
?>