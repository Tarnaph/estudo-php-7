<!-- Teoria da aula -->
<h4>Teoria da aula 07.2</h4>
<p>
	1) Primeiro construa o formulário em <b>html</b>. <br>
	2) Determine na tag form o <b>method [GET ou POST]</b> e o <b>destino da action</b>: <br>
	<code> < form method= GET ou POST action = endereço de destino> </code> <br>
	3) Defina a tag <b>input</b> com seu <b>type=</b>text,email,password... <br>
	<code> < input type="text" name=nome  ></code> <br>
	4) O nome da tag é definida pelo <b>name= esse nome vai ser chamado no php.</b> <br>
	5) A outros tipos de tag que podem aparecer, como <b>select</b>, defina também <b>name.</b>	<br>
	5 a) <b>select</b> define as opções com a tag <b>option</b>. <br>
	<code> < select name="estadoCivil"> < option>Solteiro < /option> < /select></code> <br>
	6) Crie o botão, com <b>type=submit</b>,<b>value="Enviar"</b> <br>
</p> <br>

<!-- Teoria da aula -->
<h4>Teoria da aula 07.2 - Supervariáveis do Php</h4>	
<p>
	a) Para acessar as variáveis geradas pelo <b>method POST</b> é pela
	supervariável <b>$_POST["o nome dado ao campo nome"].</b> <br>
	b) Para acessar as variáveis geradas pelo <b>method GET</b> é pela
	supervariável <b>$_REQUEST["o nome dado ao campo nome"].</b><br>
	c) O method <b>GET</b> ele concatena os resultados na <b>url da página</b> cuidado. <br>
</p> <br>