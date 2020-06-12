<!DOCTYPE html>
<html>
    <style>
        /* Makes it wrap all the way to the end*/
        html, body {
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: navy;
            background-color: grey;
            font-size: 35px;
            padding: 40px 40px 60px 40px;
            margin: 0px;
        }

        body {
            background-color:#dedede;
        }

        #contact {
            font-size: 20px;
            text-align: center;
            margin: -55px;
        }

        #github {
            font-size: 20px;
        }

        p {
            margin: 60px 30px 30px 60px;
        }

        #slogan {
            margin-top: 125px;
            font-size: 40px;
            text-align: center;
        }
    

        .image {
            margin-left: auto;
            margin-right: auto;
        }

        #package {
            width: 90%;
            height: 90%;
        }

        body {
            overflow-x: hidden;
        }

    </style>

    <head>
        <title>City Post</title>
    </head>

    <body>
        <h1>City Post</h1>

        <p id="contact">Email:city@post.ca | Phone: (123) 456-7890
             <br> Address: 123 Main Street Vancouver, BC, Canada </p>

        <p id="slogan">We get your packages to you!</p>

        <a href="login.php" style='margin:0 auto; display: block; width: 60%;'>
            <img id="package" class="image" src="Package.svg">
        </a>
    </body>
</html>