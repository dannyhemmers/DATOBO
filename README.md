# DATOBO (Danny's ToolBox)

## My personal Site with handy Tools
Just a little personal project to combine functionality I often use on other web apps.
This way I can have everything combined in one place. 
Also meant as a learning exercise since I am currently learning VueJS during Covid. 
>Based on https://github.com/nandi95/laravel-vue-spa

## Functionality (Will be expanded in the future - suggestions are always welcome)

- Video Downloader for Instagram, Reddit and Twitter videos (Working - But error handling not yet fully completed)
- Image Gallery Merger to Instagram galleries of multiple image into a single image file (Working - But error handling not yet fully completed)
- PDF Tools to manipulate PDF files like merging multiple files into one or extracing certain pages (Work in Progress - very early stages)
- Random Color Generator. Generates random colors and its complementary colors. In the future I'd like this to generate whole color palettes. The colors are already generated in the Backend on the PHP side. These colors shall later be savable into the Database for the current logged in user. (Basic functionality working)
- Paste function for code snippets (Work in Progress)

## Built with

- Laravel 7
- Vue + VueRouter
- Login, register, ~~email verification and password reset~~ (Currently removed - I plan to let users register without verification)
- Authentication with JWT
- ~~TailwindCSS~~ Replaced Tailwind with Vuetify as I like Material Design much more

## Installation

- PDFtk Server must be installed and be accessible via System PATH
- youtube-dl must be installed and be accessible via System PATH
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
I currently removed Email Verification. If you want it than you have to do the following:

To enable email verification make sure that your `App\Models\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.