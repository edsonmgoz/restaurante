    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('Restaurante', array('controller' => 'users', 'action' => 'login'), array('class' => 'navbar-brand')) ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php echo $this->Form->create('User', array('class' => 'navbar-form navbar-right')); ?>
            <div class="form-group">
              <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Usuario')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
            </div>
            <?php echo $this->Form->button('Acceder', array('class' => 'btn btn-success')); ?>
            <?php echo $this->Form->end(); ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido...</h1>
        <p>Le proponemos vivir de una manera distinta una comida de negocios, un evento familiar o simplemente una cena con amigos. Podemos ofrecerle diferentes menúsajustándose a las estaciones y temporadas de los productos, así como a las celebraciones tradicionales del año..</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Leer más &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Menús para grupos</h2>
          <p>Disponemos de menús para grupos, elaborados con todo detalle para que cualquier evento que celebre sea un éxito. </p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Nuestras Tentaciones</h2>
          <p>Pregunte por nuestras sugerencias, todos nuestros platos son excelentes, una auténtica tentación para los sentidos. </p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Menú de temporada</h2>
          <p>Descubra una escogida selección de platos que el chef actualiza cada temporada ajustándose a las estaciones y temporadas de los productos.</p>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Restaurante Chefcito 2015</p>
      </footer>
    </div> <!-- /container -->
