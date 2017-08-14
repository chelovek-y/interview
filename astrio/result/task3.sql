CREATE TABLE `fio` (
	`id` INT(11) NOT NULL,
	`fio` VARCHAR(128) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `id` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


CREATE TABLE `phones` (
	`id` INT(11) NOT NULL,
	`phone` VARCHAR(32) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `id` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


CREATE TABLE `fio_phones` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`fio_id` INT(11) NOT NULL DEFAULT '0',
	`phone_id` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

