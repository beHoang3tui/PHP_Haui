<div class="container_sidebar">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <?php include("./includes/common.php"); ?>
    <div class="row_sidebar">
        <div class="sidebar">
            <ul class="top_sidebar">
                <li><i class="fa-solid fa-house"></i><a href="#"> Home</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                <ul class="listHome">
                    <li><a href="index1.php?action=listTV"> Danh sách thành viên</a>  </li>
                    <li><a href="index1.php?action=listDoc"> Tài liệu dự án</a></li>
                </ul>
                <?php } ?>
                <li><i class="fa-solid fa-list-check"></i><a href="#">&nbspProject</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <?php
                $sql = "SELECT idDepartment FROM `user` WHERE emailUser='" . $_SESSION['email'] . "' ";
                $query = mysqli_query($con, $sql);
                $rows = mysqli_fetch_array($query);
                $sql1 = "SELECT * FROM project WHERE idDepartment = '" . $rows["idDepartment"] . "' ";
                $query1 = mysqli_query($con, $sql1);
                ?>
                <ul id="bottom_sidebar">
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query1)) {
                        $i++;
                    ?>
                        <li class="yourproject">
                            <a href="index.php?action=detail&idProject=<?php echo $row['idProject'] ?>"><?php echo $row['nameProject'] ?>
                            </a><i class="fa-solid fa-angle-up" onClick="showHide(<?php echo $i - 1 ?>)"></i>
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
            } else {
            ?>
                <div></div>
            <?php
            }
            ?>
            <?php
             if (isset($_SESSION['email'])){
                $sql = "SELECT * FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);   
                if($row['role']=="Trưởng phòng"){  ?>
                <ul class="addProject">
                    <li><a href="index1.php?action=add">Thêm mới dự án <i class="far fa-plus"></i></a></li>
                </ul>
               <?php }} ?>
           
        </div>
    </div>
    <script>
        let check = false;

        function showHide(key) {
            console.log(key);
            var myDiv = document.getElementsByClassName('myDiv');
            var myUl = document.getElementsByClassName('yourproject');
            console.log(myDiv[0].style);
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