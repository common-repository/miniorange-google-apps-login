<?php

if ( sizeof( $existing_applist ) > 0 ) {
	echo "
				<div class=\"mo_registration_divided_layout\">
					<div class=\"mo_gsuite_registration_table_layout\">";
	echo
					"
							<br><a href='#'><button disabled style='float:right'>Add Application</button></a>";
} else {
	echo "<br><a href='admin.php?page=mo_oauth_settings&action=add'>
		
		                       <button style='float:right'>Add Application</button></a>";
}

echo "<h3>Applications List</h3>";

if ( is_array( $existing_applist ) && sizeof( $existing_applist ) > 0 ) {
	echo "<p style='background-color:whitesmoke;border-color:#ebccd1;border-radius:5px;padding:12px'>You can only add 1 application with free version. Upgrade to <a href='admin.php?page=gsuitepricing'><b>premium</b></a> to add more.</p>";
}
echo "<table class='mo-oauth-applist-table'>";
echo "<tr><th>Name</th><th style='text-align: left;padding-left: 15px'>Action</th></tr>";
echo "<tr>";
display_app_list( $existing_applist,$disabled);
echo "</tr>";
echo "</table>";
echo "<br><br>
		<div id='instructions'>
					</div>
		</div></div>";

echo '	<style>
		
		.mo-oauth-applist-table{
			    color: black;
    			background-color: whitesmoke;
    			border-color: darkgrey;
    			border-radius: 5px;
    			padding: 12px;
    			width:100% ;
		}
		.mo-oauth-applist-table tr > td:first-child {
       		width: 20%;
        	padding: 15px;
        	text-align: center;
    	}
    	
    	.mo-oauth-applist-table th{
			
    	}

    	.mo-oauth-applist-table tr > td:last-child {
        	width: 75%;
        	padding: 15px;
        	text-align:left;
    	}
		</style>';

