<?php namespace Codesleeve\AssetPipeline\Composers;

class StylesheetComposer extends BaseComposer implements ComposerInterface
{
    /**
     * Process the paths that come through the asset pipeline
     * 
     * @param  array $paths        
     * @param  array $absolutePaths
     * @param  array $attributes   
     * @return void
     */
    public function process($paths, $absolutePaths, $attributes)
    {
        $text = $this->attributesArrayToText($attributes);

        foreach ($paths as $path)
        {
            print "<link href=\"{$path}\" {$text} rel=\"stylesheet\" type=\"text/css\">" . PHP_EOL;
        }
    }
}