<?php

class Login
{
    private $error = "";

    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "select * from users where email = '$email' limit 1 ";

        $conn = new Database();
        $result = $conn->read($query);

        if ($result) //user exists
        {
            $row = $result[0];
            if ($password == $row['password']) {

                //Create session data
                $_SESSION['NetworkZoneF_userid'] = $row['userid'];

            } else {
                $this->error .= "Wrong password or Email <br>";
            }
        } else {
            $this->error .= "Wrong Email or password<br>";
        }

        return $this->error;
    }

    public function check_login($id)
    {
        if (is_numeric($id)) {
            $query = "select * from users where userid = '$id' limit 1";
            $conn = new Database();
            $result = $conn->read($query);

            if ($result) {
                $user_data = $result[0];
                return $user_data;
            } else {
                header("Location: login.php");
                die;
            }

        } else {
            header("Location: login.php");
            die;
        }

    }


}