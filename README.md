<h1 align="center">RPA</h1>


## About RPA

RPA is short for Retail Processing App (This is only a test app).
Built from Laravel and VueJS. This application leverages Laravel Echo and Reverb for 
real-time updates.

- Realtime Messaging

This app has been developed in Lavel Valet environment for setting up the Laravel valet visit this <a href="https://laravel.com/docs/11.x/valet" target="_blank">link</a>





## Installation
Make sure to update the necessary values from the `.env` file before running the `composer install` and `artisan migrate command.`

```
git clone https://github.com/necrojan/rpa.git
cp .env.example .env
composer install
php artisan migrate
npm install

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


## Test
To test the app, simple run this into the terminal.
```
./vendor/bin/phpunit
```



## License

[MIT license](https://opensource.org/licenses/MIT).
