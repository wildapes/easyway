<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class easyway_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

  public function login($username, $password){
     $p = $this->db->get_where("tb_login",array("username"=>$username,"password"=>md5($password)));
        return $p;
  }
  public function getIduser($username){
        $query = $this->db->select('level')
              ->from('tb_login')
              ->where('username', $username)
              ->get();
        return $query->row(); 
  }
  public function select_user($username){
       $query = $this->db->select('*')
              ->from('tb_pengelolaan')
              ->join ('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_pengelolaan.id_perusahaan', 'inner')
              ->where('tb_pengelolaan.username', $username)
              ->get();
        return $query; 
  } 
  public function hapusPerusahaan($id){
        $this->db->where('id_perusahaan', $id);
        $this->db->delete('tb_perusahaan');
  }
  public function hapusPengelolaan($id_pengelolaan){
        $this->db->where('id_pengelolaan', $id_pengelolaan);
        $this->db->delete('tb_pengelolaan');
  }
  public function hapusPengguna($username){
        $this->db->where('username', $username);
        $this->db->delete('tb_login');
  }
  public function get_pengguna(){
        $query = $this->db->select('*')
              ->from('tb_login')
              ->get();
        return $query;
  }
  public function get_pengguna2(){
        $query = $this->db->select('*')
              ->from('tb_login')
              ->where('level !=', 'admin')
              ->get();
        return $query;
  }
  public function edit_perusahaan($id){  
        $query = $this->db->select('*')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id)
              ->get();
        return $query;
    }
    public function search_perusahaan($search){
      $sql =("SELECT * from tb_perusahaan WHERE nama_perusahaan LIKE '%$search%'  
               ");
      $query = $this->db->query($sql);
      return $query;        
    }
    public function update_perusahaan($id){
        $nama_perusahaan = $this->input->post("nama_perusahaan");
        $alamat = $this->input->post("alamat");
        $telepon = $this->input->post("telepon");
        $fax = $this->input->post("fax");
        $direktur = $this->input->post("direktur");
        $tipe_bisnis = $this->input->post("tipe_bisnis");
        $website = $this->input->post("website");
        $email = $this->input->post("email");
        $tanggal_awal = $this->input->post("tahun_awal")."-".$this->input->post("bulan_awal")."-01";

        $update_company=array(
          'nama_perusahaan'=>$nama_perusahaan,
          'alamat'=>$alamat,
          'telepon'=>$telepon,
          'fax'=>$fax,
          'direktur'=>$direktur,
          'tipe_bisnis'=>$tipe_bisnis,
          'website'=>$website,
          'email'=>$email, 
          'tanggal_awal'=>$tanggal_awal
          );
          $this->db->where("id_perusahaan",$id);
          return $this->db->update("tb_perusahaan", $update_company);
    }     
    
    public function getCoa($id){  
        $query = $this->db->select('*')
              ->from('tb_coa')
              ->where('id_perusahaan', $id)
              ->order_by('no_account', 'ASC')
              ->get();
        return $query;
    }
    public function getPeriode_forCoa($id){
     $query = $this->db->select('tanggal_awal')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id)
              ->get();
        return $query; 
    }
    public function getCoanew($id){  

        // $sql =(" SELECT * from tb_coa WHERE id_perusahaan = '$id' AND NOT EXISTS(select * FROM tb_coa WHERE id_perusahaan =  no_account = no_account) 
        //       ");
        $query = $this->db->select('*')
              ->from('tb_coa')
              ->where('id_perusahaan', $id)
              ->order_by('no_account', 'ASC')
              ->get();
        return $query->result();
    }
    public function getCoa_for_update($no_account, $id) 
    {  
        $query = $this->db->get_where("tb_coa",array("no_account"=>$no_account,"id_perusahaan"=>$id));
        return $query->row();
    }
    public function get_table($id) 
    {
        $query = $this->db->select('*')
              ->from('tb_coa')
              ->where('id_coa', $id)
              ->get();
        return $query;
    }
    public function get_tgl_awal($id_perusahaan){
        $query = $this->db->select('tanggal_awal')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id_perusahaan)
              ->get();
        return $query;
    }

    public function total_beginning($id_perusahaan, $id_coa, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tb_coa.id_coa = '$id_coa' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal'  
               ");
      $query = $this->db->query($sql);
      return $query;       

    }

    public function get_perusahaan(){
              $query = $this->db->select('*')
              ->from('tb_perusahaan')
              ->get();
        return $query; 
    }

    public function get_nama_coa($id_perusahaan, $id_coa){
       $query = $this->db->select('no_account, deskripsi_coa')
              ->from('tb_coa')
              ->where('id_perusahaan', $id_perusahaan)
              ->where('id_coa', $id_coa)
              ->get();
        return $query; 
    }

    public function get_idp($id) 
    {
        $query = $this->db->select('tb_coa.id_perusahaan, tb_perusahaan.tanggal_awal')
              ->from('tb_coa')
              ->join('tb_perusahaan', 'tb_coa.id_perusahaan = tb_perusahaan.id_perusahaan', 'inner')
              ->where('id_coa', $id)
              ->get();
        return $query->row();
    }

    public function get_beginning($id_perusahaan, $periode) 
    {
        $query = $this->db->select('*')
              ->from('tb_beginning')
              ->where('id_perusahaan', $id_perusahaan)
              // ->where('periode_balance', $periode)
              ->get();
        return $query->result_array();
    }

    public function get_periode_history($id_perusahaan, $tanggal_awal, $id) 
    {   
        $query = $this->db->select('tanggal_awal, id_perusahaan')
              ->from('tb_perusahaan')
              // ->join('tb_periode', 'tb_jurnal.id_perusahaan = tb_periode.id_perusahaan')
              ->where('tb_perusahaan.id_perusahaan', $id_perusahaan)
              // ->where('id_coa', $id)
              // ->where('SUBSTRING(tanggal_transaksi, 1, 7)<=', $date2)
              // ->group_by('YEAR(tanggal_awal), MONTH(tanggal_awal)')
              ->get();
        return $query;
    }

    public function save_perusahaan(){
      $nama_perusahaan = $this->input->post("nama_perusahaan");
      $alamat = $this->input->post("alamat");
      $telepon = $this->input->post("telepon");
      $fax = $this->input->post("fax");
      $direktur = $this->input->post("direktur");
      $tipe_bisnis = $this->input->post("tipe_bisnis");
      $website = $this->input->post("website");
      $email = $this->input->post("email");
      $tanggal_awal = $this->input->post("tahun_awal")."-".$this->input->post("bulan_awal")."-01";

      $new_company=array(
        'nama_perusahaan'=>$nama_perusahaan,
        'alamat'=>$alamat,
        'telepon'=>$telepon,
        'fax'=>$fax,
        'direktur'=>$direktur,
        'tipe_bisnis'=>$tipe_bisnis,
        'website'=>$website,
        'email'=>$email, 
        'tanggal_awal'=>$tanggal_awal
        );

        return $this->db->insert("tb_perusahaan", $new_company);
    }
    public function save_pengguna(){
      $nama = $this->input->post("nama");
      $username = $this->input->post("username");
      $password = $this->input->post("password");
      $email = $this->input->post("email");
      
      $new_company=array(
        'nama'=>$nama,
        'username'=>$username,
        'password'=>md5($password),
        'email'=>$email,
        'level'=>'pengguna',
        );

        return $this->db->insert("tb_login", $new_company);
    }
    public function save_pengelolaan(){
      $id_perusahaan = $this->input->post("id_perusahaan");
      $username = $this->input->post("username");
      
      $new_company=array(
        'id_pengelolaan'=>'',
        'id_perusahaan'=>$id_perusahaan,
        'username'=>$username
        );

        return $this->db->insert("tb_pengelolaan", $new_company);
    }
    public function insertCoa($id){
      $no_account = $this->input->post("no_account");
      $deskripsi_coa = $this->input->post("deskripsi_coa");
      $tipe_akun = $this->input->post("tipe_akun");
        
      $insertCoa=array(
        'no_account'=>$no_account,
        'deskripsi_coa'=>$deskripsi_coa,
        'tipe_akun'=>$tipe_akun,
        'id_perusahaan'=>$id
        );

        return $this->db->insert("tb_coa", $insertCoa);      
    }

    public function get_coa_for_beginning(){
        $query = $this->db->select_max('id_coa')
                ->from('tb_coa')
                ->get();
        return $query;
    }

    public function get_pengelolaan(){
        $query = $this->db->select('*')
                ->from('tb_pengelolaan')
                ->join('tb_perusahaan', 'tb_pengelolaan.id_perusahaan = tb_perusahaan.id_perusahaan', 'inner')
                ->get();
        return $query;
    }

    public function get_pengelolaan_cek(){
      $username = $this->input->post("username");
      $id_perusahaan = $this->input->post("id_perusahaan");
      $query = $this->db->select('*')
                ->from('tb_pengelolaan')
                ->where('username', $username)
                ->where('id_perusahaan', $id_perusahaan)
                ->get();
      return $query;
    }

      public function insertCoa_beginning($id, $id_coa_new){
      $id_coa_insert = $id_coa_new;
      $insertCoa_beginning=array(
        'id'=>'',
        'id_coa'=>$id_coa_insert,
        'balance'=>0,
        'id_perusahaan'=>$id
        );
        // $query = $this->db->insert("tb_beginning", $insertCoa_beginning);
        // $query_cek = $this->db->query($query);
        // die(var_dump($id_coa_insert));
        return $this->db->insert("tb_beginning", $insertCoa_beginning);       
    }

    
    public function hapusCoa($id_coa){
      $this->db->where('id_coa', $id_coa);
      $this->db->delete('tb_coa');
    }
    
    public function updateCoa($id_coa){
      $no_account = $this->input->post("no_account");
      $deskripsi_coa = $this->input->post("deskripsi_coa");
      $tipe_akun = $this->input->post("tipe_akun");
      $id_perusahaan = $this->input->post("id_perusahaan");
      $updateCoa=array(
        'no_account'=>$no_account,
        'deskripsi_coa'=>$deskripsi_coa,
        'tipe_akun'=>$tipe_akun,
        'id_perusahaan'=>$id_perusahaan
        );

        $this->db->where("id_coa",$id_coa);
        return $this->db->update("tb_coa", $updateCoa);
    }

    public function list_perusahaan($limit_per_page, $start_index){
        $this->db->limit($limit_per_page, $start_index);
        $query = $this->db->get("tb_perusahaan");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }    
            return $data;
        }
        return false;
    }

     public function list_perusahaan_user($username){
        $query = $this->db->select('*')
                ->from('tb_perusahaan')
                ->join('tb_pengelolaan', 'tb_perusahaan.id_perusahaan = tb_pengelolaan.id_perusahaan', 'inner')
                ->where('username', $username)
                ->get();
                return $query;
    }


    public function get_total() 
    {
        return $this->db->count_all("tb_perusahaan");
    }
    public function jumlah_jurnal($id_coa)
    {
        $query = $this->db->select('*')
                ->from('tb_jurnal')
                ->where('id_coa', $id_coa)
                ->get();
        return $query;
    }
    public function list_perusahaan_import($id){
        $query = $this->db->select('*')
                ->from('tb_perusahaan')
                ->where('id_perusahaan !=', $id)
                ->get();
        return $query;
    }
    public function journal_all(){
        $query = $this->db->select('MAX(id_inputan) as id_inputan')
                ->from('tb_jurnal')
                ->get();
      return $query->row();
    }
