<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Portal — Pelayanan Disabilitas (PLD)</title>
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

    @stack('styles')

    <style>
        :root {
            --pld-primary: #56823D;
            --pld-primary-dark: #446830;
            --pld-secondary: #A8D27D;
            --pld-accent: #D99032;
            --pld-accent-hover: #c47e26;
            --pld-bg: #FAF8EE;
            --pld-card: #FFFFFF;
            --pld-text: #263238;
            --pld-text-muted: #546e7a;
            --pld-border: #e8e4d3;

            /* Backward-compatible aliases */
            --pld-purple: #56823D;
            --pld-purple-dark: #446830;
            --pld-orange: #D99032;
            --pld-orange-dark: #c47e26;
        }

        body, #main, .main {
            background-color: #FAF8EE !important;
            color: #263238 !important;
        }

        /* Header — Solid #56823D */
        .header {
            background-color: #56823D !important;
            border-bottom: 2.5px solid #A8D27D !important;
            box-shadow: 0 2px 14px rgba(38, 50, 56, 0.16) !important;
        }
        .header .logo span {
            color: #ffffff !important;
            font-weight: 800;
            letter-spacing: 0.5px;
        }
        .header .toggle-sidebar-btn {
            color: #ffffff !important;
        }
        .header .toggle-sidebar-btn:hover {
            color: #A8D27D !important;
        }
        .header .nav-profile {
            color: #ffffff !important;
        }
        .header .nav-profile span {
            color: #ffffff !important;
            font-weight: 700;
        }
        .header .nav-profile:hover span {
            color: #A8D27D !important;
        }
        .header .nav-icon {
            color: #ffffff !important;
        }
        .header .nav-icon:hover {
            color: #A8D27D !important;
        }

        /* Sidebar — #56823D */
        .sidebar {
            background-color: #56823D !important;
            box-shadow: 2px 0 15px rgba(38, 50, 56, 0.12) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        .sidebar::-webkit-scrollbar {
            width: 5px;
            height: 8px;
            background-color: #56823D;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 4px;
        }
        .sidebar-nav .nav-heading {
            color: rgba(255, 255, 255, 0.72) !important;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            margin: 14px 0 6px 12px;
        }
        .sidebar-nav .nav-link {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
            border-radius: 8px;
            margin-bottom: 4px;
            transition: all 0.2s ease;
        }
        .sidebar-nav .nav-link i {
            color: #A8D27D !important;
            transition: color 0.2s ease;
        }
        .sidebar-nav .nav-link.collapsed {
            background: transparent !important;
            color: rgba(255, 255, 255, 0.88) !important;
        }
        .sidebar-nav .nav-link.collapsed i {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        .sidebar-nav .nav-link:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.18) !important;
        }
        .sidebar-nav .nav-link:hover i {
            color: #A8D27D !important;
        }
        .sidebar-nav .nav-link:not(.collapsed) {
            background: rgba(0, 0, 0, 0.18) !important;
            color: #ffffff !important;
            font-weight: 700;
        }
        .sidebar-nav .nav-link:not(.collapsed) i {
            color: #A8D27D !important;
        }

        /* Status Aktif : #A8D27D */
        .sidebar-nav .nav-link.active,
        .sidebar-nav .nav-content a.active {
            background-color: #A8D27D !important;
            color: #263238 !important;
            font-weight: 700 !important;
            border-radius: 6px;
        }
        .sidebar-nav .nav-content a.active i {
            background-color: #263238 !important;
        }
        .sidebar-nav .nav-content {
            padding: 4px 0 6px 0;
            background: rgba(0, 0, 0, 0.10);
            border-radius: 8px;
            margin: 3px 0 6px 0;
        }
        .sidebar-nav .nav-content a {
            color: rgba(255, 255, 255, 0.88) !important;
            padding: 8px 12px 8px 36px;
            margin: 2px 6px;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-size: 13.5px;
        }
        .sidebar-nav .nav-content a i {
            background-color: rgba(255, 255, 255, 0.55);
        }
        .sidebar-nav .nav-content a:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.15) !important;
        }
        .sidebar-nav .nav-content a:hover i {
            background-color: #A8D27D !important;
        }

        /* Button Utama : #D99032 */
        .btn-primary {
            background-color: #D99032 !important;
            border-color: #D99032 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(217, 144, 50, 0.25);
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #c47e26 !important;
            border-color: #c47e26 !important;
            color: #ffffff !important;
            box-shadow: 0 6px 16px rgba(217, 144, 50, 0.35);
        }
        .btn-outline-primary {
            color: #D99032 !important;
            border-color: #D99032 !important;
        }
        .btn-outline-primary:hover {
            background-color: #D99032 !important;
            border-color: #D99032 !important;
            color: #fff !important;
        }
        .btn-warning {
            background-color: #D99032 !important;
            border-color: #D99032 !important;
            color: #fff !important;
        }
        .btn-warning:hover {
            background-color: #c47e26 !important;
            border-color: #c47e26 !important;
            color: #fff !important;
        }
        .btn-success {
            background-color: #56823D !important;
            border-color: #56823D !important;
            color: #fff !important;
        }
        .btn-success:hover {
            background-color: #446830 !important;
            border-color: #446830 !important;
            color: #fff !important;
        }

        /* Card : #FFFFFF */
        .card {
            background-color: #FFFFFF !important;
            border: 1px solid rgba(86, 130, 61, 0.12) !important;
            box-shadow: 0 4px 20px rgba(38, 50, 56, 0.05) !important;
            border-radius: 12px;
        }
        .card-header {
            background-color: #FFFFFF !important;
            border-bottom: 1px solid rgba(86, 130, 61, 0.1) !important;
        }
        .card-footer {
            background-color: #FAF8EE !important;
            border-top: 1px solid rgba(86, 130, 61, 0.1) !important;
        }

        .pagetitle h1 {
            color: #263238 !important;
            font-weight: 800;
        }
        .card-title {
            color: #56823D !important;
            font-weight: 700;
        }
        .back-to-top {
            background: #56823D !important;
        }
        .back-to-top:hover {
            background: #D99032 !important;
        }
        .pagination .page-item.active .page-link {
            background-color: #56823D !important;
            border-color: #56823D !important;
            color: #fff !important;
        }
        .pagination .page-link {
            color: #56823D;
        }
        .badge.bg-primary {
            background-color: #D99032 !important;
        }
        .badge.bg-success {
            background-color: #56823D !important;
        }
        .badge.bg-secondary, .badge-active {
            background-color: #A8D27D !important;
            color: #263238 !important;
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
                confirmButtonColor: '#D99032',
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

    <!-- TinyMCE CDN & Global Initialization -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof tinymce !== 'undefined') {
                const selector = 'textarea.tinymce-editor, textarea.tinymce, textarea#content, textarea#deskripsi, textarea#sambutan_dekan, textarea#answer, textarea#jawaban, textarea#sejarah, textarea#visi, textarea#misi, textarea#deskripsi_profil_1, textarea#deskripsi_profil_2';
                
                document.querySelectorAll(selector).forEach(function (el) {
                    if (!tinymce.get(el.id || el)) {
                        tinymce.init({
                            target: el,
                            height: 380,
                            menubar: false,
                            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table wordcount',
                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image | removeformat | code fullscreen',
                            content_style: 'body { font-family: Plus Jakarta Sans, Arial, sans-serif; font-size: 14px; line-height: 1.6; } img { max-width: 100%; height: auto; }',
                            image_title: true,
                            automatic_uploads: true,
                            file_picker_types: 'image',
                            images_upload_handler: function (blobInfo, progress) {
                                return new Promise((resolve, reject) => {
                                    const xhr = new XMLHttpRequest();
                                    xhr.withCredentials = false;
                                    xhr.open('POST', '{{ route("news.upload-image") }}');
                                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                                    xhr.upload.onprogress = (e) => {
                                        progress(e.loaded / e.total * 100);
                                    };

                                    xhr.onload = () => {
                                        if (xhr.status === 403 || xhr.status === 419) {
                                            reject({ message: 'Sesi berakhir atau CSRF token invalid.', remove: true });
                                            return;
                                        }
                                        if (xhr.status < 200 || xhr.status >= 300) {
                                            reject('Gagal upload gambar. HTTP Error: ' + xhr.status);
                                            return;
                                        }
                                        try {
                                            const json = JSON.parse(xhr.responseText);
                                            if (!json || typeof json.location !== 'string') {
                                                reject('Respon server tidak valid.');
                                                return;
                                            }
                                            resolve(json.location);
                                        } catch (e) {
                                            reject('Respon server error: ' + e.message);
                                        }
                                    };

                                    xhr.onerror = () => {
                                        reject('Gagal koneksi ke server saat mengunggah gambar.');
                                    };

                                    const formData = new FormData();
                                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                                    xhr.send(formData);
                                });
                            },
                            file_picker_callback: function (cb, value, meta) {
                                const input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');

                                input.addEventListener('change', (e) => {
                                    const file = e.target.files[0];
                                    if (!file) return;

                                    const reader = new FileReader();
                                    reader.addEventListener('load', () => {
                                        const id = 'blobid' + (new Date()).getTime();
                                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                        const base64 = reader.result.split(',')[1];
                                        const blobInfo = blobCache.create(id, file, base64);
                                        blobCache.add(blobInfo);

                                        cb(blobInfo.blobUri(), { title: file.name, alt: file.name });
                                    });
                                    reader.readAsDataURL(file);
                                });

                                input.click();
                            }
                        });
                    }
                });
            }
        });

        // Trigger TinyMCE save on form submit so data is always synchronized
        $(document).on('submit', 'form', function () {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
        });
    </script>

    @stack('scripts')
    @stack('styles')

</body>

</html>
