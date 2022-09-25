@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container-md mt-4">
    <nav class="navbar navbar-light justify-content-center">
        <img src="assets/GameSlot-Logo.png" alt="" width="120px">
    </nav>

    <p class="text-center font-weight-bold">Sign Up Your Account</p>

    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <form action="/register/registerUser" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Name -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg" />
                                </div>

                                <!-- Email Address -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-lg" />
                                </div>

                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <!-- Gender -->
                                <div class="form-outline mb-4">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected hidden>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <!-- Date of Birth -->
                                <div class="form-group">
                                    <label for="exampleInputDate1">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" placeholder="mm/dd/yyyy">
                                </div>

                                <!-- Sign Up Button -->
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Sign Up</button>
                                </div>
                                <div class="alert alert-white" role="alert">
                                    @if ($errors->any())
                                    <i class="text-danger mt-1">{{$errors->first()}}</i>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
