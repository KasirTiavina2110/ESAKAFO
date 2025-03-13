/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   IDCLIENT             int not null auto_increment,
   EMAILCLIENT          varchar(100) not null,
   HASHCLIENT           varchar(200) not null,
   TOKENCLIENT          varchar(50),
   NOMCLIENT            varchar(50) not null,
   PRENOMCLIENT         varchar(50) not null,
   primary key (IDCLIENT)
);

