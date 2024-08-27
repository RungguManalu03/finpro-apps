@extends('../layouts/master')

@section('style')
    <style>
        .flex-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
               <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center" style="min-height: 328px;">
                            <img src="{{ asset('storage/' . ($user->foto_profil ?? 'images/default.jpg')) }}"
                                alt="Foto Profil"
                                class="rounded-circle img-fluid mb-4 mt-4"
                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                            <h5 class="my-2 mb-3">{{ $user->nama_lengkap }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mb-4 px-3 py-3">
                            <div class="card-body flex-container" style="min-height: 300px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama Lengkap</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap }}" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Jabatan</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_telepon" value="{{ $user->no_telepon }}" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Foto Profil</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" name="foto_profil" class="form-control">
                                        {{-- @if($user->foto_profil)
                                            <small class="text-muted">Foto saat ini: <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" width="50" height="50"></small>
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">Update Profil</button>
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
