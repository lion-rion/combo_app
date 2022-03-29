@section('title','ログイン - 格ゲー総合攻略')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <div class="login_flex login_logo_wrap">
            <img class="login_logo" src="{{ asset('image/DzrVneqUcAARoIa.png') }}" alt="">
            <h2 class="login_h2">ログインメニュー</h2>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="auth_input_wrap">
                <x-input class="auth_input" id="email" placeholder="メールアドレス" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="auth_input_wrap">
                <x-input class="auth_input" id="password" placeholder="パスワード"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="remember_menu_wrap">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を維持') }}</span>
                </label>
            </div>

            <div class="remember_menu_wrap">
                @if (Route::has('password.request'))
                    <a class="forget_password" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れましたか？') }}
                    </a><br>
                @endif
                <br>
                <a class="forget_password" href="{{ route('register') }}">
                    {{ __('既にアカウントをお持ちですか？') }}
                </a>
                <div class="register_button_wrap">
                    <x-button class="register_button">
                        {{ __('ログイン') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
