<?php
    while ($row2 = mysqli_fetch_assoc($sql2)) {
        $sql3 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row2['unique_id']}
                OR outgoing_msg_id = {$row2['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0) {
            $result = $row3['msg'];
        } else {
            $result = "No message available";
        }

        (strlen($result) > 25) ? $msg = substr($result, 0, 25). '...' : $msg = $result;
        
        if (isset($row3['outgoing_msg_id'])) {
            ($outgoing_id == $row3['outgoing_msg_id']) ? $you = "You: " : $you = "";
        } else {
            $you = "";
        }

        ($row2['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="patient_message.php?user_id='.$row2['unique_id'].'">
                        <div class="content">
                        <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="55" width="55">
                            <div class="details">
                                <span>'. $row2['name'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fa fa-circle"></i></div>
                    </a>';
    }
?>