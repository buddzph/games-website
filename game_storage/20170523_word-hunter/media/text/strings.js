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
		"Time":"Time",
		"More":"More Games",
		"BestTime":"Best Time",
		"Play":"Play",
		"Instructions":["Find all the words in the list", " as quickly as possible !", "", " What is your best score?", "", " HINT: Words can be found", " horizontally, vertically", " and backwards"],
		"PuzzleSolvedIn":["Puzzle Solved", "in"],
		"Unplayed": "Unplayed",
		"Instruction": "Instructions",
		"Settings": "Settings",
		
		//difficulty 
		"Easy": "Easy",
		"Medium": "Medium",
		"Hard": "Hard",
		
		//menu
		"NewGame": "New Game",
		"MainMenu": "Main Menu",
		
		//settings
		"Sound": "Sound",
		"Music": "Music",
		
		// question randomly generated from title list 
		"title": ["Pirates", "Navigation", "Treasures", "Ruins", "Dangerous Animals", "Legendary Creatures", "Deities", "Explorers", "Countries", "Gemstones", "Snakes"],
		// register words title here, unlisted title won't be picked
		
		// title, for display. put any character you want
        "Pirates":"Pirates",
        "Navigation":"Navigation",
        "Treasures":"Treasures",
        "Ruins":"Ruins",
        "Dangerous Animals":"Dangerous Animals",
        "Legendary Creatures":"Legendary Creatures",
        "Deities":"Deities",
        "Explorers":"Explorers",
        "Countries":"Countries",
        "Gemstones":"Gemstones",
        "Snakes":"Snakes",

        "Difficulty": [null, "(Easy)", "(Medium)", "(Hard)"],
		
		// range of alphabet to be generated into answer board
		"letterData": "abcdefghijklmnopqrstuvwxyz",	// english / general
		//"letterData": "abcdefghijklmnopqrstuvwxyzéàèùâêîôûëïüÿçŒÆ",	// french
		//"letterData": "abcdefghijklmnopqrstuvwxyzäöüß",	//	german
		//"letterData": "abcdefghijklmnopqrstuvwxyzáâãàçéêíóôõú",	// portuguese
		
		// answers will be generated based on the picked title(random) & difficulty(user picked)
        "dictionary": {
            "Artists": [    //same as title name
            null,
            // easy
            ["homer", "kahlo", "munch", "picasso", "raphael", "renoir", "rubens", "titan", "vermeer", "warhol"],
            // medium
            ["blake", "cassatt", "cezanne", "davinci", "dali", "degas", "durer", "eakins", "hopper", "klmit", "leger", "mondrian", "rembrandt", "velazquez", "vermeer"],
            // hard
            ["angelico", "arcimboldo", "arp", "bernini", "blake", "cassatt", "cezanne", "courbet", "dali", "donatello", "durer", "eyck", "fragonard", "gauguin", "kandinsky", "klee", "klmit", "magritte", "manet", "mondrian", "moore", "okeeffe", "renoir", "rivera", "rubens", "titan", "vangogh", "velazquez", "vermeer", "warhol"]

            ],

            "Pirates":[
                null,
                ["adventure","ahoy","aye","booty","buccaneer","cannon","captain","chanty","crew","crossbones","eyepatch","gold","island","jollyroger","mutiny","parrot","pegleg","plank","privateer","rum","sail","ship","treasure"],
                ["adventure","ahoy","aye","booty","buccaneer","cannon","captain","chanty","crew","crossbones","eyepatch","gold","island","jollyroger","mutiny","parrot","pegleg","plank","privateer","rum","sail","ship","treasure"],
                ["adventure","ahoy","aye","booty","buccaneer","cannon","captain","chanty","crew","crossbones","eyepatch","gold","island","jollyroger","mutiny","parrot","pegleg","plank","privateer","rum","sail","ship","treasure"],
            ],

            "Navigation":[
                null,
                ["beacon","cartography","chart","compass","direction","east","latitude","longitude","map","maritime","nautical","navigator","north","pilot","quadrant","radar","radio","sextant","sonar","south","stars","west"],
                ["beacon","cartography","chart","compass","direction","east","latitude","longitude","map","maritime","nautical","navigator","north","pilot","quadrant","radar","radio","sextant","sonar","south","stars","west"],
                ["beacon","cartography","chart","compass","direction","east","latitude","longitude","map","maritime","nautical","navigator","north","pilot","quadrant","radar","radio","sextant","sonar","south","stars","west"],
            ],

            "Treasures":[
                null,
                ["amulet","brooch","chalice","chest","circlet","coin","crown","crystal","gem","gold","jewel","mask","medallion","necklace","painting","relic","ring","scroll","shield","signet","sword","tiara","tome"],
                ["amulet","brooch","chalice","chest","circlet","coin","crown","crystal","gem","gold","jewel","mask","medallion","necklace","painting","relic","ring","scroll","shield","signet","sword","tiara","tome"],
                ["amulet","brooch","chalice","chest","circlet","coin","crown","crystal","gem","gold","jewel","mask","medallion","necklace","painting","relic","ring","scroll","shield","signet","sword","tiara","tome"],
            ],

            "Ruins":[
                null,
                ["angkor","ayutthaya","baalbek","bagan","borobudur","cappadocia","colosseum","copan","giza","jerash","longmen","luxor","moai","mycenae","nanmadol","palenque","palmyra","parthenon","petra","pompeii","stonehenge","taprohm","tikal","tiwanaku","tulum","volubilis"],
                ["angkor","ayutthaya","baalbek","bagan","borobudur","cappadocia","colosseum","copan","giza","jerash","longmen","luxor","moai","mycenae","nanmadol","palenque","palmyra","parthenon","petra","pompeii","stonehenge","taprohm","tikal","tiwanaku","tulum","volubilis"],
                ["angkor","ayutthaya","baalbek","bagan","borobudur","cappadocia","colosseum","copan","giza","jerash","longmen","luxor","moai","mycenae","nanmadol","palenque","palmyra","parthenon","petra","pompeii","stonehenge","taprohm","tikal","tiwanaku","tulum","volubilis"],
            ],

            "Dangerous Animals":[
                null,
                ["alligator","bear","coyote","crocodile","elephant","hyena","jackal","jaguar","jellyfish","leopard","lion","piranha","pufferfish","scorpion","shark","snake","spider","tiger","wildboar","wilddog","wolf","wolverine"],
                ["alligator","bear","coyote","crocodile","elephant","hyena","jackal","jaguar","jellyfish","leopard","lion","piranha","pufferfish","scorpion","shark","snake","spider","tiger","wildboar","wilddog","wolf","wolverine"],
                ["alligator","bear","coyote","crocodile","elephant","hyena","jackal","jaguar","jellyfish","leopard","lion","piranha","pufferfish","scorpion","shark","snake","spider","tiger","wildboar","wilddog","wolf","wolverine"],
            ],

            "Legendary Creatures":[
                null,
                ["barghest","basilisk","centaur","chimera","cockatrice","cyclops","dragon","fairy","ghoul","gorgon","griffin","harpy","hippogriff","hydra","jackalope","kirin","kraken","lamassu","leprechaun","manticore","minotaur","naga","pegasus","pheonix","roc","satyr","siren","sphinx","strigoi","troll","unicorn","vampire","werewolf","wyvern","yeti"],
                ["barghest","basilisk","centaur","chimera","cockatrice","cyclops","dragon","fairy","ghoul","gorgon","griffin","harpy","hippogriff","hydra","jackalope","kirin","kraken","lamassu","leprechaun","manticore","minotaur","naga","pegasus","pheonix","roc","satyr","siren","sphinx","strigoi","troll","unicorn","vampire","werewolf","wyvern","yeti"],
                ["barghest","basilisk","centaur","chimera","cockatrice","cyclops","dragon","fairy","ghoul","gorgon","griffin","harpy","hippogriff","hydra","jackalope","kirin","kraken","lamassu","leprechaun","manticore","minotaur","naga","pegasus","pheonix","roc","satyr","siren","sphinx","strigoi","troll","unicorn","vampire","werewolf","wyvern","yeti"],
            ],

            "Deities":[
                null,
                ["anubis","bast","hathor","amun","isis","maat","osiris","ptah","ra","thoth","vishnu","shiva","brahma","ganesha","kali","thor","odin","baldr","freyja","loki","zeus","poseidon","hades","apollo","artemis","aphrodite","ares","athena","hermes","hera"],
                ["anubis","bast","hathor","amun","isis","maat","osiris","ptah","ra","thoth","vishnu","shiva","brahma","ganesha","kali","thor","odin","baldr","freyja","loki","zeus","poseidon","hades","apollo","artemis","aphrodite","ares","athena","hermes","hera"],
                ["anubis","bast","hathor","amun","isis","maat","osiris","ptah","ra","thoth","vishnu","shiva","brahma","ganesha","kali","thor","odin","baldr","freyja","loki","zeus","poseidon","hades","apollo","artemis","aphrodite","ares","athena","hermes","hera"],
            ],

            "Explorers":[
                null,
                ["alvares","amundsen","cabot","cartier","cavendish","clark","columbus","cook","cortes","cousteau","dagama","dias","drake","ericksson","faxian","hillary","hudson","ibnbattuta","lewis","magellan","messner","peary","pizarro","polo","raleigh","sacagawea","smith","vespucci","zhenghe"],
                ["alvares","amundsen","cabot","cartier","cavendish","clark","columbus","cook","cortes","cousteau","dagama","dias","drake","ericksson","faxian","hillary","hudson","ibnbattuta","lewis","magellan","messner","peary","pizarro","polo","raleigh","sacagawea","smith","vespucci","zhenghe"],
                ["alvares","amundsen","cabot","cartier","cavendish","clark","columbus","cook","cortes","cousteau","dagama","dias","drake","ericksson","faxian","hillary","hudson","ibnbattuta","lewis","magellan","messner","peary","pizarro","polo","raleigh","sacagawea","smith","vespucci","zhenghe"],
            ],

            "Countries":[
                null,
                ["albania","algeria","bulgaria","cambodia","chile","china","cyprus","denmark","egypt","england","france","greece","guatemala","india","iran","ireland","italy","jordan","malta","mexico","pakistan","peru","romania","scotland","serbia","spain","syria","thailand","turkey"],
                ["albania","algeria","bulgaria","cambodia","chile","china","cyprus","denmark","egypt","england","france","greece","guatemala","india","iran","ireland","italy","jordan","malta","mexico","pakistan","peru","romania","scotland","serbia","spain","syria","thailand","turkey"],
                ["albania","algeria","bulgaria","cambodia","chile","china","cyprus","denmark","egypt","england","france","greece","guatemala","india","iran","ireland","italy","jordan","malta","mexico","pakistan","peru","romania","scotland","serbia","spain","syria","thailand","turkey"],
            ],

            "Gemstones":[
                null,
                ["agate","amethyst","aquamarine","beryl","bloodstone","carnelian","chrysolite","cinnabar","citrine","diamond","emerald","feldspar","garnet","hyacinth","jade","jasper","moonstone","onyx","opal","pearl","pearl","peridot","quartz","ruby","sapphire","sardonyx","spinel","sunstone","topaz","tourmaline","turquoise","zircon"],
                ["agate","amethyst","aquamarine","beryl","bloodstone","carnelian","chrysolite","cinnabar","citrine","diamond","emerald","feldspar","garnet","hyacinth","jade","jasper","moonstone","onyx","opal","pearl","pearl","peridot","quartz","ruby","sapphire","sardonyx","spinel","sunstone","topaz","tourmaline","turquoise","zircon"],
                ["agate","amethyst","aquamarine","beryl","bloodstone","carnelian","chrysolite","cinnabar","citrine","diamond","emerald","feldspar","garnet","hyacinth","jade","jasper","moonstone","onyx","opal","pearl","pearl","peridot","quartz","ruby","sapphire","sardonyx","spinel","sunstone","topaz","tourmaline","turquoise","zircon"],
            ],

            "Snakes":[
                null,
                ["adder","anaconda","asp","boa","boiga","boomslang","bushmaster","cantil","cobra","copperhead","habu","keelback","krait","lancehead","mamba","mamushi","python","racer","rinkhals","sidewinder","taipan","urutu","viper","yarara"],
                ["adder","anaconda","asp","boa","boiga","boomslang","bushmaster","cantil","cobra","copperhead","habu","keelback","krait","lancehead","mamba","mamushi","python","racer","rinkhals","sidewinder","taipan","urutu","viper","yarara"],
                ["adder","anaconda","asp","boa","boiga","boomslang","bushmaster","cantil","cobra","copperhead","habu","keelback","krait","lancehead","mamba","mamushi","python","racer","rinkhals","sidewinder","taipan","urutu","viper","yarara"],
            ],
        },
    },

	"Results":{
		"Title":"High score",
	},	
};