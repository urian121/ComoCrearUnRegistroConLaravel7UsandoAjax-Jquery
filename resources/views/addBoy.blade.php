
<form id="form-data" method="post" action="{{ route('boyData') }}"> 
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <div class="row">
      <div class="col-md-12">
          <label for="name" class="form-label">Nombre del Niño</label>
          <input type="text" class="form-control" name="nombre" id="nombre" required='true' autofocus>
      </div>
      <div class="col-md-6 mt-2">
          <label for="year" class="form-label">Edad</label>
          <input type="number" class="form-control" name="edad" id="edad" required='true'>
      </div>

      <div class="col-md-6 mt-2">
          <label for="Sexo" class="form-label">Sexo</label>
          <fieldset class="form-group row">
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo" value="Masculino" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo" value="Femenino">
                  <label class="form-check-label" for="gridRadios2">
                    Femenino
                  </label>
                </div>
              </div>
            </fieldset>
        </div>


        <div class="col-md-12">
            <label for="fechaN" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fechaN" id="fechaN" required='true'>
        </div>


        <div class="container mt-5">
          <div class="row">
            <div class="col text-center center-block">
              <button class="btn btn-primary btn-lg btn-block" id="btnEnviarForm">Registrar Niño</button>
            </div>
          </div>
        </div>

          
    </div>
</form>


<div id="resp"> </div>