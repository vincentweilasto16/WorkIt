<?= $this->extend('layout_login_register/template'); ?>
<?= $this->section('content1') ?>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <h1 class="font-weight-bold mt-5">WorkIt!</h1>
                <h2>Simple way to find a job.</h2>
                <img src="/img/Asset1.png" alt="Asset1" class="w-100">
            </div>
            <div class="col-12 col-md-5">
                <br>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('login') ?>" method="POST">
                    <?= csrf_field() ?>

                    <h3 class="mt-4 mb-3">Sign In now</h3>

                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="form-group">
                            <label for="email">Email or Username</label>
                            <input type="email" id="email" name="email" placeholder="ex: harrydrew@gmail.com" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="login">Email or Username</label>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="form-icon">
                            <input type="password" id="password" name="password" placeholder="<?= lang('Auth.password') ?>" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
                            <i class="fas fa-eye"></i>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($config->activeResetter) : ?>
                        <a href="<?= route_to('forgot') ?>" class="d-block text-primary mb-4">Forgot Password?</a>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary w-100 text-center">Sign In</button>
                </form>

                <div class="or">Or</div>

                <?php if ($config->allowRegistration) : ?>
                    <p class="text-center">Have an Account? <a href="<?= route_to('register') ?>" class="text-color">Sign Up?</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>