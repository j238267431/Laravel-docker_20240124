<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('showResultForm') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="milliseconds" :value="__('Milliseconds')" />

            <x-text-input id="milliseconds" class="block mt-1 w-full"
                            type="numer"
                            name="milliseconds"
                            required />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('getTop'))

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('getTop')  }}">
                {{ __('get top 10') }}
            </a>
        @endif

            <x-primary-button class="ms-3">
                {{ __('Send') }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>

