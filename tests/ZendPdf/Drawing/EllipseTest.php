<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   ZendPdfTest
 */

namespace ZendPdfTest\Drawing;

/**
 * PHPUnit Test Case
 */
use ZendPdf\Drawings\Ellipse;
use ZendPdf\Page;
use ZendPdf\PdfDocument;

/**
 * @category   Zend
 * @package    Zend_PDF
 * @subpackage UnitTests
 * @group      Zend_PDF
 */
class EllipseTest extends \PHPUnit_Framework_TestCase
{
    public function testDrawAnEllipse()
    {
        $pdf = new PdfDocument();
        $page = $pdf->newPage(Page::SIZE_A4);

        $ellipse1 = new Ellipse(400, 350);
        $ellipse1->setPosition(250, 400);
        $actualContent = $ellipse1->draw($page);

        $ellipse2 = new Ellipse(400, 350, M_PI / 6, 2 * M_PI / 3);
        $ellipse2->setPosition(250, 400);
        $actualContent .= $ellipse2->draw($page);

        $ellipse3 = new Ellipse(400, 350, -M_PI / 6, M_PI / 6);
        $ellipse3->setPosition(250, 400);
        $actualContent .= $ellipse3->draw($page);

        $this->assertStringEqualsFile(__DIR__ .'/EllipseTestContent.txt', $actualContent);
    }
}
