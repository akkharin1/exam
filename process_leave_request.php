<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost"; // หรือชื่อโฮสต์ของเซิร์ฟเวอร์ MySQL
$username = "root";
$password = "";
$database = "test";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo"ได้";
}

//ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ดึงข้อมูลจากฟอร์ม
    $name = $_POST["name"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $leave_type = $_POST["leave_type"];
    $reason = $_POST["reason"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

     // ตรวจสอบความถูกต้องของคำขอลา
     $errors = [];

     // ตรวจสอบว่ามีชื่อ - นามสกุล
     if (empty($name)) {
         $errors[] = "กรุณากรอกชื่อ - นามสกุล";
     }

     // ตรวจสอบว่ามีเบอร์โทรศัพท์
     if (empty($phone)) {
         $errors[] = "กรุณากรอกเบอร์โทรศัพท์";
     }

     // ตรวจสอบว่ามีประเภทการลา
     if (empty($leave_type)) {
         $errors[] = "ประเภทการลาจำเป็นต้องระบุ";
     }

     // ตรวจสอบวันที่เริ่มต้นและวันที่สิ้นสุดว่าถูกต้อง
    $leave_duration = strtotime($end_date) - strtotime($start_date);
    $allowed_duration = 2 * 24 * 60 * 60; // 2 วันในหน่วยเวลาวินาที
    if ($leave_type == "annual_leave" && $leave_duration > $allowed_duration) {
        $errors[] = "ลาพักร้อนไม่สามารถเกิน 2 วันได้";
    }

    // ตรวจสอบว่าคำขอลาไม่อยู่ในอดีต
    if (strtotime($start_date) < time()) {
        $errors[] = "คำขอลาไม่สามารถอยู่ในอดีตได้";
    }

    // ถ้ามีข้อผิดพลาด แสดงข้อความผิดพลาด
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>ข้อผิดพลาด: $error</p>";
        }
    } else {
        // บันทึกคำขอลาลงในฐานข้อมูล (โค้ดที่ไม่ได้แสดง)
        echo "<p>ส่งคำขอลาเรียบร้อยแล้ว!</p>";
    }
}



