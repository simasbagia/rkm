<x-front-layout>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center text-white bg-primary pt-4 pb-3">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body p-5">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating row mb-3">


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-floating row mb-3">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-floating row mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-0">
                                    <button type="submit" class="btn btn-primary text-white">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-end text-white bg-primary pt-1 pb-1">
                        <a href="/register" class="btn btn-primary active text-white">Buat Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-front-layout>