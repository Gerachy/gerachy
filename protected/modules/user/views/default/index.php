<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<a href="<?php echo $this->createUrl('/user/default/edit'); ?>">Edit My Info</a>
<br />
<a href="<?php echo $this->createUrl('/user/default/forgetpassword'); ?>">Forget Password</a>

<?php
echo '<br />id : ' .(Yii::app()->user->id);
echo '<br />name : '. (Yii::app()->user->name);
echo '<br />email : ' .(Yii::app()->user->email);
var_dump($user->attributes);
?>
