/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : PLAT                                                 */
/*==============================================================*/
create table PLAT
(
   IDPLAT               int not null auto_increment,
   DESCRIPTION          text not null,
   TEMPSMOYENDEPREPARATION time not null,
   TAGPRICE             varchar(200) not null,
   IMAGE                varchar(200),
   PRIX                 float(8,2) not null,
   primary key (IDPLAT)
);

