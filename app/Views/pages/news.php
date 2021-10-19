<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="content-container">
                    <div class="row">
                        <div class="col-6">
                            <img src="/img/<?= user()->userImage; ?>" alt="User Profile Picture" class="w-100">
                        </div>
                        <div class="col-6">
                            <h3><?= user()->firstname . " " . user()->lastname; ?></h3>
                            <p><?= user()->email; ?></p>
                            <a href="/pages/editprofile/<?= user()->id; ?>">
                                <button class="btn btn-primary px-4">
                                    Edit Profile
                                </button>
                            </a>
                        </div>
                    </div>

                    <h3 class="mt-3 mb-2">Overview</h3>
                    <div class="row">
                        <div class="col-1"><i class="fas fa-venus-mars"></i></div>
                        <div class="col-11"><?= user()->gender; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-1"><i class="fas fa-birthday-cake"></i></div>
                        <div class="col-11"><?= user()->dob; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-1"><i class="fas fa-phone"></i></div>
                        <div class="col-11">(+62) <?= user()->phonenum; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-1"><i class="fas fa-home"></i></div>
                        <div class="col-11"><?= user()->address; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-1"><i class="fas fa-graduation-cap"></i></div>
                        <div class="col-11"><?= user()->academicdegree; ?></div>
                    </div>
                </div>

                <div class="content-container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>About Us</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a href="" class="text-primary">Details</a>
                        </div>
                    </div>

                    <p>We are a company that create this website with the aim of making it easier for everyone to access
                        information about available jobs.</p>
                </div>

                <div class="content-container">
                    <h3>Contact Us</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-2 col-md-3"><i class="fas fa-envelope"></i></div>
                                <div class="col-10 col-md-9">support@workit.com</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-2 col-md-3"><i class="fas fa-phone"></i></div>
                                <div class="col-10 col-md-9">(+62) 877815167</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-7">
                <div class="mb-4">
                    <h2 class="mb-1">News</h2>
                    <p>Found any articles to optimize work</p>
                </div>

                <ul>
                    <?php foreach ($news as $n) : ?>
                        <li>
                            <div class="content-container">
                                <h2 class="mb-2"><?= $n['newsName']; ?></h2>
                                <p><?= $n['newsDescription']; ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>