<?php

function check_db_query_staus($db_state, $db_actions)
{
    include "config/index.php";
    $query_User_re = sprintf($db_state);
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    $row_User_re = mysqli_fetch_assoc($User_re);
    $totalRows_User_re = mysqli_num_rows($User_re);
    switch ($db_actions) {
        case 'DEL':
            if ($User_re) {
                $returnResponse = ['status' => 1, 'message' => "Deleted successfully"];
                return ($returnResponse);
            } else {
                $returnResponse = ['status' => 0, 'message' => "try again"];
                return ($returnResponse);
            }
            break;
        case 'UPD':
            if ($User_re) {
                $returnResponse = ['status' => 1, 'message' => "Updated successfully"];
                return ($returnResponse);
            } else {
                $returnResponse = ['status' => 0, 'message' => "try again"];
                return ($returnResponse);
            }
            break;
        case 'CHK':
            if ($User_re) {
                if ($totalRows_User_re > 0) {
                    $arr = ['status' => 1, 'message' => $row_User_re];
                    return ($arr);
                } else {
                    $returnResponse = ['status' => 0, 'message' => "try again"];
                    return ($returnResponse);
                }
            } else {
                $returnResponse = ['status' => 0, 'message' => "try again"];
                return ($returnResponse);
            }
            break;

        default:
            break;
    }
}
function login($username, $password)
{
    include "config/index.php";
    $query_User_re = sprintf("SELECT * FROM endUsers WHERE email='{$username}'");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    $row_User_re = mysqli_fetch_assoc($User_re);
    $totalRows_User_re = mysqli_num_rows($User_re);
    if ($totalRows_User_re > 0) {
        if ($row_User_re['password'] == $password) {
            $arr = ['status' => 1, 'message' => 'Buzzing you in 😎', 'email' => $row_User_re['email'], 'fullname' => $row_User_re['first_name']];
            exit(json_encode($arr));
        }
    } else {
    }
}

function createUser()
{
    include "config/index.php";
    include "config/enctp.php";
    $email = $_GET['email'];
    $password = $_GET['password'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $verification = encripted_data($email . "£" . "30" . "_");
    $query_User_re = sprintf("INSERT INTO `endUsers`(`first_name`, `last_name`, `email`, `password`,`verification_status`) 
                    VALUES ('$firstname', '$lastname', '$email', '$password','$verification')");
    $check_exist = check_db_query_staus("SELECT email FROM endUsers WHERE email='{$email}'", "CHK");

    if ($check_exist['status'] == 1) {
        $returnResponse = ['status' => 2, 'message' => "{$email} exists already"];
        exit(json_encode($returnResponse));
    } else {
        $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $message = "
        Thank you for signing up for our service! In order to complete your registration, please click on the following link to verify your account:\n
           \n
            https://alleybookings/user/verification/?" . $verification . "
            \n   \n         
            This link is only valid for 3 day, so please make sure to click on it as soon as possible.
            \n \n
            Thank you,\n
            Ibrahim Ismail
            \n\n
            I hope this helps! Let me know if you have any questions or need further assistance.
        \n
        ";
        // More headers
        $headers .= 'From: <hello@alleybookings.com>' . "\r\n";
        $headers .= 'Cc: marketing@alleybookings.com' . "\r\n";
        mail($email, "ALLEYBOOKINGS VERIFICATION", $message, $headers);
        if ($User_re) {
            $returnResponse = ['status' => 1, 'message' => "{$email} added successfully"];
            exit(json_encode($returnResponse));
        } else {
            $returnResponse = ['status' => 0, 'message' => "{$email} not created, try again"];
            exit(json_encode($returnResponse));
        }
    }
}

function createListerUser($email, $firstname, $lastname, $phone)
{
    include "config/index.php";
    include "config/enctp.php";
    $verification = encripted_data($email . "££" . "30" . "_");
    $query_User_re = sprintf("INSERT INTO `hotelListerUsers`(`first_name`, `last_name`, `email`, `phone_number`) 
                        VALUES ('$firstname','$lastname','$email','$phone')");
    $check_exist = check_db_query_staus("SELECT email FROM hotelListerUsers WHERE email='{$email}'", "CHK");

    if ($check_exist['status'] == 1) {
        $returnResponse = ['status' => 2, 'message' => "{$email} exists already"];
        exit(json_encode($returnResponse));
    } else {
        $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $message = "
        Thank you for signing up for our service! In order to complete your registration, please click on the following link to verify your account:\n
           \n
            https://alleybookings/user/verification/?" . $verification . "
            \n   \n         
            This link is only valid for 3 day, so please make sure to click on it as soon as possible.
            \n \n
            Thank you,\n
            Ibrahim Ismail
            \n\n
            I hope this helps! Let me know if you have any questions or need further assistance.
        \n
        ";
        // More headers
        $headers .= 'From: <hello@alleybookings.com>' . "\r\n";
        $headers .= 'Cc: marketing@alleybookings.com' . "\r\n";
        mail($email, "ALLEYBOOKINGS VERIFICATION", $message, $headers);
        if ($User_re) {
            $returnResponse = ['status' => 1, 'message' => "{$email} added successfully"];
            exit(json_encode($returnResponse));
        } else {
            $returnResponse = ['status' => 0, 'message' => "{$email} not created, try again"];
            exit(json_encode($returnResponse));
        }
    }
}

function hotelListerPropertiesLocation($property_location, $property_country, $property_street_address, $property_unit_number, $property_city, $zip_code, $hotelListerProperties_id)
{
    include "config/index.php";
    include "config/enctp.php";
    $query_User_re = sprintf("INSERT INTO `hotelListerPropertiesLocation`(`property_location`, `property_country`, `property_street_address`, `property_unit_number`, `property_city`, `zip_code`, `hotelListerProperties_id`,)
                     VALUES ('$property_location', '$property_country', '$property_street_address', '$property_unit_number', '$property_city', '$zip_code', '$hotelListerProperties_id)");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $returnResponse = ['status' => 1];
        exit(json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        exit(json_encode($returnResponse));
    }
}
function hotelListerUserCall001($data)
{
    if (count($data->hotelListerUsers) == 4) {
        if (filter_var($data->hotelListerUsers[2], FILTER_VALIDATE_EMAIL)) {
            createListerUser($data->hotelListerUsers[2], $data->hotelListerUsers[0], $data->hotelListerUsers[1], $data->hotelListerUsers[3]);
        } else {
            $emailRespError = ["Error" => "Invalid Email"];
            exit(json_encode($emailRespError));
        }
    } else {
        $objectLengthRespError = ["Error" => "Invalid object('hotelListerUsers') length"];
        exit(json_encode($objectLengthRespError));
    }
}
