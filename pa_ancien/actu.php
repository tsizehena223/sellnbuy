<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell&Buy</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <a href="index.html" class="logo"><img src="images/logo.png"></a>
            <div class="search-box">
                <img src="images/search.png">
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="navbar-center">
            <ul>
                <li><a href="#"class="active-link"><img src="images/home.png"> <span>Home</span></a></li>
                <li><a href="#"><img src="images/network.png"> <span>My Network</span></a></li>
                <li><a href="#"><img src="images/jobs.png"> <span>Jobs</span></a></li>
                <li><a href="#"><img src="images/message.png"> <span>Messaging</span></a></li>
                <li><a href="#"><img src="images/notification.png"> <span>Notifications</span></a></li>
            </ul>
        </div>
        <div class="navbar-right">
            <div class="online">
                <img src="images/user-1.png" class="nav-profile-img" onclick="toggleMenu()">
            </div>
        </div>

<!--------------------------------- profile-dorp-down-menu---------------------->

<div class="profile-menu-wrap" id="profileMenu">
    <div class="profile-menu">
        <div class="user-info">
            <img src="images/user-1.png">
            <div>
                <h3>Rayan Walton</h3>
                <a href="#">See your profile</a>
            </div>
        </div>
        <hr>
        <a href="#" class="profile-menu-link">
            <img src="images/feedback.png">
            <p>Give Feedback</p>
            <span>></span>
        </a>
        <a href="#" class="profile-menu-link">
            <img src="images/setting.png">
            <p>Setting & Privacy</p>
            <span>></span>
        </a>
        <a href="#" class="profile-menu-link">
            <img src="images/help.png">
            <p>Help & Support</p>
            <span>></span>
        </a>
        <a href="#" class="profile-menu-link">
            <img src="images/display.png">
            <p>Display & Accessibility</p>
            <span>></span>
        </a>
        <a href="#" class="profile-menu-link">
            <img src="images/logout.png">
            <p>Logout</p>
            <span>></span>
        </a>
    </div>
</div>

    </nav>

<!-----------------------NAVBAR CLOSE------------------>
<div class="container">
<!------------------left-sidebar--------------------->
    <div class="left-sidebar">
        <div class="sidebar-profile-box">
            <img src="images/cover-pic.png" width="100%">
            <div class="sidebar-profile-info">
                <img src="images/user-1.png">
                <h1>Ryan Walton</h1>
                <h3>Web Developer at Microsoft</h3>
                <ul>
                    <li>Your profile views <span>52</span></li>
                    <li>Your post views <span>810</span></li>
                    <li>Your connections<span>205</span></li>
                </ul>
            </div>
            <div class="sidbar-profile-link">
                <a href="#"> <img src="images/items.png"> My items</a>
                <a href="#"> <img src="images/premium.png"> Try premium</a>
            </div>
        </div>
        <div class="sidebar-activity">
            <h3>RECENT</h3>
            <a href="#"><img src="images/recent.png"> Web Development</a>
            <a href="#"><img src="images/recent.png"> User Interface</a>
            <a href="#"><img src="images/recent.png"> Online Learning</a>
            <a href="#"><img src="images/recent.png"> Learn Online</a>
            <a href="#"><img src="images/recent.png"> Code Better</a>
            <a href="#"><img src="images/recent.png"> Group Learning</a>
            <h3>GRPOUPS</h3>
            <a href="#"><img src="images/group.png"> Web Design Group</a>
            <a href="#"><img src="images/group.png"> HTML & CSS Learners</a>
            <a href="#"><img src="images/group.png"> Phyton & Javascript Group</a>
            <a href="#"><img src="images/group.png"> Learn Coding Online</a>
            <h3>HASHTAG</h3>
            <a href="#"><img src="images/hashtag.png"> webdeveloppement</a>
            <a href="#"><img src="images/hashtag.png"> userinterface</a>
            <a href="#"><img src="images/hashtag.png"> onlinelearning</a>
            <div class="discover-more-link">
                <a href="#">Discover more</a>
            </div>
        </div>
    </div>
