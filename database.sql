DROP TABLE IF EXISTS `Records`;

CREATE TABLE `Records` (
  `phone` varchar(10) NOT NULL,
  `record` text NOT NULL,
  `created_at` DateTime ,
  `updated_at` DateTime ,
  `expired_at` DateTime 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Records`
 ADD PRIMARY KEY (`phone`);