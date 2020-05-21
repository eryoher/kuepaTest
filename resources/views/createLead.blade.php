@extends('layouts.default')    
@section('title', 'Create Lead')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Crear Contácto</div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                    <form method="POST" action="{{ route('save') }}">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <input name="lastname" type="text" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Teléfono</label>
                            <input name="phone" type="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control">
                            <input name="state" value="No Llamado" type="hidden" class="form-control">                                                    
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Programas</label>
                            <select name="career" class="form-control" >
                                <option selected >Seleccione</option>
                                <option value="Bachillerato" >Bachillerato</option>
                                <option value="Ingles">Inglés</option>
                                <option value="Preicfes" >Preicfes</option>
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
