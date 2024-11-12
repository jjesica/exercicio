create database tarefas;

use tarefas;

CREATE TABLE usuarios (
       usu_codigo    INT PRIMARY KEY AUTO_INCREMENT,
       usu_nome      VARCHAR(40),       
       usu_email     VARCHAR(40)
);
      

CREATE TABLE tarefas (
       tar_codigo         INT PRIMARY KEY AUTO_INCREMENT,
       tar_setor          VARCHAR(40),
       tar_propriedade    VARCHAR(40),       
       tar_descrição      VARCHAR(40),
       tar_status         VARCHAR(40)       
);

alter table tarefas
add column usu_codigo int,
add constraint fk_usu_codigo foreign key (usu_codigo) references usuarios (usu_codigo); 