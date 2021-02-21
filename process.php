<?php include_once 'chocolates.php'; ?>
<?php include_once 'algorithm.php'; ?>
<?php session_start(); ?>

<?php

    if (isset($_POST['register_user']))
    {
        $con = getCon();

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $u = strtolower($user_name);
        
        $one = generate_password($password);
        $two = generate_password($password);
        $three = generate_password($password);
        $four = generate_password($password);
        
        //echo $one."<br>";
        //echo $two."<br>";
        //echo $three."<br>";
        //echo $four."<br>";
  
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (rowExists('user', 'user_name', $u))
        {
            header("Location:index.php?what=user_exists");
            die();

        }
        else if (rowExists('user', 'email', $email))
        {
            header("Location:index.php?which=email_exists");
            die();
        }
        else
        {
            if (($con->query("insert into user(user_name,main_password,email,first_name,last_name) values('$u','$password','$email','$first_name','$last_name');")) === True)
            {
                $user_id = Array();
                $sql = "select user_id from user where user_name='$u' and email='$email'";
                $res = $con->query($sql);
                while($ans = $res->fetch_assoc())
                    $user_id[]=$ans['user_id'];
                
                $con->query("insert into algorithm(user_id,password_name,secure_password) values('$user_id[0]','Google','$one')");
                $con->query("insert into algorithm(user_id,password_name,secure_password) values('$user_id[0]','Instagram','$two')");
                $con->query("insert into algorithm(user_id,password_name,secure_password) values('$user_id[0]','Netflix','$three')");
                $con->query("insert into algorithm(user_id,password_name,secure_password) values('$user_id[0]','LinkedIn','$four')");
                
                header("Location:index.php?which=login_now");
                die();
            }
            else
            {
                header("Location:index.php?which=register_error");
                die();
            }
        }
    }


    function check_password($user_name, $password)
    {
    
        $con = getCon();
    
        $user = $con->query("select * from user where user_name='$user_name';");
        $res = $user->fetch_assoc();
    
        //echo var_dump($res) . "<br>";
    
        $password_hash = $res['main_password'];
    
        if (password_verify($password, $password_hash)) {
            echo "password verified<br>";
            return True;
        } else {
            echo "password not verified<br>";
            return False;
        }
    }


    if (isset($_POST['login_user'])) {
    
        $user_name = $_POST['user_name'];
        $user_name = strtolower($user_name);
        $password  = $_POST['password'];
    
        if (rowExists('user', 'user_name', $user_name)) {
            if (check_password($user_name, $password)) {
                
                $_SESSION['user_name'] = $user_name;
                header("Location:justonepassword.php");
                die();
                
            } else {
                
                $wrongpassword = true;
                header("Location:index.php?which=wrong_password");
               
            }
        } else {
            
            header("Location:index.php?which=user_doesnt_exist");
            die();
            
        }
    }

?>
