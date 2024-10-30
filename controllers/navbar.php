<?php

$registered  = Mo_GSuite_Utility::micr();

$plugin_active= strcasecmp( get_mo_gsuite_option( 'mo_gsuite_select_saml_oauth' ), 'true')==0?TRUE:FALSE;
$profile_url = add_query_arg( array( 'page' => 'galoginaccount' ), $_SERVER['REQUEST_URI'] );
$help_url      = $plugin_active?"https://faq.miniorange.com/kb/oauth-openid-connect/":"https://faq.miniorange.com/kb/saml-single-sign-on/";
$license_url   = add_query_arg( array( 'page' => 'gsuitepricing' ), $_SERVER['REQUEST_URI'] );

//This variable will update the toggle box values.
$toggleSwitchValue = strcasecmp( get_mo_gsuite_option( "mo_gsuite_select_saml_oauth" ), 'true' ) == 0 ? "checked" : "";


if ($plugin_active) {
	$oauth_configuration = add_query_arg( array( 'page' => 'configuration_oauth' ), '' );

	$oauth_customization = add_query_arg( array( 'page' => 'customization_oauth' ), '' );
	$oauth_signinsetting = add_query_arg( array( 'page' => 'signinsettings_oauth' ), '' );
	$oauth_mapping       = add_query_arg( array( 'page' => 'mapping_oauth' ), '' );
	$oauth_report        = add_query_arg( array( 'page' => 'report_oauth' ), '' );
	$oauth_license       = add_query_arg( array( 'page' => 'license_oauth' ), '' );
	$oauth_addons     	 = add_query_arg( array( 'page' => 'addons_oauth' ), '' );
	$active_tab          = strcasecmp(sanitize_text_field($_GET['page']),'mogalsettings')==0?'configuration_oauth':sanitize_text_field($_GET['page']);

	include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'navbar_oauth.php';

} else {
	$saml_sp_config            = add_query_arg( array( 'page' => 'service_provider_saml' ), $_SERVER['REQUEST_URI'] );
	$saml_idp_setup            = add_query_arg( array( 'page' => 'identity_provider_saml' ), $_SERVER['REQUEST_URI'] );
	$saml_sign_in_setting      = add_query_arg( array( 'page' => 'sign_in_setting_saml' ), $_SERVER['REQUEST_URI'] );
	$saml_mapping              = add_query_arg( array( 'page' => 'mapping_saml' ), $_SERVER['REQUEST_URI'] );
	$saml_addons      		   = add_query_arg( array( 'page' => 'addons_saml' ), $_SERVER['REQUEST_URI'] );
	$saml_import_export_config = add_query_arg( array( 'page' => 'saml_import_export_config' ), $_SERVER['REQUEST_URI'] );

	$saml_proxy = add_query_arg( array( 'page' => 'proxy_setup' ), $_SERVER['REQUEST_URI'] );

	$active_tab          = strcasecmp(sanitize_text_field($_GET['page']),'mogalsettings')==0?'identity_provider_saml':sanitize_text_field($_GET['page']);

	include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'saml'.DIRECTORY_SEPARATOR.'navbar_saml.php';
}