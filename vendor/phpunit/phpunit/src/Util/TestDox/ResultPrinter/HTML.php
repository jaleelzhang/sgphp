<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Prints TestDox documentation in HTML format.
 *
 * @since Class available since Release 2.1.0
 */
class PHPUnit_Util_TestDox_ResultPrinter_HTML extends PHPUnit_Util_TestDox_ResultPrinter
{
    /**
     * @var string
     */
    private $pageHeader = <<<EOT
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Test Documentation</title>
        <style>
            body {
                text-rendering: optimizeLegibility;
                fonts-variant-ligatures: common-ligatures;
                fonts-kerning: normal;
                margin-left: 2em;
            }

            body > ul > li {
                fonts-family: Source Serif Pro, PT Sans, Trebuchet MS, Helvetica, Arial;
                fonts-size: 2em;
            }

            h2 {
                fonts-family: Tahoma, Helvetica, Arial;
                fonts-size: 3em;
            }

            ul {
                list-style: none;
                margin-bottom: 1em;
            }
        </style>
    </head>
    <body>
EOT;

    /**
     * @var string
     */
    private $classHeader = <<<EOT

        <h2 id="%s">%s</h2>
        <ul>

EOT;

    /**
     * @var string
     */
    private $classFooter = <<<EOT
        </ul>
EOT;

    /**
     * @var string
     */
    private $pageFooter = <<<EOT

    </body>
</html>
EOT;

    /**
     * Handler for 'start run' event.
     */
    protected function startRun()
    {
        $this->write($this->pageHeader);
    }

    /**
     * Handler for 'start class' event.
     *
     * @param string $name
     */
    protected function startClass($name)
    {
        $this->write(
            sprintf(
                $this->classHeader,
                $name,
                $this->currentTestClassPrettified
            )
        );
    }

    /**
     * Handler for 'on test' event.
     *
     * @param string $name
     * @param bool   $success
     */
    protected function onTest($name, $success = true)
    {
        $this->write(
            sprintf(
                "            <li style=\"color: %s;\">%s %s</li>\n",
                $success ? '#555753' : '#ef2929',
                $success ? '✓' : '❌',
                $name
            )
        );
    }

    /**
     * Handler for 'end class' event.
     *
     * @param string $name
     */
    protected function endClass($name)
    {
        $this->write($this->classFooter);
    }

    /**
     * Handler for 'end run' event.
     */
    protected function endRun()
    {
        $this->write($this->pageFooter);
    }
}
