/* Table particuliers  */

INSERT INTO particulier values ('sergem','jadorelesfossiles','Moalapince','Serge','sergemoalapince@gmail.com');
INSERT INTO particulier values ('julienl','jaimelesfossiles','Labrel','Julien','julienlabrel@gmail.com');
INSERT INTO particulier values ('patrickb','jelikelesfoss','Balkani','Patrick','patricklebalcan@gmail.com');
INSERT INTO particulier values ('francoish','jemeurprlesfoss','Hollande','Francois','francoishollande@gmail.com');
INSERT INTO particulier values ('michell','jadourlesfosss','Michel','Leboeuf','michellebeouf@gmail.com');
INSERT INTO particulier values ('marief','fossbiatch','Famy','Marie','mariefamy@gmail.com');
INSERT INTO particulier values ('suzanney','vivelesfoss','Yasbek','Suzanne','yasbeeeek@gmail.com');
INSERT INTO particulier values ('romainl','tahialesfoss','Leblanc','romain','romainleblanc@gmail.com');
INSERT INTO particulier values ('pierrem','lesfossclavie','Martin','Pierre','pierremartin@gmail.com');
INSERT INTO particulier values ('vincentl','fossiles1234','Lagarde','Vincent','vincentlagarde@gmail.com');

/* Table experts */

INSERT INTO expert values ('clairee','claire220e0','Enette','Claire','clairenette@gmail.com','Montpellier',10);
INSERT INTO expert values ('jeanpaulb','jp150230','Bouvier','Jean-Paul','jpbouvier@gmail.com','Paris',5);
INSERT INTO expert values ('frankr','frankoo200','Rossi','Frank','frankrossi@gmail.com','Lyon',7);
INSERT INTO expert values ('mohamedb','momo14500','Belhassen','Mohamed','momobelhassen@gmail.com','Marseille',4);
INSERT INTO expert values ('markg','markg200','Garcia','Mark','markgarcia@gmail.com','Lille',2);


/* Table administrateur */

INSERT INTO administrateur VALUES ('yanisg','yansiiiii12','Girardin','Yanis','girardinyansi@gmail.com');
INSERT INTO administrateur VALUES ('enzov','fuckmazine','Vigne','Enzo','enzovigne@gmail.com');
INSERT INTO administrateur VALUES ('Laurentb','laulau123','Boualavong','Laurent','laurantbo@gmail.com');
INSERT INTO administrateur VALUES ('sabatiera','aymeric456','Sabatier','Ayemric','ayemricsa@gmail.com');
INSERT INTO administrateur VALUES ('valentinv','vall1200','Varcin','Valentin','valentinv@gmail.com');


/* Table fossile  */

INSERT INTO fossile VALUES (1,'Ankylosaure','B',10,10,5,'fossile de dinosaure retrouve en 1956 ...');
INSERT INTO fossile VALUES (2, 'Apatosaure', 'I', 20,5,16, 'fossile d ancien dinosaure exitinct depuis environ 66 millions d annees');
INSERT INTO fossile VALUES (3, 'Archélon', 'I', 6,4,3, 'fossile d ancienne tortue qui vit dans la mer' );
INSERT INTO fossile VALUES (4, 'Brachiosaure' , 'B' , 15,7,12, 'fossile d ancien dinosaure');
INSERT INTO fossile VALUES (5, 'Déeinonychys' ,'B', 7.3,3.0,4.5, 'fossile d ancien dinosaure'); 
INSERT INTO fossile VALUES (6, 'Diplodocus' , 'B' , 15,7,12, 'fossile d ancien dinosaure');
INSERT INTO fossile VALUES (7, 'Mammouth' , 'B' , 15,12,20, 'fossile de mammmouth qui est un animal extinct depuis environ 10 000 ans');
INSERT INTO fossile VALUES (8, 'Smilodon' , 'I', 10,5,8, ' fossile d ancien tigre qui vit dans la foret');


/* Table fossile_image */

