@extends('layout')

@section('title', 'Jenis Buku')

@section('content')

<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen flex items-center justify-center overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="flex items-center py-6">
                <div class="mr-4 flex-none overflow-hidden">
                    <h2 class="font-semibold text-lg m-auto">Tabel @yield('title')</h2>
                </div>
                <a class="transition duration-300 ease-in-out mb-2 md:mb-0 bg-green-400 px-5 py-2 text-xs shadow-sm font-small tracking-wider text-white rounded-lg hover:shadow-lg " href="{{ route('jenis_buku.create') }}">Tambah Baru</a>
            </div>
            <!-- Start kode untuk form pencarian -->
            <form class="flex" method="get" action="{{ url()->current() }}">
                <div class="relative text-gray-600">
                    <input type="search" name="cari" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-lg text-sm focus:outline-none" value="{{ request('cari') }}">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <div class="bg-white shadow-xl rounded-lg my-6 overflow-auto">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nomor</th>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Jenis</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">

                        <?php if (count($jenis_buku) <= 0): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap" colspan="6">
                                    <div class="flex items-center">
                                        Data Kosong
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                        @foreach ($jenis_buku as $jenis_buku)

                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ ++$i }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    {{ $jenis_buku->id }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    {{ $jenis_buku->jenis }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('jenis_buku.destroy',$jenis_buku->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex item-center justify-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('jenis_buku.show',$jenis_buku->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('jenis_buku.edit',$jenis_buku->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>

                                        <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data #{{ $jenis_buku->id }}?')">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
