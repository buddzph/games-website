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
		"Loading":"Loading ...",	
		"LogoLine1":"Some text here",
		"LogoLine2":"powered by MarketJS",
		"LogoLine3":"none",						
	},

	"Game":{
		"SelectPlayer":"Select Player",
		"Win":"You win!",
		"Lose":"You lose!",
		"Score":"Score",
		"Time":"Time Left",
		"Home":"Home",
		"Battle":"Battle",
		"CardCollection":"Card Collection",
		"ReplaceCard":"Select card to be replaced",
		"Use":"Use",
		"Info":"Info",
		"Sixty":"60",
		"Thirty":"30",
		"TimeMinutes":"SECONDS",
		"LeftMinutes":"LEFT",
		"DoubleElixer":"X2 ELIXIR",
		"AdditionalSixty":"+60",
		"Extra":"EXTRA",
		"Sudden":"SUDDEN DEATH",
		"TropiExtra":"- GET NEXT TROPHY TO WIN -",
		"Tutorial":"Tutorial",
		"StartTutorial":"Would you like to start with Tutorial?",
		"Yes":"Yes",
		"No":"No",
		"Pause":"Pause",
		"GamePause":"Game Pause",
		"Resume":"Resume", 
		"Health":"Health",
		"Duration":"Duration",
		"Movement":"Movement",
		"Type":"Type :",
		"Spell":"Spell",
		"Troop":"Troop",
		"Damage":"Damage",
		"Fast":"Fast",
		"Normal":"Normal",
		"Slow":"Slow",
		"DamagePerSecond":"Damage Per Second",
		"StunDuration":"Stun Duration",
	},
	
	"AIName":{
		"One":"Sam87",
		"Two":"Tako",
		"Three":"SlicePrice",
		"Four":"Sporelot",
		"Five":"TurkeyWaver",
		"Six":"CircleJuicy",
		"Seven":"Celebracume",
		"Eight":"SkippyHot",
		"Nine":"Tempryman",
		"Ten":"99Creamy",
	},
	
	"Tutorial":{
		"Welcome":"Welcome Viking, let's start your training",
		"Destroy":"The goal is to destroy enemy towers",
		"Ready"	:"Now let's battle for real. Good Luck",
		"Deploy" :"Drag and drop to deploy your troops",
	},

	"Results":{
		"Title":"High score",
	},	
};

