

<?php
//#############################
//LINK: hopper.wlu.ca/~nich4770/browse-paintings.php
//#############################

//include 'include/config.php';
include 'functions.php';

$artistQuery = "SELECT LastName FROM Artists";
$museumQuery = "SELECT GalleryName FROM Galleries ORDER BY GalleryName ASC";
$shapeQuery = "SELECT ShapeName FROM Shapes";
$db = getDB();
// $res = runQuery($db, $query);
// foreach ($res->fetch_all() as $value){
//     print_r($value[0]);
// }

//your code for connecting to database, etc. goese here
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">



    </head>
    <body>

        <main style="overflow:auto;">

            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php  
                            // retrieve the names of the artist from database and use
                            // them as the values for <option> elements
                            $count = 1;
                            // // echo "here";
                            $results = runQuery($db, $artistQuery);
                            foreach ($results->fetch_all() as $value){
                                echo "<option value='".$count."'>".$value[0]."</option>";
                                // printOptions($value[0], $count);
                                $count = $count +1;
                            }
                            // echo "finished";



                            ?>
                        </select>
                    </div>  
                    <div >
                        <label>Museum</label>
                        <select  name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                            // retrieve the list of galleries name  from database and use
                            // them as the values for <option> elements
                            $count = 1;
                            // // echo "here";
                            $results = runQuery($db, $museumQuery);
                            foreach ($results->fetch_all() as $value){
                                echo "<option value='".$count."'>".$value[0]."</option>";
                                // printOptions($value[0], $count);
                                $count = $count +1;
                            }
                
                            ?>
                        </select>
                    </div>   
                    <div >
                        <label style="padding-right:14px;">Shape</label>
                        <select  name="shape">
                            <option value='0'>Select Shape</option>  

                            <?php  

                            // retrieve the different shapes from database and use
                            // them as the values for <option> elements
                            $count = 1;
                            // // echo "here";
                            $results = runQuery($db, $shapeQuery);
                            foreach ($results->fetch_all() as $value){
                                echo "<option value='".$count."'>".$value[0]."</option>";
                                // printOptions($value[0], $count);
                                $count = $count +1;
                            }
                            ?>

                        </select>
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button type="submit" id="buttons"> Filter  </button>    

                </form>    </section>


            <section class="rightsection" >
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php  

		    	// you need to have a while loop here that goes over the result of a query
                //depending on the question you are working on
                        $index = 0;
                        
                        $paintingQuery = "SELECT P.PaintingId, P.Title, P.Excerpt, P.ImageFileName, A.FirstName, A.LastName, P.MSRP FROM Paintings P, Artists A WHERE "; 
                        // if(isset($_GET['artist'])){
                        //     $A = $_GET['artist'];
                        // }
                        // if(isset($_GET['museum'])){
                        //     $M = $_GET['museum'];
                        // }
                        // if(isset($_GET['shape'])){
                        //     $S = $_GET['shape'];
                        // }
                        // if(isset($A)){
                        //     $paintingQuery = $paintingQuery."A.ArtistID = ".$A." ";
                        // }
                        // if(isset($M)){
                        //     $paintingQuery = $paintingQuery."P.GalleryID = ".$M." ";
                        // }
                        // if(isset($S)){
                        //     $paintingQuery = $paintingQuery."P.ShapeID = ".$S." ";
                        // }
                        
                        $paintingQuery = $paintingQuery."A.ArtistID = P.ArtistID LIMIT 20";
                        // echo $paintingQuery;
                        $results = runQuery($db, $paintingQuery);
                        
                        // foreach ($results->fetch_all() as $value){
                        //     echo $value[0];
                        // }
                        $indexMax = 20;
                        while($index < $indexMax){
                            $row = mysqli_fetch_assoc($results);

			
		    ?>

                    <li class="item">

                        <div class="figure">

                            <a href="single-painting.php?id=<?php echo $row['PaintingId'] ?>">
                                <img src="images/square-medium/<?php echo "".$row['ImageFileName']; /* you need the 'ImageFileName' here */ ?>.jpg">
                            </a>
                        </div>
                        <div class="itemright">
                            <a href="single-painting.php?id=<?php echo "".$row['PaintingID']; /* you need the 'PaintingID' here */ ?>">
                                <?php /* Title  */ ?></a>

                            <div><span><?php echo "".$row['FirstName']." ".$row['LastName']; /* FirstName and LastName */ ?></span></div>        


                            <div class="description">
                                <p><?php echo "".$row['Excerpt']; /* Excerpt */ ?></p>
                            </div>

                            <div class="meta">     
                                <strong><?php echo "".$row['MSRP']; /*  MSRP */ ?></strong>        
                            </div>        

                            <div class="extra" >
                                <a class="favorites" href="cart.php?id=<?php echo "".$row['PaintingID']; /* PaintingID */ ?>">Add to Shopping Cart</a>
                                <span> &nbsp; &nbsp; &nbsp;    </span>
                                <a  class="favorites"   href="favorites.php?id=<?php echo "".$row['PaintingID']; /* PaintingID  */ ?>">	Add to Wish List</i>
                                </a>         
                                <p>&nbsp;</p>
                            </div>       

                        </div>      
                    </li>

                    <?php
                    $index = $index +1;
		                } 
		    ?>

                </ul>
            </section>

        </main>
    </body>
</html>
