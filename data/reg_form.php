<!--форма воода логина и пароля-->
<form method="post" enctype="multipart/form-data">
    <label>Логин:</label>
    <input type="text" name="login" placeholder="Введите логин" title="<?php echo $t_login; ?>"/>
    <label>Пароль:</label>
    <input type="password" name="pass" placeholder="Введите пароль" title="<?php echo $t_pass; ?>"/>
    <input type="password" name="pass2" placeholder="Пароль еще раз" title="<?php echo $t_pass; ?>" />
    <input type="submit" name="reg_click" value="Регистрация" title="<?php echo $t_bottom; ?>"/>
</form>  