$is_new_customer_setup = get_option('mo_oauth_new_customer_configuration');
		if($is_new_customer_setup == '1'){
echo '<script>	
			function app_instructions(appname){
			    switch(appname){
			        case "google":
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Google :</strong><ol><li>Visit the Google website for developers <a href=\"https://console.developers.google.com/project\"target=\"_blank\">console.developers.google.com</a>.</li><li>Open the Google API Console Credentials page and go to API Manager -> Credentials</li><li>From the project drop-down, choose Create a new project, enter a name for the project, and optionally, edit the provided Project ID. Click Create.</li><li>On the Credentials page, select Create credentials, then select OAuth client ID.</li><li>You may be prompted to set a product name on the Consent screen. If so, click Configure consent screen, supply the requested information, and click Save to return to the Credentials screen.</li><li>Select Web Application for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b>'.esc_url_raw($oauth_callback_url_new_style).'  </b> for the Redirect URI.</li><li>Click Create.</li><li>On the page that appears, copy the client ID and client secret to your clipboard, as you will need them to configure above.</li><li>Enable the Google+ API.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange Login with OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		            case "eveonline":
			            document.getElementById("instructions").innerHTML  ="<strong>Instructions:</strong><ol><li>Log in to your EVE Online account</li><li>At EVE Online, go to Support. Request for enabling OAuthfor a third-party application.</li><li>At EVE Online, add a new project/application. GenerateClient ID and Client Secret.</li><li>At EVE Online, set Redirect URL as <b>https://login.xecurify.com/moas/oauth/client/callback</b></li><li>Enter your Client ID and Client Secret above.</li><li>Click on the Save settings button.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		             case "facebook":
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Facebook : </strong><ol><li>Go to Facebook developers console <a href=\"https://developers.facebook.com/apps/\" target=\"_blank\">https://developers.facebook.com/apps/</a>.</li><li>Click on Create a New App/Add new App button. You will need to register as a Facebook developer to create an App.</li><li>Enter <b>Display Name</b>. And choose category.</li><li>Click on <b>Create App ID</b>.</li><li>From the left pane, select <b>Settings</b>.</li><li>From the tabs above, select <b>Advanced</b>.</li><li>Under <b>Client OAuth Settings</b>, enter <b>'.esc_url_raw($oauth_callback_url).'</b> in Valid OAuth redirect URIs and click <b>Save Changes</b>.</li><li>Paste your App ID/Secret provided by Facebook into the fields above.</li><li>Click on the Save settings button.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		             default:
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Google :</strong><ol><li>Visit the Google website for developers <a href=\"https://console.developers.google.com/project\"target=\"_blank\">console.developers.google.com</a>.</li><li>Open the Google API Console Credentials page and go to API Manager -> Credentials</li><li>From the project drop-down, choose Create a new project, enter a name for the project, and optionally, edit the provided Project ID. Click Create.</li><li>On the Credentials page, select Create credentials, then select OAuth client ID.</li><li>You may be prompted to set a product name on the Consent screen. If so, click Configure consent screen, supply the requested information, and click Save to return to the Credentials screen.</li><li>Select Web Application for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b>'.esc_url_raw($oauth_callback_url_new_style).'  </b> for the Redirect URI.</li><li>Click Create.</li><li>On the page that appears, copy the client ID and client secret to your clipboard, as you will need them to configure above.</li><li>Enable the Google+ API.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange Login with OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;      
			    }
			}</script>';
		}else{
			
			echo '<script>	
			function app_instructions(appname){
			    switch(appname){
			        case "google":
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Google :</strong><ol><li>Visit the Google website for developers <a href=\"https://console.developers.google.com/project\"target=\"_blank\">console.developers.google.com</a>.</li><li>Open the Google API Console Credentials page and go to API Manager -> Credentials</li><li>From the project drop-down, choose Create a new project, enter a name for the project, and optionally, edit the provided Project ID. Click Create.</li><li>On the Credentials page, select Create credentials, then select OAuth client ID.</li><li>You may be prompted to set a product name on the Consent screen. If so, click Configure consent screen, supply the requested information, and click Save to return to the Credentials screen.</li><li>Select Web Application for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b>'.esc_url_raw($oauth_callback_url).'  </b> for the Redirect URI.</li><li>Click Create.</li><li>On the page that appears, copy the client ID and client secret to your clipboard, as you will need them to configure above.</li><li>Enable the Google+ API.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange Login with OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		            case "eveonline":
			            document.getElementById("instructions").innerHTML  ="<strong>Instructions:</strong><ol><li>Log in to your EVE Online account</li><li>At EVE Online, go to Support. Request for enabling OAuthfor a third-party application.</li><li>At EVE Online, add a new project/application. GenerateClient ID and Client Secret.</li><li>At EVE Online, set Redirect URL as <b>https://login.xecurify.com/moas/oauth/client/callback</b></li><li>Enter your Client ID and Client Secret above.</li><li>Click on the Save settings button.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		             case "facebook":
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Facebook : </strong><ol><li>Go to Facebook developers console <a href=\"https://developers.facebook.com/apps/\" target=\"_blank\">https://developers.facebook.com/apps/</a>.</li><li>Click on Create a New App/Add new App button. You will need to register as a Facebook developer to create an App.</li><li>Enter <b>Display Name</b>. And choose category.</li><li>Click on <b>Create App ID</b>.</li><li>From the left pane, select <b>Settings</b>.</li><li>From the tabs above, select <b>Advanced</b>.</li><li>Under <b>Client OAuth Settings</b>, enter <b>'.esc_url_raw($oauth_callback_url).'</b> in Valid OAuth redirect URIs and click <b>Save Changes</b>.</li><li>Paste your App ID/Secret provided by Facebook into the fields above.</li><li>Click on the Save settings button.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;
			            
		             default:
			            document.getElementById("instructions").innerHTML  ="<br><strong>Instructions to configure Google :</strong><ol><li>Visit the Google website for developers <a href=\"https://console.developers.google.com/project\"target=\"_blank\">console.developers.google.com</a>.</li><li>Open the Google API Console Credentials page and go to API Manager -> Credentials</li><li>From the project drop-down, choose Create a new project, enter a name for the project, and optionally, edit the provided Project ID. Click Create.</li><li>On the Credentials page, select Create credentials, then select OAuth client ID.</li><li>You may be prompted to set a product name on the Consent screen. If so, click Configure consent screen, supply the requested information, and click Save to return to the Credentials screen.</li><li>Select Web Application for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b>'.esc_url_raw($oauth_callback_url).'  </b> for the Redirect URI.</li><li>Click Create.</li><li>On the page that appears, copy the client ID and client secret to your clipboard, as you will need them to configure above.</li><li>Enable the Google+ API.</li><li>Go to Appearance->Widgets. Among the available widgets you will find miniOrange Login with OAuth, drag it to the widget area where you want it to appear.</li><li>Now logout and go to your site. You will see a login link where you placed that widget.</li></ol>";
			            break;      
			    }
			}</script>';
		}
			
			
		echo	'<script>
				function ajax_action(appname,action){
			        jQuery.ajax({
								url:"' . site_url() . '/?option=miniorange-oauth-app-action",
								type:"POST",
								data:{
								    oauth_appname:appname,
								    action_name:action
								},
								crossDomain:!0,
								dataType:"json",
								
								success:function(data){	
								
								console.log(JSON.stringify(data.action));
								
								    switch(data.action){
								        case "edit":
								           var redirect_url="' . site_url() . '"+data.url+"&action=edit";
								            window.location.href = redirect_url; 
								            break;
											
										case "attribute_mapping":
										    break;
										    
									    case "role_mapping":
									    	
									    	break;
								        case "delete":
								            var redirect_url="' . site_url() . '"+data.url;
								            window.location.href = redirect_url;
								            break;
								    }
								},
								error: function() {
								}
							});
			}
							
		</script>';