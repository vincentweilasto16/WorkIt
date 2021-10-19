<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (user()->role == "Job Seeker") : ?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
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
                        <h2 class="mb-1">Filter</h2>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <select id="company" name="company" class="form-control">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="job">Job</label>
                                <select id="job" name="job" class="form-control">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-1">Job Offers</h2>
                    <ul>
                        <?php if ($job) :  ?>
                            <?php foreach ($job as $j) : ?>
                                <li>
                                    <div class="content-container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-4 text-center">
                                                <img src="/img/<?= $j['userImage']; ?>" class="w-75" alt="">
                                                <span class="d-block text-center"><?= $j['companyName']; ?></span>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-8">
                                                <h2 class="mb-2"><?= $j['jobName']; ?></h2>
                                                <p><?= $j['jobDescription']; ?></p>
                                                <a href="/Pages/saveApply/<?= $j['jobId']; ?>" class="btn btn-info offset-8">Apply Job</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li>
                                <div class="alert alert-danger" role="alert">
                                    There is no job to apply right now!
                                </div>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="content-container">
                        <div class="row">
                            <div class="col-6">
                                <img src="/img/<?= user()->userImage; ?>" alt="User Profile Picture" class="w-100">
                            </div>
                            <div class="col-6">
                                <h3><?= user()->companyName; ?></h3>
                                <p><?= user()->email; ?></p>
                                <a href="/pages/editprofile/<?= user()->id; ?>">
                                    <button class="btn btn-primary px-4">Edit Profile</button>
                                </a>
                            </div>
                        </div>

                        <h3 class="mt-3 mb-2">Company Information</h3>
                        <div class="row">
                            <div class="col-1"><i class="fas fa-industry"></i></div>
                            <div class="col-11"><?= user()->companyIndustry; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-1"><i class="fas fa-building"></i></div>
                            <div class="col-11"><?= user()->companyType; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-1"><i class="fas fa-city"></i></div>
                            <div class="col-11"><?= user()->companyAddress; ?></div>
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
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h2 class="mb-1">Offered Job</h2>
                            </div>
                            <div class="col-6">
                                <a href="/pages/insertjob/<?= user()->id; ?>">
                                    <button class="btn btn-primary d-block ml-auto px-5">Add Job</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <?php if ($jobCompany) : ?>
                            <?php foreach ($jobCompany as $jc) : ?>
                                <li>
                                    <div class="content-container">
                                        <div class="row">
                                            <div class="col-10">
                                                <h2 class="mb-3"><?= $jc['jobName']; ?></h2>
                                            </div>
                                            <div class="col-2">
                                                <a href="/Pages/editjob/<?= $jc['jobId']; ?>">Edit Job</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-1">
                                                    <h5 class="mb-0">Description</h5>
                                                    <p><?= $jc['jobDescription']; ?></p>
                                                </div>

                                                <div>
                                                    <h5 class="mb-0">Status</h5>
                                                    <p class="text-warning"><?= $jc['statName']; ?></p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-11">
                                                        <form action="" method="POST">
                                                            <input type="hidden" value="<?= $jc['jobId']; ?>" name="jobId">
                                                            <?php if ($jc['status'] == "1") : ?>
                                                                <button type="submit" class="btn btn-success" value="2" name="start">Start</button>
                                                            <?php elseif ($jc['status'] == "2") : ?>
                                                                <button type="submit" class="btn btn-danger" value="3" name="end">End</button>
                                                            <?php endif ?>
                                                        </form>
                                                    </div>
                                                    <div class="col">
                                                        <a href="/Pages/jobDetail/<?= $jc['jobId']; ?>" style="text-decoration: none; color: black;"> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="blue" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li>
                                <div class="alert alert-danger" role="alert">
                                    You are not added the job!
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?= $this->endSection(); ?>