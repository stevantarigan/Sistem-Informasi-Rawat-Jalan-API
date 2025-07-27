<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Tindakan</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --info-color: #560bad;
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.18);
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-dark: #2b2d42;
            --text-light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 200vh;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            color: white;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 0;
            position: relative;
            display: inline-block;
            font-size: 2rem;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .header-icon {
            font-size: 1.8rem;
            margin-right: 15px;
            color: var(--accent-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 12px 28px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: var(--secondary-color);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: -1;
        }

        .btn-primary:hover::before {
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.6);
        }

        .btn-primary i {
            margin-right: 8px;
        }

        /* Modern Table Styles */
        .table-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 0;
        }

        .table-container:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            position: sticky;
            top: 0;
        }

        .table th {
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border-bottom: none;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.08);
            transform: translateX(5px);
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            color: var(--text-dark);
            font-weight: 500;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            vertical-align: middle !important;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-sm i {
            margin-right: 5px;
            font-size: 0.9rem;
        }

        .btn-warning {
            background-color: var(--warning-color);
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e07e0c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(240, 173, 78, 0.3);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border: none;
        }

        .btn-danger:hover {
            background-color: #e51774;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .btn-info {
            background-color: var(--info-color);
            border: none;
            color: white;
        }

        .btn-info:hover {
            background-color: #480ca8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 12, 168, 0.3);
        }

        /* Modern Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background: var(--card-bg);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            border-bottom: none;
        }

        .modal-title {
            font-weight: 600;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        .modal-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            border-top: none;
            padding: 20px;
            background: rgba(248, 249, 250, 0.8);
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(72, 149, 239, 0.25);
            background-color: white;
        }

        .input-group-custom {
            margin-bottom: 1rem;
        }

        .input-group-custom label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .btn-close {
            filter: invert(1);
            opacity: 0.8;
            transition: all 0.2s ease;
        }

        .btn-close:hover {
            opacity: 1;
            transform: rotate(90deg);
        }

        .btn-submit {
            background-color: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
            color: white;
        }

        .btn-submit:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(67, 97, 238, 0.4);
            color: white;
        }

        .btn-cancel {
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: #6c757d;
            border: none;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
            color: white;
        }

        .btnEdit:hover,
        .btnHapus:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }

        button:disabled {
            background-color: #e9ecef !important;
            color: #6c757d !important;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }

        .status-diambil {
            background-color: rgba(40, 167, 69, 0.15);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .status-belum {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        /* Animations */
        .pulse {
            animation: pulse 2s infinite;
            position: relative;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(255, 255, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none;
        }

        .loading-spinner {
            width: 70px;
            height: 70px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top: 5px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            position: relative;
        }

        .loading-spinner::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 5px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Floating elements decoration */
        .floating {
            position: absolute;
            animation: floating 3s ease-in-out infinite;
            opacity: 0.1;
            z-index: -1;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Search and Filter Section */
        .search-filter-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--glass-border);
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
        }

        .filter-select {
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 10px 0;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            opacity: 0.8;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table td,
            .table th {
                padding: 10px 8px;
                font-size: 0.85rem;
                vertical-align: middle !important;
            }

            .btn-sm {
                padding: 5px 10px;
                font-size: 0.75rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Tooltip styles */
        .tooltip-inner {
            background-color: var(--primary-color);
            border-radius: 8px;
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .bs-tooltip-auto[data-popper-placement^=top] .tooltip-arrow::before,
        .bs-tooltip-top .tooltip-arrow::before {
            border-top-color: var(--primary-color);
        }

        /* Pagination styles */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-link {
            color: var(--primary-color);
            border-radius: 8px;
            margin: 0 5px;
            border: none;
            padding: 8px 16px;
        }

        .page-link:hover {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--secondary-color);
        }

        < !-- CSS Tambahan untuk Modal -->

        /* Glass Card Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Gradient Header */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
        }

        /* Info Cards */
        .info-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .info-card .card-header {
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Input Groups */
        .input-group-text {
            background-color: rgba(67, 97, 238, 0.1);
            border: none;
            color: #4361ee;
        }

        /* Rounded Buttons */
        .rounded-pill {
            padding: 8px 20px;
            font-weight: 500;
        }

        /* Form Labels */
        .form-label {
            color: #495057;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        /* Select2 Customization */
        .select2-container .select2-selection--single {
            height: 38px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .modal-body {
                padding: 1rem;
            }

            .info-card {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Floating decoration elements -->
    <div class="floating"
        style="top: 10%; left: 5%; width: 100px; height: 100px; background: var(--accent-color); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;">
    </div>
    <div class="floating"
        style="top: 70%; left: 80%; width: 150px; height: 150px; background: var(--danger-color); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; animation-delay: 0.5s;">
    </div>
    <div class="floating"
        style="top: 30%; left: 75%; width: 80px; height: 80px; background: var(--warning-color); border-radius: 50%; animation-delay: 1s;">
    </div>
    <div class="floating"
        style="top: 80%; left: 15%; width: 120px; height: 120px; background: var(--success-color); border-radius: 30% 70% 50% 50% / 30% 50% 50% 70%; animation-delay: 1.5s;">
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="container animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="glass-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="m-0">
                            <i class="fas fa-procedures me-2"></i>Daftar Riwayat Pasien
                        </h1>
                        <button id="btnTambahDiagnosa" class="btn btn-primary pulse">
                            <i class="fas fa-plus me-2"></i>Tambah Diagnosa
                        </button>
                        <button id="btnTambah" class="btn btn-primary pulse">
                            <i class="fas fa-plus me-2"></i>Tambah Tindakan
                        </button>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="search-filter-container animate__animated animate__fadeIn">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <i class="fas fa-search"></i>
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Cari pasien, dokter, diagnosa...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select id="filterPoli" class="form-select filter-select">
                                    <option value="">Semua Poli</option>
                                    <!-- Options will be loaded dynamically -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="filterStatus" class="form-select filter-select">
                                    <option value="">Semua Status Obat</option>
                                    <option value="diambil">Diambil</option>
                                    <option value="dibuat">Dibuat</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive shadow rounded mt-3">
                        <table class="table table-bordered table-hover align-middle text-center" id="tindakanTable">
                            <thead class="table-dark animate__animated animate__fadeIn">
                                <tr>
                                    <th>ID</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Dokter</th>
                                    <th>Jenis Tindakan</th>
                                    <th>Obat</th>
                                    <th>Poli</th>
                                    <th>Diagnosa</th>
                                    <th>Jadwal</th>
                                    <th>Status Obat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form id="formEdit">
                <div class="modal-content glass-card animate__animated animate__zoomIn">
                    <div class="modal-header bg-gradient-primary">
                        <h5 class="modal-title text-white" id="modalEditLabel">
                            <i class="fas fa-edit me-2"></i>Edit Tindakan Medis
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <input type="hidden" name="id_tindakan" id="id_tindakan_edit">

                        <div class="row g-3">
                            <!-- Patient Info Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-info text-white">
                                        <i class="fas fa-user-injured me-2"></i> Informasi Pasien
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="no_rm_edit" class="form-label fw-bold">No. Rekam Medis</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-id-card"></i></span>
                                                <input type="text" class="form-control" id="no_rm_edit"
                                                    name="no_rm" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_transaksi_rm_edit"
                                                class="form-label fw-bold">Diagnosa</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-file-medical"></i></span>
                                                <input type="text" class="form-control" id="id_transaksi_rm_edit"
                                                    name="id_transaksi_rm" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Treatment Info Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-warning text-dark">
                                        <i class="fas fa-procedures me-2"></i> Tindakan Medis
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="jenis_tindakan_edit" class="form-label fw-bold">Jenis
                                                Tindakan</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-stethoscope"></i></span>
                                                <input type="text" class="form-control" id="jenis_tindakan_edit"
                                                    name="jenis_tindakan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medical Team Card -->
                            <div class="col-12">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user-md me-2"></i> Tim Medis & Jadwal
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="nama_dokter_edit" class="form-label fw-bold">Dokter
                                                    Penanggung Jawab</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-user-md"></i></span>
                                                    <input type="text" class="form-control" id="nama_dokter_edit"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="jadwal_edit" class="form-label fw-bold">Jadwal
                                                    Tindakan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-calendar-alt"></i></span>
                                                    <input type="text" class="form-control" id="jadwal_edit"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nama_poli_edit" class="form-label fw-bold">Lokasi
                                                    Poli</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-clinic-medical"></i></span>
                                                    <input type="text" class="form-control" id="nama_poli_edit"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medication Card -->
                            <div class="col-12">
                                <div class="card info-card">
                                    <div class="card-header bg-success text-white">
                                        <i class="fas fa-pills me-2"></i> Resep Obat
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nama_obat_edit" class="form-label fw-bold">Obat yang
                                                    Diresepkan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-prescription-bottle-alt"></i></span>
                                                    <input type="text" class="form-control" id="nama_obat_edit"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-end">
                                                <div class="alert alert-info w-100 mb-0">
                                                    <i class="fas fa-info-circle me-2"></i> Status obat akan diperbarui
                                                    setelah proses pembuatan/pengambilan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary rounded-pill"
                            data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form id="formTambah">
                <div class="modal-content glass-card animate__animated animate__zoomIn">
                    <div class="modal-header bg-gradient-primary">
                        <h5 class="modal-title text-white" id="modalTambahLabel">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Tindakan Baru
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Patient Selection Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-info text-white">
                                        <i class="fas fa-user-plus me-2"></i> Pilih Pasien
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="no_rm_tambah" class="form-label fw-bold">Nomor Rekam
                                                Medis</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-search"></i></span>
                                                <select class="form-select select2" name="no_rm" id="no_rm_tambah"
                                                    required>
                                                    <option value="">Cari pasien...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_transaksi_rm_tambah" class="form-label fw-bold">Diagnosa
                                                Terkait</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-file-medical"></i></span>
                                                <select class="form-select select2" name="id_transaksi_rm"
                                                    id="id_transaksi_rm_tambah" required>
                                                    <option value="">Pilih diagnosa...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Treatment Info Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-warning text-dark">
                                        <i class="fas fa-procedures me-2"></i> Detail Tindakan
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="jenis_tindakan_tambah" class="form-label fw-bold">Jenis
                                                Tindakan</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-stethoscope"></i></span>
                                                <input type="text" class="form-control" id="jenis_tindakan_tambah"
                                                    name="jenis_tindakan" placeholder="Masukkan jenis tindakan..."
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medical Team Card -->
                            <div class="col-12">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user-md me-2"></i> Tim Medis & Jadwal
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="id_dokter_tambah" class="form-label fw-bold">Dokter
                                                    Penanggung Jawab</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-user-md"></i></span>
                                                    <select class="form-select select2" name="id_dokter"
                                                        id="id_dokter_tambah" required>
                                                        <option value="">Pilih dokter...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="id_jadwal_tambah" class="form-label fw-bold">Jadwal
                                                    Tindakan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-calendar-alt"></i></span>
                                                    <select class="form-select select2" name="id_jadwal"
                                                        id="id_jadwal_tambah" required>
                                                        <option value="">Pilih jadwal...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Info Card -->
                            <div class="col-12">
                                <div class="card info-card">
                                    <div class="card-header bg-success text-white">
                                        <i class="fas fa-info-circle me-2"></i> Informasi Tambahan
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="id_obat_tambah" class="form-label fw-bold">Resep Obat
                                                    (Opsional)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-pills"></i></span>
                                                    <select class="form-select select2" name="id_obat"
                                                        id="id_obat_tambah">
                                                        <option value="">Pilih obat...</option>
                                                    </select>
                                                </div>
                                                <small class="text-muted">Kosongkan jika tidak ada resep</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="id_poli_tambah" class="form-label fw-bold">Lokasi Poli
                                                    (Opsional)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                    <select class="form-select select2" name="id_poli"
                                                        id="id_poli_tambah">
                                                        <option value="">Pilih poli...</option>
                                                    </select>
                                                </div>
                                                <small class="text-muted">Kosongkan jika belum ditentukan</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary rounded-pill"
                            data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-save me-2"></i>Simpan Tindakan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Diagnosa -->
    <div class="modal fade" id="modalTambahDiagnosa" tabindex="-1" aria-labelledby="modalTambahDiagnosaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form id="formTambahDiagnosa">
                <div class="modal-content glass-card animate__animated animate__zoomIn">
                    <div class="modal-header bg-gradient-primary">
                        <h5 class="modal-title text-white" id="modalTambahDiagnosaLabel">
                            <i class="fas fa-file-medical me-2"></i>Tambah Diagnosa Baru
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Patient Selection Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-info text-white">
                                        <i class="fas fa-user-injured me-2"></i> Informasi Pasien
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="no_rm_diagnosa" class="form-label fw-bold">Nomor Rekam
                                                Medis</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-id-card"></i></span>
                                                <select class="form-select select2" name="no_rm"
                                                    id="no_rm_diagnosa" required>
                                                    <option value="">Cari pasien...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medical Info Card -->
                            <div class="col-md-6">
                                <div class="card info-card mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user-md me-2"></i> Informasi Medis
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="id_dokter_diagnosa" class="form-label fw-bold">Dokter
                                                Penanggung Jawab</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-user-md"></i></span>
                                                <select class="form-select select2" name="id_dokter"
                                                    id="id_dokter_diagnosa" required>
                                                    <option value="">Pilih dokter...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_poli_diagnosa" class="form-label fw-bold">Poli</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-clinic-medical"></i></span>
                                                <select class="form-select select2" name="id_poli"
                                                    id="id_poli_diagnosa" required>
                                                    <option value="">Pilih poli...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Diagnosis Info Card -->
                            <div class="col-12">
                                <div class="card info-card">
                                    <div class="card-header bg-success text-white">
                                        <i class="fas fa-diagnoses me-2"></i> Informasi Diagnosa
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="tanggal_kejadian" class="form-label fw-bold">Tanggal
                                                    Kejadian</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-calendar-day"></i></span>
                                                    <input type="date" class="form-control"
                                                        name="tanggal_kejadian" id="tanggal_kejadian" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status_obat" class="form-label fw-bold">Status
                                                    Obat</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i
                                                            class="fas fa-pills"></i></span>
                                                    <select class="form-select" name="status_obat" id="status_obat"
                                                        required>
                                                        <option value="dibuat">Dibuat</option>
                                                        <option value="diambil">Diambil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="diagnosa" class="form-label fw-bold">Diagnosa</label>
                                                <textarea class="form-control" name="diagnosa" id="diagnosa" rows="3" placeholder="Masukkan diagnosa..."
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary rounded-pill"
                            data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-save me-2"></i>Simpan Diagnosa
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Deklarasi konstanta untuk URL API
            const BASE_URL = 'http://172.16.50.2:8000';
            const API_TINDAKAN = `${BASE_URL}/api/tindakan`;
            const API_PASIEN = `${BASE_URL}/api/pasien`;
            const API_PASIEN_REKAM_MEDIS = `${BASE_URL}/api/pasien-rekam-medis`;
            const API_DOKTER = `${BASE_URL}/api/dokter`;
            const API_OBAT = `${BASE_URL}/api/obat`;
            const API_POLI = `${BASE_URL}/api/poli`;
            const API_JADWAL = `${BASE_URL}/api/jadwal`;
            const API_TRANSAKSI_RM = `${BASE_URL}/api/transaksi-rm-by-no-rm`;
            const API_TAMBAH_DIAGNOSA = `${BASE_URL}/api/tambahDiagnosa`;

            // Inisialisasi modal dan toast
            const modalTambah = new bootstrap.Modal(document.getElementById('modalTambah'));
            const modalEdit = new bootstrap.Modal(document.getElementById('modalEdit'));
            const modalTambahDiagnosa = new bootstrap.Modal(document.getElementById('modalTambahDiagnosa'));

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            // Variables for search and filter
            let currentSearchTerm = '';
            let currentPoliFilter = '';
            let currentStatusFilter = '';
            let allTindakanData = [];

            // Show loading overlay
            function showLoading() {
                $('.loading-overlay').fadeIn();
            }

            // Hide loading overlay
            function hideLoading() {
                $('.loading-overlay').fadeOut();
            }

            // Fungsi untuk load data dropdown
            function loadDropdownData() {
                showLoading();

                // Load pasien yang punya rekam medis
                $.get(API_PASIEN_REKAM_MEDIS, function(pasien) {
                    let options = '<option value="">Pilih Pasien</option>';
                    pasien.forEach(function(p) {
                        options +=
                            `<option value="${p.no_rm}">${p.no_rm} - ${p.nama_pasien}</option>`;
                    });
                    $('#no_rm_tambah').html(options);
                }).fail(handleAjaxError('pasien rekam medis'));

                // Load data dokter
                $.get(API_DOKTER, function(dokter) {
                    let options = '<option value="">Pilih Dokter</option>';
                    dokter.forEach(function(d) {
                        options +=
                            `<option value="${d.id_dokter}">${d.nama_dokter} - ${d.spesialis}</option>`;
                    });
                    $('#id_dokter_tambah').html(options);
                }).fail(handleAjaxError('dokter'));

                // Load data obat
                $.get(API_OBAT, function(obat) {
                    let options = '<option value="">Pilih Obat (Opsional)</option>';
                    obat.forEach(function(o) {
                        options += `<option value="${o.id_obat}">${o.nama_obat}</option>`;
                    });
                    $('#id_obat_tambah').html(options);
                }).fail(handleAjaxError('obat'));

                // Load data poli for filter
                $.get(API_POLI, function(poli) {
                    let options = '<option value="">Semua Poli</option>';
                    poli.forEach(function(p) {
                        options += `<option value="${p.id_poli}">${p.nama_poli}</option>`;
                    });
                    $('#filterPoli').html(options);
                    $('#id_poli_tambah').html(options.replace('Semua Poli', 'Pilih Poli (Opsional)'));
                    hideLoading();
                }).fail(handleAjaxError('poli'));
            }

            // Fungsi untuk menangani error AJAX
            function handleAjaxError(resource) {
                return function(xhr) {
                    hideLoading();
                    console.error(`Error loading ${resource}:`, xhr.status, xhr.responseText);
                    Toast.fire({
                        icon: 'error',
                        title: `Gagal memuat data ${resource}`,
                        text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                    });
                };
            }

            // Fungsi untuk memfilter data berdasarkan kriteria pencarian dan filter
            function filterData() {
                const filteredData = allTindakanData.filter(tindakan => {
                    // Filter berdasarkan pencarian
                    const matchesSearch =
                        (tindakan.no_rm && tindakan.no_rm.toLowerCase().includes(currentSearchTerm)) ||
                        (tindakan.pasien?.nama_pasien?.toLowerCase().includes(currentSearchTerm)) ||
                        (tindakan.dokter?.nama_dokter?.toLowerCase().includes(currentSearchTerm)) ||
                        (tindakan.rekam_medis?.diagnosa?.toLowerCase().includes(currentSearchTerm)) ||
                        (tindakan.jenis_tindakan?.toLowerCase().includes(currentSearchTerm));

                    // Filter berdasarkan poli
                    const matchesPoli = !currentPoliFilter ||
                        (tindakan.poli?.id_poli == currentPoliFilter);

                    // Filter berdasarkan status obat
                    const matchesStatus = !currentStatusFilter ||
                        (tindakan.rekam_medis?.status_obat === currentStatusFilter);

                    return matchesSearch && matchesPoli && matchesStatus;
                });

                renderTable(filteredData);
            }

            // Fungsi untuk merender tabel dengan data yang diberikan
            function renderTable(data) {
                let rows = '';
                data.forEach(function(tindakan) {
                    const statusObat = tindakan.rekam_medis?.status_obat || '-';
                    const statusClass = statusObat === 'diambil' ? 'status-diambil' : 'status-belum';
                    const disableEdit = statusObat === 'diambil' ? 'disabled' : '';

                    rows += `
                        <tr class="animate__animated animate__fadeIn">
                            <td>${tindakan.id_tindakan}</td>
                            <td>${tindakan.no_rm}</td>
                            <td>${tindakan.pasien?.nama_pasien || '-'}</td>
                            <td>${tindakan.dokter?.nama_dokter || '-'}</td>
                            <td>${tindakan.jenis_tindakan}</td>
                            <td>${tindakan.obat?.nama_obat || '-'}</td>
                            <td>${tindakan.poli?.nama_poli || '-'}</td>
                            <td>${tindakan.rekam_medis?.diagnosa || '-'}</td>
                            <td>${tindakan.jadwal?.hari || '-'}</td>
                            <td><span class="status-badge ${statusClass}">${statusObat}</span></td>
                            <td class="d-flex flex-column align-items-center gap-2">
                                <button class="btn btn-sm btn-warning btnEdit d-flex align-items-center gap-1" 
                                    data-id="${tindakan.id_tindakan}" ${disableEdit}>
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger btnHapus d-flex align-items-center gap-1" 
                                    data-id="${tindakan.id_tindakan}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#tindakanTable tbody').html(rows);
            }

            // Fungsi load data tindakan dari API dan tampilkan ke tabel
            function loadData() {
                showLoading();
                $.get(API_TINDAKAN, function(data) {
                    allTindakanData = data;
                    filterData();
                    hideLoading();
                }).fail(function(xhr) {
                    hideLoading();
                    console.error("Error loading tindakan:", xhr.status, xhr.responseText);
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal memuat data tindakan',
                        text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                    });
                });
            }

            // Event listener untuk search input
            $('#searchInput').on('input', function() {
                currentSearchTerm = $(this).val().toLowerCase();
                filterData();
            });

            // Event listener untuk filter poli
            $('#filterPoli').change(function() {
                currentPoliFilter = $(this).val();
                filterData();
            });

            // Event listener untuk filter status obat
            $('#filterStatus').change(function() {
                currentStatusFilter = $(this).val();
                filterData();
            });

            // Ketika No RM berubah, load Id Transaksi RM yang sesuai
            $('#no_rm_tambah').change(function() {
                const no_rm = $(this).val();

                if (no_rm) {
                    showLoading();
                    $('#id_transaksi_rm_tambah').html('<option value="">Loading...</option>');

                    $.ajax({
                        url: `${API_TRANSAKSI_RM}/${no_rm}`,
                        method: 'GET',
                        success: function(response) {
                            let options = '<option value="">Pilih Transaksi RM</option>';

                            if (response.success && response.data?.length > 0) {
                                response.data.forEach(function(transaksi) {
                                    options += `<option value="${transaksi.id_transaksi_rm}">
                                        ${transaksi.id_transaksi_rm} - ${transaksi.diagnosa || 'Tanpa diagnosa'} 
                                        (${transaksi.tanggal_kejadian || 'Tanpa tanggal'})
                                    </option>`;
                                });
                            } else {
                                options += '<option value="">Tidak ada data transaksi</option>';
                            }

                            $('#id_transaksi_rm_tambah').html(options);
                        },
                        error: function(xhr) {
                            console.error('Error loading transaksi RM:', xhr.status, xhr
                                .responseText);
                            $('#id_transaksi_rm_tambah').html(
                                `<option value="">Error: ${xhr.status || 'Server error'}</option>`
                            );
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal memuat transaksi RM',
                                text: xhr.responseJSON?.message || 'Coba lagi nanti'
                            });
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                } else {
                    $('#id_transaksi_rm_tambah').html(
                        '<option value="">Pilih Pasien terlebih dahulu</option>');
                }
            });

            // Tampilkan modal tambah ketika tombol tambah diklik
            $('#btnTambah').click(function() {
                $('#formTambah')[0].reset();
                modalTambah.show();
            });

            // Submit form tambah, kirim data ke API POST
            $('#formTambah').submit(function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                // Validasi
                if (!$('#no_rm_tambah').val()) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Pilih pasien terlebih dahulu'
                    });
                    return;
                }

                if (!$('#id_transaksi_rm_tambah').val()) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Pilih transaksi RM terlebih dahulu'
                    });
                    return;
                }

                showLoading();

                $.ajax({
                    url: API_TINDAKAN,
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        modalTambah.hide();
                        loadData();
                        Toast.fire({
                            icon: 'success',
                            title: 'Tindakan berhasil ditambahkan'
                        });
                    },
                    error: function(xhr) {
                        const res = xhr.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: res?.message || 'Gagal menambahkan tindakan',
                        });
                    },
                    complete: function() {
                        hideLoading();
                    }
                });
            });

            // Event klik tombol edit
            $('#tindakanTable').on('click', '.btnEdit', function() {
                const id = $(this).data('id');
                const btn = $(this);

                // Tampilkan loading
                btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Loading...');
                btn.prop('disabled', true);
                showLoading();

                $.ajax({
                    url: `${API_TINDAKAN}/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const data = response.data;

                            // Isi form dengan data dari API
                            $('#id_tindakan_edit').val(data.id_tindakan || '');
                            $('#no_rm_edit').val(data.no_rm || '');
                            $('#id_transaksi_rm_edit').val(data.id_transaksi_rm || '');
                            $('#jenis_tindakan_edit').val(data.jenis_tindakan || '');
                            $('#nama_dokter_edit').val(data.id_dokter || '');
                            $('#nama_obat_edit').val(data.id_obat || '');
                            $('#jadwal_edit').val(data.id_jadwal || '');
                            $('#nama_poli_edit').val(data.id_poli || '');

                            // Set semua input readonly kecuali jenis_tindakan
                            $('#formEdit input').prop('readonly', true);
                            $('#jenis_tindakan_edit').prop('readonly', false);

                            // Tampilkan modal
                            modalEdit.show();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Data tindakan tidak ditemukan'
                            });
                        }
                    },
                    error: function(xhr) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal memuat data tindakan',
                            text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                        });
                    },
                    complete: function() {
                        // Reset tombol
                        btn.html('<i class="fas fa-edit me-1"></i>Edit');
                        btn.prop('disabled', false);
                        hideLoading();
                    }
                });
            });

            // Submit form edit
            $('#formEdit').submit(function(e) {
                e.preventDefault();
                const id = $('#id_tindakan_edit').val();
                const formData = {
                    jenis_tindakan: $('#jenis_tindakan_edit').val(),
                    _method: 'PUT'
                };
                showLoading();

                $.ajax({
                    url: `${API_TINDAKAN}/${id}`,
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        modalEdit.hide();
                        loadData();
                        Toast.fire({
                            icon: 'success',
                            title: 'Jenis tindakan berhasil diperbarui'
                        });
                    },
                    error: function(xhr) {
                        const res = xhr.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: res?.message || 'Gagal memperbarui data',
                        });
                    },
                    complete: function() {
                        hideLoading();
                    }
                });
            });

            // Ketika dokter dipilih, ambil jadwal berdasarkan id_dokter
            $('#id_dokter_tambah').change(function() {
                const idDokter = $(this).val();

                if (idDokter) {
                    $('#id_jadwal_tambah').html('<option value="">Loading...</option>');

                    $.ajax({
                        url: `${API_JADWAL}/by-dokter/${idDokter}`,
                        method: 'GET',
                        success: function(response) {
                            let options = '<option value="">Pilih Jadwal</option>';

                            if (response.success && response.data?.length > 0) {
                                response.data.forEach(function(jadwal) {
                                    options += `<option value="${jadwal.id_jadwal}">
                                        ${jadwal.hari} - ${jadwal.jam_masuk} s/d ${jadwal.jam_keluar}
                                    </option>`;
                                });
                            } else {
                                options +=
                                    '<option value="">Tidak ada jadwal tersedia</option>';
                            }

                            $('#id_jadwal_tambah').html(options);
                        },
                        error: function(xhr) {
                            $('#id_jadwal_tambah').html(
                                '<option value="">Gagal mengambil jadwal</option>');
                            console.error('Error loading jadwal:', xhr.status, xhr
                                .responseText);
                        }
                    });
                } else {
                    $('#id_jadwal_tambah').html('<option value="">Pilih Dokter terlebih dahulu</option>');
                }
            });

            // Event klik tombol hapus, konfirmasi dan kirim request DELETE
            $('#tindakanTable').on('click', '.btnHapus', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Hapus Tindakan?',
                    text: `Apakah kamu yakin ingin menghapus tindakan ID ${id}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    backdrop: `rgba(0, 0, 0, 0.2)`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        showLoading();

                        $.ajax({
                            url: `${API_TINDAKAN}/${id}`,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function() {
                                loadData();
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data berhasil dihapus'
                                });
                            },
                            error: function(xhr) {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Gagal menghapus data',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan'
                                });
                            },
                            complete: function() {
                                hideLoading();
                            }
                        });
                    }
                });
            });

            // Tampilkan modal saat tombol tambah diagnosa diklik
            $('#btnTambahDiagnosa').click(function() {
                $('#formTambahDiagnosa')[0].reset();
                modalTambahDiagnosa.show();
            });

            // Fungsi untuk load data pasien
            function loadPasienForDiagnosa() {
                showLoading();
                $.get(API_PASIEN, function(pasien) {
                    let options = '<option value="">Pilih Pasien</option>';
                    pasien.forEach(function(p) {
                        options +=
                            `<option value="${p.no_rm}">${p.no_rm} - ${p.nama_pasien}</option>`;
                    });
                    $('#no_rm_diagnosa').html(options);
                    hideLoading();
                }).fail(handleAjaxError('pasien'));
            }

            // Fungsi untuk load data dokter
            function loadDokterForDiagnosa() {
                showLoading();
                $.get(API_DOKTER, function(dokter) {
                    let options = '<option value="">Pilih Dokter</option>';
                    dokter.forEach(function(d) {
                        options +=
                            `<option value="${d.id_dokter}">${d.nama_dokter} - ${d.spesialis}</option>`;
                    });
                    $('#id_dokter_diagnosa').html(options);
                    hideLoading();
                }).fail(handleAjaxError('dokter'));
            }

            // Fungsi untuk load data poli
            function loadPoliForDiagnosa() {
                showLoading();
                $.get(API_POLI, function(poli) {
                    let options = '<option value="">Pilih Poli</option>';
                    poli.forEach(function(p) {
                        options += `<option value="${p.id_poli}">${p.nama_poli}</option>`;
                    });
                    $('#id_poli_diagnosa').html(options);
                    hideLoading();
                }).fail(handleAjaxError('poli'));
            }

            // Submit form tambah diagnosa
            $('#formTambahDiagnosa').submit(function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                // Validasi client-side sederhana
                if (!$('#no_rm_diagnosa').val() || !$('#id_dokter_diagnosa').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Pasien dan dokter wajib diisi!'
                    });
                    return;
                }

                showLoading();

                $.ajax({
                    url: API_TAMBAH_DIAGNOSA,
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        modalTambahDiagnosa.hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Diagnosa tersimpan!'
                        });
                        $('#formTambahDiagnosa')[0].reset();
                    },
                    error: function(xhr) {
                        let errorMsg = xhr.responseJSON?.message || 'Server error';
                        if (xhr.responseJSON?.errors) {
                            errorMsg = Object.values(xhr.responseJSON.errors).join('<br>');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: errorMsg
                        });
                        console.error('Full error:', xhr.responseJSON);
                    },
                    complete: function() {
                        hideLoading();
                    }
                });
            });

            // Load data awal saat halaman dimuat
            loadData();
            loadDropdownData();
            loadPasienForDiagnosa();
            loadDokterForDiagnosa();
            loadPoliForDiagnosa();
        });
    </script>
</body>

</html>
