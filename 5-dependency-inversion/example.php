<?

interface Connection {
    public function connect();
}

class MysqlConnection implements Connection {

    public function conect()
    {
            
    }
}

class PasswordReminder {
    protected $connect;

    // 这里的类型是Connection,不是MysqlConnection, 使用范围最大的那个类型
    public function __construct(Connection $connect)
    {
        $this->connect = $connect;
    }
}
