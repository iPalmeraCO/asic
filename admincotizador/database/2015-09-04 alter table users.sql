ALTER TABLE `users` ADD `type_doc` VARCHAR(2) NOT NULL COMMENT 'Tipo documento' AFTER `surname`, ADD `document` INT NOT NULL COMMENT 'Numero de documento' AFTER `type_doc`;

ALTER TABLE `users` ADD `image` TEXT NOT NULL COMMENT 'Imagen Usuario' AFTER `status_id`, ADD `group_id` INT NOT NULL COMMENT 'Grupo ID' AFTER `image`;
