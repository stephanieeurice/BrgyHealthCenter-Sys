<!-- Approve, decline or delete appointment -->

<?php


include 'db.inc.php';

if (isset($_POST['submit'])) {
    $action = $_POST['action'];
    $action_remarks = $_POST['remarks'];
    $id = $_POST['id'];
    $action_date = $_POST['actionDate'];

    $query = "UPDATE appointment SET apt_action='" . $action . "', action_date='" . $action_date . "', action_remarks='" . $action_remarks . "' WHERE patient_id='" . $id . "'";
    mysqli_query($conn, $query);
    header('location: ../doctor_dashboard.php?success');
}
