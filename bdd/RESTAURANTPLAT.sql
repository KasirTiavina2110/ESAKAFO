/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : RESTAURANTPLAT                                       */
/*==============================================================*/
create table RESTAURANTPLAT
(
   IDPLAT               int not null,
   IDRESTAURANT         int not null,
   primary key (IDPLAT, IDRESTAURANT)
);

