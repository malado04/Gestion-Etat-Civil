@extends('adminlte::page')

@section('title', 'Ajouter une naissance') 
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
              <li class="breadcrumb-item active"><b><i>Naissances / créer un nouveau né</i></b></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section><br>

<style>
    .fileUpload {
    cursor: pointer; /* "hand" cursor */
}
.input_container {
  border: 2px solid #5bc0de;
}

input[type=file]::file-selector-button {
  background-color: #fff;
  color: #000;
  border: 0px;
  border-right: 2px solid #5bc0de;
  padding: 10px 15px;
  margin-right: 20px;
  transition: .5s;
}

input[type=file]::file-selector-button:hover {
  background-color: #eee;
  border: 0px;
  border-right: 1px solid #e5e5e5;
}
</style>

    <form action="{{route('naissances.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Ajout d'un nouveau (elle) né (e)
                    <!-- <a href="{{route('naissances.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un nouveau (elle) né (e)
                    </a> --></h1>
                </div>
            <!--     <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter une naissance</i></h3>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 bg-teal-300">
                
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>Informations sur le (a) nouveau (elle) né (e)</i></h5></legend>
                    <div class="row">
                        <div class="col-md-4">
                  <!--    <div class="form-group">
                        <label for="exampleInputName">N° de Registre</label>
                        <input type="number" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{old('cni_rgi')}}" required="" min="0">
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
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
                    </div>
                    <div class="col-md-4">
                    <div class="form-group"> 
                        <label for="exampleInputName">Jour de naissance</label>
                        <input type="date" max="<?= date('Y-m-d'); ?>" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Jour de naissance " name="date_naissance" value="{{old('date_naissance')}}" required="">
                        @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group"> 
                        <label for="exampleInputName">Heure de naissance</label>
                        <input type="time" max="<?= date('H:s:i'); ?>" class="form-control @error('heure_naissance') is-invalid @enderror" id="exampleInputName" placeholder="Heure de naissance citoyen" name="heure_naissance" value="{{old('heure_naissance')}}" required="">
                        @error('heure_naissance') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Lieu de naissance</label>
                            <input type="text" name="lieu_naissance" class="form-control" placeholder="Lieu de naissance"  list="id_lieu_naissance">
                            <datalist id="id_lieu_naissance" name="lieu_naissance_list" required="">
                                <optgroup  label="selectionner un lieu">
                                    @foreach($citoyens as $key => $citoyen)
                                  <option value="{{$citoyen->lieu_naissance}}"></option>
                                @endforeach
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                    </div> 
                <!--     <div class="form-group"> 
                        <label for="exampleInputName">Date de transcription</label>
                        <input type="date" class="form-control @error('date_trans_regis') is-invalid @enderror" id="exampleInputName" placeholder="Date de transcription naissance" name="date_trans_regis" value="{{old('date_trans_regis')}}" required="">
                        @error('date_trans_regis') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
          
                        </div>
                        <div class="col-md-4">
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
              
                    </fieldset>
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
                        </div>
                        </fieldset><br>
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


                        </div><br>
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
    </div>
@stop