<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $sql = "DELETE FROM users WHERE id= $id_to_delete";

    if(mysqli_query($conn, $sql)){  
        header('Location: index.php');
    } else {
        echo "query error: " . mysqli_error($conn); 
    }
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']); 
    
    $sql = "SELECT * FROM users WHERE id = $id";

    $result = mysqli_query($conn,$sql);

    $user = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center">
    <?php if($user): ?>

        <h4><?php echo htmlspecialchars($user['name']); ?></h4>
        <h4><?php echo htmlspecialchars($user['email']); ?></h4>
        <p> <?php echo date($user['created_at']) ?>  </p>

        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $user['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>
        <h5>No user found.</h5>
    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>