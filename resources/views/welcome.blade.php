<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ETAT-CIVIL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>

            body{
                font-family: "Times New Roman", 'Nunito';
            }

        </style>
    </head>
    <body>
        <!-- <img src="vendor/adminlte/dist/img/AdminLTELogo.png" style="position: absolute; z-index: +2%; width:6%;"> -->
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 md:pt-0 bg-info h-175" style="height:125px;">
        <!-- <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0"> -->
            <h2  style="padding: 1%; position: absolute; z-index: +2%; width:25%;">Etat-Civil</h2>
            @if (Route::has('login'))
                <div class="bg-info fixed top-0 right-0 px-6 py-4 sm:block float-right">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Accueil</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
            <div class="container pt-9" style="margin-top:15%">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="bg-info text-white p-2  w-65">
                        <h5>
                            <i class="img-circle fas fa-fw fa-info border border-white p-2"></i> 
                                Entrer votre numéro de régistre pour voir si vous étes déja enregistrer
                            </h5>
                    </legend>     
                    <div class="form-group">
                        <label for="exampleInputName">N° de registre</label>
                        <input type="text" class="form-control @error('cni_rgi') is-invalid @enderror" id="exampleInputName" placeholder="N° de Registre" name="cni_rgi" value="{{old('cni_rgi')}}" required="">
                        @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="form-group items-center">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
                </fieldset>

            </div>
    </body>
</html>
