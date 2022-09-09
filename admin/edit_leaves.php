<?php
include __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/constants.php';
$leave_type_id = (int) $_GET['leave_type_id'] ?? 0;
if (!$leave_type_id) {
    header('Location: index_leaves.php');
    exit;
}

$clean_id = $mysqli->real_escape_string($leave_type_id);
$query = "SELECT * FROM leaves WHERE leave_type_id = '$clean_id'"; // safe
$result = $mysqli->query($query);
$data = $result->fetch_assoc();
if (!$data) {
    header('Location: index_leaves.php');
    exit;
}

if ($_POST) {
    $leave_name = $_POST['leave_name'] ?? 0;
    $employee_name = $_POST['employee_name'] ?? null;

    $leave_type = $_POST['leave_type'] ?? null;

    $leave_description    = $_POST['leave_description'] ?? 0;


    if ($leave_name && $leave_description) {

        $query = 'UPDATE leaves SET 
       
        leave_name = ? , 
        employee_name=?, 
        leave_type = ?, 
        leave_description = ?  
        WHERE leave_type_id = ?     
    ';

        $stmt = $mysqli->prepare($query); // mysqli_stmt

        $stmt->bind_param('ssisi', $leave_name, $employee_name, $leave_type, $leave_description, $leave_type_id);

        $stmt->execute();

        // Redirect
        header('Location: index_leaves.php?success=1');
        exit;
    }
}

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
        <h1>Employee Leaves Management System</h1>
        <hr>
        <h2 class="mb-4">Edit leaves Information</h2>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . "?leave_type_id={$leave_type_id}" ?>" method="post">
            <div class="row mb-3">
                <label for="leave_name" class="col-sm-2 col-form-label">LeaveName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="leave_name" name="leave_name" value="<?= htmlspecialchars($data['leave_name']) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="employee_name" class="col-sm-2 col-form-label">Employee Name</label>
                <div class="col-sm-10">
                    <?php
                    $query = "SELECT first_name from employee ";
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

            <div class="row mb-3">
                <label for="leave" class="col-sm-2 col-form-label">Leave Type</label>
                <div class="col-sm-10">
                    <select class="form-select" id="leave_type" name="leave_type">
                        <option></option>
                        <?php foreach ($leaves as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= $key == $data['leave_type'] ? 'selected' : '' ?>><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <label for="leave_description" class="col-sm-2 col-form-label">Describtion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="leave_description" name="leave_description"><?= htmlspecialchars($data['leave_description']) ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Leaves Info</button>
        </form>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>