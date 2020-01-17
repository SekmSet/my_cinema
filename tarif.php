<?php
    include('header.php');
?>

<div class="container">
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">ABONNEMENT</h2>
            </div>
            <div class="bg-light shadow-sm mx-auto">
                <ul>
                    <li>
                        <a href="abonnement.php">
                            Voir les abonnements
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">REDUCTION</h2>
            </div>
            <div class="bg-dark shadow-sm mx-auto">
                <ul>
                    <li>
                        <a href="abonnement.php">
                            Voir les reductions
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    require ("footer.php");
?>