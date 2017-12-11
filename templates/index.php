    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $cat): ?>
            <li class="promo__item promo__item--<?=$cat['css_class']; ?>">
                <a class="promo__link" href="/index.php?cat_id=<?=$cat['id'];?>"><?=$cat['cat_name'];?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach ($lots as $lot): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$lot['img']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$lot['cat_name']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$lot['id'];?>"><?=htmlspecialchars($lot['name']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=htmlspecialchars($lot['initial_price']); ?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">                   
                            <?=getTimeRemaining($lot['dt_over']);?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>