<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Records</title>

    <link rel="stylesheet" href="style.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="bg-white mt-5 rounded-2 p-4">

            <div class="header d-flex align-items-center justify-content-between">
                <p class="fs-2 fw-light">Staff Records</p>
                <a href="index.html" class="rcd-btn btn btn-primary d-flex align-items-center">Add Staff Record</a>
            </div>

            <table class="mt-4 table table-hover">
                <thead class="border-top">
                    <tr>
                        <th scope="col">Staff ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Active </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- get data from db and show them in a table -->

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "abc_company");
                    $sql = "SELECT * FROM `staffs`";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['staff_ID'];
                            $fname = $row['first_name'];
                            $lname = $row['last_name'];
                            $email = $row['email'];
                            $number = $row['phone_no'];
                            $active = $row['active'];

                            echo '
                                <tr>
                                    <th scope="row">' . $id . '</th>
                                    <td>' . $fname . '</td>
                                    <td>' . $lname . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $number . '</td>
                                    <td>' . $active . '</td>
                                    <td>
                                        <a href="update.php?updateid=' . $id . '" class="btn btn-warning">Update</a>
                                        <a href="records.php?deleteid=' . $id . '" class="btn btn-danger mx-2">Delete</a>
                                    </td>
                                </tr> ';

                            //delete record    
                            if (isset($_GET['deleteid'])) {
                                $sql = "DELETE FROM `staffs` WHERE staff_ID=$id";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    header('location:records.php');
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>