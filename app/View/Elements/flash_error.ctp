<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo __('Error!'); ?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo $message; ?></p>
      </div>
      <div class="modal-footer">
        <a href="/"><button type="button" class="btn btn-success" data-dismiss="modal">Volver a intentar</button></a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('.modal').modal('show');
  });
</script>