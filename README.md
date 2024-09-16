# Laravel Boilerplate

This is a boileplace code for admin panels used by our projects. 
It contains basic views and login functionality alongside with the nessesary files for deployment and testing.


### Setup php dependencies

Create the nessesary .env file. If using our docker solution use the `.env.php_dev`:

```
cp .env.php_dev .env
```

> NOTE these credentials are viable if using the docker solution. It should NOT be used upon production

Then once `.env` is generated run:

```
composer install
php artisan key:generate
php artisan migrate
```

### Build Frontend

For development you can run:
```
npm install
npm run build_dev
```

# Github actions & CI/CD
The actions are used for:

1. Automated Tagging
2. Running Unit tests upon PR

# Deployment & Building for release upon Server (CI/CD)

It contains the following basic files for building the AWS codepipeline. Also it contains the following files for deployment:

* appspec.production.yml For Deployment in a production traditional LEMP Stack
* appspec.staging.yml For Deployment in a staging traditional LEMP Stack

Also upon build the following files exist:

* .env.production for bootstrapping environment upon production
* .env.staging for bootstrapping environment upon staging

Any secret values are and should be replaced upon `buildspec.yml`
