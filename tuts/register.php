<?php

 include('config/db_connect.php');

 $email = $name = $password = '';
 $errors = array('email' => '', 'name' => '', 'password' => '');

 if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email'] = 'Please enter your email <br />';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Please enter a valid email address.';
        }
    }
    if(empty($_POST['name'])){
        $errors['name'] = 'Please enter your name <br />';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'Please enter your password <br />';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }

    if(array_filter($errors)){
        echo 'errors in the form';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "INSERT INTO users(email, name, password) VALUES('$email', '$name', '$password')";

        if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        } else {
            echo 'querry error' . mysqli_error($conn);
        }

    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<section class="container text-grey">
    <h4 class="center">Register</h4>
    <form action="register.php" method="POST" class="white">
        <label for="">Enter your email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label for="">Enter your name: </label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name'] ?></div>
        <label for="">Enter your passowrd: </label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
        <div class="red-text"><?php echo $errors['password'] ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>
    
</html>