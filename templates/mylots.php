<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <?php foreach ($lotbet as $key => $value): ?>
        <tr class="rates__item">
            <td class="rates__info">
                <div class="rates__img">
                    <img src="img/rate1.jpg" width="54" height="40" alt="Сноуборд">
                </div>
                <h3 class="rates__title"><a href="lot.html"><?=$lot[$value['lot-name']];?></a></h3>
            </td>
            <td class="rates__category">
                Доски и лыжи<?=$value[''] ?>
            </td>
            <td class="rates__timer">
                <div class="timer timer--finishing">07:13:34</div>
            </td>
            <td class="rates__price">
                10 999 р<?=$value['cost']; ?>
            </td>
            <td class="rates__time">
                <?=timeform($value['time']); ?>
            </td>
        </tr>
        <tr class="rates__item">
            <td class="rates__info">
        </tr>
        <?php endforeach; ?>
    </table>
</section>