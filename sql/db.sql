CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
    PRIMARY KEY (`category_id`)
);

INSERT INTO `categories` (`category_name`, `category_url`) VALUES
('HTML', 'HTML'),
('CSS', 'CSS'),
('PHP', 'PHP'),
('MySQL', 'MySQL');


CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
);

CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_user_id` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`post_id`),
   FOREIGN KEY (`post_user_id`) REFERENCES `users`(`user_id`),
   FOREIGN KEY (`post_category_id`) REFERENCES `categories`(`category_id`)
);

