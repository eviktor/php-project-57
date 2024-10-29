<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('verify.thanks') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __('verify.description') }}
        </div>
    @endif

    <div class="flex items-center justify-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('verify.resend') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('verify.logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>
