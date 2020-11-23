<?php
session_start();

include_once './connection.php';

if (isset($_POST['btnAddClient'])) {
    $fullname = $_POST['fullname'];
    $beneficiary_name = $_POST['fullname_client'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $requirements = $_POST['requirements'];
    $accountable = $_POST['accountable'];
    $sql = "INSERT INTO tbl_client(
        fullname,
        fullname_client,
        age,
        gender,
        address,
        birthdate,
        requirements,
        accountable
        ) VALUES (
        '$fullname',
        '$beneficiary_name',
        '$age',
        '$gender',
        '$address',
        '$birthdate',
        '$requirements',
        '$accountable'
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
    $beneficiary_name = $_POST['fullname_client'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $patient_status = $_POST['patient_status'];
    $requirements = $_POST['requirements'];
    $accountable = $_POST['accountable'];
    $id = $_GET['client_id'];

        $sql = "UPDATE tbl_client SET 
        fullname='$fullname', 
        patient_status='$patient_status', 
        fullname_client='$beneficiary_name', 
        age='$age', 
        gender='$gender', 
        address='$address', 
        birthdate='$birthdate',
        requirements = '$requirements',
        accountable = '$accountable'
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
    // $requirements = $_POST['requirements'];
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $firstavailment = $_POST['firstavailment'];
    $dateofavailment = $_POST['dateofavailment'];
    $status = $_POST['status'];
    $user_fullname = $_POST['user_fullname'];
    $client_id = $_POST['client_id'];
    $id = $_GET['id'];

    $sql = "INSERT INTO listofavailment(
        client_id,
        admissiondate,
        amount,
        -- requirements,
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
        -- '$requirements',
        '$purpose',
        '$remarks',
        '$firstavailment',
        '$dateofavailment',
        '$status',
        '$user_fullname'
        )";

        if (mysqli_query($conn, $sql)) {
            updateBalance($conn, $id);
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();

}

if (isset($_GET['deleteavailment'])) {
    $avail_id = $_GET['avail_id'];
    $id = $_GET['id'];

    if($_GET['deleteavailment']=='true'){
        $sql = "DELETE FROM listofavailment WHERE id=$avail_id";
    
        if ($conn->query($sql) === TRUE) {
            updateBalance($conn, $id);
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
}

if (isset($_POST['btnEditAvailment'])) {
    $admission_date = $_POST['admissiondate'];
    $amount = $_POST['amount'];
    // $requirements = $_POST['requirements'];
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $firstavailment = $_POST['firstavailment'];
    $dateofavailment = $_POST['dateofavailment'];
    $status = $_POST['status'];
    $user_fullname = $_POST['user_fullname'];
    $avail_id = $_GET['avail_id'];
    $id = $_GET['id'];


        $sql = "UPDATE listofavailment SET 
        admissiondate='$admission_date', 
        amount='$amount', 
        -- requirements='$requirements', 
        purpose='$purpose', 
        remarks='$remarks',
        firstavailment='$firstavailment', 
        dateofavailment='$dateofavailment', 
        status='$status', 
        user='$user_fullname'
        WHERE 
        id='$avail_id'";
    

    if ($conn->query($sql) === TRUE) {
        updateBalance($conn, $id);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}

if (isset($_POST['btnAddBudget'])) {
    $amount = $_POST['amount'];
    $date = $_POST['budget_date'];
    $id = $_GET['id'];

    $sql = "INSERT INTO budget_history(
        amount,
        date
        ) VALUES (
        '$amount',
        '$date'
        )";
        if (mysqli_query($conn, $sql)) {
            updateBalance($conn, $id);
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();

}

if (isset($_POST['btnEditBudget'])) {
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $client_id = $_GET['id'];
    $budget_id = $_GET['budget_id'];


        $sql = "UPDATE budget_history SET 
        amount='$amount', 
        date='$date'
        WHERE 
        id='$budget_id'";
    
    if ($conn->query($sql) === TRUE) {
        updateBalance($conn, $id);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}

function updateBalance($conn, $id){
    $sql2 = "SELECT balance FROM remaining_balance";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $balance = $row['balance'];
        }
    }

    $sql3 = "UPDATE budget SET 
    amount='$balance'
    WHERE 
    id='1'";
    if ($conn->query($sql3) === TRUE) {
        $url = "./home.php?id=$id";
        $url = str_replace(PHP_EOL, '', $url);
        header("Location: $url");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}