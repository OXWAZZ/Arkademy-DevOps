<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS App - Add</title>
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

<div class="my-5 mx-20 shadow-md rounded-lg p-10 ">Add

    <form action="add.php" method="post" name="form1" class="text-sm">
        <table>
            <tr> 
                <td><input type="text" name="cashier" class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
            </tr>
            <tr> 
                <td><input type="text" name="category" class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
            </tr>
            <tr> 
                <td><input type="text" name="product" class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
            </tr>
            <tr> 
                <td><input type="text" name="price" class="border-0 border-solid border-b-2 border-gray-7 text-gray-500"></td>
            </tr>
            <tr> 
                <td><input type="submit" name="Submit" value="Add" class="border bg-orange-300 text-white rounded-lg px-5"></td>
            </tr>
        </table>
    </form>
</div>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['cashier'];
        $category = $_POST['category'];
        $product = $_POST['product'];
        $price = $_POST['price'];

        // include database connection file
        include_once("CRUD/connection.php");

        // Insert user data into table
        // $result = mysqli_query($mysqli, "INSERT INTO cashier(name) VALUES('$name')");
        // $result = mysqli_query($mysqli, "INSERT INTO category(name) VALUES('$category')");
        $result = mysqli_query($mysqli, "INSERT INTO product(name, price, id_category, id_cashier) VALUES(
                '$product',
                '$price',
                (select id from category where name = '$category'),
                (select id from cashier where name = '$name')
                
                
                
            )");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>

</main>
    
</body>
</html>