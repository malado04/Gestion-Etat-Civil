@extends('adminlte::page')
@section('title', 'Listes des citoyens')

@section('content_header')
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des citoyens
                    <a href="{{route('citoyens.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un citoyen 
                    </a></h1>
                </div>

                <div class="card-body">
                    <table class="text-center table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>N° Registre</th>
                            <th>Nom </th>
                            <th>Prénom </th>
                            <th>Date naissance </th>
                            <th>Lieu naissance </th>
                            <th>Sexe </th>
                            <th>tel </th>
                            <th>Quartier </th>
                            <th>Ville </th>
                            <!-- <th>Nationalite </th> -->
                            <!-- <th>CNI père </th> -->
                            <!-- <th>CNI mère </th>  -->
                            <th style="text-align: center;"><i class="fa fa-print"> </i></th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-eye"></i></th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-edit"></i></th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($citoyens as $key => $citoyen)
                            <tr>
                                <td>{{$citoyen->id}}</td>
                                <td>{{$citoyen->cni_rgi}}</td>
                                <td>{{$citoyen->nom}}</td>
                                <td>{{$citoyen->prenom}}</td>
                                <td>{{$citoyen->date_naissance}}</td>
                                <td>{{$citoyen->lieu_naissance }}</td>
                                <td>{{$citoyen->sexe }}</td>
                                <td>{{$citoyen->tel }}</td>
                                <td>{{$citoyen->quartier }}</td>
                                <td>{{$citoyen->ville }}</td>
                                <!-- <td>{#{$citoyen->nationalite}}</td> -->
                                <!-- <td>{#{$citoyen->nni_pere}}</td> -->
                                <!-- <td>{#{$citoyen->nni_mere}}</td>  -->
                                <td  style="text-align: center;">
                                    <a href="{{url('citoyens/print', $citoyen)}}" class="btn btn-success btn-xs">
                                        <i class="fas fa-fw fa-print"></i>
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('citoyens.show', $citoyen)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('citoyens.edit', $citoyen)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('citoyens.destroy', $citoyen)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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