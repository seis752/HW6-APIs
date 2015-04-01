rem Generate the "seis752justin_db" database from scripts
rem Update host/user/password as necessary for your environment

rem "schema.sql" is "structure.sql" + "twilio-datamodel.sql" + "data.sql"
mysql -h localhost -u root -vvv < schema.sql

rem mysql -h localhost -u root -vvv < schema-structure.sql
rem mysql -h localhost -u root -vvv < twilio-datamodel.sql
rem mysql -h localhost -u root -vvv < schema-data.sql

pause
