@extends('adminlte::page')

@section('title', 'Ajouter un dece')

@section('content')<br> 
    <div class="row">
  
<style>
    .fileUpload {
    cursor: pointer; /* "hand" cursor */
    max-width: : 250px;
    max-height: 250px;
  border: 2px solid #5bc0de;
}

</style>
      <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter un décé</i>
                    <a href="#" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"onClick="imprimer('sectionAimprimer')">
                        <i class="fas fa-fw fa-print"></i> Imprimer un acte de décé 
                    </a></h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                    <div class="col-md-6">
                    <fieldset class="p-3 border border-info border-4">
                    <legend style="width:50%" class="bg-info text-white p-2  w-45"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le défunt</i></h5></legend>   
                        <div class="row">
                            <div class="col-6">  
                                <div class="form-group">     
                                    <label for="exampleInputName">N° régistre du défunt</label>
                                    <input readonly  type="text" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="cni_rgi" value="{{optional($dece->citoyen_def)->cni_rgi ?? old('cni_rgi')}}" >
                                </div>   
                                <div class="form-group">     
                                    <label for="exampleInputName">Nom du défunt</label>
                                    <input readonly  type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="nom" value="{{optional($dece->citoyen_def)->nom ?? old('nom')}}" >
                                </div>   
                                <div class="form-group">     
                                    <label for="exampleInputName">Prenom du défunt</label>
                                    <input readonly  type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="prenom" value="{{optional($dece->citoyen_def)->prenom ?? old('prenom')}}" >
                                </div>  
                                <div class="form-group">  
                                    <label for="exampleInputName">CNI du défunt</label>                      
                                    <div class="input_container">
                                    <img class="fileUpload" src="../storage/{{$dece->cni_def ?? old('cni_def')}}" alt="Pas d'image">
                                    </div> 
                                </div>  
                            </div>  
                            <div class="col-md-6 ">
                                <div class="row">
                            
                                    <div class="form-group col-12">
                                        <div class="form-group">     
                                            <label for="exampleInputName">Lieu de décé</label>
                                            <input readonly  type="text" class="form-control @error('lieu_dece') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de décé" name="lieu_dece" value="{{$dece->lieu_dece ?? old('lieu_dece')}}" >
                                        </div> 
                                        <div class="form-group">     
                                            <label for="exampleInputName">Date de décé</label>
                                            <input readonly  type="text" class="form-control @error('date_dece') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de décé" name="date_dece" value="{{$dece->date_dece ?? old('date_dece')}}" >
                                        </div> 
                                    <div class="form-group col-12"><br><br><br><br>
                                        <label for="exampleInputName">Certificat de décé</label>                      
                                        <div class="input_container">
                                        <img class="fileUpload" src="../storage/{{$dece->certifica_dece ?? old('certifica_dece')}}" alt="Pas d'image">
                                    </div> 
                                    </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                </fieldset> 
                </div> 
                <div class="col-md-6">
                <fieldset class="p-3 border border-info border-4 row">
                    <legend style="width:50%" class="bg-info text-info p-2  w-45"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le témoin</i></h5></legend>    
                    <div class="form-group col-12">
                                <div class="form-group">     
                                    <label for="exampleInputName">N° régistre du témoin</label>
                                    <input readonly  type="text" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="cni_rgi" value="{{optional($dece->citoyens_tem)->cni_rgi ?? old('cni_rgi')}}" >
                                </div>   
                                <div class="form-group">     
                                    <label for="exampleInputName">Nom du témoin</label>
                                    <input readonly  type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="nom" value="{{optional($dece->citoyens_tem)->nom ?? old('nom')}}" >
                                </div>   
                                <div class="form-group">     
                                    <label for="exampleInputName">Prenom du témoin</label>
                                    <input readonly  type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="prenom" value="{{optional($dece->citoyens_tem)->prenom ?? old('prenom')}}" >
                                </div>  
                        <label for="exampleInputName">CNI du témoin</label>                        
                        <div class="input_container">
                        <img class="fileUpload" src="../storage/{{$dece->cni_temoin ?? old('cni_temoin')}}" alt="Pas d'image">
                    </div> 
                    </div> 
                  
                </fieldset>
                </div>
</div>
            </div>
                <div class="card-footer row">
                    <!-- <button type="submit" class="btn btn-info">Enregistrer un dece</button> -->
                    <a href="{{route('deces.index')}}" class="btn btn-danger">
                        Retour à l'accueil
                    </a>
                </div>
        </div>

<div id='sectionAimprimer' style="width:100%; font-family:times new roman ; "  hidden>
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
                    <h1>BULLETIN DE DECES</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="8" style=" padding: 1%">
                <h3><b>Régistre N°</b> : {{$citoyen->cni_rgi}} / {{date('Y')}} </h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" style=" padding: 1%">
                <h3> Le nommé : {{$citoyen->nom}} <span style="margin-left:25%;">{{$citoyen->prenom}}</span></h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" style=" padding: 1%">
                <h3>Est décédé le : {{$inWords->format(date('j', strtotime($dece->date_dece)))}} {{Str::lower($month_name)}} {{$inWords->format(date('Y', strtotime($dece->date_dece)))}}  </h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" style=" padding: 1%">
                <h3> A l'age de {{date('Y')-date('Y', strtotime($dece->date_dece))}} an (s) <span style="margin-left:30%;"> à {{$dece->lieu_dece}}</span></h3>
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