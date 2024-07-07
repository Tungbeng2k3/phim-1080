<?php
    require("connect.php");
    session_start();
    //kiem tra xem dang nhap hay chua
    //$email=[];
    $user = (isset($_SESSION['user']))? $_SESSION['user']: [];

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
  <title>Xem Phim Online Chất Lượng Cao</title>
  <link href="../web/bootstrap.min.css" rel="stylesheet" />
  <script src="../web/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/home_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                color: red;
                background-color: #f2f2f2;
                border: 1px solid white;
                border-radius: 4px;
                cursor: pointer;
            }

            .pagination a:hover {
                background-color: blue;
            }

            .pagination span {
                background-color: #611E1E;
                color: white;
                border: 1px solid #611E1E;
                cursor: default;
            }
        </style>
</head>

<body>
  <div class="fruid-container">
    <!-- header site -->
    <nav class="navbar bg-transparent">
      <div class="container">
        <a class="navbar-brand" href="home_index.php">
          <img src="../images/phim1080.png" alt="" width="120" height="22">
        </a>
        <a class="navbar-brand" href="#">THỂ LOẠI</a>
        <a class="navbar-brand" href="#">QUỐC GIA</a>
        <a class="navbar-brand" href="#">PHIM LẺ</a>
        <a class="navbar-brand" href="#">PHIM BỘ</a>
        <a class="navbar-brand" href="#">CHIẾU RẠP</a>
        <a class="navbar-brand" href="#">SẮP CHIẾU</a>
        <form class="d-flex" role="search" action='search_film.php' method='GET'>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='txt_search' required >
          <button class="btn btn-outline-success" name='btn_search' type="submit">Search</button>
        </form>
        <!-- user-icon -->
        <?php 
            if(isset($user['email'])){?>
          <span style="color: white;"><?php echo $user['email']; ?></span>
          <br>
          <input type="submit" value="Đăng xuất" name="logout" class="form-submit" onclick="window.location.href='logout.php'">  
            <?php }else{ ?>
            <a class="navbar-brand" href="login.php">
              <svg style="margin-left: 60px;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
            </a>
            <?php }?>
      </div>

    </nav>
  </div>
  <!-- body -->
  <div class="body-main">
    <div class="main-container">
      <div class="row">
        <div class="col-9">
          <div class="logo">
            <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
              <path
                d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
              <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
            </svg>
            <a href="">PHIM ĐỀ CỬ</a>
          </div>
        </div>

        <div style="margin-top: 10px;" class="col-3">
        <div id="chu-a">
    <a href="#" style="text-decoration: none; color: inherit;">Xem tất cả</a>
