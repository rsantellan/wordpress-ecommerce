	 
		<form method="post" action="<?php echo esc_attr(get_option('fep_loginurl'));?>">
			<input type="hidden" name="fep_login" value="1" />
		    <p><label for="log"><?php _e('Username','fep');?></label><br /><input type="text" name="log" id="log" value="" size="20" /> </p>

		    <p><label for="pwd"><?php _e('Password','fep');?></label><br /><input type="password" name="pwd" id="pwd" size="20" /></p>
	   	    <p>
		       <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php _e('Remember me','fep');?></label>
		       <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
		    </p>
		    <p><input type="submit" name="submit" value="<?php _e('Login','fep');?>" class="button" /></p>
			
		    <?php if($register == "on"): ?>
		    <p><a href="<?php echo wp_registration_url();?>"><?php _e("Don't have account? Register.",'fep');?></a></p>
		    <?php endif; ?>
		</form>
