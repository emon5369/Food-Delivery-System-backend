<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST" class="tbl-center">
        
            <table class="tbl-50">
                <tr>
                    <td>Food Name:</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Quantity:</td>
                    <td>
                    <b> <?php echo $qty; ?> </b>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                    <b> <?php echo $customer_name; ?> </b>
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                    <b> <?php echo $customer_contact; ?> </b>
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                    <b> <?php echo $customer_email; ?> </b>
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                    <b> <?php echo $customer_address; ?> </b>
                    </td>
                </tr>

                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        Update:
                    </td>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $status = $_POST['status'];

                $sql2 = "UPDATE tbl_order SET 
                    status = '$status'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
