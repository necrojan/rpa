<h1 align="center">RPA</h1>


## About RPA

RPA is short for Retail Processing App (This is only a test app).
Built from Laravel and VueJS. This application leverages Laravel Echo and Reverb for 
real-time updates.

- Realtime Messaging

This app has been developed in Lavel Valet environment for setting up the Laravel valet visit this <a href="https://laravel.com/docs/11.x/valet" target="_blank">link</a>





## Installation
Make sure to update the necessary values from the `.env` file before running the `composer install` and `artisan migrate command.`
It might ask for creation of sqlite file when running `artisa migrate` simply select Yes
```
git clone https://github.com/necrojan/rpa.git
cp .env.example .env
composer install
php artisan migrate
npm install

```
To enable Reverb broadcasting driver and to generate env variables needed.

```
php artisan reverb:install
```
Since this was developed in Laravel valet, we need to update the Host.
```
REVERB_HOST="rpa.test"
```

## Usage
To compile the assets / JS run the command
```
npm run dev
```

Broadcast the events
```
php artisan reverb:start

```

Run the event listeners

```
php artisan queue:listen

```

To use the app, open two browser one in incognito
</br >
`/cashier` 
</br >
`/fullfiller`

To clear the database records
```angular2html
php artisan tinker

> $items = Item::all();
> $items->map->delete();
```

## Test
To test the app, simple run this into the terminal.
```
./vendor/bin/phpunit
```



## License

[MIT license](https://opensource.org/licenses/MIT).