var _GAME = {
	"Card":{
		"archer":{
			"name":"Bowman",
			"manaUsage":3,
			"indexCardNumber":1,
			"rangeShot":70,
			"rangeDistraction":110,
			"speedMovement":30,
			"HP":360,
			"ATK":45,
			"spellcard":false,
			"description":"The Bowman is a ranged attacker. He strikes foes with his sharp arrows.",
		},
		"ars":{
			"name":"Arrow Hail",
			"manaUsage":3,
			"indexCardNumber":2,
			"range":true,
			"spellcard":true,
			"damage":300,
			"description":"These arrows will block out the sun, raining splash damage on enemies.",
		},
		"warrior":{
			"name":"Mercenary",
			"manaUsage":4,
			"indexCardNumber":3,
			"range":false,
			"rangeShot":0,
			"rangeDistraction":70,
			"speedMovement":25,
			"HP":850,
			"ATK":95,
			"spellcard":false,
			"description":"Ah, the Mercenary. With his trusty sword he cleaves his enemies in two.",
		},
		"berserk":{
			"name":"Battle Haze",
			"manaUsage":3,
			"indexCardNumber":4,
			"timeDuration":4,
			"range":true,
			"spellcard":true,
			"description":"Throws troops into a frenzy making them attack faster",
		},
		"giant":{
			"name":"Brute",
			"manaUsage":5,
			"indexCardNumber":5,
			"range":false,
			"rangeShot":0,
			"rangeDistraction":70,
			"speedMovement":15,
			"HP":2100,
			"ATK":75,
			"spellcard":false,
			"description":"Huge viking that only attacks towers.",
		},
		"bomb":{
			"name":"Dwarf",
			"manaUsage":3,
			"indexCardNumber":6,
			"range":true,
			"rangeShot":50,
			"rangeDistraction":90,
			"speedMovement":20,
			"HP":300,
			"ATK":50,
			"spellcard":false,
			"description":"Dwarf throws bombs into the enemy ranks causing splash damage",
		},
		"fireball":{
			"name":"Sol's Light",
			"manaUsage":4,
			"indexCardNumber":7,
			"range":true,
			"spellcard":true,
			"damage":500,
			"description":"A glowing ball of fire splashes the field incinerating foes",
		},
		"freezer":{
			"name":"Ymir's Breath",
			"manaUsage":4,
			"indexCardNumber":8,
			"timeDuration":3,
			"range":true,
			"spellcard":true,
			"description":"A blast of cool, icy air that freezes towers and units.",
		},
		"axeman":{
			"name":"Berserker",
			"manaUsage":2,
			"indexCardNumber":9,
			"range":false,
			"rangeShot":0,
			"rangeDistraction":70,
			"speedMovement":32,
			"HP":420,
			"ATK":65,
			"spellcard":false,
			"description":"Small but very agile and fast. They fight with furious frenzy.",
		},
		"axethrow":{
			"name":"Cutthroat",
			"manaUsage":3,
			"indexCardNumber":10,
			"range":true,
			"rangeShot":50,
			"rangeDistraction":80,
			"speedMovement":32,
			"HP":300,
			"ATK":65,
			"spellcard":false,
			"description":"Famous for his rage on the battle field, Cutthroat throws axes at their foes.",
		},
		"hammer":{
			"name":"Hersir",
			"manaUsage":4,
			"indexCardNumber":11,
			"range":false,
			"rangeShot":0,
			"rangeDistraction":70,
			"speedMovement":25,
			"HP":1050,
			"ATK":35,
			"spellcard":false,
			"description":"A hero with a hammer, has great movement and attack",
		},
		"lightning":{
			"name":"Thor's Might",
			"manaUsage":2,
			"indexCardNumber":12,
			"range":true,
			"spellcard":true,
			"stunTime":.4,
			"damage":200,
			"description":"A flash of lightning strikes and stuns the enemy.",
		},
		"mage":{
			"name":"Sorceress",
			"manaUsage":4,
			"indexCardNumber":13,
			"range":true,
			"rangeShot":60,
			"rangeDistraction":90,
			"speedMovement":25,
			"HP":420,
			"ATK":75,
			"spellcard":false,
			"description":"A practitioner of Seithr harnesses the fires of nature to defeat her foes.",
		},
		"tombcrush":{
			"name":"Thor's Hammer",
			"manaUsage":4,
			"indexCardNumber":0,
			"timeDuration":3,
			"DPS":10,
			"range":true,
			"spellcard":false,
			"description":"A hammer from the heavens that slams into enemies, damaging troops and slowing them down.",
		}
	}
};

var _UI = {
	"winresult":{
		"frames": {
			"blue-big-helm": {
				"frame": {"x":322, "y":90, "w":111, "h":88},
				"spriteSourceSize": {"x":0,"y":0,"w":111,"h":88},
				"sourceSize": {"w":111,"h":88}
			},
			"blue-small-helm": {
				"frame": {"x":322, "y":232, "w":97, "h":78},
				"spriteSourceSize": {"x":0,"y":0,"w":97,"h":78},
				"sourceSize": {"w":97,"h":78}
			},
			"ok-btn": {
				"frame": {"x":322, "y":179, "w":110, "h":52},
				"spriteSourceSize": {"x":0,"y":0,"w":110,"h":52},
				"sourceSize": {"w":110,"h":52}
			},
			"red-big-helm": {
				"frame": {"x":322, "y":0, "w":111, "h":89},
				"spriteSourceSize": {"x":0,"y":0,"w":111,"h":89},
				"sourceSize": {"w":111,"h":89}
			},
			"red-small-helm": {
				"frame": {"x":322, "y":311, "w":97, "h":77},
				"spriteSourceSize": {"x":0,"y":0,"w":97,"h":77},
				"sourceSize": {"w":97,"h":77}
			},
			"red-win":{
				"frame": {"x":0, "y":0, "w":321, "h":160},
				"spriteSourceSize": {"x":0,"y":0,"w":321,"h":160},
				"sourceSize": {"w":321,"h":160}
			},
			"versus":{
				"frame": {"x":133, "y":178, "w":54, "h":34},
				"spriteSourceSize": {"x":0,"y":0,"w":54,"h":34},
				"sourceSize": {"w":54,"h":34}
			},
			"blue-win": {
				"frame": {"x":0, "y":224, "w":321, "h":160},
				"spriteSourceSize": {"x":0,"y":0,"w":321,"h":160},
				"sourceSize": {"w":321,"h":160}
			},
			"winner": {
				"frame": {"x":0, "y":384, "w":111, "h":24},
				"spriteSourceSize": {"x":0,"y":0,"w":111,"h":24},
				"sourceSize": {"w":111,"h":24}
			}
		},
		"meta": {
			"image": "media/graphics/game/ui/win-result-atlas.png",
			"size": {"w": 434, "h": 409},
			"scale": "1"
		}
	}
};

