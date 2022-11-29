<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('welcome') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- メールアドレス -->
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" id="email" class="block mt-1 w-full rounded-lg" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">パスワード</label>
                <input type="password" id="password" class="block mt-1 w-full rounded-lg" name="password" required autocomplete="current-password" />
            </div>

            <div class="grid grid-cols-12 mt-3">
                <button type="submit" class="col-span-12 bg-black text-white text-sm rounded-lg px-5 py-3">ログイン</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
