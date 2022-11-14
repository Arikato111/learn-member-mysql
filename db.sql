--ตารางแบบสำรวจ
CREATE TABLE poll (
    poll_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    poll_name VARCHAR(200) NOT NULL,
    poll_date DATE NOT NULL,
    poll_users_id INT(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

