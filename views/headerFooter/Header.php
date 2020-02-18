<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <!--         Global site tag (gtag.js) - Google Analytics 
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-59815011-1"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());
        
                    gtag('config', 'UA-59815011-1');
                </script>-->


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $this->pageTitle ?></title>

        <!-- Bootstrap V4.0 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

        <!-- Custom Styles -->
        
        <!--<link href="/public/css/custom.css" rel="stylesheet" type="text/css"/>-->
<!--        <link href="/public/css/master.css" rel="stylesheet" type="text/css"/>-->
        <link href="/public/css/temp.css" rel="stylesheet" type="text/css"/>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <!-- Bootstrap V4.0 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- JQuery Plugins -->
        <script src="/public/js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="/public/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/public/js/additional-methods.min.js" type="text/javascript"></script>
        
<!--        summernote 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>-->
        
        <!--TinyMCE-->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=q5bl8yojrstcsaaos8i7t3rv9c05aupbtoosnx7kwhomaut6"></script> 
        
        <?php
        
            if(isset($this->css)){
                foreach ($this->css as $css){
                    echo $css;
                }
            }
            
        ?>
       
    </head>

    <body>

        <?php require 'views/Menu/Menu.php'; ?>









