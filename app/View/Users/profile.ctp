

    <div class="container">
      <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <?= $this->Html->image('custom/tatto_2.jpg', array('width' => '100%')); ?>
                    </a>
                    <h1 style="background:black"><?php echo $user['User']['username']; ?></h1>
                    <p><?php echo $user['User']['email']; ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="messages.html"> <i class="fa fa-calendar"></i> Messages</a></li>
                    <li><a href="friends.html"> <i class="fa fa-edit"></i> Friends</a></li>
                    <li><a href="search.html"> <i class="fa fa-search"></i> Search</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">
          <div class="row">
            <div class="col-md-12">
            <?php echo $this->Form->create('Post');?>
              <div class="panel">
                  <form>
                      <?php echo $this->Form->input('post',array('type'=>'textarea','label'=>false,'placeholder'=>'Whats in your mind today?','rows'=>'2','class'=>'form-control input-lg p-text-area','div'=>false));?>
                  </form>
                  <div class="panel-footer">
                    <?php echo $this->Js->submit(__('Post'),array('class'=>'btn btn-danger pull-right','complete'=>'addPost(XMLHttpRequest,textStatus)','url'=>array('controller'=>'posts','action'=>'add_ajax'))); 
                    echo $this->Js->writeBuffer();
                    ?><br><br>

                  </div>
              </div>
            <?php echo $this->Form->end(); ?>
            </div>

            <!--- POSTS -->
            <div class="col-md-12">
              <div class="row" id="listpost">
                <!-- MOSTRAR PUBLICACIONES -->
                <?php foreach (array_reverse($publicaciones) as $publicacion) { ?>
                  <div class="col-md-12">
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://thevectorlab.net/flatlab/img/profile-avatar.jpg" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b><?php echo $user['User']['name']; ?></b></a>
                                    Post a message
                                </div>
                                <h6 class="text-muted time"><?php echo $this->Time->niceShort($publicacion['posts']['created']); ?></h6>
                            </div>
                        </div>
                        <div class="post-description">
                            <p><?php echo $publicacion['posts']['post']; ?></p>
                        </div>
                        <div class="post-footer">
                            <div class="input-group"> 
                                <input class="form-control" placeholder="Add a comment" type="text">
                                <span class="input-group-addon">
                                    <a href="#"><i class="fa fa-edit"></i></a>  
                                </span>
                            </div>
                            <ul class="comments-list">
                               
                            </ul>
                        </div>
                    </div>
                </div>
              <?php } ?>  
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>

    <script type="text/javascript">
    function addPost(XMLHttpRequest,textStatus){
        var result= XMLHttpRequest.responseText;
        $("#listpost").prepend(result);
    }
    </script>