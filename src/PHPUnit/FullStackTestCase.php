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
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $path = sprintf("C:/ComposerTests/%s", str_replace('\\', '_', get_called_class()));
            return new \SplFileInfo($path);
        }

        $path = sprintf(
            "%s/ComposerTests/%s",
            str_replace('\\', '/', sys_get_temp_dir()),
            str_replace('\\', '_', get_called_class())
        );
        return new \SplFileInfo($path);
    }
}
