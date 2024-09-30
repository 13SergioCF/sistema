@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="m-0 text-dark">Usuarios</h1>
@stop

@section('content')
    <div class="row mb-2">
        <div class="col-6 text-left">
            <a class="btn btn-primary" onclick="agregar()">agregar</a>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-danger" href="{{route('usuario.index',0)}}">eliminados</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card {{ config('adminlte.classes_index', '') }}">
                <div class="card-body ">
                    <h1 class="card-title {{ config('adminlte.classes_index_header', '') }} ">LISTA DE USUARIOS</h1> 
                </div>
                <div class="card-header">
                    <table id="example1" class="table table-responsive-xl table-bordered table-sm table-hover table-striped"  >
                      <thead>
                          <tr>  
                            <th width="5%"> # </th>
                            <th width="20%">Usuario</th>
                            <th width="40%">Correo</th>
                            <th width="15%">Rol</th>
                            <th width="10%"><span class="badge bg-primary">Estado</span></th>
                            <th width="10%">Acción</th>
                          </tr>
                      </thead>  
                      <tfoot>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_agregar" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" data-gtm-vis-first-on-screen-2340190_1302="5621" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header {{ config('adminlte.classes_index_modal_agregar','') }}">
              <h5 class="modal-title">Registrar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
              </button>
            </div>
            <div id="frm" class="modal-body">
                <form id="frm_agregar" name="frm_agregar"  method="POST" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label> 
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="INGRESE SU NOMBRE" aria-describedby="nombre-error" aria-invalid="true"/>
                                <span id="nombre-error" class="error invalid-feedback" style="display: none;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="correo">Correo</label> 
                                <input class="form-control" id="correo" name="correo" type="text" placeholder="INGRESE SU EMAIL" aria-describedby="correo-error" aria-invalid="true"/>
                                <span id="correo-error" class="error invalid-feedback" style="display: none;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="password">Contraseña</label> 
                            <input class="form-control" id="password" name="password" type="password" placeholder="INGRESE SU CONTRASEÑA" aria-describedby="password-error" aria-invalid="true"/>
                            <span id="password-error" class="error invalid-feedback" style="display: none;"></span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label> 
                            <input class="form-control" id="password_confirmation"  name="password_confirmation" type="password"  placeholder="CONFIRME SU CONTRASEÑA" aria-describedby="password_confirmation-error" aria-invalid="true" /> 
                            <span id="password_confirmation-error" class="error invalid-feedback" style="display: none;"></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="select2-primary">
                              <label for="id_rol">Seleccione su rol </label>
                              <select  class="select2 select2-hidden-accessible" id="id_rol" name="id_rol[]" multiple="multiple" data-placeholder="Seleccione los roles" aria-describedby="id_rol-error" aria-invalid="true" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true"> 
                              </select> 
                              <span id="id_rol-error" class="error invalid-feedback" style="display: none;"></span>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a type="button" id="next" name="next"  class="btn btn-success">Guardar</a>
                <a type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
        </div>
    </div>


    <div class="modal fade" id="modal_editar" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" data-gtm-vis-first-on-screen-2340190_1302="5621" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header {{ config('adminlte.classes_index_modal_editar','') }}">
            <h5 class="modal-title">Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">×</span>
            </button>
          </div>
          <div id="frm2" class="modal-body">
              <form id="frm_editar" name="frm_editar"  method="POST" novalidate="novalidate">
                  @csrf
                  <input type="hidden" id="id_registro" name="id_registro"  >
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Mnombre">Nombre</label> 
                              <input class="form-control" disabled id="Mnombre" name="Mnombre" type="text" placeholder="INGRESE SU NOMBRE" aria-describedby="Mnombre-error" aria-invalid="true"/>
                              <span id="Mnombre-error" class="error invalid-feedback" style="display: none;"></span>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="Mcorreo">Correo</label> 
                              <input class="form-control" disabled id="Mcorreo" name="Mcorreo" type="text" placeholder="INGRESE SU EMAIL" aria-describedby="Mcorreo-error" aria-invalid="true"/>
                              <span id="Mcorreo-error" class="error invalid-feedback" style="display: none;"></span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="select2-primary">
                            <label for="Mid_rol">Seleccione su rol</label>
                            <select  class="select2 select2-hidden-accessible" id="Mid_rol" name="Mid_rol[]" multiple="multiple" data-placeholder="Seleccione los roles" aria-describedby="Mid_rol-error" aria-invalid="true" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true"> 
                            </select> 
                            <span id="Mid_rol-error" class="error invalid-feedback" style="display: none;"></span>
                          </div>
                      </div>    
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <a type="button" id="next2" name="next2"  class="btn btn-success">Actualizar</a>
              <a type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</a>
          </div>
        </div>
      </div>
    </div>
    
    
   

@stop

@section('js')

<script>
    $('#example1').DataTable({ 
      language: {"url": "vendor/adminlte/Spanish.json"},
      destroy: true,
      retrieve: true,
      serverSide: true,
      autoWidth: false,
      responsive: true,
      ajax: "{{route('usuario.datos',1)}}",
      columns: [
          {data: 'id',searchable: false,orderable: false},
          {data: 'name',searchable: true},
          {data: 'email',searchable: true},
          {data: 'rol_uso',searchable: false},
          {data: 'estado',searchable: false},
          {data: 'actions',searchable: false,orderable: false}
      ],
    });
