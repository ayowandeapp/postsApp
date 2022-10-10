Posts APP
-----

## Introduction

Posts APP is a simple CRUD application that facilitates the storing, reading, updating and deleting of posts in the database. This simple web app demostrate responsiveness using VueJS, vue-routing, Laravel.

## Tech Stack (Dependencies)

Our tech stack will include the following:
 * **PHP** and **Laravel 5.8** as our server language and server framework
 * **NPM** as a tool to create isolated Python environments
 * **vue-router** as a tool to create isolated Python environments
 * **vue-axios** a tool to integrate axios to Vuejs
 * **MySQL** as our database of choice
You can download and install the dependencies mentioned above as:
```
composer create-project laravel/laravel="5.8.*" Project_name
npm install //install NPM
npm install vue-router //install vue-router
npm install vue-axios //install vue-axios
```

## Development Setup
1. **Download the project starter code locally**
```
https://github.com/ayowandeapp/postsApp.git
```
2. craete a new database
3. setup the database connection in the .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crudvue
DB_USERNAME=root
DB_PASSWORD=
```
4. create new model and migration and add columns to the migration file to store the post data
```
php artisan make:model Post -m 
```
5. Run migration
```
php artisan migrate
```
6. Create controller
```
php artisan make:controller PostController --resource
```
7. Run NPM
```
npm run dev
npm run watch
```
8. **Run the development server:**
```
php artisan serve
```
9. **Verify on the Browser**<br>
Navigate to project homepage [http://127.0.0.1:8000/](http://127.0.0.1:8000/) or [http://localhost:8000](http://localhost:8000) 

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.



## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
