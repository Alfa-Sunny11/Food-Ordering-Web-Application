<?php
    include('inside/menu.php');
?>


    <!-- fOOD Section Starts Here -->
    <section class="wrapper">
        <div>
            
            <h2>Fill this form to confirm your order.</h2>

            <form action="#">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div>
                        <img src="imag/category/Food_Category_485.jpg" width = "200px">
                    </div>
    
                    <div>
                        <h3><?php echo $title ?></h3>
                        <p ><?php echo $price ?></p>

                        <div>Quantity</div>
                        <input type="number" name="qty" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div>Name</div>
                    <input type="text" name="name" placeholder="Enter your name"required>

                    <div>Phone Number</div>
                    <input type="tel" name="contact" placeholder="0123445"required>

                    <div>Email</div>
                    <input type="email" name="email" placeholder="E.g. abc@gmail.com"required>

                    <div>Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City"required></textarea><br>

                    <input type="submit" name="submit" value="Confirm Order">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD Section Ends Here -->

<?php
    include('inside/footer.php');
?>    