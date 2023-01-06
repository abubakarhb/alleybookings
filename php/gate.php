<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

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
        
        
  $mail = new PHPMailer(true);

  try {
      //Server settings
    //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'alleyys.com@gmail.com';                     //SMTP username
      $mail->Password   = 'yuceluhpldrxvyqh';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('alleyys.com@gmail.com', 'alleybookings');
      $mail->addAddress($email);     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
    
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Alleybookings Account Verification";
      $mail->Body    = "
      Thank you for signing up for our service! In order to complete your registration, please click on the following link to verify your account:\n
         <br/>
          https://alleybookings/user/verification/?" . $verification . "
          <br/>       
          This link is only valid for 3 day, so please make sure to click on it as soon as possible.
          <br/>
          Thank you,<br>
          Alleybookings
          <br/>
          <br/>
          I hope this helps! Let me know if you have any questions or need further assistance.
      \n
      ";
      
      if ($User_re) {
        $returnResponse = ['status' => 1, 'message' => "{$email} added successfully"];
        exit(json_encode($returnResponse));
        $mail->send();
    }
  } catch (Exception $e) {
    if($User_re < 0) {
        $returnResponse = ['status' => 0, 'message' => "{$email} not created, try again"];
        exit(json_encode($returnResponse));
    }
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
            $last_id = mysqli_insert_id($alleybookingsConnection);
            $returnResponse = ['status' => 1, 'message' => "{$email} added successfully", "user" => $last_id];
            return (json_encode($returnResponse));
        } else {
            $returnResponse = ['status' => 0, 'message' => "{$email} not created, try again"];
            return(json_encode($returnResponse));
        }
    }
}

function hotelListerPropertiesLocation($property_location, $property_country, $property_street_address, $property_unit_number, $property_city, $zip_code, $hotelListerProperties_id)
{
    include "config/index.php";
    $query_User_re = sprintf("INSERT INTO `hotelListerPropertiesLocation`(`property_location`, `property_country`, `property_street_address`, `property_unit_number`, `property_city`, `zip_code`, `hotelListerProperties_id`)
                     VALUES ('$property_location', '$property_country', '$property_street_address', $property_unit_number, '$property_city', '$zip_code', $hotelListerProperties_id)");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $returnResponse = ['status' => 1];
        return(json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return(json_encode($returnResponse));
    }
}

function hotelListerProperties($property_name, $property_type, $property_currency, $zip_code, $property_chain_status, $property_channel_manager_status, $hotelListerProperties_id)
{
    include "config/index.php";
    $query_User_re = sprintf("INSERT INTO `hotelListerProperties`(`property_name`, `property_type`, `property_currency`, `zip_code`, `property_chain_status`, `property_channel_manager_status`, `owner_id`) 
                     VALUES ('$property_name', '$property_type', '$property_currency', '$zip_code', '$property_chain_status', '$property_channel_manager_status', $hotelListerProperties_id)");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $returnResponse = ['status' => 1];
        return(json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return(json_encode($returnResponse));
    }
}
function hotelListerUserCall001($data)
{
    if (count(get_object_vars($data->hotelListerUsers)) == 4) {
        if (filter_var($data->hotelListerUsers->email, FILTER_VALIDATE_EMAIL)) {
            $user_creation = json_decode(createListerUser($data->hotelListerUsers->email, $data->hotelListerUsers->first_name, $data->hotelListerUsers->last_name, $data->hotelListerUsers->phone));
            if ($user_creation->status == 1) {
                $pLocation = hotelListerPropertiesLocation($data->hotelListerPropertiesLocation->property_location, $data->hotelListerPropertiesLocation->property_country, $data->hotelListerPropertiesLocation->property_street_address, $data->hotelListerPropertiesLocation->property_unit_number, $data->hotelListerPropertiesLocation->property_city, $data->hotelListerPropertiesLocation->zip_code, $user_creation->user);
                $pListedDetail = hotelListerProperties($data->hotelListerProperties->property_name, $data->hotelListerProperties->property_type, $data->hotelListerProperties->property_currency, $data->hotelListerProperties->zip_code, $data->hotelListerProperties->property_chain_status, $data->hotelListerProperties->property_channel_manager_status, $user_creation->user);
                $arr = [];
                if (json_decode($pListedDetail)->status == 1) {
                    $arr['hotelListerProperties'] = json_decode($pListedDetail)->status;
                }
                if (json_decode($pLocation)->status == 1) {
                    $arr['hotelListerPropertiesLocation'] = json_decode($pLocation)->status;
                }
                $arr['message'] = "Successfully created an account";
                echo json_encode($arr);    
            } else {
            }
        } else {
            $emailRespError = ["Error" => "Invalid Email"];
            exit(json_encode($emailRespError));
        }
    } else {
        $objectLengthRespError = ["Error" => "Invalid object('hotelListerUsers') length"];
        exit(json_encode($objectLengthRespError));
    }
}

function hotelListerPropertie($property_name, $property_type, $property_currency, $zip_code, $property_chain_status, $property_channel_manager_status, $hotelListerProperties_id)
{
    include "config/index.php";
    $query_User_re = sprintf("INSERT INTO `hotelListerProperties`(`property_name`, `property_type`, `property_currency`, `zip_code`, `property_chain_status`, `property_channel_manager_status`, `owner_id`) 
                     VALUES ('$property_name', '$property_type', '$property_currency', '$zip_code', '$property_chain_status', '$property_channel_manager_status', $hotelListerProperties_id)");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $returnResponse = ['status' => 1];
        return(json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return(json_encode($returnResponse));
    }
}