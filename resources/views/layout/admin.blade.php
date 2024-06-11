<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jurnal Kelas App</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo-unuha.jpeg') }}" />

        <!-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> -->

        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('assets/js/config.js') }}"></script>
    </head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('include.sidebar')

                <div class="layout-page">
                    @include('include.navbar')

                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('error')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @yield('content')
                        </div>

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                            Powered by © <a href="https://pti.unha.ac.id/">PTI Universitas Nurul Huda</a> 2022
                            </div>
                        </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- MODAL DELETE -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" id="delete" data-id="">Ya</button>
                </div>
                </div>
            </div>
        </div>
        <!-- ./MODAL DELETE -->

    </body>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/datatables-demo.js?v=0.0.6') }}"></script>

    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <script src="{{ asset('assets/js/qr-code.js?v=0.0.2') }}"></script>
    

    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })();
    </script>
    <script>
        $( document ).ready(function() {
            $(".delete").click(function() {
                var delId = $(this).attr('data-id');
                $("#delete").attr("data-id", delId);
            });

            $("#delete").click(function() {
                var frmId = $(this).attr("data-id");

                $("#form-"+frmId).submit();
            });

            //download mahasiswa
            $(".btn-download").click(function() {
                var mhsId = $(this).attr('data-id');
                var uuid = $(this).attr('data-uuid');

                var formData = {
                    'id_mahasiswa' : mhsId,
                    '_token' : uuid
                }
                var ini = $(this)

                $.ajax({
                    url: "/download-mhs",
                    type: "post",
                    data: formData,
                    success: function (response) {
                        if (response.error_code == 0) {
                            alert("Download Berhasil")
                        } else {
                            alert(response.error_message)
                        }
                    },
                    beforeSend : function() {
                        ini.prop('disabled', true);
                        ini.text('Downloading')
                    },
                    complete : function() {
                        ini.prop('disabled', false);
                        ini.text('Download')
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</html>