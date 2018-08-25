<?php

    include("login.php"); //将登陆的php代码，单独存放一个脚本，在本脚本中调用。代码逻辑更加清晰

?>
<!DOCTYPE html>
<html lang="en"><head>


<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="js/jquery-3.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="js/popper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
    <title>我的小秘密</title>
    
    <style>

    
        .backgroudIamge {
            background-image: url("image/background.jpg");
            height: 550px;
            border-radius: 0px;
        }

        .mainform {

            padding-left:35%;
        }

 
   
    </style>
  </head>
  
  <body>

    <div class="navbar navbar-default navbar-fixed-top">
  	
      <div class="container">
      
          <div class="navbar-header">
          
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  
              </button>
              
              <a class="navbar-brand">私密日记</a>
          
          </div>
          
          <div class="collapse navbar-collapse">
          
              
              
              <form class="navbar-form navbar-right" method="post">
              
                  <div class="form-group">
                  
                      <input type="email" name="emaillogin" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['emaillogin']); ?>"/>
                  
                  </div>
                  
                  <div class="form-group">
                  
                      <input type="password" name="passwordlogin" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['passwordlogin']); ?>" />
                  
                  </div>
              
                  <input type="submit"  name="submit" class="btn btn-success" value="登陆" >
                  
              </form>
              
          </div>
      
      </div>
  
    </div>

    <div class="jumbotron text-center backgroudIamge mb-0">                 <!--使用bootstrap中的超大屏幕junbotron类 text-center内容居中-->

        <h1 class="display-4">我的小秘密</h1>       <!--使用bootstrap中的display-4字体展示-->

        <p class="lead">无论何时何地，随时记录你的私密日记。 </p>

        <p>如果您感兴趣请<strong>注册！</strong></p>

        <form method="post" class = "mainform">

            <?php 
            
                if($error){
                    echo "<div class = \"alert col-sm-5 alert-danger\">".$error."</div>";
                }
                if($success){
                    echo "<div class = \"alert col-sm-5 alert-success\">".$success."</div>";
                }
                if($message){
                    echo "<div class = \"alert col-sm-5 alert-success\">".$message."</div>";
                }
            
            ?>            
            
            <div class="form-group row ">                                                       <!--内容设置在同一行需要添加row-->

                <label for="email" class="col-sm-1 col-form-label">邮 箱</label>            
                <div class="col-sm-4">                                                    
                    <input  type ="email" name ="email" class="form-control" placeholder="请输入您的邮箱" value="<?php echo addslashes($_POST['email']); ?>"/>   <!--php代码使提交之后的邮箱保留，不被清空;addslashes使变量中遇到"自动加 \-->
                </div>

            </div>



            <div class="form-group row">

                    <label for="password" class="col-sm-1 col-form-label">密 码</label>
                    <div class="col-sm-4">
                        <input class="form-control " type = "password" name= "password" placeholder="请输入您的密码" value="<?php echo addslashes($_POST['password']); ?>"/>
                    </div>

            </div>

            <div class="form-group row">

                <div class="col-sm-4">
                    <input  class="btn btn-success"  type = "submit"  name = "submit" value = "注册" />
                </div>

            </div>

        </form>   

    </div>  
    

  
</body>

</html>




