
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="bg_image">
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading"> <strong class=""><?php echo __('Login') ?></strong>

                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('User',array('class'=>'form-horizontal')); ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label"><?php echo __('Name') ?></label>
                                <div class="col-sm-9">
                                    <?php echo $this->Form->input('name',array('class'=>'form-control','label'=>false,'div'=>false)) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                     <?php echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'div'=>false)) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                     <?php echo $this->Form->input('username',array('class'=>'form-control','label'=>false,'div'=>false)) ?>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                     <?php echo $this->Form->input('password',array('class'=>'form-control','label'=>false,'div'=>false)) ?>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">Register</button>
                                    <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="panel-footer">Have an account? 
                        <?php echo $this->Html->link(__('Login here'),array('controller'=>'users', 'action'=>'login')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2015 by Deyson Bejarano</p>
      </div>
    </footer>
    <?php echo $this->Flash->render(); ?>
  </body>
</html>
