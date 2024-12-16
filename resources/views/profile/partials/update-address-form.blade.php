{{-- @if (Auth::user()->usertype == 'admin')
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Alamat Toko') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Akan Tampil di Halaman Tentang') }}
        </p>
    </header>

    <form method="post" action="{{ route('address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('name', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'address-updated')
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

@else --}}
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Alamat Pengiriman ') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Untuk Mengupdate Alamat Pengiriman Maka Pastikan Alamat Pengiriman Sudah Benar') }}
        </p>
    </header>

    <form method="post" action="{{ route('address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('name', $user->address)" required autofocus autocomplete="address" />
            
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button-user>{{ __('Save') }}</x-primary-button-user>

            @if (session('status') === 'address-updated')
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

{{-- @endif --}}