@extends('layouts.default')    
@section('title', 'Admin Leads')
<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link  rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">                    
                <div class="table-responsive pt-5">
                    <table class="table table-striped" id="leadsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Programa</th>                                        
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if( !empty($leads) )
                            @foreach($leads as $lead)
                                <tr>
                                    <td><strong>{{$lead->name}}</strong></td>
                                    <td><strong>{{$lead->lastname}}</strong></td>
                                    <td><strong>{{$lead->email}}</strong></td>
                                    <td><strong>{{$lead->phone}}</strong></td>
                                    <td><strong>{{$lead->career}}</strong></td>                                        
                                    <td><strong>{{$lead->state}}</strong></td>
                                    <td>                                                                                
                                        <a class="btn btn-primary" href="{{ route('leads.edit',$lead->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif                                
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>     

@stop



<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>    
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
<script>
    $(document).ready(function() {
        $('#leadsTable').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_",
                "zeroRecords": "No leads encontrados",
                "info": "Paginas _PAGE_ of _PAGES_",
                "infoEmpty": "No se encontraron items",
                "infoFiltered": "(filtrado de _MAX_ total)",
                "search":"Buscar",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
            }
        });
    } );
</script>