# Befehle ausführen vor Import

```sql
DELETE FROM `09_Vorlesepaten_Einrichtungen` WHERE `Personen` IS NULL

DELETE FROM `09_Personen_Geschenke` WHERE `Personen` IS NULL
DELETE FROM `09_Personen_Geschenke` WHERE `Geschenke` IS NULL
DELETE FROM `09_Personen_Fortbildungen` WHERE `Personen` IS NULL
DELETE FROM `09_Personen_Fortbildungen` WHERE `Fortbildungen` IS NULL

DELETE FROM `09_Personen_Rollen` WHERE `Personen` IS NULL
DELETE FROM `09_Personen_Rollen` WHERE `Rollen` IS NULL

//SELECT * FROM `09_Personen_Rollen` WHERE `Personen` = 2405

DELETE FROM 09_Personen_Rollen
USING 09_Personen_Rollen,
      09_Personen_Rollen c1
WHERE 09_Personen_Rollen.ID > c1.ID
  AND 09_Personen_Rollen.Personen = c1.Personen
  AND 09_Personen_Rollen.Rollen = c1.Rollen
```


# Data Migration for Leseohren-DB

```bash
ddev typo3 migration:migrate --configuration EXT:migration_extend/Configuration/Migration.php --dryrun 0 --key person
```
