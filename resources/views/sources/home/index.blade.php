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
                      <h5>Inicio</h5>
                      <small class="m-0">Esto es lo nuevo</small>
                  </div>
              
              </div>
          </div>
      </div>                      
@endsection

@section('search')
    @include('partes.search',['route' => 'source.provider.index'])
@endsection


@section('modal')

@endsection

@section('scripts')

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection