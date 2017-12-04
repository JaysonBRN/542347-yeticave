<?= include_template( 'templates/nav.php', [ 'categories' => $categories ] ) ?>
    <form class="form form--add-lot container <?= count( $errors ) ? 'form--invalid' : '' ?>" action="add.php" method="post" enctype="multipart/form-data">
        <h2>Добавление лота</h2>

        <div class="form__container-two">
            <?php $classname = isset($errors['lot-name']) ? 'form__item--invalid': '';
            $value = isset($lot['lot-name']) ? $lot['lot-name']: ''; ?>
            <div class="form__item <?=$classname;?>">
                <label for="lot-name">Наименование</label>
                <input value="<?=$value;?>" id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота">
                <span class="form__error"><?= isset( $errors['lot-name'] ) ? $errors['lot-name'] : 'Введите наименование лота' ?></span>
            </div>
            <?php $classname = isset($errors['category']) ? 'form__item--invalid': ''; ?>
            <div class="form__item <?=$classname?>">
                <label for="category">Категория</label>
                <select id="category" name="category">
                    <option value="-1">Выберите категорию</option>
                    <?php foreach ( $categories as $category):?>
                    <option <?= $category['id'] === $lot['category'] ? 'selected="selected"' : '' ?> value="<?= $category['id'] ?>"><?=$category['name'];?></option>
                    <?php endforeach;?>
                </select>
                <span class="form__error"><?= isset( $errors['category'] ) ? $errors['category'] : 'Выберите категорию' ?></span>
            </div>
        </div>
        <?php $classname = isset($errors['description']) ? 'form__item--invalid': '';
            $value = isset($lot['description']) ? $lot['description']: ''; ?>
        <div class="form__item form__item--wide <?=$classname;?>">
            <label for="message">Описание</label>
            <textarea id="message" name="description" placeholder="Напишите описание лота" ><?=$value;?></textarea>
            <span class="form__error"><?= isset( $errors['description'] ) ? $errors['description'] : 'Выберите категорию' ?></span>
        </div>
        <?php $classname = isset($errors['lot-img']) ? 'form__item--invalid': '';
            $value = isset($lot['lot-img']) ? $lot['lot-img']: ''; ?>
        <div class="form__item form__item--file <?= $classname ?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button"></button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="lot-img" id="photo2" value="<?= $value ?>">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
            <span class="form__error"><?= isset( $errors['lot-img'] ) ? $errors['lot-img'] : '' ?></span>
        </div>
        <div class="form__container-three">
            <?php $classname = isset($errors['lot-rate']) ? 'form__item--invalid': '';
                $value = isset($lot['lot-rate']) ? $lot['lot-rate']: ''; ?>
            <div class="form__item form__item--small <?=$classname;?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $value ?>">
                <span class="form__error"><?= isset( $errors['lot-rate'] ) ? $errors['lot-rate'] : 'Введите начальную цену' ?></span>
            </div>
            <?php $classname = isset($errors['lot-step']) ? 'form__item--invalid': '';
                $value = isset($lot['lot-step']) ? $lot['lot-step']: ''; ?>
            <div class="form__item form__item--small <?=$classname;?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0"  value="<?= $value ?>">
                <span class="form__error">
                <span class="form__error"><?= isset( $errors['lot-step'] ) ? $errors['lot-step'] : 'Введите шаг ставки' ?></span></span>
            </div>
            <?php $classname = isset($errors['lot-date']) ? 'form__item--invalid': '';
                $value = isset($lot['lot-date']) ? $lot['lot-date']: ''; ?>
            <div class="form__item <?=$classname;?>">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $value ?>">
                <span class="form__error"><?= isset( $errors['lot-date'] ) ? $errors['lot-date'] : 'Введите дату завершения торгов' ?></span>
            </div>
        </div>
        <?php if(isset($errors)): ?>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <?php endif; ?>
        <button type="submit" class="button">Добавить лот</button>
    </form>
