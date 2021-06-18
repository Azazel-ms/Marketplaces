@extends('layouts.base')

@section('content')	
		<div class="row">
			  <div class="col-12 offset-0" >
                <div class="card">
                    <div class="card-header">                    
                        <h5>Items</h5>
                        <small class="m-0">Listado de items</small>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            
                        	@foreach ($data as $key => $d)
                            @if ($d->provider == true)
                                <li class="list-group-item d-md-flex d-block justify-content-between">
                                    <p class="m-auto col-md-4 col-12 text-center text-md-start fs-4" style="font-size: 1rem; font-weight: 500;">{{ $d->ean }}</p>
                                    <p class="m-md-auto my-3  text-secondary col-md-4 col-12 text-md-start text-center" style="font-size: .7rem; font-weight: 700;">{{ $d->provider->name}}</p>
                                    <div class="col-12 col-md-4 text-center flex-row-reverse d-inline-flex">                               
                                        <button class="btn btn-light m-1 p-sm-2 p-lg-2 col-6 col-md-3" data-bs-toggle="modal" data-bs-target="#ConfirmationModal"><i class="fa fa-trash-alt fs-5 px-1"></i></button>                                                                    
                                        <button class="btn btn-light m-1 p-sm-2 p-lg-2 col-6 col-md-3" data-bs-toggle="modal" data-bs-target="#modalMC"><i class="fa fa-edit fs-5 px-1"></i></button>
                                    </div>
                                </li>                   
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
		</div>			
@endsection

@section('search')
    @include('partes.search',['route' => 'source.item.index'])
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
                                                <label class="form-label" >Codigo de barras</label>
                                                <input type="number" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Codigo de barras" value="{{old('barcode')}}">
                                                @error('barcode')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">BUSCAR</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
@if (count($errors)>0)  
    <script type="text/javascript"> 
        var myModal = new bootstrap.Modal(document.getElementById('modalMC'));
        myModal.show();
    </script>
@endif
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection