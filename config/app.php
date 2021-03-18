<?php
include_once 'database.php';

// $settings = $mysqli->query('select * from settings')->fetch_assoc();
//
// if(count($settings)){
//   $app_name = $settings['app_name'];
//   $admin_email = $settings['admin_email'];
// }else {
//   $app_name = 'Service app';
//   $admin_email = 'abudr@a.com';
// }

$config = [
  'app_name' => 'quiz',
  'admin_email' => 'dsf@saf.sd',
  'lang' => 'en',
  'dir' => 'ltr',
  'app_url' => 'http://localhost/php/',
  'upload_dir' => 'uploads/',
  'admin_assets' => 'http://localhost/php/admin/template/assets/'
];
?>
