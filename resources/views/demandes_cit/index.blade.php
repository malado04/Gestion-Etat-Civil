@extends('adminlte::page')

@section('title', 'Listes des citoyens')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Listes des citoyens</h1> -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des demandes
                    <a href="{{route('demandes.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Faire une demande pour un citoyen 
                    </a></h1>
                </div>
                <div class="card-body"> 
                        </div>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nom <br>citoyen</th>
                            <th>Prénom <br>citoyen</th>
                            <th>N° Régistre <br>citoyen</th>
                            <th>Type de demande <br></th>
                            <th>Nombre de copies<br></th>
                            <th>Description de la demande <br></th>
                            <th style="text-align: center;"><i class="fa fa-eye"> </i> </th>
                            <th style="text-align: center;"><i class="fa fa-edit"> </i> </th>
                            <th style="text-align: center;"><i class="fa fa-trash"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($demandes as $key => $demande)
                            <tr>
                                <td>{{$demande->id}}</td>
                                <td>{{ optional($demande->demande_cit)->nom }}</td>
                                <td>{{ optional($demande->demande_cit)->prenom }}</td>
                                <td>{{ optional($demande->demande_cit)->cni_rgi }}</td> 
                                <td>{{ $demande->type }}</td> 
                                <td class="text-center">{{ $demande->nmb_copies }} </td> 
                                <td>{{ $demande->description }}</td> 
                                <td  style="text-align: center;">
                                    <a href="{{route('demandes.edit', $demande)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('demandes.edit', $demande)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('demandes.destroy', $demande)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush