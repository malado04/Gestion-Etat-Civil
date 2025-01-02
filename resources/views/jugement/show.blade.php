@extends('adminlte::page')

@section('title', 'Affichage jugement') 
@section('content')<br>
    <form class=" " action="{{route('jugements.edit', $jugement)}}" method="post">
        @method('PUT')
        @csrf 
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-user"></i><i> Affichage d'un jugement</i> <a href="{{route('jugements.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter un jugement 
                    </a></h3>
                </div>
               <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4 col-sx-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Certificat de non inscription</i></h5></legend> 

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_non}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-eye"></i> la piece jointe</a>
                        </div>
                    <!--     <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_non}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-edit"></i> la piece jointe</a>
                        </div> -->
                    </div>
                </fieldset>
            </div> 
            <div class="col-md-4 col-sm-4 col-lg-4 col-sx-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Certificat d'accouchement</i></h5></legend> 

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_daccouchement}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-eye"></i> la piece jointe</a>
                        </div>
                      <!--   <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_daccouchement}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-edit"></i> la piece jointe</a>
                        </div> -->
                    </div>
                </fieldset>
            </div> 
            <div class="col-md-4 col-sm-4 col-lg-4 col-sx-4">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Certificat de témoin</i></h5></legend> 

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_temoin}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-eye"></i> la piece jointe</a>
                        </div>
                       <!--  <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->certificat_temoin}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-edit"></i> la piece jointe</a>
                        </div> -->
                    </div>
                </fieldset>
            </div> 
            <div class="col-md-4 col-sm-4 col-lg-4 col-sx-4"><br>
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Fiche de vaccination </i></h5></legend> 

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->fiche_vacc}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-eye"></i> la piece jointe</a>
                        </div>
                       <!--  <div class="col-md-6 col-sm-6 col-lg-6 col-sx-6">
                            <a href="../storage/{{ $jugement->fiche_vacc}}" class="border-info form-control text-center"><i class="w- fas fa-fw fa-edit"></i> la piece jointe</a>
                        </div> -->
                    </div>
                </fieldset>
            </div> 


                </div>

            </div>
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button> -->
                    <a href="{{route('jugements.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
        </div>
    </div>
@stop