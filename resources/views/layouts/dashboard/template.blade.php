<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Portal — Fakultas Ilmu Kesehatan (FIKES)</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logouis.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('assets/img/logouis.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{--  datatables CSS  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">

    <style>
        :root {
            --fikes-purple: #823ca2;
            --fikes-purple-dark: #672985;
            --fikes-orange: #ff9c00;
            --fikes-orange-dark: #e08800;
        }
        /* Header — Solid Purple #823ca2 */
        .header {
            background-color: #823ca2 !important;
            border-bottom: 2.5px solid #ff9c00 !important;
            box-shadow: 0 2px 14px rgba(0, 0, 0, 0.16) !important;
        }
        .header .logo span {
            color: #ff9c00 !important;
            font-weight: 800;
            letter-spacing: 0.5px;
        }
        .header .toggle-sidebar-btn {
            color: #ffffff !important;
        }
        .header .toggle-sidebar-btn:hover {
            color: #ff9c00 !important;
        }
        .header .nav-profile {
            color: #ffffff !important;
        }
        .header .nav-profile span {
            color: #ffffff !important;
            font-weight: 700;
        }
        .header .nav-profile:hover span {
            color: #ff9c00 !important;
        }
        .header .nav-icon {
            color: #ffffff !important;
        }
        .header .nav-icon:hover {
            color: #ff9c00 !important;
        }
        .sidebar-nav .nav-link {
            background: #fdfaff;
            color: #823ca2;
        }
        .sidebar-nav .nav-link:not(.collapsed) {
            background: #f3e8f8;
            color: #823ca2;
        }
        .sidebar-nav .nav-link:not(.collapsed) i {
            color: #823ca2;
        }
        .sidebar-nav .nav-content a.active {
            color: #823ca2;
            font-weight: 700;
        }
        .sidebar-nav .nav-content a.active i {
            background-color: #ff9c00;
        }
        .sidebar-nav .nav-link:hover {
            color: #ff9c00;
            background: #fcf6ff;
        }
        .sidebar-nav .nav-link:hover i {
            color: #ff9c00;
        }
        .btn-primary {
            background-color: #823ca2 !important;
            border-color: #823ca2 !important;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #672985 !important;
            border-color: #672985 !important;
        }
        .btn-outline-primary {
            color: #823ca2 !important;
            border-color: #823ca2 !important;
        }
        .btn-outline-primary:hover {
            background-color: #823ca2 !important;
            color: #fff !important;
        }
        .btn-warning {
            background-color: #ff9c00 !important;
            border-color: #ff9c00 !important;
            color: #fff !important;
        }
        .btn-warning:hover {
            background-color: #e08800 !important;
            border-color: #e08800 !important;
            color: #fff !important;
        }
        .pagetitle h1 {
            color: #823ca2;
        }
        .card-title {
            color: #823ca2;
        }
        .back-to-top {
            background: #823ca2;
        }
        .back-to-top:hover {
            background: #ff9c00;
        }
    </style>
</head>

<body>
    @include('layouts.dashboard.header')
    @include('layouts.dashboard.sidebar')


    <main id="main" class="main">
        @include('sweetalert::alert')

        @yield('content')

    </main>

    @include('layouts.dashboard.footer')



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- jQuery & DataTables JS (Required for all Admin DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Global SweetAlert2 Handlers --}}
    <script>
        // Global Logout Confirmation with SweetAlert2
        window.confirmLogout = function (e, url) {
            if (e) e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: 'Apakah Anda yakin ingin keluar dari sistem?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#823ca2',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="bi bi-box-arrow-right me-1"></i> Ya, Keluar',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-4 shadow-lg border-0',
                    confirmButton: 'px-4 py-2 rounded-3 fw-semibold',
                    cancelButton: 'px-4 py-2 rounded-3 fw-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url || "{{ route('logout') }}";
                }
            });
            return false;
        };

        // Intercept DataTables & Form Deletions with SweetAlert2
        $(document).on('submit', 'form', function (e) {
            const form = this;
            const isDelete = $(form).find('input[name="_method"][value="DELETE"]').length > 0;
            const onsubmitAttr = form.getAttribute('onsubmit') || '';
            const hasConfirm = onsubmitAttr.includes('confirm');
            
            if ((isDelete || hasConfirm) && !form.dataset.swalConfirmed) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let title = 'Apakah Anda yakin?';
                let text = 'Data yang dihapus tidak dapat dikembalikan!';

                // Extract custom message if present in onsubmit="return confirm('...')"
                const match = onsubmitAttr.match(/confirm\(['"](.*?)['"]\)/);
                if (match && match[1]) {
                    title = match[1];
                }

                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bi bi-trash-fill me-1"></i> Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-4 shadow-lg border-0',
                        confirmButton: 'px-4 py-2 rounded-3 fw-semibold',
                        cancelButton: 'px-4 py-2 rounded-3 fw-semibold'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.dataset.swalConfirmed = 'true';
                        form.removeAttribute('onsubmit');
                        form.submit();
                    }
                });

                return false;
            }
        });
    </script>

    @stack('scripts')
    @stack('style')

</body>

</html>
