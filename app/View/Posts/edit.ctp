<!-- File: /app/View/Posts/edit.ctp -->
<h1>Editar artículos</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'Título'));
echo $this->Form->input('body', array('rows' => '3' ,'label' => 'Mensaje'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Guardar artículos');
?>
