<?php include_once "./app.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>E-mail page</title>
</head>
<body>
    <section class="nav">
        <div class="logo">
            <i class="fa-solid fa-apple-whole"></i>
        </div>
        <div class="nav-icons">
            <ul class="mail-icons-ul">
                <li class="mail-icons"><button><i class="fa-solid fa-house"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-envelope"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-users-line"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-dollar-sign"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-rectangle-list"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-book"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-calendar-days"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-chart-pie"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-chart-simple"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-clipboard"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-folder"></i></button></li>
                <li class="mail-icons"><button><i class="fa-solid fa-globe"></i></button></li>
            </ul>
        </div>
    </section>
    <section class="email-container">
        <div class="email-header">
            <div class="email-title">
                <h1>Email</h1>
            </div>
            <div class="email-notifications">
                <div class="notification-icon">
                    <i class="fa-solid fa-message"></i>
                    <div class="notification-count">2</div>
                </div>
                <div class="notification-icon">
                    <i class="fa-solid fa-bullhorn"></i>
                    <div class="notification-count">2</div>
                </div>
                <div class="notification-icon">
                    <i class="fa-solid fa-gear"></i>
                </div>
                <div class="profile-pic">

                </div>
                <div class="profile-name">
                    <h5>Madison Eve</h5>
                    <p style="font-size: 15px;">Admin</p>
                </div>
            </div>
        </div>
        <div class="email-nav-and-list">
            <div class="email-nav">
                <div class="mail-container">
                    <div class="new-mail"><button class="new-mail-btn"><i class="fa-solid fa-plus"></i> New Mail</button></div>
                    <div class="email-nav-buttons-container">
                        
                        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="get">
                            <button class="mail-btn" type="submit" name="mail-btn" value="inbox"><i class="fa-solid fa-inbox"></i> Inbox</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="sent"><i class="fa-solid fa-paper-plane"></i> Sent</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="favorite"><i class="fa-solid fa-star"></i> Favorite</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="draft"> <i class="fa-brands fa-firstdraft"></i> Draft</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="important"><i class="fa-solid fa-tag"></i> Important</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="scheduled"><i class="fa-solid fa-clock"></i> Scheduled</button>
                            <button class="mail-btn" type="submit" name="mail-btn" value="more"><i class="fa-solid fa-angle-down"></i> More</button>
                        </form>
                        
                    </div>
                    <div class="labels">
                        <p>Labels</p>
                        <button class="mail-btn" id="work"><i class="fa-solid fa-o"></i> Work</button>
                        <button class="mail-btn" id="side-project"><i class="fa-solid fa-o"></i> Side Projects</button>
                    </div>
                </div>
            </div>
            <div class="email-list-container">
                <div class="search-bar"><i class="fa-solid fa-magnifying-glass"></i> <input type="text" name="search" placeholder="Search here..."></div>
                    <div class="email-list">
                        <form action="" method="post">
                            <?php foreach($email_list as $key): ?>
                                
                                <div class="email-tile">
                                    <div class="profile-img"><div class="profile-pic"></div></div>
                                    <div class="email-content">
                                        <form action="" method="post">
                                            <button class="view-email-btn" type="submit" name="view-email-btn" value="<?php echo $key["id"]; ?>"><h6><?php echo $key["sender_first_name"]." ".$key["sender_last_name"]; ?></h6></button>
                                        </form>
                                        <p><?php echo substr($key["email_body"], 0, 100)."..."; ?></p>
                                    </div>
                                    <div class="time-and-attach">
                                        <p>5h</p>
                                        <div class="attach"><i class="fa-solid fa-paperclip"></i></div>
                                    </div>
                                </div>
                                
                            <?php endforeach; ?>
                        </form>
                    </div>
            </div>
        </div>
        <div class="email-footer">
            <ul>
                <li class="pages" style="background-color: var(--orange-color); color : white;">1</li>
                <li class="pages">2</li>
                <li class="pages">3</li>
            </ul>
        </div>
    </section>
    <section class="preview-container">
        <?php foreach($email_list as $elem): ?>
            <?php if($elem["id"] == $view_email): ?>
                <div class="preview-header">
                    <div class="preview-title">
                        <h1>Preview</h1>
                    </div>
                    <div class="preview-notifications">
                        <form action="" method="post">
                            <div class="preview-icon">
                                <button class="view-email-icon" name="delete-btn" value="<?php echo $elem["id"]; ?>" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                            <div class="preview-icon">
                                <button class="view-email-icon" type="submit"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></button>   
                            </div>
                            <div class="preview-icon">
                                <button class="view-email-icon" type="submit"><i class="fa-solid fa-circle-xmark"></i></button>  
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="view-email-header">
                        <div class="sender-details">
                            <h6><?php echo $elem["email_title"]; ?></h6>
                            <p><?php echo $elem["email_date"]; ?></p>
                        </div>
                        <form action="" method="post">
                            <div class="sender-notification">
                                <form action="" method="post">
                                    <div class="sender-icon">    
                                        <button class="view-email-icon" type="submit" name="favorite-btn" value="<?php echo $elem["id"]; ?>"><i class="fa-solid fa-star"></i></button>
                                    </div>
                                    <div class="sender-icon">
                                        <button class="view-email-icon" type="submit"><i class="fa-solid fa-circle-exclamation"></i></button>   
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="email-contents">
                        <div class="sender-profile">
                            <div class="profile-pic">

                            </div>
                            <div class="profile-name">
                                <h5 style="color: black;"><?php echo $elem["sender_first_name"]." ".$elem["sender_last_name"]; ?></h5>
                                <p style="font-size: 15px;"><?php echo $elem["sender_email"]; ?></p>
                            </div>
                        </div>
                        <div class="email-body">
                            <p>Hello Madison</p><br>
                            <p><?php echo $elem["email_body"]; ?></p><br>
                            <p>Regards,</p>
                            <p><?php echo $elem["sender_first_name"] ;?></p>
                        </div>
                        <div class="attachments">
                            <div class="img-attach">
                                <div class="img-name"><i class="fa-solid fa-paperclip"></i> IMG-001.jpg</div>
                            </div>
                            <div class="img-attach">
                                <div class="img-name"><i class="fa-solid fa-paperclip"></i> IMG-002.jpg</div>
                            </div>
                        </div>
                    </div>
                <div class="reply-container">
                    <div class="reply-tools">
                        <textarea name="reply-email" placeholder="Write your message here..."></textarea>
                        <div class="text-tools">
                            <div class="foont-tools">
                                <ul>
                                    <li class="tools"><i class="fa-solid fa-bold"></i></li>
                                    <li class="tools"><i class="fa-solid fa-italic"></i></li>
                                    <li class="tools"><i class="fa-solid fa-underline"></i></li>
                                    <li class="tools"><i class="fa-solid fa-text-height"></i></li>
                                </ul>
                            </div>
                            <div class="align-tools">
                                <ul>
                                    <li class="tools"><i class="fa-solid fa-align-left"></i></li>
                                    <li class="tools"><i class="fa-solid fa-align-center"></i></li>
                                    <li class="tools"><i class="fa-solid fa-align-right"></i></li>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="send-container">
                    <div class="send-tools">
                        <ul>
                            <li class="send-icons"><i class="fa-solid fa-paperclip"></i></li>
                            <li class="send-icons"><i class="fa-solid fa-image"></i></li>
                            <li class="send-icons"><i class="fa-solid fa-ellipsis"></i></li>
                        </ul>
                    </div>
                    <div class="send-button">
                        <button class="send" type="submit" name="send">Send <i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>
    
</body>
</html>