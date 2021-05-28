<!-- Vertical navbar -->
<div class="vertical-nav bg-light" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media-body">
            <h4 class="font-weight-white text-muted mb-0">Welcome</h4>
            <p class="font-weight-grey text-muted mb-0"><?= session()->get('email') ?></p>
        </div>
    </div>

    <ul class="nav flex-column bg-light mb-0">
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fa fa-th-large mr-3 text-dark fa-fw"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active text-light bg-dark">
                <i class="fas fa-edit mr-3 text-light fa-fw"></i>
                Form Permintaan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                Kelola Permintaan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-edit mr-3 text-dark fa-fw"></i>
                Form Order Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                Kelola Order Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-edit mr-3 text-dark fa-fw"></i>
                Form Penerimaan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                Kelola Penerimaan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-edit mr-3 text-dark fa-fw"></i>
                Form Penyimpanan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                Kelola Penyimpanan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-edit mr-3 text-dark fa-fw"></i>
                Form Laporan
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                Kelola Laporan
            </a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="nav-link text-dark bg-light">
                <i class="fas fa-sign-out-alt mr-3 text-dark fa-fw"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<!-- End vertical navbar -->

<!-- Page content holder -->
<div class="page-content p-5" id="content">

    <h1>Form Permintaan Barang</h1>

    <form action="/addPermintaan" method="post">
        <div class="form-group">
            <label>Kode Barang</label>
            <input class="form-control" name="kode" placeholder="Enter Kode Barang">
        </div>

        <div class="form-group">
            <label>Nama Barang</label>
            <input class="form-control" name="nama_barang" placeholder="Enter Nama Barang">
        </div>

        <div class="form-group">
            <label>Nama Suplier</label>
            <input class="form-control" name="nama_supplier" placeholder="Enter Nama Suplier">
        </div>

        <div class="form-group">
            <label>Harga Barang</label>
            <input class="form-control" id="number" name="harga_barang" placeholder="Enter Harga Barang">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if (isset($validation)): ?>
    <div class="alert alert-danger mt-lg-4 alert-dismissible fade show" role="alert">
        <?= $validation->listErrors() ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <?php if (session()->get('privilage')): ?>
    <div class="alert alert-success mt-lg-4 alert-dismissible fade show" role="alert">
        <?= session()->get('privilage') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
</div>


<script>
document.getElementById("number").onblur = function() {
    this.value = parseFloat(this.value.replace(/,/g, ""))
        .toFixed(2)
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    document.getElementById("display").value = this.value.replace(/,/g, "")

}
</script>