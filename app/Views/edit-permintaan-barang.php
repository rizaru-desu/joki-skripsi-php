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
            <a href="#" class="nav-link text-dark bg-light">
                <i class="fas fa-edit mr-3 text-light fa-fw"></i>
                Form Permintaan Barang
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active text-dark bg-light">
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
    </ul>
</div>
<!-- End vertical navbar -->

<!-- Page content holder -->
<div class="page-content p-5" id="content">

    <h1>Kelola Permintaan Barang</h1>

    <br>

    <?php if (isset($validation)): ?>
    <div class="alert alert-danger mt-lg-4 alert-dismissible fade show" role="alert">
        <?= $validation->listErrors() ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <?php if (session()->get('success')): ?>
    <div class="alert alert-success mt-lg-4 alert-dismissible fade show" role="alert">
        <?= session()->get('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <br>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Sample Data</div>
                <div class="col text-right">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Nama Supplier</th>
                            <th>Harga</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($user_data)
                        {
                            foreach($user_data as $user)
                            {
                                echo '
                                <tr>
                                    <td>'.$user["kode"].'</td>
                                    <td>'.$user["nama_barang"].'</td>
                                    <td>'.$user["nama_supplier"].'</td>
                                    <td>'.$user["harga_barang"].'</td>
                                    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPermintaan" data-id="'.$user["id"].'" data-kodebarang="'.$user["kode"].'" data-namabarang="'.$user["nama_barang"].'" data-namasupplier="'.$user["nama_supplier"].'" data-hargabarang="'.$user["harga_barang"].'"  >Edit</button></td>
                                    <td><button type="button" onclick="delete_data('.$user["id"].')" class="btn btn-danger btn-sm">Delete</button></td>
                                </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPermintaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kelolaPermintaan" method="post">

                        <input name="id" id="id" />
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input class="form-control" id="kode_barang" name="kode" placeholder="Enter Kode Barang">
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Enter Nama Barang">
                        </div>

                        <div class="form-group">
                            <label>Nama Suplier</label>
                            <input class="form-control" id="nama_supplier" name="nama_supplier"
                                placeholder="Enter Nama Suplier">
                        </div>

                        <div class="form-group">
                            <label>Harga Barang</label>
                            <input class="form-control" id="harga_barang" name="harga_barang"
                                placeholder="Enter Harga Barang">
                        </div>

                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function delete_data(id) {
    if (confirm("Are you sure you want to remove it?")) {
        window.location.href = "/dashboard/deletePermintaan/" + id;
    }
    return false;
}

document.getElementById("harga_barang").onblur = function() {
    this.value = parseFloat(this.value.replace(/,/g, ""))
        .toFixed(2)
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}
</script>