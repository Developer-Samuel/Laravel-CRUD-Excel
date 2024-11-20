@extends('app')

@section('content')
    <div class="content">
        <div class="container">
            @include('components.alerts')
            <div class="users">
                <div class="title">
                    Users
                </div>
                <div class="action" id="add-action">
                    <a href="{{ route('users.add') }}" class="btn-main">Create</a>
                </div>
                @include('components.users.table')
            </div>
        </div>
    </div>
@endsection
