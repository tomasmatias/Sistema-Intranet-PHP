use master;

create database intranet;

use intranet;

/* TABLA DE USUARIOS, CAMPO  BOOLEAN ASIGNA  EL NUMERO  1 COMO  ADMINISTRADOR Y EL  NUMERO  0 COMO USUARIO COMÚN */

create table usuarios(
usuario varchar(45) PRIMARY KEY,
clave varchar(45) NOT NULL,
cargo varchar (45) NOT NULL,
admin boolean NOT NULL
);

insert usuarios VALUES 
('admin','123','Administrador',1);

insert usuarios VALUES
('Cecilia','123456','Especialista en Sistemas',0),
('Martin','123456','Secretario General',0),
('Leo','123456','Experto en Contabilidad',0),
('José','123456','Encargado de Aseo',0);

drop table usuarios;

/*2DA TABLA CREADA USUARIOS , STANDBY */

create table usuarios(
usuario varchar(45) PRIMARY KEY,
clave varchar(45) NOT NULL,
cod_cargo int (5) NOT NULL,
admin boolean NOT NULL,
foreign key (cod_cargo) references cargo (cod_cargo)
);

insert into usuarios values
('Admin','123456','1',1);

/* TABLA DE CARGOS, STANDBY */

create table cargo(
cod_cargo int (5)  PRIMARY KEY,
nom_cargo varchar(30)
);

insert into cargo values ('1','Secretaria Alcaldia');
insert into cargo values ('2','Jefe de Gabinete');
insert into cargo values ('3','Secretaria de Administracion');
insert into cargo values ('4','Encargado de Informatica');
insert into cargo values ('5','Oficina de Partes');
insert into cargo values ('6','Encargada de OIRS');

drop table cargo;


/* INSERCION DE CATEGORIAS, SE PUEDE EDITAR EN UN FUTURO */

create table categorias(
ID_Categoria int AUTO_INCREMENT PRIMARY KEY,
categoria varchar(45) NOT NULL,
descripcion varchar(255) NOT NULL,
ruta varchar(40) NOT NULL    
);

insert categorias VALUES 
(NULL,'Download Zone','Seccion de Descargas','descarga.php'),
(NULL,'Personal','Seccion Personal para los usuarios que quieran acceder','personal.php'),
(NULL,'Ayuda','Articulos Visuales de Ayuda para la comunidad completa','ayuda.php'),
(NULL,'Curiosidades','Seccion de Curiosidades entre otros topicos para los empleados','curiosidades.php');

drop table categorias;


/* TABLA DE ASIGNACION DE PERMISOS DE USUARIOS  */

create table permisos(
usuario varchar(45),
ID_Categoria int,
PRIMARY KEY (usuario, ID_Categoria),
FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
FOREIGN KEY (ID_Categoria) REFERENCES categorias(ID_Categoria)
);

drop table permisos;

/* CREACION BASE  DE DATOS  PARA ARCHIVOS SUBIDOS  */

use master;

create database dbtuts;

use dbtuts;

/* TABLA DE ARCHIVOS SUBIDOS   */

create table tbl_uploads(
id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
file varchar(100) NOT NULL,
type varchar(10) NOT NULL,
size int NOT NULL
);

drop table tbl_uploads;

/* NUMERO 1 SIGNIFICA QUE ES ADMINISTRADOR, 0 ES SOLAMENTE USUARIO COMUN Y CORRIENTE*/

/* INSERT DE USUARIO ADMINISTRADOR CON EL VALOR N°1 QUE SIGNIFICA QUE ES ADMIN, SI SE QUIERE INGRESAR OTRO ADMINISTRAOR
DE IGUAL MANERA SE AGREGA EL NUMERO 1 */

/* INSERT DE USUARIOS NORMALES A LA BD, PARA QUE PUEDAN INICIAR SESIÓN CON SUS RESPECTIVAS CREDENCIALES
N° 0 SIGNIFICA QUE SOLAMENTE TIENEN ACCESO RESTRINGIDO A VISITAR FOROS Y ENTRAR AL SISTEMA  */

insert permisos VALUES ('Admin',5);

/* IMPORTANTE, PARA ELIMINAR USUARIO HAY QUE SACAR LOS PERMISOS DE CATEGORIA... LUEGO SE PUEDEN ELIMINAR CORRECTAMENTE */



------------------------------------------------------------------------------------------------------------------------------

