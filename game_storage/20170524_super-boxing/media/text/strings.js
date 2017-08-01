var _STRINGS = {
	"Ad":{
		"Mobile":{
			"Preroll":{
				"ReadyIn":"The game is ready in ",
				"Loading":"Your game is loading...",
				"Close":"Close",
			},
			"Header":{
				"ReadyIn":"The game is ready in ",
				"Loading":"Your game is loading...",
				"Close":"Close",
			},
			"End":{
				"ReadyIn":"Advertisement ends in ",
				"Loading":"Please wait ...",
				"Close":"Close",
			},								
		},
	},
	
	"Splash":{
		"Loading":"LOADING",	
		"LogoLine1":"Some text here",
		"LogoLine2":"powered by MarketJS",
		"LogoLine3":"none",						
	},

	"Game":{
		"SelectPlayer":"Select Player",
		"Win":"You win!",
		"Lose":"You lose!",
		"Score":"Score",
		"Time":"Time",
		"Round":"ROUND"
	},

	"Results":{
		"Title":"High score",
	},	
};

var _SPRITESHEETS_DATA = {
	'GUI': {
		path: 'media/graphics/sprites/button.png',
		texture: {
			'win-set-W': { x: 239, y: 44, w: 78, h: 78 },
			'win-set-I': { x: 318, y: 44, w: 32, h: 78 },
			'win-set-N': { x: 350, y: 44, w: 62, h: 78 },
			'win-set-!': { x: 413, y: 44, w: 30, h: 78 },
			'lose-set-L': { x: 224, y: 122, w: 54, h: 78 },
			'lose-set-O': { x: 278, y: 122, w: 57, h: 78 },
			'lose-set-S': { x: 335, y: 122, w: 59, h: 78 },
			'lose-set-E': { x: 395, y: 122, w: 54, h: 78 },
			'fight-set-F': { x: 5, y: 216, w: 42, h: 52 },
			'fight-set-I': { x: 48, y: 216, w: 28, h: 52 },
			'fight-set-G': { x: 78, y: 216, w: 47, h: 52 },
			'fight-set-H': { x: 125, y: 216, w: 44, h: 52 },
			'fight-set-T': { x: 170, y: 216, w: 47, h: 52 },
			'fight-set-!': { x: 217, y: 216, w: 20, h: 52 },
			'number-set-0': { x: 0, y: 1, w: 35, h: 44 },
			'number-set-1': { x: 37, y: 1, w: 24, h: 44 },
			'number-set-2': { x: 61, y: 1, w: 35, h: 44 },
			'number-set-3': { x: 99, y: 1, w: 34, h: 44 },
			'number-set-4': { x: 137, y: 1, w: 34, h: 44 },
			'number-set-5': { x: 172, y: 1, w: 31, h: 44 },
			'number-set-6': { x: 206, y: 1, w: 36, h: 44 },
			'number-set-7': { x: 243, y: 1, w: 34, h: 44 },
			'number-set-8': { x: 277, y: 1, w: 35, h: 44 },
			'number-set-9': { x: 312, y: 1, w: 36, h: 44 },
			'number-set-,': { x: 348, y: 1, w: 14, h: 16 },
			'powerup': { x: 360, y: 228, w: 86, h: 86 },
			'left-tap': { x: 457, y: 4, w: 76, h: 76 },
			'hold': { x: 457, y: 85, w: 76, h: 76 },
			'right-tap': { x: 457, y: 167, w: 76, h: 76 },
			'timer': { x: 0, y: 269, w: 310, h: 17 },
			'hp01': { x: 121, y: 294, w: 121, h: 8 },
			'hp02': { x: 121, y: 286, w: 121, h: 8 },
			'hp03': { x: 0, y: 294, w: 121, h: 8 },
			'hp04': { x: 0, y: 286, w: 121, h: 8 },
			'timer-number-9': { x: 325, y: 229, w: 5, h: 7 },
			'timer-number-8': { x: 316, y: 229, w: 5, h: 7 },
			'timer-number-7': { x: 307, y: 229, w: 5, h: 7 },
			'timer-number-6': { x: 298, y: 229, w: 5, h: 7 },
			'timer-number-5': { x: 289, y: 229, w: 5, h: 7 },
			'timer-number-4': { x: 280, y: 229, w: 5, h: 7 },
			'timer-number-3': { x: 271, y: 229, w: 5, h: 7 },
			'timer-number-2': { x: 262, y: 229, w: 5, h: 7 },
			'timer-number-1': { x: 253, y: 229, w: 5, h: 7 },
			'timer-number-0': { x: 244, y: 229, w: 5, h: 7 },
			'next-button': { x: 2, y: 49, w: 214, h: 47 },
			'start-button': { x: 2, y: 100, w: 182, h: 47 },
			'sfx-button-on': { x: 2, y: 315, w: 214, h: 47 },
			'bgm-button-off': { x: 242, y: 315, w: 214, h: 47 },
			'sfx-button-off': { x: 2, y: 365, w: 214, h: 47 },
			'bgm-button-on': { x: 242, y: 365, w: 214, h: 47 },
			'timeout': { x: 432, y: 4, w: 24, h: 24 },
			'main-menu-button': { x: 9, y: 417, w: 137, h: 47 },
			'retry-button': { x: 175, y: 417, w: 137, h: 47 },
			'your-score': { x: 236, y: 199, w: 220, h: 27 },
		}
	},
	'result': {
		path: 'media/graphics/sprites/result.jpg',
		texture: {
			'win': { x: 0, y: 0, w: 480, h: 395 },
			'lose': { x: 0, y: 395, w: 480, h: 395 }
		}
	},
	'btn_more_games': {
		path: 'media/graphics/sprites/btn_more_games.png',
		texture: {
			'btn_more_games': { x: 0, y: 0, w: 103, h: 59 },
		}
	}
};
