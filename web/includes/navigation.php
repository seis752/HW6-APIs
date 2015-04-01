<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Simple Social</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <?php if (AuthenticationService::isAuthenticated()): ?>
            <ul class="nav navbar-nav">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="search-ajax-1.php">Search (Ajax 1)</a></li>
                <li><a href="search-ajax-2.php">Search (Ajax 2)</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php else: ?>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            <?php endif; ?>
        </div><!--/.nav-collapse -->
    </div>
</nav>
