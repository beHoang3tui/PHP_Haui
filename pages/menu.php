<?php 
    session_start();
?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<div class="header">
    <div class="logo_header">
        <img src="./image/logo.png" alt="">
    </div>
    <nav class="menu">
        <ul>
            <li><a href="#">WordSpace</a><i class="fa-solid fa-angle-down"></i>
                <!-- your work -->
                <?php 
                $sql = "SELECT * FROM project";
                $query = mysqli_query($con,$sql); 
            ?>
                <ul>
                    <?php 
                    $i = 0;
                    while($row= mysqli_fetch_array($query)){
                        $i++;
                ?>
                    <li><a href="#"><?php echo $row['nameProject']?></a></li>
                    <?php 
                    }
                ?>
                </ul>
            </li>
            <li><a href="#">Create</a></li>
        </ul>
    </nav>
    <?php 
        include("./pages/search.php");
    ?>
    <div class="user">
        <?php 
        if(isset($_SESSION['email'])){
            $sql_user = "SELECT nameUser FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
            $query_user = mysqli_query($con,$sql_user);
            $row_user = mysqli_fetch_array($query_user);

    ?>
        <?php echo $row_user['nameUser'] ?> <i class="fa-solid fa-user"></i>
        <i class="fa-regular fa-bell"></i>
        <a href="./pages/logout.php">Log out</a>
        <?php 
        } else {
    ?>

        <a href="./pages/login.php">Log in</a>
        <?php 
        }
    ?>
    </div>
</div>