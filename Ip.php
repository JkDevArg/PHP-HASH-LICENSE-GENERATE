<?php 

  function getVisitorIp()
{
  // Recogemos la IP de la cabecera de la conexión
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ipAdress = $_SERVER['HTTP_CLIENT_IP'];
  }
  // Caso en que la IP llega a través de un Proxy
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  // Caso en que la IP lleva a través de la cabecera de conexión remota
  else
  {
    $ipAdress = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAdress;
}