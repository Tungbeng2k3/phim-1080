<?php
    require("connect.php");
    
    $this_id = $_GET['id'];

    $sql = "SELECT *FROM tbl_details WHERE new_id ='$this_id' ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    //khi nhaasn nuts luu lai
    if(isset($_POST['update'])){
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
                $sql = "UPDATE tbl_details SET cate_id='$cate_id',cate_name='$cate_name',intro_img='$target_file', cate_nation='$cate_nation',cate_year='$cate_year',cate_genre='$cate_genre',cate_content='$cate_content',cate_eps='$cate_eps',cate_views='$cate_views',status='$status'
                WHERE new_id=".$this_id;
                mysqli_query($conn, $sql);
                header('location: details.php');
          }}}
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    </head>
    <body style="background-color: #ffffcc;">
        <div class="container">
        <div class="row">
            <h1 style="text-align: center;">Trang Quản Trị Phim</h1>

            <h2> Tên Phim Cần Sửa Là:
                <?php echo $row['cate_name'];?>
            </h2>  
            <h3> Danh Mục:
                 <?php echo $row['cate_id'];?>
             </h3>
            
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
                        <input class="btn btn-primary" name="update" type="submit" value="LƯU LẠI">
                        <br>
                        
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
