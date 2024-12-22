# Project KP

## How To Use

To use this App is very simple, you must run a simple syntax in terminal or command prompt.

### Clone The Project

```
git clone https://github.com/nabilroyyan/tebu_jadi.git
```

or

```
git clone git@github.com:nabilroyyan/tebu_jadi.git
```

### Install The Project With Composer

```
composer install
```

### Copy ".env.example" file to ".env"

```
cp .env.example .env
```

or you can copy the file in your File Manager.

### Generate App_Key

```
php artisan key:generate
```

### Symlink Storage For Store Public Files

```
php artisan storage:link
```

### Initiate The Database Migration

```
php artisan migrate
```

or You can make the seed with the following command <b>(RECOMMENDED IF YOU HAVE SEEDERS)</b> :

```
php artisan migrate --seed
```

> **NOTE : Make sure the web server and database are turned on before migration command**

### And Lastly, Run the server

```
php artisan serve
```

### Sponsorship

![Screenshot 2024-12-22 170325](https://github.com/user-attachments/assets/99c64407-7d4c-477c-b548-af6471ce43c2)
