<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration</title>

    @include('includes.style')
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
        }

        .register-box {
            margin-top: 4%;
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

        .input-group-text {
            background-color: #2a5298;
            color: white;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary shadow">
            <div class="card-header text-center bg-white">
                <img src="{{ asset('assets/img/logoft.png') }}" alt="logo" width="100px" class="mb-2" />
                <h5 class="m-0 font-weight-bold text-primary">SMP Negeri 2</h5>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Register a new account</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div class="input-group mb-3">
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- NIP --}}
                    <div class="input-group mb-3">
                        <input type="text" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror"
                            placeholder="NIP" value="{{ old('nip') }}" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-id-badge"></span></div>
                        </div>
                    </div>
                    @error('nip') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- Email --}}
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- No HP --}}
                    <div class="input-group mb-3">
                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                            placeholder="No HP" value="{{ old('no_hp') }}" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-phone"></span></div>
                        </div>
                    </div>
                    @error('no_hp') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- Jabatan --}}
                    <div class="input-group mb-3">
                        <input type="text" id="jabatan" name="jabatan"
                            class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan"
                            value="{{ old('jabatan') }}" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-briefcase"></span></div>
                        </div>
                    </div>
                    @error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- Password --}}
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- Confirm Password --}}
                    <div class="input-group mb-3">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Retype Password" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror

                    {{-- Level User --}}
                    <div class="form-group">
                        <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id" required>
                            <option disabled selected>-- Pilih Level User --</option>
                            @foreach ($levels as $level)
                                @if ($level->id != 1)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('level_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- Terms Checkbox & Submit --}}
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required />
                                <label for="agreeTerms">I agree to the terms</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-link">I already have an account</a>
                </div>
            </div>
        </div>
    </div>

    @include('includes.script')
</body>

</html>
