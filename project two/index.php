<?php
/* =====================================================
   student_registration.php
   Create database + table first in MySQL:

   CREATE DATABASE student_db;

   USE student_db;

   CREATE TABLE students (
       id INT AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(100),
       last_name VARCHAR(100),
       dob DATE,
       email VARCHAR(150),
       mobile VARCHAR(20),
       gender VARCHAR(10),
       address TEXT,
       city VARCHAR(100),
       pin_code VARCHAR(20),
       state VARCHAR(100),
       country VARCHAR(100),
       hobbies VARCHAR(255),

       class_x_board VARCHAR(100),
       class_x_percentage DECIMAL(5,2),
       class_x_year VARCHAR(10),

       class_xii_board VARCHAR(100),
       class_xii_percentage DECIMAL(5,2),
       class_xii_year VARCHAR(10),

       graduation_board VARCHAR(100),
       graduation_percentage DECIMAL(5,2),
       graduation_year VARCHAR(10),

       masters_board VARCHAR(100),
       masters_percentage DECIMAL(5,2),
       masters_year VARCHAR(10),

       course_applied VARCHAR(100),
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
===================================================== */

/* ========= DATABASE CONNECTION ========= */
$conn = new mysqli("localhost", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

/* ========= SAVE DATA ========= */
$message = "";

if (isset($_POST['submit'])) {

    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name  = isset($_POST['last_name'])  ? $_POST['last_name']  : '';
    $day        = isset($_POST['day'])        ? $_POST['day']        : '01';
    $month      = isset($_POST['month'])      ? $_POST['month']      : '01';
    $year_val   = isset($_POST['year'])       ? $_POST['year']       : '2000';
    $dob        = $year_val . "-" . $month . "-" . $day;
    $email      = isset($_POST['email'])      ? $_POST['email']      : '';
    $mobile     = isset($_POST['mobile'])     ? $_POST['mobile']     : '';
    $gender     = isset($_POST['gender'])     ? $_POST['gender']     : '';
    $address    = isset($_POST['address'])    ? $_POST['address']    : '';
    $city       = isset($_POST['city'])       ? $_POST['city']       : '';
    $pin        = isset($_POST['pin'])        ? $_POST['pin']        : '';
    $state      = isset($_POST['state'])      ? $_POST['state']      : '';
    $country    = isset($_POST['country'])    ? $_POST['country']    : '';

    $hobbies = '';
    if (isset($_POST['hobbies']) && is_array($_POST['hobbies'])) {
        $hobbies = implode(", ", $_POST['hobbies']);
    }

    $x_board   = isset($_POST['board1']) ? $_POST['board1'] : '';
    $x_per     = isset($_POST['per1'])   ? $_POST['per1']   : '';
    $x_year    = isset($_POST['year1'])  ? $_POST['year1']  : '';

    $xii_board = isset($_POST['board2']) ? $_POST['board2'] : '';
    $xii_per   = isset($_POST['per2'])   ? $_POST['per2']   : '';
    $xii_year  = isset($_POST['year2'])  ? $_POST['year2']  : '';

    $g_board   = isset($_POST['board3']) ? $_POST['board3'] : '';
    $g_per     = isset($_POST['per3'])   ? $_POST['per3']   : '';
    $g_year    = isset($_POST['year3'])  ? $_POST['year3']  : '';

    $m_board   = isset($_POST['board4']) ? $_POST['board4'] : '';
    $m_per     = isset($_POST['per4'])   ? $_POST['per4']   : '';
    $m_year    = isset($_POST['year4'])  ? $_POST['year4']  : '';

    $course    = isset($_POST['course']) ? $_POST['course'] : '';

    $stmt = $conn->prepare("INSERT INTO students(
        first_name, last_name, dob, email, mobile, gender,
        address, city, pin_code, state, country, hobbies,
        class_x_board, class_x_percentage, class_x_year,
        class_xii_board, class_xii_percentage, class_xii_year,
        graduation_board, graduation_percentage, graduation_year,
        masters_board, masters_percentage, masters_year,
        course_applied
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param(
        "sssssssssssssssssssssssss",
        $first_name, $last_name, $dob, $email, $mobile, $gender,
        $address, $city, $pin, $state, $country, $hobbies,
        $x_board, $x_per, $x_year,
        $xii_board, $xii_per, $xii_year,
        $g_board, $g_per, $g_year,
        $m_board, $m_per, $m_year,
        $course
    );

    if ($stmt->execute()) {
        $message = "<p style='color:green;text-align:center;font-weight:bold;'>Registration Successful!</p>";
    } else {
        $message = "<p style='color:red;text-align:center;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Form</title>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background: #c8c8c8;
    font-family: "Times New Roman", Times, serif;
    font-size: 14px;
    padding: 20px 0;
}

.page-wrapper {
    width: 780px;
    margin: 0 auto;
    background: #ffffff;
    padding: 25px 40px 30px 40px;
    border: 1px solid #aaa;
}

h2 {
    text-align: center;
    font-size: 17px;
    font-weight: bold;
    letter-spacing: 1.5px;
    margin-bottom: 18px;
    font-family: "Times New Roman", Times, serif;
    text-transform: uppercase;
}

/* ---- MAIN FORM TABLE ---- */
.main-table {
    width: 100%;
    border-collapse: collapse;
}

.main-table td {
    padding: 4px 4px;
    vertical-align: middle;
    font-size: 13px;
}

.main-table td:first-child {
    width: 160px;
    font-weight: bold;
    letter-spacing: 0.5px;
    white-space: nowrap;
    vertical-align: top;
    padding-top: 6px;
}

/* ---- INPUTS ---- */
input[type="text"],
input[type="email"] {
    border: 1px solid #555;
    height: 20px;
    font-size: 13px;
    font-family: "Times New Roman", Times, serif;
    padding: 1px 3px;
    width: 190px;
    background: #fff;
    outline: none;
}

textarea {
    border: 1px solid #555;
    font-size: 13px;
    font-family: "Times New Roman", Times, serif;
    padding: 2px 3px;
    width: 240px;
    height: 60px;
    resize: none;
    background: #fff;
    outline: none;
    display: block;
}

select {
    border: 1px solid #555;
    height: 20px;
    font-size: 13px;
    font-family: "Times New Roman", Times, serif;
    background: #fff;
    padding: 0 2px;
    outline: none;
}

select.sel-day   { width: 65px; }
select.sel-month { width: 80px; }
select.sel-year  { width: 72px; }
select.sel-country { width: 130px; }

input[type="radio"],
input[type="checkbox"] {
    margin: 0 2px 0 5px;
    vertical-align: middle;
    cursor: pointer;
}

/* ---- HOBBIES ROW ---- */
.hobbies-cell {
    padding-top: 5px;
}

.hobbies-cell label {
    font-weight: normal;
    margin-right: 2px;
}

.hobby-other-text {
    width: 130px !important;
    margin-left: 3px;
}

/* ---- QUALIFICATION TABLE ---- */
.qual-section {
    margin-top: 18px;
    margin-bottom: 10px;
}

.qual-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

.qual-table td,
.qual-table th {
    padding: 3px 5px;
    vertical-align: middle;
    font-family: "Times New Roman", Times, serif;
}

.qual-table thead tr {
    font-weight: bold;
}

.qual-table thead td {
    font-weight: bold;
    font-size: 13px;
    padding-bottom: 5px;
}

.qual-label-cell {
    width: 120px;
    font-weight: bold;
    font-size: 13px;
    vertical-align: top;
    padding-top: 6px;
}

.qual-table input[type="text"] {
    width: 135px;
    height: 20px;
}

.qual-hint {
    font-size: 12px;
    text-align: center;
    color: #333;
    padding-top: 2px;
}

/* ---- COURSES SECTION ---- */
.courses-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.courses-table td {
    padding: 4px 4px;
    font-size: 13px;
    vertical-align: middle;
}

.courses-table td:first-child {
    width: 160px;
    font-weight: bold;
    vertical-align: top;
    padding-top: 5px;
}

.courses-table label {
    font-weight: normal;
    margin-right: 2px;
}

/* ---- BUTTONS ---- */
.btns {
    text-align: center;
    margin-top: 18px;
}

.btns button {
    padding: 3px 14px;
    font-size: 13px;
    font-family: "Times New Roman", Times, serif;
    margin: 0 4px;
    cursor: pointer;
    background: #f0f0f0;
    border: 1px solid #888;
}

.btns button:hover {
    background: #e0e0e0;
}
</style>
</head>
<body>

<div class="page-wrapper">

    <h2>Student Registration Form</h2>

    <?php echo $message; ?>

    <form method="POST" action="">

        <!-- PERSONAL DETAILS TABLE -->
        <table class="main-table">

            <tr>
                <td>FIRST NAME</td>
                <td><input type="text" name="first_name"></td>
            </tr>

            <tr>
                <td>LAST NAME</td>
                <td><input type="text" name="last_name"></td>
            </tr>

            <tr>
                <td>DATE OF BIRTH</td>
                <td>
                    <select class="sel-day" name="day">
                        <option value="">Day &#9660;</option>
                        <?php for($i=1;$i<=31;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="sel-month" name="month">
                        <option value="">Month &#9660;</option>
                        <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="sel-year" name="year">
                        <option value="">Year &#9660;</option>
                        <?php for($i=1990;$i<=2025;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>EMAIL ID</td>
                <td><input type="email" name="email"></td>
            </tr>

            <tr>
                <td>MOBILE NUMBER</td>
                <td><input type="text" name="mobile"></td>
            </tr>

            <tr>
                <td>GENDER</td>
                <td>
                    Male <input type="radio" name="gender" value="Male">
                    &nbsp;&nbsp;Female <input type="radio" name="gender" value="Female">
                </td>
            </tr>

            <tr>
                <td style="vertical-align:top; padding-top:6px;">ADDRESS</td>
                <td><textarea name="address"></textarea></td>
            </tr>

            <tr>
                <td>CITY</td>
                <td><input type="text" name="city"></td>
            </tr>

            <tr>
                <td>PIN CODE</td>
                <td><input type="text" name="pin"></td>
            </tr>

            <tr>
                <td>STATE</td>
                <td><input type="text" name="state"></td>
            </tr>

            <tr>
                <td>COUNTRY</td>
                <td>
                    <select class="sel-country" name="country">
                        <option>India</option>
                        <option>Rwanda</option>
                        <option>Uganda</option>
                        <option>Kenya</option>
                        <option>Tanzania</option>
                        <option>USA</option>
                        <option>UK</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="vertical-align:top; padding-top:6px;">HOBBIES</td>
                <td class="hobbies-cell">
                    Drawing <input type="checkbox" name="hobbies[]" value="Drawing">
                    Singing <input type="checkbox" name="hobbies[]" value="Singing">
                    Dancing <input type="checkbox" name="hobbies[]" value="Dancing">
                    Sketching <input type="checkbox" name="hobbies[]" value="Sketching">
                    <br>
                    Others <input type="checkbox" name="hobbies[]" value="Others">
                    <input type="text" class="hobby-other-text" name="hobbies_other">
                </td>
            </tr>

        </table>

        <!-- QUALIFICATION TABLE -->
        <div class="qual-section">
            <table class="qual-table">
                <thead>
                    <tr>
                        <td class="qual-label-cell">QUALIFICATION</td>
                        <td style="width:40px;">Sl.No.</td>
                        <td style="width:110px;">Examination</td>
                        <td style="width:150px;">Board</td>
                        <td style="width:140px;">Percentage</td>
                        <td>Year of Passing</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="qual-label-cell"></td>
                        <td>1</td>
                        <td>Class X</td>
                        <td><input type="text" name="board1"></td>
                        <td><input type="text" name="per1"></td>
                        <td><input type="text" name="year1"></td>
                    </tr>
                    <tr>
                        <td class="qual-label-cell"></td>
                        <td>2</td>
                        <td>Class XII</td>
                        <td><input type="text" name="board2"></td>
                        <td><input type="text" name="per2"></td>
                        <td><input type="text" name="year2"></td>
                    </tr>
                    <tr>
                        <td class="qual-label-cell"></td>
                        <td>3</td>
                        <td>Graduation</td>
                        <td><input type="text" name="board3"></td>
                        <td><input type="text" name="per3"></td>
                        <td><input type="text" name="year3"></td>
                    </tr>
                    <tr>
                        <td class="qual-label-cell"></td>
                        <td>4</td>
                        <td>Masters</td>
                        <td><input type="text" name="board4"></td>
                        <td><input type="text" name="per4"></td>
                        <td><input type="text" name="year4"></td>
                    </tr>
                    <tr>
                        <td class="qual-label-cell"></td>
                        <td></td>
                        <td></td>
                        <td class="qual-hint">(10 char max)</td>
                        <td class="qual-hint">(upto 2 decimal)</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- COURSES TABLE -->
        <table class="courses-table">
            <tr>
                <td>COURSES<br>APPLIED FOR</td>
                <td>
                    BCA <input type="radio" name="course" value="BCA">
                    &nbsp;B.Com <input type="radio" name="course" value="B.Com">
                    &nbsp;B.Sc <input type="radio" name="course" value="B.Sc">
                    &nbsp;B.A <input type="radio" name="course" value="B.A">
                </td>
            </tr>
        </table>

        <!-- BUTTONS -->
        <div class="btns">
            <button type="submit" name="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>

    </form>
</div>

</body>
</html>