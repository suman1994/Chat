<?php session_start();

error_reporting(E_ALL);

define("_PDO_DSN_",  "mysql:host=localhost;dbname=chat;");
define("_PDO_USER_", "chat_user");
define("_PDO_PASS_", "Test@123");

# Defining diffrent modes. When mode is in development mode
# we will display all the error, when it is production, we will 
# not display any compiler error message.
define("_MODE_", "development");

try { 
    $conn = new PDO(_PDO_DSN_, _PDO_USER_, _PDO_PASS_); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    # if connection fails, then there is no point
    # to proceed. so die
    if (_MODE_ == 'development') {
        die($e->getMessage());
    } 

    # iF IT IS NOT IN DEVELOPEMENT MODE, THEN NO NEED 
    # TO PROVIDE THE DETAIL ERROR MESSAGE.
    die("SOME THING WENT WRONG.");
}
?>