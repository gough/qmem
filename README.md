# QMEM

QMEM (Queen's Medical Equipment Manager) is an equipment management and asset tracking application.

## Getting Started

The following instructions will get you a copy of the project running on your own machine for development and testing purposes. For deployment to a production environment, consult the Deployment section.

### Prerequisites

For this project, a web stack consisting of at least Apache, MySQL, and PHP is required. Alternatives may also work but are not supported at this time.

If you do not already have a stack set up, look into using one of the following installers to get up and running quickly:

- [XAMPP](https://www.apachefriends.org/index.html) (for Windows)
- [MAMP](https://www.mamp.info/en/) (for Mac)

### Installing

Clone the repository into your root web directory.
```
git clone https://github.com/gough/qmem
```

Create a file called `.env` in the root project directory to store the environment variables. A template is available from the [Laravel project](https://raw.githubusercontent.com/laravel/laravel/master/.env.example), but the most important variables (those prefixed by `APP` and `DB`) are below.
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database name>
DB_USERNAME=<username>
DB_PASSWORD=<password>
```

For search to work, you must also create an account with [Algolia](https://www.algolia.com/) and supply an application ID, secret, and search-only secret. The information should be stored in the `.env` file described above, using the variables below.

```
ALGOLIA_APP_ID=<algolia_app_id>
ALGOLIA_SECRET=<algolia_secret>
ALGOLIA_SEARCH_ONLY_SECRET=<algolia_search_only_secret>
```

Update all packages using [Composer](https://getcomposer.org/):
```
composer update
```

Lastly, initialize the database by running all migrations and seeding the database:
```
php artisan migrate:refresh && php artisan db:seed
```

If everything worked and no errors were encountered, you should now be able to load the application in any web browser by visiting the root web directory!

If errors were encountered, consult the Troubleshooting section for further information.

### Usage

After successfully completing the instructions above for Installing, you can access the application by navigating to the web server IP address and port (usually 80) specific to your environment.

If you encouter any issues, please refer to the Troubleshooting section below.

### Troubleshooting

---

**Problem:** SQL [...] Connection refused

**Solution:** This error means that either your database server is not running or the credentials in the `.env` file are incorrect. Check that the server is running, that the credentials are correct, and try again.

---

**Problem:** "Whoops, looks like something went wrong."

**Solution:** This can mean a whole load of things. If it happens right after cloning the application, you probably forgot to create a `.env` file. See above in the Getting Started section for more details.

---

If your problem does not have a solution listed above, [create an issue](https://github.com/gough/qmem/issues) using the issue tracker for this repository. 

## Deployment

For deployement to a production environment, follow the instructions above for Installing, but replace modify the configuration variables in the `.env` file to match your environment. A list of variables that commonly will need to be change is provided below.

- `APP_ENV`
- `APP_DEBUG`
- `APP_URL`
- All `DB` variables
- All `ALGOLIA` variables

## Built With

- [PHP 7](http://www.php.net/)
- [Laravel](https://laravel.com/) and the following packages:
	- [laravel/scout](https://github.com/laravel/scout) & [algolia/algoliasearch-client-php](https://github.com/algolia/algoliasearch-client-php) (searching and indexing)
	- [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf) (exporting to PDF)
	- [codeitnowin/barcode](https://github.com/codeitnowin/barcode-generator) (generating barcodes)
	- [graham-campbell/markdown](https://github.com/GrahamCampbell/Laravel-Markdown) (Markdown editing and displaying on item pages)
	- [intervention/image](https://github.com/Intervention/image) (image editing and compression)
	- [kyslik/column-sortable](https://github.com/Kyslik/column-sortable) (sorting table columns on listing pages)
	- [laracasts/flash](https://github.com/laracasts/flash) (displaying status messages)
	- [laravelcollective/html](https://github.com/LaravelCollective/html) (creating forms)
	- [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel) & [phpoffice/phpspreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) (exporting to CSV)
	- [pragmarx/version](https://github.com/antonioribeiro/version) (versioning)
	- [venturecraft/revisionable](https://github.com/VentureCraft/revisionable) (keeping track of changes to items)
- [Bootstrap 4](https://getbootstrap.com/)

## History

TODO: Write history

## Contributors

- [Adam Gough](https://github.com/gough)
- [Annika Nicol](https://github.com/getitdon)
- [Joshua Horner](https://github.com/WalkingInCircles)
- [Lucy Rowland](https://github.com/lucyrowland)
- [Sasha Sreckovic](https://github.com/ssreckovic)

## License

All work copyright their respective authors.
