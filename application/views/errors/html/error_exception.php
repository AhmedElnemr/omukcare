<style>
    body {
        display: inline-block;
        background: #00AFF9 url(https://cbwconline.com/IMG/Codepen/Unplugged.png) center/cover no-repeat;
        height: 100vh;
        margin: 0;
        color: white;
    }

    h1 {
        margin: .8em 3rem;
        font: 4em Roboto;
    }
    p {
        display: inline-block;
        margin: .2em 3rem;
        font: 2em Roboto;
    }
</style>
<p>Type: <?php echo get_class($exception); ?></p>
<p>Message: <?php echo $message; ?></p>
<p>Filename: <?php echo $exception->getFile(); ?></p>
<p>Line Number: <?php echo $exception->getLine(); ?></p>
<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
	<p>Backtrace:</p>
	<?php foreach ($exception->getTrace() as $error): ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
			<p style="margin-left:10px">
			File: <?php echo $error['file']; ?><br />
			Line: <?php echo $error['line']; ?><br />
			Function: <?php echo $error['function']; ?>
			</p>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>


<?php die;?>
