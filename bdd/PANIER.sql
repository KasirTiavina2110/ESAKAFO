/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : PANIER                                               */
/*==============================================================*/
create table PANIER
(
   IDPANIER             int not null auto_increment,
   IDCLIENT             int not null,
   MONTANTPANIER        float(8,2) not null,
   ESTVALIDE            char(1) not null,
   ESTPAYER             char(1) not null,
   ESTLIVRER            char(1) not null,
   ESTPRET              char(1) not null,
   primary key (IDPANIER)
);

