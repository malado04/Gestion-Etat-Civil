@extends('adminlte::page')

@section('title', 'Modifier un mariage')

@section('content')<br>
    <form action="{{route('mariages.update', $mariage)}}" class="container" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Modifier un mariage</i></h3>
                </div>
                <div class="card-body">
    <div class="row">
        <div class="col-6">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur le mariage</i></h5></legend>
                     <div class="form-group">
                        <label for="exampleInputName">Lieu de mariage</label>
                        <input type="text" class="form-control @error('lieu_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de mariage" name="lieu_mariage" value="{{$mariage->lieu_mariage ?? old('lieu_mariage')}}" required="">
                        @error('lieu_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Date de mariage</label>
                        <input type="date" class="form-control @error('date_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Date de mariage " name="date_mariage" value="{{$mariage->date_mariage ?? old('lieu_mariage')}}" required="">
                        @error('date_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                </div>
                <div class="col-md-6">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur les mariés</i></h5></legend>
                        <div class="form-group">     
                        <label for="exampleInputName">Mari</label>
                        <!-- <input type="text" name="mariage"> -->
                        <select name="homme_id" class="form-control" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                                <!-- <td></td> -->

                              <option value="{{optional($mariage->citoyens_h)->id}}">{{optional($mariage->citoyens_h)->nom}}</option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>                    <div class="form-group">
                        <label for="exampleInputName">Femme</label>
                        <!-- <input type="text" name="grade"> -->
                        <select name="femme_id" class="form-control @error('grade') is-invalid @enderror" required="">
                            <optgroup  label="selectionner une femme">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{optional($mariage->citoyens_f)->id}}">{{optional($mariage->citoyens_f)->nom}}</option>
                            @endforeach
                            @error('grade') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>
                </fieldset>
                </div>
                <div class="col-md-12"><br>
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur l'acte de mariage ou le livret de famille</i></h5></legend>

                    <div class="form-group">
                        <label for="exampleInputName">Volet n° 1 de l’acte de mariage ou le livret de famille ou une ancienne copie de l’acte de mariage </label>
                        <input type="file" class="form-control @error('acte_mariage') is-invalid @enderror" id="exampleInputName" placeholder="Volet n° 1 de l’acte de mariage – le livret de famille – une ancienne copie de l’acte de mariage" name="acte_mariage" value="{{$mariage->path ?? old('path')}}" >
                        @error('acte_mariage') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                  
                </fieldset>
                </div>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                    <a href="{{route('mariages.index')}}" class="btn btn-default">
                        Annuler
                    </a>
            </div>
        </div>
    </div>


@stop