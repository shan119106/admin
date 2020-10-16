<?php if(count($error)>0): ?>
  <div class="errors">
    <?php  foreach($error as $errors): ?>
    <p class="error"><?php echo $errors ?></p>

    <?php endforeach; ?>
  </div>
<?php endif ; ?>
<style type="text/css">
	.errors{
		width:300px;
		background-color: white;
		position: absolute;
		border:1px solid #ff8080;
		border-radius: 4px;
		left: 41%;
		margin-top: 5px;
		margin-left: -10px;
		top:59%;
	}
	.error{
		color:#ff8080;
	}
</style>