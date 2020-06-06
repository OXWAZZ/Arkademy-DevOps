<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS App - Index</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body p-0 m-0>
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
        <table class="table-fixed mt-10 mx-40 rounded-lg shadow-md">
            <thead class="bg-orange-300 text-white">
                <tr>
                    <th class="w-1/6 px-4 py-2">No.</th>
                    <th class="w-1/6 px-4 py-2">Cashier</th>
                    <th class="w-1/6 px-4 py-2">Product</th>
                    <th class="w-1/6 px-4 py-2">Category</th>
                    <th class="w-1/6 px-4 py-2">Price</th>
                    <th class="w-1/6 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include_once("CRUD/connection.php");

            $result = mysqli_query($mysqli,
                "SELECT product.id as id, cashier.name as cashier, product.name as product, category.name as category, product.price as price
                FROM product
                JOIN cashier ON product.id_cashier=cashier.id
                JOIN category ON product.id_category=category.id");
            ?>
            <?php  
                while($user_data = mysqli_fetch_array($result)) {  
                    $rowcount=mysqli_num_rows($result);       
                    echo "<tr>";
                    echo "<td class='px-4 py-2 font-bold text-center' >".$user_data['id']."</td>";
                    echo "<td class='px-4 py-2' >".$user_data['cashier']."</td>";
                    echo "<td class='px-4 py-2' >".$user_data['product']."</td>";
                    echo "<td class='px-4 py-2' >".$user_data['category']."</td>";    
                    echo "<td class='px-4 py-2' >".$user_data['price']."</td>";    
                    echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
                }
            ?>
                <!-- <tr>
                    <td class="px-4 py-2 font-bold text-center">1</td>
                    <td class="px-4 py-2"><?php echo dump($result)?></td>
                    <td class="px-4 py-2">858</td>
                    <td class="px-4 py-2">858</td>
                    <td class="px-4 py-2">858</td>
                    <td class="px-4 py-2">858</td>
              
                </tr> -->
            </tbody>
        </table>
    </main>
</body>
</html>