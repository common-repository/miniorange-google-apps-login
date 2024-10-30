<?php
$disabled_phone_details = 'disabled';
echo '<!--Register with miniOrange-->
	<form name="f" method="post" action="" id="register-form">
		<input type="hidden" name="option" value="mo_registration_register_customer" />
		<div class="mo_registration_divided_layout">
			<div class="mo_gsuite_registration_table_layout">
				<h3>' . mo_gsuite_( "Register with miniOrange" ) . '</h3>
				<h4> If you already have an account with us, you can directly login by entering registered email and corresponding password in the following fields.</h4> 
				You should register so that in case you need help, we can help you with step by step
                            instructions. We support all known IdPs - ADFS, Okta, Salesforce, Shibboleth,
                                SimpleSAMLphp, OpenAM, Centrify, Ping, RSA, IBM, Oracle, OneLogin, Bitium, WSO2 and many more.<br>
                                <b>You will also need a miniOrange account to upgrade to the premium version of the plugins.</b></br> We do not store any information except the email that you will use to register with us.
				<table class="mo_registration_settings_table">
					<tr>
						<td><br></td>
					</tr>
					<tr>
						<td><b><font color="#FF0000">*</font>' . mo_gsuite_( "Email:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" type="email" name="email"
							required placeholder="person@example.com"
							value="' . esc_html($current_user->user_email) . '" /></td>
					</tr>

					<tr style="display:none;">
						<td><b><font color="#FF0000">*</font>' . mo_gsuite_( "Website/Company Name:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="company"
							required placeholder="' . mo_gsuite_( "Enter your companyName" ) . '"
							value="' . esc_url_raw($_SERVER["SERVER_NAME"]) . '" /></td>
						<td></td>
					</tr>

					<tr style="display:none;">
						<td><b>&nbsp;&nbsp;' . mo_gsuite_( "FirstName:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="fname"
							placeholder="' . mo_gsuite_( "Enter your First Name" ) . '"
							value="' . esc_html($current_user->user_firstname) . '" /></td>
						<td></td>
					</tr>

					<tr style="display:none;">
						<td><b>&nbsp;&nbsp;' . mo_gsuite_( "LastName:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" type="text" name="lname"
							placeholder="' . mo_gsuite_( "Enter your Last Name" ) . '"
							value="' . esc_html($current_user->user_lastname) . '" /></td>
						<td></td>
					</tr>

					<tr style="display:none;">
						<td><b>&nbsp;&nbsp;' . mo_gsuite_( "Phone number:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" type="tel" id="phone"
							pattern="[\+]\d{7,14}|[\+]\d{1,4}[\s]\d{6,12}" name="phone"
							title="' . Mo_GSuite_Messages::showMessage( 'MO_REG_ENTER_PHONE' ) . '"
							placeholder="' . Mo_GSuite_Messages::showMessage( 'MO_REG_ENTER_PHONE' ) . '"
							value="' . esc_html($admin_phone) . '" /><br>' . mo_gsuite_( "We will call only if you need support." ) . '</td>
						<td></td>
					</tr>

					<tr>
						<td><b><font color="#FF0000">*</font>' . mo_gsuite_( "Password:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" required type="password"
							name="password" placeholder="' . mo_gsuite_( "Choose your password (Min. length 6)" ) . '" /></td>
					</tr>
					<tr>
						<td><b><font color="#FF0000">*</font>' . mo_gsuite_( "Confirm Password:" ) . '</b></td>
						<td><input class="mo_registration_table_textbox" required type="password"
							name="confirmPassword" placeholder="' . mo_gsuite_( "Confirm your password" ) . '" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><br /><input type="submit" name="submit" value="' . mo_gsuite_( "Next" ) . '" style="width:100px;"
							class="button button-primary button-large" /></td>
					</tr>
				</table>
			</div>
		</div>
	</form>';