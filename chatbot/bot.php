<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS ChatBot</title>
    <link rel="shortcut icon" type="image/ico" href="../img/logo.jpg"/>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>

    <style type="text/css">
        #particles-js{
        position: absolute;
        left: 0px;
         top: 0px;
         right: 0px;
        z-index: -1;
        width: 100%;
        background: #000;
      }
    </style>
</head>
<body style="background: #000">
     <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation" style="background-color: rgba(0,0,0,0.8);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#">JOSCO COURSE WARE</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder" style="font-size: 18px;">
                    <ul class="nav navbar-nav navbar-right">

                         <li><a href="../index.php"><i class="fas fa-home"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
     <div id="particles-js"></div>
    <div class="wrapper">
        <div class="title">LMS ChatBot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
  <script type="text/javascript" src="../particles/particles.js"></script>
<script type="text/javascript" src="../particles/app.js"></script>   
</body>
</html>