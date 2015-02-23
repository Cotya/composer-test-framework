<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\ComposerTestFramework\Helper;


class FileObject
{
    
    /**
     *
     * because \SplFileObject::fread() is not available before 5.5.11 anyway
     * 
     * returns the full content of a file, rewinds pointer in the beginning and leaves it at the end
     * but dont rely on this pointer behaviour
     * 
     * @param \SplFileObject $fileObject
     *
     * @return \SplString|string
     */
    public static function getContent(\SplFileObject $fileObject)
    {
        if (class_exists('SplString')) {
            $result = new \SplString;
        } else {
            $result = '';
        }

        $fileObject->rewind();
        while (!$fileObject->eof()) {
            $result .= $fileObject->fgets();
        }
        return $result;
    }
}
