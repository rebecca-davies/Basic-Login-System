<?php
/**
 *  Logins in through a post request, comparing to 'accounts.txt'
 *  in the project directory.
 * 
 *  @author Rebecca Davies <email@rebecca.sh>
 */
class LoginBackend {

    const ACCOUNTS_FILE = "accounts.txt";   //The accounts.txt file name
    private $users = array();               //The array of users in the accounts.txt file

    /**
     *  Logs the POST request and compares them to saved username
     *  and password combinations to authenticate the login attempt.
     */
    function handle() {
        if (isset($_POST['login'])) {
            $attempt = array("username" => $_POST['username'], "password" => $_POST['password']);
            $this->fetchUsers();
            foreach($this->users as $user) {
                if($attempt == $user) {
                    $this->success($user);
                    return;
                }
            }
            $this->redirect("login.php", "The username/password combination is invalid.");
        } 
    }
    
    /**
     *  Displays all the registered users when the user successfully logs in.
     * 
     *  @param user The successful user login request 
     */
    function success($user) {
        echo 'Welcome, ' . $user['username'] . '<br><strong>Currently registered accounts:</strong>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Password</th>';
        echo '</tr>';
        foreach($this->users as $user) {
            echo '<tr>';
            echo '<td> ' . $user['username'] . ' </td> <td>' . $user['password'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    /**
     *  Fetches the users and pushes them to the end of an array to
     *  sort through them later when handling users.
     */
    function fetchUsers() {
        $file = self::ACCOUNTS_FILE;
        $contents = file_exists($file) ? fopen($file, "r") : $this->redirect("login.php", "User database error.");
        while (!feof($contents)) {
            $line = fgets($contents);
            if(!empty($line)) {
                list($username, $password) = explode(" ", $line);
                array_push($this->users, array("username" => trim($username), "password" => trim($password)));
            }
        }
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