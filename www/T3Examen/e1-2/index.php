<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=classicmodels', 'root', 'test'));

Flight::route('GET /customers', function () {
    Flight::request()->query["customerNumber"];
    $stmt = Flight::db()->prepare("SELECT * FROM customers");
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});

Flight::route('GET /customers/@customerNumber', function ($customerNumber) {
    $stmt = Flight::db()->prepare("SELECT * FROM customers WHERE customerNumber=?");
    $stmt->bindParam(1, $customerNumber);
    $stmt->execute();
    $datos = $stmt->fetch();
    Flight::json($datos);
});


Flight::route('POST /customers', function () {

    $customerNumber =  Flight::request()->data->customerNumber;
    $customerName =  Flight::request()->data->customerName;
    $contactLastName =  Flight::request()->data->contactLastName;
    $contactFirstName = Flight::request()->data->contactFirstName;
    $phone = Flight::request()->data->phone;
    $addressLine1 =  Flight::request()->data->addressLine1;
    $addressLine2 = Flight::request()->data->addressLine2;
    $city = Flight::request()->data->city;
    $state = Flight::request()->data->state;
    $postalCode = Flight::request()->data->postalCode;
    $country = Flight::request()->data->country;
    $salesRepEmployeeNumber = Flight::request()->data->salesRepEmployeeNumber;
    $country = Flight::request()->data->country;

    $sql = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit)
    VALUES (:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)";

    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':customerNumber', $customerNumber);
    $stmt->bindParam(':customerName', $customerName);
    $stmt->bindParam(':contactLastName', $contactLastName);
    $stmt->bindParam(':contactFirstName', $contactFirstName);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':addressLine1', $addressLine1);
    $stmt->bindParam(':addressLine2', $addressLine2);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':postalCode', $postalCode);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':salesRepEmployeeNumber', $salesRepEmployeeNumber);
    $stmt->bindParam(':creditLimit', $creditLimit);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Custumer agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el custumer."]);
    }


    /*
{
  "customerNumber": "001",
  "customerName": "Dragon Souveniers, Ltd.",
  "contactLastName": "Natividad",
  "contactFirstName": "Eric",
  "phone": "+65 221 7555",
  "addressLine1": "Bronz Sok.",
  "addressLine2": "Bronz Apt. 3/6 Tesvikiye",
  "city": "Singapore",
  "state": null,
  "postalCode": "079903",
  "country": "Singapore",
  "salesRepEmployeeNumber": "1621",
  "creditLimit": "103800.00"
}


    */

});

Flight::route('DELETE /customers', function () {
    $customerNumber =  Flight::request()->data->customerNumber;
    $sql  = "DELETE FROM customers WHERE customerNumber=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $customerNumber);
    $stmt->execute();

    Flight::jsonp(["Custumer eliminado correctamente."]);
});


Flight::route('PUT /customers', function () {
    $customerNumber =  Flight::request()->data->customerNumber;
    $phone =  Flight::request()->data->phone;

    $sql = "UPDATE customers SET phone=? WHERE customerNumber=?";

    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(1, $phone);
    $stmt->bindParam(2, $customerNumber);

    $stmt->execute();

    Flight::jsonp(["Customer actualizado correctamente."]);

    /*

    {
    "customerNumber": "001",
    "phone": "+15 000 00000"
    }

    */
});

Flight::start();
