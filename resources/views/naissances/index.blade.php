@extends('adminlte::page')

@section('title', 'Listes des nouveaux (elles) nés (es)')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Listes des nouveaux (elles) nés (es)</h1> -->
@stop
<br>
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des naissances
                    <a href="{{route('naissances.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un nouveau (elle) né (e)
                    </a></h1>
                </div>
                <div class="card-body">
                 <!--    <a href="{{route('naissances.create')}}" class="btn btn-info mb-2">
                        <i class="fas fa-fw fa-user"></i> Ajouter un nouveau (elle) né (e)
                    </a> -->
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>N° Registre</th>
                            <th>Nom </th>
                            <th>Prénom </th>
                            <th>Date de<br> naissance </th>
                            <th>Heure de<br> naissance </th>
                            <th>Lieu de <br> naissance </th>
                            <th>Sexe </th>
                            <th>tel </th>
                            <th>Quartier </th>
                            <th>Ville </th>
                            <!-- <th style="text-align: center;"><i class="fa fa-print"> </i></th> -->
                            <th style="text-align: center;"><i class="fa fa-eye"> </i></th>
                            <th style="text-align: center;"><i class="fa fa-edit"> </i></th>
                            <!-- <th style="text-align: center;"><i class="fa fa-trash"> </i></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($naissances as $key => $naissance)
                            <tr>
                                <td>{{$naissance->id}}</td>     
                                <td>{{optional($naissance->citoyens)->cni_rgi}}</td>
                                <td>{{optional($naissance->citoyens)->nom}}</td>
                                <td>{{optional($naissance->citoyens)->prenom}}</td>
                                <td>{{optional($naissance->citoyens)->date_naissance}}</td>
                                <td>{{optional($naissance->citoyens)->heure_naissance }}</td>
                                <td>{{optional($naissance->citoyens)->lieu_naissance }}</td>
                                <td>{{optional($naissance->citoyens)->sexe }}</td>
                                <td>{{optional($naissance->citoyens)->tel }}</td>
                                <td>{{optional($naissance->citoyens)->quartier }}</td>
                                <td>{{optional($naissance->citoyens)->ville }}</td>
                               <!-- <td  style="text-align: center;">
                                    <a href="#" class="btn btn-info mb-1 border border-radius border-2 border-white" style="float:right;"  onClick="imprimer('sectionAimprimer')">
                                        <i class="fas fa-fw fa-print"></i>
                                         <i class="fa fa-user"></i>
                                    </a>
                                </td> -->
                                <td  style="text-align: center;">
                                    <a href="{{route('naissances.show', $naissance)}}" class="btn btn-success mb-1 border border-radius border-2 border-white">
                                        <i class="fa fa-eye"> </i> 
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('naissances.edit', $naissance)}}" class="btn btn-warning mb-1 border border-radius border-2 border-white">
                                        <i class="fa fa-edit"> </i> 
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                               <!--  <td  style="text-align: center;">
                                    <a href="{{route('naissances.destroy', $naissance)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger mb-1 border border-radius border-2 border-white">
                                        <i class="fa fa-trash"> </i>
                                       <i class="fa fa-user"></i> 
                                    </a>
                                </td> -->
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