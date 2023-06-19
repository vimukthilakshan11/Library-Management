<?php
require_once('database/dbConnect.php');

if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['username'])){

  echo "<script> window.location.href='login.html';</script>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delete Book</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Header -->
  <?php include 'header/header.html';?>
  <!-- Side bar -->
  <?php include 'sidebar/sidebar.html';   ?>


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>





<?php


if(isset($_POST['deleteBtn'])){
  $btnValue = $_POST['deleteBtn'];
?>
<script>

if (confirm("Are you sure !!!!")) { 
  window.location.href='delete.php?id=<?php echo $btnValue?>';
   
} else {  
  
}  




</script>


<?php
   
      
}




?>




  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Delete Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Delete</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-15">
          <div class="row">



            
          

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                </div>

                <div class="card-body">
                  <h5 class="card-title">All Books </h5>
<form action="#" method="POST">
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Book Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Price (Rs.)</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                     

                    <?php

$db = new dbConnect();


    $query = "SELECT `id`, `bookName`, `author`, `price`, `edition`, `date`, `note`, `activeStatus` FROM `book` WHERE status = '1'";
    $result = $db->getfromdb($query);
    $resultCheck = mysqli_num_rows($result);
    $status ; 

    if ($resultCheck > 0) {

      while ($row = mysqli_fetch_assoc($result)) {



        $id = $row['id'];
        $bookName = $row['bookName'];
        $author = $row['author'];
        $price = $row['price'];
        $activeStatus = $row['activeStatus'];

        if($activeStatus == 'active'){
          $status = '<span class="badge bg-success">Active</span>';
        }else if($activeStatus == 'pending'){
          $status = '<span class="badge bg-warning">Pending</span>';
        }else if($activeStatus == 'unavailable'){
          $status = '<span class="badge bg-danger">unavailable</span>';
        }
        
        echo '<tr>';
        echo '<th scope="row"><a href="#">'.$id.'</a></th>';
        echo '<td>'.$bookName.'</td>';
        echo '<td><a href="#" class="text-primary">'.$author.'</a></td>';
        echo '<td>'.$price.'</td>';
        echo '<td>'.$status.'</td>';
        echo '<td><button class="button" type="submit" value='.$id.' name = "deleteBtn"><span>Delete </span></button></td>';
        echo '</tr>';


      }}


?>
                     

                    </tbody>
                  </table>
    </Form>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

         

         

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 5px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
  <!-- Vendor JS Files -->
  
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- footer -->
  <?php include 'footer/footer.html';   ?>
</body>

</html>