<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="heading">Messages</h1>

                <br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_messages ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1; 

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $customer_name = $row['name'];
                                $customer_email = $row['email'];
                                $customer_message = $row['message'];
                                
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_message; ?></td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Messages not Available</td></tr>";
                        }
                    ?>

                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>