 <script src="<?php echo base_url()."asset/js/jquery-2.1.1.min.js"; ?>"></script>
						<table border="1" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead style="background-color: lightgrey">
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
                                <?php foreach ($query1->result() as $list2) {
                                    $periode_due_date = strtotime('+1 month', strtotime($list2->tanggal_awal));
                                    $a = date('t-F-Y', $periode_due_date);
                                    $b = date('Y-m', $periode_due_date);
                                    $id_perusahaan = $list2->id_perusahaan;
                                    $id_coa = $this->uri->segment('3');
                                    $sql = "SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal where id_coa = '$id_coa' AND id_perusahaan = '$id_perusahaan' AND substring(tanggal_transaksi, 1, 7) = '$b'";
                                    $query = $this->db->query($sql);
                                    foreach ($query->result() as $list) {
                                     ?>
                                  <tr>
                                    <td>1</td>
                                    <td><?php echo $a; ?></td>
                                    <td class="points"><?php echo number_format($list->debit);  ?></td>
                                    <td class="points"><?php echo number_format($list->kredit);  ?></td>
                                    <td class="points"><?php echo number_format($list->debit - $list->kredit); ?></td>
                                    <?php 
                                    $periode_due_date_lastmonth = strtotime('+0 month', strtotime($list2->tanggal_awal));
                                    $b = date('Y-m', $periode_due_date_lastmonth);
                                    $id_perusahaan = $list2->id_perusahaan;
                                    $id_coa = $this->uri->segment('3');
                                    $sql_lastmonth = "SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal where id_coa = '$id_coa' AND id_perusahaan = '$id_perusahaan' AND substring(tanggal_transaksi, 1, 7) = '$b'";
                                    $query_lastmonth = $this->db->query($sql_lastmonth);
                                    $periode_due_date_last2month = strtotime('-1 month', strtotime($list2->tanggal_awal));
                                    // $a = date('t-F-Y', $periode_due_date);
                                    $b_last2month = date('Y-m', $periode_due_date_last2month);
                                    $sql_last2month = "SELECT balance from tb_beginning where id_coa = '$id_coa' AND id_perusahaan = '$id_perusahaan' ";
                                    $query_last2month = $this->db->query($sql_last2month);
                                    $lastmonth = $query_lastmonth->row();
                                    $last2month = $query_last2month->row();
                                     ?>
                                    <td><?php echo number_format(($list->debit - $list->kredit) + ($lastmonth->debit-$lastmonth->kredit) + $last2month->balance); ?></td>
                                    
                                  </tr>
                              <?php }} ?>

                                <?php foreach ($query1->result() as $list2) {
                                    // $date2 = date('Y-m-t', strtotime('+1 month', strtotime($list2->tanggal_awal))); 
                                    $periode_due_date = strtotime('+0 month', strtotime($list2->tanggal_awal));
                                    $a = date('t-F-Y', $periode_due_date);
                                    $b = date('Y-m', $periode_due_date);
                                    $id_perusahaan = $list2->id_perusahaan;
                                    $id_coa = $this->uri->segment('3');
                                
                                    $sql = "SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal where id_coa = '$id_coa' AND id_perusahaan = '$id_perusahaan' AND substring(tanggal_transaksi, 1, 7) = '$b'";
                                    $query = $this->db->query($sql);
                                    foreach ($query->result() as $list) {
                                    ?>
                                  <tr>
                                    <td>2</td>
                                    <td><?php echo $a; ?></td>
                                    <td class="points"><?php echo number_format($list->debit);  ?></td>
                                    <td class="points"><?php echo number_format($list->kredit);  ?></td>
                                    <td class="points"><?php echo number_format($list->debit - $list->kredit); ?></td>
                                    <?php 
                                    $periode_due_date_lastmonth = strtotime('-1 month', strtotime($list2->tanggal_awal));
                                    // $a = date('t-F-Y', $periode_due_date);
                                    $b_lastmonth = date('Y-m', $periode_due_date_lastmonth);
                                    $sql_lastmonth = "SELECT balance from tb_beginning where id_coa = '$id_coa' AND id_perusahaan = '$id_perusahaan' ";
                                    $query_lastmonth = $this->db->query($sql_lastmonth);
                                    $lastmonth = $query_lastmonth->row(); 
                                    ?>    
                                    <td><?php echo number_format($list->debit - $list->kredit + $lastmonth->balance); ?></td>
                                
                                  </tr>
                              <?php }} ?>


                              <?php foreach ($query1->result() as $list2) {
                                    // $date2 = date('Y-m-t', strtotime('+1 month', strtotime($list2->tanggal_awal))); 
                                $periode_due_date = strtotime('-1 month', strtotime($list2->tanggal_awal));
                                $a = date('t-F-Y', $periode_due_date);
                                $b = date('Y-m', $periode_due_date);
                                $id_coa = $this->uri->segment('3');
                                $id_perusahaan = $list2->id_perusahaan;
                                $sql = "SELECT * from tb_beginning where tb_beginning.id_coa = '$id_coa' ";
                                $query = $this->db->query($sql);
                                if(empty($query->result())) { ?>
                                <tr>
                                    <td>3</td>
                                    <td><?php echo $a ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                    <?php }
                                    foreach ($query->result() as $list) {
                                     ?>
                                  <tr>
                                    <td>3</td>
                                    <td><?php echo $a; ?></td>
                                    <?php if($list->balance > 0){ ?>
                                    <td class="points"><?php echo number_format($list->balance) ?></td>
                                    <td class="points"></td>
                                <?php }else{ ?>
                                    <td class="points"></td>
                                    <td class="points"><?php echo number_format($list->balance) ?></td>
                                <?php } ?>
                                    <td class="points"><?php echo number_format($list->balance) ?></td>
                                    <td class="points"><?php echo number_format($list->balance) ?></td>
                                  </tr>
                              <?php }} ?>

                            </tbody>
                            </table>
<script>
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }
    $('.points').each(function(){
    var v_pound = $(this).html();
    v_pound = numberWithCommas(v_pound);

    $(this).html(v_pound)
        
        })

</script>
