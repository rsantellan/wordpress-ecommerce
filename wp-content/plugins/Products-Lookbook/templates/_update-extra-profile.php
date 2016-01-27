<?php
/*
Template Name: Update Profile
*/


global $userdata; 
get_currentuserinfo();

if(!empty($_POST['action'])){
	
	require_once(ABSPATH . 'wp-admin/includes/user.php');
	require_once(ABSPATH . WPINC . '/registration.php');
	
	check_admin_referer('update-profile_' . $user_ID);
	
	$errors = edit_user($user_ID);
	
	if ( is_wp_error( $errors ) ) {
		foreach( $errors->get_error_messages() as $message )
			$errmsg = "$message";
	}

	if($errmsg == '')
	{
		do_action('personal_options_update',$user_ID);
		$d_url = $_POST['dashboard_url'];
		wp_redirect( get_option("siteurl").'?page_id='.$post->ID.'&updated=true' );
	}
	else{
		$errmsg = '<div class="box-red">' . $errmsg . '</div>';
		$errcolor = 'style="background-color:#FFEBE8;border:1px solid #CC0000;"';
		
	}
}


get_currentuserinfo();
?>

		<div id="container">
			<div id="content" role="main">

<form name="profile" action="" method="post" enctype="multipart/form-data">
  <?php wp_nonce_field('update-profile_' . $user_ID) ?>
  <input type="hidden" name="from" value="profile" />
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="checkuser_id" value="<?php echo $user_ID ?>" />
  <input type="hidden" name="dashboard_url" value="<?php echo get_option("dashboard_url"); ?>" />
  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
	<?php if ( isset($_GET['updated']) ):
$d_url = $_GET['d'];?>
	<tr>
	  <td align="center" colspan="2"><span style="color: #FF0000; font-size: 11px;">Your profile changed successfully</span></td>
	</tr>
	<?php elseif($errmsg!=""): ?>
	<tr>
	  <td align="center" colspan="2"><span style="color: #FF0000; font-size: 11px;"><?php echo $errmsg;?></span></td>
	</tr>
	<?php endif;?>
	<tr>
		<td colspan="2" align="center"><h2>Update profile</h2></td>
	</tr>
	
	<tr><td colspan="2"><h3>Extra profile information</h3></td></tr>
	<tr>
		<td>Date Of Birth</td>
		<td><input type="text" name="dob" id="dob" value="<?php echo esc_attr( get_the_author_meta( 'dob', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>City</td>
		<td><input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>Province</td>
		<td><input type="text" name="province" id="province" value="<?php echo esc_attr( get_the_author_meta( 'province', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>Postal Code</td>
		<td><input type="text" name="postalcode" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'postalcode', $userdata->ID ) ); ?>" style="width: 300px;" /></td>
	</tr>
	<tr>
	  <td align="center" colspan="2"><input type="submit" value="Update" /></td>
	</tr>
  </table>
  <input type="hidden" name="action" value="update" />
</form>
			</div><!-- #content -->
		</div><!-- #container -->
