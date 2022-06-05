<?php
include '../includes/config.php';
$output = '';


$output .= '
<table class="table" bordered="1">
<tr>
<th>Full Name</th>
<th>Address Mail</th>
<th>Department Name</th>
<th>Start Job</th>
<th>Phone Number</th>
<th>Date Of Birth</th>
<th>Salary</th>
<th>Address</th>
</tr> 
';
$teacher_query = "";
if (isset($_POST['export_staffs'])) {
    $teacher_query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where role != 'Head' ORDER BY tblemployees.emp_id");
}
if (isset($_POST['export_heads'])) {
    $teacher_query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where role != 'Staff' ORDER BY tblemployees.emp_id");
}
while ($row = mysqli_fetch_array($teacher_query)) {

    $id = $row['emp_id'];

    $output .= '
            <tr>
            <th>' . $row['FirstName'] . ' ' . $row['LastName'] . '</th>
            <th>' . $row['EmailId'] . '</th>
            <th>' . $row['DepartmentName'] . '</th>
            <th>' . $row['start_job'] . '</th>
            <th>' . $row['Phonenumber'] . '</th>
            <th>' . $row['Dob'] . '</th>
            <th>' . $row['salary'] . '</th>
            <th>' . $row['Address'] . '</th>
            </tr> ';
}

$output .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=staffs.xls');
echo $output;
