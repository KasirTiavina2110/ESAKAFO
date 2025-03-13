/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


/*==============================================================*/
/* Table : RESTAURANT                                           */
/*==============================================================*/
create table RESTAURANT
(
   IDRESTAURANT         int not null auto_increment,
   NOMRESTAURANT        varchar(50) not null,
   HASHRESTAURANT       varchar(100) not null,
   TOKENRESTAURANT      varchar(50),
   BENEFRESTAURANT      float(8,2) not null,
   primary key (IDRESTAURANT)
);

