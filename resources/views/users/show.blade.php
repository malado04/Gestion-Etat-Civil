@extends('layouts/app')

@section('content')
    <div class="profile-header" @if($user->id != '') style="background-image: url('{{ route('profile/banner', ['id' => $user->id]) }}');" @endif>
        <div class="profile-header-wrapper">
            <div class="container">
                @if($user->profile_image_url != '')
                <img class="img-thumbnail img-responsive center-block" width="180" src="{{ route('profile/image', ['profile_image_url' => $user->profile_image_url]) }}">
                @endif
                <h1>{{ $user->name }}</h1>
                <h2>@ {{ $user->username }}</h2>
            </div>
        </div>
    </div>
@endsection
