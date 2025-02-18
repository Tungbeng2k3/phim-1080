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
  <script src="../web/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/expanded.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
  <div style="width: 1000px;margin-top: 100px;" class="container">
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
          <a style="text-decoration: none;font-size: 24px;color: #fff;" href="#">PHIM HOẠT HÌNH</a>
        </div>
      </div>
    </div>
  </div>
  <div  style="width: 1000px;" class="container">
    
    <?php
                  require("connect.php");

                  echo "<div id='main-body' class='container' style='width: 1000px; margin-top: 10px; padding: 0;'>";


                  $sql = "";
                  
                  $category_id = 3;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  40 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                        echo"<div class = 'box-film' >";
                       echo"<div class = 'anh-film'>";
                        echo"<a href ='#'>";
                        echo"<img class = 'anh-film' src='".$movies['intro_img']."' alt=''>";
                        echo"</a>";
                       
                        echo"<div class='film-title'>";
                        echo"<div class='title-heading'>" .$movies['cate_name']. "</div>";
                        echo"<div class ='film-info'>";
                        echo"<div class = 'title-views'>" .$movies['cate_views']. "</div>";
                        echo"<div class = 'title-esp'>" .$movies['cate_eps'] . "</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
      
                      }
                    }
  
                    echo "</div>"; 
                    mysqli_close($conn);
                ?>
    </div>

  </div>
</body>

</html>