# Laravel Boilerplate

This is a boileplace code for admin panels used by our projects. 
It contains basic views and login functionality alongside with the nessesary files for deployment and testing.
Upon frontend bootstrap is used.

## Create project:

```
composer create-project techins-software/laravel-boilerplace my-new-project
```

## Setup php dependencies

Create the nessesary .env file. If using our docker solution use the `.env.php_dev`:

```
cp .env.php_dev .env
```

> NOTE these credentials are viable if using the docker solution. It should NOT be used upon production

Then once `.env` is generated run:

```shell
composer install
php artisan key:generate
php artisan migrate
```

## Build Frontend

For development you can run:
```shell
npm install
npm run build_dev
```

For onetime builds (or ci/cd ones) run:

```shell
npm install
npm run build
```

## Github actions & CI/CD
The actions are used for:

1. Automated Tagging
2. Running Unit tests upon PR

Look at `.github/workflows` folder for more info.

## Deployment & Building for release upon Server (CI/CD)

It contains, the following basic files for building the AWS codepipeline. Also it contains the following files for deployment:

* `appspec.production.yml` For Deployment in a production traditional LEMP Stack
* `appspec.staging.yml` For Deployment in a staging traditional LEMP Stack

Also upon build the following files exist:

* .env.production for bootstrapping environment upon production
* .env.staging for bootstrapping environment upon staging

Any secret values are and should be replaced upon `buildspec.yml`

## View templates

All pages available for logged in users extend the `layout.layout-common` blade template. In case user is admin you can extend the `layout.layout-admin` one (it extends the `layout.layout-common` one placing nessesary links upon header).
Feel free to place extra views and modify them as needed. 

The `layout.fullpage` is a layout that does NOT contain any header but only a single main item located as the center of the page, usefull for login and registration pages.

Both `layout.layout-common` and `layout.fullpage` contain these sections you can place the nessesary html if needed:

* `main` that main html resides
* `nav-items` in which navigation items upon header are placed
* `js` in which Javascript files are placed upon
* `css` in which stylesheet is placed upon (NOT Available upon `layout.fullpage`)

All templates use bootstrap and fontawesome.

## Javascript
All layouts extending `layout.layout-common`, by default load the `js/default.js` file. 
In case that a custom javascript file is needed then place the appropriate js file upon `resources/js` and upon the blade template and override the `js` section, look examples bellow.

### Example 1: overriding the default js with `resources/js/myjs.js`
```blade
@extends('layout.layout-common')

@section('main')

{{!! Your html content shown upon user !!}}

@endsection

@section('js')
 @vite(['resources/js/myjs.js'])
@endsection

```

### Example 2: Loading `resources/js/myjs.js` alongside the default js
```blade
@extends('layout.layout-common')

@section('main')

{{!! Your html content shown upon user !!}}

@endsection

@section('js')
 @parent
 @vite(['resources/js/myjs.js'])
@endsection

```

## Css
There are the following css loaded bty Default upon each template:

* `resources/css/common.css` => loaded by any template it loads bootstrap and fontawesome.
* `resources/css/fullpage.css` => loaded by any template using `layout.fullpage` in includes `resources/css/common.css`.
* `reources/css/user/list.css` => loaded by template `user.listUsers` it includes `resources/css/common.css`.

In case you want to include your own css follow these steps:

### Create css files  
First create the nessesary css file upon `resources/css`. 
Then place inside inside the following:
```css
@import "resources/css/common.css";

/** rest of css goes here */

```
### Load 3rtd party css
Furthermore if using a fullpage layout and want to place extra css on it you can do it:

```css
@import "resources/css/fullpage.css";

/*Rest of css goes here*/
```

You can use `@import` to import any 3rd party css as well if needed. Is css is installed via npm ensure that is placed upon `vite.config.js` file:
https://github.com/TechIns-Software/laravel-boilerplace/blob/6331fb7a1b9238f8e9f193c80e872f116b90245c/vite.config.js#L40-L52

### Load upon blade
Either case once you have your css ready you can load the file (assuming named as `resources/css/mycss.css`):

```blade
@section('css')
  @vite(['resources/css/mycss.css'])
@endif
```
### Build frontend

Then you can build the frontend as mentioned above:

```shell
npm run build_dev
```
