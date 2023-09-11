<?php

if(isset($_POST['length'])) {
  $length = intval($_POST['length']);
  $lowercase = isset($_POST['lowercase']); 
  $uppercase = isset($_POST['uppercase']);
  $symbols = isset($_POST['symbols']);
  $numbers = isset($_POST['numbers']);
  
  if(!$lowercase && !$uppercase && !$symbols && !$numbers) {
    echo "Falha ao gerar senha. Escolha, pelo menos, um tipo";
  }

  $lowercase_chars = "abcdefghijklmnopqrstuvwxyz";
  $uppercase_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $symbols_chars = "!@#$%&*()-_+=";
  $numbers_chars = "0123456789";
  
  $password = "";
  $valid_options = "";
  
  if($lowercase) {
      $valid_options .= $lowercase_chars;
  }

  if($uppercase) {
      $valid_options .= $uppercase_chars;
  }

  if ($symbols) {
       $valid_options .= $symbols_chars;
  }

  if ($numbers) {
      $valid_options .= $numbers_chars;
  }

  for($k = 0; $k < $length; $k++) {
    $random_number = rand(0, strlen($valid_options)-1);
    $password .= $valid_options[$random_number];
  }

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha</title>
</head>
<body>
    <?php if (isset($password)) { ?>
   <h4>Gerador de Senha</h4>
   <input type="text" readonly value="<?php echo $password; ?>">
<?php } ?>
   <h4>Gerar uma Senha</h4>
   <form method="POST" action="">
        <label for=""> Comprimento da Senha</label>
        <input type="number" min="8" required value="12" name= "length">
    <br>

        <label for=""> Incluir Letra minúscula </label>
        <input type="checkbox" value="1" checked name= "lowercase">
    <br>

        <label for=""> Incluir Letras maiúsculas</label>
        <input type="checkbox" value="1" checked name="uppercase">
    <br>

       <label for=""> Incluir Símbolos</label> 
       <input type="checkbox" value="1" checked name="symbols">
    <br>

       <label for="">Números</label>
       <input type="checkbox" value="1" checked name="numbers" >
    <br>

    <button> Gerador </button>
    
   </form>
   
</body>
</html>