</div>
<i style="margin-top: 3px;" class="fa-solid fa-film"></i>


          
        </div>



        <!-- anh phim -->
        <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $product_id= 1;
                $result = mysqli_query($conn, "select count(new_id) as total from tbl_details where cate_id = $product_id");
       
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 8;
                
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

        <div class="container-film">
        <?php

                


                  require("connect.php");

                echo "<div class='film-body-container'>";
                  $sql = "";
                  
                 
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = 1 ORDER BY new_id DESC ";

                  $result_movies = mysqli_query($conn, $sql_movie);



                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo "<div class='box-a'>";
                          echo "<div class='film-1' id='film-a'>";
                          echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                          echo "<img src='" . $movies["intro_img"] . "' alt='' class='anh-film-a'>";
                          echo "</a>";
                          echo "</div>";
                          echo"<div class = 'film-title'>";
                          echo"<div style ='font-size: 20px' class='title-heading'> "  . $movies['cate_name'] . "</div>";
                          echo "<div class='title-name'>Only for love</div>";
                          echo"<div style = 'margin-top: 4px' class = 'film-info'>";
                          echo"<div class ='title-views' >". $movies['cate_views'] . "</div>";
                          echo"<div class ='title-eps' >". $movies['cate_eps'] . "</div>";
                          echo"</div>";
                          
                          echo "</div>";
                          echo"</div>";
                      }
                  }
                  $category_id = 1;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT $start, $limit";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo "<div class='box-b'>";
                          echo "<div class='film-a'>";
                          echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                          echo "<img src='" . $movies["intro_img"] . "' alt='' class='anh-film'>";
                          echo "</a>";
                          echo "</div>";
                          echo"<div class = 'film-title'>";
                          echo"<div  class='title-heading'> "  . $movies['cate_name'] . "</div>";
                         
                          echo"<div class = 'film-info'>";
                          echo"<div class ='title-views' >". $movies['cate_views'] . "</div>";
                          echo"<div class ='title-eps' >". $movies['cate_eps'] . "</div>";
                          echo"</div>";
                          
                          echo "</div>";
                          echo"</div>";
                          
                      }
                  }

                  echo "</div>"; 
                  
              ?>
          </div>
          <div class="pagination">
                <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="home_index.php?page='.($current_page-1).'">Truoc</a>  ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span class ="current-page">'.$i.'</span>  ';
                            }
                            else{
                                echo '<a href="home_index.php?page='.$i.'">'.$i.'</a>  ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="home_index.php?page='.($current_page+1).'">Sau</a>  ';
                        }
                    ?>
                </div>

        </div>
      </div>
      
    </div>
    <div class="main-container">
      <div class="row">
        <div class="col-9">
          <div class="logo">
            <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
              <path
                d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
              <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
            </svg>
            <a href="">PHIM HOẠT HÌNH</a>
          </div>
        </div>

        
        <div style="margin-top: 10px;" class="col-3">
        <div id="chu-a">
    <a href="Expanded.php" style="text-decoration: none; color: inherit;">Xem tất cả</a>
