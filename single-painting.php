<?php
//include 'include/config.php';
include 'functions.php';

$paintingID = $_GET['id'];
// echo $paintingID;
$db = getDB();
$query = "SELECT P.Title, P.Excerpt, P.ImageFileName, P.YearOfWork, P.Medium, P.Width, P.Height, A.FirstName, A.LastName, P.MSRP, G.GalleryName, G.GalleryCity, G.GalleryCountry FROM Paintings P, Artists A, Galleries G WHERE P.PaintingID=".$paintingID." AND P.ArtistID = A.ArtistID AND P.GalleryID = G.GalleryID LIMIT 1";
$query2 = "SELECT G.GenreName FROM Genres G, PaintingGenres PG, Paintings P WHERE PG.PaintingID = P.PaintingID AND PG.GenreID = G.GenreID AND P.PaintingID = ".$paintingID;
$query3 = "SELECT S.SubjectName FROM Subjects S, PaintingSubjects PS, Paintings P WHERE PS.PaintingID = P.PaintingID AND PS.SubjectID = S.SubjectID AND P.PaintingID=".$paintingID;


$results = runQuery($db, $query);
$results2 = runQuery($db, $query2);
$results3 = runQuery($db, $query3);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$genreRow = mysqli_fetch_assoc($results2);

// echo "".$row['ImageFileName'].".jpg"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/reset.css" rel="stylesheet">
   <link href="css/assign1.css" rel="stylesheet">
</head>
<body>
<header>
    <?php include 'art-header.php';?>
    <div class = "page">
        <div class ="mainEntry">
            <h2><?php echo $row['Title'];?></h2>

            <p class="artistName">By <a href="#"><?php echo "".$row['FirstName']." ".$row['LastName']; ?></a></p>
            <img id = "artistImage" class="bigImage" src =<?php echo "images/medium/".$row['ImageFileName'].".jpg"?>>
            <div class = "mainBody">

                
                <div class = "bodyDesc">
                    <p class ="bigDesc"> <?php echo $row['Excerpt']; ?>
                    </p>
                    <p class="price"><b><span class = "priceTag"><?php echo $row['MSRP'] ?></span></b></p>
                    <div class="buyButtons">

                        <button class = "cartButtons">Add to Wish List</button>
                        <button class = "cartButtons">Add to Shopping Cart</button>
                    </div>
                    <h3>Product details</h3>
                    <hr>
                    <table class = "details">
                        <tr>
                            <td class = "bold">Date:</td>
                            <td><?php echo $row['YearOfWork'];?></td>
                        </tr>
                        <tr>

                            <td class = "bold">Medium:</td>
                            <td><?php echo $row['Medium'];?></td>
                        </tr>
                        <tr>

                            <td class="bold">Dimension:</td>
                            <td><?php echo "".$row['Height']."cm x".$row['Width']."cm"?></td>
                        </tr>
                        <tr>
                            <td class="bold">Home:</td>
                            <td><a href="#"><?php echo "".$row['GalleryName'].", ".$row['GalleryCity'];?></a></td>
                        </tr>
                        <tr>

                            <td class="bold">Genres:</td>
                            <td><a href="#"><?php echo "".$row2['GenreName'];?></a></td>
                        </tr>
                        <tr>
                            <td class="bold">Subjects:</td>
                            <td><a href="#"><?php echo $row3['SubjectName']; ?></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="similar">
            <h3>Similar Products</h3>
            <hr>
            <div class = "allBlocks">
                <div class ="recommendedBlocks">
                    <img id="img" src="images/square-medium/116010.jpg">
                    <a href="#">Artist Holding a Thistle</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>


                <div class ="recommendedBlocks">
                    <img id="img" src="images/square-medium/120010.jpg">
                    <a href="#">Portrait of Eleanor of Toledo</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>


                <div class ="recommendedBlocks">
                    <img id="img"  src="images/square-medium/107010.jpg">
                    <a href="#">Madame de Pompadour</a>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>




                <div class ="recommendedBlocks">
                    <img id="img" src="images/square-medium/106020.jpg">
                    <a href="#">Girl with a Pearl Earring</a>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>
            </div>
        </div>
            
    </div>
    
    <footer>

        <p>All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
    </footer>
    </body>

</html>
