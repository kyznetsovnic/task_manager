### Старт приложения

- cd docker/ && docker compose up -d
- docker compose exec -it app bash
- composer install
- php artisan migrate
- php artisan db:seed

### Api 
http://localhost:8072

1 /api/tasks GET (получение списка задач)

```
Есть возможность указать дополнительные парамтры поиска
по статусу и крайнему сроку
/api/tasks?status=1
/api/tasks?status=1&expiration=2024-11-09
/api/tasks?expiration=2024-11-09
   ```

2 /api/tasks/1 GET (получение задачи с id = 1)

3 /api/tasks POST (создание новой задачи)

```
   "title": "Task new",
   "description": "Make something here",
   "expiration": "2024-09-10"
   ```
3 /api/tasks/1 PUT (изменение задачи с id 1)

```
   "title": "Task title changed",
   "description": "Make something here new",
   "expiration": "2024-09-14",
   "status": 2,
   ```

3 /api/tasks/1 DELETE (удаление задачи с id 1)

