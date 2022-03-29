@section('title','新規登録 - 格ゲー総合攻略')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="auth_input_container" :errors="$errors" />

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

            <div class="register_button_wrap">
                <x-button class="register_button">
                   規約に同意して登録する
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
