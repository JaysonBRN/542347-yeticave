<?php
$categories = [
                [
                    'name' => 'Доски и лыжи',
                ],
                [
                    'name' => 'Крепления',
                ],
                [
                    'name' => 'Ботинки',
                ],
                [
                    'name' => 'Одежда',
                ],
                [
                    'name' => 'Инструменты',
                ],
                [
                    'name' => 'Разное',
                ]
            ];
?>
<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <form class="form form--add-lot container" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item">
                <?php $classname = isset($errors['Наименование']) ? 'form__item--invalid':
                $value = isset($lot['lot-name']) ? $lot['lot-name']: ''; ?>
                <label for="lot-name">Наименование</label>
                <input class="<?=$classname;?>" value="<?=$value;?>" id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
                <span class="form__error">Введите наименование лота</span>
            </div>
            <div class="form__item">
                <label for="category">Категория</label>
                <select id="category" name="category">
                    <?php foreach ($categories as $k => $val):?>
                    <option><?=$val['name'];?></option>
                    <?php endforeach;?>
                </select>
                <span class="form__error">Выберите категорию</span>
            </div>
        </div>
        <div class="form__item form__item--wide">
            <?php $classname = isset($errors['Описание']) ? 'form__item--invalid':
                $value = isset($lot['description']) ? $lot['description']: ''; ?>
            <label for="message">Описание</label>
            <textarea class="<?=$classname;?>" id="message" name="description" placeholder="Напишите описание лота" required><?=$value;?></textarea>
            <span class="form__error">Напишите описание лота</span>
        </div>
        <div class="form__item form__item--file"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button"></button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="lot-img" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
                <span class="form__error">Введите начальную цену</span>
            </div>
            <div class="form__item form__item--small">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                <span class="form__error">Введите шаг ставки</span>
            </div>
            <div class="form__item">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
                <span class="form__error">Введите дату завершения торгов</span>
            </div>
        </div>
        <?php if(isset($errors)): ?>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <?php endif; ?>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
