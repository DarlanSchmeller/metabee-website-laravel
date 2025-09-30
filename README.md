# :honeybee: Metabee Website (Laravel)

This is a website developed for the brazilian company Metabee built using Laravel 12 and Tailwind CSS.

## Usage

#### Install composer dependencies

```
composer install
```

#### Install NPM dependencies and build assets

```
npm install
npm run build
```

#### Add .env Variables

Rename the `.env.example` file to `.env` and add your database values. Change driver and port as needed.

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### Run Migrations

```
php artisan migrate
```

#### Seed Database (Optional)

You can seed the database with users, jobs and bookmarks

```
php artisan db:seed
```

You will have a test user available with the following credentials:

-   Email: test@test.com
-   Password: 12345678

#### Run Server

If you are using artisan to serve, run the following:

```
php artisan serve
```

Open http://localhost:8000