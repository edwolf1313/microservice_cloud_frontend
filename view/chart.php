<div class="table-users">
   <div class="header">Cart</div>

   <table cellspacing="0">
      <tr>
         <th>Product</th>
         <th>Name</th>
         <th>Quantity</th>
         <th>Payment</th>
         <th>Change</th>
         <th>Delete</th>
      </tr>
      <?php foreach ($cart_data as &$cart_product) { ?>
      <tr>
          <form class="" action="" method="post">
            <input type="hidden" id="chart_id" name="chart_id" value="<?=$cart_product->id;?>">
            <td><img src="<?= $product_url.$cart_product->product_picture ?>" alt="" /></td>
            <td><?= $cart_product->product_name ?></td>
            <td>
            <div class="input-group">
                              <input type="hidden" id="product_id" name="product_id" value="<?=$cart_product->product_id;?>">
                              <input type="button" value="-" class="button-minus" data-field="quantity">
                              <input type="number" step="1" max="" value="<?=$cart_product->quantity ?>" name="quantity" class="quantity-field">
                              <input type="button" value="+" class="button-plus" data-field="quantity">
                              </div>
             </td>
             <td><?= $cart_product->payment  ?></td>
             <td><button class="btn fourth" type="submit" name="Submit" value="" formaction="<?= $web_url;?>/index/update_cart_list" formmethod="POST">
               <i class="fa fa-edit" style="color:#f1c40f"></i></button>
             </td>
             <td style="text-align:center"><button class="btn first" type="submit" name="Submit" value="" formaction="<?= $web_url;?>/index/delete_cart_list" formmethod="POST">
               <i class="fa fa-trash" style="color:red"></i></button>
             </td>
          </form>
      </tr>
      <?php } ?>
   </table>
</div>
