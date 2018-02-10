<?php
// Create function
function createDescription($value, $description){
    $description = sprintf("%.2f - %s", $value, $description);
    return $description;
}

// Fire when trigger a submit button
if (!empty($_GET['ldl']) && !empty($_GET['hdl']) && (!empty($_GET['tg']))) {
    $ldl['value'] = $_GET['ldl'];
    $hdl['value'] = $_GET['hdl'];
    $tg['value'] = $_GET['tg'];
    $total_cal['value'] = $ldl['value'] + $hdl['value'] + ($tg['value'] / 5);

    // find description for LDL
    if ($ldl['value'] < 100) {
        $ldl['description'] = 'ไขมันแอลดีแอลต่ำ';
    } elseif ($ldl['value'] < 130) {
        $ldl['description'] = 'ไขมันแอลดีแอลสูงเล็กน้อย';
    } elseif ($ldl['value'] < 160) {
        $ldl['description'] = 'ไขมันแอลดีแอลค่อนข้างสูง';
    } elseif ($ldl['value'] < 190) {
        $ldl['description'] = 'ไขมันแอลดีแอลสูง';
    } else {
        $ldl['description'] = 'ไขมันแอลดีแอลสูงมาก';
    }
    // find description for HDL
    if ($hdl['value'] > 60) {
        $hdl['description'] = 'ดีมาก';
    } elseif ($hdl['value'] > 40) {
        $hdl['description'] = 'ค่อนข้างเสี่ยงที่จะเป็นโรคหัวใจ';
    } else {
        $hdl['description'] = 'มีความเสี่ยงสูงที่จะเป็นโรคหัวใจ';
    }
    // find description for Triglycerides
    if ($tg['value'] < 150) {
        $tg['description'] = 'ดีมาก';
    } elseif ($tg['value'] < 200) {
        $tg['description'] = 'สูงเล็กน้อย';
    } elseif ($tg['value'] < 500) {
        $tg['description'] = 'สูง';
    } else {
        $tg['description'] = 'สูงมาก';
    }
    // find description for Total cholesterol
    if ($total_cal['value'] < 200) {
        $total_cal['description'] = 'ดีมาก';
    } elseif ($total_cal['value'] < 240) {
        $total_cal['description'] = 'ค่อนข้างสูง';
    } else {
        $total_cal['description'] = 'สูง';
    }
}

// Display results
$tc_result = sprintf('%.0f', round($total_cal['value']));

echo '<p>ค่าคอเลสเตอรอลรวมของคุณคือ <span>' . $tc_result . '</span> มิลลิกรัมต่อเดซิลิตร</p>';
echo '<p>LDL: ' . createDescription($ldl['value'], $ldl['description']) . '</p>';
echo '<p>HDL: ' . createDescription($hdl['value'], $hdl['description']) . '</p>';
echo '<p>Triglycerides: ' . createDescription($tg['value'], $tg['description']) . '</p>';
echo '<p>Total cholesterol: ' . createDescription($total_cal['value'], $total_cal['description']) . '</p>';
?>