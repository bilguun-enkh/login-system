<?php

include('config/db_connect.php');

$isLoggedIn = isset($_SESSION['email']);

$sql = 'SELECT email, name, password, id FROM users';

$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php if ($isLoggedIn): ?>
            <h1 class='center'>Users</h1>
            <?php foreach ($users as $user): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <h6>
                                Name:
                                <?php echo htmlspecialchars($user['name']); ?>
                            </h6>
                            <h6> Email:
                                <?php echo htmlspecialchars($user['email']); ?>

                            </h6>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $user['id'] ?>">More details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h1>Please login.</h1>
        <?php endif; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>