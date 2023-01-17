
<!-- Mampiseho message milaza erreur na tsia  -->

<!DOCTYPE html>
<html>
<body>
    <style>
        .alert {
            position: fixed;
            align-items: center;
            color: white;
            border: 1px solid black;
            top: 2%;
        }
        .danger {
            background-color: rgb(228, 46, 46);
        }
        .success {
            background-color: rgb(50, 150, 50);
        }

    </style>

    <?php if (session_status() == PHP_SESSION_NONE) { session_start(); } ?>
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?> 
            <div class="alert <?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

</body>
</html>