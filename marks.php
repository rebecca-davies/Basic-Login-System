<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks</title>
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
        <h1>Your marks</h1>
        <p>Please enter the 5 marks you received</p>
        <form action="processMarks.php" method="post">
            <div>
                <label for="mark1">Mark 1:</label>
                <input type="text" id="mark1" name="mark1">
            </div>
            <div>
                <label for="mark2">Mark 2:</label>
                <input type="text" id="mark2" name="mark2">
            </div>
            <div>
                <label for="mark3">Mark 3:</label>
                <input type="text" id="mark3" name="mark3">
            </div>
            <div>
                <label for="mark4">Mark 4:</label>
                <input type="text" id="mark4" name="mark4">
            </div>
            <div>
                <label for="mark5">Mark 5:</label>
                <input type="text" id="mark5" name="mark5">
            </div>
            <div>
                <button type="submit" name="calculate">CALCULATE</button>
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