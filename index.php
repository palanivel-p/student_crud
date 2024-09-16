<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Of Techies</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="192x192" href="https://logicresearchlabs.com/wp-content/uploads/2022/01/Logic-Research-Labs-2.svg" alt="Logic Research Labs">
</head>
<style>

 .main_container {
    height: 100vh;
    width: 100%;
    background: url(https://images.pexels.com/photos/1933900/pexels-photo-1933900.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
  background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
 }
    .div_img_container img {
     width: 200px;
     height: auto;
     margin-bottom: 20px;
     position: relative;
     left: 35px;
    }
    .div_btn_container button{
       width: 130px;
       height: 40px;
       max-width: 250px;
       margin: 5px;
       padding: 3px;
       background: rgb(0, 0, 0,0.3);
       color: #fff9f9;
    }
    .div_btn_container button:hover {
        cursor: pointer;
        animation: btnAn 1s ease-in-out;
    }
    @keyframes btnAn {
        0%{
            transform: rotateX(0deg);
            /* transform: scale(1.2); */
        }
        100% {
            transform: rotateX(360deg);
        }
    }
</style>
<body>
    
<div class="main_container">
    <div>
        <div class="div_img_container">
            <img src="https://logicresearchlabs.com/wp-content/uploads/2022/01/Logic-Research-Labs-2.svg" alt="Logic Research Labs">
           </div>
           <div class="div_btn_container">
              <a href="register/">
                <button>Sign up</button>

              </a>
              <a href="login/">
                <button>Login</button>

              </a>
              
         
           </div>
    </div>
 
</div>

</body>
</html>