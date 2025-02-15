<?php
    require("connect.php");
    
    //kiem tra xem nguoi dung da nhan nut them moi hay chua
    if(isset($_POST["insert"])){
        //lay gia tri tu cac o nhap lieu
        $cate_name = $_POST["txt_cate_name"];
        $status = $_POST["txt_status"];
        $sql_insert = "insert into tbl_category(cate_name,status) values(N'".$cate_name."',".$status.")";
        if (mysqli_query($conn, $sql_insert)) {
           
            header("location:category.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    //xoa
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_category where cate_id = " . $id;
        if (mysqli_query($conn, $sql_delete)) {
           
            header("location:category.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if(isset($_POST["delete_check"])){
        $cate_id = $_POST["cate"];
        foreach($cate_id as $c){
            $sql_delete = "delete from tbl_category where cate_id = " . $c;
            if (mysqli_query($conn, $sql_delete)) {
              
                header("location:category.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            .pagination a{
                border:1px solid black;
                padding:5px;
            }
            .pagination{
                margin-bottom:200px;
            }
            <style>
            .pagination-container {
                display: flex;
                justify-content: center;
                margin-top: 20px; /* Thêm margin trên cần thiết để tạo khoảng cách giữa phân trang và nội dung khác */
            }

            .pagination {
                list-style: none;
                padding-top: 20px;
                padding-left: 35%;
                
            }

            .pagination a,
            .pagination span {
                margin: 0 5px;
                padding: 8px 12px;
                text-decoration: none;
                color: #333;
                background-color: #f2f2f2;
                border: 1px solid white;
                border-radius: 4px;
                cursor: pointer;
            }

            .pagination a:hover {
                background-color: olive;
            }

            .pagination span {
                background-color: #611E1E;
                color: white;
                border: 1px solid #611E1E;
                cursor: default;
            }
        
        </style>
    </head>
    <body style="background-color: beige;">
        <div class="container">
            <h1 style="text-align: center; color: blue;">TRANG QUẢN TRỊ DANH MỤC</h1>
            <div class="row">
                <div class="col-6">
                    <form action="category.php" method="post">
                        Nhập vào danh mục:
                        <input class="form-control" type="text" name="txt_cate_name" id="">
                        Nhập vào trạng thái:
                        <input class="form-control" type="text" name="txt_status" id="">
                        <br>
                        <input class="btn btn-primary" type="submit" value="Them moi" name="insert">
                        <br>
                        Tìm kiếm danh mục:
                        <input class="form-control" type="text" name="txt_search" id="">
                        <input class="btn btn-success" type="submit" value="Tim kiem" name="search">
                    </form>
                </div>
            </div>
            <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(cate_id) as total from tbl_category');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
                
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                
                // Tìm Start
                $start = ($current_page - 1) * $limit;
            ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-stripped">
                        <tr>
                            <th>Mã Danh Mục</th>
                            <th>Tên Danh Mục</th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                            <th>Chọn</th>
                        </tr>
                        <form action="category.php" method="post">
                            <input type="submit" value="Xóa Theo Chọn" name="delete_check" class="btn btn-info">
                            <input type="submit" value="Xóa Tất Cả" name="delete_all" class="btn btn-danger">
                            <input type="submit" value="Đăng Nhập" name="logout" class="btn btn-info">
                            <br>
                        <?php
                            $sql = "";
                            if(isset($_POST["search"])){
                                $cate_name = $_POST["txt_search"];
                                $sql = "select * from tbl_category where cate_name like '%".$cate_name."%'";
                            }
                            else
                            //lay va hien thi du lieu
                                $sql = "select * from tbl_category LIMIT ".$start.",". $limit;
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)) {
                                    $st = "";
                                    if($row["status"]==0){
                                        $st = "<p style='color:red'>an</p>";
                                    }
                                    else
                                        $st = "<p style='color:green;'>hien</p>";
                                    echo "<tr>";
                                    echo "<td>".$row["cate_id"]."</td>";
                                    echo "<td>".$row["cate_name"]."</td>";
                                    echo "<td>".$st."</td>";
                                    echo "<td>";
                                        echo "<a class='btn btn-warning' href='update_cate.php?task=update&id=".$row["cate_id"]."'>Sua</a>";
                                        echo "<a class='btn btn-danger' href='category.php?task=delete&id=".$row["cate_id"]."'>Xoa</a>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<input type='checkbox' name='cate[]' value='".$row["cate_id"]."' class='form-check-input'>";
                                    echo "</td>";
                                    echo "</tr>";
                                    //echo $row["cate_id"] . " , " . $row["cate_name"] . " , " . $st . "<br>";
                                }
                            }
                            else
                            {
                                echo "Ban khong chua du lieu";
                            }
                        ?>
                        </form>
                    </table>
                </div>  
                <div class="pagination">
                    <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="category.php?page='.($current_page-1).'">Truoc</a>  ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span>'.$i.'</span>  ';
                            }
                            else{
                                echo '<a href="category.php?page='.$i.'">'.$i.'</a>  ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="category.php?page='.($current_page+1).'">Sau</a>  ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>