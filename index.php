<html>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </HEAD>
    <body >
        <div class="regestration">
            <?php
            require_once 'data/var.php';
            require_once 'data/db_release.php';
//проверка нажатия кнопки
            if (isset($_POST['reg_click'])) {
                $user_name = @$_POST['login'];
                $user_pass = @$_POST['pass'];
                require_once 'data/functions.php';
            }
            if (strlen($reg_text) > 0) ?> <p id="reg_message"><?php echo $reg_text; ?></p> 
            <?php
            require_once 'data/reg_form.php';
            ?>
        </div>
    </body>
</html>