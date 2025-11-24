<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
                    <p>Anda berhasil login. Ini halaman dashboard Anda.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
