@extends('adminlte::page')

@section('title', 'Affichage citoyen') 
@section('content')<br>
    <form action="{{route('citoyens.edit', $citoyen)}}" method="post">
        @method('PUT')
        @csrf 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Affichage d'un citoyen</i>
                    <a href="#" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"onClick="imprimer('sectionAimprimer')">
                        <i class="fas fa-fw fa-print"></i> Imprimer un acte de naissance 
                    </a></h3>
                </div>
               <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <fieldset class="p-3 border border-info border-4">
                            <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur le citoyen</i></h5></legend>
                            <div class="row">
                                <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Nom</label>
                                <input type="text" class="bg-white border-white form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom citoyen" name="nom" value="{{$citoyen->nom ?? $citoyen->nom ?? old('nom')}}"readonly>
                                @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Prénom</label>
                                <input type="text" class="bg-white border-white form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom citoyen" name="prenom" value="{{$citoyen->prenom ?? old('prenom')}}"readonly>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Sexe</label>
                                <select class="bg-white border-white form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{$citoyen->sexe ?? old('sexe')}}"readonly>
                                    <optgroup> <label>Sexe</label>
                                         <option value="M">Masculin</option><br>
                                        <option value="F">Féminin</option>
                                    </optgroup>
                                </select> 
                                @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                            <div class="form-group"> 
                                <label for="exampleInputName"><i class="fas fa-user"></i> Date de naissance</label>
                                <input type="date" class="bg-white border-white form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{$citoyen->date_naissance ?? old('date_naissance')}}"readonly>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Lieu de naissance</label>
                                <input type="text" class="bg-white border-white form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" name="lieu_naissance" value="{{$citoyen->lieu_naissance ?? old('lieu_naissance')}}"readonly>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                                </div>
                                <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> N° de Registre</label>
                                <input type="number" class="bg-white border-white form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{$citoyen->cni_rgi ?? old('cni_rgi')}}"readonly>
                                @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Tel</label>
                                <input type="number" class="bg-white border-white form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{$citoyen->tel ?? old('tel')}}"readonly>
                                @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputEmail"><i class="fas fa-user"></i> Email address</label>
                                <input type="email" class="bg-white border-white form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$citoyen->email ?? old('email')}}">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword"><i class="fas fa-user"></i> Password</label>
                                <input type="text" class="bg-white border-white form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{$citoyen->password ?? old('password')}}">
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                                    
                                </div>
                                <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Quartier</label>
                                <input type="text" class="bg-white border-white form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{$citoyen->quartier ?? old('quartier')}}"readonly>
                                @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fas fa-user"></i> Ville</label>
                                <input type="text" class="bg-white border-white form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{$citoyen->ville ?? old('ville')}}"readonly>
                                @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                            </div>
                        </div>
                    </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="p-3 border border-info border-4">
                            <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur les parents</i></h5></legend>
                            <div class="row">
                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">  Nom père</label>
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_pere_id)->nom}}" readonly>
                                    <label for="exampleInputName">  Prénom père</label>
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->prenom}}" readonly>
                                    <label for="exampleInputName">  CNI père</label> 
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_pere_id)->cni_rgi}}" readonly> 
                                </div>
                                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label for="exampleInputName">  Nom mère</label>
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->nom}}" readonly>
                                    <label for="exampleInputName">  Prénom mère</label>
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->prenom}}" readonly>
                                    <label for="exampleInputName">  CNI mère</label>
                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->cni_rgi}}" readonly>
                                    @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            </div>
                  <!--   <div class="form-group">
                        <label for="exampleInputPassword">confirmation Password</label>
                        <input type="password" class="bg-white border-white form-control" id="exampleInputPassword" placeholder="confirmation  Password" name="password_confirmation">
                    </div> -->
                        </div>
  
                </fieldset>
                        </div>
                    </div>
                  
                <!--     <div class="form-group">
                        <label for="exampleInputName">Nationalite</label>
                        <input type="text" class="bg-white border-white form-control @error('nationalite') is-invalid @enderror" id="exampleInputName" placeholder="Nationalite" name="nationalite" value="{{$citoyen->nationalite ?? old('nationalite')}}"readonly>
                        @error('nationalite') <span class="text-danger">{{$message}}</span> @enderror
                    </div>  -->
                   
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button> -->
                    <a href="{{route('citoyens.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
<i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
                </div>

            </div>
        </div>

