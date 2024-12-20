<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terima kasih sudah mendaftar akun untuk Toko Jamu Mbak Piah!, sebelum kamu bisa menikmati fitur-fitur website lanjut. Kamu diharuskan untuk verifikasi email terlebih dahulu. Apabila tidak menerima email verifikasi, kamu bisa mengirimkan kembali email verifikasi melalui tombol berwarna kuning di bawah ini.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Sebuah email verifikasi baru telah dikirimkan ke alamat email kamu.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button-user>
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </x-primary-button-user>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
