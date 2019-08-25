<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
    parent::__construct();
        $this->load->model('easyway_model');
        $this->load->library('pagination');
        $this->load->helper('url');
	}

public function index(){
        $this->load->model('easyway_model');
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }
        
        $username = $this->session->userdata('login');
        $data["listperusahaan"] = $this->easyway_model->list_perusahaan_user($username); 
        if(isset($_POST['search_perusahaan'])){
            $search = $this->input->post('search');
            $data['search_perusahaan'] = $this->easyway_model->search_perusahaan($search);
        }             
        $this->load->view('halaman_utama', $data);
    }

    // public function new_perusahaan(){
    //     $data["listperusahaan"] = $this->easyway_model->list_perusahaan();        
    //     $this->load->view('new_perusahaan', $data);
    // }
    public function login(){
        if(isset($_POST["login"])){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $d = $this->easyway_model->login($username,$password);
            if($d->num_rows() > 0)
            {
                $this->session->set_userdata('login', $username);
                $getid_user= $this->easyway_model->getIduser($username);
                $id_user= $getid_user->level;
                $this->session->set_userdata('level', $id_user);
                if($this->session->userdata('level') == 'admin'){
                redirect ('halaman_admin');    
                }else{
                    redirect ('');
                }
                
            }
            else{
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
        $this->load->view('login');
    }

    public function hapus_perusahaan($id){

        $getcoa= $this->easyway_model->getCoa($id);
        if($getcoa->num_rows() >= 1){
            $this->session->set_flashdata('gagal_hapus_perusahaan', 'o');
            redirect('halaman_admin');
        }else{
        $b = $this->easyway_model->hapusPerusahaan($id);
            $this->session->set_flashdata('result_hapus_perusahaan', 'o');
            redirect('halaman_admin');
        }    
    }

    public function hapus_pengelolaan($id_pengelolaan){
        $b = $this->easyway_model->hapusPengelolaan($id_pengelolaan);
            $this->session->set_flashdata('result_hapus_pengelolaan', 'o');
            redirect('pengelolaan');
    }

    public function hapus_pengguna($username){
        $b = $this->easyway_model->hapusPengguna($username);
            $this->session->set_flashdata('result_hapus', 'o');
            redirect('daftar_pengguna');    
    }

    public function daftar_pengguna(){
        if($this->session->userdata('level') != 'admin'){
            redirect('login');  
        }
        if(isset($_POST["add_perusahaan"])){
          $savepengguna = $this->easyway_model->save_pengguna();
            if($savepengguna){
                $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Berhasil menambah pengguna baru
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('daftar_pengguna');
            }else{
                echo "error Tambah Perusahaan";
            }  
        }elseif (isset($_POST["insert_pengelolaan"])) {
            $savepengelolaan = $this->easyway_model->save_pengelolaan();
            if($savepengelolaan){
                $this->session->set_flashdata('result_insert_pengelolaan', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Berhasil
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('daftar_pengguna');
            }else{
                echo "error Tambah Perusahaan";
            }
        }
        $data["detail"] = $this->easyway_model->get_pengguna();
        $data["detail2"] = $this->easyway_model->get_pengguna2();
        $data["detail_perusahaan"] = $this->easyway_model->get_perusahaan();
        $data['listpengelolaan'] = $this->easyway_model->get_pengelolaan();
        $this->load->view('daftar_pengguna', $data);
    }   


     public function pengelolaan_perusahaan(){
        if($this->session->userdata('level') != 'admin'){
            redirect('login');  
        }
        if(isset($_POST["add_perusahaan"])){
          $savepengguna = $this->easyway_model->save_pengguna();
            if($savepengguna){
                $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Berhasil menambah pengguna baru
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('pengelolaan');
            }else{
                echo "error Tambah Perusahaan";
            }  
        }elseif (isset($_POST["insert_pengelolaan"])) {
            $cek_exist = $this->easyway_model->get_pengelolaan_cek();
            // die(var_dump($cek_exist->num_rows()));
            if($cek_exist->num_rows() < 1){
                $savepengelolaan = $this->easyway_model->save_pengelolaan();
                if($savepengelolaan){
                    $this->session->set_flashdata('result_insert_pengelolaan', 
                        '
                        <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-success">Success</span> Berhasil
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        </div>
                        ');
                    redirect('pengelolaan');
                }else{
                    echo "error Tambah Perusahaan";
                }
            }else{
                $this->session->set_flashdata('failed_insert_pengelolaan', 
                        '
                        <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-success">Success</span> Berhasil
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        </div>
                        ');
                    redirect('pengelolaan');
            }
        }
        $data["detail"] = $this->easyway_model->get_pengguna();
        $data["detail2"] = $this->easyway_model->get_pengguna2();
        $data["detail_perusahaan"] = $this->easyway_model->get_perusahaan();
        $data['listpengelolaan'] = $this->easyway_model->get_pengelolaan();
        $this->load->view('pengelolaan_perusahaan', $data);
    }     


    public function halaman_admin(){
        if($this->session->userdata('level') != 'admin'){
            redirect('login');  
        }

        $this->load->model('easyway_model');
        
        $data = array();
        $limit_per_page = 8;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->easyway_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $data["listperusahaan"] = $this->easyway_model->list_perusahaan($limit_per_page, $start_index); 
            $config['base_url'] = base_url().'home/halaman_admin';

            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            // style
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';//this is active tab
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>'; 
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

        if(isset($_POST["add_perusahaan"]))
        {
            $saveperusahaan = $this->easyway_model->save_perusahaan();
            if($saveperusahaan){
                $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Berhasil membuat Perusahaan baru
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('halaman_admin');
            }else{
                echo "error Tambah Perusahaan";
            }
        }
        elseif(isset($_POST['search_perusahaan'])){
            $search = $this->input->post('search');
            $data['search_perusahaan'] = $this->easyway_model->search_perusahaan($search);
        }
        elseif (isset($_POST['update_perusahaan'])) {
            $id = $this->input->post('id_perusahaan');
            $update_perusahaan = $this->easyway_model->update_perusahaan($id);
            if($update_perusahaan){
                $this->session->set_flashdata('update_perusahaan', '1');
                redirect('halaman_admin');
            }
                     }             
        $data['listpengelolaan'] = $this->easyway_model->get_pengelolaan();
        $this->load->view('halaman_admin', $data);
    }
    public function import_coa($id){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }
        // $data['query'] = $this->easyway_model->getCoanew($id);
        $data["listperusahaan"] = $this->easyway_model->list_perusahaan_import($id);
        $id_perusahaan = $id;
        if(isset($_POST['import_coa'])){  
            if(!empty($_POST['no_account'])) {
            $data["detail_pt"] = $this->easyway_model->get_namapt($id_perusahaan);
            $no_account = $this->input->post('no_account[]');
            $deskripsi_coa = $this->input->post('deskripsi_coa[]');
            $tipe_akun = $this->input->post('tipe_akun[]');
            $id_perusahaan = $this->uri->segment('2');

            for ($i = 0; $i < count($no_account); $i++) {
               $data = array(
                   'no_account'=> $no_account[$i],
                   'deskripsi_coa'=>$deskripsi_coa[$i],
                   'tipe_akun'=> $tipe_akun[$i],
                   'id_perusahaan'=>$id_perusahaan,
               );
               // die(var_dump(count($no_account)));
                $insert_coa = $this->easyway_model->post_coa($data);
                if($insert_coa){
                     $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Import Chart of Account Berhasil
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('import_coa/'.$id);
                }
            }
        }else{ ?>
            <script>
                alert("Data Kosong, Import Gagal !!!");
                window.location.href = "";
            </script>
        <?php }
    
    }
        $data["detail_pt"] = $this->easyway_model->get_namapt($id_perusahaan);
        $this->load->view('import_coa', $data);
    }
    public function get_coa($my_id, $id){
        
        // die(var_dump($my_id));
        $data['query'] = $this->easyway_model->getCoanew($id);
        $this->load->view('get_coa_new_perusahaan', $data);
    }
    // public function halaman_utama_list(){
    //     $data['listperusahaan'] = $this->easyway_model->list_perusahaan();
    //     $this->load->view('halaman_utama_list', $data);
    // }
    
    // public function perusahaan(){
    //     $this->load->view('perusahaan');
    // }
    
    public function coa($id){
        $username = $this->session->userdata('login');
        $user = $this->easyway_model->select_user($username)->num_rows();
        
        if($this->session->userdata('level') != 'pengguna' || $user < 1){
            redirect('login');  
        }

        $id_coa = $this->input->post('id_coa');
        if(isset($_POST["tambah_coa"]))
        {
            
            $savecoa = $this->easyway_model->insertCoa($id);
            // if($savecoa){
            $get_id_coa = $this->easyway_model->get_coa_for_beginning()->row();
            
            $id_coa_new = $get_id_coa->id_coa;
            // die(var_dump($id_coa_new));
            $savecoa_beginning = $this->easyway_model->insertCoa_beginning($id, $id_coa_new);    
            $this->session->set_flashdata('result_insert1', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Data Chart of Account Berhasil ditambahkan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('coa/'.$id);
            // }
        }
        elseif(isset($_POST["hapus_coa"])){
           // echo "jjjjj";
            $jumlah_jurnal = $this->easyway_model->jumlah_jurnal($id_coa);
            if($jumlah_jurnal->num_rows() >= 1){
            $this->session->set_flashdata('result', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-danger">Failed</span> Gagal Menghapus Karena Chart of Account sudah digunakan pada jurnal transaksi
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('coa/'.$id);    
            }else{
            $hapus_coa = $this->easyway_model->hapusCoa($id_coa);
            $this->session->set_flashdata('result', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Data Chart of Account Berhasil dihapus
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('coa/'.$id);
               
            }
        }
        elseif(isset($_POST["update_coa"]))
        {
            $no_account = $this->input->post("no_account");
            $id_coa = $this->input->post('id_coa');
            $listcoa = $this->easyway_model->getCoa_for_update($no_account, $id);
            if(count($listcoa) > 0){
                $update_coa = $this->easyway_model->updateCoa($id_coa);
                if($update_coa){
                    $this->session->set_flashdata('result_update', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Data Chart of Account Berhasil diupdate
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                    redirect('coa/'.$id);
                }
            }else{
                $savecoa = $this->easyway_model->insertCoa($id);
                if($savecoa){
                    $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Data Chart of Account Berhasil ditambahkan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                    redirect('coa/'.$id);
                }       
            }
        }elseif(isset($_POST["update_perusahaan"])){
            $update_perusahaan = $this->easyway_model->update_perusahaan($id);
            if($update_perusahaan){
                $this->session->set_flashdata('update_perusahaan', '1');
                redirect('coa/'.$id);
            }
        }
        $id_perusahaan = $this->uri->segment('2');
        $data['detail_pt'] = $this->easyway_model->get_namapt($id_perusahaan);
        $data["listperusahaan"] = $this->easyway_model->edit_perusahaan($id);
        $data['tanggal_awal'] = $this->easyway_model->getPeriode_forCoa($id);
        $data['listcoa'] = $this->easyway_model->getCoa($id);
        $this->load->view('perusahaan_coa', $data);
    }
    public function drop_table_new(){
        $this->load->view('add_coa');
    }
    public function drop_table($id){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $data['query'] = $this->easyway_model->get_table($id);
        $this->load->view('drop_table', $data);
    }

    public function periode_history($id){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $get_idp= $this->easyway_model->get_idp($id);
        $id_perusahaan = $get_idp->id_perusahaan;
        $tanggal_awal = $get_idp->tanggal_awal;
        $data['query1'] = $this->easyway_model->get_periode_history($id_perusahaan, $tanggal_awal, $id);
        // $data['query2'] = $this->easyway_model->get_periode_history_middle($id_perusahaan, $tanggal_awal, $id);
        $this->load->view('get_periode_history', $data);
    }

    // public function coba_hapus(){
    //     $id_perusahaan = $this->input->post('id_perusahaan');
    //     $id_coa = $this->input->post('id_coa');
    //     echo $id_coa;
    //     $hapus_coa = $this->easyway_model->hapusCoa($id_coa);
    //             redirect('coahhhh/'.$id_perusahaan);
    // }
    public function journal($id){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $id_perusahaan = $this->uri->segment('2');
        $data['tanggal_awal'] = $this->easyway_model->tanggal_awal($id_perusahaan);

        if(isset($_POST['tambah_journal'])){
            $this->session->set_flashdata('result_date',$this->input->post('tgl_transaksi'));
            $post = $this->input->post();
            $result = array();
            $total_post = count($post['id_coa']);
            $id_inputan_v =  $this->easyway_model->journal_all();
            $a = $id_inputan_v->id_inputan; //mengambil nilai kolom id inputan
            $id_inputan = ($a + 1);
            
            foreach($post['id_coa'] AS $key => $val1){ //$val =  offset nilainya bisa berapa saja
            $debit = $this->input->post('debit[]');
            if(preg_match("/^[0-9,]+$/", $debit[$key])) 
                { $debit = str_replace(',', '', $debit); }
            $kredit = $this->input->post('kredit[]');
            if(preg_match("/^[0-9,]+$/", $kredit[$key])) 
                { $kredit = str_replace(',', '', $kredit); }

                $result[] = array(
                "id_coa" => $post['id_coa'][$key],
                "deskripsi_jurnal" => $post['deskripsi'][$key],
                "debit" => $debit[$key],
                "kredit" => $kredit[$key],
                "job" => $post['job'][$key],
                "tanggal_transaksi" => $this->input->post('tgl_transaksi'),
                "refrensi" => $this->input->post('reference'),
                "id_perusahaan" => $this->uri->segment('2'),
                "id_inputan" => $id_inputan,
                "username" => $this->session->userdata('login')
                );
            }
            // die(var_dump($result));
            $data['result'] = $result;

            if(array_sum($debit) == array_sum($kredit)){
            $insert_journal = $this->easyway_model->post_add($result);
            if($insert_journal){
                $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Data Transaksi Berhasil dimasukan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                redirect('journal/'.$this->uri->segment('2'));
            }else{
                echo "error";
            }
            }else{
                $this->session->set_flashdata('result_tidak_sama', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-warning">Warning</span> Jumlah debit dan kredit tidak sama. Silakan periksa kembali !!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    </div>
                    ');    
            }
            }

        $data['listcoa'] = $this->easyway_model->getCoa($id);
        $id_perusahaan = $this->uri->segment('2');
        $data['detail_pt'] = $this->easyway_model->get_namapt($id_perusahaan);
        $this->load->view('perusahaan_journal', $data);
    }

    public function all_financial_statements(){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $uri = $this->uri->segment('2');
        $id_perusahaan = $this->uri->segment('2');
        $data['detail_pt'] = $this->easyway_model->get_namapt($id_perusahaan);
        $data["detail"] = $this->easyway_model->get_periode($uri);
        if(isset($_POST['range_periode'])){
            $periode1_v = $this->input->post('periode1');
            $periode2_v = $this->input->post('periode2');
            $periode1 =date('Y-m-d',strtotime($periode1_v));
            $periode2 =date('Y-m-d',strtotime($periode2_v));
            if($periode1 > $periode2){ ?>
                <script>
                alert("Mohon Isikan Periode secara Benar");
                window.location.href = "";
                </script>
            <?php  }
            $data["detail_pt"] = $this->easyway_model->get_namapt($id_perusahaan);
            $data["query1"] = $this->easyway_model->get_finance_debitkredit($periode1, $periode2, $uri);
            $data["query2"] = $this->easyway_model->get_finance_coa($uri);
            $data["total_debit_kredit"] = $this->easyway_model->total_debit_kredit($periode1, $periode2, $uri);
            $data["total_balance"] = $this->easyway_model->total_balance($uri);
            // $data["query2"] = $this->easyway_model->get_finance_balance($uri);
            // $data["query3"] = $this->easyway_model->get_finance_lastmonth($uri, $periode1, $periode2); //untuk beginning balance dari bulan februari(hasil akhir bulan januari)
            // die(var_dump($data['query3']));
        }
        if(!empty($_POST)){
        $this->load->view('all_financial_statements', $data, $periode1, $periode2);
        }else{
            $this->load->view('all_financial_statements', $data);
        }
    }
    public function detail_financial_statements(){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $id_perusahaan = $this->uri->segment('2');
        $id_coa = $this->uri->segment('3');
        $periode1 = $this->uri->segment('4');
        $periode2 = $this->uri->segment('5');
        $data["detail"] = $this->easyway_model->get_detail_financial($id_perusahaan, $id_coa, $periode1, $periode2);
        $data["detail_pt"] = $this->easyway_model->get_namapt($id_perusahaan);
        $data["beginning_balance"] = $this->easyway_model->get_beginning_balance($id_perusahaan, $id_coa);
        $data["tgl_awal"] = $this->easyway_model->get_tgl_awal($id_perusahaan);
        $tanggal_awal = $data['tgl_awal']->row()->tanggal_awal;
        $data["total_beginning"] = $this->easyway_model->total_beginning($id_perusahaan, $id_coa, $periode1, $tanggal_awal);
        $data['nama_coa'] = $this->easyway_model->get_nama_coa($id_perusahaan, $id_coa);
        $this->load->view('detail_financial_statements', $data);
    }
  
    public function month_journal(){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $uri= $this->uri->segment('2');
        $data["detail"] = $this->easyway_model->get_periode($uri);
        $id_perusahaan = $this->uri->segment('2');
        $getdata = $this->easyway_model->get_periode_tglawal($uri);
        $blnthn = $getdata->tanggal_awal;
        $bln = substr($blnthn, 5, 2);
        $thn = substr($blnthn, 0, 4);
        
        $data["detail_pt"] = $this->easyway_model->get_namapt($id_perusahaan);
        $data["detail2"] = $this->easyway_model->get_journal($uri, $bln, $thn);

     
        if(isset($_POST['cari_month_journal'])){
            $periode = $this->input->post('periode');
            $no_periode = substr($periode, 0, 2);
            $bln = substr($periode, 2, 2);
            $thn = substr($periode, 5, 4);
            $data['query'] = $this->easyway_model->getJournalnew($bln, $thn, $uri);
        }
        $this->load->view('month_journal', $data);
        }

        public function journal_detail($id_perusahaan, $id_inputan){
            $data['listcoa'] = $this->easyway_model->getCoa($id_perusahaan);
            $data['listjurnal'] = $this->easyway_model->journal_detail($id_perusahaan, $id_inputan);
            // die(var_dump($data['listjurnal']->result_array()));
            $data['detail_pt'] = $this->easyway_model->get_namapt($id_perusahaan);
            // die(var_dump($data['listjurnal']->result()));
            if(isset($_POST['update_id_inputan'])){
                $post = $this->input->post();
                $result = array();
                $total_post = count($post['id_coa']);
                $id_inputan = $this->uri->segment('3');
                $id_perusahaan = $this->uri->segment('2');
                 
                 foreach($post['id_coa'] AS $key => $val1){ //$val =  offset nilainya bisa berapa saja
                        $debit = $this->input->post('debit[]');
                        if(preg_match("/^[0-9,]+$/", $debit[$key])) 
                            { $debit = str_replace(',', '', $debit); }
                        $kredit = $this->input->post('kredit[]');
                        if(preg_match("/^[0-9,]+$/", $kredit[$key])) 
                            { $kredit = str_replace(',', '', $kredit); }
                            $result[] = array(
                            "id_coa" => $post['id_coa'][$key],
                            "deskripsi_jurnal" => $post['deskripsi'][$key],
                            "debit" => $debit[$key],
                            "kredit" => $kredit[$key],
                            "job" => $post['job'][$key],
                            "tanggal_transaksi" => $this->input->post('tgl_transaksi'),
                            "refrensi" => $this->input->post('reference'),
                            "id_perusahaan" => $this->uri->segment('2'),
                            "id_inputan" => $id_inputan,
                            "username" => $this->session->userdata('login')
                            );
                        }
                    if(array_sum($debit) == array_sum($kredit)){       
                     $delete = $this->easyway_model->query_delete($id_inputan, $id_perusahaan);
                            $insert_journal = $this->easyway_model->post_add($result);
                        
                             if($insert_journal){
                                 $this->session->set_flashdata('result_update_journal', 
                                     '
                                     <div class="col-sm-12">
                                     <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                         <span class="badge badge-pill badge-success">Success</span> Data Transaksi Berhasil diperbarui
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">×</span>
                                         </button>
                                     </div>
                                     </div>
                                     ');
                            redirect('journal_detail/'.$this->uri->segment('2')."/".$this->uri->segment('3'));
                             }else{
                                 echo "error";
                            }
                    }else{
                                $this->session->set_flashdata('result_tidak_sama', 
                                '
                                     <div class="col-sm-12">
                                     <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                         <span class="badge badge-pill badge-warning">Warning</span> Jumlah debit dan kredit tidak sama. Silahkan periksa kembali !!!
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">×</span>
                                         </button>
                                     </div>
                                     </div>
                                ');
                            }
            }elseif(isset($_POST['delete_id_inputan'])){
                $id_inputan = $this->uri->segment('3');
                $id_perusahaan = $this->uri->segment('2');
                $delete = $this->easyway_model->query_delete($id_inputan, $id_perusahaan);
                    $this->session->set_flashdata('result_delete_journal', 
                                '
                                 <div class="col-sm-12">
                                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                     <span class="badge badge-pill badge-success">Success</span> Data Transaksi Berhasil Dihapus
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">×</span>
                                     </button>
                                     </div>
                                 </div>
                                     ');
                redirect('journal/'.$this->uri->segment('2'));
                
            }
            $this->load->view('journal_detail', $data);
        }

    public function beginning_balance($id_perusahaan){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        if(isset($_POST['save_balance'])){  
            $periode = $this->input->post('periode_balance')[1];
            $get_beginning = $this->easyway_model->get_beginning($id_perusahaan);
            if(!empty($get_beginning)){  //jika data sudah ada di database maka update, else insert (berdasarkan perusahaan)
                if(!empty($_POST['balance'])) {
                  $update_coa = $this->easyway_model->post_balance_update($periode);
                    redirect('beginning_balance/'.$id_perusahaan);
                  
            }                
        }else{  //insert jika belum ada
                if(!empty($_POST['balance'])) {
                    $post = $this->input->post();
                    $result = array();
                    $total_post = count($post['id_coa']);   
                        foreach($post['balance'] AS $key => $val1){ //$val =  offset nilainya bisa berapa saja
                        $result[] = array(
                        "balance" => $post['balance'][$key],
                        // "periode_balance" => $post['periode_balance'][$key],
                        "id_perusahaan" => $this->uri->segment('2'),
                        "id_coa" => $post['id_coa'][$key]
                        );
                    }
                    $insert_journal = $this->easyway_model->post_balance($result);
                    if($insert_journal){
                    $this->session->set_flashdata('result_insert', 
                    '
                    <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> Saldo Awal Berhasil ditambahkan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    </div>
                    ');
                    
                    redirect('beginning_balance/'.$id_perusahaan);

                    }

            }else{
                echo "data insert kosong";
            }
        }
    
    }
        $data['detail'] = $this->easyway_model->getTanggalawal($id_perusahaan);
        $data['detail2'] = $this->easyway_model->getBalance($id_perusahaan);
        $this->load->view('beginning_balance', $data);
    }

    public function balance_beginning($id_perusahaan){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        if(isset($_POST['save_balance'])){  
            $periode = $this->input->post('periode_balance')[1];
            $get_beginning = $this->easyway_model->get_beginning($id_perusahaan, $periode);
            if(!empty($get_beginning)){  //jika data sudah ada di database maka update, else insert (berdasarkan perusahaan)
                if(!empty($_POST['balance'])) {
                  $update_coa = $this->easyway_model->post_balance_update($periode);
            }                
        }else{  //insert jika belum ada
                if(!empty($_POST['balance'])) {
                    $post = $this->input->post();
                    $result = array();
                    $total_post = count($post['id_coa']);   
                        foreach($post['balance'] AS $key => $val1){ //$val =  offset nilainya bisa berapa saja
                        $result[] = array(
                        "balance" => $post['balance'][$key],
                        "periode_balance" => $post['periode_balance'][$key],
                        "id_perusahaan" => $this->uri->segment('2'),
                        "id_coa" => $post['id_coa'][$key]
                        );
                    }
                    $insert_journal = $this->easyway_model->post_balance($result);
                    if($insert_journal){
                    redirect('beginning_balance/'.$id_perusahaan);
                    }

            }else{
                echo "data insert kosong";
            }
        }
    
    }
        $data['detail'] = $this->easyway_model->getTanggalawal($id_perusahaan);
        $data['detail2'] = $this->easyway_model->getBalance($id_perusahaan);
        $this->load->view('balance_beginning', $data);
    }

    public function laba_rugi($id_perusahaan){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $uri = $id_perusahaan;
        $data["detail"] = $this->easyway_model->get_periode($uri);
        if(isset($_POST['range_periode'])){
            $periode1_v = $this->input->post('periode1');
            $periode2_v = $this->input->post('periode2');
            $periode1 =date('Y-m-d',strtotime($periode1_v));
            $periode2 =date('Y-m-d',strtotime($periode2_v));
            if($periode1 > $periode2){ ?>
                <script>
                alert("Mohon Isikan Periode secara Benar");
                window.location.href = "";
                </script>
            <?php  }
        
        $data['query_income'] = $this->easyway_model->income($id_perusahaan);
        $data['total_income'] = $this->easyway_model->total_income($id_perusahaan, $periode1, $periode2);
        $data['balance_income'] = $this->easyway_model->balance_income($id_perusahaan);

        $data['query_cost'] = $this->easyway_model->cost($id_perusahaan);
        $data['total_cost'] = $this->easyway_model->total_cost($id_perusahaan, $periode1, $periode2);
        $data['balance_cost'] = $this->easyway_model->balance_cost($id_perusahaan);

        $data['query_expenses'] = $this->easyway_model->expenses($id_perusahaan);
        $data['total_expenses'] = $this->easyway_model->total_expenses($id_perusahaan, $periode1, $periode2);
        $data['balance_expenses'] = $this->easyway_model->balance_expenses($id_perusahaan);
        }
        $this->load->view('laba_rugi', $data);
    }

    public function neraca($id_perusahaan){
        if($this->session->userdata('level') != 'pengguna'){
            redirect('login');  
        }

        $uri = $id_perusahaan;
        $data["detail"] = $this->easyway_model->get_periode($uri);
        if(isset($_POST['range_periode'])){
        $periode1_v = $this->input->post('periode1');
        $periode2_v = $this->input->post('periode2');
        $periode1 =date('Y-m-d',strtotime($periode1_v));
        $periode2 =date('Y-m-d',strtotime($periode2_v));
        if($periode1 > $periode2){ ?>
            <script>
            alert("Mohon Isikan Periode secara Benar");
            window.location.href = "";
            </script>
            <?php  }
            $data["tgl_awal"] = $this->easyway_model->get_tgl_awal($id_perusahaan);
            $tanggal_awal = $data['tgl_awal']->row()->tanggal_awal;
            $data["total_beginning_ca"] = $this->easyway_model->total_beginning_ca($id_perusahaan, $periode1, $tanggal_awal);
            $data["total_beginning_p"] = $this->easyway_model->total_beginning_p($id_perusahaan, $periode1, $tanggal_awal);
            $data["total_beginning_o"] = $this->easyway_model->total_beginning_o($id_perusahaan, $periode1, $tanggal_awal);

            $data["total_beginning_li"] = $this->easyway_model->total_beginning_li($id_perusahaan, $periode1, $tanggal_awal);
            $data["total_beginning_lt"] = $this->easyway_model->total_beginning_lt($id_perusahaan, $periode1, $tanggal_awal);
            $data["total_beginning_capital"] = $this->easyway_model->total_beginning_capital($id_perusahaan, $periode1, $tanggal_awal);


            // aktiva
            $data['query_ca'] = $this->easyway_model->current_assets($id_perusahaan);
            $data['total_ca'] = $this->easyway_model->total_ca($id_perusahaan, $periode1, $periode2);
            $data['balance_ca'] = $this->easyway_model->balance_ca($id_perusahaan);

            $data['query_p'] = $this->easyway_model->property($id_perusahaan);
            $data['total_p'] = $this->easyway_model->total_property($id_perusahaan, $periode1, $periode2);
            $data['balance_p'] = $this->easyway_model->balance_property($id_perusahaan);

            $data['query_o'] = $this->easyway_model->other($id_perusahaan);
            $data['total_o'] = $this->easyway_model->total_other($id_perusahaan, $periode1, $periode2);
            $data['balance_o'] = $this->easyway_model->balance_other($id_perusahaan);

            //pasiva
            $data['query_li'] = $this->easyway_model->liabilities($id_perusahaan);
            $data['total_li'] = $this->easyway_model->total_liabilities($id_perusahaan, $periode1, $periode2);
            $data['balance_li'] = $this->easyway_model->balance_liabilities($id_perusahaan);            

            $data['query_lt'] = $this->easyway_model->longterm($id_perusahaan);
            $data['total_lt'] = $this->easyway_model->total_longterm($id_perusahaan, $periode1, $periode2);
            $data['balance_lt'] = $this->easyway_model->balance_longterm($id_perusahaan);

            $data['query_capital'] = $this->easyway_model->capital($id_perusahaan);
            $data['total_capital'] = $this->easyway_model->total_capital($id_perusahaan, $periode1, $periode2);
            $data['balance_capital'] = $this->easyway_model->balance_capital($id_perusahaan);            
        
            //net income
            $data['total_income'] = $this->easyway_model->total_income_neraca($id_perusahaan, $periode1, $periode2);
            $data['balance_income'] = $this->easyway_model->balance_income($id_perusahaan);

            $data['total_cost'] = $this->easyway_model->total_cost_neraca($id_perusahaan, $periode1, $periode2);
            $data['balance_cost'] = $this->easyway_model->balance_cost($id_perusahaan);

            $data['total_expenses'] = $this->easyway_model->total_expenses_neraca($id_perusahaan, $periode1, $periode2);
            $data['balance_expenses'] = $this->easyway_model->balance_expenses($id_perusahaan);
            }
        $this->load->view('neraca', $data);
    }

     public function logout()
    {
            $this->session->sess_destroy();
            redirect('login');
    }


}



