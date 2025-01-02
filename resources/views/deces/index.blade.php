@extends('adminlte::page')

@section('title', 'Listes des deces')

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des deces
                    <a href="{{route('deces.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un divorce 
                    </a></h1>
                </div> <br>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>N° Registre défunt</th>
                            <th>Nom  défunt</th>
                            <th>Prénom défunt</th>
                            <th>Date décé</th>
                            <th>Lieu décé</th>
                            <th>N° Registre Témoin</th>
                            <th>Nom Témoin</th>
                            <th>Prénom Témoin</th>
                            <th style="text-align: center;"><i class="fa fa-print"> </i></th>
                            <th style="text-align: center;" class="bg-info"><i class="bg danger fa fa-eye"> </i></th>
                            <th style="text-align: center;" class="bg-info"><i class="bg danger fa fa-edit"> </i></th>
                            <th style="text-align: center;" class="bg-info"><i class="bg danger fa fa-trash"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deces as $key => $dece)
                            <tr>
                                <td>{{$dece->id}}</td>
                                <td>{{optional($dece->citoyen_def)->cni_rgi}}</td>
                                <td>{{optional($dece->citoyen_def)->nom}}</td>
                                <td>{{optional($dece->citoyen_def)->prenom}}</td> 
                                <td>{{$dece->date_dece}}</td>
                                <td>{{$dece->lieu_dece}}</td>
                                <td>{{optional($dece->citoyens_tem)->cni_rgi }}</td>
                                <td>{{optional($dece->citoyens_tem)->nom }}</td>
                                <td>{{optional($dece->citoyens_tem)->prenom }}</td>
                               <!--  <td> <a href="../storage/{{$dece->certifica_dece}}">Afficher la pièce joint</a></td>
                                <td> <a href="../storage/{{$dece->cni_def}}">Afficher la pièce joint</a></td>
                                <td> <a href="../storage/{{$dece->cni_temoin}}">Afficher la pièce joint</a></td> -->
                                <td  style="text-align: center;">
                                    <a href="#" class="btn btn-info mb-1 border border-radius border-2 border-white" style="float:right;"  onClick="imprimer('sectionAimprimer')">
                                        <i class="fas fa-fw fa-print"></i>
                                        <!-- <i class="fa fa-user"></i> -->
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('deces.show', $dece)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('deces.edit', $dece)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('deces.destroy', $dece)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
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