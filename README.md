# Описание
Тестовое задание по выгрузке данных по описанным эндпоинтам и загрузке в БД.

## Основное
Выполните следующие команды:
1. Склонируйте репозиторий из git: git clone https://github.com/Yushi23/php-laravel-import-data.git
2. Перейдите в директорию: "cd php-laravel-import-data/";
3. Установите зависимости: "composer install";
4. Создайте файл env: "cp .env.example .env";
5. Отредактируйте файл для подключения к вашей БД .env file
6. Накатите миграции: "php artisan migrate";
7. Загрузите в БД данные: "php artisan import:data --key={ключ доступа к API} --dateFrom={тут дата выгрузки ОТ в формате Y-m-d, дата по умолчанию - 2024-05-01}", например: "php artisan import:data --key=AxS31cF --dateFrom=2024-05-01 ".
