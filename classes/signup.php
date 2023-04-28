<?php

/**
 * Summary of signup
 */
class Signup
{
    private $error = "";

    public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $this->error .= $key . " is empty!<br>";
            }

            if ($key == "email") {
                //validate email on server side also
                if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)) {
                    $this->error .= "invalid email address!<br>";

                }
            }
            if ($key == "first_name") {
                //validate email on server side also
                if (is_numeric($value)) {
                    $this->error .= "first Name can't be a number!<br>";

                }
                if (strstr($value, " ")) {
                    $this->error .= "first Name can't have spaces!<br>";

                }
            }
            if ($key == "last_name") {
                //validate email on server side also
                if (is_numeric($value)) {
                    $this->error .= "last Name can't be a number!<br>";

                }
                if (strstr($value, " ")) {
                    $this->error .= "Last Name can't have spaces!<br>";

                }
            }
        }

        if ($this->error == "") {
            // no error
            return $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    private function create_user($data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];
        // Create in php
        $url_address = strtolower($first_name . "." . $last_name);
        $userid = $this->create_userid();

        $query = "insert into users (userid,first_name,last_name,gender,email,password,url_address) values 
        ('$userid','$first_name','$last_name','$gender','$email','$password','$url_address')";
        if ($password == $data['password2']) {
            $conn = new Database();
            $conn->save($query);
        } else {
            return "Password doesn't match";
        }
    }


    private function create_userid()
    {
        $length = rand(4, 19);
        $number = "";
        for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);
            $number .= $new_rand;
        }
        return $number;
    }
}