<h1 align="center">RPA</h1>


## About RPA

RPA is short for Retail Processing App (This is only a test app).
Built from Laravel and VueJS. This application leverages Laravel Echo and Reverb for 
real-time updates.

- Realtime Messaging

This app has been developed in <b>Lavel Valet</b> environment for setting up the Laravel valet visit this <a href="https://laravel.com/docs/11.x/valet" target="_blank">link</a>



## Installation
Make sure to update the necessary values from the `.env` file before running the `composer install` and `artisan migrate command.`
It might ask for creation of sqlite file when running `artisa migrate` simply select Yes
```
git clone https://github.com/necrojan/rpa.git
cp .env.example .env
composer install
php artisan key:generate
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
Note: if using localhost we can leave this as it is to `REVERB_HOST="localhost"`

## Usage

To run this app locally without using Laravel valet 
```
php artisan serve

```



To compile the assets / JS run the command
```
npm run dev
```

Broadcast the events (--debug is optional)
```
php artisan reverb:start --debug

```

Run the event listeners

```
php artisan queue:listen

```

To use the app, open two browser one in incognito

(Laravel Valet)
</br >
`http://rpa.test/cashier` 
</br >
`http://rpa.test/fullfiller`

(Localhost)
<br />
`http://127.0.0.1:8000/cashier`
<br />
`http://127.0.0.1:8000/fullfiller`

To clear the database records
```
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