<!---------------------main-content----------------->
    <div class="main-content">
        <div class="create-post">
            <div class="create-post-input">
                <img src="images/user-1.png">
                <textarea rows="2" placeholder="Write a post"></textarea>
            </div>
            <div class="create-post-links">
                <li><img src="images/photo.png">Photo</li>
                <li><img src="images/video.png">Video</li>
                <li><img src="images/event.png">Event</li>
                <li>Post</li>
            </div>
        </div>
        <div class="sort-by">
            <hr>
            <p>Sort by: <span>top <img src="images/down-arrow.png"></span></p>
        </div>
<!------------------------------------------------- POST 1 BEGIN --------------------------------- -->
        <div class="post">
            <div class="post-author">
                <img src="images/user-3.png">
                <div>
                    <h1>Benjamin Leo</h1>
                    <small>Founder an CEO at Gellelio Group | Angel Investor</small>
                    <small>2 hours ago</small>
                </div>
            </div>
            <p>The success of every website depends on search engine opimisation and 
            digital marketing strategy. If you are on the first page of all major search engines 
            then you are ahead among your comptitors.</p>
            <img src="images/post-image-1.png" width="100%">

            <div class="post-stats">
                <div>
                    <img src="images/thumbsup.png">
                    <img src="images/love.png">
                    <img src="images/clap.png">
                    <span class="liked-users">Abhinav Mishra and 75 others</span>
                </div>
                <div>
                    <span>22 comments &middot; 40 shares</span>
                </div>
            </div>
            <div class="post-activiity">
                <div>
                    <img src="images/user-1.png" class="post-activity-user-icon">
                    <img src="images/down-arrow.png" class="post-activity-arrow-icon">
                </div>
                <div class="post-activity-link">
                    <img src="images/like.png">
                    <span>Like</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/comment.png">
                    <span>Comment</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/share.png">
                    <span>Share</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/send.png">
                    <span>Send</span>
                </div>
            </div>
        </div>

<!------------------------------------------------- POST 1 END --------------------------------- -->

<!------------------------------------------------- POST 2 BEGIN --------------------------------- -->
        <div class="post">
            <div class="post-author">
                <img src="images/user-4.png">
                <div>
                    <h1>Clarence George</h1>
                    <small>Founder an CEO at Gellelio Group | Angel Investor</small>
                    <small>2 hours ago</small>
                </div>
            </div>
            <p>The success of every website depends on search engine opimisation and 
            digital marketing strategy. If you are on the first page of all major search engines 
            then you are ahead among your comptitors.</p>
            <img src="images/post-image-2.png" width="100%">

            <div class="post-stats">
                <div>
                    <img src="images/thumbsup.png">
                    <img src="images/love.png">
                    <img src="images/clap.png">
                    <span class="liked-users">Abhinav Mishra and 75 others</span>
                </div>
                <div>
                    <span>22 comments &middot; 40 shares</span>
                </div>
            </div>
            <div class="post-activiity">
                <div>
                    <img src="images/user-1.png" class="post-activity-user-icon">
                    <img src="images/down-arrow.png" class="post-activity-arrow-icon">
                </div>
                <div class="post-activity-link">
                    <img src="images/like.png">
                    <span>Like</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/comment.png">
                    <span>Comment</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/share.png">
                    <span>Share</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/send.png">
                    <span>Send</span>
                </div>
            </div>
        </div>

<!------------------------------------------------- POST 2 END ------------------------------------>

