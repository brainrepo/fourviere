@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="full-page-card-container">
            <div class="w-full max-w-sm -mt-16">
                <div class="flex justify-center mb-6">
                    <img src="/images/logo.svg" alt="Logo" class="w-64">
                </div>
                <div class="full-page-card-card">

                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="f-form-item mb-6">
                            <label for="name" >
                                {{ __('Name') }}:
                            </label>

                            <input id="name" type="text" class="f-form-input @error('email') error @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="f-form-item mb-6">
                            <label for="email">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="f-form-input @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="f-form-item mb-6">
                            <label for="password">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="f-form-input @error('email') error @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="f-form-item mb-6">
                            <label for="password-confirm">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="f-form-input" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="f-button">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                {{ __('Already have an account?') }}
                                <a class="text-gray-500 hover:text-gray-700 no-underline" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
