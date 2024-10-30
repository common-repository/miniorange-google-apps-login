<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Suryawanshi
 * Date: 15-02-2018
 * Time: 18:57
 */

echo '<div>';
echo ' <form id="mo_saml_cloud_broker" method="post" hidden action="">
            
            <input  type="hidden" name="option" value="mo_saml_enable_cloud_broker"/>
            <p>
                        <input type="radio" '.esc_html($is_your_idp_radio).'
                               id="mo_saml_enable_cloud_broker" name="mo_saml_enable_cloud_broker"
                               value="false"
                               onchange="document.getElementById(\'mo_saml_cloud_broker\').submit();">Use Your
                        own Identity Provider ( <a href="#" id="help_working_title2">Click Here<a></a> to
                            know how the plugin works for this case. )<br/> '; ?>
                        
            </p> 

        </form>
</div>