INSERT INTO fossile_image VALUES (1,'/images/ankylosaure1.jpg');
INSERT INTO fossile_image VALUES (1,'/images/ankylosaure2.jpg');
INSERT INTO fossile_image VALUES (1,'/images/ankylosaure3.jpg');
INSERT INTO fossile_image VALUES (2,'/images/apatosaurus1.jpg');
INSERT INTO fossile_image VALUES (2,'/images/apatosaurus2.jpg');
INSERT INTO fossile_image VALUES (2,'/images/apatosaurus3.jpg');
INSERT INTO fossile_image VALUES (3,'/images/archelon1.jpg');
INSERT INTO fossile_image VALUES (3,'/images/archelon2.jpg');
INSERT INTO fossile_image VALUES (3,'/images/archelon3.jpg');
INSERT INTO fossile_image VALUES (4,'/images/brachiosaurus1.jpg');
INSERT INTO fossile_image VALUES (4,'/images/brachiosaurus2.jpg');
INSERT INTO fossile_image VALUES (4,'/images/brachiosaurus3.jpg');
INSERT INTO fossile_image VALUES (5,'/images/deinonychus1.jpg');
INSERT INTO fossile_image VALUES (5,'/images/deinonychus2.jpg');
INSERT INTO fossile_image VALUES (5,'/images/deinonychus3.jpg');
INSERT INTO fossile_image VALUES (6,'/images/diplodocus1.jpg');
INSERT INTO fossile_image VALUES (6,'/images/diplodocus2.jpg');
INSERT INTO fossile_image VALUES (6,'/images/diplodocus3.jpg');
INSERT INTO fossile_image VALUES (7,'/images/mammouth1.jpg');
INSERT INTO fossile_image VALUES (7,'/images/mammouth2.jpg');
INSERT INTO fossile_image VALUES (7,'/images/mammouth3.jpg');
INSERT INTO fossile_image VALUES (8,'/images/smilodon1.jpg');
INSERT INTO fossile_image VALUES (8,'/images/smilodon2.jpg');
INSERT INTO fossile_image VALUES (8,'/images/smilodon3.jpg');


/* Table enchere */

INSERT INTO enchere VALUES ('sergem1','sergem',1,100000,100000,true,'2023-01-08 12:00:00','7 days','2023-01-15 12:00:00',false);
INSERT INTO enchere VALUES ('marief2','marief',2,152550,153750,true,'2023-01-13 23:00:00','4 days','2023-01-17 23:00:00',true);
INSERT INTO enchere VALUES ('romainl3','romainl',3,170500,170500,false,'2023-01-09 10:00:00','5 days','2023-01-14 10:00:00',false);
INSERT INTO enchere VALUES ('pierrem4','pierrem',4,230120,230189,true,'2023-01-10 12:00:00','6 days','2023-01-18 12:00:00',false);
INSERT INTO enchere VALUES ('vincentl5','vincentl',5,145500,145500,false,'2023-01-10 12:00:00','7 days','2023-01-19 12:00:00',true);
INSERT INTO enchere VALUES ('suzanney6','suzanney',6,320000,320000,true,'2023-01-14 12:00:00','2 days','2023-01-16 12:00:00',true);
INSERT INTO enchere VALUES ('michell7','michell',7,150000,150000,true,'2023-01-10 12:00:00','7 days','2023-01-17 12:00:00',false);
INSERT INTO enchere VALUES ('patrickb8','patrickb',8,150000,150000,false,'2023-01-16 12:00:00','3 days','2023-01-19 12:00:00',false);


/* Table expertise */

INSERT INTO expertise VALUES ('sergem1','sergem','clairee','lien de l expertise');
INSERT INTO expertise VALUES ('marief2','marief','jeanpaulb','lien de l expertise');
INSERT INTO expertise VALUES ('pierrrem4','pierrem','frankr','lien de l expertise');
INSERT INTO expertise VALUES ('suzanney6','suzanney','mohamedb','lien de l expertise');
INSERT INTO expertise VALUES ('michell7','michell','jeanpaulb','lien de l expertise');


/* Table attente_expertise */ 

INSERT INTO attente_expertise VALUES ('sergem1','sergem');
INSERT INTO attente_expertise VALUES ('marief2','marief');
INSERT INTO attente_expertise VALUES ('pierrem4','pierrem');
INSERT INTO attente_expertise VALUES ('suzanney6','suzanney');
INSERT INTO attente_expertise VALUES ('michell7','michell');

/* Table encherisseurs */ 

INSERT INTO encherisseurs VALUES ('julienl','sergem1','sergem',150000);
INSERT INTO encherisseurs VALUES ('sergem','marief2','marief',160000);
INSERT INTO encherisseurs VALUES ('vincentl','romainl3','romainl',180500);
INSERT INTO encherisseurs VALUES ('suzanney','pierrem4','pierrem',240500);
INSERT INTO encherisseurs VALUES ('patrickb','vincentl5','vincentl',155500);
INSERT INTO encherisseurs VALUES ('michell','suzanney6','suzanney',330000);
INSERT INTO encherisseurs VALUES ('marief','michell7','michell',160000);
INSERT INTO encherisseurs VALUES ('francoish','patrickb8','patrickb',160000);


