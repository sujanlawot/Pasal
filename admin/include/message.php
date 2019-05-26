<?php

if(isset($_SESSION['successmsg']))
{
	?>
	<div class="msg_container">
	<div class="sucmsg">

		<?=$_SESSION['successmsg']?>
	</div>
	</div>
	<?php
	unset($_SESSION['successmsg']);
}
if(isset($_SESSION['errmsg']))
{
	?>
	<div class="msg_container">
	<div class="errmsg">
		<?=$_SESSION['errmsg']?>
	</div>
	</div>
<?php 
unset($_SESSION['errmsg']);
}

?>