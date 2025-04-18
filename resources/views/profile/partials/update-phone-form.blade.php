@if (Auth::user()->usertype == 'admin')
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Nomor Telpon Admin') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Nomor Telpon Akan Tampil di Checkout Pembeli') }}
        </p>
    </header>

    <form method="post" action="{{ route('phone.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('name', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'phone-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

@else
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Nomor Telepon') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Nomor Telepon Dibutuhkan Untuk Kebutuhan Order dan Pengecekan Pembayaran') }}
        </p>
    </header>

    <form method="post" action="{{ route('phone.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('name', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button-user>{{ __('Save') }}</x-primary-button-user>

            @if (session('status') === 'phone-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

@endif