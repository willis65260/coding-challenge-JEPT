my error was the semi-colons 
the line 69 of the php was working but I had to put ' on it
$sql = "INSERT INTO payments (id_user,concept,quantity) VALUES($user_id,'$concept','$quantity');";