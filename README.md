# Geocoding API Client

A Google Geocoding API Client

## Description
An app allows to get a full address of the point by it's geocoordinates from the Google [Geocoding API](https://developers.google.com/maps/documentation/geocoding). All required points are stored in the local database. It is possible to retreview all stored regions, cities and points. Also, you can get stored points by region or city.

## Available requests
|Method     |Url                            |Action                                 |
|-----------|-------------------------------|---------------------------------------|
|POST       |/points                        |Store point                            |
|GET        |/points                        |Retreview all stored points            |
|GET        |/regions/{region_id}/points    |Retreview stored points by region id   |
|GET        |/cities/{city_id}/points       |Retreview stored points by city id     |
|GET        |/regions                       |Retreview all stored regions           |
|GET        |/cities                        |Retreview all stored cities            |

## Dependencies

The project is buid using [Laravel 9](https://laravel.com) PHP Framework, [PHP 8.1](https://php.net) and staffed with a [Docker](https://docker.com) environment configuration files.

## Usage

### Install & Run

1. Clone this repository. To do so open CLI in your project directory and run:

```
git clone https://github.com/mustakrakishe/geocoding-api-client .
```

2. Duplicate the _.env.example_ file and rename it to _.env_.

3. Set your [Geocoding Api Key](https://developers.google.com/maps/documentation/geocoding/get-api-key) to `GEOCODE_TOKEN` variable in the .env file:

```env
GEOCODE_TOKEN=your_geocode_api_key
```

4. Open CLI in a project dir and up the Docker environment:

```
docker-compose up -d
```

It will create and run 4 containers:
- composer;
- mysql;
- php;
- nginx.

After processing composer container should stop. Further project will work with 3 containers only.

### Stop

Run in the CLI from the project dir:

```
docker-compose stop
```
### Run

Run in the CLI from the project dir:

```
docker-compose start
```
### Uninstall

Run in the CLI from the project dir:

```
docker-compose down -v --rmi local
```

 It will remove project containers, related volumes and builded images.

## Request examples

### 1. Store point

- Request:

[POST] `http://localhost/api/points`

```json
{
    "latitude": 49.974198,
    "longitude": 36.227454
}
```

- Response:

```json
{
    "data": {
        "latitude": 49.974198,
        "longitude": 36.227454,
        "full_address": "Kyivska St, 4, Kharkiv, Kharkivs'ka oblast, Ukraine, 61000",
        "city": "Kharkiv",
        "region": "Kharkiv Oblast"
    },
    "status": "OK"
}
```

### 2. Retreview all stored points 

- Request:

[GET] `http://localhost/api/points`

- Response:

```jsonc
{
    "data": [
        {
            "latitude": 49.974198,
            "longitude": 36.227454,
            "full_address": "Kyivska St, 4, Kharkiv, Kharkivs'ka oblast, Ukraine, 61000",
            "city": "Kharkiv",
            "region": "Kharkiv Oblast"
        },
        {
            "latitude": 49.966901,
            "longitude": 24.611972,
            "full_address": "Parkova St, 13м, Bus'k, L'vivs'ka oblast, Ukraine, 80500",
            "city": "Busk",
            "region": "Lviv Oblast"
        }
        ...
    ],
    "status": "OK"
}
```

### 3. Retreview stored points by region id

- Request:

[GET] `http://localhost/api/regions/2/points`

- Response:

```json
{
    "data": [
        {
            "latitude": 49.826467,
            "longitude": 24.016354,
            "full_address": "Vulytsya Komaryntsya, 2, L'viv, L'vivs'ka oblast, Ukraine, 79000",
            "city": "Lviv",
            "region": "Lviv Oblast"
        },
        {
            "latitude": 49.966901,
            "longitude": 24.611972,
            "full_address": "Parkova St, 13м, Bus'k, L'vivs'ka oblast, Ukraine, 80500",
            "city": "Busk",
            "region": "Lviv Oblast"
        }
    ],
    "status": "OK"
}
```

### 4. Retreview stored points by city id

- Request:

[GET] `http://localhost/api/cities/1/points`

- Response:

```json
{
    "data": [
        {
            "latitude": 49.974198,
            "longitude": 36.227454,
            "full_address": "Kyivska St, 4, Kharkiv, Kharkivs'ka oblast, Ukraine, 61000",
            "city": "Kharkiv",
            "region": "Kharkiv Oblast"
        },
        {
            "latitude": 49.940968,
            "longitude": 36.391452,
            "full_address": "Biblyka St, 57, Kharkiv, Kharkivs'ka oblast, Ukraine, 61000",
            "city": "Kharkiv",
            "region": "Kharkiv Oblast"
        }
    ],
    "status": "OK"
}
```

### 5. Retreview all stored regions

- Request:

[GET] `http://localhost/api/regions`

- Response:

```json
{
    "data": [
        {
            "id": 1,
            "name": "Kharkiv Oblast",
            "cities": [
                "Kharkiv",
                "Tetyushchyne"
            ]
        },
        {
            "id": 2,
            "name": "Lviv Oblast",
            "cities": [
                "Lviv",
                "Busk"
            ]
        }
    ],
    "status": "OK"
}
```

### 6. Retreview all stored cities

- Request:

[GET] `http://localhost/api/cities`

- Response:

```json
{
    "data": [
        {
            "id": 1,
            "name": "Kharkiv",
            "region": "Kharkiv Oblast"
        },
        {
            "id": 2,
            "name": "Tetyushchyne",
            "region": "Kharkiv Oblast"
        },
        {
            "id": 3,
            "name": "Lviv",
            "region": "Lviv Oblast"
        },
        {
            "id": 4,
            "name": "Busk",
            "region": "Lviv Oblast"
        }
    ],
    "status": "OK"
}
```
