<?php

echo '	<div class="wrap">';


if(!(isset($_REQUEST['page']) && sanitize_text_field($_REQUEST['page'])=='gsuitepricing')) {
		echo 	'<div><img style="float:left;" src="' . MOV_GSUITE_LOGO_URL . '"></div>
			
			<div class="mo-gsuite-header">
				' . mo_gsuite_( "Google Apps SAML" ) . '
				<a class="add-new-h2" href="' . esc_url_raw($profile_url) . '">' . mo_gsuite_( "Account" ) . '</a>
				<a class="add-new-h2" href="' . esc_url_raw($help_url) . '" target="_blank">' . mo_gsuite_( "FAQs" ) . '</a>
				<a class="mo-gsuite-license add-new-h2" style=" margin-right: 30%;" href="' . esc_url_raw($license_url) . '">' . mo_gsuite_( "Upgrade" ) . '</a>';

add_plugin_switch( $toggleSwitchValue );

echo '				
				</div>	
		</div>';
  
     mo_saml_display_sale_banner();

    echo '	<div id="tab">
			<h2 class="nav-tab-wrapper">
				';

    echo '	
				<a class="nav-tab ' . ($active_tab == 'identity_provider_saml' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_idp_setup) . '">' . mo_gsuite_("Identity Provider") . '</a>
                                                                                   
                <a class="nav-tab ' . ($active_tab == 'service_provider_saml' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_sp_config) . '">' . mo_gsuite_("Service Provider") . '</a>
                                                                                  
                <a class="nav-tab ' . ($active_tab == 'sign_in_setting_saml' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_sign_in_setting) . '">' . mo_gsuite_("Sign in Settings") . '</a>
                                                 
                <a class="nav-tab ' . ($active_tab == 'mapping_saml' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_mapping) . '">' . mo_gsuite_("Attribute / Role Mapping") . '</a>
                                                                                  
                <a class="nav-tab ' . ($active_tab == 'saml_import_export_config' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_import_export_config) . '">' . mo_gsuite_("Import Export Configuration") . '</a>
																				   
				<a class="nav-tab ' . ( $active_tab == 'addons_saml' ? 'nav-tab-active' : '' ) . '" href="' . esc_url_raw($saml_addons) . '">' . mo_gsuite_( "Add-ons" ) . '</a>														   

				<a class="nav-tab ' . ($active_tab == 'proxy_setup' ? 'nav-tab-active' : '') . '" href="' . esc_url_raw($saml_proxy) . '">' . mo_gsuite_("Proxy Setup") . '</a>';

    echo
    '</h2>
		</div>';
}else{?>			<h1>
                    <div style="text-align:center;">
                    miniOrange <div style="color: rgb(233, 125, 104); display:inline;" disabled ><b>SAML</b></div> Google Apps Login</div>
					<div style="float:right;"><?php add_plugin_switch( $toggleSwitchValue );?></div>
                    <div style="float:left;"><a  class="add-new-h2 add-new-hover" style="font-size: 16px; color: #000;" href="<?php echo 'admin.php?page=mogalsettings';?>"><span class="dashicons dashicons-arrow-left-alt" style="vertical-align: bottom;"></span> Back To Plugin Configuration</a></div>
                    <br /><br>
                    <?php mo_saml_display_sale_banner();?>
                    <div style="text-align:center; color: rgb(233, 125, 104);">You are currently on the Free version of the plugin<span style="font-size: 16px; margin-bottom: 0Px;"><li style="margin-bottom: 0px;margin-top: 0px;">Free version is recommended for setting up Proof of Concept (PoC)</li><li style="margin-bottom: 0px;margin-top: 0px;">Try it to test the SSO connection with your SAML 2.0 compliant IdP</li><li style="margin-bottom: 0px;margin-top: 0px;">Works with NameId Attribute which should contain Email Address</li>
                    <li style="color: dimgray; margin-top: 0px;list-style-type: none;">
                    <a tabindex="0"  style="cursor: pointer;color:dimgray;" id="popoverfree" data-toggle="popover" data-trigger="focus" title="<h3>Why should I upgrade to premium plugin?</h3>" data-placement="bottom" data-html="true"
                               data-content="<p>You should upgrade to seek the support of our SSO expert team.<br /><br />Free version does not support attribute mapping, role mapping, single logout features and Multisite Network Installation. <br /><br />Premium version support Signed SAML Request and Encrypted Assertion which are recommended from security point of view.<br /><br />Auto-Redirect to IdP which protect your site with IdP login is a part of premium version of the plugin.<br /><br />Check the features given in the Licensing Plans for more detail.</p>">
                    Why should I upgrade?</a>
                    </li></span></div></h1>
<?php }
echo		'<div id="mo_gsuite_messages"></div>';

function mo_saml_display_sale_banner(){
    ?>
<div class="container-fluid sale-bg-banner" id="mo_saml_sale_banner" style="display:none">
        <div class="banner-sale">
            <h1 class="h1 head-title blink" style="font-size: 50px;">END OF YEAR SALE</h1>
            <h2 class="hr-line"><span class="text-white"> LIMITED PERIOD OFFER</span></h2>
            <h3 class="sub-banner">Upto <b style="color: red;">95% Discount</b> on WordPress SAML SSO Plugins</h3>
        </div>
        <div class="banner-contact" style="display:flex; justify-content:center; align-items:center;flex-direction:column;">
            <p class="table-text">DISCOUNTS STARTING FROM <b class="instance-text">1<sup>st</sup> INSTANCE</b></p>
            <div class="sale-btn" style="display:flex;flex-direction:row">
                <a href="https://plugins.miniorange.com/wordpress-sso-end-of-year-sale" class="btn banner-btn-sale" target="_blank">View Sale Prices</a>
                <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&amp;tf=cm&amp;source=mailto&amp;su=End+of+Year+Sale+-+WP+SAML+SSO+Plugin+.&amp;to=samlsupport@xecurify.com&amp;body=I+want+to+enquire+about+End+of+Year+Sale+-+WP+SAML+SSO+plugin+.+" class="btn banner-btn-sale">Contact Us</a>
            </div>
        </div>
</div>
    <?php
}
?>
<script>
        var countDownDate = new Date("Dec 31 2021 23:59:59")    
    var now = new Date()
    var distance = countDownDate - now;
    if (distance < 0) {
        clearInterval(x);
    } else {
        document.getElementById("mo_saml_sale_banner").style.display = "block";
    }
</script>