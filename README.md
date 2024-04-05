## Darko Mihailovski - Laravel Vehicles Management Application

#### CRUD API
---
Car management application, can add, edit and delete already existing cars

> **Note:**
The application does not have the ability to log in and create new users!

## Installation

To test this application it is necessary to install the application by typing the command:

`composer install`

In the .env file you need to enter your information from the database

```
- DB_CONNECTION=
- DB_HOST=
- DB_PORT=
- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=
```

Run the next command to create the database tables:

`php artisan migrate`

To fill the database run the next command:

`php artisan db:seed`


## Cron job

softdelete for insurance_date, if the car is deleted it is in the softdelete column, after the insurance date expires it is also deleted from the softdelete column, this is done by the command

`'vehicles:cleanexpired';`

To test the cron job, it is necessary in app\Console\Kernel.php to change the function

 `everyFifteenMinutes(); in everyMinute();`
 
  and type the command in the terminal

`php artisan schedule:run`

