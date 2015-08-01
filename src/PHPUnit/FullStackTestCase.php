<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\ComposerTestFramework\PHPUnit;

use Symfony\Component\Filesystem\Filesystem;

abstract class FullStackTestCase extends \PHPUnit_Framework_TestCase
{
    
    public static $tempComposerProjectPaths = array();
    
    public static function setUpBeforeClass()
    {
        $tempPath = self::getTempComposerProjectPath();
        if (file_exists($tempPath->getPathname())) {
            $fs = new Filesystem();
            $fs->remove($tempPath->getPathname());
        }
        mkdir($tempPath->getPathname(), 0777, true);
    }
    
    protected static function getTempComposerProjectPath()
    {
        $path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "ComposerTests" . DIRECTORY_SEPARATOR  . get_called_class();
        $path = str_replace('\\', '/', $path);
        return new \SplFileInfo($path);
    }
}
