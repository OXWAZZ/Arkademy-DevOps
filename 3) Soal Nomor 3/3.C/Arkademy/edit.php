<?php
include_once("CRUD/connection.php");

if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $name=$_POST['cashier'];
    $category=$_POST['category'];
    $product=$_POST['product'];
    $price=$_POST['price'];

    $result = mysqli_query($mysqli, "UPDATE product SET
	name='$name',
    price='$price',
    id_category='(select id from category where name = '$category')',
    id_cashier='(select id from cashier where name = '$name')'
	WHERE id='$id'");

    header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT product.id as id, cashier.name as cashier, product.name as product, category.name as category, product.price as price
FROM product
JOIN cashier ON product.id_cashier=cashier.id
JOIN category ON product.id_category=category.id
WHERE product.id='$id'");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['cashier'];
    $price = $user_data['price'];
    $category = $user_data['category'];
    $product = $user_data['product'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS App - Edit</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="flex bg-white shadow-md items-center">
            <div class="flex mr-auto">

                <a href="index.php"><img src="images/Logo Arkademy.png" alt="Logo Arkademy" class="ml-5 mr-1" style="width:106px;"></a>
                
                <input name="" class="bg-gray-400 my-5 rounded-lg pl-5 pr-5" placeholder="Search ...">
           
            </div>

            <a href="add.php"><button class="my-5 mr-5 bg-orange-300 py-1 px-5 rounded-lg text-white shadow-md">ADD</button></a>
        </div>
    </header>
    <main>
        <div class="my-5 mx-20 shadow-md rounded-lg p-10 ">
            <div class="mb-2 text-bold">
                Edit
            </div>
            <form name="update_user" method="post" action="edit.php" class="text-sm mx-auto">
                <table>
                    <tr> 
                        
                        <td><input type="text" name="cashier" value=<?php echo $name;?> class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
                    </tr>
                    <tr> 
                        <td><input type="text" name="category" value=<?php echo $category;?> class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
                    </tr>
                    <tr> 
                        <td><input type="text" name="product" value=<?php echo $product;?> class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
                    </tr>
                    <tr> 
                        <td><input type="text" name="price" value=<?php echo $price;?> class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update" class="border bg-orange-300 text-white rounded-lg px-5"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
    
</body>
</html>