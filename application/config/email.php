<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
// $config['smtp_host'] = 'mail.smtp2go.com';
// $config['smtp_port'] = '2525'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
// $config['smtp_crypto'] = 'tls';
// $config['smtp_user'] = 'dejo@dejo.com';
// $config['smtp_pass'] = 'kosonginaja145';

$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'hrd@pincgroup.id'; // Email gmail
$config['smtp_pass' ]  = 'HRHokiAmin8;';  // Password gmail
// $config['smtp_crypto'] = 'tls';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['crlf']    = "\r\n";
$config['newline'] = "\r\n";
$config['validation'] = TRUE;

?>
