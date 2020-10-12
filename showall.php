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
                
                <!-- Heading and subtitle -->
                
                <div class="flex-container">
                    <div>
                        <span class="sub_heading">
                            <a href="<?php echo $find_rs['URL']; ?>">
                                <?php echo $find_rs['Name']; ?>
                            </a>
                        </span>
                    </div>  <!-- / Title -->
                    
                    <?php
                        if($find_rs['Subtitle'] != "") 
                        
                        {
                            
                         ?>   
                    <div>
                    
                       &nbsp; &nbsp; | &nbsp; &nbsp;
                        
                        <?php echo $find_rs['Subtitle'] ?>
                    
                    </div> <!-- / Subtitle -->
                    
                    <?php
                        
                        }
                    ?>
                
                
                </div>   
                <!-- / Heading and subtitle -->
                
                <!-- Rating Area -->
                
                <div class="flex-container">
                
                    <!-- Partial stars Original Source:https://codepe.io/Bluetidepro/pen/GkpEa -->
                    <div class="star-ratings-sprite">
                        <span style="width:<?php echo $find_rs['User Rating'] / 5 * 100; ?>%" class="star-ratings-sprite-rating"></span>
                    
                    </div> <!-- / star rating div -->
                    
                    <div class="actual-rating">
                        (<?php echo $find_rs['User Rating']?> based on <?php echo number_format($find_rs['Rating Count']) ?> ratings)
                        
                    </div> <!-- / text rating div -->
                    
                </div> <!-- / ratings felxbox -->
                
                <!--- / Rating Area -->
                
                <!-- price -->
                
                <?php 
                
                    if($find_rs['Price'] == 0) {
                        ?>
                    <p>
                        Free 
                        <?php
                            if($find_rs['In App'] == 1) 
                            {
                                ?>
                                    (In App Purchase)
                                <?php 
                                    
                            }   //end In App if
                        <br/>
                        ?>
                   
                </p>
                
                <?php
                            
                } // end price if 
                <br/>
                else {
                    
                    ?>
                <b>Price:</b> $<?php echo $find_rs['Price'] ?>
                
                <?php
                
                }   // end price else (diplay coast)
                
            ?>
                
            
                <!--- / price -->
            
            <p>
                <!-- Developer, Genre and Age... -->
                <b>Developer:</b>  <?php echo $find_rs['DeveloperID'] ?><br />
                <b>Genre:</b>  <?php echo $find_rs['GenreID'] ?><br />
                suitable for ages <b> <?php echo $find_rs['Age'] ?></b> and up 
                
            </p>
                
            <p>
                <i><?php echo $find_rs['Description'] ?></i>
                
            </p>
           
            </div>  <!-- / results -->
             
            <br />   
            
            <?php   
                
                    } // end results 'do'
                
                while
                    ($find_rs=mysqli_fetch_assoc($find_query));
            
            } // end else 
            
            ?>



            </div> <!-- / main -->
        
 <?php include("bottombit.php") ?>