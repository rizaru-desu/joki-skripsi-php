<!-- Vertical navbar -->
<div class="vertical-nav bg-light" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media-body">
            <h4 class="font-weight-white text-muted mb-0">Hei,</h4>
            <p class="font-weight-grey text-muted mb-0"><?php 
                if (session()->get('privilage') == 1) { 
                    echo "Administrasi";
                }
                ?>
            </p>
        </div>
    </div>

    <ul class="nav flex-column bg-light mb-0">

        <?php 
            if (session()->get('privilage') == 1) { 
                echo '
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark bg-light">
                        <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                        Permintaan Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark bg-light">
                        <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                        Order Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark bg-light">
                        <i class="fas fa-thumbtack mr-3 text-dark fa-fw"></i>
                        Laporan
                    </a>
                </li>
                ';
            }
        ?>
        <li class="nav-item">
            <a href="/logout" class="nav-link text-dark bg-light">
                <i class="fas fa-sign-out-alt mr-3 text-dark fa-fw"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<!-- End vertical navbar -->

<div class="container mt-lg-5">

    <?php if (session()->get('privilage') == 1): ?>
    <div id="permintaan-barang" class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="p-3">Permintaan Barang</h3>
                </div>
                <div class="col-md-2 float-right p-3 text-center">
                    <button class="btn btn-primary">Tambah</button>
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
    <?php endif; ?>
</div>