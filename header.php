<?session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="stili.css">
</head>
<body>
    <h1>My forum</h1>
        <div id="wrapper">
            <div id="menu">
                <a href="/forum/index.php" class="item">Home</a>-
                <a href="/forum/create_topic.php" class="item">Create a topic</a>-
                <a href="/forum/create_cat.php" class="item">Create a category</a>
            </div>
            <div id="userbar">
                <?
                   
                    if($_SESSION['signed_in']){
                        echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';
                    }else{
                        echo '<a href="signin.php">Sign in</a>';
                    }
                ?>
            </div>
       
            <div id="content">