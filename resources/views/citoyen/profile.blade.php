@extends('adminlte::page')

@section('title', 'Ajouter un citoyen') 
@section('content')<br>
    <form action="{{route('citoyens.update', $citoyen)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Mettre à jour mes informations personnelles</i></h3>
                </div>
               <div class="card-body">
                <fieldset>
                    <!-- <legend><i>Informations personnelles</i></legend> -->
                    <div class="row">
                        <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputName">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom citoyen" name="nom" value="{{$citoyen->nom ?? $citoyen->nom ?? old('nom')}}" required="">
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom citoyen" name="prenom" value="{{$citoyen->prenom ?? old('prenom')}}" required="">
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Sexe</label>
                        <select class="form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{$citoyen->sexe ?? old('sexe')}}" required="">
                            <optgroup> <label>Sexe</label>
                                 <option value="M">Masculin</option><br>
                                <option value="F">Féminin</option>
                            </optgroup>
                        </select> 
                        @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleInputName">Date de naissance</label>
                        <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{$citoyen->date_naissance ?? old('date_naissance')}}" required="">
                        @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Lieu de naissance</label>
                        <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance citoyen" name="lieu_naissance" value="{{$citoyen->lieu_naissance ?? old('lieu_naissance')}}" required="">
                        @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                        </div>
                        <div class="col-md-4">
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre</label>
                        <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{$citoyen->cni_rgi ?? old('cni_rgi')}}" readonly="">
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tel</label>
                        <input type="number" class="form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{$citoyen->tel ?? old('tel')}}" required="">
                        @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$citoyen->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" value="{{$citoyen->password ?? old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                            
                        </div>
                        <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName">Quartier</label>
                        <input type="text" class="form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{$citoyen->quartier ?? old('quartier')}}" required="">
                        @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Ville</label>
                        <input type="text" class="form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{$citoyen->ville ?? old('ville')}}" required="">
                        @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                <!--     <div class="form-group">
                        <label for="exampleInputName">Nationalite</label>
                        <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="exampleInputName" placeholder="Nationalite" name="nationalite" value="{{$citoyen->nationalite ?? old('nationalite')}}" required="">
                        @error('nationalite') <span class="text-danger">{{$message}}</span> @enderror
                    </div>  -->
                    <div class="form-group">
                        <label for="exampleInputName">CNI - Numero de registre - du père</label>
                        <input type="number" class="form-control @error('cni_pere') is-invalid @enderror" id="exampleInputName" placeholder="CNI père" name="cni_pere" value="{{$citoyen->cni_pere ?? old('cni_pere')}}" required="">
                        @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">CNI - Numero de registre - de la mère</label>
                        <input type="number" class="form-control @error('cni_mere') is-invalid @enderror" id="exampleInputName" placeholder="CNI mère" name="cni_mere" value="{{$citoyen->cni_mere ?? old('cni_mere')}}" required="">
                        @error('cni_mere') <span class="text-danger">{{$message}}</span> @enderror
                    </div>  
                  <!--   <div class="form-group">
                        <label for="exampleInputPassword">confirmation Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="confirmation  Password" name="password_confirmation">
                    </div> -->
                        </div>
                    </div>
  
                </fieldset>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('home_cit')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
<i class="fas fa-sign-out"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop