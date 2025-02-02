<ul class="lista-botoes">
	<?php
		require('Functions.php');
		$cursos = selectCursos();
		for ($indice = 0; $indice <= max(array_keys($cursos)); $indice++) {
			echo "<li><button class='listaBotoes' name='curso' value='{$cursos[$indice][0]}'><h2>{$cursos[$indice][1]}</h2></button></li>";
		}
	?>
</ul>
