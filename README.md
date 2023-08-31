# API

## Сохраненные температуры в городе Москва

### Список

`GET /api/thermal-history.json`

#### Вернет массив с записями `temperature`

### Сохранить

`POST /api/thermal-history/create`

#### Вернет добавленную запись `temperature`

## Типы данных

### temperature

| Параметр      | Тип        | Описание                |
|---------------|------------|-------------------------|
| `id`          | `int`      | id записи               |
| `createdAt`   | `datetime` | Дата и время сохранения |
| `temperature` | `float`    | Температура             |
