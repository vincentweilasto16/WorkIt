<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <h3><?= user()->companyName; ?></h3>
            <img src="/img/<?= user()->userImage; ?>" alt="Profile Picture" class="d-block mx-auto w-25 mt-4 mb-4">
            <h4><?= $job->jobName; ?></h4>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h4>Detail of User Applied Job</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Academic Degree</th>
                        <th scope="col">Country</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($userDetail as $us) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $us['firstname'] . " " . $us['lastname']; ?></td>
                            <td><?= $us['dob']; ?></td>
                            <td><?= $us['phonenum']; ?></td>
                            <td><?= $us['academicdegree']; ?></td>
                            <td><?= $us['country']; ?></td>
                            <td><?= $us['city']; ?></td>
                            <td><?= $us['address']; ?></td>
                            <td>
                                <form action="/Pages/statusUser/<?= $us['historyId']; ?>" method="POST">
                                    <input type="hidden" value="<?= $us['historyId']; ?>" name="historyId">
                                    <input type="hidden" value="<?= $id ?>" name="id">
                                    <?php if ($us['userStatId'] == "1") : ?>
                                        <button type="submit" class="btn btn-success" value="2" name="accept">Accept</button>
                                    <?php endif; ?>
                                    <?php if ($us['userStatId'] == "1") : ?>
                                        <button type="submit" class="btn btn-danger" value="3" name="reject">Reject</button>
                                    <?php endif; ?>
                                    <?php if ($us['userStatId'] == "2") : ?>
                                        <p class="text-success">Accepted</p>
                                    <?php endif; ?>
                                    <?php if ($us['userStatId'] == "3") : ?>
                                        <p class="text-danger">Rejected</p>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>