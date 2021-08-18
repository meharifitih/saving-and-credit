<?php 
session_start();
include('security.php');

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $type = $_POST['type'];
   
    if ($password === $cpassword) {


        $query = "INSERT INTO user (username,email,password,type) VALUES('$username','$email','$password', '$type')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "User Added";
            header('location:manage_users.php');
        } else {
            $_SESSION['status'] = "User Not Added";
            header('location:manage_users.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:manage_users.php');
    }
}

if (isset($_POST['loan_registerbtn'])) {
    $months = $_POST['months'];
    $interest = $_POST['interest'];
    $penality = $_POST['penality'];
    // $cpassword = $_POST['confirmpassword'];
   
    if (true) {


        $query = "INSERT INTO loan_plan (months,interset,penality) VALUES('$months','$interest','$penality')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Loan type Added";
            header('location:loan_plan.php');
        } else {
            $_SESSION['status'] = "Loan Type Not Added";
            header('location:loan_plan.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:loan_plan.php');
    }
}




if (isset($_POST['add_saving'])) {

    // $email = $_SESSION['username'];
    $user = $_POST['user'];
    $query = "SELECT email  FROM user WHERE username='$user' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) {
        $memberid = $row['email'];
    }
    $amount = $_POST['amount'];
    $userid = $row['id'];
    $interest = $amount * 0.07;
    $total_depo = $amount ;
 
    if (true) {


        $query = "INSERT INTO deposit (membe_name,interest,savingamount,totaldeposite,memberid) VALUES('$user','$interest','$amount','$total_depo', '$memberid')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Saving Added";
            header('location:deposit.php');
        } else {
            $_SESSION['status'] = "Saving Not Added";
            header('location:deposit.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:deposit.php');
    }
}



if (isset($_POST['application'])) {
    $name = $_POST['user'];
    $loan_type = $_POST['loan_type'];
    $payment_mode = $_POST['payment_mode'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $purpose = $_POST['purpose'];
    $interest = $amount*0.08;
    $status = $_POST['request'];
 
   
    if (true) {


        $query = "INSERT INTO loan_list (username,loan_type_id,mode_of_payment,loan_amount,duration,purpose,interest,status) VALUES('$name','$loan_type','$payment_mode', '$amount', '$duration', '$purpose', '$interest','$status')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Loan  Application Sent";
            header('location:request_loan.php');
        } else {
            $_SESSION['status'] = "Loan Not Sent";
            header('location:request_loan.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:request_loan.php');
    }
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
}

if (isset($_POST['loan_edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM loan_type WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];


    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:register.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:register.php');
    }
}

if (isset($_POST['user_updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $type = $_POST['edit_type'];


    $query = "UPDATE user SET username='$username', email='$email', password='$password', type='$type' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:user_home.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:user_home.php');
    }
}

if (isset($_POST['loan_updatebtn'])) {
    $id = $_POST['edit_id'];
    $months = $_POST['edit_months'];
    $interest = $_POST['edit_interest'];
    $penality = $_POST['edit_penality'];


    $query = "UPDATE loan_plan SET months='$months', interset='$interest', penality='$penality' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:loan_plan.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:loan_plan.php');
    }
}

if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is DELETED";
        header('location:register.php');
    } else {
        $_SESSION['status'] = "Your Data is  Not DELETED";
        header('location:register.php');
    }
}

if (isset($_POST['loan_deletebtn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM loan_plan WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is DELETED";
        header('location:loan_plan.php');
    } else {
        $_SESSION['status'] = "Your Data is  Not DELETED";
        header('location:loan_plan.php');
    }
}



if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM user WHERE  email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connction, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if ($usertypes['type'] == "admin") {
        $_SESSION['username'] = $email_login;
        header('location: index.php');
    } elseif ($usertypes['type'] == "user") {
        $_SESSION['username'] = $email_login;
        header('location: user_home.php');
    } else {
        $_SESSION['status'] = 'Email id / Password is Invalid';
        header('location: login.php');
    }
}


if (isset($_POST['logout_btn'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('Location:login.php');
    }




?>