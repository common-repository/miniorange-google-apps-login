<?php

$registerd        = Mo_GSuite_Utility::micr();
$plan             = Mo_GSuite_Utility::micv();
$disabled         = ! $registerd ? "disabled" : "";
$current_user     = wp_get_current_user();
$email            = get_mo_gsuite_option( "mo_gsuite_customer_validation_admin_email" );
$phone            = get_mo_gsuite_option( "mo_gsuite_customer_validation_transactionId" );
$controller       = MOV_GSUITE_DIR . 'controllers/';
$nonce            = Mo_Gsuite_Constants::FORM_NONCE;
$controller_oauth = MOV_GSUITE_DIR . 'controllers/oauth';
$controller_saml  = MOV_GSUITE_DIR . 'controllers/saml';
update_option('mo_saml_free_version',1);

include $controller . 'navbar.php';

echo "<div class='mo-gsuite-opt-content'>";

if ( isset( $_GET['page'] ) ) {


	switch ( sanitize_text_field($_GET['page'] )) {
		case 'mogalsettings':
			include $controller . 'settings.php';
			break;

		case 'galoginaccount':
			include $controller . 'account.php';
			break;


		case 'gsuitepricing':
			include $controller . 'pricing.php';
			break;

		case 'configuration_oauth':
			include $controller_oauth .DIRECTORY_SEPARATOR.'oauth-configuration.php';
			break;


		case 'updateapp_oauth':
			include $controller_oauth . DIRECTORY_SEPARATOR.'oauth-configuration-update-app.php';
			break;


		case 'customization_oauth':
			include $controller_oauth . DIRECTORY_SEPARATOR.'oauth-customization.php';
			break;


		case 'signinsettings_oauth':
			include $controller_oauth . DIRECTORY_SEPARATOR.'oauth-signinsetting.php';
			break;
		case 'mapping_oauth':
			include $controller_oauth . DIRECTORY_SEPARATOR.'oauth-mapping.php';
			break;

		case 'report_oauth':
			include $controller_oauth . DIRECTORY_SEPARATOR.'oauth-report.php';
			break;
		case 'addons_oauth':
			include $controller_oauth. DIRECTORY_SEPARATOR.'oauth-addons.php';
			break;

		/***********************************************************************************************
		 *                                    SAML
		 ************************************************************************************************/

		case 'service_provider_saml':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-sp.php';
			break;

		case 'identity_provider_saml':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-idp-setup.php';
			break;

		case 'sign_in_setting_saml':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-sign-in-setting.php';
			break;

		case 'mapping_saml':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-mapping.php';
			break;

		case 'saml_import_export_config':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-import-export.php';
			break;

		case 'proxy_setup':
			include $controller_saml . DIRECTORY_SEPARATOR.'saml-proxy-setup.php';
			break;
		case 'addons_saml':
			include $controller_saml. DIRECTORY_SEPARATOR.'saml-addons.php';
			break;
		
		default:
			include $controller . 'settings.php';
			break;

	}
	
	

	do_action( 'mo_otp_verification_add_on_controller' );

	if ( ! in_array( sanitize_text_field($_GET['page']), array( "gsuitepricing","addons_saml") ) ) {
		include $controller . 'support.php';
	}

}

echo "</div>";
/**/