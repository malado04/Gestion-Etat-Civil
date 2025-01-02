@extends('adminlte::page')
@section('title', 'Etat Civil')
@section('content_header')
    <h4 class="m-0 text-dark">
          <b> Tableau de bord</b>
        <span class="float-right">
        </span>
    </h4>
@stop
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
  
<?php if ($citoyen->cni_rgi == null): ?>
<div class="row">
   <div class="col-md-12"><br>
                    <form action="{{route('home_cit.store')}}" method="post">
                                <fieldset class="p-3 border border-danger border-4">
                                <legend class="margin-left-20 alert-danger text-white p-2  w-75 border border-danger border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-danger"></i> Merci de compléter vos informations personnelles</i></h5></legend>
                                <div class="row">
                                    <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Nom</label>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom citoyen" name="nom" value="{{$citoyen->nom ?? $citoyen->nom ?? old('nom')}}" required>
                                            @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Prénom</label>
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom citoyen" name="prenom" value="{{$citoyen->prenom ?? old('prenom')}}" required>
                                            @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Sexe</label>
                                            <select class="form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{$citoyen->sexe ?? old('sexe')}}" required>
                                                <optgroup label="SEXE"> 
                                                     <option value="M">Masculin</option><br>
                                                    <option value="F">Féminin</option>
                                                </optgroup>
                                            </select> 
                                            @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                            </div>
                                            <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Tel</label>
                                            <input type="number" class="form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{$citoyen->tel ?? old('tel')}}" required>
                                            @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail"><i class="fas fa-user"></i> Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$citoyen->email ?? old('email')}}" required>
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword"><i class="fas fa-user"></i> Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{$citoyen->password ?? old('password')}}" required>
                                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                                
                                            </div>
                                            <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> N° de Registre</label>
                                            <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{$citoyen->cni_rgi ?? old('cni_rgi')}}" required>
                                            @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Date de naissance</label>
                                            <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{$citoyen->date_naissance ?? old('date_naissance')}}" required>
                                            @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Lieu de naissance</label>
                                            <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" name="lieu_naissance" value="{{$citoyen->lieu_naissance ?? old('lieu_naissance')}}" required>
                                            @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                            </div>
                                            <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Quartier</label>
                                            <input type="text" class="form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{$citoyen->quartier ?? old('quartier')}}" required>
                                            @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Ville</label>
                                            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{$citoyen->ville ?? old('ville')}}" required>
                                            @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                    </div>
                                     <div class="col-md-6">
                        <fieldset class="p-3 border border-info border-4">
                        <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur les parents </i></h5></legend>
                        <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Père </label>     
                            <input type="text" name="id_pere" class="form-control" placeholder="Père"  list="idpere">
                            <datalist id="idpere" name="pere_id" required="">
                                <optgroup  label="selectionner un Mari">
                               
                                    @foreach($citoyens_h as $key => $citoyen_h)
                                  <option value="{{$citoyen_h->id}} {{$citoyen_h->cni_rgi}}  {{$citoyen_h->prenom}} {{$citoyen_h->nom}}"></option>
                                @endforeach
                                @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                            <br>
                            <label>Domicile pere</label>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">Mère </label>
                            <input type="text" name="id_mere" class="form-control" placeholder="Mère"  list="idmere">
                            <datalist id="idmere" name="mere_id" required="">
                                <optgroup  label="selectionner la mère">
                                    @foreach($citoyens_f as $key => $citoyen_f)
                                  <option value="{{$citoyen_f->id}} {{$citoyen_f->cni_rgi}}  {{$citoyen_f->prenom}} {{$citoyen_f->nom}}"></option>
                                @endforeach
                                @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                        </div>
                        </fieldset><br>
                        </div>
                        <div class="col-md-6">
                        <fieldset class="p-3 border border-info border-4">
                        <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Pièces justificatifs à joindre</i></h5></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputName">CNI du père</label>
                                @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror                      
                                <div class="input_container bg-info border border-info">
                                    <input class="fileUpload" type="file" class="form-control @error('cni_pere') is-invalid @enderror" id="exampleInputName" placeholder="CNI du père" name="cni_pere" value="{{old('cni_pere')}}" required="">
                                    @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                <label for="exampleInputName">CNI de la mère</label>
                                @error('cni_mere') <span class="text-danger">{{$message}}</span> @enderror                      
                                <div class="input_container bg-info border border-info">
                                    <input class="fileUpload" type="file" class="form-control @error('cni_mere') is-invalid @enderror" id="exampleInputName" placeholder="CNI de la mère" name="cni_mere" value="{{old('cni_mere')}}" required="">
                                    @error('cni_mere') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div>  
                        </div>
                    </fieldset>   
                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                                        <a href="{{route('citoyens.index')}}" class="btn btn-danger">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <i class="fas fa-sign-out"></i> Annuler
                                        </a>
                                    </div>
                                </div>
                            </fieldset>
                            </form><br><br>
                        </div>
    </div>
