# Omure Weather App

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
- I used Events few times, 1 for CityAddedEvent, 1 for Weatherforecast saving event.
- I created Cron and Job for fetching data from the weather api periodically (everySixHours, 4 times a day).
- I created request for weather forecasts, and blocked more than 5 days historic data (because of limit for the endpoint that I used) and left open for future forecasts to return an error.

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
