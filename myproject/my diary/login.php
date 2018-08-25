<?php

    session_start();                                    //在所有程序运行前，启用session,记住登陆用户的相关信息。

    if($_GET["退出"]==1 AND $_SESSION['id']){                           //点击退出时，使用户退出登录。

        session_destroy();

        $message = "您已经成功退出！";
    }

    include("connection.php");                  //调用数据库连接脚本，由于很多脚本都需要调用，将他单独存放。

    //前台输入域校验
    if($_POST['submit'] == "注册" ){

        if(!$_POST['email']){                               //邮箱校验

            $error =  "</br /> 请输入邮箱";
        }else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

            $error = "</br /> 您输入的邮箱有误";
        }

        if(!$_POST['password']){                            //密码校验

            $error .=  "</br /> 请输入您的密码";

        }else{
            if(strlen($_POST['password'])<8){               //密码长度不能小于8位

                $error .=  "</br /> 请输入8位以上的密码";
            }
            if(!preg_match('/[A-Z]/',$_POST['password'])){  //密码需要包含大写字母

                $error .=  "</br /> 您输入的密码需要包含大写字母";
            
            }

        }
        if($error){
            $error = "您的录入有如下错误".$error;
        }else{                                              // 录入信息没有错误，执行如下代码

            if (mysqli_connect_error()){ 
        
                die("数据库连接错误！");                //停止数据库相关运行，并输出错误。
            }
        
        
           $query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'"; //.相当于java中的+  mysqli_real_escape_string是为了防止黑客攻击,SQL注入
    
    
            $result = mysqli_query($link,$query);
    
            $results = mysqli_num_rows($result);
    
            if($results){                           //查询数据库，如果邮箱重复，提示用户已经被注册。

                $error = "该邮箱已经被注册";
            }else{                                 //否则，将用户信息写入数据库

                $query = "INSERT INTO  users( email,password) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";//好复杂😂，将信息写入数据库，同样是防SQL注入,密码用想将邮箱用md5加密，之后再与密码进行md5二次加密
                
                $result = mysqli_query($link,$query);

                if($result){

                    $success =  "恭喜您，注册成功!";

                    $_SESSION['id'] = mysqli_insert_id($link);   //将注册用户的ID赋值给session id

                    //重定向到log in界面

                    header("Location:mainpage.php"); //使用header命令实现跳转。要放在所有html之前。
            
                }
            }

        }

    }

    if($_POST['submit'] == "登陆" ){

        if (mysqli_connect_error()){ 
        
            die("数据库连接错误！");      
        }

        $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['emaillogin'])."' AND password = '".md5(md5($_POST['emaillogin']).$_POST['passwordlogin'])."' LIMIT 1"; //查询数据库如果账户和密码能查询到，用户可以登陆，否则报错。

        $result =  mysqli_query($link,$query); //针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。

        if( $row = mysqli_fetch_array($result)){             //结果集中能查询到有存在的行，则返回true
            
            $success =  "登陆成功";

            $_SESSION['id'] = $row['id'];   //将查询到的当前列的id字段赋值给session变量

            // print_r($_SESSION['id']);

            header("Location:mainpage.php");

        }else{ 

            $error =  "您输入的邮箱或密码有误，请重新输入!";
        }


    } 
?>