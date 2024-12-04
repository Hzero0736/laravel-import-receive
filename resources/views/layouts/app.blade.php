<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-bottom: 2rem;
            padding-top: 80px;
        }

        .container {
            max-width: 1400px;
            padding: 0 2rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .08);
            margin-bottom: 2rem;
            transition: all .3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, .12);
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .table {
            font-size: 0.85rem;
        }

        .table th {
            background: #f8f9fa;
            font-weight: 600;
            white-space: nowrap;
            padding: 0.5rem;
        }

        .table td {
            padding: 0.5rem;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-responsive {
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .navbar {
            padding: 1rem 0;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: linear-gradient(135deg, #0d6efd, #0dcaf0);
                padding: 1rem;
                border-radius: 0.5rem;
                margin-top: 0.5rem;
            }

            .nav-link {
                margin: 0.25rem 0;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                <i class="fas fa-file-excel me-2"></i>
                Import Receive Data
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-file-import me-1"></i>Sheet 3
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sheet2') ? 'active' : '' }}" href="{{ url('/sheet2') }}">
                            <i class="fas fa-file-import me-1"></i>Sheet 2
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sheet3-table').DataTable({
                responsive: false,
                pageLength: 10,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#sheet2-table').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
                }
            });
        });
    </script>
</body>

</html>