
# REST API - PHP Technical Challenge

Project developed to Dafiti's automation team as a PHP technical challenge.

## Tech Stack

**Client:** Bootstrap, jQuery

**Server:** PHP >= 7.4, Laravel 7.x, MySQL Server


## Run Locally

Clone the project

```bash
  git clone https://github.com/masolucas/dafiti-php-app.git
```

Go to the project directory

```bash
  cd dafiti-php-app
```

Install dependencies

```bash
  composer install
```

Create and configure your database then run migrations

```bash
  php artisan migrate
```

Start the server

```bash
  php artisan serve
```



## Environment Variables

To run this project, you will need to rename the `.env.example` file to `.env` and edit the following environment variables

`APP_KEY`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`


## API Reference

#### Get all items

```http
  GET /api/shirts
```

#### Get specific item

```http
  GET /api/shirts/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of item to fetch |

#### Create an item

```http
  POST /api/shirts
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. Item's name |
| `description`      | `string` | **Required**. Item's description |
| `color`      | `string` | **Required**. Item's color |
| `size`      | `string` | **Required**. Item's size |
| `brand`      | `string` | **Required**. Item's brand |
| `material`      | `string` | **Required**. Item's material |
| `price`      | `decimal (5,2)` | **Required**. Item's price |


#### Update an item

```http
  PUT /api/shirts/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of item to update |
| `name`      | `string` | Item's name |
| `description`      | `string` | Item's description |
| `color`      | `string` | Item's color |
| `size`      | `string` | Item's size |
| `brand`      | `string` | Item's brand |
| `material`      | `string` | Item's material |
| `price`      | `decimal (5,2)` | Item's price |


#### Delete an item

```http
  DELETE /api/shirts/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of item to delete |


