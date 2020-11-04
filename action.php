<?php
session_start();

include_once './connection.php';

if (isset($_POST['btnAddClient'])) {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO tbl_client(
        user_fullname,
        age,
        gender,
        address,
        birthdate
        ) VALUES (
        '$fullname',
        '$age',
        '$gender',
        '$address',
        '$birthdate'
        )";

        if (mysqli_query($conn, $sql)) {
            $id = $_GET['id'];
            // $_SESSION['message'] = 'Add School Successfully!';
            $url = "./home.php?id=$id";
            $url = str_replace(PHP_EOL, '', $url);
            header("Location: $url");
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
}

if (isset($_POST['btnEditClient'])) {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $id = $_GET['client_id'];

        $sql = "UPDATE tbl_client SET 
        fullname='$fullname', 
        age='$age', 
        gender='$gender', 
        address='$address', 
        birthdate='$birthdate'
        WHERE 
        id='$id'";
    

    if ($conn->query($sql) === TRUE) {
        // $_SESSION['myessage'] = 'Student Update Successfully!';
        $url = "./home.php?id=$id";
        $url = str_replace(PHP_EOL, '', $url);
        header("Location: $url");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}

if (isset($_GET['deleteclient'])) {
    $id = $_GET['client_id'];

    if($_GET['delete']=='true'){
        $sql = "DELETE FROM tbl_client WHERE id=$id";
    

        if ($conn->query($sql) === TRUE) {
            // $_SESSION['message'] = 'Student Update Successfully!';
            $url = "./home.php?id=$id";
            $url = str_replace(PHP_EOL, '', $url);
            header("Location: $url");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
}

if (isset($_POST['btnAddAvailment'])) {
    $admission_date = $_POST['admissiondate'];
    $amount = $_POST['amount'];
    $requirements = $_POST['requirements'];
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $firstavailment = $_POST['firstavailment'];
    $dateofavailment = $_POST['dateofavailment'];
    $status = $_POST['status'];
    $user_fullname = $_POST['user_fullname'];
    $client_id = $_POST['client_id'];

    $sql = "INSERT INTO listofavailment(
        client_id,
        admissiondate,
        amount,
        requirements,
        purpose,
        remarks,
        firstavailment,
        dateofavailment,
        status,
        user
        ) VALUES (
        '$client_id',
        '$admission_date',
        '$amount',
        '$requirements',
        '$purpose',
        '$remarks',
        '$firstavailment',
        '$dateofavailment',
        '$status',
        '$user_fullname'
        )";

        if (mysqli_query($conn, $sql)) {
            $id = $_GET['id'];
            $url = "./home.php?id=$id";
            $url = str_replace(PHP_EOL, '', $url);
            header("Location: $url");
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();

}

if (isset($_GET['deleteavailment'])) {
    $avail_id = $_GET['avail_id'];

    if($_GET['deleteavailment']=='true'){
        $sql = "DELETE FROM listofavailment WHERE id=$avail_id";
    
        if ($conn->query($sql) === TRUE) {
            // $_SESSION['message'] = 'Student Update Successfully!';
            $url = "./home.php?id=$id";
            $url = str_replace(PHP_EOL, '', $url);
            header("Location: $url");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
}