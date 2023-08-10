CREATE TABLE cyt_user (
	oid INT(11) NOT NULL AUTO_INCREMENT,
	ds_username VARCHAR(150) NOT NULL COLLATE 'utf8_unicode_ci',
	ds_name VARCHAR(150) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	ds_email VARCHAR(150) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	ds_password VARCHAR(150) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	ds_phone VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	ds_address VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	ds_ips VARCHAR(25) NOT NULL COLLATE 'utf8_unicode_ci',
	nu_attemps INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (oid)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;

ALTER TABLE `cyt_user`
	ADD UNIQUE INDEX `ds_username` (`ds_username`);

INSERT INTO `cyt_user` (`oid`, `ds_username`, `ds_name`, `ds_email`, `ds_password`, `ds_phone`, `ds_address`, `ds_ips`, `nu_attemps`) VALUES (1, '20-25174805-6', 'Marcos Piñero', 'info@codnet.com.ar', 'aab87325369d132b5ccd67503d65e75c', '', '', '', 0);



CREATE TABLE cyt_user_usergroup (
	oid INT(11) NOT NULL AUTO_INCREMENT,
	user_oid INT(11) NOT NULL,
	usergroup_oid INT(11) NOT NULL,
	PRIMARY KEY (`oid`),
	INDEX `user_oid` (`user_oid`),
	INDEX `usergroup_oid` (`usergroup_oid`),
	CONSTRAINT `cyt_user_usergroup_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cyt_user` (`oid`),
	CONSTRAINT `cyt_user_usergroup_ibfk_3` FOREIGN KEY (`usergroup_oid`) REFERENCES `cdt_usergroup` (`cd_usergroup`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;

INSERT INTO `cyt_user_usergroup` (`oid`, `user_oid`, `usergroup_oid`) VALUES (1, 1, 1);


CREATE TABLE cyt_user_facultad (
	oid INT(11) NOT NULL AUTO_INCREMENT,
	user_oid INT(11) NOT NULL,
	facultad_oid INT(11) NOT NULL,
	PRIMARY KEY (`oid`),
	INDEX `user_oid` (`user_oid`),
	INDEX `facultad_oid` (`facultad_oid`),
	CONSTRAINT `cyt_user_facultad_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cyt_user` (`oid`),
	CONSTRAINT `cyt_user_facultad_ibfk_3` FOREIGN KEY (`facultad_oid`) REFERENCES `facultad` (`cd_facultad`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=0;