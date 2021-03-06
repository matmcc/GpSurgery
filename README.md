# GpSurgery
Laravel app for GP Surgery  
  
Video overview here  
[![Over Surgery Video Overview](https://img.youtube.com/vi/72gt5mdvbQY/0.jpg)](https://youtu.be/72gt5mdvbQY)  
  
To Install:  
Clone the project  
Navigate to the application root folder in cmd or terminal  
Run 'composer require "laravelcollective/html":"^5.4.0"'  
Run 'composer require maddhatter/laravel-fullcalendar'  
Run 'composer require laracasts/utilities'  
Run 'composer install'  

Copy .env.example file to .env on the root folder.   
(You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu)  
Open .env file and change the database name (DB_DATABASE), username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your DB (MySQL) configuration.   
By default, username is 'root' and password field is empty. (For Xampp, Laragon)   
  
Run php artisan key:generate  
Run php artisan migrate  
Run php artisan db:seed  
Run php artisan serve  
  
Go to localhost:8000  
  
Look in the DB for user and admin details - user have password: 'secret', admins have password: 'password'.  
  
If you receive a SwiftMailer exception then you may need to set email username and password in .env  
You can set up a [mailtrap account](https://mailtrap.io) and use the SMTP username and password for the demo inbox for testing purposes    
