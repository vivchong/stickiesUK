<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>StickiesUK - Florals and Botanicals</title>
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="shop-styles.css">
<!-- Fav icon -->
<link rel="shortcut icon" href="../images/fav-icon.png">
<!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Nav Bar -->
    <nav>
        <div class="navigation">
            <!-- Logo -->
            <a href="../index.php" class="logo">
                <img src="../images/logo-black.png"/>
            </a>
            <ul class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a>Shop<span><i class='bx bx-chevron-down'></i></span></a>
                    <ul>
                        <li><a href="../shop/shop-all.php">Shop All</a></li>
                        <li><a href="../shop/florals-botanicals.php">Florals & Botanicals</a></li>
                        <li><a href="../shop/glitter.php">Glitter</a></li>
                        <li><a href="../shop/minimalist.php">Minimalist</a></li>
                    </ul>
                </li>
                <!-- Shop Categories Sub-Menu -->
                <li><a href="../sale.php">Sale</a></li>
                <li><a href="../contact-us.php">Contact us</a></li>
            </ul>
            <div class="right-cart">
                <a href="../cart.php">
                    <!-- Cart Icon -->
                    <i class='bx bx-cart'></i>
                    <!-- Number of products in cart -->
                    <span class="cart-number h4">0</span>

                </a>
            </div>
        </div>
    </nav>

    <!-- Feaured Collection -->
    <div class="shop-category">
        <!-- Section Header  -->
        <div class="page-title">
            <h1>Florals and Botanicals</h1>
        </div>

        <!-- "Grid" of Products in that Category NEED TO UPDATE HREF LINKS-->
        <div class="collection-default">

            <div class="product-default">
                <a href="id/103.php" class="img-default">
                    <img src="../images/category/103.png"/>
                </a>
               <div class="label">
                    <a href="id/103.php">
                        <h3>Summer Lemonade</h3>
                        $15.00
                    </a>
               </div>
            </div>

            <div class="product-default">
                <a href="id/102.php" class="img-default">
                    <img src="../images/category/102.png"/>
                </a>
               <div class="label">
                    <a href="id/102.php">
                        <h3>Beleaf in Yourself</h3>
                        $15.00
                    </a>
               </div>
            </div>

            <div class="product-default">
                <a href="id/101.php" class="img-default">
                    <img src="../images/category/101.png"/>
                </a>
               <div class="label">
                    <a href="id/101.php">
                        <h3>Floral Symphony</h3>
                        $15.00
                    </a>
               </div>
            </div>

            

            <div class="filling-empty-space-childs"></div>
            <div class="filling-empty-space-childs"></div>
            <div class="filling-empty-space-childs"></div>
            <div class="filling-empty-space-childs"></div>

        </div>
    </div>

    <footer>
        <div class="left body2">
            <!-- Logo -->
            <a href="../index.php" class="logo">
                <img src="../images/logo-white.png"/>
            </a>
    
            <!-- Tagline -->
            <div class="body2">Nails for everyone.</div>
    
            <!-- Legalese -->
            <div class="legal1">Copyright © 2021, Stickies SG.</div>
        </div>
    
        <div class="sitemap body2">
            <div class="body2">
                Categories
            </div>
            <ul>
                <li><a href="../shop/shop-all.php">Shop All</a></li>
                <li><a href="../shop/florals-botanicals.php">Florals and Botanicals</a></li>
                <li><a href="../shop/glitter.php">Glitter</a></li>
                <li><a href="../shop/minimalist.php">Minimalist</a></li>
                <li><a href="../sale.php">Sale</a></li>
            </ul>
        </div>
    
        <div class="sitemap body2">
            <div class="body2">
                Information
            </div>
            <ul>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    
    </footer>


<script type="text/javascript">
    /* Fix menu when scrolling DOESN'T WORK. maybe because you used default nav? */
    $(window).scroll(function() {
        if($(document).scrollTop() > 50) {
            $('.nav').addClass('fix-nav');
        }
        else {
            $('.nav').removeClass('fix-nav');
        }
    });
</script>

</body>
</html>