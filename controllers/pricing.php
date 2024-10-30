<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 19-02-2018
 * Time: 11:51
 */

$plugin_active= strcasecmp( get_mo_gsuite_option( 'mo_gsuite_select_saml_oauth' ), 'true')==0?TRUE:FALSE;

if($plugin_active){
	include MOV_GSUITE_DIR.'controllers'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-pricing.php';
}
else{
	include MOV_GSUITE_DIR.'controllers'.DIRECTORY_SEPARATOR.'saml'.DIRECTORY_SEPARATOR.'saml-pricing.php';
}