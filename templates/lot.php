<?= include_template( 'templates/nav.php', [ 'categories' => $categories ] );?>
<section class="lot-item container">
    <h2><?=htmlspecialchars($lot['тфьу']);?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$lot['img'];?>" width="730" height="548" alt="<?= $lot['lot-name'] ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= $lot['cat_name'];?></span></p>
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
                        <span class="lot-item__cost"><?=htmlspecialchars($lot['initial_price']);?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?=htmlspecialchars(($lot['initial_price']+$lot['bet_step']));?>р</span>
                    </div>
                </div>
                <?php if ($showbetform): ?>
                <form class="lot-item__form" action="" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost"
                               placeholder="<?= ($lot['initial_price'] + $lot['bet_step']); ?>">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="history">
                <h3>История ставок (<span>10</span>)</h3>
                <table class="history__list">
                    <?php foreach ($bets as $bet): ?>
                        <tr class="history__item">
                            <td class="history_name"><?=$bet['username'];?></td>
                            <td class="history__price"><?=$bet['cost']; ?>р</td>
                            <td class="history__time"><?=timeform($bet['time']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>
}