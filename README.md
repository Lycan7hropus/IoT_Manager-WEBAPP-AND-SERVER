# iotManager-FRONT-BACKEND

!Aplikacja moze zawierac bugi i niedoskonalosci, poniewaz prace nad tym projektem jeszcze trwaja!


Do stworzenia tego projektu zostal wykorzystany PHP/JS/BOOTSTRAP/MYSQL. Oprocz aplikacji internetowej w sklad tego projektu wchodzi rowniez aplikacja na androida (komunikujaca sie z serwerem przy pomocy REST API) orazesp8266 z programem wysylajacym odczytane dane z czujnika na server. 

Mozliowsci aplikacji:
Rejestrowanie
Logowanie
dodawanie czujnika do konta
usuwanie czujnika z konta
odczytwanie pomiarow z danego czujnika

Aby samemu sprawdzic dzialanie aplikacji webowej wejdz na strone http://sandbox.ct8.pl/main.php
oraz uzyj tych danych aby sie zalogowac:
Login: HomoLupus
Password: 12345

![image](https://user-images.githubusercontent.com/83671766/189491663-7d95f72c-05ce-4d05-b5f1-b014e88eb69d.png)

Strona glowna:
Mozliwosc dodania czujnika lub odczytania pomiarow z czujnika juz dodanego
![image](https://user-images.githubusercontent.com/83671766/189493065-36fda15e-43be-4372-8cb2-fce971428f3a.png)

Aby dodac czujnik do konta nalezy podac id chipa esp. Id chipa wyswietla sie podczas konfiguracji urzadzenia wiecej znajdziesz tutaj: https://github.com/HomoLupus/espHttpClient
![image](https://user-images.githubusercontent.com/83671766/189493368-f5cb2fd3-748d-48b0-af83-fc7b68ad853b.png)

Strona z pomiarami, do prezentacji danych uzylem wykresow ze strony https://canvasjs.com/
![image](https://user-images.githubusercontent.com/83671766/189493891-0c5b23f1-b664-4b80-a30a-0c9e0e1b0c19.png)

Ustawnienia, mozesz tutaj zmienic credentiale swojego konta lub usunac czujnik przypisany do twojego konta
![image](https://user-images.githubusercontent.com/83671766/189493969-4b8d8b56-9afc-4851-994e-e14fd546d2e7.png)
![image](https://user-images.githubusercontent.com/83671766/189494006-06f0a5a7-c7d9-425c-be68-99347a263e80.png)




