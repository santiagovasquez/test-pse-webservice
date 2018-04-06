<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
    echo $this->Html->css('bootstrap-3.3.5/css/bootstrap.min.css');
    echo $this->Html->css('font-awesome-4.4.0/css/font-awesome.min.css');
    echo $this->Html->css('custom/login_register.css');
    echo $this->Html->css('custom/app.css');
    echo $this->Html->script('libs/jquery.1.11.js');
    echo $this->Html->script('/css/bootstrap-3.3.5/js/bootstrap.min.js');
	?>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><?php echo $this->Html->link("Home",array('controller'=>'users','action'=>'login')) ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>	
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
	    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
