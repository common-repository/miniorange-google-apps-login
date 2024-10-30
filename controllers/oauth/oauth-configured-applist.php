<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 12-02-2018
 * Time: 18:03
 */

$existing_applist = get_mo_gsuite_option( 'mo_oauth_apps_list_test' );
include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'instructions'.DIRECTORY_SEPARATOR.'class-mo-oauth-instruction-html.php';
include MOV_GSUITE_DIR . 'views'.DIRECTORY_SEPARATOR.'oauth'.DIRECTORY_SEPARATOR.'oauth-configured-applist.php';

function display_app_list( $existing_applist,$disabled ) {
		foreach ( $existing_applist as $key => $app ) {

		echo "
				<td>" . $key . "</td>
				<td>
				<a href='#' ".$disabled." onclick='ajax_action(\"" . $key . "/*\",\"edit\")'>Edit Application</a> | ";

		echo	"<a id= 'delete_anchor' ".$disabled." href='#' onclick='ajax_action(\""         . $key . "\",\"delete\")'> Delete </a> |  
				  
				  <a id='instruction_anchor' ".$disabled." onclick='app_instructions(\"" . $key . "\")' href='#'> How to Configure? </a> |
				  <button type='button' onclick='testing()' style='background:transparent; padding-left:0px; box-shadow:none; color:#0073aa; border:transparent;'  value=''><u>Test Configuration</u></button>
				  </td>
				  
				  <form id='test_form' name='test_form' action='#' method='post'>
				  <input type='hidden' name='option' id='test_config_option'></input></form>";?>
				<script>
					function testing(){
						document.querySelector('#test_config_option').value = 'test_setup';
						document.querySelector('#test_form').submit();
					}
				</script><?php
	}
}