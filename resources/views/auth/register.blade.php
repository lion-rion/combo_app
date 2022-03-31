@section('title','新規登録 - 格ゲー総合攻略')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>
        <div class="login_flex login_logo_wrap">
            <img class="login_logo" src="{{ asset('image/DzrVneqUcAARoIa.png') }}" alt="">
            <h2 class="login_h2">新規登録メニュー</h2>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="auth_input_wrap">
                <x-input class="auth_input" id="name" placeholder="ユーザーネーム" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="auth_input_wrap">
                <x-input class="auth_input" id="email" placeholder="メールアドレス" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="auth_input_wrap">

                <x-input class="auth_input" id="password" placeholder="パスワード"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="auth_input_wrap">

                <x-input class="auth_input" placeholder="パスワードの確認" id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="remember_menu_wrap">
                <a class="forget_password" href="{{ route('login') }}">
                    {{ __('既にアカウントをお持ちですか？') }}
                </a>
            </div>
            <div class="register_button_wrap">
                <x-button class="register_button">
                   規約に同意して登録する
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
