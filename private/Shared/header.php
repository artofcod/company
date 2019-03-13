<?php if(!isset($caption)){$caption = ' Profile';}?>
<?php if(!isset($page_titel)){$page_titel = 'Profle';}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_titel?></title>
    <style>
        *{
            margin:0px;
            padding:0px;
            font-family:calibri;
            list-style:none;
        }
        .container{
            width: 85%;
            padding: 20px;
            margin: auto;
        }
        .header,footer{
            width:100%;
            text-align:center;
            box-sizing:border-box;
            background:rgb(212, 212, 212);

        }
        .header{
            color:white;
            background:rgb(113, 10, 10);
            padding:30px;
            font-style:underlne;    
        }
        .header h2{
            font-size:25px;
            text-decoration:underline;
            font-weight:bold;
        }
        .viewTable{
            margin-bottom:25px;
        }
        ul,nav{
            padding:5px 50px;
            margin-bottom:20px;
        }
        nav{
            background:rgb(212, 212, 212);  
        }
        nav a{
            padding: 0px 20px;
            font-size: 18px;
            text-decoration:none;
        }
        .view{
            margin:20px 130px;
            border:1px dashed gray;
            padding:20px;
            border-radius:10px;
            background:rgb(253, 234, 246);
        }
        .form{
            margin:20px 130px;
            padding:20px;
        }
        .form-group{
            margin:10px;
        }
        .form-group input, button ,.form-group textarea{
            padding:5px;
            font-size:18px;
            border-radius:4px;
            border:1px solid #969595;
        }
        .item{
            color:blue;
            font-weight:bold;
        }

        /* Errors */

        .errors {
        display: inline-block;
        border: 2px solid red;
        color: red;
        padding: 1em;
        margin-bottom: 1em;
        }

        .errors ul {
        margin-bottom: 0;
        padding-left: 1em;
        }

        /* Session Messages */

        .message {
        color: #0B61A5;
        background: white;
        border: 2px solid #0B61A5;
        padding: 1em 15px;
        margin: 1em 30px;
        width: 890px;
        }
        
        #message {
        color: #0B61A5;
        background: white;
        border: 2px solid #0B61A5;
        padding: 1em 15px;
        margin: 1em 30px;
        width: 890px;
}
    </style>
</head>
<body >
    <div class="header">
        <h2>Aspire backend</h2>
        <h3><?php echo $caption?></h3>
    </div>
    <?php $display;
    if($caption == "Login")
    {
        $display = 'style="display: none;';
    }else{
        $display = 'style="display: block;';
    }
    ?>

    <nav <?php //echo $display ;?> >
    <?php if($session->is_logged_in()) { ?>
        <a href="<?php echo url_for('index.php');?>">Menu</a>
        <a href="<?php echo url_for("logout.php"); ?>">Logout</a>
        <p style="float:right;display:inline-block;">User :<?php echo $session->username;?> </p>
        <?php } ?>
    </nav>

    <?php echo display_session_message();?>