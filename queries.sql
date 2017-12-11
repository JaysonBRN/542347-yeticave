INSERT INTO categories SET cat_name = 'Доски и лыжи', css_class = 'boards';
INSERT INTO categories SET cat_name = 'Крепления', css_class = 'attachment';
INSERT INTO categories SET cat_name = 'Ботинки', css_class = 'boots';
INSERT INTO categories SET cat_name = 'Одежда', css_class = 'clothing';
INSERT INTO categories SET cat_name = 'Инструменты', css_class = 'tools';
INSERT INTO categories SET cat_name = 'Разное', css_class = 'other';
INSERT INTO users SET username = 'Игнат', email = 'ignat.v@gmail.com', dt_reg = '2017.11.11 02:03:04', pass = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka';
INSERT INTO users SET username = 'Леночка', email = 'kitty_93@li.ru', dt_reg = '2017.11.13 02:03:04', pass = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa';
INSERT INTO users SET username = 'Руслан', email = 'warrior07@mail.ru', dt_reg = '2017.11.20 02:03:04', pass = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW';
INSERT INTO bets SET dt_add = '2017.12.08 03:04:05', amount = '15000', user_id = '1', lot_id = '3';
INSERT INTO bets SET dt_add = '2017.12.03 05:06:07', amount = '14000', user_id = '3', lot_id = '3';
INSERT INTO lots SET dt_create = '2017.11.28 05:06:07', name = '2014 Rossignol District Snowboard', cat_id = '1', user_id = '2', description = 'Пусто', img = '/img/lot-1.jpg', initial_price = '10999', dt_over = '2017.12.29', bet_step = '10';
INSERT INTO lots SET dt_create = '2017.11.28 05:06:07', name = 'DC Ply Mens 2016/2017 Snowboard', cat_id = '1', user_id = '2', description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', img = '/img/lot-2.jpg', initial_price = '15999', dt_over = '2017.12.29', bet_step = '10';
INSERT INTO lots SET dt_create = '2017.11.28 05:06:07', name = 'Крепления Union Contact Pro 2015 года размер L/XL', cat_id = '2', user_id = '2', description = 'Пусто', img = '/img/lot-3.jpg', initial_price = '8000', dt_over = '2017.12.29', bet_step = '10';
INSERT INTO lots SET dt_create = '2017.11.28 05:06:07', name = 'Ботинки для сноуборда DC Mutiny Charocal', cat_id = '3', user_id = '2', description = 'Пусто', img = '/img/lot-4.jpg', initial_price = '10999', dt_over = '2017.12.29', bet_step = '10';
INSERT INTO lots SET dt_create = '2017.12.02 11:12:13', name = 'Куртка для сноуборда DC Mutiny Charocal', cat_id = '4', user_id = '2', description = 'Пусто', img = '/img/lot-5.jpg', initial_price = '7500', dt_over = '2017.12.29', bet_step = '10';
INSERT INTO lots SET dt_create = '2017.12.04 13:14:15', name = 'Маска Oakley Canopy', cat_id = '6', user_id = '3', description = 'Пусто', img = '/img/lot-6.jpg', initial_price = '5400', dt_over = '2018.01.05', bet_step = '10';


SELECT name FROM categories;

SELECT * FROM lots WHERE name LIKE '' OR description LIKE '';
UPDATE lots SET name = '' WHERE id = '';
SELECT * FROM bets WHERE id ='' ORDER BY dt_add DESC;