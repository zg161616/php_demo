#liuyanban
CREATE TABLE `message` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` tinytext NOT NULL,
  `lastdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
#luntan
CREATE TABLE forums (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 `forum_name` varchar(50) NOT NULL,
  `forum_description` varchar(200) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `last_post_time` datetime NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 CREATE TABLE `member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE tiopic (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `last_post_time` datetime NOT NULL,
  `reply_author` varchar(50) DEFAULT NULL,
  `reply` text,
  `reply_time` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


