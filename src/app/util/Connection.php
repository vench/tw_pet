<?php



namespace app\util;

/**
 * Description of Connection
 *
 * @author vench
 */
class Connection {

    /**
     * 
     * @staticvar type $conn
     * @return \PDO
     * @throws \PDOException
     * @todo конечно по хорошему тут нужен некий конфиг из контекста приложения
     */
    public static function getConn() {
        static $conn = null;
        if(is_null($conn)) {
            $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
            $user = 'root';
            $password = 'admin';

            try {
                $conn = new \PDO($dsn, $user, $password);
                $conn->setAttribute(\PDO::ATTR_ERRMODE, 
                            \PDO::ERRMODE_EXCEPTION);
            }   catch (\PDOException $e) { 
                throw $e;
            } 
        }
        return $conn;
    }
}
