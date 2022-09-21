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
        <h1>Calculation of your marks</h1>
        <?php
        //Store marks in an array to be processed later
        $marks = array(
            $_POST["mark1"],
            $_POST["mark2"],
            $_POST["mark3"],
            $_POST["mark4"],
            $_POST["mark5"]);
        
        $error = "";    //An error message to be displayed if fault detected
        $total = 0;     //The total of t he marks

        /*
        *   Loops through the marks array, passing the key/value to be used
        *   when validating the mark and creating error outputs if fault detected.
        *   
        *   If the mark is empty, return an error saying which mark was empty.
        *   If the mark is outside the 0-100 bounds, return an error saying which mark exceeds it.
        *   If the mark is not a numeral, return an error saying which mark is affected.
        *   If all the checks pass then add it to the total.
        */
        foreach($marks as $key => $mark) { 
            $index = ++$key;
            if(empty($mark)) {
                $error .= "<p>Mark $index cannot be empty.</p>";
            }
            if($mark < 0 || $mark > 100) {
                $error .= "<p>Mark $index cannot exceed 0-100 bounds.</p>";
            }
            if(!is_numeric($mark) && !empty($mark)) {
                $error .= "<p>Mark $index is not a number</p>";
            }
            if(empty($error)) {
                $total = $total + $mark;
            }
        }

        /*
        *   If any errors exist, display the error otherwise continue execution and
        *   calculate the average then displaying the sum and the average.
        */
        if(!empty($error)) {
            echo $error;
        } else {
            $average = $total / 5;
            echo "<p>The sum of your marks is: $total</p>";
            echo "<p>The average of your marks is: $average</p>";
        }
        ?>
        
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
