<ul class="lista-botoes">
	<?php
		require('Functions.php');
		$id_disciplina = $_POST['disciplina'];
		$enunciados = selectEnunciadosDisciplina($id_disciplina);
		
		for ($indice = 0; $indice <= max(array_keys($enunciados)); $indice++){?>
			
			<li>
				<button class='listaBotoes' name='enunciado' value='<?=$enunciados[$indice][0]?>'>
					<h2>
						<?=$enunciados[$indice][1]?>
					</h2>
					<h3>
						<?=$enunciados[$indice][2]?>
					</h3>
				</button>
			</li>
		
		<?php
			}
		?>
	
</ul>

