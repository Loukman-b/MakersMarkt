<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Verkoper worden') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Als verkoper kun je producten aanbieden op het platform.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.updateRole') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="rol" class="flex items-center gap-2 cursor-pointer">
                <input 
                    type="checkbox" 
                    id="rol" 
                    name="rol" 
                    value="1"
    {{ auth()->user()->isSeller() ? 'checked' : '' }}
                    class="rounded border-gray-300"
                />
                <span class="text-sm text-gray-700">Ik wil verkoper worden</span>
            </label>
            <p class="text-xs text-gray-500 mt-1">
                Als verkoper kun je producten aanbieden op het platform.
            </p>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'role-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>