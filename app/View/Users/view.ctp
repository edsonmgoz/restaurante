<div class="well">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($user['User']['fullname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo __('Acciones'); ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  	<li><?php echo $this->Html->link(__('Editar usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
	<li><?php echo $this->Form->postLink(__('Eliminar usuario'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
	<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('Crear usuario'), array('action' => 'add')); ?> </li>
  </ul>
</div>
