@extends('../layouts/master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #services.select2-container .select2-selection--multiple {
            min-height: 38px;
            padding: 0.375rem 0.75rem;
        }
        .select2-container {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                 <div class="row row-sm ">
                    <div class="col-xl-12 col-md-12 col-lg-12 ">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary float-end fs-11" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal"><i class="ri-add-line"></i> Tambah Data Kost</button>
                                <h5 class="card-title mt-2">List Kost</h5>
                            </div>
                            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                <h4 class="card-title mg-b-10">Halaman Manajemen Kost</h4>
                                <div class="d-flex justify-content-between">
                                     <div class="card-body table-responsive">
                                        <table id="user-list" class="table table-bordered dt-responsive table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama Kost</th>
                                                    <th>Lokasi</th>
                                                    <th>Pemilik</th>
                                                    <th>Services</th>
                                                    <th>Foto Kost</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-modal="true" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Kost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="formTambahUser">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="nama_kost" class="form-label">Nama kost</label>
                                    <input type="text" class="form-control" id="nama_kost" name="nama_kost"
                                        placeholder="Masukkan Nama kost" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="services" class="form-label">Services</label>
                                    <select class="form-select js-example-basic-multiple" name="services[]" id="services" multiple="multiple" required>
                                        <option value="Wifi">Wifi</option>
                                        <option value="Listrik">Listrik</option>
                                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        placeholder="Masukkan Harga" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="pemilik" class="form-label">Pemilik</label>
                                    <input type="text" class="form-control" id="pemilik" name="pemilik"
                                        placeholder="Masukkan Pemilik" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="formFileSm" class="form-label">Foto Kost</label>
                                <input class="form-control form-control-sm" id="gambar" name="gambar" type="file" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="kontak_email" class="form-label">Email Pemilik</label>
                                    <input type="text" class="form-control" id="kontak_email" name="kontak_email"
                                        placeholder="Masukkan Email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="kontak_wa" class="form-label">Nomor WhatsApp Pemilik</label>
                                    <input type="text" class="form-control" id="kontak_wa" name="kontak_wa"
                                        placeholder="Masukkan Nomor WA" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel" aria-modal="true" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Kost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="formEditUser">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="nama_kost_detail" class="form-label">Nama kost</label>
                                    <input type="text" class="form-control" id="nama_kost_detail" name="nama_kost_detail"
                                        placeholder="Masukkan Nama kost" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="services_detail" class="form-label">Services</label>
                                    <select class="form-select js-example-basic-multiple" name="services_detail[]" id="services_detail" multiple="multiple" required>
                                        <option value="Wifi">Wifi</option>
                                        <option value="Listrik">Listrik</option>
                                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="harga_detail" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga_detail" name="harga_detail"
                                        placeholder="Masukkan Harga" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="pemilik_detail" class="form-label">Pemilik</label>
                                    <input type="text" class="form-control" id="pemilik_detail" name="pemilik_detail"
                                        placeholder="Masukkan Pemilik" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="formFileSm" class="form-label">Foto Kost</label>
                                <input class="form-control form-control-sm" id="gambar_detail" name="gambar_detail" type="file">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="kontak_email_detail" class="form-label">Email Pemilik</label>
                                    <input type="text" class="form-control" id="kontak_email_detail" name="kontak_email_detail"
                                        placeholder="Masukkan Email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="lokasi_detail" class="form-label">Lokasi</label>
                                    <textarea class="form-control" id="lokasi_detail" name="lokasi_detail" placeholder="Masukkan Lokasi"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="kontak_wa_detail" class="form-label">Nomor WhatsApp Pemilik</label>
                                    <input type="text" class="form-control" id="kontak_wa_detail" name="kontak_wa_detail"
                                        placeholder="Masukkan Nomor WA" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label for="deskripsi_detail" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi_detail" name="deskripsi_detail" placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                            </div>
                             <input type="text" class="form-control" style="display: none" id="id_detail" name="id_detail" required="required">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/libs/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        let editor, editor_detail;
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#deskripsi_detail'))
            .then(newEditor => {
                editor_detail = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

            $('#services').select2({
                dropdownParent: $('#addUserModal')
            });
            $('#services_detail').select2({
                dropdownParent: $('#detailUserModal')
            });

        let user_datatable = $("#user-list").DataTable({
            processing: true,
            serverSide: true,
            ajax: `{{ route('find-data-kost') }}`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'nama_kost',
                    name: 'nama_kost'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi',
                },
                {
                    data: 'pemilik',
                    name: 'pemilik',
                },
                {
                    data: 'services',
                    name: 'services',
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: true
                }
            ],
        });

        $("#user-list").on('click', '#btn-detail', function() {
            $("#detailUserModal").modal('show');
            let id = $(this).data("id");
            $.ajax({
                url: "{{ route('find-data-kost-id') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                method: "get",
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $("#id_detail").val(data[0]);
                    $("#nama_kost_detail").val(data[1]);
                    $("#harga_detail").val(data[2]);
                    $("#lokasi_detail").val(data[3]);
                    $("#pemilik_detail").val(data[4]);
                    $("#services_detail").val(data[5].split(',')).trigger('change');
                    $("#kontak_wa_detail").val(data[6]);
                    $("#kontak_email_detail").val(data[7]);
                    editor_detail.setData(data[8]);
                }
            });
        })

        $("#formTambahUser").on('submit', function(e) {
            e.preventDefault();

            let form = this;

            if (editor) {
                form.querySelector('#deskripsi').value = editor.getData();
            }

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            let formData = new FormData(this);

            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Form Anda sedang diproses!</h4><p class="text-muted mx-4 mb-0">Mohon tunggu...</p></div></div>',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: 'POST',
                url: `{{ route('store-kost') }}`,
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.close();

                    user_datatable.ajax.reload();

                    if (!res.error) {
                        form.reset();
                        $("#addUserModal").modal('hide');

                        Swal.fire({
                            html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Berhasil!</h4><p class="text-muted mx-4 mb-0">Selamat! Anda berhasil menambahkan data kost.</p></div></div>',
                            timer: 3000
                        })

                        user_datatable.ajax.reload();
                    } else {
                        Swal.fire({
                            html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops... Ada Kesalahan!</h4><p class="text-muted mx-4 mb-0">${Object.values(res.message)[0]}</p></div></div>`,
                            showCancelButton: !1,
                            showConfirmButton: !1,
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    }
                }
            });
        })

        $("#formEditUser").on('submit', function(e) {
            e.preventDefault();

            let form = this;

            if (editor_detail) {
                form.querySelector('#deskripsi_detail').value = editor_detail.getData();
            }

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            let formData = new FormData(this);

            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Form Anda sedang diproses!</h4><p class="text-muted mx-4 mb-0">Mohon tunggu...</p></div></div>',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: 'POST',
                url: `{{ route('edit-kost') }}`,
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.close();

                    user_datatable.ajax.reload();

                    if (!res.error) {
                        form.reset();
                        $("#detailUserModal").modal('hide');

                        Swal.fire({
                            html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Berhasil!</h4><p class="text-muted mx-4 mb-0">Selamat! Anda berhasil mengedit data kost.</p></div></div>',
                            timer: 3000
                        })

                        user_datatable.ajax.reload();
                    } else {
                        Swal.fire({
                            html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops... Ada Kesalahan!</h4><p class="text-muted mx-4 mb-0">${Object.values(res.message)[0]}</p></div></div>`,
                            showCancelButton: !1,
                            showConfirmButton: !1,
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    }
                }
            });
        })

        $("#user-list").on('click', '#btn-delete', function() {
            let id = $(this).data("id")
            var url = "{{ route('delete-kost', ':id') }}"
            url = url.replace(':id', id)
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Pastikan data yang anda hapus sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'delete',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Berhasil!</h4><p class="text-muted mx-4 mb-0">Selamat! Data berhasil dihapus.</p></div></div>',
                                    timer: 3000
                                }).then(() => {
                                    Swal.close();
                                    user_datatable.ajax.reload();
                                });
                            } else {
                                Swal.fire({
                                    html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops... Ada Kesalahan!</h4><p class="text-muted mx-4 mb-0">${response.message}</p></div></div>`,
                                    showCancelButton: !1,
                                    showConfirmButton: !1,
                                    buttonsStyling: !1,
                                    showCloseButton: !0
                                }).then(() => {
                                    Swal.close();
                                });
                            }
                        },
                        error: function(xhr) {
                            var response = JSON.parse(xhr.responseText);
                            var errorMessage = '';
                            for (var key in response.errors) {
                                if (response.errors.hasOwnProperty(key)) {
                                    errorMessage += response.errors[key][0] +
                                        '<br>';
                                }
                            }
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                html: errorMessage,
                                showConfirmButton: true
                            });
                        }
                    })
                }
            })
        })
    </script>
@endsection
