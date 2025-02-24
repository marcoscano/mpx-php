<?php

namespace Lullabot\Mpx\Tests\Unit\DataService\Media;

use GuzzleHttp\Psr7\Uri;
use Lullabot\Mpx\DataService\DataServiceExtractor;
use Lullabot\Mpx\DataService\DateTime\ConcreteDateTime;
use Lullabot\Mpx\DataService\Media\AvailabilityWindow;
use Lullabot\Mpx\DataService\Media\CategoryInfo;
use Lullabot\Mpx\DataService\Media\Chapter;
use Lullabot\Mpx\DataService\Media\Credit;
use Lullabot\Mpx\DataService\Media\Media;
use Lullabot\Mpx\DataService\Media\MediaFile;
use Lullabot\Mpx\DataService\Media\Rating;
use Lullabot\Mpx\Tests\Unit\DataService\ObjectTestBase;

/**
 * Test the Media data object.
 *
 * @covers \Lullabot\Mpx\DataService\Media\Media
 */
class MediaTest extends ObjectTestBase
{
    protected $class = Media::class;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();
        $dataServiceExtractor = new DataServiceExtractor();
        $dataServiceExtractor->setClass($this->class);
        $this->loadFixture('media-object.json', $dataServiceExtractor);
    }

    /**
     * Test get / set methods.
     *
     * @param string $field    The field on Player to test.
     * @param mixed  $expected (optional) Override the assertion if data is converted, such as with timestamps.
     *
     * @dataProvider getSetMethods
     */
    public function testGetSet(string $field, mixed $expected = null)
    {
        $this->assertObjectClass($this->class, $field, $expected);
    }

    /**
     * Test methods with subobjects, where we leave testing of those objects to their own tests.
     *
     * @param string $field
     * @param string $class
     *
     * @dataProvider instanceOfDataProvider
     */
    public function testInstanceOf($field, $class)
    {
        $object = $this->deserialize($this->class, $field);
        $method = 'get'.ucfirst($field);
        foreach ($object->$method() as $value) {
            $this->assertInstanceOf($class, $value);
        }
    }

    /**
     * Test the getNormalizedDefaultThumbnailUrl method.
     *
     * The getNormalizedDefaultThumbnailUrl method is unlike the others in that
     * it does not have a direct property mapping in the MPX data.
     */
    public function testGetNormalizedDefaultThumbnailUrl()
    {
        // Test against the default media fixture loaded in the setup method.
        $object = $this->deserialize($this->class, 'defaultThumbnailUrl');
        $this->assertEquals(new Uri('ftp://winnas01.theplatform.com/Content/Video/thePlatform_Documentation_-_SA/3/494/ian_1_flexible_320x240.jpg'), $object->getNormalizedDefaultThumbnailUrl());
        $this->assertEquals(new Uri('ftp://winnas01.theplatform.com/Content/Video/thePlatform_Documentation_-_SA/3/494/ian_1_flexible_320x240.jpg'), $object->getNormalizedDefaultThumbnailUrl(false));
        // Load a different media fixture to test the ssl substitution.
        $dataServiceExtractor = new DataServiceExtractor();
        $dataServiceExtractor->setClass($this->class);
        $this->loadFixture('media-object-substitutions.json', $dataServiceExtractor);
        $object = $this->deserialize($this->class, 'defaultThumbnailUrl');
        $this->assertEquals(new Uri('https://winnas01.theplatform.com/Content/Video/thePlatform_Documentation_-_SA/3/494/ian_1_flexible_320x240.jpg'), $object->getNormalizedDefaultThumbnailUrl());
        $this->assertEquals(new Uri('http://winnas01.theplatform.com/Content/Video/thePlatform_Documentation_-_SA/3/494/ian_1_flexible_320x240.jpg'), $object->getNormalizedDefaultThumbnailUrl(false));
    }

    /**
     * Return methods that we only test the instance of each subobject.
     */
    public function instanceOfDataProvider()
    {
        return [
            ['availabilityWindows', AvailabilityWindow::class],
            ['chapters', Chapter::class],
            ['categories', CategoryInfo::class],
            ['content', MediaFile::class],
            ['thumbnails', MediaFile::class],
            ['credits', Credit::class],
            ['ratings', Rating::class],
        ];
    }

    /**
     * @param string $class
     *
     * @return array
     */
    public function getSetMethods()
    {
        $tests = parent::getSetMethods();
        $tests['added'] = ['added', new ConcreteDateTime(\DateTime::createFromFormat('U.u', '1299622592.000'))];
        $tests['updated'] = ['updated', new ConcreteDateTime(\DateTime::createFromFormat('U.u', '1299624648.000'))];
        $tests['availableDate'] = ['availableDate', new ConcreteDateTime(\DateTime::createFromFormat('U.u', '1230796800.000'))];
        $tests['expirationDate'] = ['expirationDate', new ConcreteDateTime(\DateTime::createFromFormat('U.u', '1609401600.000'))];
        $tests['pubDate'] = ['pubDate', new ConcreteDateTime(\DateTime::createFromFormat('U.u', '1256661120.000'))];

        unset($tests['availabilityWindows']);
        unset($tests['categories']);
        unset($tests['chapters']);
        unset($tests['content']);
        unset($tests['credits']);
        unset($tests['thumbnails']);
        unset($tests['ratings']);

        return $tests;
    }
}
