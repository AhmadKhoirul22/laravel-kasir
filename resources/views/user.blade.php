@extends('layout.template')
@section('content')
<div class="intro-y flex items-center mt-5 mb-5">
    <h1 class="font-bol text-lg">{{ $title }}</h1>
</div>
<div class="grid grid-cols-12">
    <div class="intro-y-col-span-12 lg:col-span-12">
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                timer: 3000
            });
        </script>
        @endif
        @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                confirmButtonText: 'OK',
                timer: 3000
            });
        </script>
        @endif

        <a href="javascript:;" data-toggle="modal" data-target="#large-modal-size-preview"
            class="button mr-1 mb-2 inline-block bg-theme-1 text-white">Tambah User</a>
            {{-- modal --}}
        <div class="modal" id="large-modal-size-preview" style="">
            <div class="modal__content modal__content--lg p-10">
                {{-- form --}}
                <div class="intro-y box mb-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Tambah User
                        </h2>
                    </div>
                    <div class="p-5" id="input">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="preview">
                                <div class="">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="input w-full border mt-2"
                                        placeholder="Your Name">
                                </div>
                                <div class="mt-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="input w-full border mt-2"
                                        placeholder="Your Username">
                                </div>
                                <div class="mt-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="input w-full border mt-2"
                                        placeholder="Password">
                                </div>
                                <div class="mt-3 float-right">
                                    <button type="submit"
                                        class="button w-24 mr-1 mb-2 bg-theme-1 text-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end form --}}
            </div>
        </div>
        {{-- end modal --}}
        {{-- data table --}}
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <table class="table table-report table-report--bordered display datatable w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">No</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Nama</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Username</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Akun Dibuat</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($user as $uu)

                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $no++ }}</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                {{ $uu['nama'] }}
                            </div>
                        </td>
                        <td class="text-center border-b">{{ $uu['username'] }}</td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center"> {{ $uu['created_at'] }} </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3" href=""> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <div>
                                    <form action="{{ route('user.destroy',$uu['id']) }}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="flex items-center text-theme-6" onclick="return confirm('yakin hapus data?')" >Delete</button>
                                    </form>
                                </div>
                                {{-- <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- end data table --}}
    </div>

</div>

@endsection
