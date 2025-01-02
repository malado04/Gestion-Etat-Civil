@extends('adminlte::page')

@section('title', 'Affichage mariage') 
@section('content')<br>
    <form class=" " action="{{route('mariages.edit', $mariage)}}" method="post">
        @method('PUT')
        @csrf 
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Affichage d'un mariage</i> 
                        <a href="{{route('mariages.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right; ">
                            <i class="fas fa-fw fa-plus"></i> Ajouter un mariage 
                        </a>
                        <a href="#" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;margin-right: 2%;"onClick="imprimer('sectionAimprimer')">
                            <i class="fas fa-fw fa-print"></i> Imprimer un acte de mariage 
                        </a>
                    </h3>
                </div>
               <div class="card-body">
    <div class="row">
        <div class="col-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur le mari</i></h5></legend>
                     <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Nom du Mari</label>
                        <input type="text" class="bg-white border-white form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom mariage" name="nom" value="{{optional($mariage->citoyens_h)->prenom}}"readonly>
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Prénom du Mari</label>
                        <input type="text" class="bg-white border-white form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom mariage" name="nom" value="{{optional($mariage->citoyens_h)->nom}}"readonly>
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre du Mari</label>
                        <input type="number" class="bg-white border-white form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($mariage->citoyens_h)->cni_rgi ?? old('cni_rgi')}}"readonly>
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </fieldset>
                    </div> 
        <div class="col-4">

                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-85"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur la femme </i></h5></legend>
 <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Nom de  la femme</label>
                        <input type="text" class="bg-white border-white form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom mariage" name="nom" value="{{optional($mariage->citoyens_f)->prenom}}"readonly>
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Prénom de la femme</label>
                        <input type="text" class="bg-white border-white form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom mariage" name="nom" value="{{optional($mariage->citoyens_f)->nom}}"readonly>
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre de la femme</label>
                        <input type="number" class="bg-white border-white form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($mariage->citoyens_f)->cni_rgi ?? old('cni_rgi')}}"readonly>
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                        </div>
                        <div class="col-md-4">
                </fieldset>
                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2 w-75 border border-info border-4"><h5><i><i class="img-circle  p-2 fas fa-fw fa-info border border-white"></i> Informations sur le mariage</i></h5></legend>
                    <div class="form-group">
                        <label for="exampleInputName">Date et lieu de mariage</label>
                        <input type="text" class="bg-white border-white form-control  @error('lieu_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de mariage" name="lieu_mariage" value="{{$mariage->date_mariage ?? old('date_mariage')}} à {{$mariage->lieu_mariage ?? old('lieu_mariage')}}" required="">
                        @error('lieu_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group"> 
                    <style>
                    .zoom{
                    width: 50%;
                    height: 50%;

                    }
                    .zoom:hover{
                        position: absolute;
                        z-index: 5;
                        float: left;
                    -ms-transform: scale(3) translate(30px); /* IE 9 */
                    -webkit-transform: scale(3) translate(30px); /* Safari 3-8 */
                    transform: scale(3) translate(30px);
                    }
                    </style>
                        <img src="../storage/{{ $mariage->path}}" class="zoom"><br><br>
                        <a href="../storage/{{$mariage->path}}" > Afficher la piece jointe</a>
                        @error('acte_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div>
                    </fieldset>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('mariages.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
        </div>
        <div id='sectionAimprimer' style="width:100%; font-family:times new roman ; "  >
<style type="text/css">
table {
  width: 100%;
}
/*
table{
  border: 1px solid black;
  border-collapse: collapse;
}
.td {
 border: 1px solid black;
 border-collapse: none !important;
}*/
.txt-left{
    text-align: left;
}
.txt-center{
    text-align: center;
}
.txt-right{
    text-align: right;
}
.m-t-0{
    margin-top: 0%;
}
.m-t-5{
    margin-top: 0%;
}
.m-t-10{
    margin-top: 0%;
}
.m-t-45{
    margin-top: 0%;
}

.m-l-0{
    margin-top: 0%;
}
.m-l-5{
    margin-top: 0%;
}
.m-l-10{
    margin-top: 0%;
}
.m-l-45{
    margin-top: 0%;
}

.w-50{
    width: 50%;
}
.w-75{
    width: 50%;
}
.w-100{
    width: 50%;
}
.f-left{
    float: left;
}
.f-right{
    float: right;
}
.p-1{
    padding: 1%;
}
.p-2{
    padding: 2%;
}

.txt-white{
    color: white;
    height: 200px;
}


.rotateimg180 {
  -webkit-transform:rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
</style>
<div >
    <table style="font-family: Times New Roman;">
        <tr>

            <td colspan="8" style="text-align: left; width: 100%; padding: 1%;">
                <div style="margin-left: 5%; float: left; text-align: center; width:35%;">
                    <label><b><h3>VILLE DE LOUGA</h3></b></label><br>
                    <label><b>COMMUNE D'ARRONDISSEMENT <br><br> DE LOUGA</b></label>
                </div>
                <div style="width:10%; float: left;color: white;">z</div>
                <div style="width:45%; text-align: center; float: left;">
                    <h3>REPUBLIQUE DU SENEGAL</h3>
                    <label>Un Peuple - Un But - Une Foi</label><br><br>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="8" style=" padding: 1%">
                <h3><b>Régistre N°</b> : {{$citoyen_h->cni_rgi}} / {{date('Y')}} </h3>
            </td>
        </tr>
        <tr>
            <td>
                    <h1 style="margin-left:45%">BULLETIN DE MARIAGE</h1>
                
            </td>
        </tr>
        <tr>
            <td>
                  <p style="text-align: justify;">Nous  Nom du maire de la ville<span style="font-family: Times New Roman; font-size: 15px;">  Officier de l'Etat Civil  </span>
                    <span>du centre de LOUGA...</span><br>
                    <span> Certifions que {{$citoyen_h->prenom}}  {{$citoyen_h->nom}} travaillant comme {{$citoyen_h->nom}}  né le {{$citoyen_h->date_naissance}}  à  {{$citoyen_h->lieu_naissance}}  </span><br>
                    <span>fils de {{$citoyen_h->prenom}}  et de {{$citoyen_h->prenom}}, domicilié à {{$citoyen_h->prenom}}</span>
                    et <br>
                    <span> {{$citoyen_f->prenom}} {{$citoyen_f->nom}} né le {{$citoyen_f->date_naissance}} à {{$citoyen_f->lieu_naissance}}</span><br>
                    <span>fille de {{$citoyen_h->prenom}}  et de {{$citoyen_h->prenom}}, domicilié à {{$citoyen_h->prenom}}</span>
                  </p>

                
            </td>
        </tr>
        
    </table>
</div>


    <script type="text/javascript">
        

function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
    </script>
    </div>
@stop