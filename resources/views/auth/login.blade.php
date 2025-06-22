<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    @include('includes.style')
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
        }

        .login-box {
            margin-top: 5%;
        }

        .card-outline.card-primary {
            border-top: 3px solid #2a5298;
        }

        .btn-primary {
            background-color: #2a5298;
            border-color: #2a5298;
        }

        .btn-primary:hover {
            background-color: #1e3c72;
            border-color: #1e3c72;
        }

        .login-box-msg {
            font-weight: 500;
            color: #2a5298;
        }

        .text-link a {
            color: #2a5298;
        }

        .text-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary shadow">
            <div class="card-header text-center bg-white">
                <img src="{{ asset('assets/img/logoft.png') }}" alt="logo" width="100px" class="mb-2">
                <h5 class="m-0 font-weight-bold text-primary">SMP Negeri 2</h5>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger text-sm d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember"> Remember Me </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <div class="text-link mt-3">
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register a new account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('includes.script')
</body>

</html>
