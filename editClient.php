<?php
//start session
session_start();

//database connection
include_once('connection.php');

if (isset($_SESSION['loggedin'])) {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./assets/css/bootstrap.min2.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="home.php?id=<?php echo $_GET['id'] ?>">SPH Malasakit Center</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
  <?php include 'sidebar.php';?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard - <?php echo $_SESSION['user_fullname'] ?></h1>
      </div>

    <?php
    $client_id=$_GET['client_id'];
       $sql = "SELECT * FROM tbl_client WHERE id = $client_id";
           $result = mysqli_query($conn, $sql);
           if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                   $id = $row['id'];
                   $fullname = $row['fullname'];
                   $age = $row['age'];
                   $gender = $row['gender'];
                   $address = $row['address'];
                   $birthdate = $row['birthdate'];
                   $requirements = $row['requirements'];
                   $patient_status = $row['patient_status'];
                   $fullname_client = $row['fullname_client'];
               }
           }
    ?>

            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <h1 class="h2">Edit Patient/Client</h1>
                </div>
                    <form action="action.php?id=<?php echo $_GET['id'] ?>&client_id=<?php echo $_GET['client_id'] ?>" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <input name="accountable" type="hidden" class="form-control" value="<?php echo $_SESSION['user_fullname'] ?>">
                                <div class="form-group">
                                    <input name="fullname" type="text" class="form-control" placeholder="Enter Fullname" value="<?php echo $fullname ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input name="fullname_client" type="text" class="form-control" placeholder="Enter Beneficiary Name" value="<?php echo $fullname_client ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <input name="age" type="text" class="form-control" placeholder="Enter age" value="<?php echo $age ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="form-control" name="gender" value="<?php echo $gender ?>">
                                        <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                        <option value=""></option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Enter Address" value="<?php echo $address ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input name="birthdate" type="date" class="form-control" placeholder="Enter Birthdate" value="<?php echo $birthdate ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="requirements" type="text" class="form-control" placeholder="Enter Requirements" value="<?php echo $requirements ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="form-control" name="patient_status" value="<?php echo $patient_status ?>">
                                        <option value="<?php echo $patient_status ?>"><?php echo $patient_status ?></option>
                                        <option value=""></option>
                                        <option value="Discharged">Discharged</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button name="btnEditClient" type="submit" class="btn btn-primary">Edit Client</button>
                    </form>
            </div>
    </main>
  </div>
</div>

        <script src="./assets/js/jquery-3.5.1.slim.min.js"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="./assets/js/feather.min.js"></script>
        <script src="./assets/js/Chart.min.js"></script>
        <script src="./assets/js/dashboard.js"></script>
    
        <script src="./assets/js/bootstrap.bundle.min.js"></script>

        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
                
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                } );
            } );
        </script>
    </body>
</html>
<?php
} else {
    $url = "./index.php";
    $url = str_replace(PHP_EOL, '', $url);
    header("Location: $url");
}
mysqli_close($conn);
?>