<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di NilaSense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">
                        Ini adalah halaman utama NilaSense. Tempat untuk menampilkan info menarik dan konten lainnya.
                    </p>

                    @auth
                        <div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            Anda berhasil login sebagai <strong>{{ Auth::user()->name }}</strong>.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
