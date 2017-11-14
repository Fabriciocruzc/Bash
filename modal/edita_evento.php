<div class="modal fade bs-example-modal-sm" id="editaEvento<?php echo $dados["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title">Editando Evento</h4>
	  </div><!--fim modal-header-->
	  <div class="modal-body">
		<form method="POST" action="processa/proc_edit_evento.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
			<div class="form-group">
				<label for="titulo" class="control-label">Titulo</label>
					<input name="titulo" id="titulo" type="text" class="form-control"
					value="<?php echo utf8_encode($dados["titulo"]); ?>"
					placeholder="Titulo do Evento" autofocus required />
			</div><!--Form-Group-->
			<div class="form-group">
              <label for="dataEvento" class="control-label">Data do Evento</label>
                <input name="dataEvento" id="dataEvento"
				value="<?php echo inverteData($dados["data"]); ?>"
				type="date" class="form-control" required/>
            </div><!--Form-Group--> 	
			<hr class="divider">
			<div class="form-group">
				<button class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cancelar Evento">Cancelar</button>
			  	<button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Salvar Evento">Salvar Alteração</button>	
			</div><!--fim form-group-->
		</form>
	 </div><!--fim modal-body-->
	</div><!--fim modal-content-->
  </div><!--fim modal-dialog-->
</div><!--fim modal-->