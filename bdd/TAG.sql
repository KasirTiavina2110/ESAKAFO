/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : TAG                                                  */
/*==============================================================*/
create table TAG
(
   IDPLAT               int not null,
   IDCATEGORIE          int not null,
   primary key (IDPLAT, IDCATEGORIE)
);

