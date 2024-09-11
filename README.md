# employee-app
Simple web for creating and filtering employee

## Stack used
- Laravel

## How to run
1. Clone the app  
```
git clone https://github.com/n9mi/employee-app.git
```

2. Set the .env by change .env.example to .env and set required configurations.

3. Generate the key
```
php artisan key:generate
```

4. Install php dependencies with composer
```
composer install
```

5. Install javascript dependencies
```
npm install
npm run build
```

6. Run the migration and seed the database (please ensure your .env configurations already been set)
```
php artisan migrate
php artisan db:seed
```

7. Serve the app
```
php artisan serve
```
