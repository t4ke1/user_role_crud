# User_role_CRUD
## Описание
___
    Простое приложения для упревления пользователями и их ролями
    Пользователь не может быть без роли
    Пользователю нельзя присвоить 1 роль несколько раз
___
## Устанвока
___
### Docker
    Перед тем как начать, убедитесь, что у вас установлен Docker. Вы можете скачать 
    Docker с официального сайта 
[Docker](https://www.docker.com/get-started).

### Проверка установки Docker
___
    Для проверки, установлен ли Docker, выполните следующую команду в терминале:
```bash
    docker --version
```
    Если Docker установлен правильно, вы увидите сообщение с версией Docker, например:
    Docker version 20.10.7, build f0df350
___
### Запуск
___
1. Клонируйте репозиторий 
2. Соберите контейнеры Docker
```bash
    make build
```
3. Проверьте статус контейнеров

```bash
    make status
``` 
Eсли контейнеры запущены правильно, вы увидите сообщение с информацией о контейнерах, например:

    mfo-php-1           mfo-php       "docker-php-entrypoi…"   php           13 hours ago   Up 13 hours   0.0.0.0:8000->8000/tcp, 9000/tcp
    mfo-postgres_db-1   postgres:16   "docker-entrypoint.s…"   postgres_db   13 hours ago   Up 13 hours   0.0.0.0:5432->5432/tcp
    
4. Обновите autolaod.php
```bash
    make autoload
``` 
    
5. Выполните миграцию
```bash
    make migrate
```
Готово

http://localhost/
