<?php
/**
 * Form Register
 *
 * If you wish to override this file, you can do so by creating a version in your
 * theme, and using the `MKDO_FRONT_END_LOGIN_PREFIX . '_view_template_folder` hook
 * to set the right location.
 *
 * @package mkdo\front_end_register
 */

/**
 * Variables
 *
 * The following variables can be used in this view.
 * $username          = '';
 * $email             = '';
 * $username_is_email = true;
 *
 * If we need to define others we can do it here too.
 */

$password_message = apply_filters(
	MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_password_message',
	esc_html__( 'Registration confirmation will be emailed to you.', 'front-end-login' )
);

/**
 * Output
 *
 * Here is the HTML output, this can be styled however.
 * Do not alter this file, instead duplicate it into your theme.
 */
?>

<form id="form_register" class="mkdo_form" method="post" autocomplete="off">

	<?php
	// Add a filter to add controls before the username.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_before_username' );

	if ( ! $username_is_email ) {
		?>
		<div class="mkdo_form__input mkdo_form__input--username">
			<label for="username">
				<?php esc_html_e( 'Username:', 'front-end-login' );?>
			</label>
			<input
				type="text"
				id="username"
				name="username"
				placeholder="<?php esc_html_e( 'Username', 'front-end-login' );?>"
				value="<?php echo esc_attr( $username );?>"
			/>
		</div>
		<?php
	}
	?>

	<?php
	// Add a filter to add controls before the email.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_before_email' );
	?>

	<div class="mkdo_form__input mkdo_form__input--email">
		<label for="email">
			<?php esc_html_e( 'Email:', 'front-end-login' );?>
		</label>
		<input
			type="text"
			id="email"
			name="email"
			placeholder="<?php esc_html_e( 'Email', 'front-end-login' );?>"
			value="<?php echo esc_attr( $email );?>"
		/>
	</div>

	<?php
	if ( ! empty( $password_message ) ) {
		echo '<p>' . esc_html( $password_message ) . '</p>';
	}
	?>

	<?php
	// Add a filter to add controls before the submit button.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_before_submit' );
	?>

	<div class="mkdo_form__input mkdo_form__input--submit">
		<input class="btn button mkdo_form__button" type="submit" value="<?php esc_html_e( 'Register', 'front-end-login' );?>"/>
	</div>

	<?php
	// Add a filter to add controls before the navigation.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_before_navigation' );
	?>

	<nav class="mkdo_form__navigation form_navigation" role="navigation">
		<ul>
			<li class="form_navigation__item">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="<?php esc_html_e( 'Forgot Password?', 'front-end-login' );?>"><?php esc_html_e( 'Forgot Password?', 'front-end-login' );?></a>
			</li>
			<li class="form_navigation__item">
				<a href="<?php echo esc_url( wp_login_url() ); ?>" title="<?php esc_html_e( 'Login', 'front-end-login' );?>"><?php esc_html_e( 'Login', 'front-end-login' );?></a>
			</li>
		</ul>
	</nav>

	<?php
	// Add a filter to add controls after the form.
	do_action( MKDO_FRONT_END_LOGIN_PREFIX . '_form_register_after_form' );
	?>

	<?php
	// Render the NOnce for security.
	wp_nonce_field( 'form_register', 'form_register_nonce' );
	?>
</form>
