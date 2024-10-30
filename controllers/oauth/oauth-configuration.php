<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 12-02-2018
 * Time: 10:42
 */
/*This function will render the page whichever needed. */
include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'instructions'.DIRECTORY_SEPARATOR.'class-mo-oauth-instruction-html.php';
/*check if you have already configured apps*/
if (  !Mo_GSuite_Utility::isBlank(get_mo_gsuite_option( 'mo_oauth_apps_list_test' )) && sizeof( get_mo_gsuite_option( 'mo_oauth_apps_list_test' ) ) > 0 ) {
	/*check if the action is set to be edit. Accordingly render the page.*/
	if ( !isset($_REQUEST['action']) ){
		include MOV_GSUITE_DIR . 'controllers'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-configured-applist.php';
	} else if ( strcasecmp( sanitize_text_field($_REQUEST['action']), 'edit' ) == 0){
		include MOV_GSUITE_DIR . 'controllers'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-configuration-update-app.php';
		$_REQUEST['action'] = '';
	}
} else {
	/*If no app is configured load the landing page.*/
	include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-configuration.php';
}

