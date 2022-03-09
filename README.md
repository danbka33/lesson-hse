# Требования:

1. \>= PHP 7.3
2. Любой веб сервер: nginx/caddy/~~apache2~~
3. MySQL или другая реляционная БД
4. Composer
5. IDE
6. git

Для PHP необходимо включить следующие модули:
* BCMath
* Ctype
* Fileinfo
* JSON
* Mbstring
* OpenSSL
* PDO
* Tokenizer
* XML
* MySQL/... (зависит от выбранной БД)

В качестве IDE в целом, подойдет любая, способная понимать синтаксис PHP.
```Так как вы находитесь в статусе студентов, вам бесплатно доступен целый пак инструментов от компании JetBrains, а именно PHPStorm.```

# Развертывание среды разработки

## Old-School путь

1. Устанавливаем XAMPP
2. Убеждаемся, что все необходимые модули включены
3. Устанавливаем Composer
4. Переходим в папку .../xampp/htdocs
5. Исполняем команду ```composer create-project laravel/laravel:^8.0 .```. Создаст проект Laravel в текущей директории.
6. Переходим в папку .../xampp/htdocs/your-app
7. В файле .env производим настройку подключения базы данных
8. Исполняем команду ```php artisan serve```
9. Проверяем доступность по адресу http://localhost:8000 или же http://localhost/your-app/public

## Современный путь

### Контейнеризация

1. Скачиваем и устанавливаем [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Создаем папку в любом месте и переходим в нее.
3. Выполняем клонирование репозитория ```git clone https://github.com/laradock/laradock```
4. Переходим в папку склонированного репозитория ```laradock```
5. Копируем .env.example в .env
6. Выполняем команду ```docker-compose up -d php-fpm nginx mysql workspace``` и дожидаемся сборки контейнеров
7. Исполняем команду ```docker-compose exec --user=laradock workspace bash```.
Это переход к рабочей среде, где мы будем выполнять все наши команды.
8. Исполняем команду ```composer create-project laravel/laravel:^8.0 .```
9. В файле .env производим настройку подключения базы данных. В качестве хост адреса для подключения к базе данных указываем ```mysql```, пользователь и база данных ```default```, пароль ```secret```
10. Проверяем доступность по адресу http://localhost

Для пользователей Windows рекомендовано [включить WSL](https://docs.docker.com/desktop/windows/wsl/), но не обязательно.

### Виртуализация

1. Устанавливаем VirtualBox
2. Устанавливаем Vagrant
3. Переходим на [официальную документацию](https://laravel.com/docs/8.x/homestead) и следуем инструкции


# Ссылки

* (!) - Обязательно к ознакомлению
* (*) - Рекомендую держать открытым во время лекции


* [Структура Laravel](https://laravel.com/docs/8.x/structure) (!)
* [Документация Laravel](https://laravel.com/docs/8.x). Используем 8 версию Laravel. (*)
* [Laravel Homestead](https://laravel.com/docs/8.x/homestead)
* [Laradock quick-start](https://sam-ngu.medium.com/laradock-quick-start-laravel-docker-tutorial-d1bbb7796a7)
* [Документация Laradock](https://laradock.io/getting-started/)
