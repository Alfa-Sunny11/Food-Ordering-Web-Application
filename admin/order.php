<?php
    include('inside/menu.php');
?>
<div>
    <div class = "wrapper">
        <h1>Order</h1>

            <table class = "tbl">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Customer name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <td>1.</td>
                    <td>Burger</td>
                    <td>150</td>
                    <td>2</td>
                    <td>06/29/2020</td>
                    <td>Delivered</td>
                    <td>Abeer</td>
                    <td>013123312</td>
                    <td>abc@gmail.com</td>
                    <td>Rampura, Dhaka</td>

                    <td>
                    <a href = "#">Update</a>

                    </td>
                </tr>
            </table> 
    </div>    
</div>
<?php
    include('inside/footer.php');
?>