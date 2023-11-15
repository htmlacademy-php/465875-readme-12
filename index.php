<?php

require_once './config/database.php';
require_once './helpers.php';

// В сценарии главной страницы выполните подключение к MySQL.
$connect = mysqli_connect(
    $database['host'],
    $database['user'],
    $database['password'],
    $database['database'],
    $database['port']
);

// Отправьте SQL-запрос для получения типов контента.
$get_types = 'SELECT * FROM content_types';
$result    = mysqli_query($connect, $get_types);
$rows      = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Отправьте SQL-запрос для получения списка постов, объединённых с пользователями и отсортированный по популярности.
$get_posts = '
SELECT p.id,
       post_title              AS title,
       content_type_name       AS type,
       post_content            AS text,
       user_name,
       user_avatar             AS avatar,
       post_created            AS publish_time,
       COUNT(l.id)             AS like_count,
       post_views_count
FROM posts p
         LEFT JOIN
     users u ON p.post_user_id = u.id
         LEFT JOIN
     content_types ct ON ct.id = p.post_type
         LEFT JOIN
     likes l ON l.like_post_id = p.id
GROUP BY p.id
ORDER BY like_count DESC';

$result_posts = mysqli_query($connect, $get_posts);
$rows_posts   = mysqli_fetch_all($result_posts, MYSQLI_ASSOC);

$user_name = 'Владимир'; // укажите здесь ваше имя

$page_title = 'Имя страницы';

$page_content = include_template('main.php', [
    'posts' => $rows_posts,
]);

$page = include_template('layout.php', [
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => $page_title,
]);

print($page);