</script>
<script>
    
  
    function agregar(){
      clear_frm_agregar();
      $('#modal_agregar').modal('show');
      $('#id_rol').select2();
      cargar_roles();
    }

    function almacenar(){
      var link="{{route('usuario.store')}}";
      $.ajax({
          url: link,
          type: "POST",
          processData: false,
          contentType: false,
          data: new FormData($('#frm_agregar')[0]),    
          success:function(response){
            if (response.error==1){
                  toastr.error(response.mensaje, 'Guardar Registro', {timeOut:5000});
               }else{
                  toastr.success('El registro fue guardado correctamente.', 'Guardar Registro', {timeOut:3000}); 
                  $('#modal_agregar').modal('hide');
                  $("#example1").DataTable().ajax.reload();
               }
          }
      })
    }

    function Modificar(id){
      $.ajax({
        url:"{{asset('')}}"+"usuario/show/"+id, dataType:'json',
        success: function(resultado){
          $("#id_registro").val(resultado.user.id);
          $("#Mnombre").val(resultado.user.name); 
          $("#Mcorreo").val(resultado.user.email);
          $('#Mid_rol').select2();
          $('#Mid_rol').empty();
          resultado.roles.forEach(function(elemento, indice, array) {
            var sw=0;
            for (let i = 0; i < resultado.user.roles.length; i++) {
              if (elemento.id === resultado.user.roles[i].id){
                  sw=1;
              }
            }

            if(sw==1) {
                $('#Mid_rol').append($('<option  />', {
                  text: elemento.name,
                  value: elemento.id,
                  selected: true,
                }));
            }else{
              $('#Mid_rol').append($('<option  />', {
                  text: elemento.name,
                  value: elemento.id,  
              }));
            }
                
          });
          $('#modal_editar').modal('show');
        }
      });
    }

    function actualizar(){
      var id = $("#id_registro").val();
      var link="{{asset('')}}"+"usuario/update/"+id;
      $.ajax({
          url: link,
          type: "POST",
          processData: false,
          contentType: false,
          data: new FormData($('#frm_editar')[0]),    
          success:function(response){
            if (response.error==1){
                  toastr.error(response.mensaje, 'Guardar Registro', {timeOut:5000});
               }else{
                  toastr.success('El registro fue actualizado correctamente.', 'Guardar Registro', {timeOut:3000}); 
                  $('#modal_editar').modal('hide');
                  $("#example1").DataTable().ajax.reload();
               }
          }
      })
    }
  

    function cargar_roles(){
        $.ajax({ 
          url:"{{route('rol.datos',3)}}" , dataType:'json',
            success: function(resultado){
              $('#id_rol').empty(); // limpiar antes de sobreescribir
                resultado.forEach(function(elemento, indice, array) {
                 $('#id_rol').append($('<option  />', {
                 text: elemento.name,
                 value: elemento.id,
                 }));
              });
            }
        });      
    }
  
    function Eliminar(id){
      Swal.fire({
        title: '¿Está seguro?',
        text: "¡El registro cambiara a estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Estoy seguro!'
      }).then((result) => {
        if (result.isConfirmed) {
          var link="{{asset('')}}"+"usuario/destroy/"+id;
            $.ajax({
                url: link,
                type: "GET",
                cache: false,
                async: false,
                success:function(response){
                }
            })

          Swal.fire(
            '¡Eliminado!',
            'Su registro ha sido inhabilitado.',
            'De acuerdo'
          )
          $("#example1").DataTable().ajax.reload();
        }
      })
    }


    $('#frm_agregar').validate({
        rules: {
          nombre: {
            required: true,
            minlength: 3
          },
          correo: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          },
          password_confirmation: {
            required: true,
            equalTo: "#password"
          },

        },
        messages: {
          nombre: {
            required: "Por favor, introduzca su nombre",
            minlength: "Minimo 3 caracteres"
          },
          correo: {
            required: "Por favor, dato requerido",
            email: "Correo email no valido"
          },
          password: {
            required: "Por favor, introduzca su contraseña",  
            minlength: "Minimo 5 caracteres"
          },
          password_confirmation: {
            required: "Por favor, es necesario su confirmacion",
            equalTo: "No coinsiden las contraseñas"
          },
          
        },
        errorElement: 'span',
        
        errorPlacement: function (error, element) {
           error.addClass('invalid-feedback');
           element.closest('.form-group').append(error);  
        },
        
        highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid').addClass( "is-valid" );
        }               
      
    });

    $('#frm_editar').validate({
        rules: {
          Mid_rol: {
            required: true,
          }
        },
        messages: {
          Mid_rol: {
            required: "Por favor, es necesario un rol minimo",
          }
        },
        errorElement: 'span',
        
        errorPlacement: function (error, element) {
           error.addClass('invalid-feedback');
           element.closest('.form-group').append(error);  
        },
        
        highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid').addClass( "is-valid" );
        }               
      
    });
    
    $("#next").click(function(){  // capture the click
        if($("#frm_agregar").valid())  // test for validity
        {
          almacenar();
        }
    });  

    $("#next2").click(function(){  // capture the click
        if($("#frm_editar").valid())  // test for validity
        {
          actualizar();
          //actualizar(1);
        }
    });  

   
</script>




        
@stop