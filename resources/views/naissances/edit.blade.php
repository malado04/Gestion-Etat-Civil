@extends('adminlte::page')

@section('title', 'Modifier une naissance') 
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
    </section><br>
    <form action="{{route('naissances.update', $naissance)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Modifier une naissance</i></h3>
                </div>
               <div class="card-body">
                 <div class="row">
                <div class="col-md-8 bg-teal-300">
                
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>Informations sur le (a) nouveau (elle) né (e)</i></h5></legend>
                       <div class="row">
                            <div class="col-md-4">
                     <div class="form-group">
                        <input type="hidden" name="id_citoyen" value="{{optional($naissance->citoyens)->id}}">
                        <label for="exampleInputName">Nom </label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom naissance" name="nom" value="{{optional($naissance->citoyens)->nom ?? optional($naissance->citoyens)->nom ?? old('nom')}}" required="">
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom naissance" name="prenom" value="{{optional($naissance->citoyens)->prenom ?? optional($naissance->citoyens)->prenom}}" required="">
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Sexe</label>
                        <select class="form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{optional($naissance->citoyens)->sexe ?? optional($naissance->citoyens)->sexe}}" required="">
                            <optgroup> <label>Sexe</label>
                                 <option value="M">Masculin</option><br>
                                <option value="F">Féminin</option>
                            </optgroup>
                        </select> 
                        @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleInputName">Date de naissance</label>
                        <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance naissance" name="date_naissance" value="{{optional($naissance->citoyens)->date_naissance ?? old('date_naissance')}}" required="">
                        @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Lieu de naissance</label>
                        <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance naissance" name="lieu_naissance" value="{{optional($naissance->citoyens)->lieu_naissance ?? old('lieu_naissance')}}" required="">
                        @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                        </div>
                        <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre</label>
                        <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($naissance->citoyens)->cni_rgi ?? old('cni_rgi')}}" required="">
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tel</label>
                        <input type="number" class="form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{optional($naissance->citoyens)->tel ?? old('tel')}}" required="">
                        @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{optional($naissance->citoyens)->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{optional($naissance->citoyens)->password ?? old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                            
                        </div>
                        <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName">Quartier</label>
                        <input type="text" class="form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{optional($naissance->citoyens)->quartier ?? old('quartier')}}" required="">
                        @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Ville</label>
                        <input type="text" class="form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{optional($naissance->citoyens)->ville ?? old('ville')}}" required="">
                        @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                <!--     <div class="form-group">
                        <label for="exampleInputName">Nationalite</label>
                        <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="exampleInputName" placeholder="Nationalite" name="nationalite" value="{{optional($naissance->citoyens)->nationalite ?? old('nationalite')}}" required="">
                        @error('nationalite') <span class="text-danger">{{$message}}</span> @enderror
                    </div>  -->
                    </div>
                       </div>
                    
                    </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="p-3 border border-info border-4">
                        <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur ses parents </i></h5></legend>
                        <div class="form-group">
                        <label for="exampleInputName">CNI Père </label>     
                        <input type="text" name="id_pere" class="form-control" placeholder="Père"  list="idpere" value="{{optional($naissance->pere)->cni_rgi}}">
                        <datalist id="idpere" name="pere_id" required="">
                            <optgroup  label="selectionner un Mari">
                           
                                @foreach($citoyens_h as $key => $citoyen_h)
                              <option value="{{$citoyen_h->id}} {{$citoyen_h->cni_rgi}}  {{$citoyen_h->prenom}} {{$citoyen_h->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
                        </div>
                            
                    <div class="form-group">
                        <label for="exampleInputName">CNI Mère </label>
                        <input type="text" name="id_mere" class="form-control" placeholder="Mère"  list="idmere" value="{{optional($naissance->mere)->cni_rgi}}">
                        <datalist id="idmere" name="mere_id" required="">
                            <optgroup  label="selectionner la mère">
                                @foreach($citoyens_f as $key => $citoyen_f)
                              <option value="{{$citoyen_f->id}} {{$citoyen_f->cni_rgi}}  {{$citoyen_f->prenom}} {{$citoyen_f->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
<!-- 
                    <div class="form-group">
                        <label for="exampleInputName">CNI père</label>
                        <input type="number" class="form-control @error('cni_pere') is-invalid @enderror" id="exampleInputName" placeholder="CNI père" name="cni_pere" value="{{optional($naissance->citoyens)->cni_pere ?? old('cni_pere')}}" required="">
                        @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">CNI mère</label>
                        <input type="number" class="form-control @error('cni_mere') is-invalid @enderror" id="exampleInputName" placeholder="CNI mère" name="cni_mere" value="{{optional($naissance->citoyens)->cni_mere ?? old('cni_mere')}}" required="">
                        @error('cni_mere') <span class="text-danger">{{$message}}</span> @enderror
                    </div>   -->
                  <!--   <div class="form-group">
                        <label for="exampleInputPassword">confirmation Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="confirmation  Password" name="password_confirmation">
                    </div> -->
                        </div>
                    </div>
  
                </fieldset>
                </div>

            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('naissances.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
<i class="fas fa-sign-out"></i> Annuler
                    </a>
                </div>
        </div>
    </div>
@stop