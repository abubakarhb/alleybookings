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

function check_db_query_staus1($db_state, $db_actions)
{
    include "config/index.php";
    $query_User_re = sprintf($db_state);
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));

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
                    $all = [];
                    while ($row_User_re = mysqli_fetch_assoc($User_re)) {
                        $all[] = $row_User_re;
                        // $User_re11 = mysqli_query($ibsConnection, "INSERT INTO mda(`fullname`) VALUE('{$row_User_re['COL_3']}')") or die(mysqli_error($ibsConnection));
                    };
                    $arr = ['status' => 1, 'message' => $all];
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
            
            $arr = ['status' => 1, 'message' => 'Buzzing you in ðŸ˜Ž', 'email' => $row_User_re['email'], 'fullname' => $row_User_re['first_name'], "userID" => $row_User_re['id']];
            exit(json_encode($arr));
        }
    } else {
        $arr = ['status' => 0, 'message' => 'Not a user, try registering again'];
        exit(json_encode($arr));
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
    $phone_number = "";
    $address = "";
    $gender = "";
    $nationality = "";
    $user_status = "0";
    $verification = encripted_data($email . "Â£" . "30" . "_");
    $query_User_re = sprintf("INSERT INTO `endUsers`(`first_name`, `last_name`, `email`, `phone_number`, `nationality`, `gender`, `address`, `password`, `verification_status`, `user_status`) 
                    VALUES ('$firstname', '$lastname', '$email', '$phone_number','$nationality', '$gender', '$address', '$password', '$verification', '$user_status')");
    $check_exist = check_db_query_staus("SELECT email FROM endUsers WHERE email='{$email}'", "CHK");

    if ($check_exist['status'] == 1) {
        $returnResponse = ['status' => 2, 'message' => "{$email} exists already"];
        exit(json_encode($returnResponse));
    } else {
        $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));

        $mail = new PHPMailer(true);

        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'alleybookings.com';               //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@alleybookings.com';                   //SMTP username
        $mail->Password   = 'info@2022';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@alleybookings.com', 'alleybookings');
        $mail->addAddress($email);     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Alleybookings Account Verification";
        $mail->Body    = "
      Thank you for signing up for our service! In order to complete your registration, please click on the following link to verify your account:\n
         <br/>
         https://alleyy.vercel.app/verifyemail
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
            $mail->send();
            $returnResponse = ['status' => 1, 'message' => "{$email} added successfully", 'message1' => "message sent successfully"];
            exit(json_encode($returnResponse));
        } else {
            $returnResponse = ['status' => 0, 'message' => "email not registered"];
            exit(json_encode($returnResponse));
        }
    }
}

function singleUserInfor($data)
{
    $pull_data = check_db_query_staus("SELECT * FROM `endUsers` WHERE `id`= '{$data}'", "CHK");
    exit(json_encode($pull_data));
}


function createListerUser($email, $firstname, $lastname, $phone)
{
    include "config/index.php";
    include "config/enctp.php";
    $verification = encripted_data($email . "Â£Â£" . "30" . "_");
    $status = "active";
    $query_User_re = sprintf("INSERT INTO `hotelListerUsers`(`first_name`, `last_name`, `email`, `phone_number`, `status`) 
                        VALUES ('$firstname','$lastname','$email','$phone','$status')");
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
            return (json_encode($returnResponse));
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
        return (json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return (json_encode($returnResponse));
    }
}

function hotelListerProperties($property_name, $property_type, $property_currency, $zip_code, $property_chain_status, $property_channel_manager_status, $hotelListerProperties_id)
{
    include "config/index.php";
    $status = "active";
    $query_User_re = sprintf("INSERT INTO `hotelListerProperties`(`property_name`, `property_type`, `property_currency`, `zip_code`, `property_chain_status`, `property_channel_manager_status`, `owner_id`, `status`) 
                     VALUES ('$property_name', '$property_type', '$property_currency', '$zip_code', '$property_chain_status', '$property_channel_manager_status', '$hotelListerProperties_id','$status')");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $last_idi = mysqli_insert_id($alleybookingsConnection);
        $returnResponse = ['status' => 1, "property_id"=>$last_idi];
        return (json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return (json_encode($returnResponse));
    }
}

function hotelListerUserCall001($data)
{
    if (count(get_object_vars($data->hotelListerUsers)) == 4) {
        if (filter_var($data->hotelListerUsers->email, FILTER_VALIDATE_EMAIL)) {
            $user_creation = json_decode(createListerUser($data->hotelListerUsers->email, $data->hotelListerUsers->first_name, $data->hotelListerUsers->last_name, $data->hotelListerUsers->phone));
            if ($user_creation->status == 1) {
                $pLocation = json_decode(hotelListerPropertiesLocation($data->hotelListerPropertiesLocation->property_location, $data->hotelListerPropertiesLocation->property_country, $data->hotelListerPropertiesLocation->property_street_address, $data->hotelListerPropertiesLocation->property_unit_number, $data->hotelListerPropertiesLocation->property_city, $data->hotelListerPropertiesLocation->zip_code, $user_creation->user));
                $pListedDetail = json_decode(hotelListerProperties($data->hotelListerProperties->property_name, $data->hotelListerProperties->property_type, $data->hotelListerProperties->property_currency, $data->hotelListerProperties->zip_code, $data->hotelListerProperties->property_chain_status, $data->hotelListerProperties->property_channel_manager_status, $user_creation->user));
                $arr = [];
                $dd = null;
                if ($pListedDetail->status == 1) {
                    $dd =$pListedDetail->property_id;
                    $arr['hotelListerProperties'] = $pListedDetail->status;
                }
                if ($pLocation->status == 1) {
                    $arr['hotelListerPropertiesLocation'] = $pLocation->status;
                }
                $arr= ["message"=>"Successfully created an account", "id"=>$dd ] ;
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
    $status = "active";
    $query_User_re = sprintf("INSERT INTO `hotelListerProperties`(`property_name`, `property_type`, `property_currency`, `zip_code`, `property_chain_status`, `property_channel_manager_status`, `owner_id`,`status`) 
                     VALUES ('$property_name', '$property_type', '$property_currency', '$zip_code', '$property_chain_status', '$property_channel_manager_status', '$hotelListerProperties_id','$status')");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    if ($User_re) {
        $returnResponse = ['status' => 1];
        return (json_encode($returnResponse));
    } else {
        $returnResponse = ['status' => 0];
        return (json_encode($returnResponse));
    }
}


function CreateHotelPropertyDetails($data)
{
    if (isset($data->basicInfo)) {
        // print_r($data->basicInfo);
        include "config/index.php";
        $query_User_re = sprintf("INSERT INTO `hotelListerPropertiesBasicInfo`(`name`, `startRate`, `hotelListerPropertiesId`) 
                     VALUES ('{$data->basicInfo->propertyInfo->name}', '{$data->basicInfo->propertyInfo->starRate}', {$data->accountInfo->propertyId})");
        $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
        if ($User_re) {
            $query_User_re_propertyContactDetails = sprintf("INSERT INTO `propertyContactDetails`(`name`, `phone1`, `phone2`, `company`, `hotelListerPropertiesId`) 
                     VALUES ('{$data->basicInfo->propertyContactDetails->name}', '{$data->basicInfo->propertyContactDetails->phone1}', '{$data->basicInfo->propertyContactDetails->phone2}', '{$data->basicInfo->propertyContactDetails->company}', {$data->accountInfo->propertyId})");
            $User_re_propertyContactDetails = mysqli_query($alleybookingsConnection, $query_User_re_propertyContactDetails) or die(mysqli_error($alleybookingsConnection));
            $query_User_re_channelManager = sprintf("INSERT INTO `channelManager`(`status`, `content`, `hotelListerPropertiesId`) 
                     VALUES ('{$data->basicInfo->channelManager->value}', '{$data->basicInfo->channelManager->name}',{$data->accountInfo->propertyId})");
            $User_re_channelManager = mysqli_query($alleybookingsConnection, $query_User_re_channelManager) or die(mysqli_error($alleybookingsConnection));
            $query_User_re_propertyLocation = sprintf("INSERT INTO `propertyLocation`(`address1`, `address2`, `country`, `city`, `zip`, `hotelListerPropertiesId`) 
            VALUES ('{$data->basicInfo->propertyLocation->address1}', '{$data->basicInfo->propertyLocation->address2}', '{$data->basicInfo->propertyLocation->country}', '{$data->basicInfo->propertyLocation->city}', '{$data->basicInfo->propertyLocation->zip}', {$data->accountInfo->propertyId})");
            $User_re_propertyLocation = mysqli_query($alleybookingsConnection, $query_User_re_propertyLocation) or die(mysqli_error($alleybookingsConnection));
            //2 layoutPrice
            $roomLocation = "kano";
            $totalOccupant = "2";
            $maxAdultOccupants = "4";
            $maxChildrenOccupants = "2";
            $query_User_re_layoutPrice = sprintf("INSERT INTO `layoutPrice`(`roomType_budgetDoubleRoom`, `roomName_budgetDoubleRoom`, `customName_budgetDoubleRoom`, `smokingPolicy_budgetDoubleRoom`, `numRoom_budgetDoubleRoom`, `bedKind_bedOptions`, `numGuest_bedOptions`, `pricePerPerson_basePricePerNight`, `hotelListerPropertiesId`,`roomLocation`, `totalOccupant`, `maxAdultOccupants`, `maxChildrenOccupants`) 
            VALUES ('{$data->layoutPrice->budgetDoubleRoom->roomType}', '{$data->layoutPrice->budgetDoubleRoom->roomName}', '{$data->layoutPrice->budgetDoubleRoom->customName}', '{$data->layoutPrice->budgetDoubleRoom->smokingPolicy}', '{$data->layoutPrice->budgetDoubleRoom->numRoom}', '{$data->layoutPrice->bedOptions->bedKinds}', '{$data->layoutPrice->bedOptions->numGuest}', '{$data->layoutPrice->basePricePerNight->pricePerPerson}', '{$data->accountInfo->propertyId}', '$roomLocation', '$totalOccupant ', '$maxAdultOccupants', '$maxChildrenOccupants')");
            $User_re_layoutPrice = mysqli_query($alleybookingsConnection, $query_User_re_layoutPrice) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_facilitiesServices = sprintf("INSERT INTO `facilitiesServices`(`avaibleForGuest_parking`, `type_parking`, `needToReserve_parking`, `availability_breakfast`, `price_breakfast`, `typeOfBreakfast_breakfast`, `languagesSpoken`, `facilities`, `hotelListerPropertiesId`) 
            VALUES ('{$data->facilitiesServices->parking->avaibleForGuest}', '{$data->facilitiesServices->parking->type}', '{$data->facilitiesServices->parking->needToReserve}', '{$data->facilitiesServices->breakfast->availability}', '{$data->facilitiesServices->breakfast->price}', '{$data->facilitiesServices->breakfast->typeOfBreakfast}', '{$data->facilitiesServices->languagesSpoken}', '{$data->facilitiesServices->facilities}', {$data->accountInfo->propertyId})");
            $User_re_facilitiesServices = mysqli_query($alleybookingsConnection, $query_User_re_facilitiesServices) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_amenties = sprintf("INSERT INTO `amenties`(`extra_extraBedOptions`, `numberOfExtra_extraBedOptions`, `amenities`, `hotelListerPropertiesId`) 
            VALUES ('{$data->amenities->extraBedOptions->extra}', '{$data->amenities->extraBedOptions->numberOfExtra}', '{$data->amenities->amenities}', {$data->accountInfo->propertyId})");
            $User_re_amenties = mysqli_query($alleybookingsConnection, $query_User_re_amenties) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_photos = sprintf("INSERT INTO `propertiesPhotos`(`content`, `hotelListerPropertiesId`) 
            VALUES ('{$data->photos}', {$data->accountInfo->propertyId})");
            $User_re_photos = mysqli_query($alleybookingsConnection, $query_User_re_photos) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_policies = sprintf("INSERT INTO `policies`(`daysInAdvance_cancellations`, `guestPay_cancellations`, `checkIn_checkTime`, `checkOut_checkTime`, `accomondateChildren`, `accomondatePet`, `hotelListerPropertiesId`) 
            VALUES ('{$data->policies->cancellations->daysInAdvance}', '{$data->policies->cancellations->guestPay}', '{$data->policies->checkTime->checkIn}', '{$data->policies->checkTime->checkOut}', '{$data->policies->accomondateChildren}', '{$data->policies->accomondatePet}', {$data->accountInfo->propertyId})");
            $User_re_policies = mysqli_query($alleybookingsConnection, $query_User_re_policies) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_payments = sprintf("INSERT INTO `hotelListerPayments`(`chargeCreditProperty_guestPaymentOptions`, `methods_guestPaymentOptions`, `commissionPercentage_commissionPayments`, `invoiceCompanyTitle_commissionPayments`, `hotelListerPropertiesId`) 
            VALUES ('{$data->payments->guestPaymentOptions->chargeCreditProperty}', '{$data->payments->guestPaymentOptions->methods}', '{$data->payments->commissionPayments->commissionPercentage}', '{$data->payments->commissionPayments->invoiceCompanyTitle}', {$data->accountInfo->propertyId})");
            $User_re_payments = mysqli_query($alleybookingsConnection, $query_User_re_payments) or die(mysqli_error($alleybookingsConnection));

            $query_User_re_hotelListerrights = sprintf("INSERT INTO `hotelListerrights`(`rights`, `right2`, `hotelListerPropertiesId`) 
            VALUES ('{$data->rights[0]}', '{$data->rights[1]}', {$data->accountInfo->propertyId})");
            $User_re_hotelListerrights = mysqli_query($alleybookingsConnection, $query_User_re_hotelListerrights) or die(mysqli_error($alleybookingsConnection));
            $date_from = "2023-01-16";
            $room_id = "7";
            $date_to = "2023-01-20";
            $room_selling_amount = "1.32";
            $standard_rate = "1.32";
            $non_refundable_rates = "1.33";
            $open_close_booking_status = "active";
            $standard_rate_status = "active";
            $non_refundable_rates_status = "active";
            $query_User_re_openandclose = sprintf("INSERT INTO `open_close_rooms`(`room_id`,`property_id`, `date_from`, `date_to`, `room_type`, `room_selling_amount`, `standard_rate`, `non_refundable_rates`, `open_close_booking_status`, `standard_rate_status`, `non_refundable_rates_status`) 
            VALUES ('$room_id','{$data->accountInfo->propertyId}', '$date_from' ,'$date_to', '{$data->layoutPrice->budgetDoubleRoom->roomType}', '$room_selling_amount', '$standard_rate', '$non_refundable_rates', '$open_close_booking_status', '$standard_rate_status', '$non_refundable_rates_status')");
            $User_re_hotelListerrights = mysqli_query($alleybookingsConnection, $query_User_re_openandclose) or die(mysqli_error($alleybookingsConnection));
            
            $arr = ["status" => 1, "message" => "Hotel information successfully created, your rooms should be ready for reservations"];
            exit(json_encode($arr));
        }
    }
}


function updateHotelHostType($data)
{
    include "config/index.php";
    if (!empty($data->accountId)) {
        $query = "UPDATE `hotelListerPropertiesBasicInfo` SET `property_host_type`='{$data->value}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
        if ($User_re) {
            $arr = ["status" => 1, "message" => "Hotel information(`Host Type`) successfully updated"];
            exit(json_encode($arr));
        } else {
            $error_updating = ["Error" => "Invalid operation"];
            exit(json_encode($error_updating));
        }
    }
}

function updateHotelPhotos($data)
{
    include "config/index.php";
    if (!empty($data->accountId)) {
        $query = "UPDATE `propertiesPhotos` SET `content`='{$data->value}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
        if ($User_re) {
            $arr = ["status" => 1, "message" => "Hotel information(`Photos`) successfully updated"];
            exit(json_encode($arr));
        } else {
            $error_updating = ["Error" => "Invalid operation"];
            exit(json_encode($error_updating));
        }
    }
}


function updateHotelPolicies($data)
{
    include "config/index.php";
    if ((!empty($data->accountId)) && (isset($data->accountId))) {
        $all_responses = [];
        if (isset($data->cancellations)) {
            $query = "UPDATE `policies` SET `daysInAdvance_cancellations`='{$data->cancellations->daysOfCancellations}', `guestPay_cancellations`='{$data->cancellations->PercenToChargeCancellations}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $all_responses[] = ["status" => 1, "message" => "Hotel information(`Cancellation Policies`) successfully updated"];
                // exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        }
        if (isset($data->checks)) {
            $query = "UPDATE `policies` SET `checkIn_checkTime`='{$data->checks->checkInTime}', `checkOut_checkTime`='{$data->checks->checkOutTime}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $all_responses[] = ["status" => 1, "message" => "Hotel information(`Check-In Policies`) successfully updated"];
                // exit(json_encode($arr));
            } else {
                $all_responses[] = ["Error" => "Invalid operation"];
                // exit(json_encode($error_updating));
            }
        }
        if (isset($data->accomondations)) {
            $query = "UPDATE `policies` SET `accomondateChildren`='{$data->accomondations->accomondateChildren}', `accomondatePet`='{$data->accomondations->accomondatePet}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $all_responses[] = ["status" => 1, "message" => "Hotel information(`Accommodation Policies`) successfully updated"];
                // exit(json_encode($arr));
            } else {
                $all_responses[] = ["Error" => "Invalid operation"];
                // exit(json_encode($error_updating));
            }
        }
        exit(json_encode($all_responses));
    }
}

function updateHotelMoreFacilities($data)
{
    include "config/index.php";
    if (!empty($data->accountId)) {
        $fac_data = json_encode($data);
        $query = "UPDATE `facilitiesServices` SET `more_facilities`='{$fac_data}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
        if ($User_re) {
            $arr = ["status" => 1, "message" => "Hotel information(`Extended Facilities and Services`) successfully updated"];
            exit(json_encode($arr));
        } else {
            $error_updating = ["Error" => "Invalid operation"];
            exit(json_encode($error_updating));
        }
    }
}

function hotelGeneralRoomAmenities($data)
{
    include "config/index.php";
    if (!empty($data->accountId)) {
        $checkingLog = check_db_query_staus("SELECT `hotelListerPropertiesId` FROM `HotelListerNotifications` WHERE `hotelListerPropertiesId`= {$data->accountId}", "CHK");
        if ($checkingLog['status'] == 1) {
            $query = "UPDATE `HotelListerNotifications` SET `email`='{$data->email}', `automatic_reply`='{$data->automatic_reply}', `reminder`='{$data->reminder}' WHERE `hotelListerPropertiesId` = {$data->accountId}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $arr = ["status" => 1, "message" => "Hotel information(`General Hotel Notifications`) successfully updated"];
                exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        } else {
            $query = "INSERT INTO `HotelListerNotifications`(`email`, `automatic_reply`, `reminder`, `hotelListerPropertiesId`) 
            VALUE('$data->email', '$data->automatic_reply', '$data->reminder', $data->accountId)";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $arr = ["status" => 1, "message" => "Hotel information(`Hotel General Notifications`) successfully added"];
                exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        }
    }
}

function hotelOpenAndCloseRoom($data)
{

    if (isset($data->openClose)) {
        //print_r($data->openClose); 
        include "config/index.php";
        $row = check_db_query_staus("SELECT * FROM `open_close_rooms` WHERE `room_id`= {$data->openClose->room_id}", "CHK");
        //print_r($row);
        if ($row['status'] == 1) {
            $query =  "UPDATE `open_close_rooms` SET `room_id`='{$data->openClose->room_id}',`property_id`='{$data->openClose->property_id}',`date_from`='{$data->openClose->date_from}',`date_to`='{$data->openClose->date_to}',`room_type`='{$data->openClose->room_type}',`room_selling_amount`='{$data->openClose->room_selling_amount}',`standard_rate`='{$data->openClose->standard_rate}',`non_refundable_rates`='{$data->openClose->non_refundable_rates}',`open_close_booking_status`='{$data->openClose->open_close_booking_status}',`standard_rate_status`='{$data->openClose->standard_rate_status}',`non_refundable_rates_status`='{$data->openClose->non_refundable_rates_status}' WHERE `room_id` = {$data->openClose->room_id}";


            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $arr = ["status" => 1, "message" => "Rooms Set for Booking are Updated successfully"];
                exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        } else {
            $query = sprintf("INSERT INTO `open_close_rooms`(`room_id`, `property_id`, `date_from`, `date_to`, `room_type`, `room_selling_amount`, `standard_rate`, `non_refundable_rates`, `open_close_booking_status`, `standard_rate_status`, `non_refundable_rates_status`) VALUES ('{$data->openClose->room_id}','{$data->openClose->property_id}','{$data->openClose->date_from}','{$data->openClose->date_to}','{$data->openClose->room_type}','{$data->openClose->room_selling_amount}','{$data->openClose->standard_rate}','{$data->openClose->non_refundable_rates}','{$data->openClose->open_close_booking_status}','{$data->openClose->standard_rate_status}','{$data->openClose->non_refundable_rates_status}')");



            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

            if ($User_re) {
                $arr = ["status" => 1, "message" => "Rooms Successfully Set for Booking"];
                exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        }
    }
}

function newsletter($data)
{

    if (isset($data)) {
        include "config/index.php";
        //print_r($data);
        // Validate email address
        if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
            $error_sub = ["Error" => "Please provide a valid email address!"];
            exit(json_encode($error_sub));
        }
        // Check if email exists in the database
        $row2 = check_db_query_staus("SELECT * FROM `newsletter` WHERE `email` = '{$data->email}'", "CHK");
        //print_r($row2);
        if ($row2['status'] == 1) {
            $error_sub = ["Error" => "You're already a subscriber!"];
            exit(json_encode($error_sub));
        } else {
            // Insert email address into the database
            $query = sprintf("INSERT INTO `newsletter`(`firstname`, `lastName`, `phoneNumber`, `email`,`country`,`city`) VALUES ('{$data->firstname}','{$data->lastName}','{$data->phoneNumber}','{$data->email}','{$data->country}', '{$data->city}')");

            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

            if ($User_re) {
                $arr = ["status" => 1, "message" => "Thank you for subscribing!"];
                exit(json_encode($arr));
            } else {
                $error_sub = ["Error" => "Subscription Failed"];
                exit(json_encode($error_sub));
            }
        }
    }
}

function reservationDetail()
{
    include "config/index.php";
    include "config/enctp.php";
    $property_id = $_GET['property_id'];
    $user_id = $_GET['user_id'];
    $room_id = $_GET['room_id'];
    //print_r($property_name ." ". $room_type);

    // property lister
    $query1 = "SELECT id, property_name FROM hotelListerProperties WHERE `id` = '$property_id' AND `status` = 'active'";
    $result = mysqli_query($alleybookingsConnection, $query1) or die(mysqli_error($alleybookingsConnection));
    $row1 = mysqli_fetch_assoc($result);
    $property_id = $row1["id"];
    $property_name = $row1["property_name"];
    // print_r($property_name); 

    //property location
    $query2 = "SELECT property_location FROM hotelListerPropertiesLocation WHERE hotelListerProperties_id = '$property_id'";
    $result = mysqli_query($alleybookingsConnection, $query2) or die(mysqli_error($alleybookingsConnection));
    $row2 = mysqli_fetch_assoc($result);
    $property_location = $row2["property_location"];
    // print_r($property_location);

    //End User
    $query3 = "SELECT first_name,last_name, email FROM endUsers WHERE id = '$user_id'";
    $result = mysqli_query($alleybookingsConnection, $query3) or die(mysqli_error($alleybookingsConnection));
    $row3 = mysqli_fetch_assoc($result);
    $guest_name = $row3["first_name"] . " " . $row3["last_name"];
    $email = $row3["email"];
    // print_r($guest_name);


    //payment and commision
    $query4 = "SELECT chargeCreditProperty_guestPaymentOptions,commissionPercentage_commissionPayments FROM hotelListerPayments WHERE hotelListerPropertiesId = '$property_id'";
    $result = mysqli_query($alleybookingsConnection, $query4) or die(mysqli_error($alleybookingsConnection));
    $row4 = mysqli_fetch_assoc($result);
    $total_payment = $row4["chargeCreditProperty_guestPaymentOptions"];
    $commission = $row4["commissionPercentage_commissionPayments"];
    // print_r($total_payment.$commission);


    //room information
    $query5 = "SELECT id,roomType_budgetDoubleRoom,roomName_budgetDoubleRoom FROM layoutPrice WHERE id = '$room_id'";
    $result = mysqli_query($alleybookingsConnection, $query5) or die(mysqli_error($alleybookingsConnection));
    $row5 = mysqli_fetch_assoc($result);

    $roomType = $row5["roomType_budgetDoubleRoom"];
    $roomName = $row5["roomName_budgetDoubleRoom"];
    // print_r($roomType." ".$room_id); die();

    //check in time
    // $check_in = date('m/d/Y h:i a', time());
    $check_in = $_GET['check_in'];
    $check_out = $_GET['check_out'];
    //echo $date;

    //reservation number
    $reservation_no = (time() + rand(1, 1000));
    // print_r($reservation);



    // Insert the new  table
    $sql2 = "INSERT INTO `hotelReservation`(`property_id`, `user_id`, `property_name`, `property_location`, `room_type`, `room_name`, `room_id`, `guest_name`, `check_in`, `check_out`, `total_payment`, `commission`, `reservation_no`, `status`) VALUES ('$property_id', '$user_id','$property_name','$property_location','$roomType','$roomName','$room_id','$guest_name','$check_in','$check_out','$total_payment','$commission','$reservation_no','active')";
    // print_r($sql2);
    $result = mysqli_query($alleybookingsConnection, $sql2) or die(mysqli_error($alleybookingsConnection));
    if ($result) {

        $mail = new PHPMailer(true);
        try {

            //Server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host       = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'a3d7643a5e2648';
            $mail->Password   = '7a57e1373e5d6b';
            $mail->Port       = 2525;

            //Recipients
            $mail->setFrom('support@alleybookings.com', 'Mailer');
            $mail->addAddress($email, $guest_name);


            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            $name = $row11['guest_name'];
            $body = '<p> Dear <strong>' . $guest_name . ' </strong>Your Reservation has been booked Successfully</p>';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            // print_r('Message has been sent');
        } catch (Exception $e) {
            // print_r("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }


        $last_id = mysqli_insert_id($alleybookingsConnection);
        $arr = ["status" => 1, "message" =>  "Created successfully!", "reservation_id" => $last_id];
        exit(json_encode($arr));
    } else {
        $error_resv = ["Error" => "Failed"];
        exit(json_encode($error_resv));
    }




    // INSERT INTO invoices (invoice_number, payer_id, revenue_head, due_date, payment_status) 
    //                   VALUES ('$invoice_number', $payer_id, $revenue_head_id,'$due_date', 2)";

}
function singleHotelReservation($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `hotelReservation` WHERE `property_id`= '{$data}' AND `status` = 'active' ORDER BY id DESC", "CHK");
    exit(json_encode($pull_data));
}
function singleUserReservation($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `hotelReservation` WHERE `user_id`= '{$data}' AND `status` = 'active' ORDER BY id DESC", "CHK");
    exit(json_encode($pull_data));
}

function HotelReservationStatement()
{
    include "config/index.php";
    include "config/enctp.php";
    $property_id = $_GET['property_id'];
    $date_from = $_GET['date_from'];
    $date_to = $_GET['date_to'];
    // print_r($property_id ." ". $date_to); die;

    $pull_data = check_db_query_staus1("SELECT * FROM `hotelReservation` WHERE book_on BETWEEN '{$date_from}' AND '{$date_to}' AND `property_id`= '{$property_id}' AND `status` = 'active' ORDER BY id DESC ", "CHK");
    exit(json_encode($pull_data));
}

function copyYearlyRate($data)
{
    // print_r($data);
    include "config/index.php";
    $property_id = $data->property_id;
    $date_from = $data->date_from;
    $date_to = $data->date_to;
    $days_of_week =  $data->days_of_week;
    $room_type =  $data->room_type;
    $rate_changes = $data->rate_changes;
    $restriction = $data->restriction;

    $query = sprintf("INSERT INTO `copy_of_yearly_rate`(`property_id`, `rates_from`, `rates_to`, `days_of_week`, `room_type`, `rate_changes`, `restriction`) VALUES ('$property_id','$date_from','$date_to','$days_of_week','$room_type','$rate_changes','$restriction')");
    //print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Yearly Rates Successfully Created for Copying into Existing Rate"];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function insertRoomDetails($data)
{

    // print_r($data);
    include "config/index.php";
    $roomType = $data->roomType_budgetDoubleRoom;
    $roomName = $data->roomName_budgetDoubleRoom;
    $customName = $data->customName_budgetDoubleRoom;
    $smokingPolicy =  $data->smokingPolicy_budgetDoubleRoom;
    $numRoom_ =  $data->numRoom_budgetDoubleRoom;
    $bedKind = $data->bedKind_bedOptions;
    $numGuest = $data->numGuest_bedOptions;
    $pricePerPerson = $data->pricePerPerson_basePricePerNight;
    $roomLocation = $data->roomLocation;
    $totalOccupant = $data->totalOccupant;
    $maxAdultOccupants =  $data->maxAdultOccupants;
    $maxChildrenOccupants =  $data->maxChildrenOccupants;
    $hotelListerPropertiesId = $data->hotelListerPropertiesId;

    $query = sprintf("INSERT INTO `layoutPrice`(`roomType_budgetDoubleRoom`, `roomName_budgetDoubleRoom`, `customName_budgetDoubleRoom`, `smokingPolicy_budgetDoubleRoom`, `numRoom_budgetDoubleRoom`, `bedKind_bedOptions`, `numGuest_bedOptions`, `pricePerPerson_basePricePerNight`, `roomLocation`, `totalOccupant`, `maxAdultOccupants`, `maxChildrenOccupants`, `hotelListerPropertiesId`) VALUES ('$roomType','$roomName','$customName','$smokingPolicy','$numRoom_','$bedKind','$numGuest','$pricePerPerson','$roomLocation','$totalOccupant','$maxAdultOccupants','$maxChildrenOccupants','$hotelListerPropertiesId')");
    //print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Room Details Successfully Created "];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function getAllRoom($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `layoutPrice` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}

function getSingleRoom($data)
{
    $pull_data = check_db_query_staus("SELECT * FROM `layoutPrice` WHERE `id`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}


function getAllRoomType($data)
{
    $pull_data = check_db_query_staus1("SELECT id, roomType_budgetDoubleRoom FROM `layoutPrice` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}

function updateSingleRoom($data)
{
    //print_r($data); die;
    include "config/index.php";
    $roomType = $data->roomType_budgetDoubleRoom;
    $roomName = $data->roomName_budgetDoubleRoom;
    $customName = $data->customName_budgetDoubleRoom;
    $smokingPolicy =  $data->smokingPolicy_budgetDoubleRoom;
    $numRoom_ =  $data->numRoom_budgetDoubleRoom;
    $bedKind = $data->bedKind_bedOptions;
    $numGuest = $data->numGuest_bedOptions;
    $pricePerPerson = $data->pricePerPerson_basePricePerNight;
    $roomLocation = $data->roomLocation;
    $totalOccupant = $data->totalOccupant;
    $maxAdultOccupants =  $data->maxAdultOccupants;
    $maxChildrenOccupants =  $data->maxChildrenOccupants;
    $id = $data->id;


    $query =  "UPDATE `layoutPrice` SET `roomType_budgetDoubleRoom`='{$roomType}',`roomName_budgetDoubleRoom`='{$roomName}',`customName_budgetDoubleRoom`='{$customName}',`smokingPolicy_budgetDoubleRoom`='{$smokingPolicy}',`numRoom_budgetDoubleRoom`='{$numRoom_}',`bedKind_bedOptions`='{$bedKind}',`numGuest_bedOptions`='{$numGuest}',`pricePerPerson_basePricePerNight`='{$pricePerPerson}',`roomLocation`='{$roomLocation}',`totalOccupant`='{$totalOccupant}',`maxAdultOccupants`='{$maxAdultOccupants}',`maxChildrenOccupants`='{$maxChildrenOccupants}' WHERE `id` = {$id}";

    //print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Room Details Successfully Updated "];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function propertyRoomAndOtherDescription($data)
{
    // print_r($data);
    include "config/index.php";
    $room_id = $data->room_id;
    $language = $data->language;
    $propertyDescription = $data->propertyDescription;

    $roomDescription = $data->roomDescription;

    $property_id =  $data->property_id;
    if (isset($data)) {
        //print_r($data); 
        include "config/index.php";
        $row = check_db_query_staus("SELECT * FROM `otherPropertyDescription` WHERE `room_id`= {$room_id}", "CHK");
        //print_r($row);
        if ($row['status'] == 1) {
            $query =  "UPDATE `otherPropertyDescription` SET  `room_id`='{$room_id}',`language`='{$language}',`propertyDescription`='{$propertyDescription}',`roomDescription`='{$roomDescription}' WHERE `property_id` = {$property_id}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));
            if ($User_re) {
                $arr = ["status" => 1, "message" => "Description Updated successfully"];
                exit(json_encode($arr));
            } else {
                $error_updating = ["Error" => "Invalid operation"];
                exit(json_encode($error_updating));
            }
        } else {
            $query = sprintf("INSERT INTO `otherPropertyDescription`(`room_id`,`language`,`propertyDescription`, `roomDescription`,  `property_id`) VALUES ('$room_id','$language','$propertyDescription','$roomDescription','$property_id')");
            // print_r($query);die;
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

            if ($User_re) {
                $arr = ["status" => 1, "message" => "Description Created Successfully"];
                exit(json_encode($arr));
            } else {
                $error_creating = ["Error" => "Invalid operation"];
                exit(json_encode($error_creating));
            }
        }
    }
}

function invoice($data)
{

    // print_r($data);
    include "config/index.php";
    $document_name = $data->document_name;
    $date = $data->date;
    $period = $data->period;
    $action = $data->action;
    $invoice_number = uniqid();
    $amount =  $data->amount;
    $status =  $data->status;

    //print_r($invoice_number);
    $query = sprintf("INSERT INTO `invoices`(`document_name`, `invoice_number`, `date`, `period`, `action`, `amount`, `status`) VALUES ('$document_name','$invoice_number','$date','$period','$action','$amount','$status')");
    //   print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Invoice Successfully Created"];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function reservationGrossRevenue($data)
{
    //  print_r($data);
    include "config/index.php";
    $pull_data = check_db_query_staus("SELECT SUM(total_payment) FROM `hotelReservation` WHERE `property_id`= '{$data}' AND `status` = 'active'", "CHK");
    exit(json_encode($pull_data));
}

function reservationCommision($data)
{
    //  print_r($data);
    include "config/index.php";
    $pull_data = check_db_query_staus("SELECT SUM(commission) FROM `hotelReservation` WHERE `property_id`= '{$data}' AND `status` = 'active' ", "CHK");
    exit(json_encode($pull_data));
}
function VATDetails()
{
    include "config/index.php";
    include "config/enctp.php";
    $property_id = $_GET['property_id'];
    $status = $_GET['status'];
    $tin = $_GET['tin'];

    //$tin = date("YmdHis") . rand(111111, 999999);

    // print_r($property_id ." <br/>". $tin. " ". $status); die;

    //print_r($invoice_number);
    $query = sprintf("INSERT INTO `VAT_details`(`status`, `tin`, `property_id`) VALUES ('$status','$tin','$property_id')");
    //    print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "VAT Details Created"];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function hotelListerAgent($data)
{
    //   print_r($data); die;
    include "config/index.php";

    $fname =  $data->fname;
    $lname =  $data->lname;
    $email =  $data->email;
    $mobile_number =  $data->mobile_number;
    $property_id =  $data->property_id;
    $Homepage =  $data->homepage;
    $Reservations =  $data->reservations;
    $Finance =  $data->finance;
    $Users =  $data->users;
    $Rates_availability =  $data->rates_availability;
    $Property =  $data->property;
    $Messages =  $data->messages;
    $Reviews =  $data->reviews;


    //print_r($invoice_number);
    $query = sprintf("INSERT INTO `Hotel_lister_agent`(`fname`, `lname`, `email`, `mobile_number`,`property_id`, `homepage_access`, `reservations_access`, `finance_access`, `users_access`, `rates_availability_access`, `property_access`, `messages_access`, `reviews_access`) VALUES ('$fname','$lname','$email','$mobile_number','$property_id','$Homepage','$Reservations','$Finance','$Users','$Rates_availability','$Property','$Messages','$Reviews')");
    // print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Hotel Lister Agent Successfully Created"];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}
function healthAndSafety($data)
{
    //   print_r($data); die;
    include "config/index.php";

    $value2 = $data->value2;
    $value3 = $data->value3;
    $value4 = $data->value4;
    $value5 = $data->value5;
    $value6 = $data->value6;
    $value7 = $data->value7;
    $value8 = $data->value8;
    $value9 = $data->value9;
    $value10 = $data->value10;
    $value11 = $data->value11;
    $value12 = $data->value12;
    $value13 = $data->value13;
    $value14 = $data->value14;
    $value15 = $data->value15;
    $value16 = $data->value16;
    $value17 = $data->value17;
    $value18 = $data->value18;
    $value19 = $data->value19;
    $value20 = $data->value20;
    $value21 = $data->value21;
    $value22 = $data->value22;
    $value23 = $data->value23;
    $value24 = $data->value24;
    $value25 = $data->value25;
    $value26 = $data->value26;
    $value27 = $data->value27;
    $value28 = $data->value28;
    //print_r($invoice_number);
    $query = sprintf("INSERT INTO `health_safety_features`(`staff_follow_protocols`, `shared_stationery_removed`, `guestHandSanitizer`, `process_to_check_guests_health`, `first_aid_avail`, `healthCareAccess`, `guest_thermometers`, `guest_face_mask`, `air_purifiers`, `contactless_check_in_out`, `cashless_payment_available`, `physical_distancing_rules_followed`, `mobile_app_for_room_service`, `physical_barriers_between_staff_and_guests_where_necessary`, `Single_room_AC_for_guest_accommodation`, `chemicals_needed_against_coronavirus`, `items_washed_in_accordance_with_local_authority_guidelines`, `guest_accommodation_disinfected_between_stays`, `guest_accommodation_sealed_after_cleaning`, `property_cleaned_by_professional`, `guests_can_cancel_any_cleaning_services_during_stay`, `hand_sanitizer`, `physical_distancing_in_dining_areas`, `food_can_be_delivered_to_guest`, `other_tableware_items_sanitized`, `breakfast_to_go_containers`, `delivered_food_covered_securely`) VALUES ('$value2','$value3','$value4','$value5','$value6','$value7','$value8','$value9','$value10','$value11','$value12','$value13','$value14','$value15','$value16','$value17','$value18','$value19','$value20','$value21','$value22','$value23','$value24','$value25','$value26','$value27','$value28')");
    // print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "Health And Safety Measures Applied Successfully"];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function searchFiltering()
{
    include "config/index.php";
    include "config/enctp.php";
    $property_location = $_GET['property_location'];
    $checkin = $_GET['checkin'];
    // $checkout = $_GET['checkout'];
    // $room = $_GET['room'];
    // print_r($property_location); die;
    if (!empty($property_location) && !empty($checkin)) {
        $pull_data = "SELECT
        hotelListerProperties.property_name,
        hotelListerProperties.id,
        hotelListerPropertiesLocation.property_location,
        hotelListerPropertiesLocation.property_country,
        hotelListerPropertiesLocation.property_city,
        open_close_rooms.date_from,
        open_close_rooms.date_to,
        propertiesPhotos.content
    FROM
        hotelListerProperties
    JOIN hotelListerPropertiesLocation ON hotelListerProperties.id = hotelListerPropertiesLocation.hotelListerProperties_id
    JOIN open_close_rooms ON hotelListerProperties.id = open_close_rooms.property_id
    JOIN propertiesPhotos ON hotelListerProperties.id = propertiesPhotos.hotelListerPropertiesId

    WHERE
        (
            hotelListerPropertiesLocation.property_location LIKE '%$property_location%' OR hotelListerPropertiesLocation.property_country LIKE '%$property_location%' OR hotelListerPropertiesLocation.property_city LIKE '%$property_location%' OR hotelListerProperties.property_name LIKE '%$property_location%'
        )
    AND open_close_rooms.date_from >= '$checkin'";

        $User_re = mysqli_query($alleybookingsConnection, $pull_data) or die(mysqli_error($alleybookingsConnection));
        if ($User_re) {
            $all = [];
            while ($row_User_re = mysqli_fetch_assoc($User_re)) {
                $row_User_re['photos'] = explode("~", $row_User_re['content']);
                unset($row_User_re['content']);
                $all[] = $row_User_re;
            };
            $existence_hotels_index = [];
            $existence_hotels = [];
            foreach ($all as $key => $value) {
                if (in_array($value['id'], $existence_hotels_index)) {
                } else {
                    $existence_hotels_index[] = $value['id'];
                    $existence_hotels[] = $value;
                }
            }
            foreach ($existence_hotels_index as $keys => $value2) {
                $getAllRooms = check_db_query_staus1("SELECT * FROM layoutPrice WHERE `hotelListerPropertiesId` = {$value2} ORDER BY pricePerPerson_basePricePerNight DESC LIMIT 1", "CHK");
                // print_r($getAllRooms);
                foreach ($existence_hotels as $key3 => $value3) {
                    if ($value3['id'] == $value2) {
                        $existence_hotels[$key3]['rooms'] = $getAllRooms['message'];
                    }
                }
            }
            exit(json_encode($existence_hotels));
        }
    } elseif (!empty($property_location)) {
        //   print_r("yes");
        $pull_data = "SELECT hotelListerPropertiesLocation.property_location, hotelListerPropertiesLocation.property_country, hotelListerPropertiesLocation.property_city, hotelListerProperties.property_name FROM hotelListerPropertiesLocation LEFT JOIN hotelListerProperties ON hotelListerPropertiesLocation.hotelListerProperties_id = hotelListerProperties.id WHERE hotelListerPropertiesLocation.property_location LIKE '%$property_location%' or hotelListerPropertiesLocation.property_country LIKE '%$property_location%' or hotelListerPropertiesLocation.property_city LIKE '%$property_location%' or hotelListerProperties.property_name LIKE '%$property_location%'";
        $User_re = mysqli_query($alleybookingsConnection, $pull_data) or die(mysqli_error($alleybookingsConnection));
        if ($User_re > 0) {
            $all = [];
            while ($row_User_re = mysqli_fetch_assoc($User_re)) {
                $all[] = $row_User_re;
            };
            exit(json_encode($all));
        }
    }
}
function roomsInAHotel($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `layoutPrice` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}
function generalRoomAmenities($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `generalRoomAmenities` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}
function propertiesPhotos($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `propertiesPhotos` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}
function otherPropertyDescription()
{

    include "config/index.php";
    include "config/enctp.php";
    $property_id = $_GET['property_id'];
    $room_id = $_GET['room_id'];

    $pull_data = check_db_query_staus1("SELECT otherPropertyDescription.room_id, otherPropertyDescription.language, otherPropertyDescription.propertyDescription, otherPropertyDescription.roomDescription, otherPropertyDescription.property_id, hotelListerProperties.property_name, hotelListerProperties.id, hotelListerPropertiesLocation.hotelListerProperties_id, hotelListerPropertiesLocation.property_location, hotelListerPropertiesLocation.property_country, hotelListerPropertiesLocation.property_city, layoutPrice.id, layoutPrice.roomType_budgetDoubleRoom, layoutPrice.roomName_budgetDoubleRoom, layoutPrice.hotelListerPropertiesId FROM otherPropertyDescription JOIN hotelListerProperties ON otherPropertyDescription.property_id = hotelListerProperties.id JOIN hotelListerPropertiesLocation ON hotelListerProperties.id = hotelListerPropertiesLocation.hotelListerProperties_id JOIN layoutPrice ON otherPropertyDescription.room_id = layoutPrice.id WHERE otherPropertyDescription.property_id = '$property_id' AND otherPropertyDescription.room_id = '$room_id'", "CHK");
    exit(json_encode($pull_data));
}

function addRatingsAndReviews($data)
{
    include "config/index.php";
    include "config/enctp.php";
    $property_id = $data->property_id;
    $user_id = $data->user_id;
    $users_reviews = $data->users_reviews;
    $staff_ratings = $data->staff_ratings;
    $freeWifi_ratings = $data->freeWifi_ratings;
    $clealiness_ratings = $data->clealiness_ratings;
    $location_ratings = $data->location_ratings;
    $comfort_ratings = $data->comfort_ratings;
    $facilities_ratings = $data->facilities_ratings;
    $status = "Yes";

    // Check if data exists in the database
    $row22 = check_db_query_staus("SELECT *  FROM `rating_reviews` WHERE `property_id`= '{$property_id}' AND `user_id`= '{$user_id}'", "CHK");
    // print_r($row22); die;

    if ($row22['status'] == 1) {
        $error_sub = ["Error" => "Your rating already exist for this Hotel"];
        exit(json_encode($error_sub));
    } else {
        // Insert email address into the database
        $query = sprintf(" INSERT INTO `rating_reviews`(`property_id`, `user_id`, `users_reviews`, `staff_ratings`, `freeWifi_ratings`, `clealiness_ratings`, `location_ratings`, `comfort_ratings`, `facilities_ratings`, `status`) VALUES ('$property_id','$user_id','$users_reviews','$staff_ratings','$freeWifi_ratings','$clealiness_ratings','$location_ratings','$comfort_ratings','$facilities_ratings','$status')");
        //  print_r($query); die;

        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {
            $arr = ["status" => 1, "message" => "Thanks for rating the Hotel, It will be shown once approved!"];
            exit(json_encode($arr));
        } else {
            $error_sub = ["Error" => "Rating and Review Failed"];
            exit(json_encode($error_sub));
        }
    }
}

function getRatingsAndReviews($data)
{
    include "config/index.php";
    include "config/enctp.php";
    // Rating all
    $pull_data = check_db_query_staus1("SELECT rating_reviews.users_reviews, rating_reviews.staff_ratings, rating_reviews.freeWifi_ratings,rating_reviews.clealiness_ratings,rating_reviews.location_ratings, rating_reviews.comfort_ratings,rating_reviews.facilities_ratings, rating_reviews.status,endUsers.id,endUsers.first_name,endUsers.last_name FROM rating_reviews JOIN endUsers ON rating_reviews.user_id = endUsers.id WHERE rating_reviews.property_id= '{$data}' AND rating_reviews.status = 1 ORDER BY id DESC", "CHK");
    // exit(json_encode($pull_data));

    // Rating sum
    $query1 = check_db_query_staus1("SELECT AVG(staff_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode($query1));

    $query2 = check_db_query_staus1("SELECT AVG(freeWifi_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode("Free Wifi Ratings". " " .$query2));

    $query3 = check_db_query_staus1("SELECT AVG(clealiness_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode("Clealiness Ratings". " " .$query3));

    $query4 = check_db_query_staus1("SELECT AVG(location_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode("Location Ratings". " " .$query4));

    $query5 = check_db_query_staus1("SELECT AVG(comfort_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode("Comfort Ratings". " " .$query5));

    $query6 = check_db_query_staus1("SELECT AVG(facilities_ratings) FROM `rating_reviews` WHERE `property_id` = '{$data}' AND `status` = 1", "CHK");
    // exit(json_encode("Facility Ratings". " " .$query6));

    $arr = [];
    $arr[] = $pull_data['message'];
    $arr[] = $query1['message'][0];
    $arr[] = $query2['message'][0];
    $arr[] = $query3['message'][0];
    $arr[] = $query4['message'][0];
    $arr[] = $query5['message'][0];
    $arr[] = $query6['message'][0];
    exit(json_encode($arr));
}

function facilitiesServices($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `facilitiesServices` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}
function policies($data)
{
    $pull_data = check_db_query_staus1("SELECT * FROM `policies` WHERE `hotelListerPropertiesId`= '{$data}' ", "CHK");
    exit(json_encode($pull_data));
}
function UpdatePersonalInfor($data)
{
    //   print_r($data); die;
    include "config/index.php";
    $user_id = $data->user_id;
    $first_name = $data->first_name;
    $last_name = $data->last_name;
    $email = $data->email;
    $phone_number =  $data->phone_number;
    $nationality =  $data->nationality;
    $gender = $data->gender;
    $address = $data->address;



    $query =  "UPDATE `endUsers` SET `first_name`='{$first_name}',`last_name`='{$last_name}',`email`='{$email}',`phone_number`='{$phone_number}',`nationality`='{$nationality}',`gender`='{$gender}',`address`='{$address}' WHERE `id` = {$user_id}";

    //   print_r($query);die;
    $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

    if ($User_re) {
        $arr = ["status" => 1, "message" => "User Details Successfully Updated "];
        exit(json_encode($arr));
    } else {
        $error_creating = ["Error" => "Invalid operation"];
        exit(json_encode($error_creating));
    }
}

function resetPassword()
{
    //   print_r($data); die;
    include "config/index.php";
    $user_id = $_GET['user_id'];
    $email = $_GET['email'];



    // Check if email exists in the database
    $row = sprintf("SELECT * FROM `endUsers` WHERE `id`= '{$user_id}'");

    $User_re = mysqli_query($alleybookingsConnection, $row) or die(mysqli_error($alleybookingsConnection));

    $row_User_re = mysqli_fetch_assoc($User_re);
    $totalRows_User_re = mysqli_num_rows($User_re);
    // print_r($row_User_re); die;
    if ($totalRows_User_re > 0) {
        if ($row_User_re['email'] == $email) {

            $mail = new PHPMailer(true);
            try {

                //Server settings
                $mail->SMTPDebug = 1;
                $mail->isSMTP();
                $mail->Host       = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'a3d7643a5e2648';
                $mail->Password   = '7a57e1373e5d6b';
                $mail->Port       = 2525;

                //Recipients
                $mail->setFrom('noreply@gmail.com', 'Mailer');
                $mail->addAddress($row_User_re['email'], 'Joe User');


                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                $body = '<p>To Change your Password, Goto <a href="https://alleyy.vercel.app/userprofile">Change Password</a>...</p>';

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                print_r('Message has been sent');
            } catch (Exception $e) {
                print_r("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        }
    } else {
        print_r("hello");
    }
}
function changePassword($data)
{
    //   print_r($data); die;
    include "config/index.php";
    $user_id = $data->user_id;
    $new_password = $data->new_password;
    $confirm_new_password = $data->confirm_new_password;

    if ($new_password == $confirm_new_password) {
        $query =  "UPDATE `endUsers` SET `password`='{$new_password}' WHERE `id` = {$user_id}";

        //   print_r($query);die;
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {
            $arr = ["status" => 1, "message" => "Password Successfully Updated"];
            exit(json_encode($arr));
        } else {
            $error_creating = ["Error" => "Invalid operation"];
            exit(json_encode($error_creating));
        }
    } else {
        $error_updating = ["Error" => "Comfirm Pasword not the same"];
        exit(json_encode($error_updating));
    }
}
function cancelHotelReservation($data)
{
    //   print_r($data); die;
    include "config/index.php";

    $row22 = "SELECT *  FROM `hotelReservation` WHERE `id`= '{$data}'";
    $result22 = mysqli_query($alleybookingsConnection, $row22) or die(mysqli_error($alleybookingsConnection));
    $row11 = mysqli_fetch_assoc($result22);
    $user_id = $row11['user_id'];
    // print_r($user_id); die;

    if ($row11 > 1) {

        //End User email for sending mail
        $query3 = "SELECT email FROM endUsers WHERE id = '$user_id'";
        $result = mysqli_query($alleybookingsConnection, $query3) or die(mysqli_error($alleybookingsConnection));
        $row3 = mysqli_fetch_assoc($result);
        $email = $row3["email"];
        // print_r($email); die;


        $query =  "UPDATE `hotelReservation` SET `status`='inactive' WHERE `id` = {$data}";

        //   print_r($query);die;
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {

            $mail = new PHPMailer(true);
            try {

                //Server settings
                $mail->SMTPDebug = 1;
                $mail->isSMTP();
                $mail->Host       = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'a3d7643a5e2648';
                $mail->Password   = '7a57e1373e5d6b';
                $mail->Port       = 2525;

                //Recipients
                $mail->setFrom('support@alleybookings.com', 'Mailer');
                $mail->addAddress($email, 'Joe User');


                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                $name = $row11['guest_name'];
                $body = '<p> Dear <strong>' . $name . ' </strong>Your Reservation Booking was Cancelled</p>';

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                // print_r('Message has been sent');
            } catch (Exception $e) {
                // print_r("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        } else {
            $error_creating = ["Error" => "Invalid operation"];
            exit(json_encode($error_creating));
        }
    } else {
        $error_creating = ["Error" => "No Data for this Record"];
        exit(json_encode($error_creating));
    }
}

function singleReservation($data)
{
    $pull_data = check_db_query_staus("SELECT * FROM `hotelReservation` WHERE `id`= '{$data}'", "CHK");
    exit(json_encode($pull_data));
}


// Admin section

// admin login
function adminLogin()
{
    include "config/index.php";
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query_User_re = sprintf("SELECT * FROM admin WHERE email='{$username}' || username='{$username}'");
    $User_re = mysqli_query($alleybookingsConnection, $query_User_re) or die(mysqli_error($alleybookingsConnection));
    $row_User_re = mysqli_fetch_assoc($User_re);
    $totalRows_User_re = mysqli_num_rows($User_re);
    if ($totalRows_User_re > 0) {
        if ($row_User_re['password'] == $password) {
            $arr = ['status' => 1, 'message' => 'Buzzing you in ðŸ˜Ž', 'email' => $row_User_re['email'], 'fullname' => $row_User_re['fullname']];
            exit(json_encode($arr));
        }
    } else {
        $arr = ['status' => 0, 'message' => 'Not a user, try registering again'];
        exit(json_encode($arr));
    }
}

// Hotel Listers User Management
function hotelListersUserManagement()
{
    $pull_data = check_db_query_staus1("SELECT * FROM `hotelListerUsers` ", "CHK");
    exit(json_encode($pull_data));
}

// Hotel Listers User deactivation
function deactivateHotelListersUser($data)
{
    include "config/index.php";


    $row22 = "SELECT *  FROM `hotelListerUsers` WHERE `id`= '{$data}'";
    $result22 = mysqli_query($alleybookingsConnection, $row22) or die(mysqli_error($alleybookingsConnection));
    $row11 = mysqli_fetch_assoc($result22);
    $owner = $row11['id'];
    // print_r($user_id); die;

    if ($row11 > 1) {

        // deactivate owner
        $query =  "UPDATE `hotelListerUsers` SET `status`='inactive' WHERE `id` = {$data}";
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {
            // deactivate property
            $query =  "UPDATE `hotelListerProperties` SET `status`='inactive' WHERE `owner_id` = {$owner}";
            $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));


            $arr = ["status" => 1, "message" => "Account has been deactivated Successfully together with the Properties"];
            exit(json_encode($arr));
        } else {
            $error_creating = ["Error" => "Invalid operation"];
            exit(json_encode($error_creating));
        }
    } else {
        print_r('no');
    }
}

// End Users Management
function endUserManagement()
{
    $pull_data = check_db_query_staus1("SELECT * FROM `endUsers` ", "CHK");
    exit(json_encode($pull_data));
}

// End Users deactivation
function deactivateEndUser($data)
{
    include "config/index.php";
    $row2 = check_db_query_staus1("SELECT * FROM `endUsers`  WHERE `id`= '{$data}' ", "CHK");
    // print_r($row2); die;
    if ($row2['status'] == 1) {
        $query =  "UPDATE `endUsers` SET `user_status`='inactive' WHERE `id` = {$data}";

        //   print_r($query);die;
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {
            $arr = ["status" => 1, "message" => "Account has been deactivated Successfully"];
            exit(json_encode($arr));
        } else {
            $error_creating = ["Error" => "Invalid operation"];
            exit(json_encode($error_creating));
        }
    } else {
        print_r('no');
    }
}
// Reservation Management
function hotelReservationManagement()
{
    $pull_data = check_db_query_staus1("SELECT * FROM `hotelReservation` ", "CHK");
    exit(json_encode($pull_data));
}

// End Users deactivation
function deactivateHotelReservation($data)
{
    include "config/index.php";
    $row2 = check_db_query_staus1("SELECT * FROM `hotelReservation`  WHERE `id`= '{$data}' ", "CHK");
    // print_r($row2); die;
    if ($row2['status'] == 1) {
        $query =  "UPDATE `hotelReservation` SET `status`='inactive' WHERE `id` = {$data}";

        //   print_r($query);die;
        $User_re = mysqli_query($alleybookingsConnection, $query) or die(mysqli_error($alleybookingsConnection));

        if ($User_re) {
            $arr = ["status" => 1, "message" => "Account has been deactivated Successfully"];
            exit(json_encode($arr));
        } else {
            $error_creating = ["Error" => "Invalid operation"];
            exit(json_encode($error_creating));
        }
    } else {
        print_r('no');
    }
}




// select all from user where created_at BETWEEN `` AND ``;
// SELECT SUM(score) as sum_score FROM game;/Applications/XAMPP/xamppfiles/htdocs/alleybookings/php/gate.php
