
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product</title>
    <link rel="stylesheet" href="main.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<!-- Animate css -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <div class="content">
        <h1 class="logo">Add <span>Product</span> </h1>
        <div class="contact_wrapper">
            <div class="contact-form">
                <h1>Add Product</h1>
                <!-- Start form and inputs-->
                <form action="create.php" method="post">
                    <p>
                    <label for="code">Code</label><input type="number" name="code" id="code"   min="2">
                </p>
                <p>
                    <label for="name">Name</label><input type="text" name="name" id="name" required>
                </p>
                <p>
                    <label for="price">Price</label><input type="number" name="price" id="price" required> 
                </p>
                <p>
                    <label for="">Category</label><select name="category" id="category">
                        <option value="Home Appliances">Home Appliances</option>
                        <option value="Audio and Video">Audio and Video</option>
                        <option value="Cell 
                        Phones">Cell 
                        Phones</option>
                    </select>
                </p>
                <p>
                    <label for="Enter">Enter url of the image</label><input type="url" name="image" id="image"  class="input-file" required>
                </p>
                <p>
                <label for="available">available</label><select name="available">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </p>

                <p class="block">
                    <label for="Description">Description</label><textarea name="description" id="Description" cols="10" rows="10" required></textarea>
                </p>
               
                <p class="block"><input type="submit" value="SEND" name="submit"> </input></p>
                </form>
                <!-- Final form -->

            </div>
        </div>
    </div>
</body>
</html>
