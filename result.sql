CreateUsersTable: create table `users` (`id` int unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `password` varchar(255) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
CreateUsersTable: alter table `users` add unique `users_email_unique`(`email`)
CreatePasswordResetsTable: create table `password_resets` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
CreatePasswordResetsTable: alter table `password_resets` add index `password_resets_email_index`(`email`)
CreatePasswordResetsTable: alter table `password_resets` add index `password_resets_token_index`(`token`)
CreateKelurahansTable: create table `kelurahans` (`id` int unsigned not null auto_increment primary key, `name` varchar(255) not null, `address` text null, `lurah` varchar(255) null, `phone` varchar(255) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate utf8mb4_unicode_ci