<!------------------------------------------------- POST 3 BEGIN --------------------------------- -->
        <div class="post">
            <div class="post-author">
                <img src="images/user-4.png">
                <div>
                    <h1>Clarence George</h1>
                    <small>Founder an CEO at Gellelio Group | Angel Investor</small>
                    <small>2 hours ago</small>
                </div>
            </div>
            <p>The success of every website depends on search engine opimisation and 
            digital marketing strategy. If you are on the first page of all major search engines 
            then you are ahead among your comptitors.</p>
            <img src="images/post-image-3.png" width="100%">

            <div class="post-stats">
                <div>
                    <img src="images/thumbsup.png">
                    <img src="images/love.png">
                    <img src="images/clap.png">
                    <span class="liked-users">Abhinav Mishra and 75 others</span>
                </div>
                <div>
                    <span>22 comments &middot; 40 shares</span>
                </div>
            </div>
            <div class="post-activiity">
                <div>
                    <img src="images/user-1.png" class="post-activity-user-icon">
                    <img src="images/down-arrow.png" class="post-activity-arrow-icon">
                </div>
                <div class="post-activity-link">
                    <img src="images/like.png">
                    <span>Like</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/comment.png">
                    <span>Comment</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/share.png">
                    <span>Share</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/send.png">
                    <span>Send</span>
                </div>
            </div>
        </div>

<!------------------------------------------------- POST 3 END ----------------------------------->

<!------------------------------------------------- POST 4 BEGIN --------------------------------- -->
        <div class="post">
            <div class="post-author">
                <img src="images/user-4.png">
                <div>
                    <h1>Clarence George</h1>
                    <small>Founder an CEO at Gellelio Group | Angel Investor</small>
                    <small>2 hours ago</small>
                </div>
            </div>
            <p>The success of every website depends on search engine opimisation and 
            digital marketing strategy. If you are on the first page of all major search engines 
            then you are ahead among your comptitors.</p>
            <img src="images/post-image-4.png" width="100%">

            <div class="post-stats">
                <div>
                    <img src="images/thumbsup.png">
                    <img src="images/love.png">
                    <img src="images/clap.png">
                    <span class="liked-users">Abhinav Mishra and 75 others</span>
                </div>
                <div>
                    <span>22 comments &middot; 40 shares</span>
                </div>
            </div>
            <div class="post-activiity">
                <div>
                    <img src="images/user-1.png" class="post-activity-user-icon">
                    <img src="images/down-arrow.png" class="post-activity-arrow-icon">
                </div>
                <div class="post-activity-link">
                    <img src="images/like.png">
                    <span>Like</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/comment.png">
                    <span>Comment</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/share.png">
                    <span>Share</span>
                </div>
                <div class="post-activity-link">
                    <img src="images/send.png">
                    <span>Send</span>
                </div>
            </div>
        </div>
<!------------------------------------------------- POST 4 END --------------------------------- -->
        
    </div>
<!--------------------right-sidebar------------------>
    <div class="right-sidebar">
        <div class="sidebar-news">
            <img src="images/more.png" class="info-icon">
            <h3>Trending News</h3>
            <a href="#">Hight demand for skilled manpower</a>
            <span>1d ago &middot; 10,934 readers</span>

            <a href="#">Careers growing Horizontally too</a>
            <span>19h ago &middot; 1,552 readers</span>

            <a href="#">Less work for visa fo US, more for UK</a>
            <span>1d ago &middot; 27,290 readers</span>

            <a href="#">More hiring = higher confidence?</a>
            <span>18h ago &middot; 8,208 readers</span>

            <a href="#">Gautam Adani is the wordl's third richest</a>
            <span>12h ago &middot; 4,205 readers</span>

            <a href="#"class="read-more-link">Read More</a>
        </div>
        <div class="sidebar-ad">
            <small>Ad &middot; &middot; &middot;</small>
            <p>Master the 5 priciples of  web design</p>
            <div>
                <img src="images/user-1.png">
                <img src="images/mi-logo.png">
            </div>
            <b>Brand and Demand in Xiaomi</b>
            <a href="#" class="ad-link">Learn More</a>
        </div>
        <div class="sidebar-useful-link">
            <a href="#">About</a>
            <a href="#">Accessiblity</a>
            <a href="#">Help Center</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Advertising</a>
            <a href="#">Get the App</a>
            <a href="#">More</a>
            <div class="copyright-msg">
                <img src="images/logo.png">
                <p>Linkedup &#169; 2022. All right reserved</p>
            </div>
        </div>
    </div>
</div>
<script>
    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu(){
        profileMenu.classList.toggle("open-menu");
    }
</script>

</body>
</html>