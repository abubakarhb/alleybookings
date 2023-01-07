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
    } elseif (isset($_GET['createEndUser'])) {
        createUser();
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
            // print_r($data['data']);
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
        }
    }
}
