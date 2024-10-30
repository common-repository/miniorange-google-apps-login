<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 08-02-2018
 * Time: 10:01
 */
echo '<style>
		.tableborder {
			border-collapse: collapse;
			width: 100%;
			border-color:#eee;
		}

		.tableborder th, .tableborder td {
			text-align: left;
			padding: 8px;
			border-color:#eee;
		}

		.tableborder tr:nth-child(even){background-color: #f2f2f2}
		
    .mo_update_app_table{
        width: 100%;
    }
    .mo_update_app_table tr >td:first-child {
        width: 30%;
    }

    .mo_update_app_table tr >td input {
        width: 90%;
    }

    .save-settings{
        margin-left: 30%;
        margin-right: 30%;

    }
	</style>';
echo '
<div class="mo_registration_divided_layout">
	<div class="mo_gsuite_registration_table_layout">';

echo    '<div id="toggle2" class="panel_toggle">
			<h3>Add Application</h3>
		</div>
		<form  id="form-common" name="form-common" method="post" action="">
		<input type="hidden" name="option" value="mo_oauth_add_app_new" />
		<table class="mo_update_app_table">
			<tr>
			<td><strong>&nbsp;&nbsp;Application:</strong></td>
			<td>
				<input style="display:none" class="mo_table_textbox" type="text" id="mo_oauth_app" name="mo_oauth_app_name" value="google">&nbsp&nbspGoogle
			</td>
			</tr>
			<tr  style="display:none" id="mo_oauth_custom_app_name_div">
				<td><strong><font color="#FF0000">*</font>Custom App Name:</strong></td>
				<td><input class="mo_table_textbox" type="text" id="mo_oauth_custom_app_name" name="mo_oauth_custom_app_name" value=""></td>
			</tr>
			<tr>
				<td><strong><font color="#FF0000">*</font>Client ID:</strong></td>
				<td><input class="mo_table_textbox" id="cl_id" required type="text" name="mo_oauth_client_id" value=""></td>
			</tr>
			<tr>
				<td><strong><font color="#FF0000">*</font>Client Secret:</strong></td>
				<td><input  class="mo_table_textbox" required type="text"  name="mo_oauth_client_secret" value=""></td>
			</tr>
			<tr>
				<td><strong>Scope:</strong></td>
				<td><input  class="mo_table_textbox" id="ga_scope" type="text" name="mo_oauth_scope" value="email"></td>
			</tr>
			<tr id="mo_oauth_authorizeurl_div">
				<td><strong><font color="#FF0000">*</font>Authorize Endpoint:</strong></td>
				<td><input disabled class="mo_table_textbox" type="text" id="mo_oauth_authorizeurl" name="mo_oauth_authorizeurl" value="https://accounts.google.com/o/oauth2/auth"></td>
			</tr>
			<tr id="mo_oauth_accesstokenurl_div">
				<td><strong><font color="#FF0000">*</font>Access Token Endpoint:</strong></td>
				<td><input disabled class="mo_table_textbox" type="text" id="mo_oauth_accesstokenurl" name="mo_oauth_accesstokenurl" value="https://www.googleapis.com/oauth2/v4/token"></td>
			</tr>
			<tr id="mo_oauth_resourceownerdetailsurl_div">
				<td><strong><font color="#FF0000">*</font>Get User Info Endpoint:</strong></td>
				<td><input disabled  class="mo_table_textbox" type="text" id="mo_oauth_resourceownerdetailsurl" name="mo_oauth_resourceownerdetailsurl" value="https://www.googleapis.com/oauth2/v1/userinfo"></td>
			</tr>';
			?>
			
			        <tr><td><strong>Client Authentication:</strong></td><td><div style="padding:5px;"></div><input style="width:2%;" class="mo_table_textbox" type="radio" name="disable_authorization_header" id="disable_authorization_header" <?php echo get_option('mo_oauth_client_disable_authorization_header') ? '' : 'checked'; ?> value="0">HTTP Basic (Recommended)<div style="padding:5px;"></div><input style="width:2%;" class="mo_table_textbox" type="radio" name="disable_authorization_header" id="disable_authorization_header" value="1" <?php echo get_option('mo_oauth_client_disable_authorization_header') ? 'checked' : ''; ?>>Request Body<div style="padding:5px;"></div></td></tr>

			
			<?php
			
			echo '
			<tr><td><br></td></tr>
			<tr>
				<td>&nbsp;</td>
				<td><input  type="submit" name="submit" style="width:20%"value="Save settings"
					class="button button-primary button-large" />
				</td>
			</tr>
			</table>
		</form>
		</br></br>
		
		<div id="instructions"></div>
		</div>
		</div>
';?>

<script>
			jQuery(document).ready(function() {
			    document.getElementById("instructions").innerHTML  ="<?php 
				$is_new_customer_setup = get_option('mo_oauth_new_customer_configuration');
				if($is_new_customer_setup == '1'){
					echo $google_instructions_new_style;
				}else{
					echo $google_instructions_new_style;
				}					?>";
			});
			
			function selectapp() {
				var appname = document.getElementById("mo_oauth_app").value;
				
				console.log(appname);
				
				 switch(appname){
			        case "google":
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Google :</strong><ol><li>Visit the Google website for developers <a href=\"https://console.developers.google.com/project\"target=\"_blank\">console.developers.google.com</a>.</li><li>Open the Google API Console Credentials page and go to API Manager -> Credentials</li><li>From the project drop-down, choose Create a new project, enter a name for the project, and optionally, edit the provided Project ID. Click Create.</li><li>On the Credentials page, select Create credentials, then select OAuth client ID.</li><li>You may be prompted to set a product name on the Consent screen. If so, click Configure consent screen, supply the requested information, and click Save to return to the Credentials screen.</li><li>Select Web Application for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b>"+ <?php echo esc_url_raw($oauth_callback_url); ?>+ " </b> for the Redirect URI.</li><li>Click Create.</li><li>On the page that appears, copy the client ID and client secret to your clipboard, as you will need them to configure above.</li><li>Enable the Google+ API.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange Login with OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break; 
			        default:
			            break;
			    	}
				}

		</script>