/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : CATEGORIE                                            */
/*==============================================================*/
create table CATEGORIE
(
   IDCATEGORIE          int not null auto_increment,
   NOMCATEGORIE         varchar(200) not null,
   primary key (IDCATEGORIE)
);

