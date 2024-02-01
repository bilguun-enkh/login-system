<?php

include('config/db_connect.php');

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);



    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) == 1){
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            // Set cookies for email and name
            setcookie('user_email', $row['email'], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('user_name', $row['name'], time() + (86400 * 30), "/");

            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=Incorrect Email or Password");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container text-grey">
    <h4 class="center">Login</h4>
    <form action="login.php" method="POST" class="white">
        <label for="email">Enter your email: </label>
        <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <label for="password">Enter your password: </label>
        <input type="password" name="password" id="password">
        <div class="center">
            <input type="submit" name="submit" value="Login" class="btn z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>

</html>
