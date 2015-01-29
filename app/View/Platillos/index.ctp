<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-platillos',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>

<div id="contenedor-platillos">

	<div class="progress oculto" id="procesando">
	  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	    <span class="sr-only">100% Complete</span>
	  </div>
	</div>

	<div class="page-header">
		<h2><?php echo __('Platillos'); ?></h2>
	</div>

	<div class="row">
		<?php foreach ($platillos as $platillo): ?>
		<div class="col col-sm-3">
			<figure class="platillo">
				<?php echo $this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . '/' . 'thumb_' .$platillo['Platillo']['foto'], array('url' => array('controller' => 'platillos', 'action' => 'view', $platillo['Platillo']['id']))); ?>
			</figure>
			<br />
			<?php echo $this->Html->link($platillo['Platillo']['nombre'], array('action' => 'view', $platillo['Platillo']['id'])); ?>
			<br />
			<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
			<?php echo $this->Html->link($platillo['CategoriaPlatillo']['categoria'], array('controller' => 'categoria_platillos', 'action' => 'view', $platillo['CategoriaPlatillo']['id']), array('class' => 'food-category')); ?>
			<br />
			$ <?php echo h($platillo['Platillo']['precio']); ?>&nbsp;
			<br />
			<br />
		</div>
		<?php endforeach; ?>
	</div>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-platillos -->