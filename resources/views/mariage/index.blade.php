@extends('adminlte::page')

@section('title', 'Listes des mariages')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Listes des mariages</h1> -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des mariages
                    <a href="{{route('mariages.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un mariage 
                    </a></h1>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Lieu demariage</th>
                            <th>Date de mariage</th>
                            <th>Mari</th>
                            <th>N° regisre Mari</th>
                            <th>Femme</th>
                            <th>N° regisre Femme</th>
                            <!-- <th>Dossier <br>mariage</th> -->
                            <th style="text-align: center;"><i class="fa fa-print"> </i></th>
                            <th style="text-align: center;"><i class="fa fa-eye" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-edit" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-trash" aria-hidden="true"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mariages as $key => $mariage)
                            <tr>
                                <td>{{$mariage->id}}</td>
                                <td>{{$mariage->lieu_mariage}}</td>
                                <td>{{$mariage->date_mariage}}</td>
                                <td>{{optional($mariage->citoyens_h)->nom}} {{optional($mariage->citoyens_h)->prenom}}</td> 
                                <td>{{optional($mariage->citoyens_h)->cni_rgi}}</td> 
                                <td>{{optional($mariage->citoyens_f)->nom}} {{optional($mariage->citoyens_h)->prenom}}</td> 
                                <td>{{optional($mariage->citoyens_f)->cni_rgi}}</td> 
                                <td  style="text-align: center;">
                                    <a href="#" class="btn btn-info mb-1 border border-radius border-2 border-white" style="float:right;"  onClick="imprimer('sectionAimprimer')">
                                        <i class="fas fa-fw fa-print"></i>
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <!-- <td>{{$mariage->path}}</td> -->
                                <td  style="text-align: center;">
                                    <a href="{{route('mariages.show', $mariage)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('mariages.edit', $mariage)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('mariages.destroy', $mariage)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
<div id='sectionAimprimer' style="width:100%; font-family:times new roman ;" >
    
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

function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
@endpush