@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container">
    <h2 class="font-weight-bold mt-4 mb-4">Profile</h2>

    <form method="POST" action="/profile/edit/{{auth()->user()->id}}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" name="name" type="text" value="{{auth()->user()->name}}">
            </div>
        </div>

        <!-- Photo -->
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file mt-3" id="exampleFormControlFile1" name="image">
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" name="email" type="email" placeholder="" value="{{auth()->user()->email}}">
            </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                {{auth()->user()->gender}}
            </div>
        </div>

        <!-- Date Of Birth -->
        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-10">
                {{ auth()->user()->dob }}
            </div>
        </div>

        <div class="text-right mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    @if (session()->has('success-credential'))
    <div class="alert alert-success col-lg-5 mx-auto text-center" role="alert">
        {{ session('success-credential') }}
    </div>
    @endif

    @if (session()->has('error-credential'))
    <div class="alert alert-danger col-lg-5 mx-auto text-center" role="alert">
        {{ session('error-credential') }}
    </div>
    @endif

    <h2 class="font-weight-bold mt-4 mb-4">Account</h2>

    <form class="form" action="/profile/editPassword/{{auth()->user()->id }}" method="POST">
        {{csrf_field()}}

        <!-- Old Password -->
        <div class="form-group row">
            <label for="inputPasswordOld" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="oldPassword">
            </div>
        </div>

        <!-- New Password -->
        <div class="form-group row">
            <label for="inputPasswordNew" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="newPassword">
            </div>
        </div>

        <!-- Confirm New Password -->
        <div class="form-group row">
            <label for="inputPasswordConfirm" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="confirmPassword">
            </div>
        </div>

        <div class="text-right mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
