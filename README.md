#
### CoronaTime

"Coronatime" helps people to find out most recent information about covid, which consists of new cases, fatal cases and recovered 
 with covid-19 virus in different countries, information is sorted in table, which can be sorted in any order user wants it to be.

On the first page user interacts with login page, where user can log in if account is present or register with email verification feature, if user forgets password, there should be no worries, because application provides ability to reset password, which also can be done via email confirmation, while logging in user can click on 'remember this device' checkbox to make application functionality more comfortable.

Inside the application there is two sides, worldwide and countries statistic, where data is synchronized daily, with written artisan command.

Application supports English and Georgian languages.

#
### Table of content

1. [Introduction](#Introduction)
2. [Prerequisites](#Prerequisites)
3. [Tech Stack](#Tech-Stack)
4. [Getting Started](#Getting-Started)
5. [Development](#Development)
6. [Deployment](#Deployment)
7. [Resources](#Resources)

#
### Prerequisites

* <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@8.0 and up*
* <img src="readme/assets/sql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> *npm@6 and up*
* <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2 and up*



#
### Tech Stack

* <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@8.1.x](https://laravel.com/docs/8.1.x) - back-end framework
* <img src="readme/assets/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
* <img src="readme/assets/screenshot_361.png" height="19" style="position: relative; top: 4px" /> [Tailwindcss](github.com/tailwindlabs/tailwindcss) - css framework for styling


#
### Getting Started
1\. First of all you need to clone 'nugzar-skhiereli-coronatime' repository from github:
```sh
git clone https://github.com/RedberryInternship/nugzar-skhiereli-coronatime.git
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

and also:
```sh
npm run dev
```
in order to build your Tailwindcss resources.

4\. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:


5\. Now execute in the root of you project following:
```sh
  php artisan key:generate
```
Which generates auth key.

##### Now, you should be good to go!



#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

when working on Tailwindcss you may run:

```sh
  npm run dev
```
it builds your Tailwindcss styling into executable CSS.


#
### Deployment
<br/>

!["nginx / php fpm"](./readme/assets/php-fpm-nginx.png)

<br />

- Projects first step is of course is development.
 After some time of development when you are ready to integrate and deploy your feature/fix/work you start doing these actions:
* Installing tools and programs on the server.
* Downloading the Laravel project to the server.
* PHP FPM configuration.
* NGINX configuration.
* Setting up SSL with LetsEncrypt.

After these steps everything should be OK :pray:


#
### Resources
!["nginx / php fpm"](./public/images/coronatimeDrawsql.png)