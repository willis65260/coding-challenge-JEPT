my error was the semi-colons 
the line 69 of the php was working but I had to put ' on it
$sql = "INSERT INTO payments (id_user,concept,quantity) VALUES($user_id,'$concept','$quantity');";



//////////////////////////////////////
payloads with postman(only the get methods where finished in the timeframe of the challenge and half of the CREATE one)

URL:http://localhost/user/1/payments/0
GET method will show all records for the user 1

POST methods"

Create:
{
    "action": "crear",
    "valores": [
        null,
        null,
        "concepto",
        "$70"
    ]
}


Update:
{
    "action": "update",
    "valores": [
        4,
        1,
        "concept",
        "quantity"
    ]
}


Delete one:
{
    "action": "delete_one",
    "valores": [
        4,
        1
    ]
}


Delete bulk:
{
    "action": "delete_bulk",
    "user_id": 1,
    "borrar":[3,5,6]
}