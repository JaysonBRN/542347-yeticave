<?=include_template('templates/nav.php', ['categories' => $categories]);?>
<form class="form container <?=count($errors) ? 'form--invalid' : '';?>" action="login.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Вход</h2>
    <?php $classname = isset($errors['email']) ? 'form_item--invalid' : '';
    $value = isset($form['email']) ? $form['email'] : '';?>
    <div class="form__item <?=$classname;?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input value="<?=$value;?>" id="email" type="text" name="email" placeholder="Введите e-mail">
        <span class="form__error"><?=isset($errors['email']) ? $errors['email'] : 'Введите E-mail';?></span>
    </div>
    <?php $classname = isset($errors['password']) ? 'form_item--invalid' : '';?>
    <div class="form__item form__item--last <?=$classname;?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль">
        <span class="form__error"><?=isset( $errors['password'] ) ? $errors['password'] : 'Введите пароль';?></span>
    </div>
    <?php if(isset($errors)): ?>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Войти</button>
</form>