///////////////////////////////////////////////////////////////////////////////////////////
    public function journal_detail($id_perusahaan, $id_inputan){
        $query = $this->db->select('*')
                ->from('tb_jurnal')
                ->where('id_perusahaan', $id_perusahaan)
                ->where('id_inputan', $id_inputan)
                ->get();
        return $query;
    }
///////////////////////////////////////////////////////////////////////////////////////////
    function post_add($result = array())
    {
      $total_array = count($result);
        if($total_array != 0){
          return $this->db->insert_batch('tb_jurnal', $result);
       }
    }

    function post_coa($data){
          return $this->db->insert('tb_coa', $data);
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    public function get_detail_financial($id_perusahaan, $id_coa, $periode1, $periode2){
        $query = $this->db->select('*')
              ->from('tb_jurnal')
              ->join('tb_coa', 'tb_jurnal.id_coa = tb_coa.id_coa', 'inner')
              ->where('tb_jurnal.id_perusahaan', $id_perusahaan)
              ->where('tb_jurnal.id_coa', $id_coa)
              ->where('tb_jurnal.tanggal_transaksi <= ', $periode2)
              ->where('tb_jurnal.tanggal_transaksi >= ', $periode1)
              ->order_by('tanggal_transaksi', 'ASC')
              ->get();
        return $query;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
    public function get_beginning_balance($id_perusahaan, $id_coa){
     $query = $this->db->select('balance')
              ->from('tb_beginning')
              ->where('id_perusahaan', $id_perusahaan)
              ->where('id_coa', $id_coa)
              ->get();
        return $query; 
    }

    public function get_namapt($id_perusahaan){
      $query = $this->db->select('nama_perusahaan')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id_perusahaan)
              ->get();
      return $query;
    }

    public function get_coa($id){

    }
    public function getDataById()
    {
        return $this->db->get_where("tb_user",array("id_user"=>$this->session->userdata('id_user')));   
    }

    public function get_periode($uri){
        $query = $this->db->select('*')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $uri)
              ->get();
        return $query;
    }
    public function get_periode_tglawal($uri){
        $query = $this->db->select('*')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $uri)
              ->get();
        return $query->row();
    }

    public function get_journal($uri, $bln, $thn){
        $query = $this->db->select('*')
              ->from('tb_jurnal')
              ->where('id_perusahaan', $uri)
              // 'SUBSTRING(title, 1, 1)=','H'
              ->where('SUBSTRING(tanggal_transaksi, 1, 4)=', $thn)
              ->where('SUBSTRING(tanggal_transaksi, 6, 2)=', $bln)
              ->order_by('tanggal_transaksi', 'ASC')
              ->group_by('id_inputan','ASC')
              ->get();
        return $query;
    }
    public function getJournalnew($bln, $thn, $uri){  
        $query = $this->db->select('*')
              ->from('tb_jurnal')
              ->where('id_perusahaan', $uri)
              ->where('SUBSTRING(tanggal_transaksi, 6, 2)=', $bln)
              ->where('SUBSTRING(tanggal_transaksi, 1, 4)=', $thn)
              ->order_by('tanggal_transaksi', 'ASC')
              ->group_by('id_inputan', 'ASC')
              ->get();
        return $query;
    }
    public function getJournalnew2($bln, $thn, $uri){  
        $query = $this->db->select('tanggal_transaksi')
              ->from('tb_jurnal')
              ->where('id_perusahaan', $uri)
              ->where('SUBSTRING(tanggal_transaksi, 6, 2)=', $bln)
              ->where('SUBSTRING(tanggal_transaksi, 1, 4)=', $thn)
              ->order_by('tanggal_transaksi', 'ASC')
              ->get();
        return $query;
    }
    public function showDeskripsi($id_coa){
       $query = $this->db->select('*')
              ->from('tb_coa')
              ->where('id_coa', $id_coa)
              ->get();
        return $query; 
    }
