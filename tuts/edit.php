<?php
include('config/db_connect.php');
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE users set email='" . $_POST['email'] . "', name='" . $_POST['name'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM users WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $email = $user['email'];
        $name = $user['name'];
    } else {
        header("Location: index.php");
        exit();
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<div class="container">
    <div class="green-text center">
        <h2>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </h2>
    </div>
    <h1 class="center">Edit</h1>
    <form action="edit.php?id=<?php echo $user['id'] ?>" method="POST" class="white">
        <label for="">Enter your email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <label for="">Enter your name: </label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">
        <div class="center">
            <input type="submit" name="submit" value="edit" class="btn z-depth-0">
        </div>
    </form>
</div>
<?php include('templates/footer.php'); ?>

</html>