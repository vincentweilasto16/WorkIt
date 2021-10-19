<?= $this->extend('layout_login_register/template'); ?>
<?= $this->section('content1') ?>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <h1 class="font-weight-bold">WorkIt!</h1>
                <h2>Simple way to find a job.</h2>
                <img src="/img/Asset1.png" alt="Asset1" class="w-100">
            </div>
            <div class="col-12 col-md-5">
                <br>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('register') ?>" method="POST">
                    <?= csrf_field() ?>
                    <h3 class="mt-4 mb-3">Sign Up now</h3>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="ex: harrydrew@gmail.com" value="<?= old('email') ?>" aria-describedby="emailHelp" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="<?= lang('Auth.username') ?>" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" value="<?= old('username') ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm">Re-enter Password</label>
                        <input type="password" id="pass_confirm" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-control">
                            <option value="Job Seeker">Job Seeker</option>
                            <option value="Job Provider">Job Provider</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 text-center">Sign Up</button>
                </form>

                <div class="or">Or</div>

                <p class="text-center">Have an Account? <a href="<?= route_to('login') ?>" class="text-color">Sign In</a></p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>