<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/logo-kost.jpg') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>


<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="col-12">
                    <center>
                        <div class="logo">
                            <img src="{{ asset('assets/logo-kost.jpg') }}"  style="width: 300px" />
                            <h4>Info Kost Apps </h4>
                        </div>
                        <div class="heading">
                            <h2>REGISTER</h2>
                            <h5>Silahkan masukkan data anda!</h5>
                        </div>
                    </center>
                    <div class="row mt-3">
                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <div class="input-wrap">
                                <input type="text" class="input-field" autocomplete="off" id="nama_lengkap" name="nama_lengkap"  placeholder="Nama Lengkap" required/>
                            </div>
                            <div class="input-wrap">
                                <input type="number" class="input-field" autocomplete="off" id="no_telepon" name="no_telepon"  placeholder="Nomor Telepon" required/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                            <div class="input-wrap">
                                <input type="text" class="input-field" autocomplete="off" id="email" name="email"  placeholder="Email" required/>
                            </div>
                            <div class="input-wrap">
                                <input type="password" class="input-field" autocomplete="off" id="password" name="password" placeholder="Password" required />
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <button id="register-btn" class="btn btn-dark">Register Akun</button>
                    </div>
                </center>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $(document).ready(function() {
            $('#register-btn').on('click', function(e) {
                e.preventDefault();
                var data = {
                    nama_lengkap: $('#nama_lengkap').val(),
                    no_telepon: $('#no_telepon').val(),
                    alamat: $('#alamat').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                };

                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Form Anda sedang diproses!</h4><p class="text-muted mx-4 mb-0">Mohon tunggu...</p></div></div>',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    url: '{{ route('register-authenticate') }}',
                    type: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        Swal.close();
                        if (!res.error) {
                            Swal.fire({
                                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Berhasil!</h4><p class="text-muted mx-4 mb-0">Selamat! Anda berhasil menambahkan user.</p></div></div>',
                                timer: 3000
                            })
                             window.location.href = res.redirectUrl;
                        } else {
                            Swal.fire({
                                html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops... Ada Kesalahan!</h4><p class="text-muted mx-4 mb-0">${Object.values(res.message)[0]}</p></div></div>`,
                                showCancelButton: !1,
                                showConfirmButton: !1,
                                buttonsStyling: !1,
                                showCloseButton: !0
                            })
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>
