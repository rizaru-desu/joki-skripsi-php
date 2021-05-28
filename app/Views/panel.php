<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div class="min-vh-100 text-center m-0 d-flex flex-column justify-content-center">
                <div class="card mx-auto" style="width: 23rem;">
                    <img class="card-img-top w-75 mx-auto" src="/img/logo.png" alt="Card image cap">
                    <h2 class="card-title">Form Login</h2>
                    <div class="card-body">
                        <form action="/" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" name="email" id="email"
                                    value="<?= set_value('email') ?>" placeholder="Email Address">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="password"
                                    name="password" placeholder="Password">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btnStyle">LOGIN</button>
                                </div>
                                <div class="col">
                                    <a href="/panelRegister" class="btn btnStyle">REGISTER</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <?php if (isset($validation)): ?>
                        <div class="alert alert-danger text-left alert-dismissible fade show" role="alert">
                            <?= $validation->listErrors() ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <?php if (session()->get('success')): ?>
                        <div class="alert alert-success text-left alert-dismissible fade show" role="alert">
                            <?= session()->get('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>