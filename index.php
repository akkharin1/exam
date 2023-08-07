<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบขออนุญาตลาหยุด</title>
</head>
<body>
    <h1>แบบฟอร์มขออนุญาตลาหยุด</h1>

    <form action="process_leave_request.php" method="POST">
        <label for="name">ชื่อ - นามสกุล:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="position">สังกัด/ตำแหน่ง:</label>
        <input type="text" id="position" name="position"><br><br>

        <label for="email">อีเมล์:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="phone">เบอร์โทรศัพท์:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="leave_type">ประเภทการลา:</label>
        <select id="leave_type" name="leave_type" required>
            <option value="sick_leave">ลาป่วย</option>
            <option value="business_leave">ลากิจ</option>
            <option value="annual_leave">ลาพักร้อน</option>
            <option value="other">อื่นๆ</option>
        </select><br><br>

        <label for="reason">สาเหตุการลา:</label>
        <textarea id="reason" name="reason" required></textarea><br><br>

        <label for="start_date">วันที่ขอลา - ตั้งแต่:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">วันที่ขอลา - ถึง:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <input type="submit" value="ส่งคำขอ">
    </form>
</body>
</html>