<?php
    require("connect.php");
    if(isset($_POST["btn_insert"])){
        //lay ra gia tri duoc nhap vao text
        $cate_id = $_POST["cate"];
        $cate_name = $_POST["cate_phim"];
        $cate_nation = $_POST["cate_nation"];
        $cate_year= $_POST["cate_year"];
        $cate_genre= $_POST["cate_genre"];
        $cate_content= $_POST["cate_content"];
        $cate_eps = $_POST["txt_eps"];
        $cate_views = $_POST["txt_views"];
        $status = $_POST["txt_status"];

        //upload intro img
        $target_dir = "../upload_phim/";
        $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //kiem tra dinh dang file anh
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
       
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } 
          else {
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
                $sql_insert = "insert into tbl_details(cate_id,cate_name,intro_img,cate_nation,cate_year,cate_genre,cate_content,cate_eps,cate_views,status) values(".$cate_id.",'".$cate_name."','".$target_file."','".$cate_nation."','".$cate_year."','".$cate_genre."','".$cate_content."','".$cate_eps."','".$cate_views."',".$status.")";
                if (mysqli_query($conn, $sql_insert)) {
                    header("location:details.php");
                    //echo "New record created successfully";
                } 
                else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
          }

        
    }

    //xoa theo chọn
    if(isset($_POST["delete_check"])){
        $new_ids = $_POST["news"];
        foreach($new_ids as $c){
            $sql_delete = 'DELETE FROM tbl_details WHERE new_id = '.$c;
            if(mysqli_query($conn,$sql_delete)){
                //xoa thanh cong
            }

        }
        header("location:details.php");
    }
    //xoa
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_details where new_id = " . $id;
        if (mysqli_query($conn, $sql_delete)) {
            //echo "New record created successfully";
            header("location:details.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
<html>
<style>
            .pagination-container {
                display: flex;
                justify-content: center;
                margin-top: 20px; /* Thêm margin trên cần thiết để tạo khoảng cách giữa phân trang và nội dung khác */
            }

            .pagination {
                list-style: none;
                padding-top: 20px;
                padding-left: 500px;
                margin-bottom:200px
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
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    </head>
    <body style="background-color: #ffffcc;">
        <div class="container">
            <h1 style="text-align: center;">Trang Quản Trị Phim</h1>
            <div class="row">
                <div class="col-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        Chọn danh mục:
                        <select class="form-control" name="cate" id="">
                            <?php
                                $sql = "select * from tbl_category order by cate_id ASC";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='".$row["cate_id"]."'>".$row["cate_name"]."</option>";
                                    }
                                }
                            ?>
                        </select>
                        Nhập tên phim :
                        <input class="form-control" type="text" name="cate_phim" id="" required>
                        
                        Chọn ảnh phim:
                        <input class="form-control" type="file" name="upload_file" id="" required>
                        Quốc Gia:
                        <input class="form-control" type="text" name="cate_nation" id="" required>
                        Năm Phát Hành:
                        <input class="form-control" type="text" name="cate_year" id="" required>
                        Thể Loại:
                        <input class="form-control" type="text" name="cate_genre" id="" required>
                        Nội Dung:
                        <textarea name="cate_content" id="editor"></textarea>
                        <script>
                                ClassicEditor
                                        .create( document.querySelector( '#editor' ) )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                        </script>
                        
                        Thời lượng phim:
                        <input class="form-control" type="text" name="txt_eps" id=""required>
                       
                        Lượt xem phim:
                        <input class="form-control" type="text" name="txt_views" id=""required>
                        
                        Nhập trạng thái tin tức:
                        <input class="form-control" type="text" name="txt_status" id="">
                        <br>
                        <input class="btn btn-primary" name="btn_insert" type="submit" value="Thêm mới">
                        <br>
                        
                    </form>
                </div>
            </div>
            <div class="row">
                
                <div class="col-6">
                    <form action="" method="post">
                        
                            <input placeholder="tim kiem theo tieu de tin ..." class="form-control" type="text" name="txt_search" id="">
                            <br>
                            <input class="btn btn-success" type="submit" value="Tìm kiếm" name="btn_search">
                            <br><br>
                                   
                    </form>
                </div>
            </div>
            <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(new_id) as total from tbl_details');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 4;
                
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
                    <form action=""method="POST">
                    <input class="btn btn-danger "name="delete_check" type="submit" value="Xóa theo chọn" >
                      
                    <br><br>
                    <table class="table table-stripped">
                        <tr>
                            <th>Mã Phim</th>
                            <th>Tên Danh Mục</th>
                            <th>Tên Phim</th>
                            <th>Ảnh Phim</th>
                            <th>Quốc Gia</th>
                            <th>Năm Phát Hành</th>
                            <th>Thể Loại</th>
                            <th>Nội Dung</th>
                            <th>Thời Lượng Phim</th>
                            <th>Lượt xem </th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                            <th>Chọn</th>
                        </tr>
                        <?php

                            $sql = "";
                            if(isset($_POST["txt_search"])){
                                $name = $_POST["txt_search"];
                                $sql = "select * from tbl_details where cate_name like '%".$name."%'";
                            }
                            else
                            $sql = "select * from tbl_details order by new_id DESC LIMIT ".$start.",". $limit ;
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $s = "";
                                    if($row["status"]==0){
                                        $s = "<p style='color:red'>An</p>";
                                    }
                                    else{
                                        $s = "<p style='color:green'>Hien</p>";
                                    }
                                    echo "<tr>";
                                    echo "<td>". $row["new_id"] . "</td>";
                                    echo "<td>". $row["cate_id"] . "</td>";
                                    echo "<td>". $row["cate_name"] . "</td>";
                                    
                                    echo "<td><img src='". $row["intro_img"] ."'  width='100' height='80'></td>";
                                    echo "<td>". $row["cate_nation"] . "</td>";
                                    echo "<td>". $row["cate_year"] . "</td>";
                                    echo "<td>". $row["cate_genre"] . "</td>";
                                    echo "<td>". $row["cate_content"] . "</td>";

                                    echo "<td>". $row["cate_eps"] . "</td>";
                                    echo"<td>" . $row["cate_views"]."</td>";
                                    echo "<td>".$s."</td>";
                                    echo "<td>";
                                        echo "<a class='btn btn-warning' href='edit_details.php?task=update&id=".$row["new_id"]."'>Sửa</a>";
                                        echo "<a class='btn btn-danger' href='details.php?task=delete&id=".$row["new_id"]."'>Xóa</a>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<input type='checkbox' name='news[]' value='".$row["new_id"]."' class='form-check-input'>";
                                    echo "</td>";
                                    echo "</tr>";
                                    //echo $row["cate_id"] . " , " . $row["cate_name"] . "<br>";
                                }
                            }
                            else{
                                echo "Bảng không chứa dữ liệu";
                            }
                        ?>
                        
                     </table>
                     </form>
                </div>
                <div class="pagination">
                <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="details.php?page='.($current_page-1).'">Truoc</a>  ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span class ="current-page">'.$i.'</span>  ';
                            }
                            else{
                                echo '<a href="details.php?page='.$i.'">'.$i.'</a>  ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="details.php?page='.($current_page+1).'">Sau</a>  ';
                        }
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>
