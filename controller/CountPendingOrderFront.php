<?php

require_once "../classes/dbh.classes.php";
require_once "../classes/OrderModel.php";

$OrderModel = new Order();

$customerid = $_GET['customerid'];

// Retrieve the timestamp of the last check from the request, or use a default timestamp
$lastCheckTimestamp = isset($_GET['lastCheck']) ? $_GET['lastCheck'] : '1970-01-01 00:00:00';

// Call the method to count new inserts
$PendingOrder = $OrderModel->CountPending($customerid);

// Return the count in JSON format
echo json_encode(['new_insert_count' => $PendingOrder]);