</div>
<i style="margin-top: 3px;" class="fa-solid fa-film"></i>


          
        </div>



        <!-- anh phim -->
        
        <div class="container-film">
        <?php
                  require("connect.php");

                echo "<div class='film-body-container-c'>";
                  $sql = "";
                  
                  $category_id = 3;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT 1 OFFSET 0";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                        echo"<div class = 'box-a'>";
                        echo"<div id='film-c' class='film-1'>";
                        echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                        echo "<img src='" . $movies['intro_img'] . "' alt='' class='anh-film-a'>";
                        echo"</a>";
                        echo"</div>";
                        echo"<div class ='film-title'>";
                        echo"<div class ='title-heading'>" .$movies['cate_name']. "</div>";
                        echo"<div class = 'film-info'>";
                        echo"<div class = 'title-views'>" .$movies['cate_views']. "</div>";
                        echo"<div class = 'title-eps'>" .$movies['cate_eps']. "</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                      }}
                      $category_id = 3;
                      $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  6 OFFSET 1";
                      $result_movies = mysqli_query($conn, $sql_movie);
    
                      if (mysqli_num_rows($result_movies) > 0) {
                          while ($movies = mysqli_fetch_assoc($result_movies)) {
                            echo"<div class = 'box-b'>";
                            echo"<div  class='film-c'>";
                            echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                            echo "<img src='" . $movies['intro_img'] . "' alt='' class='anh-film-a'>";
                            echo"</a>";
                            echo"</div>";
                            echo"<div class ='film-title'>";
                            echo"<div class ='title-heading'>" .$movies['cate_name']. "</div>";
                            echo"<div class = 'film-info'>";
                            echo"<div class = 'title-views'>" .$movies['cate_views'] ."</div>";
                            echo"<div class = 'title-eps'>" .$movies['cate_eps']. "</div>";
                            echo"</div>";
                            echo"</div>";
                            echo"</div>"; 
                              
                          }
                      }
    
                      echo "</div>"; 
                      
                  ?>

        </div>
      </div>
      
    </div>

    
    <div class="body-film-2">
      <div class="title_1">
        <img style="width: 100%;height: 70px;" src="../images/nen popcorn.jpg" alt="Cinque Terre">
        <div class="center">
          <p>PHIM CHIẾU RẠP</p>
          <div class="topright">
            <img style="width: 100px;height: 100px;" src="../images/popcorn-svgrepo-com (1).svg" alt="">
          </div>
        </div>
      </div>
      <div class="bg-film-2">
        <div style="margin-top: 0;" class="main-container">
        <?php
                  require("connect.php");

                echo "<div class='film-body-container-b'>";
                  $sql = "";
                  
                  $category_id = 4;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  10 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo"<div class = 'film-b'>";
                          echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                          echo"<img src= '". $movies['intro_img'] ."' alt=''>";
                          echo"</a>";
                          echo"<div class = 'film-title'>";
                          echo"<div class='title-heading'>" .$movies['cate_name']. "</div>";
                          echo"<div class = 'film-info'>";
                          echo"<div class = 'title-views'>" .$movies['cate_views']. "</div>";
                          echo"<div class = 'title-eps'>". $movies['cate_eps']. "</div>";
                          echo"</div>";
                          echo"</div>";
                          echo"</div>";

                      }
                    }
  
                    echo "</div>"; 
                    
                ?>
        </div>
      </div>
      


    </div>
    <!-- ranking -->
    <div class="body-main">
      <div class="main-container">
        <div class="row">
          <div class="col-9">
            <div class="logo">
              <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
                <path
                  d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg>
              <a href="#">BẢNG XẾP HẠNG</a>
            </div>
          </div>
          <div class="col"></div>
        </div>
      </div>
    </div>
    <!-- ranking -->
    <div style="width: 1000px;" class="container">

     
      <?php
                  require("connect.php");

                echo "<div class='cate_rank'>";
                  $sql = "";
                  
                  $category_id = 7;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  5 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                        echo"<div class = 'rank'>";
                        
                        echo"<img class= 'anh_rank' src= '".$movies['intro_img']."' alt=''>";
                        echo"<div class = 'number'>" .$movies['cate_views']. "</div>";
                        echo"</div>";
                    
                      }
                    }
  
                    echo "</div>"; 
                 
                ?>
      

    </div>

    <!-- phim sap chieu -->
    <div class="main-container">
      <div class="row">
        <div class="col-9">
          <div class="logo">
            <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
              <path
                d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
              <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
            </svg>
            <a href="#">PHIM SẮP CHIẾU</a>
          </div>
        </div>

        <div style="margin-top: 10px;" class="col-3">
          <div id="chu-a">Xem tất cả</div><i style="margin-top: 3px;" class="fa-solid fa-film"></i>
        </div>



        <!-- anh phim -->
        <?php
                  require("connect.php");

                echo "<div style='margin-top: 10px' class='film-body-container-f'>";
                  $sql = "";
                  
                  $category_id = 9;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  5 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo"<div class = 'box-b' >";
                          echo"<div class='film-f'>";
                          
                          echo"<img class = 'anh-film-a' src='".$movies['intro_img']."' alt=''>";
                          echo"</a>";
                          echo"</div>";
                          echo"<div class='film-title'>";
                          echo"<div class='title-heading'>" .$movies['cate_name']. "</div>";
                          echo"<div class ='film-info'>";
                          echo"<div class = 'title-views'>" .$movies['cate_views']. "</div>";
                          echo"<div class = 'title-esp'>" .$movies['cate_eps'] . "</div>";
                          echo"</div>";
                          echo"</div>";
                          echo"</div>";
          
                      }
                    }
  
                    echo "</div>"; 
                    
                ?>
          
        
        
      </div>
      
    </div>

    <!-- footer -->

    <div class="body-film-2">
      <div class="title_1">
        <img style="width: 100%;height: 70px;" src="../images/nen popcorn.jpg" alt="Cinque Terre">
        <div class="center">
          <p>BỘ SƯU TẬP</p>

        </div>
      </div>

      <div class="layout3">
        <div style="margin-top: 0;" class="main-container">
          
          <?php
                  require("connect.php");

                echo "<div class='film-body-container-e'>";
                  $sql = "";
                  
                  $category_id = 11;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  8 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                        echo"<div class='film-e'>";
                        echo"<img src= '".$movies['intro_img']. "' alt=''>";
                        echo"</div>";

                      }
                    }
  
                    echo "</div>"; 
                  
                ?>
          </div>
        </div>


      </div>








    </div>
</body>

</html>