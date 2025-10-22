<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = trim($_POST['fname']) ?? '';
    $sname = trim($_POST['sname']) ?? '';
    $email = trim($_POST['email']) ?? '';
    $pnumber = trim($_POST['pnumber']) ?? '';
    $comments = trim($_POST['comment']) ?? '';

    $stmt = $conn->prepare("INSERT INTO users (fname, sname, email, pnumber, comments) VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssss", $fname, $sname, $email, $pnumber, $comments);
    if($stmt->execute()){
        echo "Inserted successfully";
    }else{
        echo "Unsuccessful insertion" . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
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
                <input type="text" id="fname" name="fname" autocomplete="off">
            </div>
            <div>
                <label for="sname">Last name:</label>
                <input type="text" id="sname" name="sname" autocomplete="off">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" autocomplete="off">
            </div>
            <div>
                <label for="pnumber">Phone Number:
                    <br><p><span>*</span> Optional <span>*</span></p>
                </label>
                <input type="text" id="pnumber" name="pnumber" autocomplete="off">
            </div>
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