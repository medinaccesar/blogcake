<!-- app/View/Users/add.ctp -->
<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<legend><?php echo __('Añadir usuario'); ?></legend>
	<?php 
		echo $this->Form->input('username',array('label' => 'Usuario'));
		echo $this->Form->input('password',array('label' => 'Clave'));
		echo $this->Form->input('role', array(
				'options' => array(
					'admin' => 'Admin', 
					'author' => 'Autor'
				), 
				'label' => 'Rol'
			)
		);
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Enviar')); ?>
</div>
