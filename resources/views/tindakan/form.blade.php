<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Insert Tindakan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: var(--dark);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }

        .header {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem 2rem;
            text-align: center;
        }

        .header h1 {
            font-weight: 600;
            font-size: 1.8rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            padding: 2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            outline: none;
            background-color: white;
        }

        .form-group input:hover,
        .form-group select:hover {
            border-color: #adb5bd;
        }

        .submit-btn {
            grid-column: 1 / -1;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 1rem;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        #response {
            margin-top: 1.5rem;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease-out;
        }

        .success {
            background-color: rgba(76, 201, 240, 0.2);
            color: #0a9396;
            border-left: 4px solid var(--success);
        }

        .error {
            background-color: rgba(247, 37, 133, 0.2);
            color: var(--danger);
            border-left: 4px solid var(--danger);
        }

        .select2-container--default .select2-selection--single {
            height: 44px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px;
            padding-left: 12px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 42px;
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

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .container {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container animate__animated animate__fadeIn">
        <div class="header">
            <h1>Form Tindakan Medis</h1>
        </div>

        <div class="form-container">
            <form id="formTindakan">
                <div class="form-grid">
                    <div class="form-group animate__animated animate__fadeInLeft">
                        <label for="no_rm">No RM</label>
                        <select id="no_rm" name="no_rm" class="select-dropdown" required>
                            <option value="">Pilih Pasien</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <div class="form-group animate__animated animate__fadeInRight">
                        <label for="id_transaksi_rm">ID Transaksi RM</label>
                        <select id="id_transaksi_rm" name="id_transaksi_rm" class="select-dropdown" required>
                            <option value="">Pilih Transaksi RM</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <div class="form-group animate__animated animate__fadeInLeft">
                        <label for="id_dokter">Dokter</label>
                        <select id="id_dokter" name="id_dokter" class="select-dropdown" required>
                            <option value="">Pilih Dokter</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <div class="form-group animate__animated animate__fadeInRight">
                        <label for="jenis_tindakan">Jenis Tindakan</label>
                        <input type="text" name="jenis_tindakan" id="jenis_tindakan"
                            placeholder="Jenis tindakan medis" required>
                    </div>

                    <div class="form-group animate__animated animate__fadeInLeft">
                        <label for="id_obat">Obat</label>
                        <select id="id_obat" name="id_obat" class="select-dropdown">
                            <option value="">Pilih Obat (Opsional)</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <div class="form-group animate__animated animate__fadeInRight">
                        <label for="id_jadwal">Jadwal</label>
                        <select id="id_jadwal" name="id_jadwal" class="select-dropdown" required>
                            <option value="">Pilih Jadwal</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <div class="form-group animate__animated animate__fadeInLeft">
                        <label for="id_poli">Poli</label>
                        <select id="id_poli" name="id_poli" class="select-dropdown" required>
                            <option value="">Pilih Poli</option>
                            <!-- Data akan diisi dari database -->
                        </select>
                    </div>

                    <button type="submit" class="submit-btn animate__animated animate__fadeInUp">
                        <span class="submit-text">Simpan Data</span>
                    </button>
                </div>
            </form>

            <div id="response"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select-dropdown').select2({
                width: '100%',
                placeholder: $(this).data('placeholder')
            });

            loadDropdownData();
            setupPasienDropdownListener();
            setupFormSubmit();
            animateFormOnScroll();
        });

        // Load data dropdown dari endpoint masing-masing
        function loadDropdownData() {
            loadDropdown('/api/pasien', 'no_rm', pasien => {
                return {
                    value: pasien.no_rm,
                    text: `${pasien.no_rm} - ${pasien.nama_pasien}`
                };
            });

            loadDropdown('/api/dokter', 'id_dokter', dokter => {
                return {
                    value: dokter.id_dokter,
                    text: `${dokter.nama_dokter} - ${dokter.spesialis}`
                };
            });

            loadDropdown('/api/obat', 'id_obat', obat => {
                return {
                    value: obat.id_obat,
                    text: `${obat.nama_obat} (${obat.stok})`
                };
            });

            loadDropdown('/api/jadwal', 'id_jadwal', jadwal => {
                return {
                    value: jadwal.id_jadwal,
                    text: `${jadwal.hari} - ${jadwal.jam_masuk} s/d ${jadwal.jam_keluar}`
                };
            });

            loadDropdown('/api/poli', 'id_poli', poli => {
                return {
                    value: poli.id_poli,
                    text: poli.nama_poli
                };
            });
        }

        // Helper function untuk load dropdown
        function loadDropdown(url, selectId, mapFunc) {
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    const select = document.getElementById(selectId);
                    data.forEach(item => {
                        const option = document.createElement('option');
                        const mapped = mapFunc(item);
                        option.value = mapped.value;
                        option.textContent = mapped.text;
                        select.appendChild(option);
                    });
                });
        }

        // Event listener: ketika pasien dipilih, load id_transaksi_rm
        function setupPasienDropdownListener() {
            document.getElementById('no_rm').addEventListener('change', function() {
                const noRm = this.value;
                const transaksiSelect = document.getElementById('id_transaksi_rm');

                // Kosongkan dropdown transaksi RM
                transaksiSelect.innerHTML = '<option value="">Pilih Transaksi RM</option>';

                if (noRm) {
                    fetch(`/api/transaksi-rm?no_rm=${noRm}`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(transaksi => {
                                const option = document.createElement('option');
                                option.value = transaksi.id_transaksi_rm;
                                option.textContent =
                                    `Transaksi #${transaksi.id_transaksi_rm} - ${transaksi.tanggal}`;
                                transaksiSelect.appendChild(option);
                            });
                        })
                        .catch(err => console.error('Error fetching transaksi RM:', err));
                }
            });
        }

        // Event listener: submit form dengan loading state
        function setupFormSubmit() {
            document.getElementById('formTindakan').addEventListener('submit', function(e) {
                e.preventDefault();

                const submitBtn = document.querySelector('.submit-btn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="submit-text">Menyimpan...</span>';
                submitBtn.disabled = true;

                let formData = new FormData(this);

                fetch('/api/tindakan', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        const responseDiv = document.getElementById('response');
                        responseDiv.className = '';

                        if (data.success) {
                            responseDiv.textContent = data.message;
                            responseDiv.classList.add('success', 'animate__animated', 'animate__fadeIn');
                            // Reset form dan select2
                            document.getElementById('formTindakan').reset();
                            $('.select-dropdown').val(null).trigger('change');
                        } else {
                            let errorMsg = data.message || 'Terjadi kesalahan';
                            if (data.errors) {
                                errorMsg = Object.values(data.errors).join('\n');
                            }
                            responseDiv.textContent = errorMsg;
                            responseDiv.classList.add('error', 'animate__animated', 'animate__shakeX');
                        }
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        const responseDiv = document.getElementById('response');
                        responseDiv.textContent = 'Terjadi kesalahan jaringan';
                        responseDiv.classList.add('error', 'animate__animated', 'animate__shakeX');
                    })
                    .finally(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    });
            });
        }

        // Animasi ketika form element masuk ke viewport
        function animateFormOnScroll() {
            const formGroups = document.querySelectorAll('.form-group');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            formGroups.forEach(group => {
                group.style.opacity = 0;
                group.style.transform = 'translateY(20px)';
                group.style.transition = 'all 0.5s ease-out';
                observer.observe(group);
            });
        }
    </script>
</body>

</html>
