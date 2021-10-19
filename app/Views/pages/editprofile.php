<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<?php if (user()->role == "Job Seeker") : ?>
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
                <div class="col-24 col-md-12 order-1 order-md-0">
                    <img src="/img/<?= user()->userImage; ?>" alt="Profile Picture" class="d-block mx-auto w-25 mt-4 mb-4">
                    <form action="/Pages/saveEditProfile/<?= user()->id ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <h3 class="mt-4 mb-4">Profile</h3>

                        <input type="hidden" name="userImageOld" value="<?= user()->userImage; ?>">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : ''; ?>" value="<?= (old('firstname')) ? old('firstname') : user()->firstname ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('firstname'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control <?= ($validation->hasError('lastname')) ? 'is-invalid' : ''; ?>" value="<?= (old('lastname')) ? old('lastname') : user()->lastname ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lastname'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob">Birth Date</label>
                            <input type="date" id="dob" name="dob" class="form-control <?= ($validation->hasError('dob')) ? 'is-invalid' : ''; ?>" value="<?= (old('dob')) ?  old('dob') : user()->dob ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('dob'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="male" name="gender" value="male">
                                            <label for="Male">Male</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="female" name="gender" value="female">
                                            <label for="female">Female</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gender'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phonenum">Phone Number</label>
                            <input type="text" id="phonenum" name="phonenum" class="form-control <?= ($validation->hasError('phonenum')) ? 'is-invalid' : ''; ?>" value="<?= (old('phonenum')) ?  old('phonenum') : user()->phonenum ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('phonenum'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="academicdegree">Academic Degree</label>
                            <select id="academicdegree" name="academicdegree" class="form-control <?= ($validation->hasError('academicdegree')) ? 'is-invalid' : ''; ?>" value="<?= (old('academicdegree')) ?  old('academicdegree') : user()->academicdegree ?>">
                                <option value="bachelorDegree">Bachelor Degree</option>
                                <option value="doctorDegree">Doctor Degree</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('academicdegree'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" class="form-control <?= ($validation->hasError('country')) ? 'is-invalid' : ''; ?>" value="<?= (old('country')) ?  old('country') : user()->country ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('country'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" class="form-control <?= ($validation->hasError('city')) ? 'is-invalid' : ''; ?>" value="<?= (old('city')) ?  old('city') : user()->city ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('city'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" value="<?= (old('address')) ?  old('address') : user()->address ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('address'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userImage" class="col-sm-2-form-label">Profile Image</label>
                            <div class="col-sm-2 mb-4">
                                <img src="/img/<?= user()->userImage; ?>" alt="Profil Picture" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('userImage')) ? 'is-invalid' : ''; ?>" id="userImage" name="userImage" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('userImage'); ?>
                                    </div>
                                    <label class="custom-file-label" for="userImage"><?= user()->userImage; ?></label>
                                </div>
                            </div>
                        </div>

                        <!-- <input type="hidden" name="statusLogin" value="notFirstLogin"> -->

                        <button type="submit" class="btn btn-primary w-100 text-center">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
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
                <div class="col-24 col-md-12 order-1 order-md-0">
                    <img src="/img/<?= user()->userImage; ?>" alt="Profile Picture" class="d-block mx-auto w-25 mt-4 mb-4">
                    <form action="/Pages/saveEditProfileCompany/<?= user()->id ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <h3 class="mt-4 mb-4">Profile</h3>

                        <input type="hidden" name="userImageOld" value="<?= user()->userImage; ?>">
                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                            <input type="text" id="companyName" name="companyName" class="form-control <?= ($validation->hasError('companyName')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyName')) ? old('companyName') : user()->companyName ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('companyName'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="companyIndustry">Industry</label>
                            <input type="text" id="companyIndustry" name="companyIndustry" class="form-control <?= ($validation->hasError('companyIndustry')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyIndustry')) ? old('companyIndustry') : user()->companyIndustry ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('companyIndustry'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="companyType">Company Type</label>
                            <input type="text" id="companyType" name="companyType" class="form-control <?= ($validation->hasError('companyType')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyType')) ? old('companyType') : user()->companyType ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('companyType'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="companyCountry">Country</label>
                                    <input type="text" id="companyCountry" name="companyCountry" class="form-control <?= ($validation->hasError('companyCountry')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyCountry')) ? old('companyCountry') : user()->companyCountry ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('companyCountry'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="companyCity">City</label>
                                    <input type="text" id="companyCity" name="companyCity" class="form-control <?= ($validation->hasError('companyCity')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyCity')) ? old('companyCity') : user()->companyCity ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('companyCity'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="companyAddress">Company Address</label>
                            <input type="text" id="companyAddress" name="companyAddress" class="form-control <?= ($validation->hasError('companyAddress')) ? 'is-invalid' : ''; ?>" value="<?= (old('companyAddress')) ? old('companyAddress') : user()->companyAddress ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('companyAddress'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userImage" class="col-sm-2-form-label">Profile Image</label>
                            <div class="col-sm-2 mb-4">
                                <img src="/img/<?= user()->userImage; ?>" alt="Profil Picture" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('userImage')) ? 'is-invalid' : ''; ?>" id="userImage" name="userImage" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('userImage'); ?>
                                    </div>
                                    <label class="custom-file-label" for="userImage"><?= user()->userImage; ?></label>
                                </div>
                            </div>
                        </div>

                        <!-- <input type="hidden" name="statusLogin" value="notFirstLogin"> -->

                        <button type="submit" class="btn btn-primary w-100 text-center">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?= $this->endSection() ?>