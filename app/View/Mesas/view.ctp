<div class="well">
<h2><?php echo __('Mesa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serie'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['serie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puestos'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['puestos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posicion'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['posicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mesa['Mesa']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mesero'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mesa['Mesero']['nombre'], array('controller' => 'meseros', 'action' => 'view', $mesa['Mesero']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo __('Actions'); ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
	<li><?php echo $this->Html->link(__('Edit Mesa'), array('action' => 'edit', $mesa['Mesa']['id'])); ?></li>
	<li><?php echo $this->Form->postLink(__('Delete Mesa'), array('action' => 'delete', $mesa['Mesa']['id']), array(), __('Are you sure you want to delete # %s?', $mesa['Mesa']['id'])); ?></li>
	<li><?php echo $this->Html->link(__('List Mesas'), array('action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('New Mesa'), array('action' => 'add')); ?></li>
    <li class="divider"></li>
	<li><?php echo $this->Html->link(__('List Meseros'), array('controller' => 'meseros', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('New Mesero'), array('controller' => 'meseros', 'action' => 'add')); ?></li>
  </ul>
</div>
