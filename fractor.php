<?php

use a9f\Fractor\Configuration\FractorConfiguration;
use a9f\FractorComposerJson\ValueObject\PackageAndVersion;
use a9f\FractorComposerJson\AddPackageToRequireComposerJsonFractor;
use a9f\Typo3Fractor\Set\Typo3LevelSetList;

return FractorConfiguration::configure()
    ->withPaths([
        __DIR__ . '/config',
        __DIR__ . '/packages/'
    ])
    ->withSkip([
        __DIR__ . '/**/Configuration/ExtensionBuilder/*'
    ])
    ->withConfiguredRule(
        AddPackageToRequireComposerJsonFractor::class,
        [new PackageAndVersion('typo3/cms-core', '^12.4')]
    )
    ->withSets([
        Typo3LevelSetList::UP_TO_TYPO3_12
    ]);
