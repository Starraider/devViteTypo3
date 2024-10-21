# TYPO3 CMS with Vite

Get going quickly with TYPO3 CMS and Vite.

## Prerequisites

* PHP 8.1
* [Composer](https://getcomposer.org/download/)

## Vite

```bash
nvm use system
npm run build
```

## Deployment

ACHTUNG: Vorher ein Build durchführen und new Release erstellen!

```bash
vendor/bin/dep deploy beta -vvv
```

## Releases

### 1. Create pull request from develop branch

Above the list of files, in the yellow banner, click "Compare & pull request" or go to "Pull requests" in the main menu and click on "New pull request", to create a pull request.

### 2. Merge pull request into main branch

### 3. New release will be created automatically by the "Release Please" GitHub Action

The "Release Please" GitHub Action will create a new release with the next version number and update the CHANGELOG.md.

## Rector/Fractor

### Vorschau anzeigen

```bash
vendor/bin/rector process --dry-run
vendor/bin/fractor process --dry-run

vendor/bin/rector process packages/holidayreminder --dry-run
```

### Änderungen durchführen lassen

```bash
vendor/bin/rector process
vendor/bin/fractor process
```

## CLI

### Cache leeren

```bash
ddev typo3 cache:flush
```

### reference-index aktualisieren

```bash
ddev typo3 referenceindex:update
```

### language files aktualisieren

```bash
ddev typo3 language:update
```

### DB-Updates

```bash
ddev typo3 database:updateschema
```

### DB-Health

```bash
ddev typo3 dbdoctor:health
```

Wenn ein Fehler gefunden wird, gibt es folgende Optionen:

e - EXECUTE suggested changes!

s - SIMULATE suggested changes, no execution

a - ABORT now

r - RELOAD this check

p - SHOW records by page

d - SHOW record details

? - HELP

## Migration

```bash
ddev typo3 migration:migrate --configuration EXT:migration_extend/Configuration/Migration.php --dryrun 1

php vendor/bin/typo3 migration:migrate --configuration EXT:migration_extend/Configuration/Migration.php --dryrun 1
```

## License

GPL-2.0 or later
