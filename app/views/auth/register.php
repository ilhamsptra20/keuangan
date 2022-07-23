<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="<?= BASEURL ?>authentication/register" method="POST">

            <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Nama" name="nama"/>
                <label class="form-label" for="form3Example3">Nama</label>
            </div>
            
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" name="email" />
                <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password" />
                <label class="form-label" for="form3Example4">Password</label>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Apakah Anda Sudah Memiliki Akun <a href="<?= BASEURL;?>login" class="link-danger">Login</a></p>
            </div>

            </form>
        </div>
        </div>
    </div>
</section>