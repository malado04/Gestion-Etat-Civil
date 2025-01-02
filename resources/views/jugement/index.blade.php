@extends('adminlte::page')

@section('title', 'Jugements')

@section('content_header')
    <h1 class="m-0 text-info"><b><i>Jugements >>> </i></b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="m-0 text-black">Listes des jugements
                    <a href="{{route('jugements.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un jugement 
                    </a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Certificat de non inscription</th>
                            <th>Certificat d'accouchement</th>
                            <th>Certificat de témoin</th>
                            <th>Fiche de vaccination</th>
                            <th style="text-align: center;"><i class="fa fa-eye" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-edit" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-trash" aria-hidden="true"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jugements as $key => $jugement)
                            <tr>
                                <td>{{$jugement->id}}</td>
                                <td> <a href="storage/{{$jugement->certificat_non}}"> Afficher la pièce jointe</a></td>
                                <td> <a href="storage/{{$jugement->certificat_daccouchement}}"> Afficher la pièce jointe</a></td>
                                <td> <a href="storage/{{$jugement->certificat_temoin}}"> Afficher la pièce jointe</a></td> 
                                <td> <a href="storage/{{$jugement->fiche_vacc}}"> Afficher la pièce jointe</a></td> 
                                <!-- <td>{{$jugement->path}}</td> -->
                                <td  style="text-align: center;">
                                    <a href="{{route('jugements.show', $jugement)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('jugements.edit', $jugement)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('jugements.destroy', $jugement)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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