<?php else: ?>
  <div class="row bg-success">
        dsdsds
    </div>
<!-- <?php endif ?> -->
<br><br>
 <?php if (optional($citoyen->citoyen_pere_id)->nom == null): ?>
    
  <div class="bg-danger text-white row">
        <i class="img-circle p-2 fas fa-fw fa-info border border-white"></i><h1> Informations sur mes parents: pas encore enregistrées</h1> 
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
  <div class="">
        <fieldset class="p-3 border border-info border-4">
                                <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur mon père</i></h5></legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">  Nom père </label>
                                                    <input type="text" class="form-control" value="{{optional($citoyen->citoyen_pere_id)->nom}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">  Prénom père</label>
                                                    <input type="text" class="form-control" value="{{optional($citoyen->citoyen_mere_id)->prenom}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">  CNI père</label> 
                                                    <input type="text" class="form-control" value="{{optional($citoyen->citoyen_pere_id)->cni_rgi}}" readonly> 
                                                </div><div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Tel</label>
                                                    <input type="number" class="form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel"  value="{{optional($citoyen->citoyen_pere_id)->tel}}"  readonly>
                                                    @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputEmail"><i class="fas fa-user"></i> Email address</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" value="{{optional($citoyen->citoyen_pere_id)->email}}" readonly>
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword"><i class="fas fa-user"></i> Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{optional($citoyen->citoyen_pere_id)->password}}" readonly>
                                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>  
                                                    </div>
                                                    <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> N° de Registre</label>
                                                    <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" value="{{optional($citoyen->citoyen_pere_id)->cni_rgi}}" readonly>
                                                    @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Date de naissance</label>
                                                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" value="{{optional($citoyen->citoyen_pere_id)->date_naissance}}"  readonly>
                                                    @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Lieu de naissance</label>
                                                    <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" value="{{optional($citoyen->citoyen_pere_id)->lieu_naissance}}"  readonly>
                                                    @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Domicile</label>
                                                    <input type="text" class="form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" value="{{optional($citoyen->citoyen_pere_id)->quartier}}"  readonly>
                                                    @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Ville</label>
                                                    <input type="text" class="form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville"  value="{{optional($citoyen->citoyen_pere_id)->ville}}"  readonly>
                                                    @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                            </div>
                                        </div>
                                </fieldset>
    </div>

<?php else: ?>
<?php endif ?>
                           
                                    </div>
                                    <div class="col-md-6">
 <?php if (optional($citoyen->citoyen_mere_id)->nom == null): ?>
    
<div class="">
      
