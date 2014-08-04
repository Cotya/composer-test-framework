<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\ComposerTestFramework\Tests\Experiment\Oro;

use Cotya\ComposerTestFramework;

class InstallTest extends ComposerTestFramework\PHPUnit\FullStackTestCase
{


    /**
     * @group experiment
     */
    public function testInstall()
    {
        $composer = new ComposerTestFramework\Composer\Wrapper();
        $projectDirectory = new \SplFileInfo(self::getTempComposerProjectPath());

        //@todo create project can not work on git repositories, it needs to be listed in a composer repository
        $this->markTestIncomplete(
            'create project can not work on git repositories, it needs to be listed in a composer repository'
        );
        $composer->createProject(
            $projectDirectory,
            'oro/crm-application',
            '1.3.0',
            'https://github.com/orocrm/crm-application.git'
        );
        echo $projectDirectory;
    }
}
