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

    <p class="text-center font-weight-bold">Sign In to Your Account</p>

    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <form action="/login/loginUser" method="post">
                                @csrf
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

                                <!-- Remember Me -->
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>

                                <!-- Sign Up Button -->
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
@endsection
