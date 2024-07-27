<?php

/**
 * FileReference Domain Model
 *
 * @package EXT:leseohren
 * @author Sven Kalbhenn <sven@skom.de>
 * @link https://www.skom.de
 */

namespace ExtbaseBook\Simpleblog\Domain\Model;

use TYPO3\CMS\Core\Resource\ResourceInterface;

/**
 * Domain Model: FileReference
 */
class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    /**
     * UID of a sys_file
     *
     * @var int
     */
    protected $originalFileIdentifier;

    /**
     * Set original resource
     *
     * @param ResourceInterface $originalResource
     */
    public function setOriginalResource(ResourceInterface $originalResource): void
    {
        $this->originalResource = $originalResource;
        $this->originalFileIdentifier = (int)$originalResource->getOriginalFile()->getUid();
    }
}
