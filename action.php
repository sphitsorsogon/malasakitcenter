<?php
session_start();

include_once './connection.php';

date_default_timezone_set("Asia/Manila");

$currdate = date('m-d-Y h:ia');

if (isset($_POST['btnAddClient'])) {
    $fullname_f = strtoupper($fullname = $_POST['fullname']);
    $beneficiary_name_f = strtoupper($beneficiary_name = $_POST['fullname_client']);
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
        '$fullname_f',
        '$beneficiary_name_f',
        '$age',
        '$gender',
        '$address',
        '$birthdate',
        '$requirements',
        '$accountable'
        )";

        if (mysqli_query($conn, $sql)) {
           //for logs
           $sql2 = "INSERT INTO logs(date,action,user)VALUES('$currdate','Add new Patient $fullname_f with Client $beneficiary_name_f','$accountable')";

           if(mysqli_query($conn, $sql2)){
               $id = $_GET['id'];
               $url = "./home.php?id=$id";
               $url = str_replace(PHP_EOL, '', $url);
               header("Location: $url");
           }
           //for logs
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
        requirements = '$requirements'
        WHERE 
        id='$id'";
    

    //for logs
    $fetch_previous_data = "SELECT * FROM tbl_client where id = '$id'";
    $res = mysqli_query($conn, $fetch_previous_data);
    $previous_data = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $string_data = "Change data of Patient with ID $id ";
    $str = "";

    if ($conn->query($sql) === TRUE) {
        //fullname
        if(strcmp($fullname, $previous_data['fullname']) !== 0){
            $str = $str . "from Patient Name " . $previous_data['fullname'] . " to " . $fullname . ", ";
        }
        //fullname_client
        if(strcmp($beneficiary_name, $previous_data['fullname_client']) !== 0){
            $str = $str . "from Client Name " . $previous_data['fullname_client'] . " to " . $beneficiary_name . ", ";
        }
        //age
        if(strcmp($age, $previous_data['age']) !== 0){
            $str = $str . "from Age " . $previous_data['age'] . " to " . $age . ", ";
        }
        //gender
        if(strcmp($gender, $previous_data['gender']) !== 0){
            $str = $str . "from Gender " . $previous_data['gender'] . " to " . $gender . ", ";
        }
        //address
        if(strcmp($address, $previous_data['address']) !== 0){
            $str = $str . "from Address " . $previous_data['address'] . " to " . $address . ", ";
        }
        //birthdate
        if(strcmp($birthdate, $previous_data['birthdate']) !== 0){
            $str = $str . "from Birth Date " . $previous_data['birthdate'] . " to " . $birthdate . ", ";
        }
        //requirements
        if(strcmp($requirements, $previous_data['requirements']) !== 0){
            $str = $str . "from Requirements " . $previous_data['requirements'] . " to " . $requirements . ", ";
        }
        //patient_status
        if(strcmp($patient_status, $previous_data['patient_status']) !== 0){
            $str = $str . "from Patient Status " . $previous_data['patient_status'] . " to " . $patient_status . ", ";
        }

        $sql2 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','$string_data$str','$accountable')";

        if(mysqli_query($conn, $sql2)){
            $url = "./home.php?id=$id";
            $url = str_replace(PHP_EOL, '', $url);
            header("Location: $url");
        }
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
    //for logs
    
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
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $firstavailment = $_POST['firstavailment'];
    $dateofavailment = $_POST['dateofavailment'];
    // $status = $_POST['status'];
    $user_fullname = $_POST['user_fullname'];
    $client_id = $_POST['client_id'];
    $client_name = $_POST['client_name'];
    $id = $_GET['id'];

    $sql = "INSERT INTO listofavailment(
        client_id,
        admissiondate,
        amount,
        purpose,
        remarks,
        firstavailment,
        dateofavailment,
        -- status,
        user
        ) VALUES (
        '$client_id',
        '$admission_date',
        '$amount',
        '$purpose',
        '$remarks',
        '$firstavailment',
        '$dateofavailment',
        -- '$status',
        '$user_fullname'
        )";

        if (mysqli_query($conn, $sql)) {
            $sql3 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','Update Admission Date of Patient with ID $id to $admission_date','$user_fullname')";
            mysqli_query($conn, $sql3);

                $sql = "UPDATE tbl_client SET 
                client_admission='$admission_date'
                WHERE 
                id='$client_id'";
            if ($conn->query($sql) === TRUE) {
                 //for logs
                 $sql2 = "INSERT INTO logs(date,action,user)VALUES('$currdate','Add new Availment for patient $client_name with ID $client_id amounting to $amount','$user_fullname')";
                 if(mysqli_query($conn, $sql2)){
                     updateBalance($conn, $id);
                 }
                 //for logs
            } else {
                echo "Error updating record: " . $conn->error;
            }
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
    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $firstavailment = $_POST['firstavailment'];
    $dateofavailment = $_POST['dateofavailment'];
    // $status = $_POST['status'];
    $user_fullname = $_POST['user_fullname'];
    $avail_id = $_GET['avail_id'];
    $id = $_GET['id'];


        $sql = "UPDATE listofavailment SET 
        admissiondate='$admission_date', 
        amount='$amount', 
        purpose='$purpose', 
        remarks='$remarks',
        firstavailment='$firstavailment', 
        dateofavailment='$dateofavailment', 
        -- status='$status', 
        user='$user_fullname'
        WHERE 
        id='$avail_id'";
    

    //for logs
        $fetch_previous_data = "SELECT * FROM listofavailment where id = '$avail_id'";
        $res = mysqli_query($conn, $fetch_previous_data);
        $previous_data = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $string_data = "Change data of Availment with ID $avail_id ";
        $str = "";

    if ($conn->query($sql) === TRUE) {
        //admission_date
        if(strcmp(strval($admission_date), $previous_data['admissiondate']) !== 0){
            $str = $str . "from Admission Date " . $previous_data['admissiondate'] . " to " . strval($admission_date) . ", ";
        }
        //amount
        if(strcmp($amount, $previous_data['amount']) !== 0){
            $str = $str . "from Amount " . $previous_data['amount'] . " to " . $amount . ", ";
        }
        //purpose
        if(strcmp($purpose, $previous_data['purpose']) !== 0){
            $str = $str . "from Purpose " . $previous_data['purpose'] . " to " . $purpose . ", ";
        }
        //remarks
        if(strcmp($remarks, $previous_data['remarks']) !== 0){
            $str = $str . "from Remarks " . $previous_data['remarks'] . " to " . $remarks . ", ";
        }
        //firstavailment
        if(strcmp($firstavailment, $previous_data['firstavailment']) !== 0){
            $str = $str . "from First Availment " . $previous_data['firstavailment'] . " to " . $firstavailment . ", ";
        }
        //dateofavailment
        if(strcmp(strval($dateofavailment), $previous_data['dateofavailment']) !== 0){
            $str = $str . "from Date of Availment " . $previous_data['dateofavailment'] . " to " . strval($dateofavailment) . ", ";
        }
        //status
        // if(strcmp($status, $previous_data['status']) !== 0){
        //     $str = $str . "from Status " . $previous_data['status'] . " to " . $status . ", ";
        // }

        $sql2 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','$string_data$str','$user_fullname')";
        
        if(mysqli_query($conn, $sql2)){
            $sql = "UPDATE tbl_client SET 
            client_admission='$admission_date'
            WHERE 
            id='$id'";
            $sql3 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','Update Admission Date of Patient with ID $id to $admission_date','$user_fullname')";
            if ($conn->query($sql) === TRUE) {
                if(mysqli_query($conn, $sql3)){
                    updateBalance($conn, $id);
                }
                
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
    //for logs
    
}

if (isset($_POST['btnAddBudget'])) {
    $accountable = $_POST['accountable'];
    $amount = $_POST['amount'];
    $date = $_POST['budget_date'];
    $id = $_GET['id'];

    $sql = "INSERT INTO budget_history(
        accountable,
        amount,
        date
        ) VALUES (
        '$accountable',
        '$amount',
        '$date'
        )";
        if (mysqli_query($conn, $sql)) {
            //for logs
            $sql2 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','Add Budget amounting to $amount','$accountable')";

            if(mysqli_query($conn, $sql2)){
                updateBalance($conn, $id);
            }
            //for logs
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();

}

if (isset($_POST['btnEditBudget'])) {
    $accountable = $_POST['accountable'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $client_id = $_GET['id'];
    $budget_id = $_GET['budget_id'];

        $sql = "UPDATE budget_history SET 
        accountable='$accountable', 
        amount='$amount', 
        date='$date'
        WHERE 
        id='$budget_id'";
    
    //for logs
    $fetch_previous_data = "SELECT amount FROM budget_history where id = '$budget_id'";
    $res = mysqli_query($conn, $fetch_previous_data);
    $previous_amount = mysqli_fetch_array($res, MYSQLI_NUM);

    if ($conn->query($sql) === TRUE) {
        $sql2 = "INSERT INTO logs(date,action,user) VALUES ('$currdate','Change Budget Amount with ID $budget_id from $previous_amount[0] to $amount','$accountable')";

        if(mysqli_query($conn, $sql2)){
            updateBalance($conn, $client_id);
        }
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
    //for logs
    
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