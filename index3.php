<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    body{
            box-sizing: border-box;
            padding: 0%;
            margin: auto;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            font-family: "Roboto Slab", serif;
            text-shadow: 0 2px 2px rgba(211, 63, 63, 0.966);
            overflow: auto;
            
    }

     img{
            width:100%;
            height: 800px;
            filter: blur(2px) brightness(150%) saturate(100%);
           
        }

        .container{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-auto-columns: minmax(300px, auto);
            grid-gap: 90px;
            position: absolute;
            top:100px;
            left:25%;
        }

    .container1, .container2 {
        z-index: 1;
        border:1px solid rgb(0, 0, 0) !important;
        background: linear-gradient(-39deg, rgb(0, 204, 255), rgb(197, 137, 221)) !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.671), 0 6px 20px 0 rgba(0, 0, 0, 0.678);
        padding:20px;
        margin: auto;
        }

    input{
        display: block;
        padding: 10px;
        margin: 10px;

    }

    .clearfix{
        z-index: 9999;
        position:absolute;
        top:500px;
        left:45%;
    }

    button{
        color: black;
        background: rgb(255, 51, 255);
        padding: 20px;
        margin:20px;
        border:none;
        border-radius:10px;
        cursor:pointer;
       
    }

    button:hover{
            color:black;
            background-color: rgb(17, 247, 197);
            cursor: pointer;
        }

    .inp{
            cursor: not-allowed;
        }

</style>

<body>
<?php
$_pkgg=$_POST['pkgg'];
$_hotel=$_POST['hotel'];
?>
    <div class="image">
        <img src="pic1.jpg">
    </div>
        <div class="container">
        
                <form action="final.php" method="POST">
                        
                        <div class="container1">
                            
                            <label for="hotel id"><b>Hotel Id</b></label>
                            <input type="text" class="inp" name="hotelid" value="<?php echo @$_hotel; ?>"required readonly>
        
                            <label for="phone"><b>Phone</b></label>
                            <input type="tel" placeholder="Enter Phone no." name="phone" required>
        
                            <label for="package no"><b>Package number</b></label>
                            <input type="text" class="inp" name="pkgno" value="<?php echo @$_pkgg; ?>" required readonly>
                                
                            <label for="Date"><b>Date</b></label>
                            <input type="date" name="date" required>
                      
                            <label for="ppl"><b>Number of People</b></label>
                            <input type="number" placeholder="Enter no. of Adults" name="noppl" required>
                            
                            <label for="days"><b>Number of days</b></label>
                              <input type="number" name="nodays" placeholder="Enter no. of Days"/>
                            
                            <button type="submit" class="signupbtn"><b>Submit</b></button>
                </form>
                        </div>
                        <script type="text/javascript">
                            var today=new Date().toISOString().split('T')[0];
                            document.getElementsByName("date")[0].setAttribute('min',today);
                        </script> 
            </div>
                        
                      
    
</body>
</html>