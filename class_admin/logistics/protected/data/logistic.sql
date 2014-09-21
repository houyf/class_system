
 /****************************************************
  *		后请办学生反馈表设计
  ***************************************************/

drop database if exists `logistics`;
create database `logistics`;
use  `logistics`;

drop table if exists `user`;
create table `user` (
	`user_id` bigint not null,
	`username` varchar(100) not null,
	`mobile_phone` varchar(13) not null,
	`email` varchar(30) not null,
	primary key (`user_id`)
)  engine = innodb default charset utf8;

drop table if exists `category`;
create table `category` (
	`cid` bigint not null auto_increment,
	`cname` varchar(100) not null,
	`num` bigint unsigned not null default 0, 
	primary key (`cid`)
)  engine = innodb default charset utf8;

drop table if exists `advice`;
create table `advice` (
	`aid` bigint not null auto_increment,
	`cid` bigint not null ,
	`user_id` bigint not null, 
	`content` text not null,
	`status` tinyint(2) not null default 1,
	`picture` varchar(1000) not null, 
	`create_time` datetime not null ,
	`can_announce` tinyint(1) not null default 0,
	`good` int  unsigned not null default 0,
	`bad` int  unsigned  not null default 0, 
	`read` int unsigned not null default 0,
	primary key (`aid`),
	foreign key (`cid`) references `category`(`cid`) on update cascade on delete restrict,	  
	foreign key (`user_id`) references `user`(`user_id`) on update cascade on delete cascade	 
	 -- 少了个字段，管理员是否允许这条记录发布出去
)  engine = innodb default charset utf8;

drop table if exists `admin`;
create table `admin` (
	`admin_id` int not null  auto_increment,
	`real_name`varchar(100) not null ,
	`username` varchar(100) not null,
	`password` varchar(40) not null, 
	`lock` tinyint(1)  not null default 0,
	`last_logintime` datetime not null ,
	`email` varchar(40) not null,
	`send_email` tinyint(1) not null default 0, 
	`level` tinyint(1) not null default 1,
	primary key (`admin_id`) 
)  engine =innodb default charset utf8;
-- 饭堂 宿舍 空调  热水 报修 班车 其他

insert into `category` (`cname`)  values ('饭堂'),  ('宿舍') , ('报修'), ('空调'), ('热水'), ('班车'), ('其他');
insert into `admin`(`username`,`password`) values('houyf', 'Beyond');