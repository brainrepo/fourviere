@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="full-page-card-container">
            <div class="w-full max-w-sm -mt-16">
                <div class="flex justify-center mb-6">
                    <img src="/images/logo.svg" alt="Logo" class="w-64">
                </div>
                <div class="full-page-card-card">

                    <form class="w-full p-8" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="f-form-item">
                            <label for="email">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="f-form-input @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <p class="f-form-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="f-form-item mb-6">
                            <label for="password">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="f-form-input @error('password') error @enderror" name="password" required>

                            @error('password')
                            <p class="f-form-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="f-form-item mb-6">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox text-gray-800 outline-none focus:outline-none" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="f-button">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-500 hover:text-gray-700 whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                    {{ __("Don't have an account?") }}
                                    <a class="text-gray-500 hover:text-gray-700 no-underline" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
