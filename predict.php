<?php
$temp = floatval($_GET['temp']);
$humidity = floatval($_GET['humidity']);
$pH = floatval($_GET['pH']);
$rain = floatval($_GET['rain']);
$command = 'python Crop_pred.py '  . escapeshellarg($temp) . ' ' . escapeshellarg($humidity) . ' ' . escapeshellarg($pH) . ' ' . escapeshellarg($rain);
$output = shell_exec($command);
echo $output;
?>