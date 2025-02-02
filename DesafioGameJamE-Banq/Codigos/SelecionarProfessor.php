<ul class="lista-botoes">
	<?php
		require('Functions.php');
		$professores = selectProfessores();
		for ($indice = 0; $indice <= max(array_keys($professores)); $indice++){?>
			
			<li>
				<button class='listaBotoes' name='professor' value='<?=$professores[$indice][0]?>'>
					<h2>
						<?=$professores[$indice][2]?>
					</h2>
					<h3>
						<?=$professores[$indice][4]?>
					</h3>
				</button>
			</li>
		
		<?php
			}
		?>
	
</ul>

