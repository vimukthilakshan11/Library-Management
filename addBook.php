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

  <title>Add A New Book</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

$bookName ="";
$author = "";
$price = "";
$edition = "";
$date = "";
$note = "";
$status = "";
$publisher = "";
$bookNumber = "";
$code = "";

if(isset($_POST['addBookBTN'])){
   $bookName = $_POST['bookName'];
   $author = $_POST['author'];
   $price = $_POST['price'];
   $edition = $_POST['edition'];
   $date = $_POST['date'];
   $note = $_POST['note'];
   $publisher = $_POST['publisher'];
   $bookNumber = $_POST['bookNumber'];
   $code = $_POST['bookCode'];


   $status = $_POST['gridRadios'];



   if($bookName == null || $author ==null){
    echo "<script type='text/javascript'>
  
    window.alert('Nothing to add')
  
    </script>";
  }else{


   $db = new dbconnect();

   $query1 = "SELECT `bookName`, `author` FROM `book` WHERE `bookName` = '".$bookName."' AND `author` = '".$author."' AND `status` = '1'";
   $result1 = $db->getfromdb($query1);
   $resultCheck1 = mysqli_num_rows($result1);
 
 
 
   if ($resultCheck1 > 0) {
     echo "<script type='text/javascript'>
 
     window.alert('The Book is already exist')
   
     </script>";
 }else{

  $db = new dbconnect();
$query = "INSERT INTO `book` (`bookName`,`bookNumber`, `author`, `price`, `edition`, `date`, `publisher`, `note`, `activeStatus`,`code`) VALUES('".$bookName."', '".$bookNumber."', '".$author."', '".$price."', '".$edition."', '".$date."', '".$publisher."', '".$note."', '".$status."', '".$code."')";
$db->insertIntoDb($query);
  echo "<script type='text/javascript'>

  window.alert('New record created successfully')

  </script>";

 }









}
} 



?>

    <!-- Header -->
    <?php include 'header/header.html';?>
    <!-- Side bar -->
    <?php include 'sidebar/sidebar.html';   ?>

  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add A New Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Book</li>
          <li class="breadcrumb-item active">Add Book</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enter The Book Details</h5>

              <!-- General Form Elements -->
              <form method = "POST" action="addBook.php">
              <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">Book Number</label>
                  <div class="col-sm-10">
                    <input type="text" Name = "bookNumber" class="form-control" placeholder="Book Number">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" Name = "bookName" class="form-control" placeholder="Name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">Code</label>
                  <div class="col-sm-10">
                    <input type="text" Name = "bookCode" class="form-control" placeholder="Code">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Author</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" Name = "author" placeholder="Author">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" Name = "price" placeholder="Price">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Edition</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" Name = "edition" placeholder="Edition">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Publisher</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" Name = "publisher" placeholder="Publisher">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Year</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" Name = "date" placeholder="Year">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" Name = "note"></textarea >
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="active" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="pending">
                      <label class="form-check-label" for="gridRadios2">
                        Pending
                      </label>
                    </div>

                  </div>
                </fieldset>




              <div class="d-grid gap-2 mt-3">
                 
                <button class="btn btn-primary" type="submit" name= "addBookBTN">Add Book</button>
              </div>


              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


    </section>

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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