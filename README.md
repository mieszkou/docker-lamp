# docker-lamp

- Apache
- PHP + XDebug
- MariaDB
- MSSQL

## Założenia

- Konfiguracja w pliki `.env`
- Kod w folderze `www`
- W oparciu o numer portu applikacji `APP_PORT=5000` są generowane porty (przekierowania) dla phpMyAdmin (`APP_DB_ADMIN_PORT=15000`) i MariaDB (`DB_PORT=35000`). Dlatego port aplikacji nie może przekraczać 9999.

## Uruchamianie

```bash
docker compose build
docker compose watch
```

lub

```bash
docker compose build & docker compose watch
```

## XDebug

W pliku launch.json trzeba dodać mapowanie ścieżek między serwerem a edytorem np:

```json
"configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}/www",
                "/app": "${workspaceFolder}/app"
              },
        
        },
        (...)
]
```



## Dostęp do danych:

Katalog z `volumes` Docker-a (to można wgrać plik bac/bak)
```
\\wsl.localhost\docker-desktop-data\data\docker\volumes\
```

Odtworzenie backupu MSSQL (po wgraniu wcześniej do folderu backup z volumenie mssql)

```sql
USE [master]
RESTORE DATABASE [pcmarket] FROM  DISK = N'/var/opt/mssql/backup/pcmarket.bak' WITH REPLACE, FILE = 1,  MOVE N'pcmarket' TO N'/var/opt/mssql/data/pcmarket.mdf', MOVE N'pcmarket_log' TO N'/var/opt/mssql/data/pcmarket_log.ldf',  NOUNLOAD,  STATS = 5
```

Dla baz PC-Market Insoftu należy, po odtworzeniu backupu, przeprowadzić serializację.