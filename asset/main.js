console.log("Hello world!");


function goregist(){
    var loginpage = document.getElementById('countainer-login')
    var registpage = document.getElementById('countainer-regist')

    loginpage.style.display= 'none'
    registpage.style.display= 'block'
}

function gologin(){
    var loginpage = document.getElementById('countainer-login')
    var registpage = document.getElementById('countainer-regist')

    loginpage.style.display= 'block'
    registpage.style.display= 'none'
}

// register
$(document).ready(function() {

    $(".btn-primary").click( function() {
    
      var fullname = $("#fullname").val();
      var username = $("#username").val();
      var password = $("#password").val();
    
      if (fullname.length == "") {
    
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Nama Lengkap Wajib Diisi !'
        });
    
      } else if(username.length == "") {
    
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Username Wajib Diisi !'
        });
    
      } else if(password.length == "") {
    
        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Password Wajib Diisi !'
        });
    
      }else {
    
        //ajax
        $.ajax({
    
          url: "sistem-register.php",
          type: "POST",
          data: {
              "fullname": fullname,
              "username": username,
              "password": password
          },
    
          success:function(response){
    
            if (response == "success") {

              var waktu;
              waktu=setTimeout(profil,3000)
              function profil(){
              var loginpage = document.getElementById('countainer-login')
              var registpage = document.getElementById('countainer-regist')
          
              loginpage.style.display= 'block'
              registpage.style.display= 'none'
              }


    
              Swal.fire({
                type: 'success',
                title: 'Register Berhasil!',
                text: 'silahkan login!'
              });
    
              $("#fullname").val('');
              $("#username").val('');
              $("#password").val('');
    
            } else {
    
              Swal.fire({
                type: 'error',
                title: 'Register Gagal!',
                text: 'silahkan coba lagi!'
              });
    
            }
    
            console.log(response);
    
          },
    
          error:function(response){
              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });
          }
    
        })
    
      }
    
    }); 
    
    });


// onload

// login
$(document).ready(function() {

    $(".btn-login").click( function() {
    
      var username = $("#username-login").val();
      var password = $("#password-login").val();
      // var color = document.getElementById('color').value

      if(username.length == "") {

        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Username Wajib Diisi !'
        });

      } else if(password.length == "") {

        Swal.fire({
          type: 'warning',
          title: 'Oops...',
          text: 'Password Wajib Diisi !'
        });

      } else {

        $.ajax({

          url: "sistem-login.php",
          type: "POST",
          data: {
              "username": username,
              "password": password
          },

          success:function(response){

            if (response == "success") {
                
              Swal.fire({
                type: 'success',
                title: 'Login Berhasil!',
                text: 'Welcome Back ' + username,
                timer: 5000,
                showCancelButton: false,
                showConfirmButton: false
              })
              
              .then (function() {
                window.location.href = "game.php";
                // document.getElementById('outputnama').appened(username)  
              });

            } else {

              Swal.fire({
                type: 'error',
                title: 'Login Gagal!',
                text: 'silahkan coba lagi!'
              });

            }

            console.log(response);

          },

          error:function(response){

              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });

              console.log(response);

          }

        });

      }

    });

  });


// start
function start(){
  var menugame = document.getElementById('game-menuu')
  var divgame = document.getElementById('gamenya')
  var warnacolor = document.getElementById('color').value

  document.getElementById("bebas").style.color= warnacolor


  menugame.style.display= 'none'
  divgame.style.display= 'block'

  startGame()

}

function exit(){
  var menugamee = document.getElementById('game-menuu')
  var divgame = document.getElementById('gamenya')

  menugamee.style.display= 'block'
  divgame.style.display= 'none'
}

