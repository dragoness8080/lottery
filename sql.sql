CREATE TABLE ticket(
  id INT(10) NOT NULL AUTO_INCREMENT,
  issue VARCHAR(10) NOT NULL COMMENT '�ں�',
  identifier INT(4) NOT NULL COMMENT '���',
  red_one VARCHAR(2) NOT NULL,
  red_two VARCHAR(2) NOT NULL,
  red_three VARCHAR(2) NOT NULL,
  red_four VARCHAR(2) NOT NULL,
  red_five VARCHAR(2) NOT NULL,
  red_six VARCHAR(2) NOT NULL,
  blue VARCHAR(2) NOT NULL,
  PRIMARY KEY (id)
);