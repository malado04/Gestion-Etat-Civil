@extends('adminlte::page')

@section('title', 'Ajouter un demande')

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
    <form action="{{route('demandes.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter une demande</i></h3>
                </div>
                <div class="card-body">
               <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Faire une demande pour un citoyen</i></h5></legend>
                    <div class="form-group">     
                        <label for="exampleInputName">Beneficiaire</label>
                        <select name="homme_id" class="form-control" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div><div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label>Acte de naissance</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="act_nai" value="Acte de naissance" class="form-control">
                                </div>
                               <!--  <div class="col-md-2">
                                    <label>Nombre de copies</label>
                                </div> -->
                                <div class="col-md-7">
                                    <input type="number" min="0" name="num_nai" class="form-control" placeholder="Nombre de copies">
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-3 text-right">
                                    <label>Acte de décés</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="act_dec" value="Acte de décés" class="form-control">
                                </div><!-- 
                                <div class="col-md-2">
                                    <label>Nombre de copies</label>
                                </div> -->
                                <div class="col-md-7">
                                    <input type="number" min="0" name="num_dec" class="form-control" placeholder="Nombre de copies">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label>Acte de divorce</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="act_div" value="Acte de divorce" class="form-control">
                                </div><!-- 
                                <div class="col-md-2">
                                    <label>Nombre de copies</label>
                                </div> -->
                                <div class="col-md-7">
                                    <input type="number" min="0" name="num_div" class="form-control" placeholder="Nombre de copies">
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-3 text-right">
                                    <label>Acte de Jugement</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="checkbox" name="act_jug" value="Acte de Jugement" class="form-control">
                                </div><!-- 
                                <div class="col-md-2">
                                    <label>Nombre de copies</label>
                                </div> -->
                                <div class="col-md-7">
                                    <input type="number" min="0" name="num_jug" class="form-control" placeholder="Nombre de copies">
                                </div>
                            </div>
                        </div>
                    </div>
               <div class="form-group">     
                        <label for="exampleInputName">Description de la demande</label>     
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputName" placeholder="CNI du témoin" name="description" cols="10" value="{{old('description')}}" required="">
                            
                        </textarea>                   
                            @error('cni_temoin') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 
                    </div> 
                </fieldset>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                    <a href="{{route('agents.index')}}" class="btn btn-default">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop