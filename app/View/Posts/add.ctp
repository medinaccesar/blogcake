<h1>Añadir artículos</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title',array(
    'label' => 'Título'));
echo $this->Form->input('body', array('rows' => '3', 'label' => 'Mensaje'));
echo $this->Form->end('Guardar artículo', array('style' => 'cursor:pointer'));
?>
