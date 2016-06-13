<?php
echo "<li class='mt'>
                      <a class='active' href='welcome.php'>
                          <i class='fa fa-dashboard'></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				   <li class='sub-menu'>
                      <a href='add_users.php' >
                          <i class='fa fa-users '></i>
                          <span>Upload Employee Details</span>
                      </a>
                  </li>
  					<li class='sub-menu'>
                      <a href='javascript:;' >
                          <i class='fa fa-user'></i>
                          <span>Sessions</span>
                      </a>
                      <ul class='sub'>
                      	  <li><a  href='view_session.php'>View Session Details</a></li>
                          <li><a  href='add_session.php'>Add New Session</a></li>
                          <li><a  href='edit_session.php'>Edit Session Details</a></li>
                      </ul>
                  </li>
				  <li class='sub-menu'>
                      <a href='registration_list.php' >
                          <i class='fa fa-users'></i>
                          <span>Export</span>
                      </a>
                  </li>
				  
			
				  <li class='sub-menu'>
                      <a href='approve_workshops.php' >
                          <i class='fa fa-rocket '></i>
                          <span>Approve Workshops</span>
                      </a>
                  </li>";

?>