use readme;

-- Напишите запросы для добавления информации в БД:
-- список типов контента для поста;
INSERT INTO
  content_types
SET
  content_type_name = 'quote',
  content_class = 'post-quote';

INSERT INTO
  content_types
SET
  content_type_name = 'text',
  content_class = 'post-text';

INSERT INTO
  content_types
SET
  content_type_name = 'photo',
  content_class = 'post-photo';

INSERT INTO
  content_types
SET
  content_type_name = 'link',
  content_class = 'post-link';

INSERT INTO
  content_types
SET
  content_type_name = 'video',
  content_class = 'post-video';

-- придумайте пару пользователей;
INSERT INTO
  users
SET
  user_email = 'vlad@demo.ru',
  user_login = 'vlad',
  user_password = '123',
  user_avatar = 'userpic.jpg';

INSERT INTO
  users
SET
  user_email = 'maks@demo.ru',
  user_login = 'maks',
  user_password = 'maks',
  user_avatar = 'userpic.jpg';

-- придумайте пару комментариев к разным постам;
INSERT INTO
  comments
SET
  comment_content = 'Крутой пост!',
  comment_user_id = '1',
  comment_post_id = '1';

INSERT INTO
  comments
SET
  comment_content = 'Большое спасибо за такой пост.',
  comment_user_id = '1',
  comment_post_id = '1';

INSERT INTO
  comments
SET
  comment_content = 'Ну такое...',
  comment_user_id = '2',
  comment_post_id = '2';

-- существующий список постов.
INSERT INTO
  posts
SET
  post_title = 'Цитата',
  post_content = 'Мы в жизни любим <script>alert(123)</script>только раз, а после ищем лишь похожих',
  post_quote_author = 'Larisa',
  post_user_id = '1',
  post_type = '1',
  post_hashtag = '1',
  post_views_count = '10';

INSERT INTO
  posts
SET
  post_title = 'Игра престолов',
  post_content = 'Не могу дождаться начала финального сезона своего любимого сериала!',
  post_user_id = '1',
  post_type = '1',
  post_hashtag = '2',
  post_views_count = '100';

INSERT INTO
  posts
SET
  post_title = 'Моя мечта',
  post_content = 'Не могу дождаться начала финального сезона своего любимого сериала!',
  post_user_id = '1',
  post_type = '1',
  post_hashtag = '3',
  post_views_count = '1';

-- Напишите запросы для этих действий:
-- получить список постов с сортировкой по популярности и вместе с именами авторов и типом контента;
SELECT
  posts.post_title,
  posts.post_content,
  posts.post_views_count,
  posts.post_quote_author,
  content_types.content_type_name
FROM
  posts
  JOIN users ON posts.post_user_id = users.id
  JOIN content_types ON posts.post_type = content_types.id
ORDER BY
  post_views_count DESC;

-- получить список постов для конкретного пользователя;
SELECT
  *
FROM
  posts
WHERE
  post_user_id = 1;

-- получить список комментариев для одного поста, в комментариях должен быть логин пользователя;
SELECT
  comments.id,
  comment_created,
  comment_content,
  users.user_login
FROM
  comments
  JOIN users ON comments.comment_user_id = users.id
WHERE
  comment_user_id = 2;

-- добавить лайк к посту;
INSERT INTO
  likes
SET
  like_user_id = 1,
  like_post_id = 2;

-- подписаться на пользователя.
INSERT INTO
  subscribes
SET
  subscribe_user_id = 1,
  subscribe_follower_id = 2;
