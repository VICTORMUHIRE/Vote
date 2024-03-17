<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>login</title>
</head>
<body class="body">
    <div class="header">
        <div class="logo">
            <div class="logoImg">
                <img src="/static/logo.png" alt="">
            </div>
            <p>Admin logo</p>
        </div>
        <div class="adminInfo">
            <div class="notifification">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M12 6.44V9.77" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M12.0199 2C8.3399 2 5.3599 4.98 5.3599 8.66V10.76C5.3599 11.44 5.0799 12.46 4.7299 13.04L3.4599 15.16C2.6799 16.47 3.2199 17.93 4.6599 18.41C9.4399 20 14.6099 20 19.3899 18.41C20.7399 17.96 21.3199 16.38 20.5899 15.16L19.3199 13.04C18.9699 12.46 18.6899 11.43 18.6899 10.76V8.66C18.6799 5 15.6799 2 12.0199 2Z" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M15.3299 18.82C15.3299 20.65 13.8299 22.15 11.9999 22.15C11.0899 22.15 10.2499 21.77 9.64992 21.17C9.04992 20.57 8.66992 19.73 8.66992 18.82" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10"/>
                </svg>
            </div>
           
            <div class="adminName"><span>John</span></div>
            <div class="adminImage">
                <img src="/static/admin.png" alt="">
            </div>
            <div class="drop">
                <svg width="24" height="24"         viewBox="0 0 24 24" fill="none"     xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M19.9201 8.95001L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.95001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                    
            </div>
        </div>
    </div>
    <div class="bodyContainer">
        <div class="sidebar">
           <div class="sidebarMenus">
                <div class="menus">
                    <a href="#">
                        <svg class="dashboadIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="path" d="M21.5 10.9V4.1C21.5 2.6 20.86 2 19.27 2H15.23C13.64 2 13 2.6 13 4.1V10.9C13 12.4 13.64 13 15.23 13H19.27C20.86 13 21.5 12.4 21.5 10.9Z" fill="#F9BA33"/>
                            <path class="path" d="M11 13.1V19.9C11 21.4 10.36 22 8.77 22H4.73C3.14 22 2.5 21.4 2.5 19.9V13.1C2.5 11.6 3.14 11 4.73 11H8.77C10.36 11 11 11.6 11 13.1Z" fill="#F9BA33"/>
                            <path class="path" d="M21.5 19.9V17.1C21.5 15.6 20.86 15 19.27 15H15.23C13.64 15 13 15.6 13 17.1V19.9C13 21.4 13.64 22 15.23 22H19.27C20.86 22 21.5 21.4 21.5 19.9Z" fill="#F9BA33"/>
                            <path class="path" d="M11 6.9V4.1C11 2.6 10.36 2 8.77 2H4.73C3.14 2 2.5 2.6 2.5 4.1V6.9C2.5 8.4 3.14 9 4.73 9H8.77C10.36 9 11 8.4 11 6.9Z" fill="#F9BA33"/>
                        </svg>
                            
                        <div>Dashboad</div>
                    </a>
                </div>
                <div class="menus">
                    <a href="home.php">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="path" d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path"  d="M16.4098 4C18.3498 4 19.9098 5.57 19.9098 7.5C19.9098 9.39 18.4098 10.93 16.5398 11C16.4598 10.99 16.3698 10.99 16.2798 11" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" d="M4.16021 14.56C1.74021 16.18 1.74021 18.82 4.16021 20.43C6.91021 22.27 11.4202 22.27 14.1702 20.43C16.5902 18.81 16.5902 16.17 14.1702 14.56C11.4302 12.73 6.92021 12.73 4.16021 14.56Z" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path"  d="M18.3398 20C19.0598 19.85 19.7398 19.56 20.2998 19.13C21.8598 17.96 21.8598 16.03 20.2998 14.86C19.7498 14.44 19.0798 14.16 18.3698 14" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>  
                        <div>Utilisateurs</div>
                    </a>
                </div>                
                <div class="menus">                    
                    <a href="depot.php">
                        <svg class="icon" width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="path" d="M10.3716 10.2012V17.0613" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" d="M15.0381 6.91992V17.0626" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" d="M19.6284 13.8262V17.0612" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" fill-rule="evenodd" clip-rule="evenodd" d="M19.6857 2H10.3143C7.04762 2 5 4.31208 5 7.58516V16.4148C5 19.6879 7.0381 22 10.3143 22H19.6857C22.9619 22 25 19.6879 25 16.4148V7.58516C25 4.31208 22.9619 2 19.6857 2Z" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                   
                        
                        <div>Elections</div>
                    </a>
                </div>
                <div class="menus">
                    <a href="retrait.php">
                        <svg class="icon" width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="path" d="M10.3716 10.2012V17.0613" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" d="M15.0381 6.91992V17.0626" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" d="M19.6284 13.8262V17.0612" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="path" fill-rule="evenodd" clip-rule="evenodd" d="M19.6857 2H10.3143C7.04762 2 5 4.31208 5 7.58516V16.4148C5 19.6879 7.0381 22 10.3143 22H19.6857C22.9619 22 25 19.6879 25 16.4148V7.58516C25 4.31208 22.9619 2 19.6857 2Z" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                      
                        <div>departement</div>
                    </a>
                </div>                
           </div>
           <div class="menus">                
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="path" d="M8.8999 7.55999C9.2099 3.95999 11.0599 2.48999 15.1099 2.48999H15.2399C19.7099 2.48999 21.4999 4.27999 21.4999 8.74999V15.27C21.4999 19.74 19.7099 21.53 15.2399 21.53H15.1099C11.0899 21.53 9.2399 20.08 8.9099 16.54" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <g >
                        <path class="path" d="M2 12H14.88" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path class="path" d="M12.6504 8.65039L16.0004 12.0004L12.6504 15.3504" stroke="#757575" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>                        
                
                <div class="logout">
                    <p>Logout</p>
                </div>
           </div>
        </div>       
        <div class="container1">
            @yield('content')
            
        </div>
    </div>
</body>
</html>