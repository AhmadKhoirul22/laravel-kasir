@extends('layout.template')
@section('content')
<div class="intro-y flex items-center mt-5 mb-5">
    <h1 class="font-bold text-lg">{{ $title }}</h1>
</div>
<div class="grid grid-cols-12">
    <div class="intro-y col-span-12 lg:col-span-12">
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                timer: 5000
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
                                    <input type="text" name="name" class="input w-full border mt-2"
                                        placeholder="Your Name">
                                </div>
                                <div class="mt-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="input w-full border mt-2"
                                        placeholder="Your Username">
                                </div>
                                <div class="mt-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="input w-full border mt-2"
                                        placeholder="Your Email">
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
                        <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
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
                                {{ $uu['name'] }}
                            </div>
                        </td>
                        <td class="text-center border-b">{{ $uu['email'] }}</td>
                        <td class="text-center border-b">{{ $uu['username'] }}</td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center"> {{ $uu['created_at'] }} </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3 text-theme-4 " href="javascript:;" data-toggle="modal"
                                    data-target="#large-modal-size-preview<?= $uu['id'] ?>">
                                    <i data-feather="edit" ></i>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> --}}
                                    Edit </a>
                                <div>
                                    <form action="{{ route('user.destroy', $uu['id']) }}" method="post" id="delete-form-{{ $uu['id'] }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="flex items-center text-theme-6 delete-button" data-id="{{ $uu['id'] }}">
                                            <i data-feather="trash" ></i>
                                        </button>
                                    </form>
                                </div>
                                {{-- <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> --}}
                            </div>
                            {{-- modal --}}
                            <div class="modal" id="large-modal-size-preview{{ $uu['id'] }}" style="">
                                <div class="modal__content modal__content--lg p-10">
                                    <div class="intro-y box mb-5">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                            <h2 class="font-medium text-base mr-auto">
                                                Edit User
                                            </h2>
                                        </div>
                                        <div class="p-5" id="input">
                                            <form action="{{ route('user.update',$uu['id']) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="preview">
                                                    <div class="">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="input w-full border mt-2"
                                                            placeholder="Your Name" value="{{ $uu['nama'] }}" >
                                                    </div>
                                                    <div class="mt-3">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="input w-full border mt-2"
                                                            placeholder="Your Username" value="{{ $uu['username'] }}" >
                                                    </div>
                                                    <div class="mt-3">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="input w-full border mt-2"
                                                            placeholder="Your Email" value="{{ $uu['email'] }}" >
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
                                </div>
                            </div>
                            {{-- end modal --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- end data table --}}
    </div>

</div>
<script>
    // Event listener untuk tombol delete
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id'); // Ambil ID dari atribut data-id
            const form = document.getElementById(`delete-form-${id}`); // Temukan form sesuai ID

            Swal.fire({
                title: 'Yakin hapus data?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika pengguna mengonfirmasi
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
