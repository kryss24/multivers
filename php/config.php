<?php
    $conn = mysqli_connect("localhost","root","","multivers");
    function verifySuperUser($id){
        $query = $conn->prepare('SELECT user_id FROM users WHERE user_id = ? AND groupe = ?');
        $query->bind_param('ss',$id,'SuperAdmin');
        $query->execute();
        $result = $query->get_result();
        if($result->rowCount() === 1)
            return true;
        return false;
    }
?>