@extends('app')

@section('content')
    <div class="content">
        @include('components.buttons.home')
        <div class="container">
            @include('components.alerts')
            <div class="users">
                <div class="title">
                    User [{{ $user->Username }}]
                </div>
                @include('components.users.forms.edit', ['user' => $user])
            </div>
        </div>
    </div>
@endsection
