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

1. Устанавливаем [XAMPP](https://www.apachefriends.org/ru/index.html)
2. Убеждаемся, что все необходимые модули включены (На последней версии XAMPP ничего включать не нужно)
3. Устанавливаем [Composer](https://getcomposer.org/download/)
4. Исполняем команду ```composer global require laravel/installer```
5. Переходим в папку .../xampp/apache/conf/extra
6. Редактируем файл `httpd-vhosts.conf`
```apacheconf
<VirtualHost *:80>
    ServerAdmin help@laravelapp.local
    DocumentRoot "C:/xampp/htdocs/laravelapp/public"
    ServerName laraveapp.local
</VirtualHost>
```
7. Редактируем файл `C:\Windows\System32\drivers\etc\hosts`, не забываем про права администратора.
```
127.0.0.1 laravelapp.local
```
8. Заходим в управление MySQL, создаем базу данных `default` и пользователя для этой базы данных `default` с паролем `secret`
9. Переходим в папку .../xampp/htdocs
10. Исполняем команду ```laravel new laravelapp```
11. Переходим в папку .../xampp/htdocs/laravelapp
12. В файле .env производим настройку подключения базы данных
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
```
13. Перезапускаем apache сервис
14. Проверяем доступность по адресу http://laravelapp.local
15. Исполняем команду ```php artisan migrate``` (Создание базовой схемы базы данных, заодно проверяем правильность настройки конфига подключения к БД)

## Современный путь

### Контейнеризация

1. Скачиваем и устанавливаем [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Убеждаемся что XAMPP выключен (либо не заняты порты 80 и 3306)
3. Создаем папку в любом месте и переходим в нее.
5. Выполняем клонирование репозитория ```git clone https://github.com/danbka33/lesson-hse.git```
6. Переходим в папку склонированного репозитория ```lesson-hse```
7. Создаем папку ```laravelapp```
8. Переходим в папку ```docker```
7. Копируем .env.example в .env
8. В файле .env вносим необходимые изменения (если требуется)
9. Выполняем команду ```docker-compose up -d mysql workspace``` и дожидаемся сборки и запуска контейнеров
10. Исполняем команду для инициализации проекта Laravel ```docker-compose exec workspace composer create-project laravel/laravel:11.0 .```.
12. В файле ```laravelapp/.env``` производим настройку подключения базы данных.
```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password
```
13. Выполняем команду ```docker-compose up -d``` для запуска всех компонентов системы
13. Проверяем доступность по адресу http://localhost
14. Переходим к рабочему контейнеру ```docker-compose exec workspace bash```
14. Исполняем команду ```php artisan migrate``` (Создание базовой схемы базы данных, заодно проверяем правильность настройки конфига подключения к БД)

Для пользователей Windows рекомендовано [включить WSL](https://docs.docker.com/desktop/windows/wsl/), но не обязательно.

### Виртуализация

1. Устанавливаем VirtualBox
2. Устанавливаем Vagrant
3. Переходим на [официальную документацию](https://laravel.com/docs/9.x/homestead) и следуем инструкции


# Ссылки

* (!) - Обязательно к ознакомлению
* (*) - Рекомендую держать открытым во время лекции


* [Структура Laravel](https://laravel.com/docs/9.x/structure) (!)
* [Документация Laravel](https://laravel.com/docs/9.x). (*)
* [Laravel Homestead](https://laravel.com/docs/9.x/homestead)
* [Laradock quick-start](https://sam-ngu.medium.com/laradock-quick-start-laravel-docker-tutorial-d1bbb7796a7)
* [Документация Laradock](https://laradock.io/getting-started/)
* [Плагин Laravel для PHPStorm](https://plugins.jetbrains.com/plugin/7532-laravel)
* [Пакет IDE Helper для PHPStorm](https://github.com/barryvdh/laravel-ide-helper)
