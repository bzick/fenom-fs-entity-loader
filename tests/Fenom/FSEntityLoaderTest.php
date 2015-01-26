<?php
namespace Fenom;


class SimpleLoaderTest extends \PHPUnit_Framework_TestCase {

    public static function inlineFunction() {
        return 'inline function';
    }

    public function testModifierLoader() {
        $fenom = new TemplaterFSLoader(new Provider(__DIR__));
        $fenom->addPluginsDir(FENOM_PLUGIN_DIR);

        $this->assertSame('3', $fenom->compileCode('{$a|count_words}')->fetch(["a" => "modifier from fs"]));

    }

    public function testTagLoader() {
        $fenom = new TemplaterFSLoader(new Provider(__DIR__));
        $fenom->addPluginsDir(FENOM_PLUGIN_DIR);

        $this->assertSame('<ad>word</ad>', $fenom->compileCode('{ad name="word"}')->fetch([]));

    }

}

class TemplaterFSLoader extends \Fenom {
    use FSEntityLoaderTrait;
}