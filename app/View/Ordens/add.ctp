<div class="container">
	<div class="row">
		<div class="col-md-6">
            <?php echo $this->Form->create('Orden', array('role'=> 'form')); ?>
			<fieldset>
				<h2>Procesar Orden</h2>
                <?php
                    echo $this->Form->input('cliente', array('class' => 'form-control', 'label' => 'Cliente'));
                    echo $this->Form->input('dni', array('class' => 'form-control', 'label' => 'DNI'));
                    echo $this->Form->input('mesa_id', array('class' => 'form-control', 'label' => 'Mesa'));
                ?>
			</fieldset>
			<h3>Pedidos: </h3>
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Platillo</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>
			</thead>
			<tbody>
            <?php foreach($orden_item as $item): ?>
			<tr>
				<td><?php echo $item['Platillo']['nombre']; ?></td>
				<td><?php echo $item['Platillo']['precio']; ?></td>
				<td><?php echo $item['Pedido']['cantidad']; ?></td>
				<td><?php echo $item['Pedido']['subtotal']; ?></td>
			</tr>
            <?php endforeach; ?>
			</tbody>
			</table>
			<p>
				<span class="total">Total Orden:</span>
				<span id="total" class="total">
					$ <?php echo $mostrar_total_pedidos; ?>
				</span>
				<br />
				<br />
                <?php echo $this->Form->input('total',array('type' => 'hidden', 'value' => $mostrar_total_pedidos)); ?>
                <?php echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-success')); ?>
				
			</p>
		</div>
	</div>
</div>


