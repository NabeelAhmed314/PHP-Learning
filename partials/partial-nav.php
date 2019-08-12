<nav class='navbar'>
    <ul class='navbar-list'>
        <li class='navbar-item index'><a href='/index'>Home</a></li>
        <li class='navbar-item about'><a href='/about'>About Us</a></li>
        <li class='navbar-item about-culture'><a href='/about/culture'>About our culture</a></li>
        <li class='navbar-item contact'><a href='/contact'>Contact Us</a></li>
        <li class='navbar-item users'><a href='/users'>Users</a></li>
        <li class="navbar-item dropdown">
          <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-arrow-down"></i></a>
          <div class="dropdown-content">
              <a href='/settings'>Settings</a>
              <a href='/logout'>Logout</a>
          </div>
        </li>        
    </ul>
</nav>
<style>

.navbar-list{
  list-style-type: none;
  top:0;
  position:fixed;
  margin: 0;
  width:100%;
  padding: 0;
  background-color: #333;
}

.navbar-item{
    float: left;
}

.navbar-item a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar-item a:hover {
  background-color: #111;
}

.<?php echo $view ?>{
  background-color: #4CAF50;
  color: white;
}

.<?php echo $view ?> a:hover{
  background-color: #4CAF50;
  color: white;
}

.dropdown {
  float: right;
  width:180px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #d0d0d0;}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>