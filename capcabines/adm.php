<?php  
	session_start();

	if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
		header('Location: index.php');
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Trocar imagens</title>
</head>
<body>
	<div class="alterar-foto">
		
		<p>Escolha as fotos da Estrutura:</p>

		<div class="quadrado">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="file">Escolha suas fotos:</label><br>
				<input type="file" name="file" style="margin-left: 35px" />
				<input type="submit" name="acao1" value="Enviar" />
				<hr style="border-color: #DA70D6">
			</form>

			<div class="galeria">
			    <?php // Listagem de imagens do diretório

				    $diretorio = '../capcabines/estruturas/';
				    $arquivos = scandir($diretorio);

					foreach ($arquivos as $arquivo) {
					    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
					    // Verifica se a extensão é válida e se o nome do arquivo não contém "perfil"
					    if (in_array(strtolower($extensao), ['jpg', 'jpeg', 'png', 'gif'])){
					        echo '<div class="photo-container" data-pasta="estruturas/">';
					        echo '<img src="' . $diretorio . '/' . $arquivo . '" alt="Imagem">';
					        echo '<button class="delete-button">Excluir</button>';
					        echo '</div>';
					    }
					}
			    ?>
	        </div>
			
		</div>
	</div>

	<div class="alterar-foto">
		
		<p>Escolha as fotos do Tripé:</p>

		<div class="quadrado">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="file">Escolha suas fotos:</label><br>
				<input type="file" name="file" style="margin-left: 35px" />
				<input type="submit" name="acao2" value="Enviar" />
				<hr style="border-color: #DA70D6">
			</form>

			<div class="galeria">
			    <?php // Listagem de imagens do diretório

				    $diretorio = '../capcabines/tripes/';
				    $arquivos = scandir($diretorio);

					foreach ($arquivos as $arquivo) {
					    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
					    // Verifica se a extensão é válida e se o nome do arquivo não contém "perfil"
					    if (in_array(strtolower($extensao), ['jpg', 'jpeg', 'png', 'gif'])){
					        echo '<div class="photo-container" data-pasta="tripes/">';
					        echo '<img src="' . $diretorio . '/' . $arquivo . '" alt="Imagem">';
					        echo '<button class="delete-button">Excluir</button>';
					        echo '</div>';
					    }
					}
			    ?>
	        </div>
			
		</div>
	</div>


	<div class="alterar-foto">
		
		<p>Escolha as fotos do Case:</p>

		<div class="quadrado">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="file">Escolha suas fotos:</label><br>
				<input type="file" name="file" style="margin-left: 35px" />
				<input type="submit" name="acao3" value="Enviar" />
				<hr style="border-color: #DA70D6">
			</form>

			<div class="galeria">
			    <?php // Listagem de imagens do diretório

				    $diretorio = '../capcabines/cases/';
				    $arquivos = scandir($diretorio);

					foreach ($arquivos as $arquivo) {
					    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
					    // Verifica se a extensão é válida e se o nome do arquivo não contém "perfil"
					    if (in_array(strtolower($extensao), ['jpg', 'jpeg', 'png', 'gif'])){
					        echo '<div class="photo-container" data-pasta="cases/">';
					        echo '<img src="' . $diretorio . '/' . $arquivo . '" alt="Imagem">';
					        echo '<button class="delete-button">Excluir</button>';
					        echo '</div>';
					    }
					}
			    ?>
	        </div>
			
		</div>
	</div>

    <a href="logout.php" style="
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #d9534f;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        font-family: Arial, sans-serif;
    ">Finalizar Sessão</a>



	<script type="text/javascript" src="JS/javascript.js"></script>
</body>
</html>








