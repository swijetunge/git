<?php
class DatabasePDO
{
    private static $_instance = array();

    /*
     * setting the default db name to 'test'.
     * 
     */
    static function getInstance ($dbName = 'test')
    {
        if (! array_key_exists($dbName, self::$_instance)) {
            $dbtype = 'mysql';
            $username = 'root';
            $password = '';
            $hostname = '127.0.0.1';
            $dsn = $dbtype . ":host=" . $hostname . ";dbname=" . $dbName;
            try {
                self::$_instance[$dbName] = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage();
                die();
            }
        }
        return self::$_instance[$dbName];
    }
}

?>