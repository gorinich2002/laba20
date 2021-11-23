<?

include 'connect.php';
include 'header.php';

?>

<h3>Sign in</h3>

<?
if(isset($_SESSION['signed_id']) &&$_SESSION['signed_in']==true){
echo 'You are already signed in, you can <a href="signout.php">sing out</a> if you want';
}else{
    if($_SERVER['REQUEST_METHOD']!='POST'){
        echo'
        <form action="" method="post">
            Username: <input type="text" name="user_name">
            Password: <input type="password" name="user_pass">
            <input type="submit" value="Sign in">
            
        </form>';

    }else{
        $errors = array();
        if(!isset($_POST['user_name'])){
                $errors[] = 'The username field must not be empty.';
            }
        if(!isset($_POST['user_pass'])){
            $errors[] = 'The password field cannot be empty.';
        }
        
    
        if(!empty($errors)){
            echo 'Uh-oh .. a couple of fields are not filled in correctly';
            echo '<ul>';
            foreach ($errors as $key=>$value)
            {
                echo '<li>';
            }
            echo '</ul>';
        }
        else 
        {
            $sql = "SELECT user_id, user_name, user_level FROM users Where user_name= '" .mysqli_real_escape_string($link, $_POST['user_name']) . "' AND  user_pass = '" .sha1($_POST['user_pass']) . "'";
            $result = mysqli_query($link, $sql);
            if (!$result)
            {
                echo 'Something went wrong while registering.';
                echo mysqli_error();
    
            }
            else 
            {
             
                if(mysqli_num_rows($result)== 0){
                    echo 'You have supplied a wrong user/password combination';
                }else{
                    $_SESSION['signed_in'] = True;
                    while($row = mysqli_fetch_assoc($result)){
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
                
                    echo 'Welcome,'.$_SESSION['user_name'];
                }
            }
    
        }
    }
}
include 'footer.php';

?>