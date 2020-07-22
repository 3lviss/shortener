<?php
class User
{
    private $email;
    private $password;

    // Set email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Set email
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    // Register new user
    public function register()
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "INSERT INTO user (email, password) VALUES (:email, :password)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);

        return $stmt->execute();
    }

    /* Login user */
    public function login(){
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $this->password);
        $stmt->execute();

        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if($count > 0)
            return $row;
        else
            return false;
    }

    /* Set User Data */
    public function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['email'] = $row->email;
    }

    /* Logout */
    public function logout(){
        session_destroy();
        return true;
    }
}

?>