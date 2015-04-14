<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>
				<fieldset>
					<h2><?php echo __('Nuevo Usuario'); ?></h2>
				<?php
					echo $this->Form->input('fullname', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Usuario'));
					echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña'));
					// echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Rol', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'user' => 'Usuario'), array('class' => 'form-control')));
				?>
				</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Usuario', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('Listar usuarios'), array('action' => 'index')); ?></li>
			  </ul>
			</div>
		</div>
	</div>
</div>