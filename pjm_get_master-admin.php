<style>

.optionsDiv{
	padding:10px; 
	margin:10px;
	float:left;
	
}

.optionDivMain{
	clear:left;
	
}


</style>

<div class="wrap">
<h2>Get Master</h2>
<div class="widgets-holder-wrap optionsDiv" style="width:320px;">
<form method='post' action='?page=<?php echo $_GET['page']; ?>'>
<?php

for($i = 0; $i < 3; $i++){
	
    $option = "pjm_get_master_find_" . $i;
    
    if(isset($_POST[$option])){
        update_option($option, $_POST[$option]);
    }

    $optionValue = get_option($option);

    echo '<div ><h3>Tracking ' . $i . ':</h3><div style="float:left;"><label style="display: block; width:100px;float:left;" >FIND: </label><br/><input style="float:left;width:100px;" type="text" name="' . $option . '" value="' . $optionValue . '"/></div>';
    
    $option = "pjm_get_master_replace_" . $i;
    
    if(isset($_POST[$option])){
        update_option($option, $_POST[$option]);
    }

    $optionValue = get_option($option);

    echo '<div style="float:left;"><label style="display: block; width:100px;float:left;" >REPLACE: </label><br/><input style="float:left;width:100px;" type="text" name="' . $option . '" value="' . $optionValue . '"/></div>';

    $option = "pjm_get_master_fallback_" . $i;
    
    if(isset($_POST[$option])){
        update_option($option, $_POST[$option]);
    }
    
    $optionValue = get_option($option);

    echo '<div style="float:left;"><label style="display: block; width:100px;float:left;" >FALLBACK: </label><br/><input style="float:left;width:100px;" type="text" name="' . $option . '" value="' . $optionValue . '"/></div></div>';

}

?>
<br/><div style="clear:both; margin-top:20px;">
<input  type="submit"/>
</div>
</form>
<br/>
</div>

    CURRENT GET INFORMATION:
    
    <?php
    print_r($_GET);
?>
    
</div>
