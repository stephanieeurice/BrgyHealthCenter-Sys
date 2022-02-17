<!-- Approve, decline or delete appointment -->

<?php


include 'db.inc.php';

if (isset($_POST['submit'])) {
    $aptaction = $_POST['action'];
    $aptaction_remarks = $_POST['remarks'];
    $aptid = $_POST['id'];
    $aptaction_date = $_POST['actionDate'];

    $query = "UPDATE appointment SET apt_action='" . $aptaction . "', action_date='" . $aptaction_date . "', action_remarks='" . $aptaction_remarks . "' WHERE id='" . $aptid . "'";
    mysqli_query($conn, $query);
    header('location: ../doctor_dashboard.php?success');
}
