<div class="modal fade modal-square " id="Modal-Eliminar-{{$areamedica->IdAreaMedica}}" tabindex="-1" role="dialog" aria-labelledby="ModalEliminar" aria-hidden="true">
	{!!Form::open(['action'=>['Administrador\AreaMedicaController@destroy', $areamedica->IdAreaMedica],'method'=>'DELETE'])!!}
		<div class="modal-dialog">
			<div class="modal-content modal-square">
				<div class="modal-header" style="background-color: #5bc0de;color:#fff;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="text-center"><i class="fa fa-trash-o fa-5x"></i></div>
					<h3  style="font-weight: bold; color:#fff;">Eliminar Area Medica</h3>
				</div>
				<div class="modal-body">					
					<h4>¿ Realmente deseas Eliminar el Area Medica: {{$areamedica->AreaMedica}} ?</h4>
				</div>
				<div class="modal-footer text-center">
					<button type="submit" class="btn btn-primary square-btn-adjust">Aceptar</button>
					<button class="btn btn-default square-btn-adjust" data-dismiss="modal" aria-hidden="true" aria-label="Close">Cancelar</button>
				</div>
			</div>		
		</div>
	{!!Form::close()!!}
</div>
