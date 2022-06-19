<?php
require_once './helpers.php';

$user_name = 'Владимир'; // укажите здесь ваше имя

$page_title = 'Имя страницы';

$posts = [
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'text' => 'Мы в жизни любим <script>alert(123)</script>только раз, а после ищем лишь похожих',
        'user_name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg',
        'publish_time' => generate_random_date(0),
    ],
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'text' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'user_name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg',
        'publish_time' => generate_random_date(1),
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'text' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'user_name' => 'Владик',
        'avatar' => 'userpic.jpg',
        'publish_time' => generate_random_date(2),
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'text' => 'Могу дождаться начала финального сезона своего любимого сериала! Мы в жизни любим только раз, а после ищем лишь похожих Не могу дождаться начала финального сезона своего любимого сериала!',
        'user_name' => 'Владик',
        'avatar' => 'userpic.jpg',
        'publish_time' => generate_random_date(3),
    ],
    [
        'title' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'text' => 'rock-medium.jpg',
        'user_name' => 'Виктор',
        'avatar' => 'userpic-mark.jpg',
        'publish_time' => generate_random_date(4),
    ],
    [
        'title' => 'Моя мечта',
        'type' => 'post-photo',
        'text' => 'coast-medium.jpg',
        'user_name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg',
        'publish_time' => generate_random_date(5),
    ],
    [
        'title' => 'Лучшие курсы',
        'type' => 'post-link',
        'text' => 'www.htmlacademy.ru',
        'user_name' => 'Владик',
        'avatar' => 'userpic.jpg',
        'publish_time' => generate_random_date(6),
    ],
];

$page_content = include_template('main.php', [
    'posts' => $posts,
]);

$page = include_template('layout.php', [
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => $page_title,
]);

print($page);
?>