<?php 


	
if (isset($_POST['acao1'])) {
    // Arquivo enviado
    $arquivo = $_FILES['file'];

    // Pega o nome original do arquivo (exemplo: foto.jpg)
    $nomeArquivo = $arquivo['name'];

    // Extrai a extensão em minúsculo
    $arquivoNovo = explode('.', $nomeArquivo);
    $extensao = strtolower(end($arquivoNovo));

    // Diretório de destino
    $diretorioDestino = '../capcabines/estruturas/';

    // Lista de extensões e tipos MIME permitidos
    $formatos_permitidos = ['jpg', 'jpeg', 'png', 'webp', 'heic', 'heif', 'dng', 'cr2', 'nef'];
    $tipos_mime_permitidos = [
        'image/jpeg', 'image/jpg', 'image/png', 'image/webp',
        'image/heic', 'image/heif', 'image/x-adobe-dng',
        'image/x-canon-cr2', 'image/x-nikon-nef'
    ];

    // Verifica se a extensão do arquivo é válida
    if (!in_array($extensao, $formatos_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('Você não pode fazer upload deste tipo de arquivo.');
    }

    // Verifica se o arquivo foi realmente enviado
    if (!isset($arquivo['tmp_name']) || !file_exists($arquivo['tmp_name'])) {
        die('Erro: Nenhum arquivo foi enviado.');
    }

    // Obtém o tipo MIME do arquivo
    $tipo_mime = mime_content_type($arquivo['tmp_name']);

    // Verifica se o tipo MIME está na lista de permitidos
    if (!in_array($tipo_mime, $tipos_mime_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('O arquivo enviado não é de um formato de imagem válido.');
    }

    // Remove arquivos "perfil.*" com extensões permitidas (opcional)
    foreach ($formatos_permitidos as $ext) {
        $arquivoExistente = $diretorioDestino . 'perfil.' . $ext;
        if (file_exists($arquivoExistente)) {
            unlink($arquivoExistente);
        }
    }

    // Move o arquivo para o diretório de destino, mantendo o nome original
    if (move_uploaded_file($arquivo['tmp_name'], $diretorioDestino . $nomeArquivo)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        header("Location: " . $_SERVER['REQUEST_URI']);
        die('<p style="color:white; margin-top:0;">Upload feito com sucesso!</p>');
    } else {
        die('Erro ao mover o arquivo para o destino. Verifique as permissões.');
    }
}

if (isset($_POST['acao2'])) {
    // Arquivo enviado
    $arquivo = $_FILES['file'];

    // Pega o nome original do arquivo (exemplo: foto.jpg)
    $nomeArquivo = $arquivo['name'];

    // Extrai a extensão em minúsculo
    $arquivoNovo = explode('.', $nomeArquivo);
    $extensao = strtolower(end($arquivoNovo));

    // Diretório de destino
    $diretorioDestino = '../capcabines/tripes/';

    // Lista de extensões e tipos MIME permitidos
    $formatos_permitidos = ['jpg', 'jpeg', 'png', 'webp', 'heic', 'heif', 'dng', 'cr2', 'nef'];
    $tipos_mime_permitidos = [
        'image/jpeg', 'image/jpg', 'image/png', 'image/webp',
        'image/heic', 'image/heif', 'image/x-adobe-dng',
        'image/x-canon-cr2', 'image/x-nikon-nef'
    ];

    // Verifica se a extensão do arquivo é válida
    if (!in_array($extensao, $formatos_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('Você não pode fazer upload deste tipo de arquivo.');
    }

    // Verifica se o arquivo foi realmente enviado
    if (!isset($arquivo['tmp_name']) || !file_exists($arquivo['tmp_name'])) {
        die('Erro: Nenhum arquivo foi enviado.');
    }

    // Obtém o tipo MIME do arquivo
    $tipo_mime = mime_content_type($arquivo['tmp_name']);

    // Verifica se o tipo MIME está na lista de permitidos
    if (!in_array($tipo_mime, $tipos_mime_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('O arquivo enviado não é de um formato de imagem válido.');
    }

    // Remove arquivos "perfil.*" com extensões permitidas (opcional)
    foreach ($formatos_permitidos as $ext) {
        $arquivoExistente = $diretorioDestino . 'perfil.' . $ext;
        if (file_exists($arquivoExistente)) {
            unlink($arquivoExistente);
        }
    }

    // Move o arquivo para o diretório de destino, mantendo o nome original
    if (move_uploaded_file($arquivo['tmp_name'], $diretorioDestino . $nomeArquivo)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        header("Location: " . $_SERVER['REQUEST_URI']);
        die('<p style="color:white; margin-top:0;">Upload feito com sucesso!</p>');
    } else {
        die('Erro ao mover o arquivo para o destino. Verifique as permissões.');
    }
}

if (isset($_POST['acao3'])) {
    // Arquivo enviado
    $arquivo = $_FILES['file'];

    // Pega o nome original do arquivo (exemplo: foto.jpg)
    $nomeArquivo = $arquivo['name'];

    // Extrai a extensão em minúsculo
    $arquivoNovo = explode('.', $nomeArquivo);
    $extensao = strtolower(end($arquivoNovo));

    // Diretório de destino
    $diretorioDestino = '../capcabines/cases/';

    // Lista de extensões e tipos MIME permitidos
    $formatos_permitidos = ['jpg', 'jpeg', 'png', 'webp', 'heic', 'heif', 'dng', 'cr2', 'nef'];
    $tipos_mime_permitidos = [
        'image/jpeg', 'image/jpg', 'image/png', 'image/webp',
        'image/heic', 'image/heif', 'image/x-adobe-dng',
        'image/x-canon-cr2', 'image/x-nikon-nef'
    ];

    // Verifica se a extensão do arquivo é válida
    if (!in_array($extensao, $formatos_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('Você não pode fazer upload deste tipo de arquivo.');
    }

    // Verifica se o arquivo foi realmente enviado
    if (!isset($arquivo['tmp_name']) || !file_exists($arquivo['tmp_name'])) {
        die('Erro: Nenhum arquivo foi enviado.');
    }

    // Obtém o tipo MIME do arquivo
    $tipo_mime = mime_content_type($arquivo['tmp_name']);

    // Verifica se o tipo MIME está na lista de permitidos
    if (!in_array($tipo_mime, $tipos_mime_permitidos)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        die('O arquivo enviado não é de um formato de imagem válido.');
    }

    // Remove arquivos "perfil.*" com extensões permitidas (opcional)
    foreach ($formatos_permitidos as $ext) {
        $arquivoExistente = $diretorioDestino . 'perfil.' . $ext;
        if (file_exists($arquivoExistente)) {
            unlink($arquivoExistente);
        }
    }

    // Move o arquivo para o diretório de destino, mantendo o nome original
    if (move_uploaded_file($arquivo['tmp_name'], $diretorioDestino . $nomeArquivo)) {
        echo '<button onclick="voltar();" style="position: fixed; left: 60px; top: 22px; height: 35px; width: 62px;">Voltar</button>';
        header("Location: " . $_SERVER['REQUEST_URI']);
        die('<p style="color:white; margin-top:0;">Upload feito com sucesso!</p>');
    } else {
        die('Erro ao mover o arquivo para o destino. Verifique as permissões.');
    }
}

?>