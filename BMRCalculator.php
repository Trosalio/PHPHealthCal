<?php
// Fire when trigger a submit button
if (!empty($_GET['gender']) && !empty($_GET['height']) && (!empty($_GET['weight'])) && !empty($_GET['age']) && !empty($_GET['activity'])) {
    $gender = $_GET['gender'];
    $height = $_GET['height'];
    $weight = $_GET['weight'];
    $age = $_GET['age'];
    $activity = $_GET['activity'];
    if ($_GET['gender'] === 'M') {
        $bmr = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
    } else {
        $bmr = 665 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
    }
    $tdee = $bmr * $activity;
}

// Display results
$bmr_result = sprintf('%.0f', round($bmr));
$tdee_result = sprintf('%.0f', round($tdee));

echo '<p>BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิต <span>' . $bmr_result . '</span> กิโลแคลอรี่</p>';
echo '<p>TDEE (Total Daily Energy Expenditure) พลังงานที่คุณใช้ในแต่ละวัน <span>' . $tdee_result . '</span> กิโลแคลอรี่</p>';
?>