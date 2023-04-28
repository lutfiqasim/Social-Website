<?php

class Post
{
    private $error = "";
    public function create_post($userid, $data)
    {

        if (!empty($data['post'])) {

            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";

            $conn = new Database();
            $conn->save($query);
        } else {

            $this->error .= "Please type something to post!<br>";

        }

        return $this->error;
    }
    public function get_posts($id)
    {
        $query = "select * from posts where userid = '$id' order by id desc";
        $conn = new Database();
        $result = $conn->read($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    private function create_postid()
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