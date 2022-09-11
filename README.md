
<h2> INTRODUCTION </h2>
<h3>  The application may contain bugs and imperfections because work on this project is still ongoing!</h3> 


PHP / JS / BOOTSTRAP / MYSQL was used to create this project.
Please be aware that it was the first time when I have worked with those technologies. <br>
In addition to the web application, this project also includes an Android application (it communicates with the server using REST API) and esp8266 which read data from the sensor and send it to the server.
<br><br>
ANDROID APP: https://github.com/HomoLupus/iotManagerMobile
<br> 
ESP: https://github.com/HomoLupus/espHttpClient
<br><br>


General app capabilities:

<ul>
  <li>Registration</li>
  <li>Login</li>
  <li>Adding a sensor to an account</li>
  <li>removing the sensor from the account</li>
  <li>reading measurements from sensors</li>
</ul>


<h2> LOGIN PAGE </h2>
To check how the web application works, go to the http://sandbox.ct8.pl/main.php
and use this data to log in:
<ul>
  <li>Login: HomoLupus</li>
  <li>Password: 12345</li>
</ul>

![image](https://user-images.githubusercontent.com/83671766/189491663-7d95f72c-05ce-4d05-b5f1-b014e88eb69d.png)
<br><br>



<h2> HOME PAGE </h2>
There you can select what you want to do, you can watch sensor measurements, or bind a new sensor with your account

![image](https://user-images.githubusercontent.com/83671766/189493065-36fda15e-43be-4372-8cb2-fce971428f3a.png)

<br><br>

<h2> ADD NEW SENSOR </h2>

Aby dodac czujnik do konta nalezy podac id chipa esp. Id chipa wyswietla sie podczas konfiguracji urzadzenia wiecej znajdziesz tutaj: https://github.com/HomoLupus/espHttpClient
![image](https://user-images.githubusercontent.com/83671766/189493368-f5cb2fd3-748d-48b0-af83-fc7b68ad853b.png)
<br><br>

<h2> GRPAH PAGE </h2>

Strona z pomiarami, do prezentacji danych uzylem wykresow ze strony https://canvasjs.com/.
Mozesz wyswietlac dane z roznych okresow
![image](https://user-images.githubusercontent.com/83671766/189493891-0c5b23f1-b664-4b80-a30a-0c9e0e1b0c19.png)
![image](https://user-images.githubusercontent.com/83671766/189494641-b2ce0da6-3b9f-4cdd-9cda-203f44305971.png)
<br><br>

<h2> SETTINGS </h2>

Ustawnienia, mozesz tutaj zmienic credentiale swojego konta lub usunac czujnik przypisany do twojego konta
![image](https://user-images.githubusercontent.com/83671766/189493969-4b8d8b56-9afc-4851-994e-e14fd546d2e7.png)
![image](https://user-images.githubusercontent.com/83671766/189494006-06f0a5a7-c7d9-425c-be68-99347a263e80.png)




