/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 10:06:07 AM                    */
/*==============================================================*/


/*==============================================================*/
/* Table : RESTAURANTPANIER                                     */
/*==============================================================*/
create table RESTAURANTPANIER
(
   IDPANIER             int not null,
   IDRESTAURANT         int not null,
   ESTPRET              char(1) not null,
   primary key (IDPANIER, IDRESTAURANT)
);

