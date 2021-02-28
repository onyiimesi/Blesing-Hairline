<?php require_once("includes/db.php"); ?>
<?php include "admin/functions.php"; ?>


<?php 

   /* if (isset($_GET['add'])) {

        $query = "SELECT * FROM posts WHERE post_id =" . mysqli_escape_string($connection, $_GET['add']). " ";
        $query_run = mysqli_query($connection, $query);

        confirm($query_run);
        
        while ($row = mysqli_fetch_array($query_run)) {
            
            if ($row['post_quantity'] != $_SESSION['product_' . $_GET['add']]) {
                $_SESSION['product_' . $_GET['add']]+=1;

                redirect("/hairline/cart");
            } else { 

                set_message("We only have " . $row['post_quantity'] . " " . "{$row['post_title']}" . " available");
                redirect("/hairline/cart");

            }


        }
    }


    if (isset($_GET['remove'])) {
        
        $_SESSION['product_' . $_GET['remove']]--;

        if ($_SESSION['product_' . $_GET['remove']] < 1) {
            unset($_SESSION['item_total']);
            unset($_SESSION['item_quantity']);

            redirect("cart");
        } else {
            redirect("cart");
        }

    }


    if (isset($_GET['delete'])) {
        $_SESSION['product_' . $_GET['delete()']] = '0';
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);

        redirect("cart");

    }



function cart() {

global $connection;

$total = 0;

foreach ($_SESSION as $name => $value) {

    if ($value > 0) {
        
        if (substr($name, 0, 8 ) == "product_") {

            $length = strlen($name) - 8; 

            $id = substr($name, 8, $length); 

            $query = " SELECT * FROM posts WHERE post_id = " . mysqli_escape_string($connection, $id). " ";
            $query_run = mysqli_query($connection, $query);
            confirm($query_run);

            while($row = mysqli_fetch_array($query_run)) {

            $post_image = $row['post_image'];

               
            $sub = (int)$row['post_price']*$value;

                
            $post = <<<DELIMETER

            <tr>
                <td class="product-col">
                    <img src="/hairline/img/posts/{$row['post_image']}" alt="">
                    <div class="pc-title">
                        <h4>{$row['post_title']}</h4>
                    </div>
                </td>
                <td class="quy-col">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input type="text" value="{$value}">
                        </div>
                    </div>
                </td>
                <td class="size-col"><h4>Size M</h4></td>
                <td class="total-col"><h4>&#8358;{$sub}</h4></td>
               
                <td class="total-col"><a class='btn btn-success' href="carts.php?add={$row['post_id']}"><span class='fas fa-plus'></span></a></td>
                <td class="total-col"><a class='btn btn-danger' href="carts.php?remove={$row['post_id']}"><span class='fas fa-times'></span></a></td>
            </tr>


DELIMETER;

echo $post;



}

$_SESSION['item_total'] = $total += $sub; 

        }

    }
    
    

}




}












*/

?>



<?php 

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = 1;


    $stmt = $connection->prepare("SELECT post_code FROM cart WHERE post_code=?");

    $stmt->bind_param("s", $pcode);

    $stmt->execute();

    $res = $stmt->get_result();

    //$res = $stmt;

    $r = $res->fetch_assoc();



    $code = $r['post_code'];

    if (!$code) {

        $query = $connection->prepare("INSERT INTO cart (post_title, post_price, post_image, post_quantity, total_price, post_code) VALUES(?,?,?,?,?,?)");
        $query->bind_param("sssiss",$ptitle, $pprice, $pimage, $pqty, $pprice, $pcode);

        $query->execute();


        echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Item added to your cart!</strong>
        </div>";
        
    } else{

        echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Item already added to your cart!</strong>
        </div>";

    }
}


if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $connection->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();

    $rows = $stmt->num_rows();

    echo $rows;
}


if (isset($_GET['remove'])) {
    $post_id = $_GET['remove'];

    $stmt = $connection->prepare("DELETE FROM cart WHERE post_id = ?");
    $stmt->bind_param("i",$post_id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from cart!';

    redirect("/hairline/cart");
}


if (isset($_GET['clear'])) {
    $post_id = $_GET['clear'];

    $stmt = $connection->prepare("DELETE FROM cart");
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item(s) removed from cart!';

    redirect("/hairline/cart");
}


if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty*$pprice;

    $stmt = $connection->prepare("UPDATE cart SET post_quantity = ?, total_price = ? WHERE post_id = ?");
    $stmt->bind_param("isi", $qty,$tprice,$pid);
    $stmt->execute();
}


if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $pmode = $_POST['pmode'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];

    $data = '';

    $stmt = $connection->prepare("INSERT INTO orders (name,email,phone,address,country,zip,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssssss",$name,$email,$phone,$address,$country,$zip,$pmode,$products,$grand_total);

    $stmt->execute();

    
    $data .= '<div class="text-center"> 
                <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                <h2 class="text-success">Your Order Placed Successfully!</h2>
                <h4 class="bg-danger text-light rounded p-2">Item(s) Purchased : '.$products.'</h4>
                <h4>Your Name : '.$name.'</h4>
                <h4>Your Email : '.$email.'</h4>
                <h4>Your Phone No : '.$phone.'</h4>
                <h4>Total Amount Paid : &#8358;'.number_format($grand_total,0).'</h4>
                <h4>Payment Mode : '.$pmode.'</h4>
                <h5 class="bg-success p-2 rounded text-light">Please note that your order will be processed 24 hours after payment has been confirmed.</h5>
            </div>';
    echo $data;

    $stmt = $connection->prepare("DELETE FROM cart");
    $stmt->execute();

}

?>