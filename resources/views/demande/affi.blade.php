@extends('adminlte::page')

@section('title', 'Modifier un agent')

@section('content_header')
    <h1 class="m-0 text-dark">Modifier un agent</h1>
@stop

@section('content')
    <form action="{{route('agents.update', $agent)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 <fieldset>
                    <legend>Informations personnelles</legend>
                     <div class="form-group">
                        <label for="exampleInputName">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom agent" name="nom" value="{{old('nom')}}">
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Prénom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputName" placeholder="Prénom agent" name="prenom" value="{{old('prenom')}}">
                        @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
<!--                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Grade agent" name="grade" value="{{old('name')}}">
 -->                   
                        <label for="exampleInputName">Date de naissance</label>
                        <input type="date" class="form-control @error('datenais') is-invalid @enderror" id="exampleInputName" placeholder="Date de naissance agent" name="datenais" value="{{old('datenais')}}">
                        @error('datenais') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Lieu de naissance</label>
                        <input type="text" class="form-control @error('lieunais') is-invalid @enderror" id="exampleInputName" placeholder="Lieu de naissance agent" name="lieunais" value="{{old('lieunais')}}">
                        @error('lieunais') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    
                </fieldset>
                <fieldset>
                    <legend>Informations professionnelles</legend>
                 <!-- -----------------s----------------------------------------------------------------------------------------------- -->
                   
                        <div class="form-group">     
                        <label for="exampleInputName">Direction</label>
                        <!-- <input type="text" name="direction"> -->
                        <select name="direction" class="form-control">
                            <optgroup  label="selectionner une autre direction">
                                @foreach($directions as $key => $direction)
                              <option value="{{$direction->id}}">{{$direction->name}}</option>
                            @endforeach
                            @error('direction') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>
                        <!-- ---------------------------------------------------------------------------------------------------------------- -->
                    <div class="form-group">
                        <label for="exampleInputName">Grade</label>
                        <!-- <input type="text" name="grade"> -->
                        <select name="grade" class="form-control @error('grade') is-invalid @enderror">
                            <optgroup  label="selectionner un grade">
                            @foreach($grades as $key => $grade)
                              <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                            @error('grade') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>
                        <!-- ---------------------------------------------------------------------------------------------------------------- -->
                    <div class="form-group">
                        <label for="exampleInputName">Fonction</label>
                        <!-- <input type="text" name="grade"> -->
                        <select name="fonction" class="form-control @error('fonction') is-invalid @enderror">
                            <optgroup  label="selectionner un fonction">
                            @foreach($fonctions as $key => $fonction)
                              <option value="{{$fonction->id}}">{{$fonction->name}}</option>
                            @endforeach
                            @error('fonction') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>

                        <!-- ---------------------------------------------------------------------------------------------------------------- -->
                    <div class="form-group">
                        <label for="exampleInputName">Groupe</label>
                        <!-- <input type="text" name="grade"> -->
                        <select name="groupe" class="form-control @error('groupe') is-invalid @enderror">
                            <optgroup  label="selectionner un groupe">
                            @foreach($gos as $key => $groupe)
                              <option value="{{$groupe->id}}">{{$groupe->name}}</option>
                            @endforeach
                            @error('groupe') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>
                        <!-- ---------------------------------------------------------------------------------------------------------------- -->
                    <div class="form-group">
                        <label for="exampleInputName">Unite</label>
                        <!-- <input type="text" name="grade"> -->
                        <select name="unite" class="form-control @error('unite') is-invalid @enderror">
                            <optgroup  label="selectionner un unite">
                            @foreach($unites as $key => $unite)
                              <option value="{{$unite->id}}">{{$unite->name}}</option>
                            @endforeach
                            @error('unite') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">CCAP</label>
                        <input type="text" class="form-control @error('ccap') is-invalid @enderror" id="exampleInputName" placeholder="CCAP agent" name="ccap" value="{{old('ccap')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                
                  
                </fieldset>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('agents.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop