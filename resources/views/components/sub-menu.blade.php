<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <!-- Brand for small screens -->
        <a class="navbar-brand d-lg-none" href="index.html">Menu</a>

        <!-- Toggler / Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-start" id="mainNav">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
                <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
                
            
                <li class="nav-item dropdown position-static">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Men
                        </a>
                        <div class="dropdown-menu mt-0 p-4 border-0 rounded-0 shadow">
                            <div class="container">
                            <div class="row">

                                <!-- Column 1 -->
                                <div class="col-md-3">
                                <h6 class="fw-bold border-bottom pb-2">Men Accessories</h6>
                                <a class="dropdown-item" href="#">Headwear</a>
                                <a class="dropdown-item" href="#">Sunglasses</a>
                                <a class="dropdown-item" href="#">Watches</a>
                                <a class="dropdown-item" href="#">Belts</a>
                                <a class="dropdown-item" href="#">Multipacks</a>
                                <a class="dropdown-item" href="#">Other Accessories</a>
                                </div>

                                <!-- Column 2 -->
                                <div class="col-md-3">
                                <h6 class="fw-bold border-bottom pb-2">Men's Shoes</h6>
                                <a class="dropdown-item" href="#">Sandals</a>
                                <a class="dropdown-item" href="#">Boots</a>
                                <a class="dropdown-item" href="#">Sports Shoes</a>
                                <a class="dropdown-item" href="#">Casual Shoes</a>
                                <a class="dropdown-item" href="#">Formal Shoes</a>
                                </div>

                                <!-- Column 3 -->
                                <div class="col-md-3">
                                <h6 class="fw-bold border-bottom pb-2">Bottoms</h6>
                                <a class="dropdown-item" href="#">Pants</a>
                                <a class="dropdown-item" href="#">Jeans</a>
                                <a class="dropdown-item" href="#">Joggers</a>
                                <a class="dropdown-item" href="#">Shorts</a>
                                </div>

                                <!-- Column 4 -->
                                <div class="col-md-3">
                                <h6 class="fw-bold border-bottom pb-2">T-shirts & Shirts</h6>
                                <a class="dropdown-item" href="#">T-shirts</a>
                                <a class="dropdown-item" href="#">Casual Shirts</a>
                                <a class="dropdown-item" href="#">Formal Shirts</a>
                                <a class="dropdown-item" href="#">Polo Shirts</a>
                                <a class="dropdown-item" href="#">Vests</a>
                                </div>

                            </div>
                            </div>
                        </div>
                        </li>

                <li class="nav-item"><a class="nav-link text-white" href="category.html">Woman</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="about.html">Kids</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="faq.html">Electronics</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="contact.html">Health and Household</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="about.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('contactUs') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>