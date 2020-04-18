

# Blessed Quizzer

A simple PHP app that lets users on Discord submit new questions for Bezzerwizzer.

## Requirements

See [Laravel's requirements](https://laravel.com/docs/7.x#server-requirements) for info on what your PHP config should be like.

You'll also need to set all the environment variables in `.env.example` in either a `.env` file, or in your server's actual environment.

## Install

`composer install`

`php artisan migrate`

`php artisan db:seed`

If you'd like to update the styling or JS on the pages:

`npm install`

`npm run dev`

Do the latter whenever you update the `.sass` files in `resources/sass` or `resources/js`

## License

Licensed under the [MIT license](https://opensource.org/licenses/MIT).
