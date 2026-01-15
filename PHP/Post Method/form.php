<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){/*This is there to prevent form resubmission every time the page is reloaded. If you don't do thid, everytime the page reloads, the browser will try to read the post values and submit them which will result in errors*/
    $fname = trim($_POST['fname'] ?? ''); /*Plz note that you trim after you have already checked that the Post value is set, that's why post is surrounding everything */
    $sname = trim($_POST['sname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pnumber = trim($_POST['pnumber'] ?? '');
    //$password = trim($_POST['password'] ?? '');
    $comments = trim($_POST['comment'] ?? '');

    /*Email duplicate prevention*/
    $checkEmail = $conn->prepare("SELECT userId FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if($checkEmail->num_rows > 0){
        echo "Email entered is already in use";
        $checkEmail->close();
        exit;/*This stops the rest of the PHP from being executed so basically the code stops here if the condition is met*/
    }

    $checkEmail->close();/*You are probably wondering why I am closing the check email statement twice. So basically, the two 
    cannot happen together. If the email already exists, the php will stop after closing the check email statement but if it
    doesn't, the above if statement will entirely be skipped and now that we have ensured that there are no duplicates,
    shouldn't we free up the memory and use it for sth else?*/

    /*Password hashing */
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /*Insertion of the data */
    if($fname && $sname && $email !== ''){
        $stmt = $conn->prepare("INSERT INTO users (fname, sname, email, pnumber, comments) VALUES (?, ?, ?, ?, ?)" );
        $stmt->bind_param("sssss", $fname, $sname, $email, $pnumber, $comments);
        if($stmt->execute()){
            echo "Successful Insertion";
        }else{
            echo "Unsuccessful Insertion" . $stmt->error;
        }

        $stmt->close();/*This frees up memory used for prepared statements. It basically tells SQL, "I am done with this query." */
    }else{
        echo "Please enter all the required fields";
    }
    
}

$conn->close();/*This closes the database connection hence frees up server resources. It is important to do both stmt closure and this  */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Page</title>
    <link rel="icon" href="" type="image/x-ico">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <main>
        <form method="POST"><!--Notice that we are not putting action="" cz we are submitting the data to the same file-->
            <h1>FORM</h1>
            <div>
                <label for="fname">First name:</label>
                <input type="text" id="fname" name="fname" required>
                <!--There are 3 levels to ensure that no null values are entered in the database. First there's the HTML level which is
                putting required in fields that must have data. Then there is the PHP level which is checking if the post or get value
                is empty after trimming before insertion then there is the mysql level which is setting NOT NULL for fields that have
                have to be filled. You have to do all 3 for safety-->
            </div>
            <div>
                <label for="sname">Last name:</label>
                <input type="text" id="sname" name="sname" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="pnumber">Phone Number:
                    <br><p><span>*</span> Optional <span>*</span></p>
                </label>
                <input type="text" id="pnumber" name="pnumber">
            </div>
            <!--<div>
                <label for="password">Enter Password:</label>
                <input type="password" id="password" name="password" autocomplete="new-password" required>
            </div>-->
            <div class="comment">
                <label for="comment">Comments:</label>
                <p><span>*</span> Please fill in any inquiries or requests you may have <span>*</span></p>
                <textarea name="comment" id="comment"></textarea>
            </div>
            <button>SUBMIT</button>
        </form>
    </main>
</body>
</html>