<?php 
    //Include Constants File
    include('../config/constants.php');

    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the Value and Delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image file if available
        // Since we are only dealing with the image name now, this part is no longer needed
        /*
        if($image_name != "")
        {
            // Image is Available. So remove it
            $path = "../images/category/".$image_name;
            // Remove the Image
            $remove = unlink($path);

            // IF failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                // Set the Session Message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                // Redirect to Manage Category page
                header('location:'.SITEURL.'admin/manage-category.php');
                // Stop the Process
                die();
            }
        }
        */

        // Delete Data from Database
        // SQL Query to Delete Data from Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        // Execute the Query
        $res = mysqli_query($conn, $sql);

        // Check whether the data is deleted from database or not
        if($res==true)
        {
            // Set Success Message and Redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            // Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            // Set Fail Message and Redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            // Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    else
    {
        // Redirect to Manage Category Page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
