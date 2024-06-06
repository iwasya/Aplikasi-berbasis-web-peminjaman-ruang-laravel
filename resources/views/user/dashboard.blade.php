<!-- resources/views/user/dashboard.blade.php -->

@extends('layouts.app_user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->name }}!</p>
                    <p>You are logged in as a user.</p>
                    <!-- Tambahkan konten tambahan sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection