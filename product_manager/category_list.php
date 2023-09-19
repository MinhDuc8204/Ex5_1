
<?php include '../view/header.php'; ?>
<main>

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>        
        <?php
            include '../model/database.php';
            
            if(!function_exists('get_categories')){
                include '../model/category_db.php';
            }
            $category=get_categories();
        ?>
        <?php foreach($category as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName'] ?></td>
            <form action="../product_manager/index.php" method="post">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="idCate" value="<?php echo $category["categoryID"] ?>">
            <td><button type="submit">Delete</button></td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Category</h2>
    <form action="../product_manager/index.php" method="post">
        <input type="hidden" name="action" value="add_category">
        <Label>Name :</Label> <input type="text" name="value"> <button type="submit">Add</button>
    </form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>