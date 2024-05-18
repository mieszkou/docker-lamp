@echo off
setlocal
FOR /F "tokens=*" %%i in ('type .env') do SET read_%%i
docker compose build
docker compose watch
start http://127.0.0.1:%read_APP_PORT%