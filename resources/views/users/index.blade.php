@extends('adminlte::page')

@section('title', 'Liste des uUtilisateurs')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Liste des utilisateurs</h1>
                </div>
                <div class="card-body">

                    <a href="{{route('users.create')}}" class="btn btn-primary mb-2"> <i class="fa fa-user"></i>
                         Ajouter un utilisateur
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Profil</th>
                            <th>Opérations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <?php if ($user->admin==0): ?>
                                <td>Admin</td>
                                <?php endif ?>
                                <?php if ($user->admin==1): ?>
                                <td>Citoyen</td>
                                <?php endif ?>
                                <?php if ($user->admin==2): ?>
                                <td>Citoyen</td>
                                <?php endif ?>
                                <?php if ($user->admin==3): ?>
                                <td>Citoyen</td>
                                <?php endif ?>
                                <?php if ($user->admin==4): ?>
                                <td>Citoyen</td>
                                <?php endif ?>
                                <?php if ($user->admin==5): ?>
                                <td>Citoyen</td>
                                <?php else: ?>
                                    
                                <?php endif ?>
                                <td style="width: 17%;">
                                    <a href="{{route('users.edit', $user)}}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"> Modifier</i>
                                    </a>
                                    <a style="float: right;" href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> Supprimer</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush