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

                            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                                <h4 class="card-title mg-b-10">Halaman Manajemen Booking</h4>
                                <div class="d-flex justify-content-between">
                                     <div class="card-body table-responsive">
                                        <table id="user-list" class="table table-bordered dt-responsive table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama User</th>
                                                    <th>Nama Kost</th>
                                                    <th>Harga</th>
                                                    <th>Alamat Kost</th>
                                                    <th>Status</th>
                                                    <th>Foto Transaksi</th>
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

    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel" aria-modal="true" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="formEditUser">
                        @csrf
                        <div class="row g-3">
                            <!-- User Details -->
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="nama_user_detail" class="form-label">Nama Pemesan</label>
                                    <input type="text" class="form-control" id="nama_user_detail" name="nama_user_detail"
                                        placeholder="Masukkan Nama Pengguna" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="nama_kost_detail" class="form-label">Nama Kost</label>
                                    <input type="text" class="form-control" id="nama_kost_detail" name="nama_kost_detail"
                                        placeholder="Masukkan Nama Kost" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="email_user_detail" class="form-label">Email Pemesan</label>
                                    <input type="text" class="form-control" id="email_user_detail" name="email_user_detail"
                                        placeholder="Masukkan Email Pengguna" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="harga_detail" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga_detail" name="harga_detail"
                                        placeholder="Masukkan Harga" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="no_telepon_user_detail" class="form-label">Nomor WA pemesan</label>
                                    <input type="text" class="form-control" id="no_telepon_user_detail" name="no_telepon_user_detail"
                                        placeholder="Masukkan Nomor Telepon" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="services_detail" class="form-label">Services</label>
                                    <input type="text" class="form-control" id="services_detail" name="services_detail"
                                        placeholder="Masukkan Nomor Telepon" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="deskripsi_detail" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi_detail" name="deskripsi_detail" placeholder="Masukkan Deskripsi" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <label for="lokasi_detail" class="form-label">Lokasi</label>
                                    <textarea class="form-control" id="lokasi_detail" name="lokasi_detail" placeholder="Masukkan Lokasi" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div>
                                    <label for="foto_transaksi_detail" class="form-label" style="display: block;">Foto Transaksi</label>
                                    <img id="foto_transaksi_detail" src="" alt="Foto Transaksi" class="img-fluid" style="max-height: 200px;">
                                </div>
                            </div>
                            <input type="text" class="form-control" style="display: none" id="id_detail" name="id_detail" required="required">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" id="approveBtn" style="display: none;" onclick="approveTransaksi()">Approve</button>
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
        var userRole = @json(Auth::user()->role);
        let editor, editor_detail;
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });
        let user_datatable = $("#user-list").DataTable({
            processing: true,
            serverSide: true,
            ajax: `{{ route('find-data-booking') }}`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nama_kost',
                    name: 'nama_kost',
                },
                {
                    data: 'harga',
                    name: 'harga',
                     render: function(data, type, row) {
                        return formatRupiah(data);
                    }
                },
                {
                    data: 'lokasi',
                    name: 'lokasi',
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'foto_transaksi',
                    name: 'foto_transaksi',
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

        function previewImage(imageSrc) {
            const modalHtml = `
                <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imagePreviewModalLabel">Detail Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="${imageSrc}" class="img-fluid" alt="Preview Image">
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('body').append(modalHtml);
            $('#imagePreviewModal').modal('show');

            $('#imagePreviewModal').on('hidden.bs.modal', function () {
                $('#imagePreviewModal').remove();
            });
        }

        $("#user-list").on('click', '#btn-detail', function() {
            $("#detailUserModal").modal('show');
            var transaksiId = $(this).data('id');

            $.ajax({
                    url: '/find-data-booking-id/' + transaksiId,
                    method: 'GET',
                    success: function(response) {
                        if(response.success) {
                            var transaksi = response.data;

                            $('#nama_user_detail').val(transaksi.user_nama);
                            $('#email_user_detail').val(transaksi.email);
                            $('#id_detail').val(transaksi.id);

                            $('#nama_kost_detail').val(transaksi.nama_kost);
                            $('#services_detail').val(transaksi.services);
                            $('#harga_detail').val(transaksi.harga);
                            $('#kontak_email_detail').val(transaksi.email);
                            $('#lokasi_detail').val(transaksi.lokasi);
                            $('#no_telepon_user_detail').val(transaksi.no_wa);
                            $('#deskripsi_detail').val(transaksi.deskripsi);
                            if (transaksi.status === 'request') {
                               if (userRole === 'admin') {
                                        $('#approveBtn').show();
                                    } else {
                                        $('#approveBtn').hide();
                                    }
                            } else {
                                $('#approveBtn').hide();
                            }
                            if (transaksi.foto_transaksi) {
                                $('#foto_transaksi_detail').attr('src',`http://127.0.0.1:8000/storage/${transaksi.foto_transaksi}`).show();
                            } else {
                                $('#foto_transaksi_detail').hide();
                            }

                            // Open modal
                            $('#detailUserModal').modal('show');
                        }
                    }
            });
        });
        function approveTransaksi() {
            var id = $('#id_detail').val();

            $.ajax({
                url: '/approve/' + id,
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Transaksi berhasil di-approve!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#detailTransaksiModal').modal('hide');
                            location.reload();
                        }
                    });
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat meng-approve transaksi.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
         function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + ribuan;
        }
    </script>
@endsection
