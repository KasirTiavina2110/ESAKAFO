/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  15/05/2019 09:24:13                      */
/*==============================================================*/
drop database esakafo; 
create database esakafo;

use esakafo;


drop table if exists CLIENT;

drop table if exists COMMANDE;

drop table if exists PLAT;

drop table if exists RESTAURANT;

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   IDCLIENT             int not null auto_increment,
   NOM                  varchar(30) not null,
   MDP                  text not null,
   MAIL                 varchar(30) not null,
   primary key (IDCLIENT)
);

/*==============================================================*/
/* Table : LIVREUR                                               */
/*==============================================================*/
create table LIVREUR
(
   IDLIVREUR             int not null auto_increment,
   NOM                  varchar(30) not null,
   MDP                  text not null,
   primary key (IDLIVREUR)
);

/*==============================================================*/
/* Table : ESAKAFO                                               */
/*==============================================================*/
create table ESAKAFO
(
   IDESAKAFO             int not null auto_increment,
   NOM                  varchar(30) not null,
   MDP                  text not null,
   primary key (IDESAKAFO)
);

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE
(
   IDCOMMANDE           int not null auto_increment,
   IDCLIENT             int not null,
   IDPLAT               int not null,
   STATUT               int not null,
   MONTANT              decimal(8,2) not null,
   QUANTITE             int not null,
   primary key (IDCOMMANDE)
);

/*==============================================================*/
/* Table : DETAILCOMMANDE                                             */
/*==============================================================*/
create table DETAILCOMMANDE
(
   IDDETAILCOMMANDE     int not null auto_increment,
   IDCOMMANDE           int not null,
   HVALIDER             timestamp,
   HPRET                timestamp,
   HRECUPERER           timestamp,
   HLIVRER              timestamp,
   primary key (IDDETAILCOMMANDE)
);

/*==============================================================*/
/* Table : COMMANDELIVREUR                                             */
/*==============================================================*/
create table COMMANDELIVREUR
(
   IDCOMMANDELIVREUR    int not null auto_increment,
   IDCOMMANDE           int not null,
   IDLIVREUR              int not null,
   primary key (IDCOMMANDELIVREUR)
);

/*==============================================================*/
/* Table : PLAT                                                 */
/*==============================================================*/
create table PLAT
(
   IDPLAT               int not null auto_increment,
   IDRESTAURANT         int,
   NOM                  varchar(30) not null,
   DESCRIPTION          text not null,
   PRIX                 decimal(8,2) not null,
   IMAGE                int not null,
   TEMPSPREPARATION 	int,
   primary key (IDPLAT)
);

/*==============================================================*/
/* Table : RESTAURANT                                           */
/*==============================================================*/
create table RESTAURANT
(
   IDRESTAURANT         int not null auto_increment,
   NOM                  varchar(30) not null,
   MDP                  text not null,
   IMAGE                int not null,
   primary key (IDRESTAURANT)
);

alter table DETAILCOMMANDE add constraint FK_DETAILCOMMANDE foreign key (IDCOMMANDE)
      references COMMANDE (IDCOMMANDE) on delete restrict on update restrict;
	  
alter table COMMANDELIVREUR add constraint FK_COMMANDELIVREUR foreign key (IDCOMMANDE)
      references COMMANDE (IDCOMMANDE) on delete restrict on update restrict;
	  
alter table COMMANDELIVREUR add constraint FK_COMMANDELIVREUR2 foreign key (IDLIVREUR)
      references LIVREUR (IDLIVREUR) on delete restrict on update restrict;

alter table COMMANDE add constraint FK_COMMANDE foreign key (IDCLIENT)
      references CLIENT (IDCLIENT) on delete restrict on update restrict;

alter table COMMANDE add constraint FK_COMMANDE2 foreign key (IDPLAT)
      references PLAT (IDPLAT) on delete restrict on update restrict;

alter table PLAT add constraint FK_RELATION_1 foreign key (IDRESTAURANT)
      references RESTAURANT (IDRESTAURANT) on delete restrict on update restrict;

insert into Client values(null,'Heggy','$2y$10$.IdbMhLVdVYd0hulmCqCOuqIPyIHzthAv8F/EKGU2Uwq5M5/Zn88q','HeggyLoyens@gmail.com');

insert into livreur values(null,'Livreur1','$2y$10$rpw6p2dbyQYMtMWWyohFCOgFdjwpoTO0Sd4U3J2GJQ/a7g9PTyoQu');
insert into livreur values(null,'Livreur2','$2y$10$yhhcNKxEdkifooomgTaSZ.RPYGg/.SmH.dS5N1ImpCRJof4UNnml.');

insert into esakafo values(null,'Admin','$2y$10$rstluQrgNUOR18KYQ3IHJOnwHqrC0ntCsGo.aZXUq/rbJ5kd12KNS');

insert into restaurant values(null,'Oasis','$2y$10$Buj6gVnhEswJnxZnloZQt.XE8j8Eg9LLJZwwUWQMWpqKAPgRe5kJm',201);
insert into restaurant values(null,'Azale','$2y$10$eqCzJLZXW7GPrXqnzXYWQO2Nl0cgKXqcI7ci8TtHJFsNk/zvbFGvO',201);
insert into restaurant values(null,'Royale','$2y$10$ebXxSbVWi7ZBfjoNOR0o3OaDetuzJm9Lj6KnXC72i3ULDSRhU.vRu',201);
insert into restaurant values(null,'Belledejour','$2y$10$Zp7aIb8l5P8J7ldVC4v3JOQLVkp0QMeQuuF174v5R6Yv1KBfXlJB.',201);


insert into plat values(null,1,'Pate seche','Specialite de Tamatave, pate mariner avec du beurre melanger avec de la sauce fait maison',10000,101,1);
insert into plat values(null,1,'Potage','Soupe au legume plus des ingredients secrets',5000,102,2);
insert into plat values(null,1,'Steak panne','Un bon steak de viande + des frites, avec un petit agrement de salade',10000,103,1);
insert into plat values(null,1,'Compose','Plusieur saveur de gout melanger',4000,104,1);

insert into plat values(null,2,'Min-Sao','Specialite fait maison, Soupe avec plusieur garniture',10000,101,1);
insert into plat values(null,2,'Soupe speciale','Soupe avec plusieur garniture, specialite fait maison',10000,102,4);
insert into plat values(null,2,'Maka','Specialite fait maison, Soupe avec plusieur garniture',10000,105,1);
insert into plat values(null,2,'Maka-So','Specialite fait maison, Soupe avec plusieur garniture',10000,103,2);

insert into plat values(null,3,'Min-Sao','Specialite fait maisonet plus de saveur',10000,102,1);
insert into plat values(null,3,'Soupe speciale','Soupe avec plusieur garniture et plus de saveur',10000,103,3);
insert into plat values(null,3,'Steak Frite','Un bon steak de viande + des frites',5000,104,2);
insert into plat values(null,3,'Soupe garnie','Plusieur saveur de gout melanger',10000,105,1);

insert into plat values(null,4,'Min-Sao','Specialite fait maison, Soupe avec plusieur garniture',10000,101,4);
insert into plat values(null,4,'Min-Sao speciale','Soupe avec plusieur garniture et plus de saveur',10000,104,1);
insert into plat values(null,4,'Pate seche','Un bon steak de viande + des frites',5000,102,2);
insert into plat values(null,4,'Soupe Tamatave','Specialite de Tamatave, pate mariner avec du beurre melanger avec de la sauce fait maison',10000,103,3);


