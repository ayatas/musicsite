<?php
/* @var $this ArtistController */

$this->breadcrumbs = array('Artist', );
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php

echo CHtml::link('Artist Signup', array('artist/signup'));
