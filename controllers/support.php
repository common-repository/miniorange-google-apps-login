<?php

$current_user = wp_get_current_user();
$email        = get_mo_gsuite_option( "mo_gsuite_customer_validation_admin_email" );
$phone        = get_mo_gsuite_option( "mo_wpns_admin_phone" );

include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'support.php';