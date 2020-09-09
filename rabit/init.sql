CREATE TABLE IF NOT EXISTS `users` (
   `id` INT AUTO_INCREMENT,
   `name` VARCHAR(50),
   PRIMARY KEY (`id`),
   UNIQUE KEY unique_name (name)
);

CREATE TABLE IF NOT EXISTS `advertisements` (
   `id` INT AUTO_INCREMENT,
   `userid` INT,
   `title` VARCHAR(150),
   PRIMARY KEY (`id`)
);

ALTER TABLE `advertisements` ADD CONSTRAINT `advertisements_fk_0_userid` FOREIGN KEY (userid) REFERENCES `users`(`id`) ;

#--12 user, maxid:12
INSERT INTO `users` (`name`) VALUES ('Sari Gabor');
INSERT INTO `users` (`name`) VALUES ('RabIT');
INSERT INTO `users` (`name`) VALUES ("Jared"),("Sybil"),("Baker"),("Chester"),("Elaine"),("Maya"),("Geraldine"),("Maxwell"),("Yeo"),("Noelle");



INSERT INTO `advertisements` (`userid`,`title`) VALUES (8,"placerat eget, venenatis"),(4,"elit elit fermentum risus, at fringilla purus"),(8,"aliquet odio. Etiam ligula tortor, dictum eu, placerat"),(2,"egestas hendrerit neque."),(5,"iaculis, lacus pede sagittis"),(6,"dolor. Nulla semper tellus id nunc interdum feugiat."),(3,"et malesuada fames ac turpis egestas. Fusce aliquet"),(1,"non, bibendum sed, est. Nunc"),(10,"Donec porttitor tellus non magna. Nam"),(2,"hendrerit neque. In ornare");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (11,"quis, pede. Praesent eu dui. Cum"),(5,"ac, fermentum vel, mauris. Integer"),(10,"euismod in, dolor. Fusce feugiat."),(4,"sed pede nec"),(11,"enim, sit amet ornare lectus justo eu arcu."),(8,"vulputate ullamcorper magna. Sed eu eros. Nam consequat"),(3,"lectus quis massa. Mauris vestibulum, neque sed"),(7,"nibh sit amet orci. Ut sagittis lobortis"),(6,"Etiam ligula tortor, dictum eu, placerat"),(11,"Mauris molestie pharetra nibh.");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (5,"amet, faucibus ut,"),(11,"nec ante blandit viverra. Donec tempus, lorem fringilla"),(2,"Nulla facilisi. Sed neque. Sed eget lacus. Mauris"),(5,"Donec est mauris,"),(8,"non massa non ante bibendum ullamcorper."),(8,"penatibus et magnis"),(7,"libero mauris, aliquam eu, accumsan sed, facilisis"),(6,"pede nec ante blandit viverra. Donec"),(10,"lectus. Cum sociis natoque penatibus et magnis dis"),(5,"non enim commodo hendrerit. Donec");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (9,"lectus sit amet luctus vulputate, nisi sem semper"),(5,"arcu eu odio tristique pharetra."),(4,"dictum ultricies ligula. Nullam enim. Sed"),(7,"vulputate dui, nec tempus mauris erat"),(12,"risus. Morbi metus."),(4,"et malesuada fames"),(9,"nec, malesuada ut, sem. Nulla interdum. Curabitur dictum."),(10,"in, dolor. Fusce feugiat. Lorem ipsum dolor"),(7,"aliquet libero. Integer in magna. Phasellus"),(12,"mauris sit amet lorem semper auctor. Mauris");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (1,"Ut semper pretium neque."),(8,"tellus. Suspendisse sed dolor."),(3,"turpis non enim. Mauris"),(5,"convallis, ante lectus convallis est, vitae"),(7,"Donec consectetuer mauris id sapien. Cras dolor"),(6,"ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam"),(11,"dolor vitae dolor. Donec fringilla. Donec feugiat"),(12,"non magna. Nam ligula elit, pretium"),(2,"dolor, tempus non, lacinia at, iaculis quis,"),(9,"leo. Morbi neque");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (11,"ac urna. Ut tincidunt vehicula risus. Nulla eget"),(8,"convallis erat, eget"),(7,"ornare tortor at risus."),(2,"faucibus orci luctus et ultrices posuere cubilia"),(5,"Proin ultrices. Duis volutpat nunc sit amet"),(11,"elit sed consequat auctor, nunc nulla vulputate"),(6,"lorem semper auctor. Mauris vel turpis. Aliquam adipiscing"),(2,"at, velit. Pellentesque ultricies dignissim"),(5,"varius ultrices, mauris ipsum porta elit,"),(1,"Nullam velit dui, semper et, lacinia");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (1,"Donec est. Nunc ullamcorper,"),(5,"et, euismod et, commodo"),(9,"mi felis, adipiscing fringilla,"),(8,"ornare placerat, orci lacus vestibulum lorem, sit amet"),(6,"Integer sem elit,"),(10,"egestas, urna justo faucibus"),(9,"Cum sociis natoque"),(1,"ac metus vitae velit egestas"),(4,"ac, feugiat non, lobortis quis, pede. Suspendisse dui."),(8,"sagittis felis. Donec tempor, est");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (12,"Maecenas iaculis aliquet diam. Sed"),(2,"lacus vestibulum lorem, sit amet ultricies sem magna"),(9,"Donec dignissim magna a tortor. Nunc commodo"),(9,"facilisis non, bibendum sed, est. Nunc laoreet"),(8,"risus. In mi"),(4,"eu turpis. Nulla aliquet. Proin velit. Sed malesuada"),(1,"euismod ac, fermentum vel, mauris. Integer sem elit,"),(6,"a, auctor non, feugiat nec, diam. Duis mi"),(11,"convallis dolor. Quisque tincidunt pede"),(9,"facilisis. Suspendisse commodo tincidunt nibh. Phasellus");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (8,"Duis gravida. Praesent eu nulla"),(10,"rutrum magna. Cras convallis convallis dolor. Quisque tincidunt"),(4,"semper auctor. Mauris"),(1,"amet diam eu"),(8,"sagittis placerat. Cras"),(1,"dictum cursus. Nunc mauris elit,"),(5,"Integer in magna. Phasellus dolor elit, pellentesque a,"),(5,"pharetra ut, pharetra sed, hendrerit a,"),(1,"Nulla eget metus eu erat semper"),(10,"natoque penatibus et magnis");
INSERT INTO `advertisements` (`userid`,`title`) VALUES (6,"dui. Fusce diam nunc, ullamcorper"),(4,"dui, nec tempus"),(1,"turpis egestas. Aliquam fringilla"),(6,"arcu. Curabitur ut odio vel est tempor bibendum."),(12,"sollicitudin orci sem eget massa. Suspendisse"),(7,"Integer urna. Vivamus molestie"),(3,"Donec tincidunt. Donec vitae erat vel pede blandit"),(10,"et arcu imperdiet ullamcorper. Duis at lacus. Quisque"),(4,"non enim commodo hendrerit. Donec porttitor tellus non"),(10,"ac, eleifend vitae, erat.");
