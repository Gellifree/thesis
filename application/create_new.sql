-- Adatbázis újragondolása

-- -------------------- --
--  TÁBLÁK LÉTREHOZÁSA  --
-- -------------------- --

-- Tag tábla létrehozása
create table tag(
	id int not null auto_increment,
	nev varchar(200) not null,
	statusz varchar(100) not null,
	osztondij int not null default 20000,
	e_mail varchar(200) not null,
	tagsag_kezdete date,
	aktiv tinyint default 1,

	constraint pk_tag primary key(id)
);

-- Megye tábla létrehozása

create table megye(
	id int not null auto_increment,
	nev varchar(200) not null,

	constraint pk_megye primary key(id)
);

-- Intézmény tábla létrehozása
create table intezmeny(
	id int not null auto_increment,
	nev varchar(200) not null,
	cim varchar(200) not null,
	igazgato_neve varchar(200) not null,
	e_mail varchar(200),
	telefon varchar(11),
	weboldal varchar(100),
	aktiv tinyint default 1,
	megye int not null,

	constraint pk_intezmeny primary key(id),
	constraint fk_intezmeny foreign key (megye) references megye(id) on delete cascade
);

-- Előadás tábla létrehozása
create table eloadas(
	id int not null auto_increment,
	nev varchar(200) not null,
	idopont date,
	egyeztetett tinyint default 0,
	iskola int not null,

	constraint pk_eloadas primary key(id),
	constraint fk_eloadas foreign key (iskola) references intezmeny(id) on delete cascade
);

-- Tartja kapcsolótábla létrehozása
create table tartja(
	eloadas int not null,
	tag int not null,

	constraint fk_tartja_eloadas foreign key (eloadas) references eloadas(id),
	constraint fk_tartja_tag foreign key (tag) references tag(id)
);

-- ------------------- --
--  ADATOK FELTÖLTÉSE  --
-- ------------------- --

-- Tagok felvétele

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Kovács Norbert', 'Munkacsoport vezető', 60000, 'mfw.kovacs.norbert@gmail.com', '2018-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Oláh Dávid', 'Munkacsoport vezető', 42000, 'olah.david@gmail.com', '2017-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Orosz Noémi', 'Elnökségi tag', 53000, 'orosznoemi92@gmail.com', '2020-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Vágó Antal', 'Tag', 20000, 'vagoantal01@gmail.com', '2020-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Justyák Brigitta', 'Tag', 20000, 'justyakbrigi@gmail.com', '2021-09-01');
