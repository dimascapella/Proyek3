<?= $this->extend('Layout/baseTemplate'); ?>

<?= $this->section('content'); ?>
<section class="login-header">
    <div class="container">
        <div class="row">
            <div class="title mt-3">
                <h4>Management Toko Nasi Goreng Rempah</h4>
            </div>
        </div>
    </div>
</section>
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img class="login-image" src="/img/image3.png" width="100%">
            </div>
            <div class="col-md-4">
                <div class="login-view mt-5">
                    <h1 class="text-center">Log In</h1>
                    <form>
                        <div class="form-group mt-5">
                            <label for="formGroupExampleInput">Usename</label>
                            <input type="text" class="form-control" placeholder="Input Username">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="password" class="form-control" placeholder="Input Password">
                        </div>
                        <button class="btn btn-primary w-100 mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>