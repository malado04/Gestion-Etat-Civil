@extends('adminlte::page')

@section('title', ' Ajouter un utilisateur')

@section('content')<br>
    <form action="{{route('users.store')}}" method="post" class="container">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> Ajouter un utilisateur</h1>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nom" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Adresse email </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Adresse email " name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Profil de l'utilisateur </label>
                        <select name="admin" class="form-control">
                            <option value="admin">Adminstrateur</option>
                            <option value="maire">Maire</option>
                            <option value="principal">Principal</option>
                            <option value="tribunal">Tribunal</option>
                            <option value="Sage-Femme">Sage-Femme</option>
                        </select>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Confirmer votre mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Confirmer votre mot de passe" name="password_confirmation">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop