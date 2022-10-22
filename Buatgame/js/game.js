setGame("1200x600");
game.folder = "assets";
//file gambar yang dipakai dalam game
var gambar = {
	logo:"logo.png",
	startBtn:"tombolStart.png",
	cover:"FTqdURXakAEeMLv.jpg",
	playBtn:"btn-play.png",
	maxBtn:"maxBtn.png",
	minBtn:"minBtn.png",
	idle :"MainCharacter.png"
}
//file suara yang dipakai dalam game
var suara = {
}

//load gambar dan suara lalu jalankan startScreen
loading(gambar, suara, startScreen);

function startScreen(){	
	hapusLayar("black");
	tampilkanGambar(dataGambar.logo, 600, 250);
	var startBtn = tombol(dataGambar.startBtn, 600, 400);
	if (tekan(startBtn)){
		setAwal()
		jalankan(gameLoop);
	}
	resizeBtn(1150,50);
}
// function halamanCover(){
// 	hapusLayar();
// 	gambarFull(dataGambar.cover);
// 	var playBtn = tombol(dataGambar.playBtn, 1100, 500);
// 	if (tekan(playBtn)){
// 		setAwal();
// 		jalankan(gameLoop);
// 	}	
	
// }

function setAwal(){
	game.hero = setSprite (dataGambar.idle, 40,40);
	game.skalaSprite= 2;
	game.hero.x = 800;
	game.hero.y = 268;
	game.lantai = 300;
	game.lompat = false;
}

function gameLoop(){
	hapusLayar("black");	
	if (!game.lompat){
		if (game.kanan){
			game.hero.img = dataGambar.idle;
			game.hero.skalaX = 1;
			game.hero.x += 3;
		}else if (game.kiri) {
			game.hero.img = dataGambar.idle;
			game.hero.skalaX = -1;
			game.hero.x -= 3;
		}else{
			game.hero.img = dataGambar.idle;
		}
		if (game.atas){
			game.lompat = true;
			game.hero.img = dataGambar.idle;
			game.lompatY = -10;
		}
	}else{
			game.lompatY+= 0.5;
			if (game.lompatY>0) game.hero.img = dataGambar.idle;
			game.hero.y+=game.lompatY;
			if (game.kanan){
				game.hero.skalaX = 1;
				game.hero.x += 3;
			}else if (game.kiri){
				game.hero.skalaX = -1;
				game.hero.x -= 3;
			}
			if (game.hero.y>=game.lantai-32){
				game.hero.y = game.lantai - 32;
				game.lompat = false;
			}
	}
	loopSprite(game.hero);
}