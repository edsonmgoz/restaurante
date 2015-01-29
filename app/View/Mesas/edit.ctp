<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Mesa', array('role' => 'form', 'novalidate')); ?>
				<fieldset>
					<h2><?php echo __('Editar Mesa'); ?></h2>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('serie', array('class' => 'form-control', 'label' => 'Serie'));
					echo $this->Form->input('puestos', array('class' => 'form-control', 'label' => 'Puestos'));
					echo $this->Form->input('posicion', array('class' => 'form-control', 'label' => 'Posicion'));
					echo $this->Form->input('mesero_id', array('class' => 'form-control', 'label' => 'Mesero'));
				?>
				</fieldset>
				<p>
					<?php echo $this->Form->end(array('label' => 'Editar Mesa', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mesa.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Mesa.id'))); ?></li>
			    <li><?php echo $this->Html->link(__('List Mesas'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
			    <li><?php echo $this->Html->link(__('List Meseros'), array('controller' => 'meseros', 'action' => 'index')); ?></li>
			    <li><?php echo $this->Html->link(__('New Mesero'), array('controller' => 'meseros', 'action' => 'add')); ?></li>
			  </ul>
			</div>

		</div>
	</div>
</div>




