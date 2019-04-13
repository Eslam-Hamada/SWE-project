<?php
  include(//Database of user class);
  include(//login user class);

  $username = "";
  $isfollowing = False;


  if(isset($_GET['username'])) {

    if(DB::query('SELECT username FROM users  WHERE username=:username', array(':username'=>$_GET['username']))){

      username=DB::query('SELECT username FROM users  WHERE username=:username', array(':username'=>$_GET['username'])))[0]['username']
      //users for the table in database from user component
      $userid=DB::query('SELECT id from users  WHERE username=:username' , array(':username'=>$_GET['username']))[0][id]

      $followerid=Login::isloggedIn(); // login is the file of user component



      if(isset($_POST['follow'])){

        //to prevent the user from following  him self
        if($userid != $followerid)
        {
           if(!DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid )) {
              DB::query('INSERT INTO followers VALUES (\'\',:userid, :followerid)',  array(':userid'=>$userid  ',followerid'=>$followerid ));
            }
            else {
              //echo 'Already Following!';
                $isfollowing=True;
        }
        if(isset($_POST['unfollow'])){
          //to prevent the user from following  him self
          if($userid != $followerid)
          {
              if(DB::query('SELECT follower_id FROM followers WHERE user_id=:userid', array(':userid'=>$userid )) {
                DB::query('DELTE FROM followers WHERE user_id=:userid AND follower_id=followerid',  array(':userid'=>$userid  ',followerid'=>$followerid ));
                }

                $isfollowing=False;
          }

      }
    }


    }else  {
      die('User Not found!');
    }
  }
?>
<h1><?php echo $username ;  ?>'s profile</h1>
<form action="profile.php?username=<?php echo $username; ?>" method="post">
     <?php
     if($userid!=$followerid){
       if ($isFollowing){
         echo '<input type ="submit" name="unfollow"  value="Unfollow">';
       }
       else {
          echo '<input type ="submit" name="follow"  value="Follow">';
       }
}






 ?>
