<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Meeting System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background-color: #f4f6f9;
        }

        .card-box{
            border-radius: 15px;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .bg-total{
            background-color: #0d6efd;
        }

        .bg-tersedia{
            background-color: #198754;
        }

        .bg-digunakan{
            background-color: #dc3545;
        }

        .table-container{
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .room-card{
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

    </style>

</head>
<body>

<div class="container mt-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4">

        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                Smart Meeting
            </a>

            <div>

                <a href="#"
                   class="btn btn-outline-light btn-sm">
                    Peminjaman
                </a>

                <a href="#dataRuangan"
                   class="btn btn-outline-light btn-sm">
                    Data Ruangan
                </a>

                <a href="#dataKaryawan"
                   class="btn btn-outline-light btn-sm">
                    Data Karyawan
                </a>

            </div>

        </div>

    </nav>

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>Smart Meeting System</h2>
            <p>Data Peminjaman Ruangan</p>

        </div>

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalPinjam">

            Tambah Peminjaman

        </button>

    </div>

    <!-- Statistik -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card-box bg-total">

                <h5>Total Ruangan</h5>
                <h1>10</h1>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card-box bg-tersedia">

                <h5>Ruangan Tersedia</h5>
                <h1>7</h1>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card-box bg-digunakan">

                <h5>Ruangan Digunakan</h5>
                <h1>3</h1>

            </div>

        </div>

    </div>

    <!-- Card View Ruangan -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="room-card">

                <h5>Meeting Room A</h5>
                <p>Status : Tersedia</p>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="room-card">

                <h5>Meeting Room B</h5>
                <p>Status : Digunakan</p>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="room-card">

                <h5>Meeting Room C</h5>
                <p>Status : Tersedia</p>

            </div>

        </div>

    </div>

    <!-- Filter -->
    <div class="row mb-3">

        <div class="col-md-4">

            <input type="date"
                   id="filterTanggal"
                   class="form-control"
                   onchange="filterTable()">

        </div>

        <div class="col-md-8">

            <input type="text"
                   class="form-control"
                   placeholder="Cari Ruangan">

        </div>

    </div>

    <!-- Table -->
    <div class="table-container">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Nama Ruangan</th>
                    <th>Nama Peminjam</th>
                    <th>Divisi</th>
                    <th>Agenda</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody id="tableBody">

                <tr>

                    <td>1</td>
                    <td>2026-05-12</td>
                    <td>08:00</td>
                    <td>Meeting Room A</td>
                    <td>Magda</td>
                    <td>IT</td>
                    <td>Rapat Project</td>

                    <td>

                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapus">

                            Hapus

                        </button>

                    </td>

                </tr>

                <tr>

                    <td>2</td>
                    <td>2026-05-13</td>
                    <td>10:00</td>
                    <td>Meeting Room B</td>
                    <td>Budi</td>
                    <td>HRD</td>
                    <td>Interview</td>

                    <td>

                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalHapus">

                            Hapus

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <!-- DATA RUANGAN -->
    <div id="dataRuangan" class="mt-5">

        <h3>Data Ruangan</h3>

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>
                    <td>Meeting Room A</td>
                    <td>20 Orang</td>
                    <td>Tersedia</td>

                    <td>

                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <!-- DATA KARYAWAN -->
    <div id="dataKaryawan" class="mt-5 mb-5">

        <h3>Data Karyawan</h3>

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>
                    <td>Magda</td>
                    <td>IT</td>
                    <td>magda@gmail.com</td>

                    <td>

                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL TAMBAH -->
<div class="modal fade"
     id="modalPinjam"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Tambah Peminjaman
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label>Tanggal Rapat</label>

                    <input type="date"
                           id="tanggal"
                           class="form-control">

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Jam Mulai</label>

                        <input type="time"
                               id="jamMulai"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Jam Selesai</label>

                        <input type="time"
                               id="jamSelesai"
                               class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label>Nama Ruangan</label>

                    <select id="ruangan"
                            class="form-select">

                        <option>Meeting Room A</option>
                        <option>Meeting Room B</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Nama Peminjam</label>

                    <input type="text"
                           id="peminjam"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Divisi</label>

                    <input type="text"
                           value="IT"
                           class="form-control"
                           readonly>

                </div>

                <div class="mb-3">

                    <label>Agenda</label>

                    <textarea id="agenda"
                              class="form-control"></textarea>

                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-primary"
                        onclick="simpanData()">

                    Simpan

                </button>

            </div>

        </div>

    </div>

</div>

<!-- MODAL HAPUS -->
<div class="modal fade"
     id="modalHapus"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Hapus Peminjaman
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>
                    Ketik <b>HAPUS</b> untuk menghapus data.
                </p>

                <input type="text"
                       id="kodeHapus"
                       class="form-control">

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-danger"
                        onclick="hapusData()">

                    Hapus

                </button>

            </div>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>

function simpanData(){

    let jamMulai =
        document.getElementById("jamMulai").value;

    let jamSelesai =
        document.getElementById("jamSelesai").value;

    if(jamMulai >= jamSelesai){

        alert("Jam mulai tidak boleh lebih besar dari jam selesai!");

        return;
    }

    let ruangan =
        document.getElementById("ruangan").value;

    if(ruangan == "Meeting Room A"
        && jamMulai == "08:00"){

        alert("Maaf ruangan sudah digunakan!");

        return;
    }

    alert("Data berhasil disimpan!");

}

function hapusData(){

    let kode =
        document.getElementById("kodeHapus").value;

    if(kode != "HAPUS"){

        alert("Kode harus HAPUS!");

        return;
    }

    alert("Data berhasil dihapus!");

}

function filterTable(){

    let tanggal =
        document.getElementById("filterTanggal").value;

    let table =
        document.getElementById("tableBody");

    let rows =
        table.getElementsByTagName("tr");

    for(let i = 0; i < rows.length; i++){

        let tdTanggal =
            rows[i].getElementsByTagName("td")[1];

        if(tdTanggal){

            let isiTanggal =
                tdTanggal.textContent;

            if(tanggal == ""
                || isiTanggal.includes(tanggal)){

                rows[i].style.display = "";

            }else{

                rows[i].style.display = "none";

            }

        }

    }

}

</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>