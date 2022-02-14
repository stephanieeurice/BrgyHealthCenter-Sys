<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "db.inc.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $results = "SELECT * FROM messages LEFT JOIN doctor ON doctor.unique_id = messages.outgoing_msg_id
                LEFT JOIN patient ON patient.unique_id = messages.incoming_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $results);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="55" width="55">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>