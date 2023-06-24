## Описание
Тестовое задание для Фэтфокс

### Запуск
1. Скопировать конфиг Nginx в `/etc/nginx/sites-enabled/*` или в другой каталог, в зависимости от настроек на локальной машине и поправить пути к проекту
```bash
cp conf/default.nginx.conf /etc/nginx/sites-enabled/
```

2. Переопределить конфиг (В противном случае, будет использован дефолтный) и прописать свои настройки для работы с БД
```bash
cp conf/default.config.php config.php
```

3. Установить зависимости через композер
```bash
composer install
```

4. Накатить структуру таблиц:
```bash
php bin/console.php setup:start
```

5. Заполнить таблицы тестовыми данными
```bash
php bin/console.php loader:start
```

Для очистки таблиц, можно воспользоваться командой:
```bash
php bin/console.php cleaner:start
```