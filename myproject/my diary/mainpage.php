<?php

    include("login.php");

    session_start();

    include("connection");


    $query="SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
	
	$result = mysqli_query($link, $query);
	
	$row = mysqli_fetch_array($result);
	
    $diary = $row['diary'];
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    
        .navbar-brand {
			font-size:1.8em;
			font-weight:bold;
        }
        
        .backgroudIamge {
            background-image: url("image/background.jpg");
            height: 550px;
            border-radius: 0px;
        }

        .mainform {

            padding-left:35%;
        }

        textarea {

            margin-top:80px;
            margin:auto;
        }

 
   
    </style>
  </head>
  
  <body>

    <div class="navbar navbar-default navbar-fixed-top">
  	
        <div class="container">
      
            <div class="navbar-header">
            
                <a class="navbar-brand">私密日记</a>
            
            </div>

            <div class="pull-right">
                    
                <ul class="navbar-nav nav pull-right">
                    
                    <li><a class = " btn btn-success "href="index.php?退出=1">退 出</a></li> <!--设置跳转到主页，并将退出设置为1，方便在index页面清空session -->
                        
                </ul>
                    
            </div>
        </div>
      
    </div>
  

    <div class="jumbotron contentContainer text-center backgroudIamge mb-0">                 <!--使用bootstrap中的超大屏幕junbotron类 text-center内容居中-->
        
        <div class="row">
  			
  			<!-- <div class="col-md-6 col-md-offset-3" id="topRow"> -->
  			
                <textarea class ="col-md-6 col-md-offset-3" name = "diary"><?php echo $diary ?></textarea>
                  
  			
  			<!-- </div> -->
  		
  		</div>
        
    </div>  
    

  	<script>
  		
  		$(".contentContainer").css("min-height",$(window).height());
  		
        $("textarea").css("min-height",$(window).height()*0.8);
          
        $("textarea").keyup(function(date){                          //当在此区域输入内容时，实时调用keyup函数

            
            $.post("updatediary.php",{diary:$("textarea").val()});   //ajax方法，将textarea的值赋值给diary变量，同时调用updatediary脚本，将数据插入数据库中。


        });

  		
  	</script>


</body>
</html>




