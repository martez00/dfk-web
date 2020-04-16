@extends('auth.template')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-5">
                <form class="login100-form validate-form" method="POST" action="{{ route('postLogin') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="login100-form-title p-b-70">
						Prisijungimas
					</span>
                    <span class="login100-form-avatar">
						<img src="http://dfk-web.test/images/logo.png" alt="AVATAR">
					</span>
                    @if($errors->any())
                        <div class="alert alert-danger m-t-35">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-t-35 m-b-35" data-validate="email">
                        <input class="input100" type="email" id="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100" data-placeholder="El. paštas"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="password">
                        <input class="input100" type="password" id="password" name="password">
                        <span class="focus-input100" data-placeholder="Slaptažodis"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Prisijungti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection