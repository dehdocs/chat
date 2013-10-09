<div class="fila">
	<script>
    setInterval(function() {
	  verificaPontos();
	  gerenciaFila('<?php echo $_SESSION['ID']; ?>');
	  atualizaPosicao(<?php echo $_SESSION['senha']; ?>);
	}, 700);
    </script>
    <p style="position:fixed;">A sua senha é <?php echo $_SESSION['senha']; ?></p><br />	
	<p>você é o <span class="position"><?php $chat->getPosition($_SESSION['senha']); ?></span>° na fila fila Aguarde para ser atendido<span class="animationPoint">.</span></p>
</div>