create database connect_learn;

use connect_learn;

# arquivos

create table arquivos (
  arq_id int auto_increment not null,
  arq_id_usuario int not null,
  arq_caminho varchar(255) not null,
  primary key(arq_id),
  foreign key(arq_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

# fim arquivos
# usuarios

create table usuarios (
  usu_id int auto_increment not null,
  usu_nome varchar(150) not null,
  usu_email varchar(200) not null,
  usu_senha varchar(100) not null,
  usu_tipo tinyint not null default(1),
  usu_tel varchar(50),
  usu_id_foto int,
  primary key(usu_id),
  foreign key(usu_id_foto) references arquivos(arq_id)
);

# fim usuarios
# conteudos

create table cursos (
  cur_id int auto_increment not null,
  cur_nome varchar(255) not null,
  cur_tema tinyint not null,
  cur_id_usuario int not null,
  primary key(cur_id),
  foreign key(cur_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

create table modulos (
  mod_id int auto_increment not null,
  mod_nome varchar(255) not null,
  mod_id_curso int not null,
  primary key(mod_id),
  foreign key(mod_id_curso) references cursos(cur_id) ON DELETE CASCADE
);

create table aulas (
  aul_id int auto_increment not null,
  aul_titulo varchar(255) not null,
  aul_conteudo text not null,
  aul_url varchar(255) not null,
  aul_id_modulo int not null,
  primary key(aul_id),
  foreign key(aul_id_modulo) references modulos(mod_id) ON DELETE CASCADE
);

# fim conteudos

# duvidas

create table duvidas (
  duv_id int auto_increment not null,
  duv_texto text not null,
  duv_id_usuario int not null,
  primary key(duv_id),
  foreign key(duv_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

create table respostas (
  res_id int auto_increment not null,
  res_texto text not null,
  res_like int not null default(0),
  res_id_usuario int not null,
  res_id_duvida int not null,
  primary key(res_id),
  foreign key(res_id_duvida) references duvidas(duv_id) ON DELETE CASCADE,
  foreign key(res_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

# fim duvidas

# desafios

create table desafios (
  des_id int auto_increment not null,
  des_titulo varchar(250) not null,
  des_descricao text not null,
  des_id_usuario int not null,
  des_url varchar(255) not null,
  des_id_foto int not null,
  primary key(des_id),
  foreign key(des_id_usuario) references usuarios(usu_id) ON DELETE CASCADE,
  foreign key(des_id_foto) references arquivos(arq_id) ON DELETE CASCADE
);

# fim desafios
# inicio comunidades

create table comunidades (
  com_id int not null auto_increment,
  com_nome varchar(150) not null,
  com_url varchar(255) not null,
  com_id_fundador int not null,
  primary key(com_id),
  foreign key(com_id_fundador) references usuarios(usu_id) ON DELETE CASCADE
);

# fim comunidades