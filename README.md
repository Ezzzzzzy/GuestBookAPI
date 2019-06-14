# GuestBookAPI
## Project setup
```
composer install
```

### Database

1. Create a new database with `phpMyAdmin`. Use `hris` for your database name.
2. Open the command shell
3. Type `php artisan migrate:fresh --seed` and hit enter to activate the artisan command.
4. This will migrate the database tables and it will make the database accessible through `localhost/phpMyAdmin`.

### Usage

1. After *migrating*, execute a separate command shell within the project folder.
2. Generate a new APP_KEY via `php artisan key:generate` artisan command.
3. Run `php artisan serve` on your command shell, just make sure you're within the directory of your local repository.
4. Open any modern browsers (Chrome, Firefox, Edge etc) and access the application by typing `http://localhost:8000` on your address bar.
