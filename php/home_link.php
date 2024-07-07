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
  <link rel="stylesheet" href="../css/link.css">
  <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
  <title>Địa Đàng Sụp Đổ Full</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #333;">
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


  <div class="container" style="margin-top: 100px; width: 1000px;">
    <div class="row">
      <!-- Bên trái (video) -->
      <div style="padding: 0;" class="col-lg-8">

        <!-- video -->
        <video class="custom-video" controls>
          <source src="../images/power-eyes-chainsaw-man-moewalls.com.mp4" type="video/mp4">
        </video>
         <?php
                // require("connect.php");
                
                // $this_id = $_GET['id'];

                // $sql_movies = "SELECT *FROM tbl_details WHERE new_id ='$this_id' ";
                // $result_movies = mysqli_query($conn, $sql_movies);

                // if (mysqli_num_rows($result_movies) > 0) {
                //     while ($movies = mysqli_fetch_assoc($result_movies)) {
                //       echo "<img src='" . $movies["intro_img"] . "' alt='' class='custom-video'>";
                //     }}
      ?>

        <!-- binh luan -->
        <div style="display: flex;padding: 0;" class="container">
          <div class="likes">
            <svg style="margin-right: 2px;margin-bottom: 4px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
              <path
                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
            </svg>
            Thích
          </div>
          <div class="likes"><svg style="margin-right: 2px; margin-bottom: 4px;" xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
              <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
            </svg>Rình</div>
          <div class="likes">Tăt QC</div>

        </div>
        <div style="padding: 0;" class="container">
        <?php
                require("connect.php");
                
                $this_id = $_GET['id'];

                $sql_movies = "SELECT *FROM tbl_details WHERE new_id ='$this_id' ";
                $result_movies = mysqli_query($conn, $sql_movies);

                if (mysqli_num_rows($result_movies) > 0) {
                    while ($movies = mysqli_fetch_assoc($result_movies)) {
                      echo"<div style='color: #AEBBAE;;margin-top: 10px;font-size: 30px;' class='col'> "  . $movies['cate_name'] . "</div>";
                      echo"<div style='color: #AEBBAE;' >Lượt xem: ". $movies['cate_views'] . "</div>";
                      echo"<div style='color: #AEBBAE;'>Thông tin</div>";
                    }}
                    ?>

        </div>
        <div class="bolder"></div>
        <div style="padding: 0;color: #AEBBAE;overflow-wrap: break-word; margin-top: 10px;" class="container">

        <?php
                require("connect.php");
                
                $this_id = $_GET['id'];

                $sql_movies = "SELECT *FROM tbl_details WHERE new_id ='$this_id' ";
                $result_movies = mysqli_query($conn, $sql_movies);

                if (mysqli_num_rows($result_movies) > 0) {
                    while ($movies = mysqli_fetch_assoc($result_movies)) {
                       
                      echo "<div class='below-title'>Quốc gia: ";
                      echo "<a style='color: rgb(83, 135, 181); text-decoration: none;' href='' target='_blank'>" . $movies['cate_nation'] . "</a>";
                      echo "</div>";
                      
                      echo"<div class ='below-title' >Năm phát hành: ". $movies['cate_year'] . "</div>";
                      echo"<div class ='below-title' >Chất lượng: FHD </div>";
                      echo"<div class ='below-title' >Âm thanh: Vietsub </div>";
                      echo"<div class ='below-title' >Thời lượng: ". $movies['cate_eps'] . "</div>";
                     
                      echo"<div class ='below-title' >Thể loại: ";
                    
         
                      echo "<a style='color: rgb(83, 135, 181); text-decoration: none;' href='' target='_blank'>" . $movies['cate_genre'] . "</a>&nbsp;";
                      echo"</div>";
                  
          
                      echo"<div style='width: 600px;' class='film-info-title'>";
                      echo "<p>" . $movies['cate_content'] . "</p>";

                      echo"</div>";
                   

                   echo "<div style='margin-top: 10px;'>";
                   echo"   <span>". $movies['cate_name'] ."</span>";
                    
  
                   echo "   <span>Phim1080</span>";

                   echo"   <span>FimFast</span>";
                   echo" </div>";
                  
                   
            }}
            ?>

          
        </div>
        
      </div>

      <!-- Bên phải (cột khác) -->
      <div class="col-lg-4">
        <?php
                  require("connect.php");
               
                  
                  $sql = "";
                  
                  $category_id = 1;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  7 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo"<div class = 'film-right'>";
                        
                          
                          echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                          echo"<img class ='anh-right' src= '". $movies['intro_img'] ."' alt=''>";
                       
                          echo"</a>";
                          echo"<div class = 'right-title'>";
                          
                          echo "<div class='heading'>". $movies['cate_name'] . "</div>";
                          

                          echo"<div class='right-info'>";
                         
                          echo"<div class = 'eps'>" .$movies['cate_eps']. "</div>";
                          echo"<div class = 'views'>". $movies['cate_views']. "</div>";
                          echo"</div>";
                          echo"</div>";
                          echo"</div>";

                      }
                    }
  
              
                    mysqli_close($conn);
                ?>
          
        



      </div>
    </div>
  </div>



  <!-- duoi cung -->
  <div style="width: 1000px;margin-top: 40px;padding: 0;" class="container">

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
    </div>



    <!-- anh phim -->
    <div style="margin-top: 10px; " class="film-body-container-f">
    <?php
                  require("connect.php");

              
                  $sql = "";
                  
                  $category_id = 4;
                  $sql_movie = "SELECT * FROM tbl_details WHERE cate_id = $category_id ORDER BY new_id DESC LIMIT  10 ";
                  $result_movies = mysqli_query($conn, $sql_movie);

                  if (mysqli_num_rows($result_movies) > 0) {
                      while ($movies = mysqli_fetch_assoc($result_movies)) {
                          echo"<div class = 'box-b'>";
                          echo"<div class='film-f'>";
                          echo "<a href='home_link.php?task=update&id=".$movies["new_id"]."'>";
                          

                          echo"<img class='anh-film-a' src= '". $movies['intro_img'] ."' alt=''>";
                          echo"</a>";
                          echo"</div>";
                          
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
  
                  
                    mysqli_close($conn);
                ?>

    </div>


  </div>

</body>

</html>