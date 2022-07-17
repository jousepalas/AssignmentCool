<?php
// require "./config.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

class Constants
{
    static $DB_SERVER="mysql";
    static $DB_NAME="coolblue";
    static $USERNAME="root";
    static $PASSWORD="root";

    static $SQL_SELECT_ALL="SELECT * FROM products";

}

class Register
{

    public function connect()
    {
    // $connection = new PDO($dsn, $username, $password, $options);

        $con=new mysqli(Constants::$DB_SERVER,Constants::$USERNAME,Constants::$PASSWORD,Constants::$DB_NAME);
        if($con->connect_error)
        {
            return null;
        }else
        {
            return $con;
        }
    }
    public function select()
    {
        $con=$this->connect();
        if($con != null)
        {
            $result=$con->query(Constants::$SQL_SELECT_ALL);
            if($result->num_rows>0)
            {
                $reg=array();
                while($row=$result->fetch_array())
                {
                    array_push($reg, array("id"=>$row['id'],"name"=>$row['name'],"sales price"=>$row['salesPrice'], "product type id"=>$row['productTypeId']));
                }
                print(json_encode(array_reverse($reg)));
            }else
            {
                print(json_encode(array("No records found")));
            }
            $con->close();

        }else{
            print(json_encode(array("PHP EXCEPTION : CAN'T CONNECT TO MYSQL. NULL CONNECTION.")));
        }
    }
}
$reg=new Register();
$reg->select();

?>