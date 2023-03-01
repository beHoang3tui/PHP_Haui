<link rel="stylesheet" style="text/css" href="../css/content.css">

<div class="container_content">
    <?php include("./pages/sidebar.php"); ?>
    <?php 
        if(isset($_GET['action'])==null){
    ?>
    <div class="row_content">
        <h1>Your Project</h1>

        <div class="projects">
            <?php 
                if(isset($_SESSION['email'])){

                
            ?>
            <?php 
                $sql = "SELECT * FROM project";
                $query = mysqli_query($con,$sql); 
            ?>
            <?php 
           
            while($row=mysqli_fetch_array($query)){
                $i++;
            
        ?>
            <a href="index.php?action=detail&idProject=<?php echo $row['idProject'] ?>">

                <div class="project">
                </div>
                <div class="nameProject">
                    <?php echo $row['nameProject'] ?>
                </div>
            </a>
            <?php }?>

            <?php }else{?>
            <div class="message">Vui lòng đăng nhập vào tài khoản để hiển thị các dự án </div>
            <?php 
                
            }?>

        </div>
    </div>
    <?php 
        }
    ?>

</div>