<?php
// require __DIR__ . '/vendor/autoload.php';
header("Content-Type: application/json; charset=UTF-8;");


$parts = explode("/", $_SERVER["REQUEST_URI"]);

if($parts[1]!="user"){
    http_response_code(404);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "codingchallenge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER["REQUEST_METHOD"];
$user_id = $parts[2];
$payments = $parts[3];
$payment_id = $parts[4];


// user/id/payments/
if(!is_null($user_id)){
    switch($method){
        case "GET":
            if($payment_id==0){
                //show all payment's from user
                $sql = "SELECT * FROM $payments WHERE id_user=$user_id";
                // echo "all payments";
            }else{
                //show only one payment from user
                $sql = "SELECT * FROM $payments WHERE id_user=$user_id AND id_payments=$payment_id";
                // echo "only one payment";
            }
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo json_encode(["id: "=>$row["id_payments"],"Name: " => $row["concept"]]);
                        // echo json_encode("id: " . $row["id_payments"]. " - Name: " . $row["concept"]. " " . $row["quantity"]. "<br>");
                    }
                } else {
                echo "0 results";
                }
            break;
        case "POST":
            $data = json_decode(file_get_contents("php://input"),true);
            // $datos=var_dump($data);
            // echo($data["action"]);
            // echo($data["valores"][2]);
            // echo($data["valores"][2]);
            // echo($data["borrar"][0]);
            switch($data["action"]){
                case "crear":
                    $identi_pay = $data["valores"][0];
                    $identi_usr = $data["valores"][1];
                    $concept= $data["valores"][2];
                    $quantity = $data["valores"][3];
                    $sql = "INSERT INTO payments (id_user,concept,quantity) VALUES($user_id,'$concept','$quantity');";
                    if ($result = $conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    break;
                case "update":
                    $identi_pay = $data["valores"][0];
                    $identi_usr = $data["valores"][1];
                    $concept= $data["valores"][2];
                    $quantity = $data["valores"][3];
                    $sql = "UPDATE payments SET concept='$concept',quantity='$quantity' WHERE id_payments=$identi_pay AND id_user=$user_id";
                    if ($result = $conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    break;
                case "delete_one":
                    $identi_pay = $data["valores"][0];
                    $identi_usr = $data["valores"][1];
                    // $concept= $data["valores"][2];
                    // $quantity = $data["valores"][3];
                    $sql = "DELETE FROM payments WHERE id_payments=$identi_pay AND id_user=$user_id";
                    if ($result = $conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    break;
                case "delete_bulk":
                    $identi_usr = $data["user_id"];
                    $identi_pay_arr = $data["borrar"];
                    // $concept= $data["valores"][2];
                    // $quantity = $data["valores"][3];
                    foreach ($identi_pay_arr as $identi_pay){
                        $sql = "DELETE FROM payments WHERE id_payments=$identi_pay AND id_user=$user_id";
                        if ($result = $conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                    }
                    break;
            }
    }
}else{

}

?>