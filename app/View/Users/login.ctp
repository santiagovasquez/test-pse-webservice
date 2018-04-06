
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Social</title>
    <?php 
        echo $this->Html->css('bootstrap-3.3.5/css/bootstrap.min.css');
        echo $this->Html->css('custom/login_register.css');
        echo $this->Html->css('custom/app.css');
        echo $this->Html->script('libs/jquery.1.11.js');
        echo $this->Html->script('/css/bootstrap-3.3.5/js/bootstrap.min.js');
    ?>
  </head>
  <body class="bg_image">
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">            
                    <div class="panel-heading"> <strong class="">Pagos con PSE </strong>

                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('User',array('class'=>'form-horizontal','url' => array(
                                                'controller' => 'users',
                                                'action' => 'confirmarCompra'))); ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tipo de banca</label>
                                <div class="col-sm-9">
                                    <?php echo $this->Form->input('tipo',array('options' => array(
                                        'personas' => 'personas'
                                    ),'type'=>'select','class'=>'form-control','label'=>false,'div'=>false)) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Bancos </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="bancoSeleccionado" > 
                                        <?php foreach($banks as $value){ ?>
                                            <option  value="<?php echo $value->bankCode;?>"><?php echo $value->bankName;     ?></option> 
                                        <?php } ?>
                                    </select>                                   
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">Pagar</button>
                                    <button type="reset" class="btn btn-default btn-sm">Cancelar</button>
                                </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="panel-footer">Politicas de pago</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2018 by Santiago Vasquez</p>
      </div>
    </footer>
    <?php echo $this->Flash->render(); ?>
  </body>
</html>
