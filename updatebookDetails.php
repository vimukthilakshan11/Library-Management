<?php
require_once('database/dbConnect.php');
if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['username'])){

  echo "<script> window.location.href='pages/Login/login.html';</script>";
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
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

    <!-- Header -->
    <?php include 'header/header.html';?>
    <!-- Side bar -->
    <?php include 'sidebar/sidebar.html';   ?>


    <?php
$name = null;
$author = null;
$price = null;
$edition = null;
$date = null;
$note = null;
$activeStatus = null;
$bookId = null;
$status1 =null; 
$status2 =null; 
$status3 =null; 
$publisher = null;





if(isset($_POST['update'])){



  $bookId = $_POST['searchTxt'];
  $db = new dbconnect();
  $bookName = $_POST['bookName'];
  $author = $_POST['author'];
  $price = $_POST['price'];
  $edition = $_POST['edition'];
  $date = $_POST['date'];
  $note = $_POST['note'];
  $publisher = $_POST['publisher'];

  $status = $_POST['gridRadios'];

  $db = new dbconnect();
if(!$bookId == null){
  $query = "UPDATE `book` SET `bookName`='".$bookName."',`author`='".$author."',`price`='".$price."',`publisher`='".$publisher."',`edition`='".$edition."',`date`='".$date."',`note`='".$note."',`activeStatus`='".$status."' WHERE id='".$bookId."'";
    $db->insertIntoDb($query);

    echo "<script type='text/javascript'>

    window.alert('Update successfully')
  
    </script>";

    $bookId = null;

    $bookName = null;
    $author = null;
    $price = null;
    $edition = null;
    $date = null;
    $note = null;
    $publisher = null;
}else{    echo "<script type='text/javascript'>

  window.alert('Nothing To Update')

  </script>";}
  
}



if(isset($_POST['search'])){
  $db = new dbconnect();
  $bookId = $_POST['searchTxt'];
  $query = "SELECT `id`, `bookName`, `author`, `price`, `edition`, `date`, `note`, `activeStatus`, `publisher` FROM `book` WHERE id = '$bookId'";
  $result = $db->getfromdb($query);
  $resultCheck = mysqli_num_rows($result);



  if ($resultCheck > 0) {

    if ($row = mysqli_fetch_assoc($result)) {



      $name = $row['bookName'];
      $author = $row['author'];
      $price = $row['price'];
      $edition = $row['edition'];
      $date = $row['date'];
      $note = $row['note'];
      $activeStatus = $row['activeStatus'];
      $publisher = $row['publisher'];

        if($activeStatus == 'active'){
          $status1 = 'checked';
        }else if($activeStatus == 'pending'){
          $status2 = 'checked';
        }else if($activeStatus == 'unavailable'){
          $status3 = 'checked';
        }



    }}

}




?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Books</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Book</li>
          <li class="breadcrumb-item active">Update Books</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Details</h5>

              <!-- General Form Elements -->
              <form method = "POST" action = "updatebookDetails.php">
              <div class="input-group mb-3">
                      <input type="text" name = "searchTxt" class="form-control" placeholder="Search By Book Number" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php  echo $bookId ?>";>
                      <button type="submit" name="search" class="btn btn-warning">Search</button>
                    </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="bookName" class="form-control" placeholder="Book Name" value="<?php  echo $name; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" >Author</label>
                  <div class="col-sm-10">
                    <input type="text" name="author" class="form-control" placeholder="Author" value="<?php  echo $author; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label" >Price</label>
                  <div class="col-sm-10">
                    <input type="number"  name="price" class="form-control" placeholder="Price" value="<?php  echo $price; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Edition</label>
                  <div class="col-sm-10">
                    <input type="text" name="edition" class="form-control" placeholder="Edition" value="<?php  echo $edition; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Publisher</label>
                  <div class="col-sm-10">
                    <input type="text" name="publisher" class="form-control" placeholder="Publisher" value="<?php  echo $publisher; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label" >Year</label>
                  <div class="col-sm-10">
                    <input type="number" name="date"  class="form-control" value="<?php echo $date ?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="note" style="height: 100px" > <?php  echo $note; ?></textarea>
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="active" <?php echo $status1 ;  ?>>
                      <label class="form-check-label" for="gridRadios1">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="pending" <?php echo $status2 ;  ?>>
                      <label class="form-check-label" for="gridRadios2">
                        Pending
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="unavailable" <?php echo $status3 ;  ?>>
                      <label class="form-check-label" for="gridRadios3">
                        Unavailable
                      </label>
                    </div>

                  </div>
                </fieldset>




              <div class="d-grid gap-2 mt-3">

                <button type="submit" name="update" class="btn btn-primary">Update</button>
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