<?php
  session_start(); 
  if ( !isset( $_SESSION['addItemToList'] ) )
  { // If it DOESN'T exist, let's make a default value (this way we can array_push to it later!)
    $_SESSION['addItemToList'] = array();
  }

  $_SESSION['addItemToList']= array_values($_SESSION['addItemToList']);

//Coolecting the submission information using POST Methord 
  if( isset($_POST) && !empty($_POST))
  {
    //adding new element to the array using array_push function 
      array_push ($_SESSION['addItemToList'],$_POST['addItem']);
    }
    ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
<h1>  Basic todo List by Using PHP  <h1>
<form action="./index.php" method="POST"><?php // Forms can use GET or POST method. ?>
  <ul>
    <label for="addItem">
      Add an Item in the list :
      <input type="text" name="addItem" id="addItem">
    </label>
    </label>
    <input type="submit" value="Add">
    
    <input type="reset" nam="reset" id="reset"> 
  </form>
  </ul>
  <?php if ( !empty( $_SESSION['addItemToList'] ) ) : // Check if there is any item. ?>
    <h2>My todo list :</h2>
    <ul>
      <?php foreach ( $_SESSION['addItemToList'] as $addItem ) : // Output EACH AddedItem  in the array. ?>
        <li>
          <?php echo $addItem; ?> 
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <h2> Debugging
  <pre>
    <strong>$_POST contents:</strong>
    <?php var_dump( $_POST ); ?>
  </pre>
  <pre>
    <strong>$_SESSION contents:</strong>
    <?php var_dump( $_SESSION ); ?>
  </pre>
 
</body>
</html>