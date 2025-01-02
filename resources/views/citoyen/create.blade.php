@extends('adminlte::page')

@section('title', 'Ajouter un citoyen') 
@section('content')<br>
    <form action="{{route('citoyens.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Ajout d'un nouveau citoyen
                    <!-- <a href="{{route('naissances.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un nouveau citoyen
                    </a> --></h1>
                </div>
                <div class="card-body">
                <fieldset>
                    <!-- <legend><i>Informations personnelles</i></legend> -->
                    <div class="row">
                        <div class="col-md-8 bg-teal-300">
                
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>Informations sur le citoyen</i></h5></legend>
                    <div class="row">
                        <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre</label>
                        <input type="number" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{old('cni_rgi')}}" required="">
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom citoyen" name="nom" value="{{old('nom')}}" required="">
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom citoyen" name="prenom" value="{{old('prenom')}}" required="">
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Sexe</label>
                        <select class="form-control @error('sexe') is-invalid @enderror" id="exampleInputName" placeholder="Sexe" name="sexe" value="{{old('sexe')}}" required="">
                            <optgroup> <label>Sexe</label>
                                 <option value="M">Masculin</option><br>
                                <option value="F">Féminin</option>
                            </optgroup>
                        </select> 
                        @error('Sexe') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Tel</label>
                        <input type="number" class="form-control @error('tel') is-invalid @enderror" id="exampleInputName" placeholder="Tel" name="tel" value="{{old('tel')}}" required="">
                        @error('Tel') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div>
                    <div class="col-md-6">
                    <div class="form-group"> 
                        <label for="exampleInputName">Date de naissance</label>
                        <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance citoyen" name="date_naissance" value="{{old('date_naissance')}}" required="">
                        @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Lieu de naissance</label>
                            <input type="text" name="lieu_naissance" class="form-control" placeholder="Lieu de naissance"  list="id_lieu_naissance">
                            <datalist id="id_lieu_naissance" required="">
                                <optgroup  label="selectionner un lieu">
                                    @foreach($citoyens as $key => $citoyen)
                                  <option value="{{$citoyen->lieu_naissance}}"></option>
                                @endforeach
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Quartier </label>
                        <input type="text" class="form-control @error('quartier') is-invalid @enderror" id="exampleInputName" placeholder="Quartier" name="quartier" value="{{old('quartier')}}" list="quartier_list" required="">
                            <datalist id="quartier_list" name="quartier_list" required="">
                                <optgroup  label="selectionner un lieu">
                                    @foreach($citoyens as $key => $citoyen)
                                  <option value="{{$citoyen->quartier }}"></option>
                                @endforeach
                                @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                        @error('quartier') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Ville</label>
                        <input type="text" class="form-control @error('ville') is-invalid @enderror" id="exampleInputName" placeholder="Ville" name="ville" value="{{old('ville')}}" list="ville_list" required="">
                            <datalist id="ville_list" name="ville_list" required="">
                                <optgroup  label="selectionner un lieu">
                                    @foreach($citoyens as $key => $citoyen)
                                  <option value="{{$citoyen->ville}}"></option>
                                @endforeach
                                @error('ville') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                        @error('ville') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label>Profession </label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror" id="exampleInputName" placeholder="Profession" name="profession" value="{{old('profession')}}" list="profession_list" required="">
                            <datalist id="profession_list" required="">
                                <optgroup  label="selectionner un lieu">
                                    @foreach($citoyens as $key => $citoyen)
                                  <option value="{{$citoyen->ville}}"></option>
                                @endforeach
                                @error('ville') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                        @error('profession') <span class="text-danger">{{$message}}</span> @enderror
                     
                     </div>
                 </div> 
                 </div> 
                 </div> 
                    <div class="col-md-4">
                        <fieldset class="p-3 border border-info border-4">
                        <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur ses parents </i></h5></legend>
                        <div class="row">
                            <div class="col-md-12   ">
                                
                        <label for="exampleInputName"> CNI Père </label>     
                        <input type="text" name="id_pere" class="form-control" placeholder="Père"  list="idpere">
                        <datalist id="idpere" name="pere_id" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen_h)
                              <option value="{{$citoyen_h->id}} {{$citoyen_h->cni_rgi}}  {{$citoyen_h->prenom}} {{$citoyen_h->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
                                
                            </div>
                            <div class="col-md-12"><br>
                        <label for="exampleInputName"> CNI Mère </label>
                        <input type="text" name="id_mere" class="form-control" placeholder="Mère"  list="idmere">
                        <datalist id="idmere" name="mere_id" required="">
                            <optgroup  label="selectionner la mère">
                                @foreach($citoyens as $key => $citoyen_f)
                              <option value="{{$citoyen_f->id}} {{$citoyen_f->cni_rgi}}  {{$citoyen_f->prenom}} {{$citoyen_f->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
          <!--           <div class="form-group">
                        <label for="exampleInputName">CNI père</label>
                        <input type="number" class="form-control @error('cni_pere') is-invalid @enderror" id="exampleInputName" placeholder="CNI père" name="cni_pere" value="{{old('cni_pere')}}" required="">
                        @error('cni_pere') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">CNI mère</label>
                        <input type="number" class="form-control @error('cni_mere') is-invalid @enderror" id="exampleInputName" placeholder="CNI mère" name="cni_mere" value="{{old('cni_mere')}}" required="">
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

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('citoyens.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <i class="fas fa-sign-out"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop