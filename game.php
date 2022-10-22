<?php
session_start();
include 'koneksi.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="asset/main.js"></script> 
    <link rel="stylesheet" href="asset/style.css">

    <style>
        canvas{
    border: 1px solid transparent;
    background-color: #d3d3d3;
    width: 650px;
}

    </style>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;900&display=swap" rel="stylesheet">
</head>
<body style=" background-size:cover; background-attachment: fixed; background-image: url(asset/img/bglogin.gif);">
    <!-- <a href="logout.php">logout</a> -->
    <br>
    <label class="title" style=" font-weight: bold;">FROG ADVENTURE</label>


    <div class="game-menuu" id="game-menuu">
        <div class="isi-left2">
            <img src="asset/img/Frog Games.png" alt="">
        </div>
        <div class="menu-menu">
            <h3 style="margin-left: ; color: #11998e;">PIXEL BOX</h2>
            <br>
        </div>  
        <div class="isi-menu">
        <div style="margin-left:15px;">

            <div style="margin-left: 15px;">
                <P style="color: #11998e;">PLAYER : <span id="hasilnama" class="upper"><?php echo $_SESSION ['username']?></span> <span> #<?php echo $_SESSION ['id']?></span></P>

                <label for="" style="color:#11998e;">Pilih Warna :</label>
                <input type="color" id="color">
            </div>
            <br><br> <br> <br>
            <a href="logout.php"><button style=" margin-left: 15px;  float: left; background: linear-gradient(to right, #11998e, #38ef7d); border: none; border-radius: 10px; color: white; width: 120px; height: 35px; font-weight: bold;">logout</button> </a>
            <button onclick="start()" style=" margin-left: px;  float: right; background: linear-gradient(to right, #11998e, #38ef7d); border: none; border-radius: 10px; color: white; width: 120px; height: 35px; font-weight: bold;">START</button>
        </div>
            
        </div>
        </div>
    </div>

    

    <div class="gamenya" id="gamenya">
    <P id="bebas" style="position: absolute;">PLAYER : <span id="hasilnama" class="upper"><?php echo $_SESSION ['username']?></span> <span> #<?php echo $_SESSION ['id']?></span></P>
        <div class="tempatgame" id="tempatgame"></div>
        
        <div style="display:flex; margin-left: 28%; margin-top: 20px;">
        <button id="btn-try" onclick="tryagain()" style=" display: none; float: right; background: linear-gradient(to right, #11998e, #38ef7d); border: none; border-radius: 10px; color: white; width: 120px; height: 35px; font-weight: bold;">Try Again</button>
        <button id="btn-exit" onclick="exit()" style=" display: none; margin-left: 55px;  float: right; background: linear-gradient(to right, #11998e, #38ef7d); border: none; border-radius: 10px; color: white; width: 120px; height: 35px; font-weight: bold;">Exit</button>
        </div>
    </div>

    <div class="footer">
    <p>© 2022 PIXEL GAMES. CREATED BY ZANCO.</p>
    </div>




    <script src="asset/main.js"></script>
    <script>
    var myGamePiece;
  var myObstacles = [];
  var myScore;
  
  function startGame() {
      myGamePiece = new component(30, 30, color.value, 10, 120);
      myScore = new component("70%", "Consolas", "black", 390, 20, "text");
      myGameArea.start();
      myObstacles = [];
  }
  
  var myGameArea = {
      canvas : document.createElement("canvas"),
      start : function() {
          this.canvas.width = 480;
          this.canvas.height = 240;
          this.context = this.canvas.getContext("2d");
          document.getElementById('tempatgame').insertBefore(this.canvas, document.getElementById('tempatgame').childNodes[0]);
          this.frameNo = 0;
          this.interval = setInterval(updateGameArea, 20);
         window.addEventListener('keydown', function (e) {
        myGameArea.keys = (myGameArea.keys || []);
        myGameArea.keys[e.keyCode] = true;
      })
      window.addEventListener('keyup', function (e) {
        myGameArea.keys[e.keyCode] = false;
      })
          },
      clear : function() {
          this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
      },
      stop : function() {
          clearInterval(this.interval);
      }
  }
  
  function component(width, height, color, x, y, type) {
      this.type = type;
      this.width = width;
      this.height = height;
      this.speedX = 0;
      this.speedY = 0;    
      this.x = x;
      this.y = y;    
      this.update = function() {
          ctx = myGameArea.context;
          if (this.type == "text") {
              ctx.font = this.width + " " + this.height;
              ctx.fillStyle = color;
              ctx.fillText(this.text, this.x, this.y);
          } else {
              ctx.fillStyle = color;
              ctx.fillRect(this.x, this.y, this.width, this.height);
          }
      }
      this.newPos = function() {
          this.x += this.speedX;
          this.y += this.speedY;        
      }
      this.crashWith = function(otherobj) {
          var myleft = this.x;
          var myright = this.x + (this.width);
          var mytop = this.y;
          var mybottom = this.y + (this.height);
          var otherleft = otherobj.x;
          var otherright = otherobj.x + (otherobj.width);
          var othertop = otherobj.y;
          var otherbottom = otherobj.y + (otherobj.height);
          var crash = true;
          if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
              crash = false;
          }
          return crash;
      }
  }
  
  function updateGameArea() {
      var x, height, gap, minHeight, maxHeight, minGap, maxGap;
      for (i = 0; i < myObstacles.length; i += 1) {
          if (myGamePiece.crashWith(myObstacles[i])) {
              myGameArea.stop();
              var btntry = document.getElementById('btn-try')
            var btnexit = document.getElementById('btn-exit')

                btntry.style.display= "block";
              btnexit.style.display= "block";
              
              return;
          } 
      }
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
    if (myGameArea.keys && myGameArea.keys[37]) {myGamePiece.speedX = -1; }
    if (myGameArea.keys && myGameArea.keys[39]) {myGamePiece.speedX = 1; }
    if (myGameArea.keys && myGameArea.keys[38]) {myGamePiece.speedY = -1; }
    if (myGameArea.keys && myGameArea.keys[40]) {myGamePiece.speedY = 1; }
      myGameArea.clear();
      myGameArea.frameNo += 1;
      if (myGameArea.frameNo == 1 || everyinterval(150)) {
          x = myGameArea.canvas.width;
          minHeight = 20;
          maxHeight = 200;
          height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
          minGap = 50;
          maxGap = 200;
          gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
          myObstacles.push(new component(10, height, "green", x, 0));
          myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
      }
      for (i = 0; i < myObstacles.length; i += 1) {
          myObstacles[i].speedX = -1;
          myObstacles[i].newPos();
          myObstacles[i].update();
      }
      myScore.text="SCORE: " + myGameArea.frameNo;
      myScore.update();
      myGamePiece.newPos();    
      myGamePiece.update();
  }
  
  function everyinterval(n) {
      if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
      return false;
  }
  
  function clearmove() {
      myGamePiece.speedX = 0; 
      myGamePiece.speedY = 0; 
  }
    </script>

</body>
</html>