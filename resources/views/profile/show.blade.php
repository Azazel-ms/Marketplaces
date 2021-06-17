@extends('layouts.base')

@section('content')
    <div>
        <div class="row">
            <div class="col-12" >
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="card">
                        <div class="card-header">
                            <h5>Informacion del Perfil</h5>
                            <small class="m-0">Datos personales</small>
                        </div>
                        <div class="card-body">
                            {{-- Falta poner la imagen de foto de perfil --}}
                            <form action="">
                                <input type="file" class="d-none">

                                <div class="col-6 col-sm-4 my-2">    
                                    <label class="form-label" for="name">Nombre</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $user->name }}">
                                </div>

                                <div class="col-6 col-sm-4 my-2">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                                </div>

                                <div class="col-6 col-sm-4 my-2">
                                    <label class="form-label" for="name">Contraseña Actual</label>
                                    <input type="text" class="form-control" name="email" placeholder="******">
                                </div>

                                <div class="col-6 col-sm-4 my-2">
                                    <label class="form-label" for="name">Contraseña Nueva</label>
                                    <input type="text" class="form-control" name="email" placeholder="******">
                                </div>

                                <div class="col-6 col-sm-4 my-2">
                                    <label class="form-label" for="name">Confirmar Contraseña Nueva</label>
                                    <input type="text" class="form-control" name="email" placeholder="******">
                                </div>
                                <button class="btn btn-primary my-2" type="submit">Actualizar</button>
                            </form>
                        </div>
                    </div>             
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5>Sesiones Actuales</h5>
                        <small class="m-0">Donde iniciaste sesion</small>
                    </div>
                    <div class="card-body">            
                        {{-- @if (count($sessions) > 0)
                            <div class="mt-5 space-y-6">
                                <!-- Other Browser Sessions -->
                                @foreach ($sessions as $session)
                                    <div class="flex items-center">
                                        <div>
                                            @if ($session->agent->isDesktop())
                                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $session->ip_address }},

                                                    @if ($session->is_current_device)
                                                        <span class="text-success font-semibold">Este dispositivo</span>
                                                    @else
                                                        {{ __('Last active') }} {{ $session->last_active }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif --}}
                            <button class="btn btn-primary my-2" type="submit">Cerrar sesion en otros dispositivos</button>
                    </div>
                </div>  

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-jet-section-border />
                    <div class="card">
                        <div class="card-header">
                            <h5>¿Deseas eliminar tu cuenta?</h5>
                            <small class="m-0">Esto eliminara todos tus datos pero no se borraran los registros que agregaste</small>
                        </div>
                        <div class="card-body"> 
                            <div class="mt-10 sm:mt-0">
                                <button class="btn btn-danger">Eliminar Cuenta</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
