<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            background-color: black;
        }
       
        .main-div{
            width: 40%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            background-color:rgba(10, 10, 13, 0.5);
            margin-top: 30px;
            padding: 10px 0px;
            border: 1px solid gray;
            border-radius: 15px;
        }
        .inner-div{
            display: flex;
            justify-content:space-evenly;
        }
        .inner-div > div{
            margin: 0px 10px;
        }
        .inner-div > div >a{
            text-decoration: none;
            color: white;
            font-size: 18px;
        }
        /* h1{
            animation: appear linear;
            animation-timeline: view();
        } */
        .card-div{
            margin: 10px;
            display: grid;
            grid-template-columns:24% 24% 24% 24%;
            gap:20px;
            /* animation: appear linear;
            animation-timeline: view();
            animation-range: entry 0; */
        }
       
        /* @keyframes appear{
            from{
                opacity: 0;
                scale: 0.8;
            }
            to{
                opacity: 1;
                scale: 1;
            }
        } */
        @media (max-width:900px){
            .card-div{
            grid-template-columns:33% 33% 33%;
            }

        } 
        @media (max-width:600px){
            .card-div{
            grid-template-columns:49% 49%;
            }

        } 
    </style>
</head>
<body>
    <?php 
    $tab=$_GET['tab'];
    ?>
    <div>
        <div class="main-div">
           <div class="inner-div">
            <div><a href="index.php?tab=home" style="color:<?php
            echo $tab=='home'?"#C40C0C":"white";
            ?> ;">Home</a></div>
            <div><a href="about.php?tab=about" style="color:<?php
            echo $tab=='about'?"#C40C0C":"white";
            ?> ;">About</a></div>
            <div><a href="contact.php?tab=contact" style="color:<?php
            echo $tab=='contact'?"#C40C0C":"white";
            ?> ;">Contact</a></div>
            <div><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></div>
           </div>
           <!-- <input type="search" name="" id="" class="" placeholder="search..."> -->
        </div>
    </div>
