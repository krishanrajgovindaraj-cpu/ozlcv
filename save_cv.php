<?php
include 'db.php';

$name = $_POST['name'];
$rank = $_POST['rank'];
$email = $_POST['email'];
$number = $_POST['number'];
$cvDate = $_POST['cvDate'];
$remarks = $_POST['remarks'];

$fileName = $_FILES['cv']['name'];
$tmpName = $_FILES['cv']['tmp_name'];

$target = "uploads/" . time() . "_" . $fileName;
move_uploaded_file($tmpName, $target);

$stmt = $conn->prepare(
  "INSERT INTO cvss (name, rank, email, number, cv_date, remarks, file_path)
   VALUES (?,?,?,?,?,?,?)"
);
$stmt->bind_param("sssssss", $name, $rank, $email, $number, $cvDate, $remarks, $target);
$stmt->execute();

echo "success";
?>
