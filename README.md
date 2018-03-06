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

For search to work, you must also create an account with [Algolia](https://www.algolia.com/) and supply an application ID and secret. The information should be stored in the `.env` file described above, using the variables below.

```
ALGOLIA_APP_ID=<algolia_app_id>
ALGOLIA_SECRET=<algolia_secret>
```

Initialize the database by running all migrations:
```
php artisan migrate
```

If everything worked and no errors were encountered, you should now be able to load the application in any web browser by visiting the root web directory!

If errors were encountered, consult the Troubleshooting section for further information.

### Usage

TODO: Write usage

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

TODO: Write deployment instructions

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
