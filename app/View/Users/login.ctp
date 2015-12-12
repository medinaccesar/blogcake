<div class="users form">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Identifícate'); ?>
		</legend>
		<?php echo $this->Form->input('username',array('label' => __('Usuario')));
			echo $this->Form->input('password',array('label' => __('Clave')));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Acceder')); ?>
</div>
