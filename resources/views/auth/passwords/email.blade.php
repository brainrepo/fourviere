@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="full-page-card-container">
            <div class="w-full max-w-sm -mt-16">
                <div class="flex justify-center mb-6">
                    <img src="/images/logo.svg" alt="Logo" class="w-64">
                </div>


                @if (session('status'))
                    <div class="text-sm rounded text-green-700 bg-green-100 px-3 py-4 mb-4 shadow" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="full-page-card-card">
                    <form class="w-full p-6" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="f-form-input w-full @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="f-button">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                <a class="text-gray-500 hover:text-gray-700 no-underline" href="{{ route('login') }}">
                                    {{ __('Back to login') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
