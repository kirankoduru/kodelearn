<!DOCTYPE html>
<html>
    <head>
        <title>KodeLearn - Header after logging in</title>
        <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
        <?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
    </head>
    <body>
        <div class="menubar">
            <div class="wrap twhite">
                <ul class="lsNone l">
                    <li class="menu l active"><a href="#">Home</a></li>
                    <li class="menu l"><a href="#">Profile</a></li>
                    <li class="menu l"><a href="#">Inbox</a></li>
                    <li class="clear"></li>
                </ul>
                <ul class="lsNone r">
                    <li class="l pad10 tWhite">
                        <span id="greet">Good morning</span>, 
                        <span id="user">John</span> 
                        <span class="tlGray">|</span>
                    </li>
                    <li class="menu l"><a href="#" id="myac">My Account <span class="trid">&#x25BC;</span></a></li>
                </ul>
                <ul id="myacContent" class="crsrPoint">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                <div class="clear"></div>
            </div><!-- wrap -->
        </div><!-- menubar -->
        
        <div class="container">
            
            <div class="branding">
                <h1 class="dib l"><a href="#"><img src="images/kodelearn.jpg" alt="KodeLearn | Home" /></a></h1>
                
                <div class="roles dib r">
                    <p id="roleViewToggle">Switch roles <span class="trid">&#x25BC;</span></p>
                    <ul id="roleList" class="smallMenu">
                        <li class="smallText sans"><a href="#" class="role">Manager</a></li>
                        <li class="smallText sans"><a href="#" class="role">Student</a></li>
                    </ul>
                </div><!-- roles -->
                <div class="clear"></div>
            </div><!-- branding -->
			
			<?php include_once 'breadcrumbs.php'; ?>