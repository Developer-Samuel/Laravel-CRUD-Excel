@extends('app')

@section('content')
    <div class="content">
        @include('components.buttons.home')
        <div class="container">
            @include('components.alerts')
            <div class="users">
                <div class="title">
                    Create User
                </div>
                @include('components.users.forms.create')
            </div>
        </div>
    </div>
@endsection
