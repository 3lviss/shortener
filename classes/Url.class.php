<?php
class Url{
    private $long_url;
    private $short_url;

    // Set long url
    public function setLongUrl($long_url)
    {
        $this->long_url = $long_url;
    }

    // Set short url
    public function setShortUrl($short_url)
    {
        $this->short_url = urldecode($short_url);
    }

    // Store URL into database
    public function store($user_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "INSERT INTO url (user_id, long_url, short_url) VALUES (:user_id, :long_url, :short_url)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':long_url', $this->long_url, PDO::PARAM_STR); 
        $stmt->bindValue(':short_url', $this->short_url); 

        return $stmt->execute();
    }

    // Get all URL's for authenticated user
    public static function getAllUrls($user_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT u.*, co.clicks
                FROM url AS u 
                LEFT JOIN counter AS co
                ON u.id = co.url_id
                WHERE u.user_id = :user_id ORDER BY date_time desc";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();

        // Fetch All 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Convert into a string
        $result = json_encode($result);

        return urlencode($result);
    }

    // Generate short URL
    public static function shortenUrl()
    {
        $host_name = $_SERVER['HTTP_HOST'];

        // Create randomly 5 characters
        $random_chars = $rand = substr(md5(microtime()),rand(0,26),5);

        $short_url = 'http://' . $host_name . '/praksa/shortener/' . $random_chars;

        return urlencode($short_url);
    }

    /* 
     * Check if already has any clicks 
     * If has not, insert into counter table and start count
     * if already iserted, just increment counter
     */
    public function counter($url_id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT * FROM counter WHERE url_id = :url_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':url_id', $url_id);
        $stmt->execute();

        $count = $stmt->rowCount();

        /* 
         * If link has already some clicks
         * Increment click value by 1
         */
        if($count > 0)
        {
            $sql = "UPDATE counter SET clicks = clicks + 1 WHERE url_id = :url_id;";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':url_id', $url_id);

            return $stmt->execute();
        }
        /*
         * If there no clicks yet
         * Insert into counter table
         */ 
        else
        {
            $sql = "INSERT INTO counter (url_id, clicks) VALUES (:url_id, :clicks)";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':url_id', $url_id);
            $stmt->bindValue(':clicks', 1);

            return $stmt->execute();
        }
    }

    /* Count number of clics for certain url */
    public static function clickNum()
    {
        $sql = "SELECT clicks FROM counter WHERE url_id = :url_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':url_id', $url_id);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }

    public static function getLongUrl($short_url)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "SELECT long_url FROM url WHERE short_url = :short_url";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':short_url', $short_url);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }
}
?>