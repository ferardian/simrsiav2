<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
// $route['dashboard'] = 'dashboard';
// $route['home'] = 'controller_welcome';

/// View Page

// $route['informasi/jadwal-dokter']		= 'controller_welcome/dokter';
// $route['informasi/tenaga-medis']		= 'controller_welcome/tenagamedis';
// $route['informasi/(:any)']				= 'controller_welcome/halaman/$1';
//
// $route['galeri']						= 'controller_welcome/galeri';
// $route['kontak']						= 'controller_welcome/kontak';
// $route['karir']							= 'controller_welcome/karir';
// //$route['pages/berita']					= 'controller_welcome/all_artikel';
// //$route['pages/kesehatan']				= 'controller_welcome/all_artikel';
// //$route['pages/kegiatan']				= 'controller_welcome/all_artikel';
// $route['fasilitas/(:any)']				= 'controller_welcome/all_pelayanan/$1';
// $route['fasilitas/(:any)/(:any)']		= 'controller_welcome/pelayanan/$1/$1';
// $route['pmkp']							= 'controller_welcome/pmkp';
//
// $route['profil/(:any)']					= 'controller_welcome/halaman/$1';
// $route['jadwal-dokter/(:any)']			= 'controller_welcome/jadwaldokter/$1';
//
// $route['artikel/(:any)']				= 'controller_welcome/all_artikel/$1';
// $route['artikel/(:any)/(:any)']			= 'controller_welcome/artikel/$1/$1';
// //$route['artikel/kesehatan/(:any)']		= 'controller_welcome/artikel/$1';
//
//
//
// // //Route artikel
// $route['artikel']						= 'admin/artikel_admin/index';
// $route['artikeladd']					= 'admin/artikel_admin/artikeladd';
// $route['artikelsave']					= 'admin/artikel_admin/artikelsave';
// $route['artikeledit/(:any)']			= 'admin/artikel_admin/artikeledit/$1';
// $route['artikeldel/(:any)']				= 'admin/artikel_admin/artikeldelete/$1';
//
//
// //Route spesialis
// $route['spesialis'] 					= 'admin/dokter_admin/spesialis';
// $route['spesialisadd'] 					= 'admin/dokter_admin/spesialisadd';
// $route['spesialissave'] 				= 'admin/dokter_admin/spesialissave';
// $route['spesialisedit/(:any)'] 			= 'admin/dokter_admin/spesialisedit/$1';
// $route['spesialisdel/(:any)'] 			= 'admin/dokter_admin/spesialisdel/$1';
//
// //Route Dokter
// $route['dokter']						= 'admin/dokter_admin/dokter';
// $route['dokteradd']						= 'admin/dokter_admin/dokteradd';
// $route['doktersave']					= 'admin/dokter_admin/doktersave';
// $route['dokteredit/(:any)']				= 'admin/dokter_admin/dokteredit/$1';
// $route['dokterdel/(:any)']				= 'admin/dokter_admin/dokterdel/$1';
//
// //Route Jadwal Klinik
// $route['jadwal']						= 'admin/dokter_admin/jadwal_klinik';
// $route['jadwaladd']						= 'admin/dokter_admin/jadwal_klinik_add';
// $route['jadwalsave']					= 'admin/dokter_admin/jadwal_klinik_save';
// $route['jadwaledit/(:any)']				= 'admin/dokter_admin/jadwal_klinik_edit/$1';
// $route['jadwaldel/(:any)']				= 'admin/dokter_admin/jadwal_klinik_del/$1';
//
//
// //Route Menu
// $route['menu']							= 'admin/menu_admin/index';
// $route['menuadd']						= 'admin/menu_admin/menuadd';
// $route['menusave']						= 'admin/menu_admin/menusave';
// $route['menuedit/(:any)']				= 'admin/menu_admin/menuedit/$1';
// $route['menudel/(:any)']				= 'admin/menu_admin/menudel/$1';
//
//
// //Route Halaman
// $route['page']							= 'admin/halaman_admin/index';
// $route['pageadd']						= 'admin/halaman_admin/halamanadd';
// $route['pagesave']						= 'admin/halaman_admin/halamansave';
// $route['pageedit/(:any)']				= 'admin/halaman_admin/halamanedit/$1';
// $route['pagedel/(:any)']				= 'admin/halaman_admin/halamandel/$1';
//
// //Route Slider
// $route['slider']						= 'admin/slider_admin/index';
// $route['slideradd']						= 'admin/slider_admin/slideradd';
// $route['slidersave']					= 'admin/slider_admin/slidersave';
// $route['slideredit/(:any)']				= 'admin/slider_admin/slideredit/$1';
// $route['sliderdel/(:any)']				= 'admin/slider_admin/sliderdel/$1';
//
// $route['slider2']						= 'admin/slider_admin/slider2';
// $route['slider2_add']					= 'admin/slider_admin/slider2add';
// $route['slider2_save']					= 'admin/slider_admin/slider2save';
// $route['slider2_edit/(:any)']			= 'admin/slider_admin/slider2edit/$1';
// $route['slider2_del/(:any)']			= 'admin/slider_admin/slider2del/$1';
//
// //Route Pelayanan
// $route['pelayanan']						= 'admin/pelayanan_admin/index';
// $route['pelayananadd']					= 'admin/pelayanan_admin/pelayananadd';
// $route['pelayanansave']					= 'admin/pelayanan_admin/pelayanansave';
// $route['pelayananedit/(:any)']			= 'admin/pelayanan_admin/pelayananedit/$1';
// $route['pelayanandel/(:any)']			= 'admin/pelayanan_admin/pelayanandel/$1';
//
// //PMKP
// $route['data_pmkp']							= 'admin/pmkp_admin';
// $route['pmkpadd']						= 'admin/pmkp_admin/pmkpadd';
// $route['pmkpsave']						= 'admin/pmkp_admin/pmkpsave';
// $route['pmkpedit/(:any)']				= 'admin/pmkp_admin/pmkpedit/$1';
// $route['pmkpdel/(:any)']				= 'admin/pmkp_admin/pmkpdel/$1';
//
// $route['master']						= 'admin/pmkp_admin/master_pmkp';
// $route['masteradd']						= 'admin/pmkp_admin/masteradd';
// $route['mastersave']					= 'admin/pmkp_admin/mastersave';
// $route['masteredit/(:any)']				= 'admin/pmkp_admin/masteredit/$1';
// $route['masterdel/(:any)']				= 'admin/pmkp_admin/masterdel/$1';
//
// $route['data_indikator']						= 'admin/pmkp_admin/inmut_utama';
// $route['data_indikatoradd']						= 'admin/pmkp_admin/inmutadd';
// $route['data_indikatorsave']					= 'admin/pmkp_admin/inmutsave';
// $route['data_indikatoredit/(:any)']				= 'admin/pmkp_admin/inmutedit/$1';
// $route['data_indikatordel/(:any)']				= 'admin/pmkp_admin/inmutdel/$1';
//
//
// ////Album & Galery
// $route['album']						= 'admin/album_admin';
// $route['albumadd']					= 'admin/album_admin/albumadd';
// $route['albumsave']					= 'admin/album_admin/albumsave';
// $route['albumedit/(:any)']			= 'admin/album_admin/albumedit/$1';
// $route['albumdel/(:any)']			= 'admin/album_admin/albumdel/$1';
//
// $route['gallery']					= 'admin/album_admin/galeri';
// $route['galleryadd']				= 'admin/album_admin/galeriadd';
// $route['gallerysave']				= 'admin/album_admin/galerisave';
// $route['galleryedit/(:any)']		= 'admin/album_admin/galeriedit/$1';
// $route['gallerydel/(:any)']			= 'admin/album_admin/galeridel/$1';
//
//
// ////Contact
// $route['contact']						= 'admin/contact_admin';
// $route['contactadd']					= 'admin/contact_admin/contactadd';
// $route['contactsave']					= 'admin/contact_admin/contactsave';
// $route['contactedit/(:any)']			= 'admin/contact_admin/contactedit/$1';
// $route['contactdel/(:any)']				= 'admin/contact_admin/contactdel/$1';


//$route['sitemap\.xml'] = 'sitemap';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
