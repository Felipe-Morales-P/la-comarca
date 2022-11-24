
<?php









function emailExiste($email)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT idClientes FROM clientes WHERE correoCliente = ? LIMIT1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt-> close();

    if ($num > 0)
    {
        return true    
    } else {
    return false;
    }
}




?>