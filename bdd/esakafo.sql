/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  5/16/2019 1:56:49 PM                     */
/*==============================================================*/


drop table if exists CATEGORIE;

drop table if exists CLIENT;

drop table if exists COMMANDE;

drop table if exists ESAKAFO;

drop table if exists LIVREUR;

drop table if exists PANIER;

drop table if exists PLAT;

drop table if exists RESTAURANT;

drop table if exists RESTAURANTPLAT;

drop table if exists TAG;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

alter table COMMANDE add constraint FK_RELATION_1 foreign key (IDPANIER)
      references PANIER (IDPANIER) on delete restrict on update restrict;

alter table COMMANDE add constraint FK_RELATION_2 foreign key (IDPLAT)
      references PLAT (IDPLAT) on delete restrict on update restrict;

alter table PANIER add constraint FK_CLIENTPANIER foreign key (IDCLIENT)
      references CLIENT (IDCLIENT) on delete restrict on update restrict;

alter table RESTAURANTPLAT add constraint FK_RESTAURANTPLAT foreign key (IDPLAT)
      references PLAT (IDPLAT) on delete restrict on update restrict;

alter table RESTAURANTPLAT add constraint FK_RESTAURANTPLAT2 foreign key (IDRESTAURANT)
      references RESTAURANT (IDRESTAURANT) on delete restrict on update restrict;

alter table TAG add constraint FK_TAG foreign key (IDPLAT)
      references PLAT (IDPLAT) on delete restrict on update restrict;

alter table TAG add constraint FK_TAG2 foreign key (IDCATEGORIE)
      references CATEGORIE (IDCATEGORIE) on delete restrict on update restrict;

