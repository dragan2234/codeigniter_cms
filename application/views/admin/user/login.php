<div class="modal-header">
	<h3>log in</h3>
	<p>please log in</p>
</div>
<div class="modal-body">
	<?php echo $this->session->flashdata('error');   ?>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Email</td>
			<td><?php echo form_input('email'); ?></td>
		</tr>
		<tr>
				<td>Password</td>
				<td><?php echo form_password('password'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit','Login', 'class="btn btn-primary"') ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>