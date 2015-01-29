<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Cocinero'); ?>
				<fieldset>
					<legend><?php echo __('Editar Cocinero'); ?></legend>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('apellido', array('class' => 'form-control', 'label' => 'Apellido'));
					echo $this->Form->input('Platillo', array('class' => 'form-control', 'label' => 'Platillo'));
				?>
				</fieldset>
				<p>
					<?php echo $this->Form->end(array('label' => 'Editar Cocinero', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cocinero.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cocinero.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Cocineros'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Platillos'), array('controller' => 'platillos', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Platillo'), array('controller' => 'platillos', 'action' => 'add')); ?> </li>
			  </ul>
			</div>

		</div>
	</div>
</div>




<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>


	</ul>
</div>
