<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 09-02-2018
 * Time: 16:16
 */

class MO_Control_Handler {
	
	function __construct() {
		add_action( 'admin_init', array( $this, 'redirect_control' ) );
		add_action('init',array($this,'testing_setup'));	
		add_action('init',array($this,'testing_redirect'));	
		add_action('init',array($this,'testing_oauthcallback'));	
	}

	function redirect_control() {
		if ( Mo_GSuite_Utility::isBlank( $_POST ) || ! isset( $_POST['option'] ) ) {
			return;
		}
		
		switch ( sanitize_text_field($_POST['option']) ) {

			case "mo_gal_validation_contact_us_query_option":
				$this->_mo_validation_support_query(sanitize_email($_POST['query_email']),sanitize_text_field($_POST['query_phone']),sanitize_text_field($_POST['query']));
				break;

			case "mo_oauth_add_app":
				//ToDo change this to work with basePostAction
				$obj = new Mo_Oauth_App_Configuration();
				update_option('mo_gapps_config', $obj);
				
				break;
				
			case "mo_oauth_add_app_new":
				
				//ToDo change this to work with basePostAction
				update_mo_gsuite_option( 'mo_oauth_new_customer_configuration', '1');
				$obj = new Mo_Oauth_App_Configuration();
				update_option('mo_gapps_config', $obj);
				
				break;

			default:
				break;
		}

	}
	
	function testing_setup(){
		if(isset($_REQUEST['option']) && sanitize_text_field($_REQUEST['option'])=='test_setup'){	?><script>
			var myWindow = window.open('<?php echo site_url(); ?>' + '/?option=testing_started&app=google', "Test Attribute Configuration", "width=800, height=800");</script><?php		
		}
	}
	
