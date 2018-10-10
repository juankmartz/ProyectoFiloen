<?php 
	include "cn.php";
?>


<?php

    if(isset($_GET['id'])){
        $query = mysqli_query($connect, "SELECT *  FROM foto WHERE id = '".$_GET['id']."'");
        while ($row = mysqli_fetch_array($query)){
     ?>

<form id="form1" name="form1" method="post" action="">
    
    <p>
        <label for="textfield2"></label>
        <input type="text" name="nombre" id="textfield2" />
    </p>
    <p>
        <input type="text" name="textfield2" id="textfield" />
    </p>
    <p><img src="" height="100" width="100" /></p>
    
    <p>
        <label for="fileField"></label>
        <input type="file" name="avatar" id="fileField" />
    </p>
    <p>
        <input type="submit" name="editar" id="button" value="Ediar foto"
    </p>
</form>


<?php
        }
    }

        ?>



<?php
    
 

?>