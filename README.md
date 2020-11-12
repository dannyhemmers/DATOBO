
#  DATOBO (Danny's ToolBox)
> Currently hosted at https://datobo.xyz/
  

##  My personal Site with handy Tools

Just a little personal project to combine functionality I often use on other web apps.

This way I can have everything combined in one place.

Also meant as a learning exercise since I am currently learning VueJS during Covid.

>Based on https://github.com/nandi95/laravel-vue-spa

  

##  Functionality (Will be expanded in the future - suggestions are always welcome)

  
- Video Downloader for Instagram, Reddit and Twitter videos (Working - But error handling not yet fully completed)

- Image Gallery Merger to Instagram galleries of multiple image into a single image file (Working - But error handling not yet fully completed)

- PDF Tools to manipulate PDF files like merging multiple files into one or extracing certain pages (Work in Progress - very early stages)

- Random Color Generator. Generates random colors and its complementary colors. In the future I'd like this to generate whole color palettes. The colors are already generated in the Backend on the PHP side. These colors shall later be savable into the Database for the current logged in user. (Basic functionality working)

- NoPaste-function to share text and code snippets (Basic functionality working)

  

##  Built with

- Laravel 7

- Vue + VueRouter

- Login, register, ~~email verification and password reset~~ (Currently removed - Users can register without confirming their email adress)

- Authentication with JWT

- ~~TailwindCSS~~ Replaced Tailwind with Vuetify as I like Material Design much more

  

## File Structure (Only the most important stuff)
### Backend (PHP - Laravel)

`app\Http\Controllers\ColorController.php`
- Generates random colors and calculates its complementary colors

`app\Http\Controllers\DomainValidator.php`
- Not really a Controller, but is being used by Controllers as they create an Object of it. Validates a given URL against an array of given whitlested URLs

`app\Http\Controllers\DownloadController.php`
- Creates an object of the `youtube-dl-php` Class to communicate with youtube-dl to then download videos from a given URL

`app\Http\Controllers\MergeController.php`
- Uses Laravel's own HTTP library (Guzzle Wrapper) to download Instagram Posts and then uses `Intervention Image` to merge all Images of the given Post

`app\Http\Controllers\PasteController.php`
- Creates a new Object of the Paste Class / Model and saves a given Paste in the Database

`app\Http\Controllers\PDFController.php`
- Creates an object of the `php-pdftk` Class to communicate with PDFtk to then manipulate PDF files

`app\Models\Paste.php`
- Eloquent Model for the Paste

`app\Models\User.php`
- Eloquent Model for the User

`database\migrations\2014_10_12_000000_create_users_table.php`
- Table structure for the users table

`database\migrations\2020_11_11_202024_create_pastes_table.php`
- Table structure for the pastes table

`routes\api.php`
- Contains all Backend Routes

### Frontend ( JavaScript - VueJS)
`resources\js\components\HomeCard.vue`
- Card for displaying Information and linking to another page. Is used on the home view

`resources\js\components\LocaleDropdown.vue`
- Is not really a Dropdown anymore. Contains 2 buttons to switch between German and English language. Might refactor soon to a more fitting name

`resources\js\components\Navbar.vue`
- Contains the Navbar that is on top of the page at all times

`resources\js\lang\de.json`
- JSON Object with Strings for the German Language

`resources\js\lang\en.json`
- JSON Object with Strings for the English Language

`resources\js\layouts\default.vue`
- The main Layout file where everything is laid out (Navbar, Router-View, etc)

`resources\js\pages\auth\login.vue`
- Login Form

`resources\js\pages\auth\register.vue`
- Register Form

`resources\js\pages\downloader.vue`
- View for the Video Downloader

`resources\js\pages\home.vue`
- View for the Home Screen

`resources\js\pages\imagemerger.vue`
- View for the Instagram Image Merger

`resources\js\pages\nopaste.vue`
- View for the NoPaste

`resources\js\pages\pdfmerge.vue`
- View for the PDF Tools

`resources\js\pages\randomcolor.vue`
- View for the Random Color Generator

`resources\js\router\roues.js`
- Frontend Routes


##  Installation

- `git clone https://github.com/dannyhemmers/DATOBO.git`

- Rename .env.example to .env and add Database information

- `composer install`

- `php artisan key:generate`

- `php artisan jwt:secret`

- `php artisan migrate`

- `npm install`

- PDFtk Server must be installed and the path to its binary must be added to the .env file

- youtube-dl must be installed and the path to its binary must be added to the .env file

  

##  Usage

  

####  Development

  

```bash

# build and watch

npm run watch

  

# serve with hot reloading

npm run hot

```

  

####  Production

  

```bash

npm run production

```

##  Email Verification

I currently removed Email Verification. If you want it than you have to do the following:

To enable email verification make sure that your `App\Models\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.