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

    if(isset($_SESSION["user"])){
        $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = ".$_SESSION["user"]);
        $query = mysqli_fetch_row($query);
        $_SESSION["userName"] = $query[1];
        $_SESSION["userProfile"] = $query[5];
        $_SESSION["userEmail"] = $query[6];
    }
?>