/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE
(
   IDCOMMANDE           int not null auto_increment,
   IDPLAT               int not null,
   IDPANIER             int not null,
   NOMBREPLAT           int not null,
   primary key (IDCOMMANDE)
);

