<!-- Modal -->
<div class="modal fade" id="myModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="control-label">
                ID Consulta:
              </label>
              <span>{{$c->IdConsulta}}</span>
          </div>

          <div class="form-group">
              <label class="control-label">
                Medico:
              </label>
              <span>
                 {{$c->medico->persona->Nombres .' '. $c->medico->persona->Apellidos}}
              </span>
          </div>
            <div class="form-group">
                <label class="control-label">
                  Peso:
                </label>
                <span>
                   {{$c->Peso}}
                </span>
            </div>

            <div class="form-group">
              <label class="control-label">
                Presión:
              </label>
              <span>
                 {{$c->Presion}}
              </span>
            </div>

            <div class="form-group">
              <label class="control-label">
                Padecimientos:
              </label>
              <span>
                 {{$c->Padecimiento}}
              </span>
            </div>

            <div class="form-group">
              <label class="control-label">
                Tratamiento:
              </label>
              <span>
                 {{$c->Tratamiento}}
              </span>
            </div>

            <div class="form-group">
              <label class="control-label">
                Examenes:
              </label>
              <span>
                 {{$c->Examenes}}
              </span>
            </div>  
            
            <hr>
            <h3>Enfermedades: </h3>

            <ul class="list-group">
              @foreach($c->enfermedades as $e)
                <li class="list-group-item">
                  {{'Cod. ' . $e->IdEnfermedad . ' : ' . $e->Enfermedad->Enfermedad}}
                </li>
              @endforeach
            </ul>
          </form>
          {{ $slot }}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>     
      </div>
    </div>
  </div>
</div>