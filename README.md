# employee-app
Simple web for creating and filtering employee

## Stack used
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [jQuery](https://jquery.com/)
- [Datatables](https://datatables.net/)
- [Select2](https://select2.org/)
- [Date Range Picker](https://www.daterangepicker.com/)

## Screenshots 
![image](https://github.com/user-attachments/assets/356f3450-b52f-4bc6-a113-de6139339d87)
![image](https://github.com/user-attachments/assets/f64a16ba-d445-4e11-bff3-3a3342fcef2a)

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
