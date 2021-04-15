<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>Um erro ocorreu e foi mapeado:</h4>

<p>Tipo: <?php echo get_class($exception); ?></p>
<p>Mensagem: <?php echo $message; ?></p>
<p>Nome do arquivo: <?php echo $exception->getFile(); ?></p>
<p>Número da linha: <?php echo $exception->getLine(); ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach ($exception->getTrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			Arquivo: <?php echo $error['file']; ?><br />
			Linha: <?php echo $error['line']; ?><br />
			Função: <?php echo $error['function']; ?>
			</p>
		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>