<div id='sectionAimprimer' style="width:100%; font-family:times new roman ; " hidden >
<style type="text/css">
table {
  width: 100%;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.td {
  border: 1px solid black;
  border-collapse: none !important;
}
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
           <!--  <td colspan="1" style="text-align: center; ">s
            </td> -->
            <td colspan="4" style="text-align: center; width: 50%;" class="td">
                <label><b>REGION: BAMBEY</b></label><br><br>
                <label><b>DEPARTEMENT: BAMBEY</b></label><br><br>
                <label><b>COMMUNE: BAMBEY</b></label><br><br>
            </td>
            <td colspan="4" style="text-align: center; width: 50%;"><br>
                <label><b>REPUBLIQUE DU SENEGAL</b></label><br>
                <label>Un Peuple - Un But - Une Foi</label><br>
                <label><b><h1>ETAT-CIVIL</h1></b></label><br>
                <label><b>CENTRE PRINCIPAL (1)</b></label><br>
                <label><b>BAMBEY CENTRE PRINCIPAL</b></label><br><br><br>
            </td>
        </tr>

        <tr>
            <td colspan="5" style="width: 90%;">
                <label style="text-align: center; margin-left:7%;"><b><h2>EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE</h2></b></label><br>
                <label class="txt-left">Pour l'année {{$inWords->format(date('Y', strtotime($citoyen->date_naissance)))}}</label><br>
                <label class="txt-left">NUNMERO {{$inWords->format($citoyen->cni_rgi)}}</label><br>
            </td>
            <td colspan="3" style="width: 15%;"style="text-align: center;"> 
                <label><h2 style="text-align: center; width: 100%; margin-left:17%;">AN {{date('Y', strtotime($citoyen->date_naissance))}}</h2></label><br>
                <label><h4 style="text-align: center; margin-left:30%;"> {{$citoyen->cni_rgi}}</h4></label>
                <p class="txt-left">N° dans le registre des chifres</p><br>
 
            </td>
        </tr>
    </table>
<table style="font-family: Times New Roman;">
        <tr>
            <td colspan="8">
                <div class="w-50 f-left">
                    <h3>l'an {{$inWords->format(date('Y', strtotime($citoyen->date_naissance)))}},  le  {{$inWords->format(date('j', strtotime($citoyen->date_naissance)))}} du mois de  {{$month_name}}  </h3>
                   <label class="" style="background-color:yelloaw;">Est né(e) à</label>
                   <label style="font-size:35px; margin-left:10%;"> LOUGA</label><br>
                    <label style="margin-left:20%;"> (1) Lieu de naissance</label><br>
                     
                    Un enfant de sexe 
                    <?php if ($citoyen->sexe =="M"): ?>
                        <label style="font-size:25px;">Masculin</label>
                        
                    <?php else: ?>
                        <label style="font-size:25px;">Feminin</label>
                        
                    <?php endif ?>

                    <h1 style="margin-left:20%;">{{$citoyen->prenom}}</h1>
                    <i style="margin-top:2%;margin-left:21%;">PRENOM(s)</i><br>
                    DE <label style="margin-left:17%;font-size:25px;">{{optional($citoyen->citoyen_pere_id)->prenom}}</label><br>
                    <i style="margin-left:20%;margin-top:2%">PRENOM(s) DU PERE</i><br>

                    ET DE <label style="margin-left:10%;font-size:25px;">{{optional($citoyen->citoyen_mere_id)->prenom}}</label><br>
                    <i style="margin-left:20%;margin-top:1%">PRENOM(s) DE LA MERE</i><br>

                    <label>Le pays de naissance pour les naissances à l'étranger (3)</label>
                </div>
                <div class="w-50 f-left" style=""><br><br><br><br><br>
                à   {{$citoyen->heure_naissance}}
                   <br>HEURE DE NAISSANCE <br>
                    <label style="font-size:25px;">{{optional($citoyen->citoyen_mere_id)->nom}}</label><br> 
                    <i>NOM DE FAMILLE</i><br>

                    <br>
                    <br>
                    <br>
                    DE <label style="font-size:35px;">{{optional($citoyen->citoyen_mere_id)->prenom}}</label><br>
                    <i style="margin-top:2%">NOM DE FAMILLE DE LA MERE</i><br>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1" class="rotateimg180 txt-center">
                Jugement d'autorisation <br>
                d'inscription <br>
                (ex supplétif)
            </td>
            <td colspan="6" class="txt-white"> 
              
                Jugement d'autorisation 
                d'inscription 
                (ex supplétif)
                Jugement d'autorisation 
                d'inscription >
                (ex supplétif)
                Jugement d'autorisation
                d'inscription 
                (ex supplétif)
            </td>
            <td colspan="1" class="txt-white">
                Jugement d'autorisation <br>
                d'inscription <br>
                (ex supplétif)
                
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <h3>MENTIONS MARGINALES</h3>
                 <div class="w-50 f-left txt-left">
                   EXTRAIT DELIVRE PAR LE CENTRE P¨RINCIPAL <br>
                   LOUGA CENTRE PRINCIPAL 
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <label>RESERVER |||||||||||||||||||||||||||||||||||</label>
                </div>
                <div class="w-50 f-left txt-center" style="">
                    POUR EXTRAIT CERTIFIE CONFORME <br>
                    Fait à LOUGA le {{date('j F, Y', strtotime(date('j F, Y')))}} <br>
                    L'officier de l'Etat-Civil soussigné
                
                </div>
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