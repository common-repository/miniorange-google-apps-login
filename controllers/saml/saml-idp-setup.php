<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 15-02-2018
 * Time: 17:17
 */

$idp_guides_link=  "https://miniorange.com/wordpress-single-sign-on-(sso)";

$is_your_idp_radio= get_mo_gsuite_option('mo_saml_enable_cloud_broker')=='false' ||get_mo_gsuite_option('mo_saml_enable_cloud_broker')=='' ?"checked":"" ;

$sp_issuer= site_url() . '/wp-content/plugins/miniorange-saml-20-single-sign-on/';

$acs_url= site_url() . '/';

$audience_uri= site_url() . '/wp-content/plugins/miniorange-saml-20-single-sign-on/';

$name_id_format= "urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress";

$recipient_url= site_url() . '/';


$destination_url= site_url() . '/';

$is_free_version= get_mo_gsuite_option( 'mo_saml_free_version' ) ?TRUE:FALSE;

$admin_customer_key= get_option( 'mo_gsuite_customer_validation_admin_customer_key' );

$metadata_url= site_url()."/?option=mosaml_metadata";
include MOV_GSUITE_DIR.'views'.DIRECTORY_SEPARATOR.'saml'.DIRECTORY_SEPARATOR.'saml-idp-setup.php';

