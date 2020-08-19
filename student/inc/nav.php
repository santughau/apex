<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">Apex Acadamy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
          
            <li class="nav-item ">
                <a class="nav-link" href="mark.php">Marks </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="attendance.php">Attendance </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="fee.php">Fees </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="msg.php">Messages </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="profile.php">Profile </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="query.php">Query </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href=""><i class="fa fa-user text-primary"></i> <span class="text-danger">Welcome</span> <b><?php echo ucfirst($name);?></b></a>
            </li>
            <li class="nav-item hidden-xs ">
                <img src="../images/student/<?php echo $_SESSION['image'];?>" height="40px;" class="img fluid rounded-circle" style="margin-top:5px;">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                    <i class="fa  fa-star"></i> Settings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>