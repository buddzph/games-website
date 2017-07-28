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
        "You":"YOU",
		"Win":"WIN",
		"Lose":"LOSE",
		"Score":"Score",
        "Highscore":"Highscore",
        "Coin":"Coin",
		"Time":"Time",
        "Music":"MUSIC",
		"Sound":"SOUND",
        "Paused":"PAUSED",
        "Game":"GAME",
        "Over":"OVER",
        "Settings":"SETTINGS",
        "Levels":"LEVELS",
        "ArmoCombo":"Extras Combo",
        "PopCombo":"Pop Combo",
        "DropCombo":"Drop Combo",
        "level":"level:",
        "score":"score:",
        "READY":"READY",
        "GO":"GO",
        "Proceed":"tap to proceed",
	},

	"Results":{
		"Title":"High score",
	},



};

var _LVL = {




    "lvl0":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [10,10,0,0],//old armo defination for each colour armo now used to know whether the armo colour is given
        "armoEachArmo":10,//how many armo for each colour
        "armoExtra": 1,
        "starScore":[2000,3000,3312],
        "rainbow":0,
        "arrow":[{x:108,y:354},{x:108,y:354},{x:121,y:615}],
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["My babies are trapped in these bubbles!","Let's pop these bubbles and rescue them!","Click on the arrow button or press B to use the floating bubble"],
        "speechMobile":["My babies are trapped in these bubbles!","Let's pop these bubbles and rescue them!","Click on the arrow button to use the floating bubble"],
        "map":[
            [,0,,0,0,0,0,,0,],
            [,0,0,,0,"baby0",0,,0,0,],
            [0,"baby0",0,,0,0,,0,"baby0",0],
            [0,0,0,0,,0,,0,0,0,0],
            [,1,,1,1,1,1,,1,],
            [,1,1,,1,"baby1",1,,1,1,],
            [1,"baby1",1,,1,1,,1,"baby1",1],
            [1,1,1,1,,1,,1,1,1,1],
            [,0,,0,0,0,0,,0,],
            [,0,0,,0,"baby0",0,,0,0,],
            [0,"baby0",0,,0,0,,0,"baby0",0],
            [0,0,0,0,,0,,0,0,0,0]
        ]





        },



    "lvl1":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [5,5,5,5],
        "armoEachArmo":6,
        "armoExtra": 1,
        "starScore":[1700,2816,3349],
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[

         [0,0,,,1,1,,,2,2,],
         [0,0,0,,1,"baby1",1,,2,2,2],
         [0,0,3,3,1,1,3,3,2,2,],
         [,,,3,,,,3,,,],
         [1,1,3,3,2,2,3,3,0,0,],
         [1,"baby1",1,,2,2,2,,0,"baby0",0],
         [1,1,3,3,2,2,3,3,0,0,],
         [,,,3,,,,3,,,],
         [2,2,3,3,0,0,3,3,1,1,],
         [2,2,2,,0,"baby0",0,,1,1,1],
         [2,2,,,0,0,,,1,1,]


        ]





        },


    "lvl2":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":13,
        "armoExtra": 1,
        "starScore":[3400,5010,6000],
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
        [,0,"baby0",0,,,1,"baby1",1,],
        [,,0,0,,2,,1,1,,],
        [,3,3,3,2,2,3,3,3,],
        [,3,0,0,2,2,2,0,0,3],
        [3,0,3,0,1,1,0,3,0,3],
        [3,1,1,3,1,"baby1",1,3,1,1,3],
        [2,1,0,1,1,1,1,0,1,2],
        [2,3,3,3,0,0,0,3,3,3,2],
        [2,2,1,3,0,0,3,1,2,2],
        [3,1,"baby1",0,2,2,2,0,"baby1",1,3],
        [3,0,1,2,3,3,2,1,0,3],
        [3,0,2,0,0,0,0,0,2,0,3],
        [0,1,2,0,0,0,0,2,1,0],
        [3,0,1,2,0,0,0,2,1,0,2],
        [3,0,1,2,0,0,3,1,0,2,],
        [1,3,3,2,1,1,1,3,2,2,1],
        [1,2,2,,1,1,,3,3,1],
        [1,,,,,1,,,,,1]

        ]





        },

        "lvl3":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [15,15,15,15],
        "armoEachArmo":15,
        "starScore":[3000,4347,5000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
        [,,1,1,,,2,2,,],
        [,,,"baby1",,,,"baby2",,,],
        [,,0,3,,,3,0,,],
        [,,3,0,2,,2,0,3,,],
        [,3,0,1,2,2,1,0,3,],
        [3,2,2,1,0,"baby0",0,1,2,2,3],
        [3,3,2,1,0,0,1,2,3,3],
        [1,2,1,0,2,1,2,0,1,2,1],
        [1,2,2,3,1,1,3,3,3,1],
        [2,3,1,0,1,3,1,2,2,0,3],
        [2,3,1,0,3,2,3,2,0,3],
        [0,2,2,3,3,0,2,3,1,1,3],
        [0,0,1,1,1,0,1,1,3,1],
        [2,1,3,0,3,1,0,0,2,2,3],
        [3,0,1,3,,1,2,3,1,3],
        [0,0,3,3,,,1,2,2,1,1]]





        },



    "lvl4":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
         "armoEachArmo":13,
        "starScore":[3000,4500,6000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "arrow":{x:109,y:284},
        "speech":["Avoid hitting the - bubbles!","You'll lose 3 bubble ammo for popping one of those!"],
        "map":[
         [2,"baby2",2,3,3,0,"baby0",0,1,1],
         [2,2,"minus3","minus3",1,3,2,2,2,1,1],
         [0,0,0,1,1,1,3,2,2,3],
         [3,0,0,2,1,1,1,3,3,0,3],
         [3,3,3,"minus2","minus2",1,1,3,0,3],
         [1,3,3,"minus2","minus2",3,0,"minus0","minus0",0,3],
         [1,1,1,1,3,3,2,"minus0",1,3],
         [3,1,1,3,3,3,2,2,1,1,1],
         [3,2,2,2,2,1,2,2,2,2],
         ["minus3","minus3",2,1,2,1,3,3,"minus3",0,2],
         [1,"minus3",3,1,1,1,2,"minus3",3,0],
         [1,1,0,0,3,3,1,2,0,0,0],
         [1,1,0,0,0,3,3,2,2,2],
         [1,2,2,2,0,0,3,3,3,2,2]

        ]





        },



    "lvl5":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":13,
        "starScore":[2000,3252,4000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["Bubble block can't be popped!", "Drop them to get rid of them!"],
        "arrow":{x:88,y:356},
        "map":[
        [,3,"baby3",3,,,2,"baby2",2,],
        [,,2,2,,,,1,1,,],
        [,,"wood",,,,,"wood",,],
        [,,2,2,2,"baby0",3,3,3,,],
        [,0,"wood",1,0,3,2,"wood",2,],
        [,0,"wood",1,3,0,1,2,"wood",3,],
        [3,"wood",3,"wood",1,2,"wood",2,"wood",1],
        [,3,"wood",3,0,0,3,0,"wood",0,],
        [1,2,2,"wood",1,3,"wood",1,3,0],
        [1,"wood",0,3,2,1,0,1,2,"wood",3],
        [0,3,,,,,,,2,0]

        ]





        },


     "lvl6":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [10,10,10,10],
        "armoEachArmo":13,
        "starScore":[3900,4403,5075],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["Try popping bubbles beside the clear bubbles","They take over the colour of the popped bubble"],
        "arrow":{x:89,y:354},
        "map":[
         [3,2,"baby1",0,3,2,1,"baby0",3,2],
         [0,3,2,1,0,3,2,1,0,3,2],
         [0,3,2,1,0,3,2,1,0,3],
         ["ice","ice","babyice","ice","ice","ice","ice","ice","babyice","ice","ice"],
         [0,3,2,1,0,3,2,1,0,3],
         [1,0,3,2,1,0,3,2,1,0,3],
         [1,0,3,2,1,0,3,2,1,0],
         ["ice","ice","ice","babyice","ice","ice","ice","babyice","ice","ice","ice"],
         [1,0,3,2,1,0,3,2,1,0],
         [2,1,0,3,2,1,0,3,2,1,0],
         [2,1,0,3,2,1,0,3,2,1],
         ["ice","ice","babyice","ice","ice","ice","ice","ice","babyice","ice","ice"],
         [2,1,0,3,2,1,0,3,2,1]
        ]
        },

    "lvl7":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":13,
        "starScore":[3100,4000,4900],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows

         "map":[
         [,,1,3,3,2,3,1,,],
         [,,,0,2,"baby2",3,0,,,],
         [,,,0,0,2,0,,,],
         [,,,1,1,1,0,0,,,],
         [,,,2,2,2,2,,,],
         [,,,"wood",0,"baby3",1,1,,,],
         [,,,0,3,1,"wood",,,],
         [,,,"ice","ice","ice","ice","ice",,,],
         [,,,0,"wood",1,3,,,],
         [,,,0,0,1,2,3,,,],
         [,,,3,1,2,3,,,],
         [,,,3,1,2,0,0,,,],
         [,,,3,1,0,0,,,],
         [,,,"ice","ice","babyice","ice","ice",,,],
         [,,,0,"wood",1,3,,,],
         [,,,0,0,1,2,3,,,],
         [,,,3,1,2,3,,,],
         [,,,3,1,2,0,0,,,],
         [,,,3,1,0,0,,,],
         [,,,"ice","ice","babyice","ice","ice",,,],
         [,1,0,1,3,3,1,0,2,],
         [,,1,0,1,3,1,0,2,,],
         [,,1,0,3,1,0,2,,],
         [,,,3,3,2,2,2,,,],
         [,,,0,0,1,3,,,],
         [,,,,0,3,3,,,,],
         [,,,,0,3,,,,],
         [,,,,,3,,,,,]
        ]





        },


