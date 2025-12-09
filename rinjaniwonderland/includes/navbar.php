<div class="navbar">
    <nav>
        <a href="index.php">
            <img src="img/FULLLOGO.png" alt="Logo" style="height: 4rem; margin-top: 1rem;">
        </a>

        <div class="nav-links" id="navLinks">
            <i class="fas fa-times close-icon" onclick="hideMenu()"></i>

            <a href="index.php">Homepage</a>
            <a href="mount.php">Mt Rinjani</a>
            <a href="hills.php">Hills</a>
            <a href="paragliding.php">Paragliding</a>
            <a href="about.php">About Us</a>
            <a href="souvenirs.php">Souvenir</a>
            
            <div class="dropdown">
                <button class="dropbtn">
                    Package <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="mount-pack.php">Mount Package</a>
                    <a href="hills-pack.php">Hills Package</a>
                    <a href="paragliding-pack.php">Paragliding Package</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">
                    Photography <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="gallery.php">Wildlife Photography</a>
                    <a href="human-photo.php">Human Interest Photography</a>
                </div>
            </div>
        </div>

        <div class="menu-icon" onclick="showMenu()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
</div>

<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu() { navLinks.style.right = "0"; }
    function hideMenu() { navLinks.style.right = "-260px"; }
</script>