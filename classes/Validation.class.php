<?php
class Validation
{
    // Chec if email already exists in database
    public function emailExists($email)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT email FROM user WHERE email = :email";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0)
            return true;
        else
            return false;
    }

    /* Check if email is valid (@ and . required) */
    public function validEmail($email)
    {
        if(!preg_match("/\b[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}\b/", $email))
            return true;
    }

    /* Password length */
    public function minLength($input)
    {
        if(strlen($input) < 6)
            return true;
        else
            return false;
    }
}
?>