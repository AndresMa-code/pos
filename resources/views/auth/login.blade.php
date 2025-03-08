@extends('auth.body.main')

@section('container')
<div class="row align-items-center justify-content-center height-self-center">
    <div class="col-lg-8">
        <div class="card auth-card">
            <div class="card-body p-0">
                <div class="d-flex align-items-center auth-content">
                    <div class="col-lg-7 align-self-center">
                        <div class="p-3">

                            <h2 class="mb-2">Welcome to the POS system!</h2>
                            <p>Log in to your account</p>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" 
                                                   type="text" 
                                                   name="input_type" 
                                                   placeholder=" " 
                                                   value="{{ old('input_type') }}" 
                                                   autocomplete="off" 
                                                   required autofocus
                                                   style="border-color: #4B0082;"> <!-- Change the border to indigo color -->
                                                   <label style="color: #4B0082;">Email/Username</label>
                                        </div>
                                        @error('username')
                                        <div class="mb-4" style="margin-top: -20px">
                                            <div class="text-danger small">Incorrect username or password.</div>
                                        </div>
                                        @enderror
                                        @error('email')
                                        <div class="mb-4" style="margin-top: -20px">
                                            <div class="text-danger small">Incorrect username or password.</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror" 
                                                   type="password" 
                                                   name="password" 
                                                   placeholder=" " 
                                                   required 
                                                   style="border-color: #4B0082;"> <!-- Change the border to indigo -->
                                            <label style="color: #4B0082;">Password</label> <!-- Change label text color to indigo -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>
                                            Don't have an account? <a href="{{ route('register') }}" style="color: #4B0082;">Create Account</a>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="#" class="text-primary float-right" onclick="showMessage() "><p style="color: #4B0082;">Forgot Password?</p></a>
                                    </div>
                                    
                                    <script>
                                        function showMessage() {
                                            alert("Please contact admin to reset password!");
                                        }
                                    </script>
                                    
                                </div>
                                <button type="submit" class="btn btn bg-indigo" style="background-color: #4B0082; border-color: #4B0082;">Login</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-5 content-right">
                        <img src="{{ asset('assets/images/login/01.png') }}" class="img-fluid image-right" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
