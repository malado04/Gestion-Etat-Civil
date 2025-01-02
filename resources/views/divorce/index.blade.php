@extends('adminlte::page')

@section('title', 'Listes des divorces')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Listes des divorces</h1> -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des divorces
                    <a href="{{route('divorces.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un divorce 
                    </a></h1>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Certificat de divorce</th>
                            <th>Jugement de divorce</th>
                            <th>Mari</th>
                            <th>N° regisre Mari</th>
                            <th>Femme</th>
                            <th>N° regisre Femme</th>
                            <!-- <th>Dossier <br>divorce</th> -->
                            <th style="text-align: center;"><i class="fa fa-print"> </i></th>
                            <th style="text-align: center;"><i class="fa fa-eye" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-edit" aria-hidden="true"></i></th>
                            <th style="text-align: center;"><i class="fa fa-trash" aria-hidden="true"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($divorces as $key => $divorce)
                            <tr>
                                <td>{{$divorce->id}}</td>
               <!--                  <td><img style="width:15%;" src="../storage/{{$divorce->certifica_divo}}" class="zoom"></td> 
                                <td><img style="width:15%;" src="../storage/{{$divorce->jugemen_divo}}" class="zoom"></td>  -->
                                <td><a target="_blank" href="../storage/{{$divorce->certifica_divo}}"> Affichier le fichier joint</a></td> 
                                <td><a target="_blank" href="../storage/{{$divorce->jugemen_divo}}"> Affichier le fichier joint</a></td> 
                                <td>{{optional($divorce->citoyens_h)->nom}} {{optional($divorce->citoyens_h)->prenom}} </td> 
                                <td>{{optional($divorce->citoyens_h)->cni_rgi}}</td> 
                                <td>{{optional($divorce->citoyens_f)->nom}} {{optional($divorce->citoyens_h)->prenom}}</td> 
                                <td>{{optional($divorce->citoyens_f)->cni_rgi}}</td> 
                                <!-- <td>{{$divorce->path}}</td> -->
                                <td  style="text-align: center;">
                                    <a href="#" class="btn btn-info mb-1 border border-radius border-2 border-white" style="float:right;"  onClick="imprimer('sectionAimprimer')">
                                        <i class="fas fa-fw fa-print"></i>
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('divorces.show', $divorce)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('divorces.edit', $divorce)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('divorces.destroy', $divorce)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                        <!-- <i class="fa fa-user"></i> -->
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