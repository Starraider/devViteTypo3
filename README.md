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

ACHTUNG: Vorher ein Build durchführen!

```bash
vendor/bin/dep deploy beta -vvv
```

## Releases

### 1. Create pull request from develop branch

Above the list of files, in the yellow banner, click "Compare & pull request" or go to "Pull requests" in the main menu and click on "New pull request", to create a pull request.

### 2. Merge pull request into main branch

### 3. New release will be created automatically by the "Release Please" GitHub Action

The "Release Please" GitHub Action will create a new release with the next version number and update the CHANGELOG.md.

## Rector

### Vorschau anzeigen

```bash
vendor/bin/rector process --dry-run
```

### Änderungen durchführen lassen

```bash
vendor/bin/rector process
```

## License

GPL-2.0 or later
