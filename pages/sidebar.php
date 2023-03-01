<div class="container_sidebar">

    <?php include("./includes/common.php"); ?>
    <div class="row_sidebar">
        <div class="sidebar">
            <ul class="top_sidebar">
                <li><i class="fa-solid fa-house"></i><a href="index.php?action=home"> Home</a></li>
                <li><i class="fa-solid fa-list-check"></i><a href="index.php">&nbspProject</a>
                </li>
            </ul>
            <?php 
            if(isset($_SESSION['email'])){
            ?>
            <?php 
               $sql1 = "SELECT user.idDepartment as idD FROM user JOIN department ON  department.idDepartment=user.idDepartment WHERE emailUser = '".$_SESSION['email']."'";
               $query1 = mysqli_query($con,$sql1);
               $row1 = mysqli_fetch_array($query1);
               
               $sql = "SELECT * FROM project JOIN department ON department.idDepartment = project.idDepartment WHERE project.idDepartment='".$row1['idD']."'";
               $query = mysqli_query($con,$sql); 
            ?>
            <ul id="bottom_sidebar">
                <?php 
                    $i=0;
                    while($row = mysqli_fetch_array($query)){
                        $i++;
                        ?>
                <li class="yourproject">
                    <a href="index.php?action=detail&idProject=<?php echo $row['idProject'] ?>"><?php echo $row['nameProject'] ?>
                    </a><i class="fa-solid fa-angle-up" id="icon<?php echo $i?>"
                        onClick="showHide(<?php echo $i-1 ?>,this.id)"></i>
                    <ul class="myDiv">
                        <li>
                            <a href="#">Member</a>
                        </li>
                        <li>
                            <a href="#">WorkList</a>
                        </li>
                        <li>
                            <a href="#">Statistics And Reports</a>
                        </li>
                    </ul>
                </li>
                <?php
                    } ?>



            </ul>
            <?php     
            }else{
           ?>
            <div></div>
            <?php 
            }
           ?>
        </div>
    </div>
    <script>
    let check = false;

    function showHide(key, id) {
        var myDiv = document.getElementsByClassName('myDiv');
        var myUl = document.getElementsByClassName('yourproject');
        var icon = document.getElementById(id);
        if (icon.classList[1] == 'fa-angle-up') {
            icon.classList.replace('fa-angle-up', 'fa-chevron-down');
        } else {
            icon.classList.replace('fa-chevron-down', 'fa-angle-up')
        }

        if (myDiv[key].style.display == 'none') {
            myDiv[key].style.display = "block";
            myUl[key].style.height = '150px';
        } else {
            myDiv[key].style.display = 'none';
            myUl[key].style.height = '60px'
        }



    }
    </script>
</div>