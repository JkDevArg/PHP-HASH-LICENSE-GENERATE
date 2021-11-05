# PHP-HASH-LICENSE-GENERATE
Sistema desarrollado en PHP con Libreria PHP Simple Encryption, usando también librería Faker.

* Sistema de prueba sin ningun motivo, para pasar el tiempo.


Libreria PHP Simple Encryption : https://github.com/stymiee/php-simple-encryption

Libreria Faker : https://github.com/fzaninotto/Faker

En el formulario se crea un email generado por Faker: ```$faker->freeEmail;```

Con el código ```mt_rand``` genera una "licencia" o "número generico" desde el archivo ```test.php```

Instalar mediante composer  ```composer install```

Instalar dependencias **OPCIONAL** si hay actualización:

```composer require stymiee/php-simple-encryption``` 

```composer require fzaninotto/faker```

----------------------------------------------------

## Configurar Base de datos 

Abrir archivo -> ```conn.php```

Editar los parametros:


```$servername = "localhost";```
```$database = "hash";```
```$username = "root";```
```$password = "";```

----------------------------------------------------

## Instalación rapida para perezosos

ir a la ruta http://localhost/install.php  GG!

----------------------------------------------------

## Datos PLUS:

```php
$cifrar = $_POST['serieN'];   //Se obtiene desde el formulario name="serieN" es el que genera la licencia.
$key  = 'secretkey';
$dateT = date("Y-m-d H:i:s");  //Fecha actual que tomara para luego aumentar 1 mes para la fecha de expiración
try {
    $encryption = Encryption::getEncryptionObject('AES-128-ECB');  //Tipo de cifrado
    $encryptedText = $encryption->encrypt($cifrar, $key);
    $decryptedText = $encryption->decrypt($encryptedText, $key);
}
catch (EncryptionException $e) {
    echo $e;
}
if(isset($_POST['submit']))
{

$hash = $encryptedText;  //Muestra el resultado del cifrado y lo guarda en la variable $hash
$serial = $_POST['serieN'];  //Almacena el número generado enviado por POST
$email = $_POST['emailC'];  //Lo mismo pero con el EMAIL generado.
$expireT = date("Y-m-d H:i:s",strtotime($dateT."+ 1 month"));  //Obtiene los datos de la fecha actual y hora actual, le aumenta 1 mes para luego almacenar en la variable $expireT
$ip = $_POST['ipC'];
```

## LISTA DE TIPOS DE CIFRADOS

**Total ciphers supported:** 139    
**Default cipher:** AES-256-CBC (version 1)

| AES                     | Aria/Blowfish | Camellia/Cast5/SM4 | DES/Idea/RC2/RC4/Seed |
|-------------------------|---------------|--------------------|-----------------------|
| aes-128-cbc             | aria-128-cbc  | camellia-128-cbc   | des-cbc               |
| aes-128-cbc-hmac-sha1   | aria-128-ccm  | camellia-128-cfb   | des-cfb               |
| aes-128-cbc-hmac-sha256 | aria-128-cfb  | camellia-128-cfb   | des-cfb1              |
| aes-128-ccm             | aria-128-cfb1 | camellia-128-cfb   | des-cfb8              |
| aes-128-cfb             | aria-128-cfb8 | camellia-128-ctr   | des-ecb               |
| aes-128-cfb1            | aria-128-ctr  | camellia-128-ecb   | des-ede               |
| aes-128-cfb8            | aria-128-ecb  | camellia-128-ofb   | des-ede3              |
| aes-128-ctr             | aria-128-gcm  | camellia-192-cbc   | des-ede-cbc           |
| aes-128-ecb             | aria-128-ofb  | camellia-192-cfb   | des-ede-cfb           |
| aes-128-gcm             | aria-192-cbc  | camellia-192-cfb   | des-ede-ofb           |
| aes-128-ofb             | aria-192-ccm  | camellia-192-cfb   | des-ede3-cbc          |
| aes-128-xts             | aria-192-cfb  | camellia-192-ctr   | des-ede3-cfb          |
| aes-192-cbc             | aria-192-cfb1 | camellia-192-ecb   | des-ede3-cfb1         |
| aes-192-ccm             | aria-192-cfb8 | camellia-192-ofb   | des-ede3-cfb8         |
| aes-192-cfb             | aria-192-ctr  | camellia-256-cbc   | des-ede3-ofb          |
| aes-192-cfb1            | aria-192-ecb  | camellia-256-cfb   | des-ofb               |
| aes-192-cfb8            | aria-192-gcm  | camellia-256-cfb   | desx-cbc              |
| aes-192-ctr             | aria-192-ofb  | camellia-256-cfb   | id-aes128-ccm         |
| aes-192-ecb             | aria-256-cbc  | camellia-256-ctr   | id-aes128-gcm         |
| aes-192-gcm             | aria-256-ccm  | camellia-256-ecb   | id-aes192-ccm         |
| aes-192-ofb             | aria-256-cfb  | camellia-256-ofb   | id-aes192-gcm         |
| aes-256-cbc             | aria-256-cfb1 | cast5-cbc          | id-aes256-ccm         |
| aes-256-cbc-hmac-sha1   | aria-256-cfb8 | cast5-cfb          | id-aes256-gcm         |
| aes-256-cbc-hmac-sha256 | aria-256-ctr  | cast5-ecb          | idea-cbc              |
| aes-256-ccm             | aria-256-ecb  | cast5-ofb          | idea-cfb              |
| aes-256-cfb             | aria-256-gcm  | chacha20           | idea-ecb              |
| aes-256-cfb1            | aria-256-ofb  | chacha20-poly1305  | idea-ofb              |
| aes-256-cfb8            | bf-cbc        | seed-cbc           | rc2-40-cbc            |
| aes-256-ctr             | bf-cfb        | seed-cfb           | rc2-64-cbc            |
| aes-256-ecb             | bf-ecb        | seed-ecb           | rc2-cbc               |
| aes-256-gcm             | bf-ofb        | seed-ofb           | rc2-cfb               |
| aes-256-ofb             | sm4-cbc       |                    | rc2-ecb               |
| aes-256-xts             | sm4-cfb       |                    | rc2-ofb               |
|                         | sm4-ctr       |                    | rc4                   |
|                         | sm4-ecb       |                    | rc4-40                |
|                         |               |                    | rc4-hmac-md5          |

Mas información en el repositorio: https://github.com/stymiee/php-simple-encryption
----------------------------------------------------

Captura desde la Base de Datos.

![Screenshot_1](https://user-images.githubusercontent.com/69984125/140438338-f0248cc2-1cc2-4f32-b583-336fc2de6886.jpg)


![Screenshot_2](https://user-images.githubusercontent.com/69984125/140438406-251a3e82-4b7d-4943-a16d-11c19b540277.jpg)


![Screenshot_3](https://user-images.githubusercontent.com/69984125/140440723-4e15c737-bfaa-49bd-97fa-64e6362ce152.jpg)




**PD: Esto es una prueba así que tendra muchos errores y agujeros de seguridad.**
