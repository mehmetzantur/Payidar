<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['Anasayfa'] = "Home";

$route['Panel'] = "Panel/Home";

$route['Urun/(:any)/(:num)'] = "Product/GetProduct";
$route['Urunler/(:any)/(:num)'] = "Product/GetProductsForCategory";

$route['Urunler/SuperFirsatlar'] = "Product/AllDiscounts";
$route['Urunler/EnYeniler'] = "Product/AllTheNewests";
$route['Urunler/CokSatanlar'] = "Product/AllBestsellers";

$route['Marka/(:any)/(:num)'] = "Product/GetProductsForBrand";
$route['Ara'] = "Product/GetSearchedProducts";
$route['Iletisim'] = "Contact";
$route['Sayfa/(:any)/(:num)'] = "Page/GetPageDetail";

$route['Profil/Mesajlarim'] = "Profile/Messages";
$route['Profil/Mesaj/(:num)'] = "Profile/GetUserMessage";
$route['Profil/YeniMesaj'] = "Profile/GetSendMessage";
$route['Profil'] = "Profile";
$route['Profil/Guncelle'] = "Profile/UpdateProfile";
$route['Siparislerim'] = "Order";
$route['Cikis'] = "Home/Logout";

$route['Mesajlarim'] = "Issue";
$route['YeniSoru'] = "Issue/NewQuestion";
$route['Soru/(:any)/(:num)'] = "Issue/GetReply";

$route['Siparis/Iptal/(:num)'] = "Order/CancelOrder";

/* End of file routes.php */
/* Location: ./application/config/routes.php */

