<h1 align="center"> Trustartup Business Content </h1>

<h3 align="center">
  Микросервис для проекта Trustartup.
</h3>


## Содержание

- [Описание](#описание)
- [Технологии](#технологии)
- [Использование](#использование)
- [API](#api)

## Описание

Выполняет внутренние CRUD запросы связанные с:
* Модерацией
* Отзывами
* Заявками
* Наградами и пользоавателями

## Технологии

* Lumen (PHP framework)
* PostgreSQL (или любая база данных)
* Docker

## Использование
Микросервис может быть запущен локально или в докер контейнере.

### Локально
* [PHP 7.4+](https://www.php.net/downloads.php)
* [Composer](https://getcomposer.org/download/)
* [PostgreSQL](https://www.postgresql.org/download/)

Сначала установите зависимости:
```bash
composer install
```
Затем скопируйте `.env.example` в `.env` и измените переменные среды в зависимости от вашего окружения

Для инициализации базы данных:

```bash
php artisan migrate --seed
```

Запустите микросервис:
```bash
php -S localhost:8000 -t public
```

### Docker
* [Docker](https://www.docker.com/get-docker)

Сначала постройте образ:
```bash
docker-compose build
```

Запустите микросервис:
```bash
docker-compose up -d
```

По умолчанию сервис запустится на `8086` порте

## API
[Полная api-документация в формате OpenAPI3.0](storage/api-docs/api-docs.json)
