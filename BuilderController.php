<?php
namespace lucynvic\restdoc\controllers;

use Yii;
use yii\console\Controller;
use yii\base\InvalidParamException;
use yii\helpers\FileHelper;

use phpDocumentor\Reflection\FileReflector;

use Crada\Apidoc\Builder;
use Crada\Apidoc\Exception;

/**
* 
*/
class BuilderController extends Controller
{

	public $defaultAction = 'run';

	public $sourceDirs;

	public $outputDir;

	public $outputFile;

	public $templatePath;

	public function actionRun($title = null)
    {
    	$title = isset($title)?Yii::$app->name:$title;
    	
        $classes = $this->resolveClassDir($this->sourceDirs);
        
		try {
		    $builder = new Builder($classes, $this->outputDir, $title, $this->outputFile, $this->templatePath);
		    $builder->generate();
		} catch (Exception $e) {
		    echo 'There was an error generating the documentation: ', $e->getMessage();
		}
    }

    private function resolveClassDir($dirs)
    {
    	$result = [];
        $dirs = is_array($dirs) ? $dirs : [$dirs];
        foreach ($dirs as $dir) {
            $files = FileHelper::findFiles(Yii::getAlias($dir), [
                'only' => ['*Controller.php']
            ]);
            foreach ($files as $file) {
            	include($file);
            	$reflector = new FileReflector($file);
            	$reflector->process();
		        $classes = $reflector->getClasses();
		        foreach ($classes as $class) {
		        	$result[] = $class->getName();
		        }
            }
        }
        return $result;
    }
}
?>