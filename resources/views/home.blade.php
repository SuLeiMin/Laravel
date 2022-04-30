@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}-->
                    <br>
                    <input type="text" name="search" placeholder="Search">
                    <br><br>
                    <a href="#" class="btn btn-primary">Register</a>
                    <a href="#" class="btn btn-primary">Update</a>
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