var _CARD = {
	"frames": {
		"archer": {
			"frame": {"x":199, "y":80, "w":64, "h":79},
			"frameBig": {"x":259, "y":104, "w":84, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"arrow-shower": {
			"frame": {"x":0, "y":86, "w":64, "h":79},
			"frameBig": {"x":0, "y":111, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":68,"h":79},
			"sourceSize": {"w":68,"h":79}
		},
		"warrior": {
			"frame": {"x":196, "y":160, "w":64, "h":79},
			"frameBig": {"x":254, "y":208, "w":85, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"berserk": {
			"frame": {"x":0, "y":166, "w":64, "h":79},
			"frameBig": {"x":0, "y":215, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":65,"h":79},
			"sourceSize": {"w":65,"h":79}
		},
		"giant": {
			"frame": {"x":134, "y":80, "w":64, "h":79},
			"frameBig": {"x":174, "y":104, "w":84, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"bomb": {
			"frame": {"x":131, "y":246, "w":64, "h":79},
			"frameBig": {"x":170, "y":319, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"fireball": {
			"frame": {"x":7, "y":3, "w":64, "h":79},
			"frameBig": {"x":10, "y":2, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":77,"h":85},
			"sourceSize": {"w":77,"h":85}
		},
		"freezer": {
			"frame": {"x":208, "y":0, "w":64, "h":79},
			"frameBig": {"x":270, "y":0, "w":84, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"axeman": {
			"frame": {"x":143, "y":0, "w":64, "h":79},
			"frameBig": {"x":185, "y":0, "w":84, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"axemanthrow": {
			"frame": {"x":78, "y":0, "w":64, "h":79},
			"frameBig": {"x":100, "y":0, "w":84, "h":103},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"hammer": {
			"frame": {"x":131, "y":166, "w":64, "h":79},
			"frameBig": {"x":170, "y":215, "w":83, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"lightning": {
			"frame": {"x":65, "y":169, "w":64, "h":79},
			"frameBig": {"x":84, "y":219, "w":85, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":81},
			"sourceSize": {"w":64,"h":81}
		},
		"mage": {
			"frame": {"x":68, "y":87, "w":64, "h":79},
			"frameBig": {"x":89, "y":111, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		},
		"tombcrush": {
			"frame": {"x":0, "y":246, "w":64, "h":79},
			"frameBig": {"x":0, "y":319, "w":84, "h":104},
			"spriteSourceSize": {"x":0,"y":0,"w":64,"h":79},
			"sourceSize": {"w":64,"h":79}
		}

	},
	"meta": {
		"image": "media/graphics/game/card.png",
		"imageBig": "media/graphics/game/card-big.png",
		"imagebw": "media/graphics/game/cardbw.png",
		"size": {"w": 273, "h": 326},
		"scale": "1"
	}
};

var _TROOPS_CARD = {
	"frames": {
		"archer": {
			"frame": {"x":117, "y":46, "w":36, "h":44},
			"spriteSourceSize": {"x":0,"y":0,"w":36,"h":44},
			"sourceSize": {"w":36,"h":44}
		},
		"bomb": {
			"frame": {"x":49, "y":121, "w":35, "h":29},
			"spriteSourceSize": {"x":0,"y":0,"w":35,"h":29},
			"sourceSize": {"w":35,"h":29}
		},
		"giant": {
			"frame": {"x":0, "y":0, "w":75, "h":69},
			"spriteSourceSize": {"x":0,"y":0,"w":75,"h":69},
			"sourceSize": {"w":75,"h":69}
		},
		"hammer": {
			"frame": {"x":0, "y":70, "w":63, "h":46},
			"spriteSourceSize": {"x":0,"y":0,"w":63,"h":46},
			"sourceSize": {"w":63,"h":46}
		},
		"mage": {
			"frame": {"x":117, "y":91, "w":31, "h":39},
			"spriteSourceSize": {"x":0,"y":0,"w":31,"h":39},
			"sourceSize": {"w":31,"h":39}
		},
		"warrior": {
			"frame": {"x":64, "y":70, "w":52, "h":50},
			"spriteSourceSize": {"x":0,"y":0,"w":52,"h":50},
			"sourceSize": {"w":52,"h":50}
		},
		"xmen": {
			"frame": {"x":0, "y":117, "w":48, "h":41},
			"spriteSourceSize": {"x":0,"y":0,"w":48,"h":41},
			"sourceSize": {"w":48,"h":41}
		},
		"xthrow": {
			"frame": {"x":76, "y":0, "w":43, "h":45},
			"spriteSourceSize": {"x":0,"y":0,"w":43,"h":45},
			"sourceSize": {"w":43,"h":45}
		},
		"ars": {
			"frame": {"x":155, "y":0, "w":115, "h":115},
			"spriteSourceSize": {"x":0,"y":0,"w":115,"h":115},
			"sourceSize": {"w":115,"h":115}
		},
		"ar":{
			"frame": {"x":234, "y":200, "w":90, "h":107},
			"spriteSourceSize": {"x":0,"y":0,"w":90,"h":107},
			"sourceSize": {"w":90,"h":107}
		},
		"brs": {
			"frame": {"x":0, "y":160, "w":125, "h":100},
			"spriteSourceSize": {"x":0,"y":0,"w":125,"h":100},
			"sourceSize": {"w":125,"h":100}
		},
		"exs": {
			"frame": {"x":0, "y":261, "w":45, "h":45},
			"spriteSourceSize": {"x":0,"y":0,"w":45,"h":45},
			"sourceSize": {"w":45,"h":45}
		},
		"fs": {
			"frame": {"x":126, "y":160, "w":116, "h":96},
			"spriteSourceSize": {"x":0,"y":0,"w":116,"h":96},
			"sourceSize": {"w":116,"h":96}
		},
		"hcs": {
			"frame": {"x":243, "y":116, "w":80, "h":80},
			"spriteSourceSize": {"x":0,"y":0,"w":80,"h":80},
			"sourceSize": {"w":80,"h":80}
		},
		"ls": {
			"frame": {"x":247, "y":252, "w":77, "h":55},
			"spriteSourceSize": {"x":0,"y":0,"w":77,"h":55},
			"sourceSize": {"w":77,"h":55}
		}

	},
	"meta": {
		"image": "media/graphics/game/troops-card.png",
		"size": {"w": 324, "h": 307},
		"scale": "1"
	}
};

var _LOADING = {
	"frames": {
		"loader-bg": {
			"frame": {"x":0, "y":0, "w":252, "h":19},
			"spriteSourceSize": {"x":0,"y":0,"w":252,"h":19},
			"sourceSize": {"w":252,"h":19}
		},
		"loader-load": {
			"frame": {"x":0, "y":20, "w":247, "h":13},
			"spriteSourceSize": {"x":0,"y":0,"w":247,"h":13},
			"sourceSize": {"w":247,"h":13}
		}

	},
	"meta": {
		"image": "card.png",
		"size": {"w": 253, "h": 34},
		"scale": "1"
	}
};