function tryagain(){
  myGameArea.stop();
  myGameArea.clear();
  startGame();



}
  
  // var myGamePiece;
  // var myObstacles = [];
  // var myScore;
  
  // function startGame() {
  //     myGamePiece = new component(30, 30, "red", 10, 120);
  //     myScore = new component("30px", "Consolas", "black", 280, 40, "text");
  //     myGameArea.start();
  // }
  
  // var myGameArea = {
  //     canvas : document.createElement("canvas"),
  //     start : function() {
  //         this.canvas.width = 480;
  //         this.canvas.height = 270;
  //         this.context = this.canvas.getContext("2d");
  //         document.getElementById('tempatgame').insertBefore(this.canvas, document.getElementById('tempatgame').childNodes[0]);
  //         this.frameNo = 0;
  //         this.interval = setInterval(updateGameArea, 20);
  //        window.addEventListener('keydown', function (e) {
  //       myGameArea.keys = (myGameArea.keys || []);
  //       myGameArea.keys[e.keyCode] = true;
  //     })
  //     window.addEventListener('keyup', function (e) {
  //       myGameArea.keys[e.keyCode] = false;
  //     })
  //         },
  //     clear : function() {
  //         this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  //     },
  //     stop : function() {
  //         clearInterval(this.interval);
  //     }
  // }
  
  // function component(width, height, color, x, y, type) {
  //     this.type = type;
  //     this.width = width;
  //     this.height = height;
  //     this.speedX = 0;
  //     this.speedY = 0;    
  //     this.x = x;
  //     this.y = y;    
  //     this.update = function() {
  //         ctx = myGameArea.context;
  //         if (this.type == "text") {
  //             ctx.font = this.width + " " + this.height;
  //             ctx.fillStyle = color;
  //             ctx.fillText(this.text, this.x, this.y);
  //         } else {
  //             ctx.fillStyle = color;
  //             ctx.fillRect(this.x, this.y, this.width, this.height);
  //         }
  //     }
  //     this.newPos = function() {
  //         this.x += this.speedX;
  //         this.y += this.speedY;        
  //     }
  //     this.crashWith = function(otherobj) {
  //         var myleft = this.x;
  //         var myright = this.x + (this.width);
  //         var mytop = this.y;
  //         var mybottom = this.y + (this.height);
  //         var otherleft = otherobj.x;
  //         var otherright = otherobj.x + (otherobj.width);
  //         var othertop = otherobj.y;
  //         var otherbottom = otherobj.y + (otherobj.height);
  //         var crash = true;
  //         if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
  //             crash = false;
  //         }
  //         return crash;
  //     }
  // }
  
  // function updateGameArea() {
  //     var x, height, gap, minHeight, maxHeight, minGap, maxGap;
  //     for (i = 0; i < myObstacles.length; i += 1) {
  //         if (myGamePiece.crashWith(myObstacles[i])) {
  //             myGameArea.stop();
  //             return;
  //         } 
  //     }
  //   myGamePiece.speedX = 0;
  //   myGamePiece.speedY = 0;
  //   if (myGameArea.keys && myGameArea.keys[37]) {myGamePiece.speedX = -1; }
  //   if (myGameArea.keys && myGameArea.keys[39]) {myGamePiece.speedX = 1; }
  //   if (myGameArea.keys && myGameArea.keys[38]) {myGamePiece.speedY = -1; }
  //   if (myGameArea.keys && myGameArea.keys[40]) {myGamePiece.speedY = 1; }
  //     myGameArea.clear();
  //     myGameArea.frameNo += 1;
  //     if (myGameArea.frameNo == 1 || everyinterval(150)) {
  //         x = myGameArea.canvas.width;
  //         minHeight = 20;
  //         maxHeight = 200;
  //         height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
  //         minGap = 50;
  //         maxGap = 200;
  //         gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
  //         myObstacles.push(new component(10, height, "green", x, 0));
  //         myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
  //     }
  //     for (i = 0; i < myObstacles.length; i += 1) {
  //         myObstacles[i].speedX = -1;
  //         myObstacles[i].newPos();
  //         myObstacles[i].update();
  //     }
  //     myScore.text="SCORE: " + myGameArea.frameNo;
  //     myScore.update();
  //     myGamePiece.newPos();    
  //     myGamePiece.update();
  // }
  
  // function everyinterval(n) {
  //     if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
  //     return false;
  // }
  
  // function clearmove() {
  //     myGamePiece.speedX = 0; 
  //     myGamePiece.speedY = 0; 
  // }
  
    
// $(document).ready(function() {

//     $(".btn-login").click( function() {
    
//       var username = $("#username").val();
//       var password = $("#password").val();

//       if(username.length == "") {

//         Swal.fire({
//           type: 'warning',
//           title: 'Oops...',
//           text: 'Username Wajib Diisi !'
//         });

//       } else if(password.length == "") {

//         Swal.fire({
//           type: 'warning',
//           title: 'Oops...',
//           text: 'Password Wajib Diisi !'
//         });

//       } else {

//         $.ajax({

//           url: "cek-login.php",
//           type: "POST",
//           data: {
//               "username": username,
//               "password": password
//           },

//           success:function(response){

//             if (response == "success") {

//               Swal.fire({
//                 type: 'success',
//                 title: 'Login Berhasil!',
//                 text: 'Anda akan di arahkan dalam 3 Detik',
//                 timer: 3000,
//                 showCancelButton: false,
//                 showConfirmButton: false
//               })
//               .then (function() {
//                 window.location.href = "dashboard.php";
//               });

//             } else {

//               Swal.fire({
//                 type: 'error',
//                 title: 'Login Gagal!',
//                 text: 'silahkan coba lagi!'
//               });

//             }

//             console.log(response);

//           },

//           error:function(response){

//               Swal.fire({
//                 type: 'error',
//                 title: 'Opps!',
//                 text: 'server error!'
//               });

//               console.log(response);

//           }

//         });

//       }

//     });

//   });
