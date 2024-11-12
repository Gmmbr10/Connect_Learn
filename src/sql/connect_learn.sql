create database connect_learn;

use connect_learn;

# usuarios

create table usuarios (
  usu_id int auto_increment not null,
  usu_nome varchar(150) not null,
  usu_email varchar(200) not null,
  usu_senha varchar(100) not null,
  usu_tipo tinyint not null default(1),
  usu_tel varchar(50),
  primary key(usu_id)
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
  primary key(des_id),
  foreign key(des_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

create table grupos (
  gru_id int auto_increment not null,
  gru_nome varchar(150) not null,
  gru_id_fundador int not null,
  gru_id_desafio int not null,
  gru_tipo tinyint not null,
  gru_senha varchar(100),
  primary key(gru_id),
  foreign key(gru_id_fundador) references usuarios(usu_id) ON DELETE CASCADE,
  foreign key(gru_id_desafio) references desafios(des_id) ON DELETE CASCADE
);

create table usuarios_grupos (
  usu_gru_id_grupo int not null,
  usu_gru_id_usuario int not null,
  primary key(usu_gru_id_grupo,usu_gru_id_usuario),
  foreign key(usu_gru_id_grupo) references grupos(gru_id) ON DELETE CASCADE,
  foreign key(usu_gru_id_usuario) references usuarios(usu_id) ON DELETE CASCADE
);

# fim desafios
# inicio comunidades

create table comunidades (
  com_id int not null auto_increment,
  com_nome varchar(150) not null,
  com_link varchar(255) not null,
  com_id_fundador int not null,
  primary key(com_id),
  foreign key(com_id_fundador) references usuarios(usu_id) ON DELETE CASCADE
);

# fim comunidades