//redo
    "lvl8":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":16,
        "starScore":[2500,3800,4300],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         [,,,,"ice","ice",,,,],
         [,"ice","ice",,"ice",2,"ice",,"ice","ice",],
         ["ice","baby1","ice","ice","ice","ice","ice","ice","baby3","ice"],
         [,"ice","ice",,"ice","ice","ice",,"ice","ice",],
         ["ice",3,"ice","ice",0,2,"ice","ice",1,"ice"],
         [,"ice","ice",,0,"babyice",2,,"ice","ice",],
         ["ice",2,"ice","ice",1,3,"ice","ice",0,"ice"],
         [,"ice","ice","ice","ice","ice","ice","ice","ice","ice",],
         ["ice","ice","ice",3,"ice","ice",1,"ice","ice","ice"],
         ["ice","ice",1,"ice","ice","ice","ice","ice",2,"ice","ice"],
         ["ice","ice","ice",0,"ice","ice",3,"ice","ice","ice"],
         ["ice","ice","baby2","ice","ice",3,"ice","ice","baby0","ice","ice"],
         ["ice","ice","ice","ice",0,2,"ice","ice","ice","ice"],
         ["ice",3,"ice",0,"ice","ice","ice",2,"ice",1,"ice"]

        ]





        },

    "lvl9":{

        "colourSet": [["green","pink","purple","cyan"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [16,16,16,16],
        "armoEachArmo":16,
        "starScore":[1500,2405,4000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["ice","ice",,,"ice","ice",,,"ice","ice"],
         ["ice","baby0","ice",,"ice","baby1","ice",,"ice","baby2","ice"],
         ["ice","ice",,,"ice","ice",,,"ice","ice"],
         ["ice","ice","ice",3,"ice","ice","ice",1,"ice","ice","ice"],
         [3,0,2,3,0,1,3,1,2,2],
         [0,1,3,0,2,3,0,2,3,1,1],
         [2,0,3,0,"ice","ice",1,0,2,3],
         [3,3,2,1,"ice","baby3","ice",1,3,2,0],
         [0,0,1,3,"ice","ice",2,2,0,0],
         [1,2,3,1,2,3,0,0,1,3,1],
         [1,1,2,3,3,2,2,3,0,1],
         ["ice","ice","ice","ice","ice","ice","ice","ice","ice","ice","ice"],
         [0,1,2,3,2,3,2,3,0,1]

        ]





        },



    "lvl10":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":16,
        "starScore":[3000,4000,5000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         [3,2,"ice",2,1,"baby1","baby0",3,3,"ice"],
         [3,"babyice",2,"ice","ice","ice","ice","ice","ice","ice",2],
         [0,1,"ice","ice",2,0,0,1,"ice",3],
         ["ice","ice","ice",1,"ice",1,"baby0",3,"ice",1,3],
         [0,3,"ice",2,"ice",2,3,"ice",1,1],
         [1,0,3,"ice","ice","ice",2,"ice",2,2,1],
         ["ice","ice","ice","ice",0,"ice","ice","ice","ice",3],
         [1,0,3,"ice",2,0,"ice",2,3,"ice",3],
         [0,1,"ice",1,"baby2",3,"ice",0,3,"ice"],
         ["ice","ice","ice",1,1,3,3,"ice",0,3,"ice"],
         [0,"ice","ice","ice","ice","ice","ice","ice",2,"ice"],
         [0,1,0,1,2,3,2,3,"ice","ice",3],
         [1,0,1,0,1,2,3,2,"ice",3]
        ]





        },




    "lvl11":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [0,15,15,15],
        "armoEachArmo":15,
        "starScore":[1100,2000,3000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["Popping each + bubble will give you 3 extra bubbles"],
        "arrow":{x:72,y:318},
        "map":[
         [1,1,,,3,3,,,3,3],
         [2,"babyice",3,,2,"babyice",1,,2,"babyice",1],
         ["minus2",3,,,"minus2","plus1",,,2,"minus1"],
         [,"babyice",,,,"babyice",,,,"babyice",],
         ["plus2",2,,,3,1,,,"plus1",1],
         [3,"babyice",2,,"plus3","babyice","minus1",,1,"babyice","minus2"],
         [3,"plus3",,,3,"minus1",,,"minus2",2],
         [,"babyice",,,,"babyice",,,,"babyice",],
         [3,"minus3",,,1,1,,,2,2],
         ["plus2","babyice","minus3",,3,"babyice",2,,"plus2","babyice","minus3"],
         [2,2,,,3,2,,,3,3],
         [,"babyice",,,,"babyice",,,,"babyice",],
         ["plus2",2,,,3,2,,,"minus3",3],
         [1,"babyice",2,,"minus3","babyice","minus2",,3,"babyice",1],
         [1,1,,,1,1,,,1,1]
        ]





        },


   "lvl12":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":20,
        "starScore":[2000,3000,4000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["baby0",0,,,1,3,,,2,"baby2"],
         [0,3,0,3,2,,0,1,2,1,2],
         [,3,3,,,,,1,1,],
         ["ice","ice","ice","ice","ice","ice","ice","ice","ice","ice","ice"],
         [0,1,2,3,0,1,2,3,0,1],
         [1,2,"plus0",1,2,"plus3",0,"minus2",1,3,0],
         [3,1,2,3,0,"minus1",2,3,"plus0",1],
         ["ice",2,"minus0",3,"plus2","ice",3,1,2,3,"ice"],
         [0,1,"ice",3,0,3,0,"ice","minus1",2],
         [3,2,"plus2",0,"minus1",3,1,2,0,0,1],
         [3,3,2,0,0,2,"plus2",0,1,1],
         [1,1,0,3,2,1,0,3,2,"minus0",3],
         [2,3,"ice",1,0,3,2,"ice",3,1]
         ]







        },



    "lvl13":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [0,20,20,20],
        "armoEachArmo":24,
        "starScore":[3000,4000,5000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["babyice","babyice","babyice","babyice","babyice","babyice","babyice","babyice","babyice",],
         ["ice","ice","ice","ice","ice","ice","ice","ice","ice","ice",],
         [,2,2,3,3,1,2,2,3,"ice"],
         [,,2,1,1,3,"ice",1,1,"ice","ice"],
         [,"ice","ice","ice","ice","ice","ice","ice","ice","ice"],
         [,"ice","ice",2,1,1,3,2,2,1,],
         ["ice","ice",1,3,2,3,1,3,3,],
         [,"ice","ice",1,3,"ice",2,2,1,1,],
         [,"ice","ice","ice","ice","ice","ice","ice","ice",],
         [,,1,1,3,2,3,2,1,"ice",],
         [,,2,3,1,1,"ice",1,"ice","ice"],
         [,,"ice","ice","ice","ice","ice","ice","ice","ice",],
         [,"ice",2,3,1,2,3,1,1,],
         [,"ice","ice",2,"ice",3,3,2,3,1,],
         [,"ice","ice","ice","ice","ice","ice","ice","ice",],
         [,1,2,1,3,3,1,1,3,"ice",],
         [2,3,3,1,2,"ice",2,2,"ice","ice"],
         ["ice","ice","ice","ice","ice","ice","ice","ice","ice","ice",]


        ]





        },

  "lvl14":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,0],
        "armoEachArmo":16,
        "starScore":[2800,4000,6000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "arrow":{x:241,y:385},
        "speech":["Hitting thunder bubble will pop the whole row of bubbles!"],
        "map":[
         ["babyice","babyice","babyice","babyice","babyice","wood","wood","thunder","wood","wood"],
         [2,2,0,0,1,1,0,"ice","ice",0,0],
         [1,0,"ice",2,1,2,2,"ice",2,2],
         [0,1,"ice","ice",1,0,2,0,1,1,0],
         [0,0,2,2,0,1,0,1,2,0],
         ["wood","wood","thunder","wood","wood",2,2,"ice","ice",2,0],
         [0,"ice","ice",1,0,2,0,2,1,0],
         [0,2,"ice",1,2,1,1,0,2,1,1],
         [2,0,0,0,2,2,1,1,0,0],
         [2,1,"ice","ice",1,1,"wood","wood","thunder","wood","wood"],
         [0,1,0,2,0,1,1,"ice","ice",0],
         [0,0,1,2,0,0,2,0,"ice",0,0],
         [0,2,0,2,1,0,2,2,2,0],
         ["wood","wood","wood","wood","wood","thunder","wood","wood","wood","wood","wood"],
        ]





        },

    "lvl15":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [0,13,13,13],
        "armoEachArmo":20,
        "starScore":[1500,2500,3000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["wood","ice","ice","babyice","ice","ice","babyice","ice","ice","wood"],
         ["baby1","wood","wood","wood","wood","thunder","wood","wood","wood","wood","baby3"],
         ["wood","ice","ice","ice","ice","ice","ice","ice","ice","wood"],
         ["baby2","wood",2,2,"ice","ice","ice","ice","ice","wood","baby2"],
         ["wood",1,"thunder",3,"ice","minus1","minus1","minus2","minus3","wood"],
         ["baby3","wood",1,3,"ice",3,3,"minus2","minus3","wood","baby1"],
         ["wood","ice","ice","ice","minus2",1,"ice","ice","ice","wood"],
         ["baby1","wood",2,1,2,1,"ice",2,3,"wood","baby3"],
         ["wood","minus3",2,3,3,"ice",1,"thunder",1,"wood"],
         ["baby2","wood","minus3",1,3,2,"ice",3,2,"wood","baby2"],
         ["wood",1,1,2,"ice","minus2","ice","ice","ice","wood"],
         ["baby3","wood","ice",2,1,1,2,"ice",3,"wood","baby1"],
         ["wood","ice",2,"ice",1,"ice","ice",2,"ice","wood"]


        ]





        },


            //redo
    "lvl16":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":13,
        "starScore":[2000,4000,5000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
        ["thunder",,3,3,,,,"ice",2,2],
         [,,2,"babyice",0,,,"ice",3,"babyice",1],
         [,,2,0,1,1,"ice",,3,1],
         [,3,3,"ice","ice",3,,0,,2,],
         [3,,,,,3,,0,,2],
         ["ice","ice",2,2,"ice","ice",2,,1,,],
         [,0,,"ice","thunder","ice",,,1,],
         [,0,,3,"ice","ice",1,,,,],
         [2,,3,,2,,1,,,],
         [2,,0,,2,"ice",,1,0,0,],
         [,0,,3,,"babyice","ice",3,"thunder",0],
         [,,,3,,"ice",,,3,1,],
         [,,,"ice",2,2,2,1,,],
         [,0,0,"ice",3,,0,,1,,],
         [3,"babyice",1,,3,,0,,2,],
         [,3,2,,,0,,1,,2,],
         [,,,,,0,,1,,]
        ]





        },


    "lvl17":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [16,16,16,16],
        "armoEachArmo":16,
        "starScore":[2000,3000,4200],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["Avoid hitting skull bubbles at all course!","Otherwise you'll lose the game!"],
        "arrow":{x:127,y:182},
        "map":[
         ["ice","ice","babyice","ice","ice","ice","ice","ice","babyice","ice"],
         [,1,2,"evil",0,,1,"evil",2,3,],
         [,1,2,0,,,1,2,3,],
         [,,0,1,,,,3,0,,],
         [1,0,2,1,1,3,3,2,1,1],
         [1,3,2,0,0,"evil",2,0,0,2,1],
         [,1,3,3,0,2,0,1,2,],
         [,1,"evil",2,3,,2,1,"evil",0,],
         [,1,2,,,,,3,0,],
         [,,"ice",,,,,,"ice",,],
         [1,"ice",3,2,1,2,1,0,"ice",3],
         ["ice",0,3,"ice",1,0,1,"ice",2,0,"ice"],
         ["ice",0,1,"ice",2,0,"ice",1,3,"ice"],
         [0,1,2,3,0,1,2,3,0,1,2]

        ]





        },



    "lvl18":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "armoEachArmo":13,
        "starScore":[1800,3000,4000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "speech":["Shoot star bubble to pop all bubbles with the same colour with your shooting bubble"],
        "arrow":{x:243,y:183},
        "map":[
         [0,0,,2,2,1,1,,2,2],
         [1,"star",3,3,"evil","evil","evil",0,0,"star",3],
         [1,3,,"evil","baby0","baby0","evil",,0,3],
         [,,,"evil","baby3","baby1","baby2","evil",,,],
         [,3,3,"evil","baby3","baby2","evil",0,0,],
         [,,,3,"evil","evil","evil",0,,,],
         [,,,,1,1,,,,],
         [3,3,"evil",2,2,"star",2,2,"evil",3,3],
         [1,0,0,3,3,3,3,1,1,0],
         [1,0,1,2,1,2,0,"ice",0,1,3],
         [2,2,0,1,0,1,"evil","ice",2,3],
         [2,1,"ice","evil","ice",3,2,1,3,2,2],
         [1,2,3,1,2,3,2,1,0,3],
         [0,0,3,2,3,2,1,0,2,1,1]

        ]





        },


    "lvl19":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [20,20,20,20],
        "armoEachArmo":26,
        "starScore":[1500,2500,4000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         [3,"ice","babyice","ice",0,0,"ice","babyice","ice",1],
         ["ice",,,,"ice","babyice","ice",,,,"ice"],
         ["babyice","ice",3,1,0,2,2,1,"ice","babyice"],
         [,,,,"ice",,"ice",,,,],
         [,,1,1,0,0,2,2,,],
         [,,"evil",,"ice",,"evil",,1,,],
         [,2,,3,3,1,1,,3,],
         [,1,,"evil",,0,,1,,0,],
         [3,,1,,1,2,,2,,1],
         ["ice","ice",2,"ice",3,"babyice",3,"ice",3,"ice",2],
         ["ice",,3,,2,1,,0,,3],
         [,2,,"evil",,"ice",,"evil",,0,],
         [,0,,0,1,2,3,,"evil",],
         [,,0,"ice",,"ice",,"ice","ice",,],
         [,,1,3,2,0,1,3,,]

        ]





        },

    "lvl20":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [20,20,20,20],
         "armoEachArmo":20,
        "starScore":[3000,5000,6000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows

        "map":[
         [3,2,2,"baby1","baby1",3,3,3,"ice","ice"],
         [3,"ice","ice","ice",2,1,0,2,"ice","baby3","ice"],
         [1,0,0,2,3,3,0,3,"ice","ice"],
         [1,"wood","wood",0,1,3,2,2,1,3,1],
         ["wood","thunder","ice","evil","evil","evil","evil","evil","evil","evil"],
         [3,"ice","ice",0,3,3,"baby2","baby0","baby3",1,1],
         [3,2,2,0,1,3,0,2,1,3],
         [0,2,"ice","ice","ice",1,1,"ice","ice","ice",3],
         [0,1,3,2,0,3,3,1,1,2],
         [0,1,1,3,0,2,0,1,"wood","wood",2],
         ["evil","evil","evil","evil","evil","evil","evil","ice","thunder","wood"],
         [3,0,"baby3","baby2","baby0",2,3,2,"ice","ice",3],
         [3,2,0,1,1,3,1,2,0,3],
         [2,"ice","ice","ice",3,0,3,"ice","ice","ice",3],
         [2,2,0,0,3,2,0,1,3,1],
         [3,"wood","wood",3,2,2,1,3,0,0,1],
         ["wood","thunder","ice","evil","evil","evil","evil","evil","evil","evil"],
         [0,"ice","ice",3,2,0,3,2,1,3,0],
         [3,1,2,3,2,0,2,0,2,1]
        ]





        },


    "lvl21":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [20,20,20,0],
        "armoEachArmo":25,
        "starScore":[4000,5500,7000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         [2,0,2,"ice","wood","ice",1,1,1,0],
         [2,1,1,"ice","wood","ice",2,"wood","wood",0,2],
         [1,0,"ice","thunder","ice",1,"wood","baby2","wood",2],
         [2,2,0,"ice","wood","ice",2,"wood","wood",1,1],
         [0,"wood","wood","ice","wood","ice",2,0,0,2],
         [0,"wood","baby1","wood","ice","thunder","ice",0,1,1,2],
         [1,"wood","wood",0,"ice","wood","ice",0,2,0],
         [1,0,0,1,0,"ice","wood","ice",2,1,0],
         [1,2,2,1,2,"ice","thunder","ice",0,1],
         [2,0,1,2,"ice","wood","ice","wood","wood",2,0],
         [0,1,0,"ice","thunder","ice","wood","baby0","wood",2],
         [2,1,2,"ice","wood","ice",2,"wood","wood",1,1],
         [2,0,"ice","wood","ice",1,2,0,0,1],
         [1,1,2,1,"ice","wood","ice",1,2,2,0],
         [0,2,0,1,"ice","wood","ice",1,1,0],
         [0,1,1,2,0,"ice","wood","ice",0,2,2]

        ]





        },




    "lvl22":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [0,20,20,20],
        "armoEachArmo":30,
        "starScore":[1500,3000,5000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["ice","babyice",2,"babyice",2,1,"babyice","ice","babyice","ice"],
         [,"ice",,1,3,,3,2,,"ice",],
          [,"ice","ice",,1,2,,"evil",1,],
         [,,"evil",,,"ice",,,"ice",,],
         [,1,3,,"ice","ice",,2,1,],
         [,1,"babyice","evil",3,,"ice","evil","babyice",1,],
         [,1,2,"ice","ice","evil","ice",2,1,],
         [,,"ice",,,,,,"ice",,],
         [,"ice",3,,3,3,,1,"ice",],
         [,"ice",,"ice",1,,2,"evil",,"ice",],
         ["evil","ice",1,"ice",1,2,"ice","ice",2,"ice"],
         [,,,,,"ice",,,,,],
         [,,,,"ice","ice",,,,],
         [,1,1,,"ice",,"evil",,2,2,],
         [1,"babyice",1,"ice","ice","ice","ice",2,"babyice",2],
         [,1,1,,"evil",,2,,2,2,],
         [,"ice",,,1,"ice",,,"evil",],
         [,"evil",1,,,"ice",,,"ice","evil",],
         ["ice",,"ice",,3,"evil",,"ice",,"ice"],
         [1,"ice",3,"ice",3,"babyice",3,"ice",3,"ice",2],
         [,,,,3,3,,,,]
        ]





        },






    "lvl23":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [20,20,20,20],
        "armoEachArmo":30,
        "starScore":[5000,7000,10000],
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         ["babyice","babyice","thunder","babyice","thunder","babyice","babyice","thunder","babyice","babyice"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r","r"],
         ["r","r","r","r","r","r","r","r","r","r"]

        ]





        },



    "lvl24":{

        "colourSet": [["cyan","pink","purple","green"],["red","orange","pink","purple"],["green","yellow","orange","purple"]],
        "armo": [13,13,13,13],
        "starScore":[100,500,600],
        "armoEachArmo":20,
        "armoExtra": 1,
        "rainbow":0,
        "rowOffset":0,//0 to offset odd rows, 1 to offset even rows
        "map":[
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],
         [,,,,,,,,,],
         [,,,,,,,,,,],

        ]





        },






};
