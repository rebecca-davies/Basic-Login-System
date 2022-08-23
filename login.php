<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            <nav>
                <ul>
                    <li class="menu">
                        <a href="index.php">
                            <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <li class="menu"><a href="login.php">LOGIN</a></li>
                    <li class="menu"><a href="register.php">REGISTER</a></li>
                    <li class="menu"><a href="marks.php">MARKS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main>
        <h1>Login</h1>
        <form action="admin.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <?php
            /**
             *  Passing through a GET request with a redirect displays a message inside
             *  of the login screen, also sends the sessions password when it's generated
             *  and unsets it's variables it straight away, this isn't secure and you shouldn't 
             *  do this but I don't really have a database to work and a text file isn't ideal 
             *  so it'll do for showing what it'd do in theory with unique session ids.
             */
            if(isset($_GET['msg'])) {
                session_start();
                if(isset($_SESSION['password'])) {
                    echo "<p>Your generated password is: <span style='font-weight:bold'>" . $_SESSION['password'] . "</span></p>";
                    session_unset();
               
                }
                if(isset($_GET['msg'])) {
                    echo "<p style='color:red;font-weight:bold'>" . $_GET['msg'] . "</p>";
                }
            }
            ?>
            <div>
                <button type="submit" name="login">LOGIN</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>
    
        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>				
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>

</body>
</html>