	function testing_redirect(){
		
			if(isset($_REQUEST['option']) && sanitize_text_field($_REQUEST['option']) == 'testing_started'){
				
				$mo_oauth_app_name = sanitize_text_field($_REQUEST['app']);
				wp_redirect(site_url().'?option=t_oauthredirect&app_name='. urlencode($mo_oauth_app_name)."&test=true");
						exit();
				
			}
	}
	
	
	
	
	function testattrmappingconfig($nestedprefix, $resourceOwnerDetails){
		foreach($resourceOwnerDetails as $key => $resource){
			if(is_array($resource) || is_object($resource)){
				if(!empty($nestedprefix))
					$nestedprefix .= ".";
				testattrmappingconfig($nestedprefix.$key,$resource);
			} else {
				echo "<tr><td>";
				if(!empty($nestedprefix))
					echo $nestedprefix.".";
				echo $key."</td><td>".$resource."</td></tr>";
			}
		}
	}
	
	
	function testing_oauthcallback(){
			if( isset( $_REQUEST['option'] ) and strpos( sanitize_text_field($_REQUEST['option']), 't_oauthredirect' ) !== false ) {
				
				$appname = sanitize_text_field($_REQUEST['app_name']);
				
				
				$obj = get_option('mo_gapps_config');
				
				if(!($obj)){
					$obj = new Mo_Oauth_App_Configuration();
					$obj->set_app_list();
					update_option('mo_gapps_config',$obj);					
				}
				$existing_applist = $obj->get_existing_applist();
				
				foreach($existing_applist as $key => $app){
					if($appname==$key){
						
						 $clientid = $app["clientid"];
						 $clientsecret = $app["clientsecret"];
						 $scope = $app["scope"];
						 $redirecturi = $app["redirecturi"];
						 $authorizeurl = $app["authorizeurl"];
						 $accesstokenurl = $app["accesstokenurl"];
						 $resourceownerurl = $app["resourceownerdetailsurl"];
						 
						 //state is changed to avoid conflict between login with oauth and test config.
						 
						 
						 $state = base64_encode("googleapps");
						 
						$authorizeurl = $authorizeurl."?client_id=".$app['clientid']."&scope=".$app['scope']."&redirect_uri=".$app['redirecturi']."&response_type=code&state=".$state;
						header('Location: ' . $authorizeurl);
						exit;
					}
				}	
			}

			
			else if(isset($_GET['code']) && isset($_GET['state'])) {
				
				if(sanitize_text_field($_GET['state']) == base64_encode("googleapps")){
				
				if (!isset($_GET['code'])){
				if(isset($_GET['error_description']))
					exit(sanitize_text_field($_GET['error_description']));
				else if(isset($_GET['error']))
					exit(sanitize_text_field($_GET['error']));
				exit('Invalid response');
				} else {
					
					
					try {

					$currentappname = "";

					 if (isset($_GET['state']) && !empty($_GET['state'])){
						$currentappname = base64_decode(sanitize_text_field($_GET['state']));
					}

					if (empty($currentappname)) {
						exit('No request found for this application.');
					}else{
				
					}
					$currentappname = "google";
					$obj = get_option('mo_gapps_config');
					
					$existing_applist = $obj->get_existing_applist();
					$current_app_data = "";
					$mo_oauth_handler = new Mo_OAuth_Hanlder();
					foreach($existing_applist as $key=>$app){
						
						if($currentappname == $key){
							$current_app_data = $app;
							
							
							$accessTokenUrl_test = $current_app_data['accesstokenurl'];
							
							$accessToken_test = $mo_oauth_handler->getAccessToken($accessTokenUrl_test, 'authorization_code', $current_app_data['clientid'],  $current_app_data['clientsecret'], sanitize_text_field($_GET['code']), $current_app_data['redirecturi']);
						
							if(!$accessToken_test)
							exit('Invalid token received.');
						
							$resourceownerdetailsurl_test = $current_app_data['resourceownerdetailsurl'];
							$resourceOwner_test = $mo_oauth_handler->getResourceOwner($resourceownerdetailsurl_test, $accessToken_test);
							$email = "";
							$name = "";
							//TEST Configuration
							if(isset($_REQUEST['state'])){
								echo '<div style="font-family:Calibri;padding:0 3%;">';
								echo '<style>table{border-collapse:collapse;}th {background-color: #eee; text-align: center; padding: 8px; border-width:1px; border-style:solid; border-color:#212121;}tr:nth-child(odd) {background-color: #f2f2f2;} td{padding:8px;border-width:1px; border-style:solid; border-color:#212121;}</style>';
								echo "<h2>Test Configuration</h2><table><tr><th>Attribute Name</th><th>Attribute Value</th></tr>";
								$this->testattrmappingconfig("",$resourceOwner_test);
								echo "</table>";
								echo '<div style="padding: 10px;"></div><input style="padding:1%;width:100px;background: #0091CD none repeat scroll 0% 0%;cursor: pointer;font-size:15px;border-width: 1px;border-style: solid;border-radius: 3px;white-space: nowrap;box-sizing: border-box;border-color: #0073AA;box-shadow: 0px 1px 0px rgba(120, 200, 230, 0.6) inset;color: #FFF;"type="button" value="Done" onClick="self.close();"></div>';
								exit();
							}
						}
					}
					
					}catch (Exception $e) {

					// Failed to get the access token or user details.
					exit($e->getMessage());

				}
					
					
				}
				}
			}
	}


	
	function getnestedattribute($resource, $key){
		if($key==="")
			return "";

		$keys = explode(".",$key);
		if(sizeof($keys)>1){
			$current_key = $keys[0];
			if(isset($resource[$current_key]))
				return getnestedattribute($resource[$current_key], str_replace($current_key.".","",$key));
		} else {
			$current_key = $keys[0];
			if(isset($resource[$current_key])) {
				return $resource[$current_key];
			}
		}
	}

	/**
	 * This function processes the support form data beforing sending it to the
	 * server.
	 *
	 * @param $email - the email of the admin to contact
	 * @param $query - the query of the admin
	 * @param $phone - the phone number if provided of the admin
	 */
	function _mo_validation_support_query($email,$phone,$query)
	{
		if( empty($email) || empty($query) )
		{
			do_action('mo_gsuite_registration_show_message', Mo_GSuite_Messages::showMessage('SUPPORT_FORM_VALUES'),'ERROR');
			return;
		}

		$query 	  = sanitize_text_field( $query );
		$email 	  = sanitize_text_field( $email );
		$phone 	  = sanitize_text_field( $phone );

		$submited = Mo_GSuite_Curl::submit_contact_us( $email, $phone, $query );

		if(json_last_error() == JSON_ERROR_NONE && $submited)
		{
			do_action('mo_gsuite_registration_show_message',Mo_GSuite_Messages::showMessage('SUPPORT_FORM_SENT'),'SUCCESS');
			return;
		}

		do_action('mo_gsuite_registration_show_message',Mo_GSuite_Messages::showMessage('SUPPORT_FORM_ERROR'),'ERROR');
	}
}


new MO_Control_Handler;