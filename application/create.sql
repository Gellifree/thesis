-- Adatbázis újragondolása

-- -------------------- --
--  TÁBLÁK LÉTREHOZÁSA  --
-- -------------------- --

-- Státusz tábla létrehozása
create table statusz(
	id int not null auto_increment,
	nev varchar(200) not null,

	constraint pk_statusz primary key(id)
);

-- Tag tábla létrehozása
create table tag(
	id int not null auto_increment,
	nev varchar(200) not null,
	osztondij int not null default 20000,
	e_mail varchar(200) not null,
	tagsag_kezdete date,
	aktiv tinyint default 1,
	statusz int not null,

	constraint pk_tag primary key(id),
	constraint fk_tag foreign key (statusz) references statusz(id) on delete cascade
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
	allapot tinyint default 0,
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

-- Státuszok felvétele
insert into statusz(nev) values ('Munkacsoport vezető');

insert into statusz(nev) values ('Elnökség');

insert into statusz(nev) values ('Tag');

-- Tagok felvétele

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Kovács Norbert', 1, 60000, 'mfw.kovacs.norbert@gmail.com', '2018-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Oláh Dávid', 1, 42000, 'olah.david@gmail.com', '2017-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Orosz Noémi', 2, 53000, 'orosznoemi92@gmail.com', '2020-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Vágó Antal', 3, 20000, 'vagoantal01@gmail.com', '2020-09-01');

insert into tag(nev, statusz, osztondij, e_mail, tagsag_kezdete)
	values ('Justyák Brigitta', 3, 20000, 'justyakbrigi@gmail.com', '2021-09-01');

-- Megyék felvétele

insert into megye(nev) values ('Heves');
insert into megye(nev) values ('Nógrád');
insert into megye(nev) values ('Borsod-Abaúj Zemplén');


-- Intézmények felvétele

insert into intezmeny (nev, cim, igazgato_neve, e_mail, telefon, weboldal, megye) values
	(
		'Balassagyarmati Balassi Bálint Gimnázium',
		'2660, Balassagyarmat, Deák Ferenc utca 17.',
		'Dr. Fényes-Bók Szilvia',
		'balassi@balassi-bgy.sulinet.hu',
		'0635300011',
		'balassi@balassi-bgy.sulinet.hu',
		2
	);

insert into intezmeny (nev, cim, igazgato_neve, e_mail, telefon, weboldal, megye) values
	(
		'Egri Szilágyi Erzsébet Gimnázium és Kollégium',
		'3300, Eger, Ifjúság út 2.',
		'Gönczi Sándor',
		'eszeg@eszeg.sulinet.hu',
		'0636324808',
		'www.szilagyi-eger.hu',
		1
	);

insert into intezmeny (nev, cim, igazgato_neve, e_mail, telefon, megye) values
	(
		'Földes Ferenc Gimnázium',
		'3527, Miskolc, Hősök tere 7.',
		'Veres Pál',
		'foldes@ffg.sulinet.hu',
		'0646508459',
		3
	);
