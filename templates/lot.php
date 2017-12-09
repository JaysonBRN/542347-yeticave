<?= include_template( 'templates/nav.php', [ 'categories' => $categories ] );?>
<section class="lot-item container">
    <h2><?=htmlspecialchars($lot['lot-name']);?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$lot['lot-img'];?>" width="730" height="548" alt="<?= $lot['lot-name'] ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= getCategoryById( $lot['category'], $categories )['name'];?></span></p>
            <p class="lot-item__description"><?=htmlspecialchars($lot['description']);?></p>
        </div>
        <div class="lot-item__right">
            <?php if (isset($autorizedUser)): ?>
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    10:54:12
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?=htmlspecialchars($lot['lot-rate']);?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?=htmlspecialchars(($lot['lot-rate']+$lot['lot-step']));?>р</span>
                    </div>
                </div>
                <?php if (isset($lotbetuser['lotid'])) {
                        if ($lotbetuser['lotid'] != $lot['id']) { ?>
                <form class="lot-item__form" action="" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost"
                               placeholder="<?= ($lot['lot-rate'] + $lot['lot-step']); ?>">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
                <?php }
                } ?>
            </div>
            <?php endif; ?>
            <div class="history">
                <h3>История ставок (<span>10</span>)</h3>
                <table class="history__list">
                    <?php foreach ($lotbetuser as $betsdata): ?>
                        <tr class="history__item">
                            <td class="history_name"><?=$betsdata['username'];?></td>
                            <td class="history__price"><?=$betsdata['cost']; ?>р</td>
                            <td class="history__time"><?=timeform($betsdata['time']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>
}