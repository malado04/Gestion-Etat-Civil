@extends('adminlte::page')

@section('title', 'Ajouter un mariage')

@section('content')<br>
 
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
<form action="{{route('mariages.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter un mariage</i></h3>
                </div>
                <div class="card-body">
                        <fieldset class="p-3 border border-info border-4">
                            <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations personnelles</i></h5></legend>
                                <div class="row">
                                    <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="exampleInputName">Lieu de mariage</label>
                                        <input type="text" class="form-control @error('lieu_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de mariage" name="lieu_mariage" value="{{old('lieu_mariage')}}" required="">
                                        @error('lieu_mariage') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Date de mariage</label>
                                        <input type="date" class="form-control @error('date_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Date de mariage " name="date_mariage" value="{{old('date_mariage')}}" required="">
                                        @error('date_mariage') <span class="text-danger">{{$message}}</span> @enderror
                                    </div> 
                                        <div class="form-group">     
                                            <label for="exampleInputName">Polygame ou Monogame</label>
                                            <!-- <input type="text" name="mariage"> -->
                                            <select name="poly_mono" class="form-control" required="">
                                                <optgroup  label="selectionner Polygame ou Monogame"> 
                                                    <option value="Monogame"> Monogame</option>
                                                    <option value="Polygame" >Polygame</option>
                                                @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">     
                                            <label for="exampleInputName">Mari</label>
                                            <!-- <input type="text" name="mariage"> -->
                                            <select name="homme_id" class="form-control" required="">
                                                <optgroup  label="selectionner un Mari">
                                                    @foreach($citoyens as $key => $citoyen)
                                                  <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                                                @endforeach
                                                @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                                                </optgroup>
                                            </select>
                                        </div>
                                            <!-- ---------------------------------------------------------------------------------------------------------------- -->
                                        <div class="form-group">
                                            <label for="exampleInputName">Femme</label>
                                            <!-- <input type="text" name="grade"> -->
                                            <select name="femme_id" class="form-control @error('grade') is-invalid @enderror" required="">
                                                <optgroup  label="selectionner une femme">
                                                    @foreach($citoyens as $key => $citoyen)
                                                  <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                                                @endforeach
                                                @error('grade') <span class="text-danger">{{$message}}</span> @enderror
                                                </optgroup>
                                            </select>
                                        </div> 
                        <label for="exampleInputName">Volet n° 1 de l’acte de mariage ou le livret de famille ou une ancienne copie de l’acte de mariage </label>
                    <div class="input_container bg-info border border-info">
                        <input class="fileUpload"  type="file" class="form-control @error('acte_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Volet n° 1 de l’acte de mariage – le livret de famille – une ancienne copie de l’acte de mariage" name="acte_mariage" value="{{old('acte_mariage')}}" required="">
                        @error('acte_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                                    </div>
                            </div>
                  
                </fieldset>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                    <a href="{{route('mariages.index')}}" class="btn btn-default">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop