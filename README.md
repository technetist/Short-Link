# Short-Link

To run this project pull it down and run `composer install`, `yarn install`, and `npm run prod`.

Copy the .env.example to .env. Make sure you have an App ID. If you don't, run `php artisan key:generate`. Finally, add the local URL you are using to the .env file under the `APP_URL` variable.

You will want to populate the database by running `php artisan migrate` and `php artisan db:seed`. This will add a default admin user, which will store orphan shortened URLS.