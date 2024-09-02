CREATE DATABASE `movieList`;

CREATE TABLE `types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  `isDisable` BOOLEAN DEFAULT True,
  PRIMARY KEY (`id`)
);

CREATE TABLE `movies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `year` VARCHAR(10) DEFAULT NULL,
  `poster` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  `isDisable` BOOLEAN DEFAULT True,
  PRIMARY KEY (`id`),
);
CREATE TABLE `movie_type`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) NOT NULL,
  `type_id` INT(11) NOT NULL,
  FOREIGN KEY (type_id) REFERENCES types(id),
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  PRIMARY KEY (`id`),
)

-- for those only want to
-- modify column nullable
-- add foreign key constraint
ALTER TABLE movies
MODIFY COLUMN type_id INT(11),
ADD CONSTRAINT fk_type_id
FOREIGN KEY(type_id) REFERENCES types(id)
ON DELETE SET NULL;