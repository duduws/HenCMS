<script>
var apagar = {
    sim:function(id){
        if(confirm('Tem certeza que deseja apagar ?')){
            $.ajax({
                type:'GET',
                url:'pagina/<?php echo $url; ?>/apagar/'+id,
                data:{'id':id},
                success:function(html){
                    alert('Apagado com sucesso!');
                    location.reload();
                }
            });
        }
    }
}
</script>
<?php
	if(isset($_GET['tipo']) && $_GET['tipo'] == 'editar'){
    $id = $_GET['id'];
    $ver = $pdo->query("SELECT * FROM noticias WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
    if($_POST){
        $titulo = $_POST['titulo'];
        $url_not = Site::Url($titulo);
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $foto = $_FILES['imagem'];
        $fixo = $_POST['fixo'];
        $status = $_POST['status'];
        $texto = $_POST['texto'];
        if(empty($titulo) || empty($descricao) || empty($categoria) || empty($texto)){
            echo Site::Alerta('Preencha todos campos!',false);
        }else if(!empty($foto["name"]) && @!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
            echo Site::Alerta('Isso não é uma imagem!',false);
        }else{
            if(empty($foto["name"])){
                $nome_imagem = $ver['imagem'];
            }else{
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "assets/uplouds/".$nome_imagem;
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }
                    $inserir = $pdo->prepare("UPDATE noticias SET titulo=:titulo, descricao=:descricao, categoria=:categoria, imagem=:imagem, revisado='true', revisador='".$aa_data['usuario']."', status=:status, fixo=:fixo, url=:url, texto=:texto WHERE id='$id'");
                    $inserir->bindParam(':titulo', $titulo);
                    $inserir->bindParam(':descricao', $descricao);
                    $inserir->bindParam(':categoria', $categoria);
                    $inserir->bindParam(':imagem', $nome_imagem);
                    $inserir->bindParam(':url', $url_not);
                    $inserir->bindParam(':status', $status);
                    $inserir->bindParam(':fixo', $fixo);
                    $inserir->bindParam(':texto', $texto);
                    $inserir->execute();
                    echo Site::Alerta('Editado com sucesso!','pagina/'.$url);
        }
    }
?>

<form method="POST" enctype="multipart/form-data" style="width: 100%" autocomplete="off">
    Revisado por:<br>
    <input type="text" class="text" readonly value="<?php echo $aa_data['usuario'] ?>"><br><br><br>
    Titulo:<br>
    <input type="text" class="text" name="titulo" value="<?php echo $ver['titulo'] ?>"><br><br><br>
    Descrição:<br>
    <input type="text" class="text" name="descricao" value="<?php echo $ver['descricao'] ?>"><br><br><br>
    Categoria:<br>
    <select class="select" name="categoria">
<?php
    $noticias_cat = $pdo->query("SELECT * FROM noticias_cat");
    while($ver_cat = $noticias_cat->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $ver_cat['id'] ?>" <?php if($ver_cat['id'] == $ver['categoria']){ echo 'selected'; } ?>><?php echo $ver_cat['categoria'] ?></option>
<?php
    }
?>
    </select><br><br><br>
    <img style="margin: 5px; max-height: 200px;" src="assets/uplouds/<?php echo $ver['imagem'] ?>"><br>
    Imagem:<br>
    <input type="file" class="text" name="imagem"><br><br><br>
    Fixo:<br>
    <select class="select" name="fixo">
        <option value="true" <?php if($ver['fixo'] == 'true'){ echo 'selected'; } ?>>Sim</option>
        <option value="false" <?php if($ver['fixo'] == 'false'){ echo 'selected'; } ?>>Não</option>
    </select><br><br><br>
    Status:<br>
    <select class="select" name="status">
        <option value="true" <?php if($ver['status'] == 'true'){ echo 'selected'; } ?>>Ativo</option>
        <option value="false" <?php if($ver['status'] == 'false'){ echo 'selected'; } ?>>Inativo</option>
    </select><br><br><br>
    Texto:<br>
    <textarea id="ckeditor" name="texto"><?php echo $ver['texto'] ?></textarea>
    <input type="submit" class="button" value="Editar">
</form>
<?php
	}else if(isset($_GET['tipo']) && $_GET['tipo'] == 'apagar'){
		$id = (int) $_GET['id'];
        $delete = $pdo->query("DELETE FROM noticias WHERE id='$id'");
        echo 1;
	}else{
	$quantidade = 20;
    $registros = $pdo->query("SELECT * FROM noticias WHERE evento='false'")->rowCount();
    $pagina     = (isset ($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $inicio     = ($quantidade * $pagina) - $quantidade;
    $totalPagina = ceil($registros/$quantidade);
?>

<table width="100%" style="margin: 10px 0 0 0; float:left">
	<tr style="height: 40px">
	    <th><img src="assets/img/x.png"></th>
	  	<th><img src="assets/img/editar.png"></th>
	    <th><b>Id</b></th>
		<th><b>Imagem</b></th>
	    <th><b>Titulo</b></th>
	    <th><b>Criador</b></th>
	    <th><b>Data</b></th>
	    <th><b>Status</b></th>
	    <th><b>Fixo</b></th>
	</tr>
	<?php
    $i = 1;
    $sql = $pdo->query("SELECT * FROM noticias WHERE evento='false' ORDER BY id DESC LIMIT $inicio, $quantidade");
    while($ver = $sql->fetch(PDO::FETCH_ASSOC)){
        $css = $i%2==0 ? '' : 'background: #EEE;';
    ?>
    <tr style="height: 40px; <?php echo $css; ?>">
        <th><a onclick="apagar.sim('<?php echo $ver['id']; ?>')" style="cursor:pointer;"><img src="assets/img/x.png"></a></th>
        <th><a href="pagina/<?php echo $url; ?>/editar/<?php echo $ver['id'] ?>"><img src="assets/img/editar.png"></a></th>
        <th><?php echo $ver['id']; ?></th>
        <th><img style="margin: 5px; max-width: 100px" src="assets/uplouds/<?php echo $ver['imagem']; ?>"/></th>
        <th><?php echo $ver['titulo']; ?></th>
        <th><?php echo $ver['autor']; ?></th>
        <th><?php echo date('d/m/Y - H:i', $ver['time']); ?></th>
        <th><?php if($ver['status'] == 'true'){ echo 'Ativo'; }else{ echo 'Inativo'; } ?></th>
        <th><?php if($ver['fixo'] == 'true'){ echo 'Sim'; }else{ echo 'Não'; } ?></th>
    </tr>
    <?php $i++;} ?>
</table>
<div id="paginacao">
<?php
    for($i = 1; $i <= $totalPagina; $i++){
        if($i == $pagina){
            echo '<div class="pag" style="background: #999">'.$i.'</div>';
        }else{
            echo '<a href="pagina/'.$url.'/lista/'.$i.'"><div class="pag">'.$i.'</div></a>';
        }
    }
?>
</div>
<?php } ?>