<ul class="lista-botoes">
	<?php
		require('Functions.php');
		$id_curso = $_POST['curso'];
		$disciplinas = selectDisciplinasCurso($id_curso);
		
		for ($indice = 0; $indice <= max(array_keys($disciplinas)); $indice++){?>
			
			<li>
				<button class='listaBotoes' name='disciplina' value='<?=$disciplinas[$indice][0]?>'>
					<h2>
						<?=$disciplinas[$indice][1]?>
					</h2>
				</button>
			</li>
		
		<?php
			}
		?>
	
</ul>

