CREATE DATABASE readme
  DEFAULT CHARACTER SET utf8;

use readme;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_registered DATETIME DEFAULT CURRENT_TIMESTAMP,
  user_email VARCHAR(100) NOT NULL UNIQUE,
  user_login VARCHAR(60) NOT NULL UNIQUE,
  user_password VARCHAR(255) NOT NULL,
  user_avatar TEXT
);

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  post_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  post_title VARCHAR(255),
  post_content LONGTEXT,
  post_quote_author VARCHAR(100),
  post_image INT,
  post_video VARCHAR(255),
  post_url VARCHAR(255),
  post_views_count INT,
  post_user_id INT,
  post_type INT,
  post_hashtag INT
);

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  comment_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  comment_content TEXT NOT NULL,
  comment_user_id INT,
  comment_post_id INT
);

CREATE TABLE likes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  like_user_id INT,
  like_post_id INT
);

CREATE TABLE subscribes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subscribe_user_id INT,
  subscribe_follower_id INT
);

CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  message_content TEXT,
  message_user_id INT,
  message_recipient_id INT
);

CREATE TABLE hashtages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hashtag_name VARCHAR(20) UNIQUE
);

CREATE TABLE content_types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content_type_name VARCHAR(255) UNIQUE,
  content_class VARCHAR(255) UNIQUE
);
