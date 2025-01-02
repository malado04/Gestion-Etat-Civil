@extends('adminlte::page')

@section('title', 'Ajouter un divorce')

@section('content')<br>
    <form action="{{route('divorces.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
  
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
      <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter un divorce</i></h3>
                </div>
                <div class="card-body row">
                    <div class="col-6">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-85"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le mari</i></h5></legend>     
                        <div class="form-group">     
                        <label for="exampleInputName">Mari</label>
                        <!-- <input type="text" name="divorce"> -->
                        <select name="homme_id" class="form-control" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>

                </fieldset>
                </div> 
                    <div class="col-6">

                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-85"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur la femme </i></h5></legend>                    
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
                </fieldset>
                </div> 
                <div class="col-md-12"><br>
                <fieldset class="p-3 border border-info border-4 row">
                    <legend class="bg-info text-white p-2  w-85"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le divorce</i></h5></legend>    
                    <div class="form-group col-6">
                        <label for="exampleInputName">Certificat de Mariage</label>                      
                        <div class="input_container bg-info border border-info">
                        <input class="fileUpload" type="file" class="form-control @error('certifica_divo') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de Mariage" name="certifica_divo" value="{{old('certifica_divo')}}" required="">
                        @error('certifica_divo') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div> 
                    <div class="form-group col-6">
                        <label for="exampleInputName">Jugement de divorce</label>                        
                        <div class="input_container bg-info border border-info">
                        <input class="fileUpload" type="file" class="form-control @error('jugemen_divo') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de divorce" name="jugemen_divo" value="{{old('jugemen_divo')}}" required="">
                        @error('jugemen_divo') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div> 
                  
                </fieldset>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Enregistrer un divorce</button>
                    <a href="{{route('divorces.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop