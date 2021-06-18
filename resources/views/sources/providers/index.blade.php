@extends('layouts.base')

@section('content') 
    @if(session('alert_message'))
        <div class="alert alert-{{ session('alert_class') }}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('alert_message') }}
        </div>
    @endif
        <div class="row">
              <div class="col-12" >
                <div class="card">
                    <div class="card-header">
                        <h5>Proveedores</h5>
                        <small class="m-0">Listado de proveedores</small>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($data as $key => $d)  
                            <li class="list-group-item d-md-flex d-block justify-content-between">
                                    <p id="{{$d->id}}name" class="m-auto col-md-8 col-12 text-center text-md-start fs-4" style="font-size: 1rem; font-weight: 500;">{{ $d->name }}</p>
                                    <input id="{{$d->id}}" type="hidden" class="m-0 col-8" style="font-size: 1rem; font-weight: 500;" value="{{ $d->name }}">
                                    <input id="{{$d->id}}-Short" type="hidden" class="m-0 col-8" style="font-size: 1rem; font-weight: 500;" value="{{ $d->short_name }}">
                                    <div class="col-12 col-md-4 text-center flex-row-reverse d-inline-flex">                               
                                        <button class="btn btn-light m-1 p-sm-2 p-lg-2 col-6 col-md-3" onclick="confirmation({{$d->id}})" data-bs-toggle="modal" data-bs-target="#ConfirmationModal"><i class="fa fa-trash-alt fs-5 px-1"></i></button>                                                                    
                                        <button class="btn btn-light m-1 p-sm-2 p-lg-2 col-6 col-md-3" onclick="formeditprovider({{$d->id}})" data-bs-toggle="modal" data-bs-target="#modalMC"><i class="fa fa-edit fs-5 px-1"></i></button>
                                    </div>
                            </li>                             
                            @endforeach                            
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center ">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>                      

@endsection

@section('search')
    @include('partes.search',['route' => 'source.provider.index'])
@endsection


@section('modal')
    <div class="modal fade" id="modalMC" tabindex="-1" aria-labelledby="modalMC" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalMC">Proveedores</h5> 
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-6 m-auto">
                            <div class="row">
                                <div class="col-12" id="formulario-modal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmationModalLabel">¿Desea eliminar este proveedor?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a class="btn btn-primary" id="confirm-modal-a">Si</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@if (count($errors)>0)
    <script type="text/javascript">
        window.onload = function() {
            dash = "{{old('ide')}}" ;
            if(dash == ''){
                modald();
            }else{
                formeditprovider({{old('ide')}})
            }
            myModal.show();
        }
    </script>
    <script type="text/javascript"> 
        var myModal = new bootstrap.Modal(document.getElementById('modalMC'));
        //myModal.show();
    </script>
@endif

<script>
    modald();
    var mod = document.getElementById("target-mod");
    mod.setAttribute("onclick", "modald()");
function modald() {
    document.getElementById("formulario-modal").innerHTML=`
    <form onsubmit="validationjs()" action="{{ route('source.provider.create') }}" method="POST" autocomplete="off">
        @csrf
        <div class="form-group">
            <label class="form-label" >Nombre corto</label>
            <input  class="form-control @error('short_name') is-invalid @enderror" id="short_name" name="short_name" placeholder="Nombre corto" value="{{old('short_name')}}" required>
            @error('short_name')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
            <span id="errors2"></span>
        </div>
        <div class="form-group">
            <label class="form-label" >Nombre</label>
            <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre" value="{{ old('name') }}" required>
            @error('name')<small id="" class="form-text text-muted">{{ $message }}</small>@enderror
        </div>
        <input type="hidden" name="ide" value="{{old('ide')}}">
        <span id="errors"></span>
        <div class="float-lg-end float-md-none text-center">
            <button type="submit" class="btn btn-primary" id="add-act">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
        </form>                                            
    `
    
}

function formeditprovider(ide){
    name = document.getElementById(ide).value
    sname = document.getElementById(ide + "-Short").value
    document.getElementById("formulario-modal").innerHTML= `
    <form id="edit-oc" onsubmit="validationjs()" action="update/${ide}" method="POST" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="form-label">Nombre corto</label>
            <input  class="form-control @error('short_name') is-invalid @enderror" id="short_name" name="short_name" value="${sname}" placeholder="Nombre corto" required>
            @error('short_name')<small class="form-text text-mute ">{{ $message }}</small>@enderror
            <span id="errors2"></span>
            </div>
            <div class="form-group">
                <label class="form-label" >Nombre</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="${name}" placeholder="Nombre" required>
                @error('name')<small id="" class="form-text text-muted">{{ $message }}</small>@enderror
                </div>
                <input type="hidden" name="ide" value="${ide}">
                <span id="errors"></span>
        <div class="float-lg-end float-md-none m-auto text-center">
            <button type="submit" class="btn btn-primary" id="add-act">Actualizar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    `
}

function confirmation(aidi){
    document.getElementById("confirm-modal-a").setAttribute("href", "delete/" + aidi);
}
function validationjs(){
    var shortV = document.getElementById("short_name")
    var nameV = document.getElementById("name")
    var error = document.getElementById("errors")
    var error2 = document.getElementById("errors2")    

    nameV.style.border = "1px solid green"
    shortV.style.border = "1px solid green"
    error.innerHTML = ""
    error2.innerHTML = ""
    
    if(shortV.value.length > 5 || shortV.value.length < 3 ){
        shortV.style.border = "1px solid red"
        error2.innerHTML += `<p style="color:red;">El valor de short name debe ser mayor que 3 o menor que 5</p>`  
        event.preventDefault();
    }
    if(nameV.value.length > 50){
        nameV.style.border = "1px solid red"
        error.innerHTML += `<p style="color:red;">El valor de name debe ser menor que 50</p>`  
        event.preventDefault();
    }
}

</script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection