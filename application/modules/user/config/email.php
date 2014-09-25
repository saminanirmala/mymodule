<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
| http://ellislab.com/codeigniter/user-guide/libraries/email.html
|
*/
$config['protocol']='smtp';

$config['smtp_host']='smtp.mandrillapp.com'; //(SMTP server)

$config['smtp_port']='587'; //(SMTP port)

$config['smtp_timeout']='30';

$config['smtp_user']='sumanr@ekbana.com'; //(user@gmail.com)

$config['smtp_pass']='k2Dgsq1ARER6W7olPHslGQ'; // (gmail password)


$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";


/* End of file email.php */
/* Location: ./application/config/email.php */  