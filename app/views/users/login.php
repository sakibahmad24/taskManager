<h3>Login Form</h3>
<?php if ($this->session->userdata('logged_in')): ?>
	<p>You are logged in as <?php echo $this->session->userdata('username'); ?></p>
	<!-- Start Form -->
	<?php $attributes = array(
 	'id' => 'logout_form',
 	'class' => 'form-horizontal'
 ); ?>
	<?php echo form_open('users/logout', $attributes); ?>
	<!-- Submit Buttons -->
	<?php $data = array(
 	'value' => "Logout",
 	"name" => "submit",
 	"class" => "btn btn-primary"
 ); ?>
	<?php echo form_submit($data); ?>
	<!-- Form Close Tag -->
	<?php echo form_close(); ?>

<?php else: ?>

<?php $attributes = array(
	'id' => 'login_form',
	'class' => 'form-horizontal'
); ?>
<?php echo form_open('users/login', $attributes); ?> 
<!-- parameter 1 : controller, parameter 2 : data -->

<!-- USERNAME -->
<p>
    <?php echo form_label('Username:'); ?>
    <?php $data = array(
    	'name' => 'username',
    	'placeholder' => 'Enter Username',
    	'style' => 'width:90%',
    	'value' => set_value('username')
    ); ?>
    <?php echo form_input($data); ?>

</p>

<!-- PASSWORD -->
<p>
    <?php echo form_label('Password:'); ?>
    <?php $data = array(
    	'name' => 'password',
    	'placeholder' => 'Enter Password',
    	'style' => 'width:90%',
    	'value' => set_value('password')
    ); ?>
    <?php echo form_password($data); ?>
</p>

<!-- SUBMIT -->
<p>
    <?php $data = array(
    	'name' => 'submit',
    	'class' => 'btn btn-primary',
    	'value' => 'Login'
    ); ?>
    <?php echo form_submit($data); ?>
</p>

<?php echo form_close(); ?>

<?php endif; ?>
