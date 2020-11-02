# DATOBO (Danny's ToolBox)

## My personal Site with handy Tools
Just a little personal project to combine functionality I often use on other web apps.
This way I can have everything combined in one place. 
Also meant as a learning exercise since I am currently learning VueJS during Covid. 
>Based on https://github.com/nandi95/laravel-vue-spa

## Functionality (Will be expanded in the future - suggestions are always welcome)

- Video Downloader for Instagram and Youtube videos (not working yet)
- Image Gallery Merger to merge galleries of multiple image into a single image file (not working yet)
- PDF Tools to manipulate PDF files like merging multiple files into one or extracing certain pages
- Random Color Generator. Generates random colors and its complementary colors. In the future I'd like this to generate whole color palettes. The colors are already generated in the Backend on the PHP side. These colors shall later be savable into the Database for the current logged in user.

## Built with

- Laravel 7
- Vue + VueRouter
- Pages with dynamic import and custom layouts
- ~~Login, register, email verification and password reset~~ (Currently removed)
- ~~Authentication with JWT~~ (Currently removed - Gets reinstated when I re-add Auth functionality)
- ~~TailwindCSS~~ Vuetify

## Installation

- youtube-dl must be installed
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