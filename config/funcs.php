<?php



function isNull ($nombre, $user, $pass, $pass_con, $email)
{
    if(strlen(trim($nombre)) < 1|| strlen(trim($user)) < 1 || strlen(trim(
        $pass)) < 1 || strlen (trim($pass_con)) < 1 || strlen(trim($email)) < 1) 
        {
            return true;
            } else {
            return false;
            
        } 
    } 





function isEmail ($correoC)
{

    if (filter_var($correoC,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
    return false;
    }
}


function validaPassword($var1, $var2)
{
    if(strcmp($var1, $var2) !== 0){
        return false;
    } else {
    return true;
    }
        
}

function minMax ($min, $max, $valor){
    if(strlen (trim($valor)) < $min)
    {
        return true;
    }
    else if(strlen(trim($valor)) > $max)
    {
        return true;
    }
    else
    {
        return false;
    }

}

function usuarioExiste($usuarioC)
{
    global $conn;

    $stmt = $conn->prepare("SELECT idCliente FROM clientes WHERE usuarioCliente = ? LIMIT 1");
    $stmt->bind_param("s", $usuarioC);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt-> close();

    if ($num > 0)
    {
        return true;    
    } else {
    return false;
    }
}


function emailExiste($correoC)
{
    global $conn;

    $stmt = $conn->prepare("SELECT idCliente FROM clientes WHERE correoCliente = ? LIMIT 1");
    $stmt->bind_param("s", $correoC);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt-> close();

    if ($num > 0)
    {
        return true;    
    } else {
    return false;
    }
}



function generateToken()
{
    $gen = md5(uniqid(mt_rand(),false));
    return $gen;
}




function generarTokenPass($user_id)
{
    global $conn; 

    $token= generateToken();

    $stmt = $conn->prepare("UPDATE clientes SET token_password=?,
    password_request=1 WHERE idCliente= ?");
    $stmt->bind_param('ss',$token,$user_id);
    $stmt->execute();
    $stmt->close();

    return $token;
}




function getValor ($campo, $campoWhere, $valor)
{
    global $conn;

    $stmt = $conn->prepare ("SELECT $campo FROM clientes WHERE $campoWhere = ? LIMIT 1");
    $stmt->bind_param ('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0)
    {
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    }
}

function hashPassword($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}


function resultBlock ($errors){
    if(count($errors)>0)
    {
        echo "<div id='error' class='alert alert-danger' role='alert'>
        <a href='#' onclick=\"showHide('error');\">[X]</a><ul>";
        foreach($errors as $error)
        {
            echo"<li>".$error."</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}




?>
