<?php
include 'ajax.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AJAX CRUD</title>
    <script src="js/jquery_1.1.js"></script>
    <style type="text/css">
            .form_password {
                width: 100%;
            }
        </style>
</head>
<body>
    <div id="wrapper">
        <span id="ok" style="display:none;"><img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/checkmark-24-32.png" alt=""></span>
        <span id="error" style="display:none;"><img src="https://cdn0.iconfinder.com/data/icons/feather/96/no-32.png" alt=""></span>
        <div class="form">
            <form action="/" method="post">
                <input type="text" name="login" placeholder="Имя">
                <br/>
                <input type="password" name="password" placeholder="Пароль">
                <br/>
            </form>
        </div>
    </div>
</div>
<script>
            $(document).ready(function () {
                    //start
                    function runAjax(){
                        var login = $('input[name=login]').val();
                        var password = $('input[name=password]').val();
                        if ((login && password) !== "") {
                            $.ajax({
                                    url: 'ajax.php',
                                    type: 'POST',                                                        
                                    cache: false,
                                    dataType: 'json',
                                    data: {l:login,p:password},
                                    success:function(data) {
                                        if(data.json){
                                            $('#ok').fadeIn('fast');
                                        }else{
                                            $('#error').fadeIn('fast');
                                        }
                                    }
                                });
                        }
                    }; 
                    $('input[name=password]').blur(function(){
                            setTimeout(runAjax,500);
                        });

                    //end
                });

        </script>
</body>
</html>