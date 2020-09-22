# DATOBO (Danny's ToolBox)

## My personal Site with handy Tools
>Based on https://github.com/nandi95/laravel-vue-spa


## Built with

- Laravel 7
- Vue + VueRouter
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- TailwindCSS

## Installation

- `git clone https://github.com/dannyhemmers/DATOBO.git`
- Rename .env.example to .env and add Database information
- `composer install`
- `php artisan key:generate` 
- `php artisan jwt:secret`
- `php artisan migrate`
- `npm install`

## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```
## Email Verification

To enable email verification make sure that your `App\Models\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.