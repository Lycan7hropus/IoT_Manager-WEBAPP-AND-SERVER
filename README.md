
<h2> INTRODUCTION </h2>



PHP / JS / BOOTSTRAP / MYSQL was used to create this project.
First time when I have worked with those technologies. <br>
In addition to the web application, this project also includes an Android application (it communicates with the server using REST API) and esp8266 which read data from the sensor and send it to the server.
<br><br>
ANDROID APP: https://github.com/HomoLupus/iotManagerMobile
<br> 
ESP: https://github.com/HomoLupus/espHttpClient
<br><br>

![image](https://user-images.githubusercontent.com/83671766/189609027-474e9bb2-c7d8-4447-9c4e-16f9a457451a.png)

<h1> WEBAPP </h1>

General app capabilities:

<ul>
  <li>Registration</li>
  <li>Login</li>
  <li>Adding a sensor to an account</li>
  <li>removing the sensor from the account</li>
  <li>reading measurements from sensors</li>
</ul>

<h2> LOGIN PAGE </h2>


![image](https://user-images.githubusercontent.com/83671766/189491663-7d95f72c-05ce-4d05-b5f1-b014e88eb69d.png)
<br><br>



<h2> HOME PAGE </h2>
There you can select what you want to do, you can watch sensor measurements, or bind a new sensor with your account

![image](https://user-images.githubusercontent.com/83671766/189493065-36fda15e-43be-4372-8cb2-fce971428f3a.png)

<br><br>

<h2> ADD NEW SENSOR </h2>

To add a sensor to an account, enter the id of the esp chip (more you can find here: https://github.com/HomoLupus/espHttpClient), and set password and sensor's label. Many users can bind the same sensor to their accounts, but the first one will be an administrator who will be able to manage this device. Chip id is displayed during device configuration

![image](https://user-images.githubusercontent.com/83671766/189493368-f5cb2fd3-748d-48b0-af83-fc7b68ad853b.png)
<br><br>

<h2> GRPAH PAGE </h2>

Charts from the https://canvasjs.com/ website are used to present the data.
You can view data from different periods, there are also displayed last meusurments which refresh everey 10 seconds. 
![image](https://user-images.githubusercontent.com/83671766/189493891-0c5b23f1-b664-4b80-a30a-0c9e0e1b0c19.png)
![image](https://user-images.githubusercontent.com/83671766/189494641-b2ce0da6-3b9f-4cdd-9cda-203f44305971.png)
<br><br>

<h2> SETTINGS </h2>

There you can change account credentials or remove sensors associated with account
![image](https://user-images.githubusercontent.com/83671766/189493969-4b8d8b56-9afc-4851-994e-e14fd546d2e7.png)
![image](https://user-images.githubusercontent.com/83671766/189494006-06f0a5a7-c7d9-425c-be68-99347a263e80.png)




