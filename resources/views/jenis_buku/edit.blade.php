@extends('layout')

@section('title', 'Edit Jenis Buku #' . $jenis_buku->id)

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
                    <form action="{{ route('jenis_buku.update', $jenis_buku->id) }}" method="POST" class="form">
                        @csrf
                        @method('PUT')
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2">Jenis <abbr title="required">*</abbr></label>
                                <input placeholder="Jenis buku..." class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-md h-10 px-4" required="required" type="text" name="jenis" value="{{ $jenis_buku->jenis }}">
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
                            <a href="{{ route('jenis_buku.index') }}" class="transition duration-300 ease-in-out mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-lg hover:shadow-lg">Batal</a>
                            <button class="transition duration-300 ease-in-out mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-lg hover:shadow-lg " type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
