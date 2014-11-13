<?php
$list = array();
$i = 0;
foreach($model->tracks as $tlist){
	$list[$i]['mp3'] = Yii::app()->request->baseUrl.'/audio/'.$tlist->fileName;
	$list[$i]['title'] = $tlist->name;
	$list[$i]['artist'] = User::model()->findByPk($model->artistId)->name;
	$list[$i]['buy'] = '#';
	$list[$i]['price'] = $tlist->price;
	$list[$i]['cover'] = Yii::app()->request->baseUrl.'/images/tracks/'.$tlist->image;
	$i++;
	
}
$this->widget('ext.LbPlayer.LbPlayer', array(
	'playList'=>$list
));	
?>