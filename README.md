# Omure Weather App

<img width="1335" alt="Screen Shot 2022-03-23 at 18 10 50" src="https://user-images.githubusercontent.com/16459896/159737585-73c2ade1-f15b-4782-bb29-2c32cb77b333.png">

<img width="1302" alt="Screen Shot 2022-03-23 at 17 48 24" src="https://user-images.githubusercontent.com/16459896/159737630-fca9e17d-9c72-4da1-bcae-224931d21e8d.png">
<img width="528" alt="Screen Shot 2022-03-23 at 17 48 38" src="https://user-images.githubusercontent.com/16459896/159737646-d1063ce7-b607-4e4c-aebe-536bdd75e5de.png">
<img width="562" alt="Screen Shot 2022-03-23 at 17 48 30" src="https://user-images.githubusercontent.com/16459896/159737650-d4677f8e-2e19-45c9-9245-8ea6fc484b5e.png">


## Setup

- I dockerized the whole app.
- You can change `APP_PORT` inside .env.example if you need to. Change it before setup. Default is 86.
- Run `sh setup.sh` inside the project directory, this command should create required containers and make migrations.
- Your browser should open the page for the project automatically. If your browser does not open. Please move to the next item.
- Visit `localhost:86`, if you changed your APP_PORT visit `localhost:APP_PORT`
- You can connect to the php container with `docker exec -it omure_php-fpm bash` command if you need to.
- To stop the containers just run `sh stop.sh`

## API Endponts
- `/api/cities`to get all cities and their locations
- `/api/locations` to get all locations
- `/api/weather-forecasts` to get all weather forecasts. Date field is requrired.

## Notes

- I create an API, also front end with VueJS/TailwindCss
- I used axios for making requests.
- Some design desicions made on purpose (creating 2 tables for cities-locations, all data could be single table)
- I wrote both Feature and Unit tests.
- I used Events few times, 1 for CityAddedEvent, 1 for Weatherforecast saving event.
- I created Cron and Job for fetching data from the weather api periodically (everySixHours, 4 times a day).
- I created request for weather forecasts, and blocked more than 5 days historic data (because of limit for the endpoint that I used) and left open for future forecasts to return an error.

![Screen Shot 2022-03-23 at 18 31 49](https://user-images.githubusercontent.com/16459896/159737686-f2d13cae-6486-4d1b-96c7-e1137dd7855d.png)


## Goals

Create a CRUD API for Weather Forecast Model, run cron jobs and setup queue Jobs and setup basic unit Testing.
The overall goal is to showcase the ability to write well optimized Laravel apps with some complexity.

## Details

Create a Weather Forecast Model to store the weather forecast from a 3rd party vendor.

Create an API to pull the Weather Forecast for the inputted Date.
If the selected Date is not in the database, pull it in from the Weather API.
If data for the Date is not available in the Weather API return an error.

When pulling, storing and returning the data get/store/return results for all of the following locations:

- New York
- London
- Paris
- Berlin
- Tokyo

4 Times a day,  pull/store/update Weather API results for that day.

## Task Notes

- Use Jobs at least once
- Use Events at least once
- For Weather API use [https://openweathermap.org/api](https://openweathermap.org/api) or similar
