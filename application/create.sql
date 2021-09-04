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
