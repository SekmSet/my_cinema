# My Cinema
 
## Exporter la base 

```bash
mysqldump --user=root --password=Obrigada --databases cinema > cinema.sql
```
 
## Importer la base

```bash
mysql --user=root --password=Obrigada cinema < cinema.sql
```