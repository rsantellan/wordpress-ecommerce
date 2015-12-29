<?php
/**
 * WooCommerce Social Login
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Social Login to newer
 * versions in the future. If you wish to customize WooCommerce Social Login for your
 * needs please refer to http://docs.woothemes.com/document/woocommerce-social-login/ for more information.
 *
 * @package   WC-Social-Login/Providers
 * @author    SkyVerge
 * @copyright Copyright (c) 2014-2015, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WC_Social_Login_Provider_Instagram extends WC_Social_Login_Provider {


	/**
	 * Constructor for the provider.
	 *
	 * @since 1.1.0
	 * @param string $base_auth_path base authentication path
	 */
	public function __construct( $base_auth_path ) {

		$this->id                = 'instagram';
		$this->title             = __( 'Instagram', WC_Social_Login::TEXT_DOMAIN );
		$this->strategy_class    = 'Instagram';
		$this->color             = '#517fa4';
		$this->internal_callback = 'int_callback';
		$this->require_ssl       = false;

		$this->notices = array(
			'account_linked'         => __( 'Your Instagram account is now linked to your account.', WC_Social_Login::TEXT_DOMAIN ),
			'account_unlinked'       => __( 'Instagram account was successfully unlinked from your account.', WC_Social_Login::TEXT_DOMAIN ),
			'account_already_linked' => __( 'This Instagram account is already linked to another user account.', WC_Social_Login::TEXT_DOMAIN ),
			'account_already_exists' => __( 'A user account using the same email address as this Instagram account already exists.', WC_Social_Login::TEXT_DOMAIN ),
		);

		parent::__construct( $base_auth_path );

		// normalize profile
		add_filter( 'wc_social_login_' . $this->get_id() . '_profile', array( $this, 'normalize_profile' ) );
	}


	/**
	 * Get the description, overridden to display the callback URL
	 * as a convenience since Instagram requires the admin to enter it for the app
	 *
	 * @since 1.1.0
	 * @see WC_Social_Login_Provider::get_description()
	 * @return string
	 */
	public function get_description() {

		return sprintf( __( 'Need help setting up and configuring Instagram? %sRead the docs%s', WC_Social_Login::TEXT_DOMAIN ), '<a href="http://docs.woothemes.com/document/woocommerce-social-login-create-social-apps#instagram">', '</a>' ) . '<br/><br/>' . sprintf( __( 'The OAuth redirect_uri is %s', WC_Social_Login::TEXT_DOMAIN ), '<code>' . $this->get_callback_url() . '</code>' );
	}


	/**
	 * Return the providers opAuth config
	 *
	 * @since 1.1.0
	 * @return array
	 */
	public function get_opauth_config() {

		/**
		 * Filter provider's Opauth configuration.
		 *
		 * @since 1.1.0
		 * @param array $config See https://github.com/opauth/opauth/wiki/Opauth-configuration - Strategy
		 */
		return apply_filters( 'wc_social_login_' . $this->get_id() . '_opauth_config', array(
			'redirect_uri'      => $this->get_callback_url(),
			'strategy_class'    => $this->get_strategy_class(),
			'strategy_url_name' => $this->get_id(),
			'client_id'         => $this->get_client_id(),
			'client_secret'     => $this->get_client_secret(),
		) );
	}


	/**
	 * Return the default login button text
	 *
	 * @since 1.1.0
	 * @see WC_Social_Login_Provider::get_default_login_button_text()
	 * @return string
	 */
	public function get_default_login_button_text() {

		return __( 'Log in with Instagram', WC_Social_Login::TEXT_DOMAIN );
	}


	/**
	 * Return the default login button text
	 *
	 * @since 1.1.0
	 * @see WC_Social_Login_Provider::get_default_login_button_text()
	 * @return string
	 */
	public function get_default_link_button_text() {

		return __( 'Link your account to Instagram', WC_Social_Login::TEXT_DOMAIN );
	}


	/**
	 * Instagram returns a `username`, so map it to `nickname`
	 *
	 * @since 1.1.0
	 * @param array $profile instagram profile data
	 * @return array
	 */
	public function normalize_profile( $profile ) {

		if ( isset( $profile['username'] ) ) {
			$profile['nickname'] = $profile['username'];
		}

		return $profile;
	}

}
