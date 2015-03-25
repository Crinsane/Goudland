<a name="contact-form"></a>

<?php use Gloudemans\Theme\ContactForm;

if(ContactForm::hasValidationErrors()) :?>
	<div class="alert alert-danger">
		<strong>Pas op!</strong> Nog niet alle velden zijn correct ingevuld.
	</div>
<?php endif;?>

<?php if(ContactForm::hasSendSuccess()) :?>
	<div class="alert alert-success">
		<strong>Gelukt!</strong> <?php echo ContactForm::getSendSuccess();?>
	</div>
<?php endif;?>

<?php echo ContactForm::open();?>
	<?php wp_nonce_field('post-contact-form', 'contact-form-nonce');?>
	<div class="form-group <?php echo ContactForm::hasValidationError('name') ? 'has-error' : '';?>">
		<div class="input-group">
			<input type="text" name="name" value="" placeholder="Uw Naam" class="form-control form-input-name">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
		</div>
		<?php if(ContactForm::hasValidationError('name')) :?>
			<span class="help-block"><?php echo ContactForm::getValidationError('name');?></span>
		<?php endif;?>
	</div>
	<div class="form-group <?php echo ContactForm::hasValidationError('email') ? 'has-error' : '';?>">
		<div class="input-group">
			<input type="email" name="email" value="" placeholder="Uw Email" class="form-control form-input-email">
			<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
		</div>
		<?php if(ContactForm::hasValidationError('email')) :?>
			<span class="help-block"><?php echo ContactForm::getValidationError('email');?></span>
		<?php endif;?>
	</div>
	<div class="form-group <?php echo ContactForm::hasValidationError('message') ? 'has-error' : '';?>">
		<textarea name="message" placeholder="Uw Bericht" class="form-control" rows="7"></textarea>
		<?php if(ContactForm::hasValidationError('message')) :?>
			<span class="help-block"><?php echo ContactForm::getValidationError('message');?></span>
		<?php endif;?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-lg btn-block">Verzenden</button>
	</div>
</form>
<?php ContactForm::close();?>