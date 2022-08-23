<?php
/**
 *  Creates a user account, saving it to 'accounts.txt' once it's
 *  validated and processed, includes some basic error checking on inputs.
 * 
 *  @author Rebecca Davies <email@rebecca.sh>
 */
class RegistrationBackend {

    const USERNAME_REGEX = '/^[a-zA-Z0-9]{3,16}$/';                                                 //Pattern to test username requirements                 
    const PASSWORD_REGEX = '/^.{8,32}$/';                                                           //Pattern to test password length
    const ACCOUNTS_FILE = 'accounts.txt';                                                           //The accounts.txt file name
    const VALID_CHARACTERS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVQXYZ0123456789!@#$%&*_";       //Pattern to generate random strings
    

    /**
     *  Logs the POST request and compares them to saved username
     *  and password combinations to authenticate the login attempt.
     */
    function handle() {
        if (isset($_POST['register'])) {
            $attempt = array("username" => $_POST['username'], "password" => $_POST['password']);
            $attempt = $this->validate($attempt);
            $this->submitAccount($attempt);
            $this->redirect("login.php", "Account created!<br>Please login with the information associated with it.");
        } 
    }

    /**
     *  Validates the account information sent to the server.
     * 
     *  If the password is empty, then it generates a password by shuffling a string of
     *  characters then grabbing a section of it from 8 to the specified
     *  length of the generated password, or capped to 32 if it's too long. 
     *  
     *  If the username isn't alphanumeric and 3 to 16 characters in length, then it'll
     *  reject the request and send the user back to the registration screen.
     * 
     *  If the password isn't 8 to 32 characters in length, then it'll reject the
     *  request and send the user back to the registration screen.
     * 
     *  @param account The account information from the user session
     *  @return account The account information after passing validation
     */
    function validate($account) {
        $error = '';
        if(empty($account['password'])) {
            $password = substr(str_shuffle(self::VALID_CHARACTERS), 0, max(8, min($_POST['length'], 32)));
            $account['password'] = $password;
        }
        if(!preg_match(self::USERNAME_REGEX, $account['username'])) {
            $error .= "Username must be Alphanumeric characters and between 3 to 16 characters long.<br>";
        }
        if(!preg_match(self::PASSWORD_REGEX, $account['password'])) {
            $error .= "Password must be between 8 to 32 characters long.<br>";
        }
        if(!empty($error)) {
            $this->redirect("register.php", $error);
        }
        return $account;
    }

    /**
     *  Checks the accounts list to see if the requested account already
     *  exists, otherwise it creates the account by appending it to the end
     *  of the collection of accounts.
     * 
     *  @param account The information supplied to the server
     */
    function submitAccount($account) {
        $file = self::ACCOUNTS_FILE;
        $contents = file_exists($file) ? fopen($file, "r") : $this->returnError("User database error.");
        while (!feof($contents)) {
            $line = fgets($contents);
            if(!empty($line)) {
                list($username, $password) = explode(" ", $line);
                if(strcasecmp($account['username'], $username) == 0) {
                    $this->redirect("register.php", "This username is already in use.");
                }
            }
        }
        file_put_contents($file, implode(" ", $account).PHP_EOL, FILE_APPEND);
    }

    /**
     *  Returns an message and sends the User back to a specified page.
     * 
     *  @param page The page that the user will be redirected to.
     *  @param msg The message to pass to the redirected page.
     */
    function redirect($page, $msg) {
        header("Location:$page?msg=" . urlencode($msg));
        exit;
    }
}
?>