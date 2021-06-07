@extends('layout')

@section('title', 'Detail Buku #' . $buku->id )

@section('content')

<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen flex items-center justify-center font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded-3xl p-10">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto">@yield('title')</h2>
                    <a href="{{ route('buku.index') }}" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded hover:shadow-lg hover:bg-gray-100">Kembali</a>
                </div>
                <div class="mt-5">
                    <p>#{{ $buku->id }}</p>
                    <p>{{ $buku->judul }}</p>
                    <p>{{ $buku->tahun_terbit }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
