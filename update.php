<!-- update record -->
<?php
$conn = mysqli_connect("localhost", "root", "", "abc_company");
$id = $_GET['updateid'];

$sql = "SELECT * FROM staffs WHERE staff_ID='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); // get queary as array

$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$number = $row['phone_no'];
$active = $row['active'];

if (isset($_POST['submit'])) {
    $sid = $_POST['staffid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $active = $_POST['active'];

    $sql = "UPDATE staffs
            SET staff_ID='$sid', first_name='$fname', last_name='$lname', email='$email', phone_no='$number', active='$active'
            WHERE staff_ID='$id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:records.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Company</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="rcd position-absolute mx-5">
        <a href="records.php" class="btn btn-primary">Staff Records</a>
    </div>

    <div class="container wrapper">

        <form action="" method="POST" id="form">

            <h2 class="w-100 text-center mb-4">Staff Details Form</h2>

            <!-- id -->
            <div class="mb-3">
                <label for="staffid" class="form-label">Staff ID</label>
                <input type="number" value="<?php echo $id; ?>" class="form-control" name="staffid" id="staffid" placeholder="Example : 12345"
                    required>
            </div>

            <!-- name -->
            <div class="mb-3">
                <label for="" class="form-label">Full Name</label>
                <div class="row">
                    <div class="col">
                      <input type="text" value="<?php echo $fname; ?>" name="fname" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col">
                      <input type="text" value="<?php echo $lname; ?>" name="lname" class="form-control" placeholder="Last name" required>
                    </div>
                  </div>
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value="<?php echo $email; ?>" class="form-control" name="email" id="email" placeholder="hello@example.com"
                    required>
            </div>

            <!-- phone number -->
            <div class="mb-3">
                <label for="number" class="form-label">Phone Number</label>
                <input type="tel" value="<?php echo $number; ?>" class="form-control" id="number" name="number" placeholder="0712346789" required>
            </div>

            <!-- active -->
            <div class="mb-3">
                <label for="active" class="form-label">Active</label>
                <input type="text" value="<?php echo $active; ?>" class="form-control" name="active" id="active" placeholder="Yes or No" style="text-transform:uppercase" required>
            </div>

            <!-- button -->
            <div class="mt-4">
                <button type="submit" name="submit" class="submit-btn btn btn-primary w-100">Update</button>
            </div>
        </form>
    </div>
</body>

</html>