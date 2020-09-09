<?php include("topbit.php");

    $find_sql = "SELECT * FROM `l2_prac_game_details` 
    JOIN `l2_prac_genre` ON (`l2_prac_game_details`.`GenreID` = `l2_prac_genre`.`GenreID`)
    JOIN `l2_prac_developer` ON (`l2_prac_game_details`.`DeveloperID` = `l2_prac_developer`.`DeveloperID`)
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
        <div class="box main">
            <h2>All Results</h2>
            
            
            <?php
            
            if($count < 1) {
                
                ?>
            
            <div class ="error">
            
            Sorry! There are no results that match your search.Please use the search box in the side bar to try again.
            
            </div>  <!-- end error -->
            <?php
            }
            
            else{
                do 
                {
                    
                
                     ?>
            
            <!-- Results go here -->
            <div class="results">
                <span class="sub_heading">
                    <a href="<?php echo $find_rs['URL']; ?>">
                        <?php echo $find_rs['Name']; ?>
                    </a>
                </span> - <?php echo $find_rs['Subtitle'] ?> 
                
            <p>
                <b>Genre</b>:
                <?php echo $find_rs['Genre'] ?>
                
                <br />
                
                <b>Developer</b>:
                <?php echo $find_rs['DevName'] ?>
                
                <br />
                <b>Rating</b>: <?php echo $find_rs['User Rating'] ?>(based on <?php echo $find_rs['Rating Count'] ?> votes)
                
            </p>
            <hr /> 
                <?php echo $find_rs['Description'] ?>
            
            
            </div>  <!-- / results -->
             
            <br />   
            
            <?php   
                
                    } // endresults 'do'
                
                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
            
            } // end else 
            
            ?>



            </div> <!-- / main -->
        
 <?php include("bottombit.php") ?>