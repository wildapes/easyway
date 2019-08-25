<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
// $route['company'] = 'home/perusahaan';

$route['login'] = 'home/login';
$route['halaman_admin'] = 'home/halaman_admin';
$route['hapus_pengguna/(:any)'] = 'home/hapus_pengguna/$1';
$route['hapus_perusahaan/(:any)'] = 'home/hapus_perusahaan/$1';
$route['hapus_pengelolaan/(:any)'] = 'home/hapus_pengelolaan/$1';
$route['daftar_pengguna'] = 'home/daftar_pengguna';
$route['list'] = 'home/halaman_utama_list';
$route['edit_perusahaan'] = 'home/edit_perusahaan';
$route['import_coa/(:any)'] = 'home/import_coa/$1';
$route['import_coa/get_coa_import/(:any)/(:any)'] = 'home/get_coa/$1/$2';

$route['coa/(:any)'] = 'home/coa/$1';
$route['coa/drop_table/(:any)'] = 'home/drop_table/$1';
$route['coa/periode_history/(:any)'] = 'home/periode_history/$1';
$route['beginning_balance/(:any)'] = 'home/beginning_balance/$1';
$route['balance_beginning/(:any)'] = 'home/balance_beginning/$1';

$route['journal/(:any)'] = 'home/journal/$1';
$route['journal/showDeskripsi/(:any)'] = 'home/showDeskripsi/$1'; //ngebug
$route['all_financial_statements_detail'] = 'home/financial_statements_detail';
$route['coba_hapus'] = "home/coba_hapus/";
$route['coa/drop_table_new/(:any)'] = "home/drop_table_new";
// $route['journal_detail/(:any)'] = 'home/journal_detail/$1';
$route['journal_detail/(:any)/(:any)'] = 'home/journal_detail/$1/$2';

$route['financial/(:any)'] = 'home/all_financial_statements/$1';
$route['detail/(:any)/(:any)/(:any)/(:any)'] = 'home/detail_financial_statements/$1/$2/$3/$4';
$route['test'] = 'home/new_perusahaan';
$route['test/get_coa/(:any)'] = 'home/get_coa/$1';
$route['month_journal/(:any)'] = 'home/month_journal/$1';
$route['month_journal/get_journal/(:any)'] = 'home/get_month_journal/$1';
// $route['list'] = 'home/list_month_journal';

$route['login'] = 'home/login';
$route['registrasi'] = 'home/registrasi';
$route['logout'] = 'home/logout';
$route['edit_data'] = 'home/edit_data';
$route['search'] = 'home/search_keyword';
$route['jurnal/(:any)'] = 'home/info_lengkap/$1';

$route['laba_rugi/(:any)'] = 'home/laba_rugi/$1';
// $route['laba_rugi/chart/(:any)'] = 'home/laba_rugi_chart/$1';

$route['neraca/(:any)'] = 'home/neraca/$1';

$route['pengelolaan'] = 'home/pengelolaan_perusahaan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
