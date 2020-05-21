@extends('layouts.default')    
@section('title', 'Edit Lead')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de contácto</div>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                    <form method="POST" action="{{ route('leads.update',$lead->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input name="name" type="text" class="form-control" value="{{ $lead->name }}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <input name="lastname" type="text" class="form-control" value="{{ $lead->lastname }}">                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Teléfono</label>
                            <input name="phone" type="tel" class="form-control" value="{{ $lead->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" value="{{ $lead->email }}">
                                                    
                        </div>
                        <div class="form-group">
                            <label>Programas</label>
                            <select name="career" class="form-control" value="{{ $lead->career }}" >
                                <option value="" >Seleccione</option>
                                <option value="Bachillerato"<?=$lead->career == 'Bachillerato' ? ' selected="selected"' : '';?>>Bachillerato</option>
                                <option value="Ingles"<?=$lead->career == 'Ingles' ? ' selected="selected"' : '';?>>Inglés</option>                                
                                <option value="Preicfes"<?=$lead->career == 'Preicfes' ? ' selected="selected"' : '';?>>Preicfes</option>                                                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <select name="state" class="form-control">
                                <option value="" >Seleccione</option>
                                <option value="No Llamado"<?=$lead->state == 'No Llamado' ? ' selected="selected"' : '';?>>Pendiente Por llamar</option>
                                <option value="contactado"<?=$lead->state == 'contactado' ? ' selected="selected"' : '';?>>Contactado</option>                                                                
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@stop  
