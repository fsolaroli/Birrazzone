create schema if not exists birrazzone default character set utf8 ;
use birrazzone;

create table if not exists birrazzone.Birrificio (
	IdBirrificio			int				not null auto_increment,
	NomeBirrificio			varchar(30)		not null,
	EmailBirrificio			varchar(50)		not null unique,
	PasswordBirrificio		char(60),
	PartitaIVA				char(11)		not null unique,
	Localita				varchar(30),
	DescrizioneBirrificio	varchar(300),
	FotoBirrificio			varchar(100),
	primary key (IdBirrificio)
);

create table if not exists birrazzone.StatoMembership (
	IdStatoMembership	int				not null,
	Codice				varchar(20)		not null unique,
	Descrizione			varchar(100)	not null,
	primary key (IdStatoMembership)
);

insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (1, 'INVIATA',		'In approvazione');
insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (2, 'ACCETTATA', 	'Richiesta accettata');
insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (3, 'RIFIUTATA', 	'Richiesta rifiutata');
insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (4, 'ATTIVA', 		'Account attivo');
insert into birrazzone.StatoMembership (IdStatoMembership, Codice, Descrizione) values (5, 'DISATTIVATO', 	'Account disattivato');

create table if not exists birrazzone.StatoMembershipBirrificio (
	IdBirrificio			int			not null,
	IdStatoMembership		int			not null,
	DaData					datetime	not null,
	AData					datetime	not null,
	Token					varchar(32) unique,
	/*unique (IdBirrificio, IdStatoMembership),*/
	foreign key (IdBirrificio)		references birrazzone.Birrificio (IdBirrificio),
	foreign key (IdStatoMembership)	references birrazzone.StatoMembership (IdStatoMembership)
);

create table if not exists birrazzone.Birra (
	IdBirra				int						not null auto_increment,
	NomeBirra			varchar(50)				not null,
	Tipologia			varchar(50) 			not null,
	Formato				tinyint unsigned 		not null,
	GradoAlcolico		decimal(3, 1) unsigned 	not null,
	Colore				varchar(50)				not null,
	DescrizioneBirra	varchar(300)			not null,
	FotoBirra			varchar(100)			not null,
	IdBirrificio		int						not null,
	primary key (IdBirra),
	foreign key (IdBirrificio) references birrazzone.Birrificio (IdBirrificio)
);

create table if not exists birrazzone.Prezzo (
	IdPrezzo			int						not null auto_increment,
	DaData				datetime				not null,
	AData				datetime				not null,
	Prezzo				decimal(6, 2) unsigned	not null,
	IdBirra				int						not null,
	primary key (IdPrezzo),
	foreign key (IdBirra) references birrazzone.Birra (IdBirra)
);

create table if not exists birrazzone.Indirizzo (
	IdIndirizzo				int				not null auto_increment,
	Via						varchar(40)		not null,
	Citta					varchar(30)		not null,
	Provincia				varchar(20)		not null,
	CAP						char(5)			not null,
	primary key (IdIndirizzo)
);

create table if not exists birrazzone.Utente (
	IdUtente		int				not null auto_increment,
	NomeUtente		varchar(50)		not null,
	EmailUtente		varchar(50)		not null unique,
	PasswordUtente	char(60)		not null,
	IdIndirizzo		int,
	primary key (IdUtente),
	foreign key (IdIndirizzo) references birrazzone.Indirizzo (IdIndirizzo)
);

create table if not exists birrazzone.Movimento (
	IdMovimento				int			not null auto_increment,
	IdBirra					int			not null,
	DataMovimento			datetime	not null,
	Quantita				int			not null,
	TipoMovimento			tinyint		not null,
	primary key (IdMovimento),
	foreign key (IdBirra) references birrazzone.Birra (IdBirra)
);

create table if not exists birrazzone.MovimentoBirrificio (
	IdMovimento		int	not null,
	IdBirrificio	int	not null,
	primary key (IdMovimento),
	foreign key (IdMovimento)	references birrazzone.Movimento (IdMovimento),
	foreign key (IdBirrificio)	references birrazzone.Birrificio (IdBirrificio)
);

create table if not exists birrazzone.Ordine (
	IdOrdine				int 		not null auto_increment,
	IdIndirizzoSpedizione	int			not null,
	IdUtente				int			not null,
	DataOrdine				datetime	not null,
	primary key (IdOrdine),
	foreign key (IdIndirizzoSpedizione) references birrazzone.Indirizzo (IdIndirizzo),
	foreign key (IdUtente)				references birrazzone.Utente (IdUtente)
);

create table if not exists birrazzone.MovimentoUtente (
	IdMovimento	int	not null,
	IdUtente	int	not null,
	IdOrdine	int,
	primary key (IdMovimento),
	foreign key (IdMovimento)	references birrazzone.Movimento (IdMovimento),
	foreign key (IdUtente)		references birrazzone.Utente (IdUtente),
	foreign key (IdOrdine)		references birrazzone.Ordine (IdOrdine)
);

create table if not exists birrazzone.StatoOrdine (
	IdStatoOrdine	int				not null,
	Codice			varchar(20)		not null,
	Descrizione		varchar(100)	not null,
	primary key (IdStatoOrdine)
);

insert into birrazzone.StatoOrdine (IdStatoOrdine, Codice, Descrizione) values (1, 'ELABORAZIONE',	'In elaborazione');
insert into birrazzone.StatoOrdine (IdStatoOrdine, Codice, Descrizione) values (2, 'SPEDITO', 		'Spedito');
insert into birrazzone.StatoOrdine (IdStatoOrdine, Codice, Descrizione) values (3, 'CONSEGNA', 		'In consegna');
insert into birrazzone.StatoOrdine (IdStatoOrdine, Codice, Descrizione) values (4, 'CONSEGNATO', 	'Consegnato');

create table if not exists birrazzone.StatoEvasioneOrdine (
	IdOrdine		int			not null,
	IdStatoOrdine	int			not null,
	DaData			datetime	not null,
	AData			datetime	not null,
	unique (IdOrdine, IdStatoOrdine),
	foreign key (IdOrdine)		references birrazzone.Ordine (IdOrdine),
	foreign key (IdStatoOrdine)	references birrazzone.StatoOrdine (IdStatoOrdine)
);

create table if not exists birrazzone.Notifica (
	IdNotifica			int				not null auto_increment,
	IdUtente			int,
	IdBirrificio		int,
	TipologiaNotifica	int 			not null,
	Oggetto				varchar(50) 	not null,
	Corpo				varchar(200)	not null,
	DataNotifica		datetime		not null,
	DataLettura			datetime		not null,
	primary key (IdNotifica),
	foreign key (IdUtente)		references birrazzone.Utente (IdUtente),
	foreign key (IdBirrificio)	references birrazzone.Birrificio (IdBirrificio)

);
