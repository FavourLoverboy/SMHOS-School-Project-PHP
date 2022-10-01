    <ul>
        <li>
            <h1>
                <img src="./assets/favicon.jfif" alt="Logo" style="border-radius:50%;">
                <span>SMHOS</span>
            </h1>
        </li>
    </ul>
    <ul>
        <li>
            <a href="dashboard">
                <span><i class="fa fa-home"></i>Dashboard</span>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a>
                <span>
                    <i class="fa fa-clock-o"></i>
                    Attendance
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul>
                <lI><a href="attendance">Attendance</a></li>
                <lI><a href="signIn">Sign In</a></li>
                <lI><a href="signOut">Sign Out</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a>
                <span>
                    <i class="fa fa-users"></i>
                    Members
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul>
                <lI><a href="createMember">Create</a></li>
                <lI><a href="removeMember">Remove</a></li>
                <lI><a href="viewMembers1">View Details 1</a></li>
                <lI><a href="viewMembers2">View Details 2</a></li>
                <lI><a href="viewMembers3">View Details 3</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a>
                <span>
                    <i class="fa fa-user-circle"></i>
                    Users
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
            <ul>
                <lI><a href="createUser">Create</a></li>
                <lI><a href="removeUser">Remove</a></li>
                <lI><a href="viewUser">View</a></li>
            </ul>
        </li>
    </ul>
      


    <ul>        
        <?php 
            if($_SESSION['position'] == 'Rep'){
            ?>
                <li>
                    <a href="repdashboard">
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="repitems">
                        <span class="title">Items</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="title">Logout</span>
                    </a>
                </li>
            <?php
            }
        ?>
    </ul>
    