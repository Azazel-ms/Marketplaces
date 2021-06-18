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
@endsection

@section('search')
    @include('partes.search',['route' => 'source.provider.index'])
@endsection


@section('modal')
    <div class="modal fade" id="modalMC" tabindex="-1" aria-labelledby="modalMC" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalMC">Items</h5> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="" action="{{ route('source.item.create') }}" autocomplete="off" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Selecciona tu proveedor</label>
                                                <select class="form-select @error('source_provider') is-invalid @enderror" id="provider" name="provider">
                                                    <option value="" selected>Seleccionar...</option>
                                                    <option value="2">Mercado Libre</option>
                                                    <option value="1">Ice Cat</option>
                                                </select>
                                                @error('source_provider')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Nombre</label>
                                                <input type="number" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Codigo de barras" value="{{old('barcode')}}">
                                                @error('source_provider')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Tipo de dato</label>
                                                <select class="form-select @error('source_provider') is-invalid @enderror" id="provider" name="provider">
                                                    <option value="" selected>Seleccionar...</option>
                                                    <option value="1">Texto</option>
                                                    <option value="2">Checkbox</option>
                                                    <option value="3">Numero</option>
                                                    <option value="4">Button</option>
                                                    <option value="5">Color</option>
                                                    <option value="6">Date</option>
                                                    <option value="7">Email</option>
                                                    <option value="8">Datetime-local</option>
                                                    <option value="9">File</option>
                                                    <option value="10">Image</option>
                                                    <option value="11">Month</option>
                                                    <option value="12">Number</option>
                                                    <option value="13">Password</option>
                                                    <option value="14">Radio</option>
                                                    <option value="15">Rango</option>
                                                    <option value="16">Tel</option>
                                                    <option value="17">Time</option>
                                                    <option value="18">Url</option>
                                                </select>
                                                @error('source_provider')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Tamaño Maximo</label>
                                                <input type="number" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Codigo de barras" value="{{old('barcode')}}">
                                                @error('source_provider')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Descripción</label>
                                                <input type="number" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Codigo de barras" value="{{old('barcode')}}">
                                                @error('source_provider')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                            </div>
                                            
                                            <div class="float-lg-end float-md-none text-center">
                                                <button type="submit" class="btn btn-primary" id="add-act">Agregar</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection