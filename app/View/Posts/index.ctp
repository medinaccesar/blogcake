<h1>Artículos del blog</h1>
<p><?php echo $this->Html->link("Añadir artículo", array('action' => 'add')); ?></p>

<table>
	<tr>
		<th>Id</th>
		<th>Título</th>
		<th>Creado</th>
	</tr>
<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id']; ?></td>

		<td>
			<?php echo $this->Html->link($post['Post']['title'],
			array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
		</td>

		<td>
		<?php echo $this->Form->postLink(
		'Delete',
		array('action' => 'delete', $post['Post']['id']),
		array('confirm' => '¿Está seguro?')
		)?>
		<?php echo $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id']));?>
		</td>



		<td><?php echo $post['Post']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
