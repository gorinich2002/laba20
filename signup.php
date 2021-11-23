<? include 'connect.php';
 include 'header.php';
?>
<h3>Sign up</h3>
<?
if($_SERVER["REQUEST_METHOD"]!='POST'){
    include 'form.php';
}else{
    $errors = array();
    if(isset($_POST['user_name'])){
        if(!ctype_alnum($_POST['user_name'])){
            $errors[]='The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) >30){
            $errors[]= 'The username cannot be longer than 30 characters.';
        }
    }else{
        $errors[] = 'The username field must not be empty.';
    }
    if(isset($_POST['user_pass'])){
        if($_POST['user_pass']!=$_POST['user_pass_check']){
            $errors[]='The two passwords did not match.';
        }
    }else{
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
        
        $sql = "INSERT INTO users(user_name, user_pass, user_email, user_date, user_level)
        VALUES('" . mysqli_real_escape_string($link,$_POST['user_name']) . "',
        '" . sha1($_POST['user_pass']) . "',
        '" . mysqli_real_escape_string($link,$_POST['user_email']) . "',
            NOW(),
            0)";
        $result = mysqli_query($link, $sql);
        if (!$result)
        {
            echo 'Something went wrong while registering.';

        }
        else 
        {
            echo 'Successfully registered.';
        }

    }

}

include 'footer.php';

?>

 