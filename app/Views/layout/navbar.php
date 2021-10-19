<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vincent Weilasto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-item nav-link" href="/pages/history">History</a>
                    <a class="nav-item nav-link" href="/pages/news">News</a>
                </div>
                <?php if (logged_in()) : ?>
                    <a class="nav-item nav-link" href="/logout">Logout</a>
                <?php else : ?>
                    <a class="nav-item nav-link" href="/login">Login</a>
                <?php endif; ?>
            </div>
        </div>
</nav> -->

<?php if (user()->role == "Job Seeker") : ?>
    <nav>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <a href="/">
                        <img src="/img/logo.png" alt="WorkIt! Logo">
                    </a>
                </div>
                <div class="col-8">
                    <ul>
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="/pages/history" class="text-white">History</a></li>
                        <li><a href="/pages/news" class="text-white">News</a></li>
                        <?php if (logged_in()) : ?>
                            <li><a href="/logout" class="text-white">Sign Out</a></li>
                        <?php else : ?>
                            <li><a href="/login" class="text-white">Sign In</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php else : ?>
    <nav>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <a href="/">
                        <img src="/img/logo.png" alt="WorkIt! Logo">
                    </a>
                </div>
                <div class="col-8">
                    <ul>
                        <li><a href="/" class="text-white">Home</a></li>
                        <?php if (logged_in()) : ?>
                            <li><a href="/logout" class="text-white">Sign Out</a></li>
                        <?php else : ?>
                            <li><a href="/login" class="text-white">Sign In</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>