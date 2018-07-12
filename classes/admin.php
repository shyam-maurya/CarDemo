<?php

require_once 'config.php';

class Admin {



    function __construct() {



    }
  

    public function chkValidUserLogin($Email, $Password) {

        global $conn;

        $return = false;



        $sql = "SELECT * FROM `sm_admin_users` WHERE `Email`='" . $Email . "' AND `Password`='" . md5($Password) . "'";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            $return = true;

        }

        return $return;

    }



    public function doUserLogin($Email) {



        global $conn;

        $return = false;



        $UserId = $this->getUserId($Email);

        $Name = $this->getUserName($Email);

        $Image = $this->getUserImg($Email);

     



        if ($UserId > 0) {

            $return = true;

            $_SESSION['UserId'] = $UserId;

            $_SESSION['Mobile'] = $Mobile;

            $_SESSION['Name'] = $Name;

            $_SESSION['Email'] = $Email;

            $_SESSION['Image'] = $Image;



        }

        return $return;

    }



    public function getUserName($Email) {

        global $conn;

        $Name = '';



        $sql = "SELECT * FROM `sm_admin_users` WHERE `Email` = '" . $Email . "' ";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            $row = $result->fetch(PDO::FETCH_ASSOC);

            $Name = stripslashes($row['Name']);

        }

        return $Name;

    }







    public function getUserImg($Email) {

        global $conn;

        $Image = '';

        $sql = "SELECT * FROM `sm_admin_users` WHERE `Email` = '" . $Email . "' ";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) 

        {

            $row = $result->fetch(PDO::FETCH_ASSOC);

            $Image = stripslashes($row['Image']);

        }

        return $Image;

    }



    public function getUserId($Email) {

        global $conn;

        $UserId = 0;



        $sql = "SELECT * FROM `sm_admin_users` WHERE `Email` = '" . $Email . "' ";

        $result = $conn->query($sql);

        $count = $result->rowCount();

        if (($result) && (($count) > 0)) {

            $row = $result->fetch(PDO::FETCH_ASSOC);

            $UserId = $row['UserId'];

        }

        return $UserId;

    }



    public function isUserLoggedIn() {





        $return = false;



        if (isset($_SESSION['UserId']) && ($_SESSION['UserId'] > 0) && ($_SESSION['UserId'] != '')) {



            $id = $_SESSION['UserId'];



            if ($this->chkValidUser($id)) {



                $return = true;

            }

        }



        return $return;

    }



    public function chkValidUser($id) {



        global $conn;



        $return = false;







        $sql = "SELECT * FROM `sm_admin_users` WHERE `UserId` = '" . $id . "'";



        $result = $conn->query($sql);

        $count = $result->rowCount();



        if (($result) && (($count) > 0)) {



            $return = true;

        }



        return $return;

    }



    function doUserLogout() 

    {



        $return = true;







        $_SESSION['UserId'] = '';



        $_SESSION['Name'] = '';



        $_SESSION['Email'] = '';



        $_SESSION['Mobile'] = '';



        $_SESSION['Image'] = '';





        unset($_SESSION['UserId']);



        unset($_SESSION['Name']);



        unset($_SESSION['Mobile']);



        unset($_SESSION['Email']);



        unset($_SESSION['Image']);









        session_destroy();



        session_start();



        session_regenerate_id();



        $new_sessionid = session_id();



        return $return;

    }





}






?>

