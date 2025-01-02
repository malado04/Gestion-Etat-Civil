@extends('adminlte::page')

@section('title', 'Modifier un divorce')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Modifier un divorce</h1> -->
@stop

@section('content')
    <form action="{{route('divorces.update', $divorce)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Modifier d'un divorce</i> <a href="{{route('divorces.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un divorce 
                    </a></h3>
                </div>
               <div class="card-body">
    <div class="row">
        <div class="col-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur le mari</i></h5></legend>
 <div class="form-group">
                        <label for="exampleInputName">Mari</label>
                        <select name="homme_id" class="form-control" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Nom et Prénom du Mari</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom divorce" name="nom" value="{{optional($divorce->citoyens_h)->nom}}  {{optional($divorce->citoyens_h)->prenom}}" readonly>
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre du Mari</label>
                        <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($divorce->citoyens_h)->cni_rgi ?? old('cni_rgi')}}" readonly>
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </fieldset>
                    </div> 
        <div class="col-4">

                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-85"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur la femme </i></h5></legend>
 <div class="form-group">
                        <label for="exampleInputName">Femme</label>
                        <select name="femme_id" class="form-control" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-user"></i>Prénom de la femme</label>
                        <input type="text" class="form-control @error('citoyens_f') is-invalid @enderror" id="exampleInputName" placeholder="Nom divorce" name="citoyens_f" value="{{optional($divorce->citoyens_f)->nom}}  {{optional($divorce->citoyens_f)->prenom}}" readonly>
                        @error('citoyens_f') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputName">N° de Registre de la femme</label>
                        <input type="number" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{optional($divorce->citoyens_f)->cni_rgi ?? old('cni_rgi')}}" readonly>
                        @error('cni_rgi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                        </div>
                </fieldset>
                        <div class="col-md-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2 w-75 border border-info border-4"><h5><i><i class="img-circle  p-2 fas fa-fw fa-info border border-white"></i> Informations sur le divorce</i></h5></legend>
                    <div class="form-group">
                        <label for="exampleInputName">Certificat de Mariage</label>
                        <div class="input_container bg-info border border-info">
                        <input  class="fileUpload"  type="file" class="form-control @error('certifica_divo') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de Mariage" name="certifica_divo" value="{{$divorce->certifica_divo ?? old('certifica_divo')}}" required>
                        @error('certifica_divo') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Jugement de divorce</label>
                        <div class="input_container bg-info border border-info">
                            <input class="fileUpload" type="file" class="form-control @error('jugemen_divo') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de divorce" name="jugemen_divo" value="{{$divorce->jugemen_divo ?? old('jugemen_divo')}}" required>
                        @error('jugemen_divo') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div> 
                    </div> 
                    </div>
                </fieldset>
                </div>
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('divorces.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
<i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop