<?php
session_start();

/*
 * Zac Almas
 * CST-236
 * 2/7/21
 * This is all my own code for milestone 3
 */

require_once 'Database.php';

$name = $_GET['searchName'];

//Connects us to the database
$db = new Database();
$conn = $db->dbConnect();

$sql = "SELECT * FROM `products` WHERE `ProductName` LIKE '%$name%'";


$result = mysqli_query($conn, $sql);
//Error checking
if (!$result)
{
    echo "SQL statement may have an error.";
    return null;
    exit;
}

if ($result->num_rows == 0)
{
    echo "An error occured";
}
//If results are found it will display to the user with a button to learn more
else
{    
    //While loop to process results into the array
    while ($product = mysqli_fetch_assoc($result))
    {
        //array_push($product_array, $product);
        ?>
                <!DOCTYPE HTML>
                <html>
                 <head>
                   <meta charset="UTF-8">  
                 </head>
                 <body>
                   <form action="displayProduct.php">
                     <h2><?php echo $product['ProductName'];?></h2>
                     <h3>$<?php echo $product['Price'];?></h3>
                     <input type="hidden" name="id" value="<?php echo $product['ID'];?>"></input>
                     <button type="submit">See Product</button>
                   </form>
                 </body>
                 
                </html>
                
                
                <?php
            }
        }



