<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <?php foreach ( $lotbet as $key => $bet): ?>
        <tr class="rates__item">
            <td class="rates__info">
                <div class="rates__img">
                    <img src="<?= $bet['lot-img'] ?>" width="54" height="40" alt="Сноуборд">
                </div>
                <h3 class="rates__title"><a href="/lot.php?id=<?= $bet['lot-id'] ?>"><?= $bet['lot-name']?></a></h3>
            </td>
            <td class="rates__category">
                <?= $bet['category-name'] ?>
            </td>
            <td class="rates__timer">
                <div class="timer timer--finishing">07:13:34</div>
            </td>
            <td class="rates__price">
                10 999 р<?=$bet['cost']; ?>
            </td>
            <td class="rates__time">
                <?=timeform($bet['time']); ?>
            </td>
        </tr>
        <tr class="rates__item">
            <td class="rates__info">
        </tr>
        <?php endforeach; ?>
    </table>
</section>