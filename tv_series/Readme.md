# TODO:
### **TV Series**

Populate a MySQL (InnoDB) database with data from at least 3 TV Series using the following structure:

- [x] Provide the SQL scripts that create and populate the DB;
  - [x] tv_series -> (id, title, channel, gender);
  - [x] tv_series_intervals -> (id_tv_series, week_day, show_time);
- [x] Using OOP
- [x] write a code that tells when the next TV Series will air based on the current time-date or an
  inputted time-date
- [x] that can be optionally filtered by TV Series title.
   
## ROUTING EXAMPLE
```
1.- create database and migrate to file src/db/migration.sql
2.- update configuration db in file src/config/database.php.php
3.- start server local or apache server
$ php -S localhost:8000

4.- example get next serie
http://localhost:8000/api/next?weekday=friday&time=8:01

4.- example get filter for name if you want all no use param name
http://localhost:8000/api/filter?name=as

5.- error 404 when uri not found 
http://localhost:8000/blabla

6.- if you stop database so show error
{
    "status": 500,
    "message": "Internal Server Error",
    "page": "SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it.\r\n"
}

```