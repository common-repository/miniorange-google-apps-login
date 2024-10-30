<?php
$page_list     = admin_url() . 'edit.php?post_type=page';

/*
 * If the current plugin loaded is oauth load oauth landing page or SAML Landing page.
 * */
if ( strcasecmp( get_mo_gsuite_option( 'mo_gsuite_select_saml_oauth' ), 'true' ) == 0 ) {
	include MOV_GSUITE_DIR . 'controllers'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-configuration.php';
} else {
	include MOV_GSUITE_DIR . 'controllers'.DIRECTORY_SEPARATOR.'saml'.DIRECTORY_SEPARATOR.'saml-idp-setup.php';
}