// public function get_finance_debitkredit($periode1, $periode2){
// $query = $this->db->select('finl_tbl.debit as debit, tb_coa.no_account, tb_coa.deskripsi_coa, tb_coa.id_coa')
//       ->from('tb_coa')
//       ->join('(SELECT SUM(tb_jurnal.debit) as debit, id_coa FROM tb_jurnal group by id_coa) as finl_tbl', 'finl_tbl.id_coa = tb_coa.id_coa', 'left')
//       ->order_by('tb_coa.no_account')
//       ->get();
// return $query;  
// }
    public function get_finance_debitkredit($periode1, $periode2, $uri){

      $sql = ("
        SELECT DISTINCT SUM(debit) AS debit, SUM(kredit) AS kredit, tb_jurnal.tanggal_transaksi, tb_coa.id_coa, tb_coa.no_account, tb_coa.deskripsi_coa, balance FROM tb_beginning 
            LEFT JOIN tb_coa 
              LEFT JOIN tb_jurnal ON tb_jurnal.id_coa = tb_coa.id_coa
            ON tb_coa.id_coa = tb_beginning.id_coa
            WHERE tb_coa.id_perusahaan = '$uri'
        GROUP BY tb_coa.id_coa, tb_coa.no_account, MONTH(tanggal_transaksi), YEAR(tanggal_transaksi)
        -- UNION 
        -- SELECT DISTINCT SUM(debit) AS debit, SUM(kredit) AS kredit, tb_jurnal.tanggal_transaksi, tb_coa.id_coa, tb_coa.no_account, tb_coa.deskripsi_coa FROM tb_coa 
        --     RIGHT JOIN tb_jurnal ON tb_jurnal.id_coa = tb_coa.id_coa 
        --     WHERE tb_coa.id_perusahaan = '$uri'
        -- GROUP BY tb_jurnal.id_coa, tb_coa.no_account, tb_coa.deskripsi_coa

        ORDER BY tb_coa.no_account ASC
      ");
      $query = $this->db->query($sql);
      return $query->result();
    }
    
    public function get_finance_coa($uri){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$uri' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result(); 
      }

    public function total_debit_kredit($periode1, $periode2, $uri){
      $sql = ("
        SELECT SUM(kredit) as kredit, SUM(debit) as debit FROM tb_jurnal inner join tb_coa on tb_coa.id_coa = tb_jurnal.id_coa where tb_jurnal.id_perusahaan = '$uri' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1'
        ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_balance($uri){
      $sql =("SELECT SUM(balance) as balance from tb_beginning where id_perusahaan = '$uri' 
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    // public function get_finance_debitkredit($periode1, $periode2, $uri){
    //   $query = $this->db->select('debit')
    //           ->from('tb_jurnal')
    //           ->where('id_perusahaan', $uri)
    //           // ->where('tanggal_transaksi<=', $periode1)
    //           // ->where('tanggal_transaksi<=', $periode2)
    //           // ->order_by('no_account')
    //           // ->group_by('id_coa')
    //           ->get();
    //     return $query;  

    // }
    public function get_finance_balance($uri){
      $query = $this->db->select('*')
              ->from('tb_beginning')
              ->where('id_perusahaan', $uri)
              ->get();
        return $query;  
    }
    public function get_finance_lastmonth($uri, $periode1, $periode2){
          $sql = ("
        SELECT SUM(debit) AS debit, SUM(kredit) AS kredit, id_coa FROM tb_jurnal 
            WHERE id_perusahaan = '$uri' AND tanggal_transaksi < '$periode1'
        GROUP BY id_coa
      ");
      $query = $this->db->query($sql);
      return $query;  
    }

    public function getTanggalawal($id_perusahaan){
        $query = $this->db->select('tanggal_awal')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id_perusahaan)
              ->get();
        return $query; 
    }

    public function getBalance($id_perusahaan){
        $query = $this->db->select('*')
              ->from('tb_coa')
              ->join('tb_beginning','tb_coa.id_coa = tb_beginning.id_coa', 'inner')
              ->where('tb_coa.id_perusahaan', $id_perusahaan)
              ->order_by('tb_coa.no_account')
              ->get();
        return $query; 
    }

    function post_balance($result = array())
    {
      $total_array = count($result);
        if($total_array != 0){
          return $this->db->insert_batch('tb_beginning', $result);
       }
    }

    public function post_balance_update($periode){
        $id_coa = $this->input->post('id_coa[]');
        // $periode_balance = $this->input->post('periode_balance[]');
        $id_perusahaan = $this->uri->segment('2');
        $balance = $this->input->post('balance[]');
        $id_balance = $this->input->post('id_balance[]');
         
      for($i=0;$i<count($id_balance);$i++) 
      {
        $this->db->set('balance', $balance[$i]);
        $this->db->where('id', $id_balance[$i]);
        $this->db->update('tb_beginning');
      }
      session_start();
      $_SESSION['periode']=$periode_balance;
      $this->session->set_flashdata('result_update', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Saldo Awal Berhasil diupdate
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
      redirect('beginning_balance/'.$id_perusahaan);
      }

      public function income($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'income' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      // die(var_dump($query->result()));
      return $query->result();       
    }

    public function total_income($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'income' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

     public function total_income_neraca($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'income' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= 'SUBSTRING($periode2, 1, 4).-01.-01'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function balance_income($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'income'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function cost($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'cost of sales' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

    public function total_cost($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tipe_akun = 'cost of sales' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' 
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function total_cost_neraca($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tipe_akun = 'cost of sales' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= 'SUBSTRING($periode2, 1, 4).-01.-01' 
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function balance_cost($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'cost of sales'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function expenses($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'expenses' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

    public function total_expenses($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tipe_akun = 'expenses' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1'
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function total_expenses_neraca($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tipe_akun = 'expenses' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= 'SUBSTRING($periode2, 1, 4).-01.-01'
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_expenses($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'expenses'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

// neraca
// aktiva
    public function current_assets($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'cash' OR tipe_akun = 'accounts receivable' OR tipe_akun = 'inventory' OR tipe_akun = 'other current assets') ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

      public function total_ca($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND (tipe_akun = 'cash' OR tipe_akun = 'accounts receivable' OR tipe_akun = 'inventory' OR tipe_akun = 'other current assets')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_ca($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'cash' OR tipe_akun = 'accounts receivable' OR tipe_akun = 'inventory' OR tipe_akun = 'other current assets')  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_beginning_ca($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND (tipe_akun = 'cash' OR tipe_akun = 'accounts receivable' OR tipe_akun = 'inventory' OR tipe_akun = 'other current assets')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }


      public function property($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'fixed assets' OR tipe_akun = 'accumulated depreciation') ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

      public function total_property($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND (tipe_akun = 'fixed assets' OR tipe_akun = 'accumulated depreciation')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_property($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'fixed assets' OR tipe_akun = 'accumulated depreciation')  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_beginning_p($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND (tipe_akun = 'fixed assets' OR tipe_akun = 'accumulated depreciation')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function other($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'other assets' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

      public function total_other($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND tipe_akun = 'other assets'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_other($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'other assets'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_beginning_o($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tipe_akun = 'other assets'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }


    //pasiva

    public function liabilities($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'accounts payable' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

      public function total_liabilities($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND tipe_akun = 'accounts payable'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_liabilities($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'accounts payable'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

      public function total_beginning_li($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tipe_akun = 'accounts payable'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function longterm($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'long term liabilities' ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

    public function total_longterm($id_perusahaan, $periode1, $periode2){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan='$id_perusahaan' AND tanggal_transaksi <= '$periode2' AND tanggal_transaksi >= '$periode1' AND tipe_akun = 'long term liabilities'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_longterm($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tipe_akun = 'long term liabilities'  
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_beginning_lt($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND tipe_akun = 'long term liabilities'  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }    

    public function capital($id_perusahaan){
      $sql = ("
        SELECT tb_coa.id_coa, no_account, deskripsi_coa, balance, tb_coa.id_perusahaan FROM tb_coa INNER JOIN tb_beginning ON tb_coa.id_coa = tb_beginning.id_coa where tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'equity-doesnt close' OR tipe_akun = 'equity-retained earnings') ORDER BY no_account
        ");
      $query = $this->db->query($sql);
      return $query->result();       
    }

    public function total_capital($id_perusahaan, $periode1, $periode2){
      // die(var_dump($periode2));
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit, deskripsi_coa, tanggal_transaksi from tb_coa inner join tb_jurnal on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi >= '$periode1' AND tanggal_transaksi <= '$periode2' AND (tipe_akun = 'equity-doesnt close' OR tipe_akun = 'equity-retained earnings')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }
    
    public function balance_capital($id_perusahaan){
     $sql =("SELECT SUM(balance) as balance from tb_beginning inner join tb_coa on tb_beginning.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND (tipe_akun = 'equity-doesnt close' OR tipe_akun = 'equity-retained earnings')
               ");
      $query = $this->db->query($sql);
      return $query; 
    }

    public function total_beginning_capital($id_perusahaan, $periode1, $tanggal_awal){
      $sql =("SELECT SUM(debit) as debit, SUM(kredit) as kredit from tb_jurnal inner join tb_coa on tb_jurnal.id_coa = tb_coa.id_coa WHERE tb_coa.id_perusahaan = '$id_perusahaan' AND tanggal_transaksi < '$periode1' AND tanggal_transaksi >= '$tanggal_awal' AND (tipe_akun = 'equity-doesnt close' OR tipe_akun = 'equity-retained earnings')  
               ");
      $query = $this->db->query($sql);
      return $query;       
    }

    public function query_delete($id_inputan, $id_perusahaan){
      $this->db->where('id_inputan', $id_inputan);
      $this->db->where('id_perusahaan', $id_perusahaan);
      $this->db->delete('tb_jurnal');      
    }

    public function tanggal_awal($id_perusahaan){
      $query = $this->db->select('tanggal_awal')
              ->from('tb_perusahaan')
              ->where('id_perusahaan', $id_perusahaan)
              ->get();
        return $query;      
    }


  }         

