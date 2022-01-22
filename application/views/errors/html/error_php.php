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
<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>
<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
	<?php foreach (debug_backtrace() as $error): ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
			<p>
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>
		<?php endif ?>
	<?php endforeach ?>
<?php endif;
die;
?>
