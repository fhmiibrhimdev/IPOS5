<div class="sm:tw-fixed sm:tw-top-0 sm:tw-right-0 tw-p-6 text-end tw-z-10">
    @auth
        <a href="{{ url('/dashboard') }}" class="tw-font-semibold tw-text-gray-600 hover:tw-text-gray-900 dark:tw-text-gray-400 dark:hover:tw-text-white focus:outline focus:outline-2 focus:tw-rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="tw-font-semibold tw-text-gray-600 hover:tw-text-gray-900 dark:tw-text-gray-400 dark:hover:tw-text-white focus:outline focus:outline-2 focus:tw-rounded-sm focus:outline-red-500" wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ms-4 tw-font-semibold tw-text-gray-600 hover:tw-text-gray-900 dark:tw-text-gray-400 dark:hover:tw-text-white focus:outline focus:outline-2 focus:tw-rounded-sm focus:outline-red-500" wire:navigate>Register</a>
        @endif
    @endauth
</div>
