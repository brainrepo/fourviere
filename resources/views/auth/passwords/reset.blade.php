@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="full-page-card-container">
            <div class="w-full max-w-sm -mt-16">
                <div class="flex justify-center mb-6">
                    <img src="/images/logo.svg" alt="Logo" class="w-64">
                </div>
                <div class="full-page-card-card">
                    <form class="w-full p-6" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="f-form-item mb-6">
                            <label for="email">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="f-form-input @error('email') error @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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

                            <input id="password" type="password" class="f-form-input @error('password') error @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="f-form-input" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="f-button">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
