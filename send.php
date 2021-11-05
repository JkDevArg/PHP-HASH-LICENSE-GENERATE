<?php
//include connection
require_once 'test.php';

use Encryption\Encryption;
use Encryption\Exception\EncryptionException;

$cifrar = $_POST['serieN'];
$key  = 'secretkey';
$dateT = date("Y-m-d H:i:s");
try {
    $encryption = Encryption::getEncryptionObject('AES-128-ECB');
    $encryptedText = $encryption->encrypt($cifrar, $key);
    $decryptedText = $encryption->decrypt($encryptedText, $key);
}
catch (EncryptionException $e) {
    echo $e;
}

if(isset($_POST['submit']))
{

$hash = $encryptedText;
$serial = $_POST['serieN'];
$email = $_POST['emailC'];
$expireT = date("Y-m-d H:i:s",strtotime($dateT."+ 1 month")); 
$ip = $_POST['ipC'];

echo $expireT . '<br>' . $ip . '<br>' . $email . '<br>' . $serial . '<br>' . $hash; //MENSAJE DE PRUEBIÑA
  

$stmt = $conn->prepare("INSERT INTO hash (hash, licencia, email, time_create, time_expire, ip_client) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $hash, $serial, $email, $dateT, $expireT, $ip);
$stmt->execute();
} 


if ($stmt->error)
	{
echo '<script type="text/javascript">'; 
echo 'alert("ERROR AL MANDAR DATOS");'; 
echo 'window.location = "index.php";';
echo '</script>';
    }
    else
    {
echo '<script type="text/javascript">'; 
echo 'alert("REGISTRO DE DATOS CORRECTO. VAMO MANAOS");'; 
echo 'window.location = "licencias.php";';
echo '</script>';
    }
$stmt->close();
?>  