<?php

/*
* Returns 1 if the user exists and the given password's hash matches
* the stored hash in the user table.
*
* Return -1 if the user does not exist in the user table.
*
* Return -2 if the user exists in user table but the password hash does not match
*
* @param $db database user is logging into
* @param $login the given user login
* @param $pass the given password after being hashed
*/
function checkUser($db, $login, $pass) {
        // Query for row $login in user
        $userStr = "SELECT * FROM STUDENT WHERE Login='$login';";
        $user = $db->query($userStr);

        // If the user query did not have an error and the given $login is in the table
        if ($user != FALSE && $user->rowCount() == 1) {
        	// Get the hash from the table
                $row = $user->fetch();
                $hash = $row['PassHash'];

                // If the provided hash matches the one in the table
                if ($hash == $pass) {
                	return 1;
                }
                // Otherwise, the provided hash doesn't match the one in the user table
                else {
                        return -2;
                }
        }
        // Otherwise, assume an error did not occur and that the provided $login is
        // not in the user table
        else {
                return -1;
        }
}

/*
* Creates a client side alert message using JavaScript inserted as HTML
*
* @param $msg alert message that the user will get
*/
function alert($msg) {
	echo "<script type='text/javascript'>alert($msg);</script>";
}


?>
