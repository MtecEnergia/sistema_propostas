//Criando base de dados:

create database sistema_propostas;

create table client (
	idClient int not null auto_increment,
	nameClient varchar(50),
	cpfClient varchar(20),
	primary key (idClient)
);