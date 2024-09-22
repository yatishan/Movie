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
            background-color:rgba(0, 9, 33, 0.96);
        } 
       
        .main-div{
            width: 100%;
            display: flex;
            justify-content: center;
            /* background-color:rgba(32, 32, 49, 0.94); */
            background-color: #27374D;
            padding: 25px 0px;
            position: fixed;
            top:0;  
            z-index: 1;
        }
        .inner-div{
            display: flex;
            justify-content:space-evenly;
        }
        .inner-div > div >div{
            margin: 0px 10px;
        }
        .inner-div > div > div >a{
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .inner-div > div > div > a:hover{
            color:rgba(32, 133, 49, 0.94)!important;
        }
        /* h1{
            animation: appear linear;
            animation-timeline: view();
        } */
        .card-div{
            margin: 10px;
            display: grid;
            grid-template-columns:24.5% 24.5% 24.5% 24.5%;
            gap:10px;
            /* animation: appear linear;
            animation-timeline: view();
            animation-range: entry 0; */
        }
       
        @keyframes appear{
            from{
                opacity: 0;
                scale: 0.9;
            }
            to{
                opacity: 1;
                scale: 1;
            }
        }
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
    include('../db_connection.php');
    ?>
    <div>
        <div class="main-div">
           <div class="inner-div">
            <div style="display:flex;">
                <div><a href="index.php?tab=home" style="color:<?php
                echo $tab=='home'?"#059212":"white";
                ?> ;">Home</a></div>
                <div><a href="about.php?tab=about" style="color:<?php
                echo $tab=='about'?"#059212":"white";
                ?> ;">About</a></div>
                <div><a href="#" style="color:<?php
                echo $tab=='contact'?"#059212":"white";
                ?> ;">Contact</a></div>
                <div><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></div>    
            </div>
           </div>
           <!-- <input type="search" name="" id="" class="" placeholder="search..."> -->
        </div>
    </div>
