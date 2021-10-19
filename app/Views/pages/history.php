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
                    <h2 class="mb-1">History</h2>
                    <p>See your applied jobs here</p>
                </div>

                <ul>
                    <li>
                        <?php foreach ($history as $h) : ?>
                            <div class="content-container">
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <img src="/img/<?= $h['userImage']; ?>" class="w-75" alt="">
                                        <span class="d-block text-center"><?= $h['companyName']; ?></span>
                                    </div>
                                    <div class="col-9">
                                        <h2 class="mb-3"><?= $h['jobName']; ?></h2>

                                        <div class="mb-1">
                                            <h5 class="mb-0">Step</h5>
                                            <?php if ($h['userStatusName'] == "On Process") : ?>
                                                <p>Step 1</p>
                                            <?php elseif ($h['userStatusName'] == "Accepted") : ?>
                                                <p>Step 3</p>
                                            <?php elseif ($h['userStatusName'] == "Rejected") : ?>
                                                <p>Step 3</p>
                                            <?php endif; ?>
                                        </div>

                                        <div>
                                            <h5 class="mb-0">Status</h5>
                                            <?php if ($h['userStatusName'] == "On Process") : ?>
                                                <p class="text-secondary"><?= $h['userStatusName']; ?></p>
                                            <?php elseif ($h['userStatusName'] == "Accepted") : ?>
                                                <p class="text-success"><?= $h['userStatusName']; ?></p>
                                            <?php elseif ($h['userStatusName'] == "Rejected") : ?>
                                                <p class="text-danger"><?= $h['userStatusName']; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>