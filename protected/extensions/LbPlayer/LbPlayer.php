<?php
class LbPlayer extends CWidget
{
	public $playList;
	
	const PACKAGE_ID = 'lb-player';
	
	public function run(){		
		$this->registerScripts();
		echo '<script type="text/javascript"> var myPlaylist = '.json_encode($this->playList).' </script>'; 
		echo '<div id="lbPlayer"></div>';
	}
	
	protected function registerScripts(){
		
		// @var $cs \CClientScript
        $cs = Yii::app()->clientScript;

        if (!isset($cs->packages[self::PACKAGE_ID])) {
            // @var $am \CAssetManager
            $am = Yii::app()->assetManager;

            $cs->packages[self::PACKAGE_ID] = array(
                'basePath' => dirname(__FILE__) . '/assets',
                'baseUrl'  => $am->publish(dirname(__FILE__) . '/assets'),
                'js' => array(
                    'ttw-music-player.js',
                    'jquery-jplayer/jquery.jplayer.js',
					'lb-script.js'
                ),
                'css' => array(
                    'css/style.css',
                ),
                'depends' => array(
                    'jquery',
                ),
            );
        }
        $cs->registerPackage(self::PACKAGE_ID);
				
	}
}