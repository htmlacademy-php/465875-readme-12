<?php

define('POST_TEXT_LENGTH', 300);
function crop_post_text($text, $length = POST_TEXT_LENGTH)
{
    if (strlen($text) > $length) {
        $text_as_array = explode(" ", $text);
        $short_text    = '';
        for ($i = 0; $i < count($text_as_array); $i++) {
            $word = $text_as_array[$i];
            if (strlen($short_text) + strlen($word) <= $length) {
                $short_text = $short_text . $word . ' ';
            } else {
                break;
            }
        }

        return '<p>' . trim($short_text) . '...</p>
            <div class="post-text__more-link-wrapper">
                <a class="post-text__more-link" href="#">Читать далее</a>
            </div>
        ';
    }

    return '<p>' . $text . '</p>';
}

;

$post_types = [
    'quote' => 'post-quote',
    'text'  => 'post-text',
    'photo' => 'post-photo',
    'link'  => 'post-link',
    'video' => 'post-link',
];

?>

<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all filters__button--active"
                       href="#">
                        <span>Все</span>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--photo button" href="#">
                        <span class="visually-hidden">Фото</span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-photo"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--video button" href="#">
                        <span class="visually-hidden">Видео</span>
                        <svg class="filters__icon" width="24" height="16">
                            <use xlink:href="#icon-filter-video"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--text button" href="#">
                        <span class="visually-hidden">Текст</span>
                        <svg class="filters__icon" width="20" height="21">
                            <use xlink:href="#icon-filter-text"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--quote button" href="#">
                        <span class="visually-hidden">Цитата</span>
                        <svg class="filters__icon" width="21" height="20">
                            <use xlink:href="#icon-filter-quote"></use>
                        </svg>
                    </a>
                </li>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--link button" href="#">
                        <span class="visually-hidden">Ссылка</span>
                        <svg class="filters__icon" width="21" height="18">
                            <use xlink:href="#icon-filter-link"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="popular__posts">
        <?php
        foreach ($posts as $post): ?>
            <article class="popular__post post post-<?= $post['type'] ?>">
                <header class="post__header">
                    <h2>
                        <a href="#">
                            <?= $post['title'] ?>
                        </a>
                    </h2>
                </header>
                <div class="post__main">
                    <!--здесь содержимое карточки-->
                    <?php
                    if ($post_types['quote'] == ('post-' . $post['type'])): ?>
                        <blockquote>
                            <p><?= htmlspecialchars($post['text']) ?></p>
                            <cite><?= $post['user_name'] ?></cite>
                        </blockquote>
                    <?php
                    elseif ($post_types['link'] == $post['type']): ?>
                        <div class="post-link__wrapper">
                            <a class="post-link__external" href="http://<?= $post['text'] ?>" title="Перейти по ссылке">
                                <div class="post-link__info-wrapper">
                                    <div class="post-link__icon-wrapper">
                                        <img src="https://www.google.com/s2/favicons?domain=<?= $post['text'] ?>"
                                             alt="Иконка <?= $post['text'] ?>">
                                    </div>
                                    <div class="post-link__info">
                                        <h3><?= $post['title'] ?></h3>
                                    </div>
                                </div>
                                <span><?= $post['text'] ?></span>
                            </a>
                        </div>
                    <?php
                    elseif ($post_types['photo'] == $post['type']): ?>
                        <div class="post-photo__image-wrapper">
                            <img src="img/<?= $post['text'] ?>" alt="Фото от пользователя <?= $post['user_name'] ?>"
                                 width="360" height="240">
                        </div>
                    <?php
                    elseif ($post_types['video'] == $post['type']): ?>
                        <div class="post-video__block">
                            <div class="post-video__preview">
                                <?= embed_youtube_cover(''); ?>
                                <img src="img/coast-medium.jpg" alt="Превью к видео" width="360" height="188">
                            </div>
                            <a href="post-details.html" class="post-video__play-big button">
                                <svg class="post-video__play-big-icon" width="14" height="14">
                                    <use xlink:href="#icon-video-play-big"></use>
                                </svg>
                                <span class="visually-hidden">Запустить проигрыватель</span>
                            </a>
                        </div>
                    <?php
                    elseif ($post_types['text'] == $post['type']): ?>
                        <?= crop_post_text($post['text']) ?>
                    <?php
                    endif; ?>

                </div>
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="Автор">
                            <div class="post__avatar-wrapper">
                                <img class="post__author-avatar" src="img/<?= $post['avatar'] ?>"
                                     alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><?= $post['user_name'] ?></b>
                                <time
                                    class="post__time"
                                    datetime="<?= $post['publish_time'] ?>"
                                    title="<?= date_format(date_create($post['publish_time']), 'd.m.Y h:i') ?>">
                                    <?= date_to_human_readable($post['publish_time']) ?>
                                </time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                                     height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span><?= $post['like_count'] ?></span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        <?php
        endforeach; ?>
    </div>
</div>
