<?php 
	include "cn.php";
?>


<?php
if(isset($_GET['id'])){
    $query = mysqli_query($connect, "SELECT * FROM usuario WHERE id = '".$_GET['id']."'");
    while($row= mysqli_fetch_array($query)){
        ?>

<form id="form1" name="form1" method="post" action="">
    
 
    
    <img src="" height="200" width="300" />
    
    <input type="submit" class="btb btn-primary" />
    
</form>

<?php
    }
}

?>