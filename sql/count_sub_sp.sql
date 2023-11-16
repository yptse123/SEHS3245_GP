USE `sehs3245_101_group_2_sleipnir`;
DROP procedure IF EXISTS `CountAllSubs`;

DELIMITER $$
USE `sehs3245_101_group_2_sleipnir`$$
CREATE PROCEDURE `CountAllSubs` ()
BEGIN
	SELECT count(*)  FROM `sehs3245_101_group_2_sleipnir`.order;
END$$

DELIMITER ;

