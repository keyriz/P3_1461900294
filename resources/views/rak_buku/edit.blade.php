@extends('layout')

@section('title', 'Edit Buku #' . $rak_buku->id)

@section('content')

<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen flex items-center justify-center font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded-lg p-10">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto">@yield('title')</h2>
                    <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                </div>
                <div class="mt-5">
                    <form action="{{ route('rak_buku.update', $rak_buku->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2">Judul <abbr title="required">*</abbr></label>
                                <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-md h-10 px-4" required="required" name="id_buku">
                                    @foreach ($buku as $buku)
                                        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2">Jenis <abbr title="required">*</abbr></label>
                                <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-md h-10 px-4" required="required" name="id_jenis_buku">
                                    @foreach ($jenis_buku as $jenis_buku)
                                        <option value="{{ $jenis_buku->id }}">{{ $jenis_buku->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 space-y-2 w-full text-xs">
                            <label class=" font-semibold text-gray-600 py-2">Tahun Terbit <abbr title="required">*</abbr></label>
                            <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                <div class="flex">
                                    <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-md text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </div>
                                <input type="number" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-md rounded-l-none px-3 relative focus:border-blue focus:shadow" name="tahun_terbit" required="required" min="1900" max="2099" step="1" value="{{ $rak_buku->tahun_terbit }}">
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <a href="{{ route('rak_buku.index') }}" class="transition duration-300 ease-in-out mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-lg hover:shadow-lg">Batal</a>
                            <button class="transition duration-300 ease-in-out mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-lg hover:shadow-lg " type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
