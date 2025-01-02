@extends('adminlte::page')
@section('title', 'Etat Civil')
@section('content_header')
    <h4 class="m-0 text-dark">
          <b> Tableau de bord</b>
        <span class="float-right">
        </span>
    </h4>
@stop
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
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-danger text-danger p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-danger p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($citoyens) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i></legend>
                                <h5><b>Citoyens</b></h5>
                                 
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-warning text-warning p-2" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-warning p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($naissances) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user-nurse float-right"></i></legend>
                                <h5><b>Naissances</b></h5>
                                 
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-dark text-dark p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-dark p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($citoyens) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-clock float-right"></i></legend>
                                <h5><b>Jugements</b></h5>
                                 
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-success text-success p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-success p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($mariages) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user-friends float-right"></i></legend>
                                <h5><b>Mariages</b></h5>
                                 
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                           <br><br> <fieldset class="border border-primary text-primary p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($divorces) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-users-slash float-right"></i></legend>
                                <h5><b>Divorces</b></h5>
                                 
                            </fieldset>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                           <br><br> <fieldset class="border border-black text-black p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-light p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($deces) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user-nurse float-right"></i></legend>
                                <h5><b>Deces</b></h5>
                                 
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                           <br><br> <fieldset class="border border-warning text-warning p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-warning p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ count($users) }} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user-nurse float-right"></i></legend>
                                <h5><b>Utilisateur</b></h5>
                                 
                            </fieldset>
                        </div>



                        </div>
      <!--                   <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
        <div class="w-full alert-gray-200 alert-success text-left border border-gray-300 px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{#{ count($jugements) }}</span>
                <span class="leading-tight">jugements <i class="fas fa-fw fa-user-nurse"></i></span>
            </h3>

        </div>
                            
                        </div> -->
</div>


                </div>
            </div>
        </div>
    </div>
@stop
