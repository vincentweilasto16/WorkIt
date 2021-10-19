<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-5 order-1 order-md-0">
                <form action="/Pages/saveEditJob/<?= $job->jobId; ?>?>" method="POST">
                    <?= csrf_field() ?>
                    <h3 class="mt-4 mb-4">Update Job</h3>

                    <div class="form-group">
                        <label for="jobName">Job Name</label>
                        <input type="text" id="jobName" name="jobName" class="form-control <?= ($validation->hasError('jobName')) ? 'is-invalid' : ''; ?>" value="<?= (old('jobName')) ? old('jobName') : $job->jobName ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jobName'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="companyIndustry">Job Description</label>
                        <input type="text" id="jobDescription" name="jobDescription" class="form-control <?= ($validation->hasError('jobDescription')) ? 'is-invalid' : ''; ?>" value="<?= (old('jobDescription')) ? old('jobDescription') : $job->jobDescription ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jobDescription'); ?>
                        </div>
                    </div>

                    <!-- <input type="hidden" name="statusLogin" value="notFirstLogin"> -->

                    <button type="submit" class="btn btn-primary w-100 text-center">Save</button>
                </form>
            </div>
            <div class="col-12 col-md-7">
                <img src="/img/Asset2.jpg" alt="Asset2" class="w-100">
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>