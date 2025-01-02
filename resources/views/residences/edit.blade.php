@extends('adminlte::page')

@section('title', 'Ajouter un dece')

@section('content')<br>
    <form action="{{route('deces.update', $dece)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
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
                <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter un décé</i></h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                    <div class="col-md-8">
                    <fieldset class="p-3 border border-info border-4">
                    <legend style="width:50%" class="bg-info text-white p-2  w-45"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le défunt</i></h5></legend>   
                        <div class="row">
                            <div class="col-6">  
                        <div class="form-group">
                        <label for="exampleInputName"> Défunt </label>     
                        <input type="text" name="def_id" class="form-control" placeholder="N° régistre défunt"  list="idpere" value="{{optional($dece->citoyen_def)->cni_rgi}} {{optional($dece->citoyen_def)->nom}} {{optional($dece->citoyen_def)->prenom }}">
                        <datalist id="idpere" name="pere_id" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}} {{$citoyen->cni_rgi}}  {{$citoyen->prenom}} {{$citoyen->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
                        </div> 
                        <div class="form-group">     
                        <label for="exampleInputName">Date de décé</label>
                        <input type="date" class="form-control @error('date_dece') is-invalid @enderror" id="exampleInputName" placeholder="Jugement de dece" name="date_dece" value="{{$dece->date_dece ?? old('date_dece')}}" >
                    </div> 
                        <div class="form-group">     
                        <label for="exampleInputName">Lieu de décé</label>
                        <input type="text" class="form-control @error('lieu_dece') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de décé" name="lieu_dece" value="{{$dece->lieu_dece ?? old('lieu_dece')}}" >
                    </div>  
                    </div>  
                <div class="col-md-6 ">
                    <div class="row">
                        
                    <div class="form-group col-12">
                        <label for="exampleInputName">CNI du défunt</label>                      
                        <div class="input_container bg-info border border-info">
                        <input class="fileUpload" type="file" class="form-control @error('cni_def') is-invalid @enderror" id="exampleInputName" placeholder="CNI du défunt" name="cni_def" value="{{$dece->cni_def ?? old('cni_def')}}" >
                        @error('cni_def') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group col-12">
                        <label for="exampleInputName">Certificat de décé</label>                      
                        <div class="input_container bg-info border border-info">
                        <input class="fileUpload" type="file" class="form-control @error('certifica_dece') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de décé" name="certifica_dece" value="{{$dece->certifica_dece ?? old('certifica_dece')}}" >
                        @error('certifica_dece') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div>
                    </div> 
                </div> 
                </div> 
</div>
                </fieldset>
         <!--        <div class="col-6">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-45"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur la femme </i></h5></legend>                    
                    <div class="form-group">
                        <label for="exampleInputName">Femme</label>
                        <input type="text" name="grade"> 
                        <select name="femme_id" class="form-control @error('grade') is-invalid @enderror" >
                            <optgroup  label="selectionner une femme">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}}">{{$citoyen->prenom}} {{$citoyen->nom}}</option>
                            @endforeach
                            @error('grade') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div> 
                </fieldset> -->
                </div> 
                <div class="col-md-4">
                <fieldset class="p-3 border border-info border-4 row">
                    <legend style="width:50%" class="bg-info text-white p-2  w-45"><h5><i><i class="img-circle fas fa-fw fa-info border border-white p-2"></i> Informations sur le témoin</i></h5></legend>    
                    <div class="form-group col-12">
                        <div class="form-group">
                        <label for="exampleInputName"> N° régistre du témoin </label>     
                        <input type="text" name="tem_id" class="form-control" placeholder="Témoin"  list="idpere" value="{{optional($dece->citoyens_tem)->cni_rgi}} {{optional($dece->citoyens_tem)->nom}} {{optional($dece->citoyens_tem)->prenom }}">
                        <datalist id="idpere" name="pere_id" required="">
                            <optgroup  label="selectionner un Mari">
                                @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}} {{$citoyen->cni_rgi}}  {{$citoyen->prenom}} {{$citoyen->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
                        </div>

                        <label for="exampleInputName">CNI du témoin</label>                        
                        <div class="input_container bg-info border border-info">
                        <input class="fileUpload" type="file" class="form-control @error('cni_temoin') is-invalid @enderror" id="exampleInputName" placeholder="N° régistre du témoin" name="cni_temoin" value="{{$dece->cni_temoin ?? old('cni_temoin')}}" >
                        @error('cni_temoin') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div> 
                  
                </fieldset>
                </div>
</div>
            </div>
                <div class="card-footer row">
                    <button type="submit" class="btn btn-info">Enregistrer un dece</button>
                    <a href="{{route('deces.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
        </div>
    </div>
@stop