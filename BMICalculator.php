<?php
// Create function
function createDescription($array){
    $description = null;
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($i == 0) {
            $description = sprintf('<span>%s</span>', $array[$i]);
        } else {
            $description = $description . '<br/>' . $array[$i];
        }
    }
    return $description;
}

// Fire when trigger a submit button
if (!empty($_GET['height']) && (!empty($_GET['weight']))) {
    $height = $_GET['height'];
    $weight = $_GET['weight'];
    $bmi = $weight / ($height / 100) ** 2;
    $result['bmi'] = $bmi;

    if ($bmi < 18.5) {
        $result['description'][] = 'น้ำหนักน้อยเกินไป';
        $result['description'][] = 'ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม';
    } elseif ($bmi < 23.5) {
        $result['description'][] = 'น้ำหนักปกติ';
        $result['description'][] = 'และมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้';
    } elseif ($bmi < 28.5) {
        $result['description'][] = 'น้ำหนักเกิน';
        $result['description'][] = 'หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23';
    } elseif ($bmi < 35) {
        $result['description'][] = 'โรคอ้วนระดับ 1';
        $result['description'][] = 'และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย';
    } elseif ($bmi < 40) {
        $result['description'][] = 'โรคอ้วนระดับ 2';
        $result['description'][] = 'คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง';
    } else {
        $result['description'][] = 'โรคอ้วนขั้นสูงสุด';
    }
}

// Display results
$bmi_result = sprintf('%.2f', $result['bmi']);
$bmi_description = createDescription($result['description']);

echo '<p>'.$bmi_result.'</p>';
echo '<p>'.$bmi_description.'</p>';
?>