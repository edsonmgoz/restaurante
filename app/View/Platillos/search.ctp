<?php if($ajax != 1): ?>

    <h1>Buscar platillo</h1>
    <br>
    <div class="row">
        <?php echo $this->Form->create('Platillo', array('type' => 'GET')); ?>
        
        <div class="col-sm-4">
            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
        
  
        
        <div class="col-sm-3">
           <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
        
    </div>

    <br><br>
<?php endif; ?>

<?php if(!empty($search)): ?>

    <?php if(!empty($platillos)): ?>
    
    <div class="row">
        <?php foreach($platillos as $platillo): ?>
            <div class="col-sm-3">
                <figure class="platillo">
                    <?php echo $this->Html->image('../files/platillo/foto/' . $platillo['Platillo']['foto_dir'] . '/' . 'thumb_' . $platillo['Platillo']['foto'], array('url' => array('controller' => 'platillos', 'action' => 'view', $platillo['Platillo']['id']))); ?>
                </figure>
                <br>
                <?php echo $this->Html->link($platillo['Platillo']['nombre'], array('action' => 'view', $platillo['Platillo']['id'])); ?>
                <br>
                $ <?php echo $platillo['Platillo']['precio'] ;?>
                <br><br>
            </div>
        <?php endforeach; ?>
    </div>
    <br><br><br>
    
    <?php else: ?>
    
    <h3>No se encontró el platillo que busca :-( </h3>
    
    <?php endif; ?>

<?php endif; ?>