
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
        <?php echo $this->Session->flash();?>    
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">            
                    <div class="panel-heading"> <strong class="">Pagos con PSE </strong>

                    </div>
                    <div class="panel-body">
                        <iframe width="100%" height="700" src="<?= $result->bankURL ?>" frameborder="0"></iframe>
                    </div>
                    <div class="panel-footer">Politicas de pago</div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
