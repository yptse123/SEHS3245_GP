USE `sehs3245_101_group_2_sleipnir`;
DROP procedure IF EXISTS `count_all_subs`;

DELIMITER $$
USE `sehs3245_101_group_2_sleipnir`$$
CREATE PROCEDURE `count_all_subs` ()
BEGIN
	SELECT count(*) as count FROM `sehs3245_101_group_2_sleipnir`.order;
END$$

DELIMITER ;

