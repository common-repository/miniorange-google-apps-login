<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 24-04-2018
 * Time: 13:25
 */

class Mo_Gsuite_SAML_Widget_New extends Mo_Gsuite_Base_Widget {

	/**
	 * Mo_Gsuite_SAML_Widget_New constructor. This function will be used to register the widget
	 */
	public function __construct() {
		$this->widget_name        = 'Login with ' . get_option( 'saml_identity_name' );
		$this->widget_id          = 'Saml_Login_Widget';
		$this->widget_description = mo_gsuite_( 'This is a miniOrange SAML login widget.', 'mosaml' );
		parent::__construct();
	}


	/**
	 * Most important method to be overriden for the plugin to work.
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$wid_title = apply_filters( 'widget_title', $instance['wid_title'] );

		$this->widget_start( $args, $instance );

		$this->mo_gsuite_saml_login_form();

		$this->widget_end( $args );

	}

	/**
	 * SAML login form function this will check if the user is logged in or logged out and show the form accordingly.
	 * @param bool $is_from_shortcode
	 *
	 * @return string
	 */
	public function mo_gsuite_saml_login_form( $is_from_shortcode = false ) {

		$widget_html = '';
		if ( is_user_logged_in() ) {
			$widget_html = $this->logged_in_user_form();
		} else {
			$widget_html = $this->logged_out_user_form();
		}
		if ( $is_from_shortcode ) {
			return $widget_html;
		} else {
			echo $widget_html;
		}

	}

	/**
	 * Form for already logged in user.
	 * @return string
	 */
	private function logged_in_user_form() {
		$current_user       = wp_get_current_user();
		$link_with_username = __( 'Howdy, ', 'mosaml' ) . $current_user->display_name;
		$logout_url         = wp_logout_url( site_url() );

		$html = '';
		$html .= '<div id="logged_in_user" >
				' . $link_with_username . '|<a href="' . $logout_url . '" title="" > Logout</a>
        </div>';

		return $html;
	}

	/**
	 * Update:- Removed the form part/Reduced it to the anchor tag.
	 * Form for already logged out user. Check if there is need for the form.
	 * @return string
	 *
	 */
	private function logged_out_user_form() {
		$this->mo_gsuite_saml_load_login_script();

		$html = '';

		$identity_provider     = get_option( 'saml_identity_name' );
		$saml_x509_certificate = get_option( 'saml_x509_certificate' );

		//Check if the necessary identity provider and 509 certificate is blank.
		if ( ! Mo_GSuite_Utility::isBlank( $identity_provider ) && ! Mo_GSuite_Utility::isBlank( $saml_x509_certificate ) ) {
			if ( get_option( 'mo_saml_enable_cloud_broker' ) == 'false' || get_option( 'mo_saml_enable_cloud_broker' ) == 'miniorange' ) {
				$html .= '<a href="#" onClick="submitSamlForm()">Login with ' . $identity_provider . '</a></form>';
			} else {
				$html .= '<a href="#" onClick="submitSamlForm()">Login with ' . $identity_provider . '</a></form>';
			}

		} else {
			$html .= '<div>Please configure the miniOrange SAML Plugin first..</div>';

			if( ! Mo_GSuite_Utility::isBlank(get_option('mo_saml_redirect_error_code')))
			{
				//ToDo See if this can be moved to error messages abstract function
				$html.= '<div></div><div title="Login Error"><font color="red">We could not sign you in. Please contact your Administrator.</font></div>';

				delete_option('mo_saml_redirect_error_code');
				delete_option('mo_saml_redirect_error_reason');
			}
		}
		return $html;
	}

	/**
	 * Script necessary for login. Changed this a little bit.
	 */
	function mo_gsuite_saml_load_login_script() {
		echo '<script>
                function submitSamlForm(){
                    
                    var url="'.site_url().'"+"/?option=saml_user_login";
					window.location.href = url; 
                 }
			</script>';

	}

	function register_widget_styles() {

	}

	public function error_message() {
	}
}

/**
 * Registers the widget.
 *
 * @alert the name of register widget and clas should be same.
 */
function register_mo_saml_widget_new() {
	register_widget( 'Mo_Gsuite_SAML_Widget_New' );
}

add_action( 'widgets_init', 'register_mo_saml_widget_new' );