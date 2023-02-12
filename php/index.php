<?php

declare(strict_types=1);
header('Content-type:application/json;charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'gate.php';
    if (isset($_GET['login'])) {
        $username = (string) $_GET['email'];
        $password = (string) $_GET['password'];
        login($username, $password);
    }   elseif (isset($_GET['createEndUser'])) {
        createUser();
    }   elseif (isset($_GET['reservationDetail'])) {;
        reservationDetail($_GET);
    }   elseif (isset($_GET['singleHotelReservation'])) {
        singleHotelReservation($_GET['property_id']);
    }   elseif (isset($_GET['singleUserReservation'])) {
        singleUserReservation($_GET['id']);
    }   elseif (isset($_GET['HotelReservationStatement'])) {
        HotelReservationStatement($_GET);
    }   elseif (isset($_GET['getAllRoom'])) {
        getAllRoom($_GET['hotelListerPropertiesId']);
    }   elseif (isset($_GET['getSingleRoom'])) {
        getSingleRoom($_GET['id']);
    }   elseif (isset($_GET['getAllRoomType'])) {
        getAllRoomType($_GET['hotelListerPropertiesId']);
    }   elseif (isset($_GET['reservationGrossRevenue'])) {
        reservationGrossRevenue($_GET['property_id']);
    }   elseif (isset($_GET['reservationCommision'])) {
        reservationCommision($_GET['property_id']);
    }   elseif (isset($_GET['VATDetails'])) {
        VATDetails($_GET);
    } elseif (isset($_GET['searchFiltering'])) {
        searchFiltering($_GET);
    } elseif (isset($_GET['roomsInAHotel'])) {
        roomsInAHotel($_GET['property_id']);
    } elseif (isset($_GET['generalRoomAmenities'])) {
        generalRoomAmenities($_GET['property_id']);
    } elseif (isset($_GET['propertiesPhotos'])) {
        propertiesPhotos($_GET['property_id']);
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
        } elseif ($data['endpoint'] == "hotelGeneralRoomAmenities") {
            // hotelGeneralRoomAmenities($data['data']);
            // print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelGeneralNotification") {
            // hotelGeneralRoomAmenities($data['data']);
            // print_r($data['data']);
        }  elseif ($data['endpoint'] == "hotelOpenAndCloseRoom") {
            hotelOpenAndCloseRoom($data['data']);
            // print_r($data['data']);
        }  elseif ($data['endpoint'] == "newsletter") {
            newsletter($data['data']);
            // print_r($data['data']);
        }  elseif ($data['endpoint'] == "copyYearlyRate") {
            copyYearlyRate($data['data']);
             //print_r($data['data']);
        } elseif ($data['endpoint'] == "insertRoomDetails") {
            insertRoomDetails($data['data']);
             //print_r($data['data']);
        } elseif ($data['endpoint'] == "propertyRoomAndOtherDiscription") {
            propertyRoomAndOtherDescription($data['data']);
             //print_r($data['data']);
        } elseif ($data['endpoint'] == "invoice") {
            invoice($data['data']);
             //print_r($data['data']);
        } elseif ($data['endpoint'] == "hotelListerAgent") {
            hotelListerAgent($data['data']);
             //print_r($data['data']);
        } elseif ($data['endpoint'] == "healthAndSafety") {
            healthAndSafety($data['data']);
             //print_r($data['data']);
        } 
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
        }
    }
}
