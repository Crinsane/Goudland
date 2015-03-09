<?php

class ContactForm {

	public function __construct()
	{
		add_action('wp_ajax_contact_form', [$this, 'handleContactForm']);
		add_action('wp_ajax_nopriv_contact_form', [$this, 'handleContactForm']);
	}

	public static function open()
	{
		$formAction = admin_url('admin-ajax.php') . '?action=contact_form';

		?>
			<form class="contact-form" method="post" action="<?php echo $formAction;?>">
		<?php
	}

	public static function close()
	{
		unset($_SESSION['validation_errors'], $_SESSION['send_success']);

		?>
			</form>
		<?php
	}

	private static function send($email, $name, $message)
	{
		wp_mail('Rob_Gloudemans@hotmail.com', 'Iemand heeft via de website contact opgenomen.', $message);
	}

	public function handleContactForm()
	{
		if( ! wp_verify_nonce($_POST['contact-form-nonce'], 'post-contact-form'))
		{

			wp_redirect(site_url() . wp_get_referer());
			exit;
		}

		$validated = true;

		if( ! isset($_POST['name']) || empty($_POST['name']))
		{
			$validated = false;
			$validationErrors['name'] = 'Vul alstublieft uw naam in.';
		}

		if( ! isset($_POST['email']) || empty($_POST['email']))
		{
			$validated = false;

			$validationErrors['email'] = 'Vul alstublieft uw e-mail adres in.';
		}
		else
		{
			if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				$validated = false;

				$validationErrors['email'] = 'Vul alstublieft een geldig e-mail adres in.';
			}
		}

		if( ! isset($_POST['message']) || empty($_POST['message']))
		{
			$validated = false;
			$validationErrors['message'] = 'Vul alstublieft uw bericht in.';
		}

		if( ! $validated)
		{
			$_SESSION['validation_errors'] = $validationErrors;

			wp_redirect(site_url() . wp_get_referer() . '#contact-form');
			exit;
		}

		self::send(esc_attr($_POST['email']), esc_attr($_POST['name']), esc_attr($_POST['message']));

		$_SESSION['send_success'] = 'De email is succesvol verstuurd. Wij nemen zo snel mogelijk contact met u op.';

		wp_redirect(site_url() . wp_get_referer() . '#contact-form');
		exit;
	}

	public static function hasValidationErrors()
	{
		return isset($_SESSION['validation_errors']) && ! empty($_SESSION['validation_errors']);
	}

	public static function hasValidationError($key)
	{
		$error = self::getValidationError($key);
		return ! empty($error);
	}

	public static function getValidationErrors()
	{
		$validationErrors = $_SESSION['validation_errors'];

		return $validationErrors;
	}

	public static function getValidationError($key)
	{
		$errors = self::getValidationErrors();

		return $errors[$key];
	}

	public static function hasSendSuccess()
	{
		return isset($_SESSION['send_success']) && ! empty($_SESSION['send_success']);
	}

	public static function getSendSuccess()
	{
		return isset($_SESSION['send_success']) ? $_SESSION['send_success'] : null;
	}

}