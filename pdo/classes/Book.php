<?php
require_once "DatabasePDO.php";
class Book
{
    private $id = null;
    private $title = '';
    private static $dbConn = null;
    public function __construct ()
    {
        self::initializeConnection();
    }
   
    private static function initializeConnection ()
    {
        if (is_null(self::$dbConn)) {
            self::$dbConn = DatabasePDO::getInstance();
        }
    }
   
    /**
     * @return the $id
     */
    public function getId ()
    {
        return $this->id;
    }
    /**
     * @return the $title
     */
    public function getTitle ()
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle ($title)
    {
        $this->title = $title;
    }
    /**
     * @return Book
     */
    public static function findById ($id)
    {
        self::initializeConnection();
        $book = null;
        try {
            $statement = self::$dbConn->prepare(
            "SELECT  * from book WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $book = $statement->fetch();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return $book;
    }
    /**
     * Save the Book to the DB.  If new book, it creates a record and grabs the id.
     * @return boolean
     */
    public function save ()
    {
        try {
            if (empty($this->id)) {
                $statement = self::$dbConn->prepare(
                "INSERT INTO book SET title = :title");
                $statement->bindValue(':title', $this->title);
            } else {
                $statement = self::$dbConn->prepare(
                "UPDATE book SET title = :title WHERE id = :id");
                $statement->bindValue(':id', $this->id);
                $statement->bindValue(':title', $this->title);
            }
            if ($statement->execute()) {
                if (empty($this->id)) {
                    $this->id = self::$dbConn->lastInsertId();
                }
                return true;
            }
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
            die();
        }
        return false;
    }
}
?>
