<?php

require_once './app/require.php';

Util::isUser();
Util::isBanned();

require_once './app/controllers/cheatController.php';
require_once './app/controllers/userController.php';

$userController = new userController;
$cheatData = (new cheatController)->getCheatData();

$userCount = $userController->getCount();
$newestUser = $userController->getNew();
$hasSub = $userController->getSubscription() > 0;

Util::head($user['username']);
Util::navbar();
?>

<main class="container mt-2">

    <div class="row">

        <!--Welcome message-->
        <div class="col-12 mt-3 mb-2">
            <div class="alert alert-primary" role="alert">
                Hey,
                <a href="<?= BASE_PATH; ?>profile.php"><b><?= Util::display($user['username']) ?></b></a>.
            </div>
        </div>

        <!--Statistics-->
        <div class="col-lg-9 col-md-12">
            <div class="rounded p-3 mb-3">
                <div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-chart-area"></i> Statistics</div>
                <div class="row text-muted">
                    <h5>There are no active users currrently!</h5>
                </div>
            </div>
        </div>
        <!--More Loader Stuff-->
        <div class="col-lg-9 col-md-12">
            <div class="rounded p-3 mb-3">
                <div class="h5 border-bottom border-secondary pb-1"><i class="fas fa-chart-area"></i> Loader Info</div>
                <div class="row text-muted">
                    <a>Loader is in DEV stage, Please return when  the loader is back.</a>
                </div>
            </div>
        </div>
    </div>

</main>

<?php Util::footer(); ?>
