<?php include("topbit.php");

$name_dev = $_POST['dev_name'];

    $find_sql = "SELECT * FROM `l2_prac_game_details` 
    JOIN `l2_prac_genre` ON (`l2_prac_game_details`.`GenreID` = `l2_prac_genre`.`GenreID`)
    JOIN `l2_prac_developer` ON (`l2_prac_game_details`.`DeveloperID` = `l2_prac_developer`.`DeveloperID`)
    WHERE `Name` LIKE '%$name_dev%'
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
        <div class="box main">
            <h2>Name / Developer Results</h2>
            
         <?php 
            include ("results.php");
            ?> 
            
        </div> <!-- / main -->
        
 <?php include("bottombit.php") ?>