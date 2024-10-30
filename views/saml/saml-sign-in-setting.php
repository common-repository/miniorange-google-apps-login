<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 15-02-2018
 * Time: 17:17
 */
?>

    <div class=" mo_registration_divided_layout">

        <div style="background-color:#FFFFFF; border:1px solid #CCCCCC; padding:0px 2% 0px 2%;position: relative" id="minorange-use-widget">

            <h3><b>Option 1: Use a Widget</b><sup style="font-size: 12px;">[Available in current version of the plugin]</sup></h3>
            <div style="margin:2% 0 2% 17px;">
                <p>Add the SSO Widget by following the instructions below. This will add the SSO link on your site.</p>
                <div id="mo_saml_add_widget_steps">
                    <ol>
                        <li>Go to Appearances > <a href="<?php echo get_admin_url().'widgets.php';?>">Widgets.</a></li>
                        <li>Select "Login with SAML". Drag and drop to your
                            favourite location and save.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <br/>
        <div style="background-color:#FFFFFF; border:1px solid #CCCCCC; padding:0px 2% 0px 2%;position: relative" id="miniorange-auto-redirect">
            <h3>Option 2: Auto-Redirection from site<sup style="font-size: 12px;">[Available in <a
                        href="admin.php?page=gsuitepricing" target="_blank">Standard, Premium and Enterprise</a> plans]</sup></h3>
            <span>1. Select this option if you want to restrict your site to only logged in users. Selecting this option will redirect the users to your IdP if logged in session is not found.</span>
            <br /><br/>
            <label class="switch">
            <input type="checkbox" style="background: #DCDAD1;" disabled/>
            <span class="slider round"></span>
            </label><span style="padding-left:5px"><b><span style="color: red;">*</span>Redirect to
            IdP if user not logged in</b></span>
            <br/>
            <br />
            <span>2. It will force user to provide credentials on your IdP on each login attempt even if the user is already logged in to IdP. This option may require some additional setting in your IdP to force it depending on your Identity Provider.</span>
            <br /><br />
            <label class="switch">
            <input type="checkbox" style="background: #DCDAD1;" disabled>
            <span class="slider round"></span>
            </label><span style="padding-left:5px"><b><span style="color: red;">*</span>Force authentication with your IdP on each login attempt</b></span>
           <br />
            <br/>
        </div>
        <div style="background-color:#FFFFFF; border:1px solid #CCCCCC; padding:0px 2% 0px 2%;position: relative" id="miniorange-auto-redirect-login-page">
             <h3>Option 3: Auto-Redirection from WordPress Login<sup style="font-size: 12px;">[Available in <a
                        href="admin.php?page=gsuitepricing" target="_blank">Standard, Premium and Enterprise</a> plans]</sup></h3>
            <span>1. Select this option if you want the users visiting any of the following URLs to get redirected to your configured IdP for authentication:</span>
                <br/><code><b><?php echo wp_login_url(); ?></b></code> or
                <code><b><?php echo admin_url(); ?></b></code><br /><br/>
            <label class="switch">
            <input type="checkbox" style="background: #DCDAD1;" disabled>
            <span class="slider round"></span>
					</label><span style="padding-left:5px"><b><span style="color: red;">*</span> Redirect to IdP from WordPress Login Page</b></span>
            <br /><br/>

            <span>2. Select this option to enable backdoor login if auto-redirect from WordPress Login is enabled.</span>
            <br/><br/>
            <label class="switch">
            <input type="checkbox" style="background: #DCDAD1;" disabled>
            <span class="slider round"></span>
					</label><span style="padding-left:5px"><b>
                        <span style="color: red;">*</span> Checking
                        this option creates a backdoor to login to your Website using WordPress credentials incase you
                        get locked out of your IdP</b></span><br/>
                        <br/><i>(Note down this URL: <code><b><?php echo site_url(); ?>/wp-login.php?saml_sso=false</b></code> )</i>
            <br /><br />
        </div>
        <div style="background-color:#FFFFFF; border:1px solid #CCCCCC; padding:0px 2% 0px 2%;" >
            <div style="background-color:#FFFFFF;position: relative" id="miniorange-short-code">
            <h3>Option 4: Use a ShortCode<sup style="font-size: 12px;">[Available in <a
                        href="admin.php?page=gsuitepricing" target="_blank">Standard, Premium and Enterprise</a> plans]</sup></h3>
                        <label class="switch">
                        <input type="checkbox" style="background: #DCDAD1;"
                           disabled  value="true">
                         <span class="slider round"></span>
					</label><span style="padding-left:5px"><b><span
                            style="color: red">*</span>Check this option if you want to add a shortcode to your page</b></span>
                    <br/>
            </div>
            <div style="display:block;text-align:center;margin:2%;">
                <input type="button"
                       onclick="window.location.href='<?php echo wp_logout_url( site_url() ); ?>'" 
                       class="button button-primary button-large" value="Log Out and Test">
            </div>
            
                <span style="color:red;">*</span>These options are configurable in the <a
                        href="admin.php?page=gsuitepricing" target="_blank"><b>standard,
                        premium and enterprise</b></a> version of the plugin.</h3>
                <br/><br/>
            
        </div>
        <br/>

    </div>
<?php
echo '<script>
jQuery("#redirect_to_idp").click(function (e) {
		e.preventDefault;
        jQuery("#redirect_to_idp_desc").slideToggle(400);
    });
	
	//redirect to idp
	jQuery("#registered_only_access").click(function (e) {
		e.preventDefault;
        jQuery("#registered_only_access_desc").slideToggle(400);
    });
	
	//redirect to idp
	jQuery("#force_authentication_with_idp").click(function (e) {
		e.preventDefault;
        jQuery("#force_authentication_with_idp_desc").slideToggle(400);
    });
	
</script>';

echo '<style>
.mo_saml_help_desc {
	font-size:13px;
	border-left:solid 2px rgba(128, 128, 128, 0.65);
	margin-top:10px;
	padding-left:10px;
}
</style>'
?>