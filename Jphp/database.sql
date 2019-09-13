create database test;

use test;

CREATE TABLE `users` (
  `pid` int(11)  auto_increment,
  `pname` varchar(100) ,
  `pdesc` varchar(350)  ,
  `pprice` int(11)  ,
  `pquant` int(11)  ,
  PRIMARY KEY  (`id`)
);