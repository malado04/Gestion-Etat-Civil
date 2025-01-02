@extends('adminlte::page')

@section('title', 'Ajouter un jugement')

@section('content')<br>
    <form action="{{route('jugements.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Ajouter un jugement</i></h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <label for="exampleInputName">Numéro de régistre du citoyen </label>
                        <input type="text" name="fk_jum_id" class="form-control" placeholder="Numéro de régistre du citoyen"  list="iddatalist">
                        <datalist id="iddatalist" name="cni_rgi" required="">
                            <optgroup  label="selectionner un citoyen">
                                 @foreach($citoyens as $key => $citoyen)
                              <option value="{{$citoyen->id}} {{$citoyen->cni_rgi}}  {{$citoyen->prenom}} {{$citoyen->nom}}"></option>
                            @endforeach
                            @error('citoyens') <span class="text-danger">{{$message}}</span> @enderror
                            </optgroup>
                        </datalist>
                    <div class="form-group">
                        <label for="exampleInputName">Certificat de non inscription </label>
                        <input type="file" class="form-control @error('certificat_non') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de non inscription" name="certificat_non" value="{{old('certificat_non')}}" required="">
                        @error('certificat_non') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Certificat d'accouchement </label>
                        <input type="file" class="form-control @error('certificat_daccouchement') is-invalid @enderror" id="exampleInputName" placeholder="Certificat d'accouchement" name="certificat_daccouchement" value="{{old('certificat_daccouchement')}}" required="">
                        @error('certificat_daccouchement') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputName">La quittance de paiement</label>
                        <input type="file" class="form-control @error('quit_paiem') is-invalid @enderror" id="exampleInputName" placeholder="La quittance de paiement" name="quit_paiem" value="{{old('quit_paiem')}}" required="">
                        @error('quit_paiem') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="exampleInputName">Certificat de témoin 1 </label>
                        <input type="file" class="form-control @error('certificat_temoin1') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de témoin 1" name="certificat_temoin1" value="{{old('certificat_temoin1')}}" required="">
                        @error('certificat_temoin') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputName">Certificat de témoin 2</label>
                        <input type="file" class="form-control @error('certificat_temoin2') is-invalid @enderror" id="exampleInputName" placeholder="Certificat de témoin 2" name="certificat_temoin2" value="{{old('certificat_temoin2')}}" required="">
                        @error('certificat_temoin') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName">Fiche de vaccination </label>
                        <input type="file" class="form-control @error('fiche_vacc') is-invalid @enderror" id="exampleInputName" placeholder="Fiche de vaccination" name="fiche_vacc" value="{{old('fiche_vacc')}}" required="">
                        @error('fiche_vacc') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                    <a href="{{route('jugements.index')}}" class="btn btn-default">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop