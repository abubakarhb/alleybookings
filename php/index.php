<?php

declare(strict_types=1);
header('Content-type:application/json;charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'gate.php';
    if (isset($_GET['login'])) {
        $username = (string) $_GET['email'];
        $password = (string) $_GET['password'];
        login($username, $password);
    } elseif (isset($_GET['loginLister'])) {
        $username = (string) $_GET['email'];
        $password = (string) $_GET['password'];
        loginLister($username, $password);
    } elseif (isset($_GET['createEndUser'])) {
        createUser();
    } elseif (isset($_GET['reservationDetail'])) {;
        reservationDetail($_GET);
    } elseif (isset($_GET['singleHotelReservation'])) {
        singleHotelReservation($_GET['property_id']);
    } elseif (isset($_GET['singleUserReservation'])) {
        singleUserReservation($_GET['user_id']);
    } elseif (isset($_GET['HotelReservationStatement'])) {
        HotelReservationStatement($_GET);
    } elseif (isset($_GET['getAllRoom'])) {
        getAllRoom($_GET['hotelListerPropertiesId']);
    } elseif (isset($_GET['getSingleRoom'])) {
        getSingleRoom($_GET['id']);
    } elseif (isset($_GET['getAllRoomType'])) {
        getAllRoomType($_GET['hotelListerPropertiesId']);
    } elseif (isset($_GET['reservationGrossRevenue'])) {
        reservationGrossRevenue($_GET['property_id']);
    } elseif (isset($_GET['reservationCommision'])) {
        reservationCommision($_GET['property_id']);
    } elseif (isset($_GET['VATDetails'])) {
        VATDetails($_GET);
    } elseif (isset($_GET['searchFiltering'])) {
        searchFiltering($_GET);
    } elseif (isset($_GET['roomsInAHotel'])) {
        roomsInAHotel($_GET['property_id']);
    }elseif (isset($_GET['propertyDiscounts'])) {
        getDiscount($_GET['property_id']);
    } elseif (isset($_GET['generalRoomAmenities'])) {
        generalRoomAmenities($_GET['property_id']);
    } elseif (isset($_GET['generalHotelFacilities'])) {
        generalHotelFacilities($_GET['property_id']);
    } elseif (isset($_GET['propertiesPhotos'])) {
        propertiesPhotos($_GET['property_id']);
    } elseif (isset($_GET['otherPropertyDescription'])) {
        otherPropertyDescription($_GET['property_id']);
    } elseif (isset($_GET['getRatingsAndReviews'])) {
        getRatingsAndReviews($_GET['property_id']);
    } elseif (isset($_GET['facilitiesServices'])) {
        facilitiesServices($_GET['property_id']);
    } elseif (isset($_GET['policies'])) {
        policies($_GET['property_id']);
    } elseif (isset($_GET['resetPassword'])) {
        resetPassword($_GET);
    } elseif (isset($_GET['getInvoice'])) {
        getInvoice($_GET);
    } elseif (isset($_GET['cancelHotelReservation'])) {
        cancelHotelReservation($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['singleReservation'])) {
        singleReservation($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['adminLogin'])) {
        adminLogin($_GET);
        // print_r($data['data']);
    } elseif (isset($_GET['hotelListersUserManagement'])) {
        hotelListersUserManagement($_GET);
        // print_r($data['data']);
    } elseif (isset($_GET['deactivateHotelListersUser'])) {
        deactivateHotelListersUser($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['endUserManagement'])) {
        endUserManagement($_GET);
        // print_r($data['data']);
    } elseif (isset($_GET['deactivateEndUser'])) {
        deactivateEndUser($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['hotelReservationManagement'])) {
        hotelReservationManagement($_GET);
        // print_r($data['data']);
    } elseif (isset($_GET['singleUserInfor'])) {
        singleUserInfor($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['fetchSingleCardDetail'])) {
        fetchSingleCardDetail($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['fetchCardDetail'])) {
        fetchCardDetail($_GET['user_id']);
        // print_r($data['data']);
    } elseif (isset($_GET['deleteCardDetail'])) {
        deleteCardDetail($_GET['id']);
        // print_r($data['data']);
    } elseif (isset($_GET['getAllHotelListerAgent'])) {
        getAllHotelListerAgent($_GET);
        // print_r($data['data']);
    } elseif (isset($_GET['getHotelListerAgent'])) {
        getHotelListerAgent($_GET['property_id']);
    } elseif (isset($_GET['sendMail'])) {
        sendEmail($_GET);
    } elseif (isset($_GET['getuserPrefrences'])) {
        getuserPrefrences($_GET['user_id']);
    } elseif (isset($_GET['getHotelBasicDetails'])) {
        getHotelBasicDetails($_GET['property_id']);
        // print_r($_GET);
    } elseif (isset($_GET['reservationCount'])) {
        reservationCount($_GET['property_id']);
    } elseif (isset($_GET['cancelReservationCount'])) {
        cancelReservationCount($_GET['property_id']);
    } elseif (isset($_GET['allReviewsCount'])) {
        allReviewsCount($_GET['property_id']);
    } elseif (isset($_GET['queuedReviewsCount'])) {
        queuedReviewsCount($_GET['property_id']);
    } elseif (isset($_GET['queriedReviewsCount'])) {
        queriedReviewsCount($_GET['property_id']);
    } elseif (isset($_GET['invoiceCount'])) {
        invoiceCount($_GET);
    } elseif (isset($_GET['getDescription'])) {
        getDescription($_GET['property_id']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'gate.php';
    $entityBody = file_get_contents('php://input');
    // price_update_add($entityBody);
    if (!empty($entityBody)) {
        $data = (array) json_decode($entityBody);
        if ($data['endpoint'] == "HotelListerUser") {
            hotelListerUserCall001($data['data']);
        } elseif ($data['endpoint'] == "CreateHotelPropertyDetails") {
            CreateHotelPropertyDetails($data['data']);
            print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelNotification") {
            hotelNotification($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelGeneralNotification") {
            // hotelGeneralRoomAmenities($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelOpenAndCloseRoom") {
            hotelOpenAndCloseRoom($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "newsletter") {
            newsletter($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "copyYearlyRate") {
            copyYearlyRate($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "insertRoomDetails") {
            insertRoomDetails($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "propertyRoomAndOtherDiscription") {
            propertyRoomAndOtherDescription($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "InsertRoomAmenities") {
            InsertRoomAmenities($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "invoice") {
            invoice($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelListerAgent") {
            hotelListerAgent($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "healthAndSafety") {
            healthAndSafety($data['data']);
            //print_r($data['data']);
        } elseif ($data['endpoint'] == "addRatingsAndReviews") {
            addRatingsAndReviews($data['data']);
            //  print_r($data['data']);
        } elseif ($data['endpoint'] == "createCardDetail") {
            createCardDetail($data['data']);
            //  print_r($data['data']);
        } elseif ($data['endpoint'] == "createUserPrefrences") {
            createUserPrefrences($data['data']);
            //  print_r($data['data']);
        } elseif ($data['endpoint'] == "CreateHotelRoomTypeDiscount") {
            createDiscount($data['data']);
            //  print_r($data['data']);
        }

        //Form encoded Data
        elseif (isset($_POST['updatePolicy'])) {
            patchPolicy($_POST);
            // print_r($_POST);
        }
    } elseif (isset($_POST['updatePolicy'])) {
        patchPolicy($_POST);
        // print_r($_POST);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    include 'gate.php';
    $entityBody = file_get_contents('php://input');
    // price_update_add($entityBody);
    if (!empty($entityBody)) {
        $data = (array) json_decode($entityBody);
        if ($data['endpoint'] == "UpdateHotelHostType") {
            updateHotelHostType($data['data']);
        } elseif ($data['endpoint'] == "UpdateHotelPhotos") {
            updateHotelPhotos($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdateHotelPolicies") {
            updateHotelPolicies($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdateHotelMoreFacilities") {
            updateHotelMoreFacilities($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdateSingleRoom") {
            updateSingleRoom($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdatePersonalInfor") {
            updatePersonalInfor($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "changePassword") {
            changePassword($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdateCardDetail") {
            UpdateCardDetail($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "updateHotelListerAgent") {
            updateHotelListerAgent($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "updateUserPrefrences") {
            updateUserPrefrences($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "UpdatePropertyAgent") {
            UpdatePropertyAgent($data['data']);
            // print_r($data['data']);
        }
        // elseif ($data['endpoint'] == "UpdateRoomAmenities") {
        //     UpdateRoomAmenities($data['data']);
        //     //print_r($data['data']);
        // }
    }
}
