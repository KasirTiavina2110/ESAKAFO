/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : LIVREUR                                              */
/*==============================================================*/
create table LIVREUR
(
   IDLIVREUR            int not null auto_increment,
   TOKENLIVREUR         varchar(50),
   HASHLIVREUR          varchar(200) not null,
   LOGINLIVREUR         varchar(50) not null,
   primary key (IDLIVREUR)
);

