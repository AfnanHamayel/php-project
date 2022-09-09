<?php
include __DIR__ . '/includes/constants.php';
include __DIR__ . '/includes/db.php';
include('includes/header.php');
include('includes/navbar.php');

if ($_POST) {
    //the fileds that i want to chick ,,amount and discribtion 
    $leave_name = $_POST['leave_name'] ?? 0;
    $employee_name = $_POST['employee_name'] ?? null;
    $leave_type = $_POST['leave_type'] ?? null;
    $leave_description = $_POST['leave_description'] ?? 0;


    if ($leave_name &&  $leave_description) {


        $query = 'INSERT INTO leaves (leave_name,employee_name,leave_type,leave_description)
        
      VALUES (?,?,?,?)';

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('ssis', $leave_name, $employee_name, $leave_type, $leave_description);
        $stmt->execute();
    }
}

// now i want to show the data in the another page 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <hr>
        <div class="d-flex justify-content-between mb-4">
            <h4> Add New Leave</h4>
            <div>
                <a href="index_leaves.php" class="btn btn-sm btn-outline-primary">Show Leaves</a>
            </div>
        </div>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="row mb-3">
                <label for="leave_name" class="col-sm-2 col-form-label">LeaveName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="leave_name" name="leave_name">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="employee_name" class="col-sm-2 col-form-label">Employee Name</label>
                <div class="col-sm-10">
                    <?php
                    $query = "SELECT first_name from employee";
                    $resultset = $mysqli->query($query); // return mysqli_result
                    ?>
                    <select class="form-select" id="employee_name" name="employee_name">
                        <option></option>
                        <?php
                        while ($rows = $resultset->fetch_assoc()) {
                            $employee_name = $rows['first_name'];
                            echo "<option value = '$employee_name'>$employee_name</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="leave Type" class="col-sm-2 col-form-label">Leave Type</label>
                <div class="col-sm-10">
                    <select class="form-select" id="leave_type" name="leave_type">
                        <option></option>
                        <?php foreach ($leaves as $key => $value) : ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="discription" class="col-sm-2 col-form-label">LeaveDescribtion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="leave_description" name="leave_description"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Leave</button>
        </form>


    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>