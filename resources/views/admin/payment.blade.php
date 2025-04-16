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
                                    data-bs-target="#addUserModal"><i class="ri-add-line"></i> Tambah Data
                                    Pembayaran</button>
                                <h5 class="card-title mt-2">List Pembayaran Saya</h5>
                            </div>
                            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                <h4 class="card-title mg-b-10">Halaman Manajemen Pembayaran Kost {{ $namaKost }}</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="card-body table-responsive">
                                        <table id="user-list"
                                            class="table table-bordered dt-responsive table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Status</th>
                                                    <th>Bukti Pembayaran</th>
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


    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-modal="true"
        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="formTambahUser">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select class="form-control" id="bulan" name="bulan" required="required">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-control" id="tahun" name="tahun" required="required">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="formFileSm" class="form-label">Bukti Pembayaran</label>
                                <input class="form-control form-control-sm" id="gambar" name="gambar" type="file"
                                    required>
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

    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel" aria-modal="true"
        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Edit Data Kost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="formEditUser">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="bulan_detail" class="form-label">Bulan</label>
                                    <select class="form-control" id="bulan_detail" name="bulan_detail"
                                        required="required">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="tahun_detail" class="form-label">Tahun</label>
                                    <select class="form-control" id="tahun_detail" name="tahun_detail"
                                        required="required">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="formFileSm" class="form-label">Bukti Pembayaran</label>
                                <input class="form-control form-control-sm" id="gambar_detail" name="gambar_detail"
                                    type="file" required>
                            </div>
                            <input type="text" class="form-control" style="display: none" id="id_detail"
                                name="id_detail" required="required">
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
        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: "Bukti Pembayaran",
                showCloseButton: true,
                showConfirmButton: false,
                width: 'auto'
            });
        }
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let bulanSelect = document.getElementById("bulan");
            let tahunSelect = document.getElementById("tahun");

            // Buat opsi bulan dari 01 - 12
            for (let i = 1; i <= 12; i++) {
                let bulanValue = i.toString().padStart(2, '0'); // Format 01, 02, ..., 12
                let option = new Option(bulanValue, bulanValue);
                bulanSelect.add(option);
            }

            // Buat opsi tahun dari 2025 - 2027
            for (let tahun = 2025; tahun <= 2027; tahun++) {
                let option = new Option(tahun, tahun);
                tahunSelect.add(option);
            }

            // Set default bulan dan tahun saat ini
            let today = new Date();
            let currentMonth = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0 di JS
            let currentYear = today.getFullYear();

            // Pilih default bulan dan tahun jika masuk dalam rentang 2025-2027
            if (currentYear >= 2025 && currentYear <= 2027) {
                tahunSelect.value = currentYear;
            } else {
                tahunSelect.value = 2025; // Jika di luar rentang, set default ke 2025
            }
            bulanSelect.value = currentMonth;
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let bulanSelect = document.getElementById("bulan");
            let tahunSelect = document.getElementById("tahun");

            // Array nama bulan
            let namaBulan = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            // Buat opsi bulan dari 01 - 12 dengan nama bulan
            for (let i = 0; i < 12; i++) {
                let bulanValue = (i + 1).toString().padStart(2, '0'); // Format 01, 02, ..., 12
                let option = new Option(namaBulan[i], bulanValue); // Nama bulan ditampilkan, value tetap angka
                bulanSelect.add(option);
            }

            // Buat opsi tahun dari 2025 - 2027
            for (let tahun = 2025; tahun <= 2027; tahun++) {
                let option = new Option(tahun, tahun);
                tahunSelect.add(option);
            }

            // Set default bulan dan tahun saat ini
            let today = new Date();
            let currentMonth = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0 di JS
            let currentYear = today.getFullYear();

            // Pilih default bulan dan tahun jika masuk dalam rentang 2025-2027
            if (currentYear >= 2025 && currentYear <= 2027) {
                tahunSelect.value = currentYear;
            } else {
                tahunSelect.value = 2025; // Jika di luar rentang, set default ke 2025
            }
            bulanSelect.value = currentMonth;
        });
    </script>


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let bulanDetailSelect = document.getElementById("bulan_detail");
            let tahunDetailSelect = document.getElementById("tahun_detail");

            // Buat opsi bulan dari 01 - 12
            for (let i = 1; i <= 12; i++) {
                let bulanValue = i.toString().padStart(2, '0'); // Format 01, 02, ..., 12
                let option = new Option(bulanValue, bulanValue);
                bulanDetailSelect.add(option);
            }

            // Buat opsi tahun dari 2025 - 2027
            for (let tahun = 2025; tahun <= 2027; tahun++) {
                let option = new Option(tahun, tahun);
                tahunDetailSelect.add(option);
            }

            // Set default bulan dan tahun saat ini
            let today = new Date();
            let currentMonth = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0 di JS
            let currentYear = today.getFullYear();

            // Pilih default bulan dan tahun jika masuk dalam rentang 2025-2027
            if (currentYear >= 2025 && currentYear <= 2027) {
                tahunDetailSelect.value = currentYear;
            } else {
                tahunDetailSelect.value = 2025; // Jika di luar rentang, set default ke 2025
            }
            bulanDetailSelect.value = currentMonth;
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let bulanDetailSelect = document.getElementById("bulan_detail");
            let tahunDetailSelect = document.getElementById("tahun_detail");

            // Array nama bulan
            let namaBulan = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            // Buat opsi bulan dari 01 - 12 dengan nama bulan
            for (let i = 0; i < 12; i++) {
                let bulanValue = (i + 1).toString().padStart(2, '0'); // Format 01, 02, ..., 12
                let option = new Option(namaBulan[i], bulanValue); // Nama bulan ditampilkan, value tetap angka
                bulanDetailSelect.add(option);
            }

            // Buat opsi tahun dari 2025 - 2027
            for (let tahun = 2025; tahun <= 2027; tahun++) {
                let option = new Option(tahun, tahun);
                tahunDetailSelect.add(option);
            }

            // Set default bulan dan tahun saat ini
            let today = new Date();
            let currentMonth = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0 di JS
            let currentYear = today.getFullYear();

            // Pilih default bulan dan tahun jika masuk dalam rentang 2025-2027
            if (currentYear >= 2025 && currentYear <= 2027) {
                tahunDetailSelect.value = currentYear;
            } else {
                tahunDetailSelect.value = 2025; // Jika di luar rentang, set default ke 2025
            }
            bulanDetailSelect.value = currentMonth;
        });
    </script>



    <script>
        function formatMonth(monthNumber) {
            // Convert to number in case it's a string
            monthNumber = parseInt(monthNumber);

            // Add leading zero for months 1-9
            if (monthNumber >= 1 && monthNumber <= 9) {
                return "0" + monthNumber;
            }
            // Return as is for months 10-12
            else {
                return monthNumber.toString();
            }
        }
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
            ajax: `{{ route('find-data-payment') }}`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'bulan',
                    name: 'bulan',
                    searchable: true
                }, // ✅ Bisa cari berdasarkan nama bulan
                {
                    data: 'tahun',
                    name: 'tahun',
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return data; // ✅ Render badge HTML
                    }
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });

        $("#user-list").on('click', '#btn-detail', function() {
            $("#detailUserModal").modal('show');
            let id = $(this).data("id");

            $.ajax({
                url: "{{ route('find-data-payment-id') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                method: "get",
                dataType: "json",
                success: function(data) {

                    $("#id_detail").val(data[0]);
                    $("#bulan_detail").val(formatMonth(data[1]));
                    $("#tahun_detail").val(data[2]);
                }
            });
        });


        $("#formTambahUser").on('submit', function(e) {
            e.preventDefault();

            let form = this;

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
                url: `{{ route('store-payment') }}`,
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
                url: `{{ route('edit-payment') }}`,
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
