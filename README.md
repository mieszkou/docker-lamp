# docker-lamp

Środowisko LAMP

Przygotowane w oparciu o:

- https://www.bornfight.com/blog/blog-lamp-docker-setup-with-php-8-and-mariadb-for-symfony-projects/
- https://mariadb.com/kb/en/setting-up-a-lamp-stack-with-docker-compose/
- https://www.section.io/engineering-education/dockerized-php-apache-and-mysql-container-development-environment/
- moje poprawki

## Założenia

- Konfiguracja w pliki `.env`
- Kod w folderze `www`
- W oparciu o numer portu applikacji `APP_PORT=5000` są generowane porty (przekierowania) dla phpMyAdmin (`APP_DB_ADMIN_PORT=15000`) i MariaDB (`DB_PORT=35000`). Dlatego port aplikacji nie może przekraczać 9999.

## Uruchamianie

```
docker compose build
docker compose up
```
