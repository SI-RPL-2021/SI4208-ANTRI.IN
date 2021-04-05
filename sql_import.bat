call "C:\xampp\mysql_start.bat"

cd "C:\xampp\mysql\bin"

mysql -u root -e "DROP DATABASE IF EXISTS antriin; CREATE DATABASE IF NOT EXISTS antriin;"

mysql -u root antriin < "../storages/database/antriin.sql"
