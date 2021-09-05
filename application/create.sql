
-- Intézmény létrehozásának első verziója
create table institution(
	id int not null auto_increment,
    megnevezes varchar(200) not null,
    megye varchar(100) not null,
    cím varchar(200) not null,
    igazgató_neve varchar(100),
    e_mail varchar(150),
    telefon varchar(11),
    weboldal varchar(100),
    aktiv tinyint default 1,

    constraint PK_institution primary key(id)
);


insert into institution(megnevezes, megye, cím, igazgató_neve, e_mail, telefon, weboldal)
    values
    (
        'Balassagyarmati Balassi Bálint Gimnázium',
        'Nógrád megye',
        '2660, Balassagyarmat, Deák Ferenc utca 17.',
        'Dr. Fényes-Bók Szilvia',
        'balassi-bgy.sulinet.hu',
        '0635300011',
        'www.balassi-bgy.sulinet.hu'
    );

insert into institution(megnevezes, megye, cím, igazgató_neve, e_mail, telefon, weboldal)
    values
    (
        'Egri Szilágyi Erzsébet Gimnázium és Kollégium',
        'Heves megye',
        '3300, Eger, Ifjúság út 2.',
        'Gönczi Sándor',
        'eszeg@eszeg.sulinet.hu',
        '0636324808',
        'www.szilagyi-eger.hu'
    );

insert into institution(megnevezes, megye, cím, igazgató_neve, e_mail, telefon)
	values
	(
		'Földes Ferenc Gimnázium',
	    'Borsod-Abaúj Zemplén megye',
	    '3527, Miskolc, Hősök tere 7.',
	    'Veres Pál',
	    'foldes@ffg.sulinet.hu',
		'0646508459'
	);

-- Ha azt szeretnénk, hogy a megyéket ki tudjuk az adatbázisból listázni, akkor
-- Újra kell gondolnunk a táblákat.

create table megye(
	id int not null auto_increment,
	megnevezes varchar(200),

	constraint PK_megye primary key(id)
);

insert into megye(megnevezes) values('Heves');
insert into megye(megnevezes) values('Nógrád');
insert into megye(megnevezes) values('Borsod-Abaúj Zemplén');



create table tag(
	id int not null auto_increment,
	nev varchar(200) not null,
	statusz varchar(100) not null,
	osztondij int not null default 20000,
	e_mail varchar(150) not null,
	tagsag_kezdete int,
	aktiv tinyint default 1,

	constraint PK_tag primary key(id)
);
