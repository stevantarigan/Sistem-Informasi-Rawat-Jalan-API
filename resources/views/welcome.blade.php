<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Riwayat Pasien - SIRM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
            --info: #560bad;
            --disabled: #adb5bd;
            --glass: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fb 0%, #e8ecff 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 25px 0;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(67, 97, 238, 0.4);
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            animation: fadeInDown 0.8s ease-out;
        }

        header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            transform: rotate(30deg);
            z-index: 0;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .subtitle {
            font-weight: 300;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            font-size: 1.1rem;
        }

        .search-filter {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: fadeIn 0.8s ease-out 0.2s both;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 14px 20px 14px 45px;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .search-box input:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 4px rgba(72, 149, 239, 0.3);
            transform: translateY(-2px);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }

        .filter-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-item label {
            font-size: 15px;
            color: #666;
            font-weight: 500;
        }

        .filter-item select {
            padding: 12px 18px;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .filter-item select:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 4px rgba(72, 149, 239, 0.3);
            transform: translateY(-2px);
        }

        .riwayat-container {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            animation: fadeIn 0.8s ease-out 0.4s both;
        }

        .riwayat-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            overflow: hidden;
        }

        .riwayat-table thead {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            position: sticky;
            top: 0;
        }

        .riwayat-table th {
            padding: 18px 25px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .riwayat-table tbody tr {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }

        .riwayat-table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .riwayat-table tbody tr::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 25px;
            right: 25px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.1), transparent);
        }

        .riwayat-table tbody tr:last-child::after {
            display: none;
        }

        .riwayat-table td {
            padding: 18px 25px;
            vertical-align: middle;
            font-size: 14px;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: #06AED5;
        }

        .badge-warning {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning);
        }

        .obat-list {
            font-size: 13px;
            color: #555;
            line-height: 1.6;
            padding-left: 15px;
        }

        .obat-list li {
            margin-bottom: 5px;
            position: relative;
        }

        .obat-list li::before {
            content: '•';
            position: absolute;
            left: -15px;
            color: var(--accent);
            font-weight: bold;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 8px;
            animation: fadeIn 0.8s ease-out 0.6s both;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background-color: white;
        }

        .pagination a:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: var(--primary);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .pagination .active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: var(--primary);
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 25px;
            color: #666;
            font-size: 14px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.8s ease-out 0.8s both;
        }

        .no-data {
            text-align: center;
            padding: 60px;
            color: #666;
            animation: fadeIn 0.5s ease-out;
        }

        .no-data i {
            font-size: 60px;
            margin-bottom: 25px;
            color: #e0e0e0;
            opacity: 0.7;
        }

        .no-data h3 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .no-data p {
            font-size: 15px;
            max-width: 500px;
            margin: 0 auto;
        }
        .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(72, 149, 239, 0.3);
        }

        .btn-detail:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }

        .btn-detail i {
            margin-right: 8px;
            font-size: 14px;
        }
        .btn-edit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(72, 149, 239, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }

        .btn-edit i {
            margin-right: 8px;
            font-size: 14px;
        }

        .btn-edit:disabled,
        .btn-edit.disabled {
            background: #e0e0e0;
            color: #999;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .action-cell {
            white-space: nowrap;
        }

        /* Floating animation for header */
        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Pulse animation for active elements */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Glow effect for interactive elements */
        .glow-on-hover {
            transition: box-shadow 0.3s ease;
        }

        .glow-on-hover:hover {
            box-shadow: 0 0 15px rgba(72, 149, 239, 0.6);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .search-filter {
                flex-direction: column;
                align-items: stretch;
                padding: 20px;
            }

            .search-box {
                min-width: 100%;
            }

            .filter-item {
                width: 100%;
            }

            .filter-item select {
                width: 100%;
            }

            .riwayat-table {
                display: block;
                overflow-x: auto;
            }

            h1 {
                font-size: 1.8rem;
            }

            .subtitle {
                font-size: 0.9rem;
            }
        }

        /* Dark mode toggle */
        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            z-index: 100;
            transition: all 0.3s;
            border: none;
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(30deg);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .theme-toggle i {
            font-size: 20px;
        }

        /* Animation classes */
        .animate-float {
            animation: floating 6s ease-in-out infinite;
        }

        .animate-pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Loading spinner */
        .loading-spinner {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .loading-spinner.active {
            display: flex;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(67, 97, 238, 0.2);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary);
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="animate-float">
            <h1><i class="fas fa-history"></i> Daftar Riwayat Pasien</h1>
            <p class="subtitle">Rekam medis lengkap pasien di Sistem Informasi Rumah Sakit Modern</p>
        </header>

        <div class="search-filter glow-on-hover">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari pasien, dokter, diagnosa..." id="search-input">
            </div>

            <div class="filter-item">
                <label for="filter-poli"><i class="fas fa-clinic-medical"></i> Poli:</label>
                <select id="filter-poli">
                    <option value="">Semua Poli</option>
                    <option value="Umum">Umum</option>
                    <option value="Gigi">Gigi</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>

            <div class="filter-item">
                <label for="filter-status"><i class="fas fa-pills"></i> Status Obat:</label>
                <select id="filter-status">
                    <option value="">Semua Status</option>
                    <option value="diambil">diambil</option>
                    <option value="dibuat">dibuat</option>
                </select>
            </div>
        </div>

        <div class="riwayat-container">
            <table class="riwayat-table">
                <thead>
                    <tr>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <th>Diagnosa</th>
                        <th>Status Obat</th>
                        <th>Obat Diberikan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Data akan dimasukkan di sini -->
                </tbody>
            </table>
        </div>

        <div class="pagination animate-pulse">
            <a href="#"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">10</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="footer">
            <p>Sistem Informasi Rekam Medis &copy; <span id="current-year"></span> - All Rights Reserved</p>
            <p class="subtitle" style="margin-top: 10px; font-size: 12px;">
                <i class="fas fa-sync-alt"></i> Terakhir diperbarui: <span id="last-updated"></span>
            </p>
        </div>
    </div>

    <button class="theme-toggle" id="theme-toggle">
        <i class="fas fa-moon"></i>
    </button>

    <div class="loading-spinner" id="loading-spinner">
        <div class="spinner"></div>
        <p>Memuat data...</p>
    </div>

    <script>
        // Set current year and last updated time
        document.getElementById('current-year').textContent = new Date().getFullYear();
        document.getElementById('last-updated').textContent = new Date().toLocaleString();

        // Loading spinner control
        const loadingSpinner = document.getElementById('loading-spinner');

        function showLoading() {
            loadingSpinner.classList.add('active');
        }

        function hideLoading() {
            loadingSpinner.classList.remove('active');
        }

        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = themeToggle.querySelector('i');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                document.body.style.background = 'linear-gradient(135deg, #1a1a2e 0%, #16213e 100%)';
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                document.body.style.background = 'linear-gradient(135deg, #f5f7fb 0%, #e8ecff 100%)';
            }
        });

        // Format date to DD/MM/YYYY
        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }

        let originalData = [];

        // Render data ke tabel
        function renderTable(data) {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="10" class="no-data">
                            <i class="fas fa-exclamation-circle"></i>
                            <h3>Tidak ada data yang cocok</h3>
                            <p>Coba gunakan kata kunci pencarian yang berbeda atau atur filter lainnya</p>
                        </td>
                    </tr>
                `;
                return;
            }

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                const isTaken = item.status_obat.toLowerCase() === 'diambil';

                const obatList = item.obat_diberikan.split('\n')
                    .map(obat => `<li>${obat.trim()}</li>`)
                    .join('');

                row.style.animationDelay = `${index * 0.1}s`;
                row.classList.add('animate__animated', 'animate__fadeInUp');

                row.innerHTML = `
                    <td><span class="badge badge-primary">${item.no_rm}</span></td>
                    <td><strong>${item.nama_pasien}</strong></td>
                    <td>${formatDate(item.tanggal_kejadian)}</td>
                    <td>${item.nama_dokter}</td>
                    <td>${item.nama_poli}</td>
                    <td>${item.diagnosa}</td>
                    <td><span class="badge ${isTaken ? 'badge-success' : 'badge-warning'}">${item.status_obat}</span></td>
                    <td><ul class="obat-list">${obatList}</ul></td>
                    <td>${item.total_harga}</td>
                    <td class="action-cell">
                        <button class="btn-edit" ${isTaken ? 'disabled' : ''}>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </td>
                    <td class="action-cell">
                        <button class="btn-edit"}>
                            <i class="fas fa-edit"></i> Detail
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }
        // Fetch data dari API
        function fetchData() {
            showLoading();

            fetch('/api/riwayat')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'berhasil' && Array.isArray(data.data)) {
                        originalData = data.data;
                        renderTable(originalData);
                    } else {
                        alert('Gagal mengambil data riwayat');
                        renderTable([]);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data.');
                    renderTable([]);
                })
                .finally(() => hideLoading());
        }

        // Filter data sesuai input
        function filterData() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const poliValue = document.getElementById('filter-poli').value;
            const statusValue = document.getElementById('filter-status').value;

            const filtered = originalData.filter(item => {
                const matchSearch =
                    item.nama_pasien.toLowerCase().includes(searchTerm) ||
                    item.nama_dokter.toLowerCase().includes(searchTerm) ||
                    item.diagnosa.toLowerCase().includes(searchTerm) ||
                    item.no_rm.toLowerCase().includes(searchTerm);

                const matchPoli = poliValue === '' || item.nama_poli === poliValue;
                const matchStatus = statusValue === '' || item.status_obat === statusValue;

                return matchSearch && matchPoli && matchStatus;
            });

            renderTable(filtered);
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchData();

            document.getElementById('search-input').addEventListener('input', filterData);
            document.getElementById('filter-poli').addEventListener('change', filterData);
            document.getElementById('filter-status').addEventListener('change', filterData);

            document.addEventListener('mouseover', (e) => {
                if (e.target.closest('tr')) {
                    e.target.closest('tr').classList.add('hover-effect');
                }
            });

            document.addEventListener('mouseout', (e) => {
                if (e.target.closest('tr')) {
                    e.target.closest('tr').classList.remove('hover-effect');
                }
            });
        });

        // Ripple effect on buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-edit:not(:disabled)')) {
                const btn = e.target.closest('.btn-edit');
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                btn.appendChild(ripple);

                const rect = btn.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                setTimeout(() => ripple.remove(), 600);

                alert('Edit functionality would be implemented here');
            }
        });
    </script>
    <script>
    $(document).ready(function() {
        const baseURL = 'http://172.16.49.231:8000';

        // Modal bootstrap
        const modalTambah = new bootstrap.Modal(document.getElementById('modalTambah'));
        const modalEdit = new bootstrap.Modal(document.getElementById('modalEdit'));

        // Toast Swal
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        // Loading overlay
        function showLoading() {
            $('.loading-overlay').fadeIn();
        }
        function hideLoading() {
            $('.loading-overlay').fadeOut();
        }

        // Variabel filter dan data cache
        let allTindakanData = [];
        let currentSearchTerm = '';
        let currentPoliFilter = '';
        let currentStatusFilter = '';

        // Load dropdown pasien, dokter, obat, poli
        function loadDropdownData() {
            showLoading();

            $.get(`${baseURL}/api/pasien`, function(pasien) {
                let options = '<option value="">Pilih Pasien</option>';
                pasien.forEach(p => {
                    options += `<option value="${p.no_rm}">${p.no_rm} - ${p.nama_pasien}</option>`;
                });
                $('#no_rm_tambah').html(options);
            });

            $.get(`${baseURL}/api/dokter`, function(dokter) {
                let options = '<option value="">Pilih Dokter</option>';
                dokter.forEach(d => {
                    options += `<option value="${d.id_dokter}">${d.nama_dokter} - ${d.spesialis}</option>`;
                });
                $('#id_dokter_tambah').html(options);
            });

            $.get(`${baseURL}/api/obat`, function(obat) {
                let options = '<option value="">Pilih Obat (Opsional)</option>';
                obat.forEach(o => {
                    options += `<option value="${o.id_obat}">${o.nama_obat}</option>`;
                });
                $('#id_obat_tambah').html(options);
            });

            $.get(`${baseURL}/api/poli`, function(poli) {
                let options = '<option value="">Semua Poli</option>';
                poli.forEach(p => {
                    options += `<option value="${p.id_poli}">${p.nama_poli}</option>`;
                });
                $('#filterPoli').html(options);
                $('#id_poli_tambah').html(options.replace('Semua Poli', 'Pilih Poli (Opsional)'));
                hideLoading();
            });
        }

        // Render tabel berdasarkan data yg sudah difilter
        function renderTable(data) {
            let rows = '';
            data.forEach(tindakan => {
                const statusObat = tindakan.rekam_medis?.status_obat ?? '-';
                const statusClass = statusObat === 'diambil' ? 'status-diambil' : 'status-belum';
                const disableEdit = statusObat === 'diambil' ? 'disabled' : '';

                rows += `
                    <tr class="animate__animated animate__fadeIn">
                        <td>${tindakan.id_tindakan}</td>
                        <td>${tindakan.no_rm}</td>
                        <td>${tindakan.pasien?.nama_pasien ?? '-'}</td>
                        <td>${tindakan.dokter?.nama_dokter ?? '-'}</td>
                        <td>${tindakan.jenis_tindakan}</td>
                        <td>${tindakan.obat?.nama_obat ?? '-'}</td>
                        <td>${tindakan.poli?.nama_poli ?? '-'}</td>
                        <td>${tindakan.rekam_medis?.diagnosa ?? '-'}</td>
                        <td>${tindakan.jadwal?.hari ?? '-'}</td>
                        <td><span class="status-badge ${statusClass}">${statusObat}</span></td>
                        <td class="d-flex flex-column align-items-center gap-2">
                            <button class="btn btn-sm btn-warning btnEdit d-flex align-items-center gap-1" data-id="${tindakan.id_tindakan}" ${disableEdit}>
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger btnHapus d-flex align-items-center gap-1" data-id="${tindakan.id_tindakan}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#tindakanTable tbody').html(rows);
        }

        // Filter data berdasarkan search dan filter dropdown
        function filterData() {
            const filtered = allTindakanData.filter(tindakan => {
                const term = currentSearchTerm.toLowerCase();

                // Cek pencarian (bisa di no_rm, nama pasien, nama dokter, diagnosa, jenis tindakan)
                const matchesSearch = 
                    (tindakan.no_rm && tindakan.no_rm.toLowerCase().includes(term)) ||
                    (tindakan.pasien?.nama_pasien?.toLowerCase().includes(term)) ||
                    (tindakan.dokter?.nama_dokter?.toLowerCase().includes(term)) ||
                    (tindakan.rekam_medis?.diagnosa?.toLowerCase().includes(term)) ||
                    (tindakan.jenis_tindakan?.toLowerCase().includes(term));

                // Filter poli
                const matchesPoli = !currentPoliFilter || (tindakan.poli?.id_poli == currentPoliFilter);

                // Filter status obat
                const matchesStatus = !currentStatusFilter || (tindakan.rekam_medis?.status_obat === currentStatusFilter);

                return matchesSearch && matchesPoli && matchesStatus;
            });

            renderTable(filtered);
        }

        // Load data tindakan dari server
        function loadData() {
            showLoading();
            $.get(`${baseURL}/api/tindakan`, function(data) {
                allTindakanData = data;
                filterData();
                hideLoading();
            }).fail(() => {
                hideLoading();
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal memuat data tindakan'
                });
            });
        }

        // Event input pencarian
        $('#searchInput').on('input', function() {
            currentSearchTerm = $(this).val();
            filterData();
        });

        // Event filter poli
        $('#filterPoli').change(function() {
            currentPoliFilter = $(this).val();
            filterData();
        });

        // Event filter status obat
        $('#filterStatus').change(function() {
            currentStatusFilter = $(this).val();
            filterData();
        });

        // Load data dropdown dan data tabel saat awal
        loadDropdownData();
        loadData();

        // Event saat pasien dipilih di form tambah, load transaksi rekam medis pasien itu
        $('#no_rm_tambah').change(function() {
            const no_rm = $(this).val();

            if (!no_rm) {
                $('#id_transaksi_rm_tambah').html('<option value="">Pilih Pasien terlebih dahulu</option>');
                return;
            }

            showLoading();
            $('#id_transaksi_rm_tambah').html('<option>Loading...</option>');

            $.ajax({
                url: `${baseURL}/api/transaksi-rm-by-no-rm/${no_rm}`,
                method: 'GET',
                success: function(res) {
                    let options = '<option value="">Pilih Transaksi RM</option>';
                    if (res.success && res.data && res.data.length > 0) {
                        res.data.forEach(tr => {
                            options += `<option value="${tr.id_transaksi_rm}">
                                ${tr.id_transaksi_rm} - ${tr.diagnosa ?? 'Tanpa diagnosa'} (${tr.tanggal_kejadian ?? '-'})
                            </option>`;
                        });
                    } else {
                        options += '<option value="">Tidak ada data transaksi</option>';
                    }
                    $('#id_transaksi_rm_tambah').html(options);
                },
                error: function(xhr) {
                    $('#id_transaksi_rm_tambah').html('<option value="">Error memuat transaksi</option>');
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
        });

        // Tombol Tambah klik => reset form & tampilkan modal tambah
        $('#btnTambah').click(function() {
            $('#formTambah')[0].reset();
            $('#id_transaksi_rm_tambah').html('<option value="">Pilih Pasien terlebih dahulu</option>');
            modalTambah.show();
        });

        // Submit form tambah
        $('#formTambah').submit(function(e) {
            e.preventDefault();

            if (!$('#no_rm_tambah').val()) {
                Toast.fire({ icon: 'error', title: 'Pilih pasien terlebih dahulu' });
                return;
            }
            if (!$('#id_transaksi_rm_tambah').val()) {
                Toast.fire({ icon: 'error', title: 'Pilih transaksi rekam medis terlebih dahulu' });
                return;
            }

            showLoading();
            const formData = $(this).serialize();

            $.ajax({
                url: `${baseURL}/api/tindakan`,
                method: 'POST',
                data: formData,
                success: function(res) {
                    modalTambah.hide();
                    loadData();
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil menambah tindakan'
                    });
                },
                error: function(xhr) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal menambah tindakan',
                        text: xhr.responseJSON?.message || 'Coba lagi nanti'
                    });
                },
                complete: function() {
                    hideLoading();
                }
            });
        });

        // Event klik tombol edit (gunakan event delegation)
        $(document).on('click', '.btnEdit', function() {
            const id = $(this).data('id');

            showLoading();
            $.get(`${baseURL}/api/tindakan/${id}`, function(res) {
                if (res.success && res.data) {
                    const t = res.data;
                    $('#id_edit').val(t.id_tindakan);
                    $('#no_rm_edit').val(t.no_rm);
                    // Load transaksi RM sesuai pasien
                    loadTransaksiRMEdit(t.no_rm, t.id_transaksi_rm);

                    $('#id_dokter_edit').val(t.id_dokter);
                    $('#id_obat_edit').val(t.id_obat);
                    $('#id_poli_edit').val(t.id_poli);
                    $('#jenis_tindakan_edit').val(t.jenis_tindakan);

                    modalEdit.show();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Data tindakan tidak ditemukan'
                    });
                }
            }).fail(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal mengambil data tindakan'
                });
            }).always(() => {
                hideLoading();
            });
        });

        // Fungsi load transaksi RM di form edit berdasarkan pasien yg dipilih
        function loadTransaksiRMEdit(no_rm, selectedIdTransaksiRM = null) {
            if (!no_rm) {
                $('#id_transaksi_rm_edit').html('<option value="">Pilih pasien terlebih dahulu</option>');
                return;
            }

            $('#id_transaksi_rm_edit').html('<option>Loading...</option>');
            $.get(`${baseURL}/api/transaksi-rm-by-no-rm/${no_rm}`, function(res) {
                let options = '<option value="">Pilih Transaksi RM</option>';
                if (res.success && res.data && res.data.length > 0) {
                    res.data.forEach(tr => {
                        options += `<option value="${tr.id_transaksi_rm}" ${tr.id_transaksi_rm == selectedIdTransaksiRM ? 'selected' : ''}>
                            ${tr.id_transaksi_rm} - ${tr.diagnosa ?? 'Tanpa diagnosa'} (${tr.tanggal_kejadian ?? '-'})
                        </option>`;
                    });
                } else {
                    options += '<option value="">Tidak ada data transaksi</option>';
                }
                $('#id_transaksi_rm_edit').html(options);
            }).fail(() => {
                $('#id_transaksi_rm_edit').html('<option value="">Error memuat transaksi</option>');
            });
        }

        // Saat pasien di form edit dipilih, reload transaksi RM-nya
        $('#no_rm_edit').change(function() {
            const no_rm = $(this).val();
            loadTransaksiRMEdit(no_rm);
        });

        // Submit form edit
        $('#formEdit').submit(function(e) {
            e.preventDefault();

            const id = $('#id_edit').val();
            if (!id) {
                Toast.fire({ icon: 'error', title: 'ID tindakan tidak ditemukan' });
                return;
            }
            if (!$('#no_rm_edit').val()) {
                Toast.fire({ icon: 'error', title: 'Pilih pasien terlebih dahulu' });
                return;
            }
            if (!$('#id_transaksi_rm_edit').val()) {
                Toast.fire({ icon: 'error', title: 'Pilih transaksi rekam medis terlebih dahulu' });
                return;
            }

            showLoading();
            const formData = $(this).serialize();

            $.ajax({
                url: `${baseURL}/api/tindakan/${id}`,
                method: 'PUT',
                data: formData,
                success: function(res) {
                    modalEdit.hide();
                    loadData();
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil mengubah tindakan'
                    });
                },
                error: function(xhr) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal mengubah tindakan',
                        text: xhr.responseJSON?.message || 'Coba lagi nanti'
                    });
                },
                complete: function() {
                    hideLoading();
                }
            });
        });

        // Hapus tindakan
        $(document).on('click', '.btnHapus', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Yakin hapus tindakan ini?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoading();
                    $.ajax({
                        url: `${baseURL}/api/tindakan/${id}`,
                        method: 'DELETE',
                        success: function() {
                            loadData();
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menghapus tindakan'
                            });
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal menghapus tindakan',
                                text: xhr.responseJSON?.message || 'Coba lagi nanti'
                            });
                        },
                        complete: function() {
                            hideLoading();
                        }
                    });
                }
            });
        });

    });
</script>



</body>

</html>
