<div class="welcome">
  <h2>Thanks for joining My MusicHutt <?php echo $model->name; ?>!</h2>
  <p> This is your music's home page. A tabula rasa! Completely<br>
    unspoiled! Deeply inhale the crisp, clean air, hold it, and then... </p>
  <div class="buttons"> <?php echo CHtml::link('Add an Album',array('artist/addalbum'),array('class'=>'album')); ?> <span class="or">or</span> <?php echo CHtml::link('Add Track',array('artist/addtrack'),array('class'=>'track')); ?> </div>
</div>