</div>
  <div class="">
       <fieldset class="p-3 border border-info border-4">
                                <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur ma mère</i></h5></legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">  Nom mère </label>
                                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->nom}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">  Prénom mère</label>
                                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->prenom}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">  CNI mère</label> 
                                                    <input type="text" class="bg-white border-white  form-control" value="{{optional($citoyen->citoyen_mere_id)->cni_rgi}}" readonly> 
                                                </div><div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Tel</label>
                                                    <input type="number" class="bg-white border-white  form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{optional($citoyen->citoyen_mere_id)->tel}}"  readonly>
                                                    @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputEmail"><i class="fas fa-user"></i> Email address</label>
                                                    <input type="email" class="bg-white border-white  form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email"value="{{optional($citoyen->citoyen_mere_id)->email}}" readonly>
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword"><i class="fas fa-user"></i> Password</label>
                                                    <input type="password" class="bg-white border-white  form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{optional($citoyen->citoyen_mere_id)->password}}" readonly>
                                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>  
                                                    </div>
                                                    <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> N° de Registre</label>
                                                    <input type="number" class="bg-white border-white  form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($citoyen->citoyen_mere_id)->cni_rgi}}" readonly>
                                                    @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Date de naissance</label>
                                                    <input type="date" class="bg-white border-white  form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{optional($citoyen->citoyen_mere_id)->date_naissance}}"  readonly>
                                                    @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Lieu de naissance</label>
                                                    <input type="text" class="bg-white border-white  form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" name="lieu_naissance" value="{{optional($citoyen->citoyen_mere_id)->lieu_naissance}}"  readonly>
                                                    @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Domicile</label>
                                                    <input type="text" class="bg-white border-white  form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{optional($citoyen->citoyen_mere_id)->quartier}}"  readonly>
                                                    @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName"><i class="fas fa-user"></i> Ville</label>
                                                    <input type="text" class="bg-white border-white  form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{optional($citoyen->citoyen_mere_id)->ville}}"  readonly>
                                                    @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
    </div>

    <?php else: ?>
<?php endif ?>                  
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12"><br>
                       
<?php if ($citoyen->cni_rgi != null): ?>
    
                                <fieldset class="p-3 border border-info border-4">
                                <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Mes informations personnelles</i></h5></legend>
                                <div class="row">
                                    <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Nom</label>
                                            <input type="text" class="bg-white border-white  form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom citoyen" name="nom" value="{{$citoyen->nom ?? $citoyen->nom ?? old('nom')}}" readonly>
                                            @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Prénom</label>
                                            <input type="text" class="bg-white border-white  form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom citoyen" name="prenom" value="{{$citoyen->prenom ?? old('prenom')}}" readonly>
                                            @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Sexe</label>
                                            <select class="bg-white border-white  form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{$citoyen->sexe ?? old('sexe')}}" readonly>
                                                <optgroup label="SEXE"> 
                                                     <option value="M">Masculin</option><br>
                                                    <option value="F">Féminin</option>
                                                </optgroup>
                                            </select> 
                                            @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                            </div>
                                            <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Tel</label>
                                            <input type="number" class="bg-white border-white  form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{$citoyen->tel ?? old('tel')}}" readonly>
                                            @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail"><i class="fas fa-user"></i> Email address</label>
                                            <input type="email" class="bg-white border-white  form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$citoyen->email ?? old('email')}}" readonly>
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword"><i class="fas fa-user"></i> Password</label>
                                            <input type="password" class="bg-white border-white  form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{$citoyen->password ?? old('password')}}" readonly>
                                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                                
                                            </div>
                                            <div class="col-md-3">
                                         <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> N° de Registre</label>
                                            <input type="number" class="bg-white border-white  form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{$citoyen->cni_rgi ?? old('cni_rgi')}}" readonly>
                                            @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Date de naissance</label>
                                            <input type="date" class="bg-white border-white  form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{$citoyen->date_naissance ?? old('date_naissance')}}" readonly>
                                            @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Lieu de naissance</label>
                                            <input type="text" class="bg-white border-white  form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" name="lieu_naissance" value="{{$citoyen->lieu_naissance ?? old('lieu_naissance')}}" readonly>
                                            @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                            </div>
                                            <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Quartier</label>
                                            <input type="text" class="bg-white border-white  form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{$citoyen->quartier ?? old('quartier')}}" readonly>
                                            @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputName"><i class="fas fa-user"></i> Ville</label>
                                            <input type="text" class="bg-white border-white  form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{$citoyen->ville ?? old('ville')}}" readonly>
                                            @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                        </div> 
                                    </div>
                                </div>
                            </fieldset>
<?php endif ?>
                        </div>
                       <!--  <div class="col-md-12"><br>
                            <fieldset class="p-3 border border-info border-4">
                                <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur mes enfants</i></h5></legend>
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
                            </fieldset>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
