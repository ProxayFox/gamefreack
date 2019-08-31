CREATE DATABASE gameFreaks;

CREATE TABLE clientData(
  CDID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fName VARCHAR(50),
  lName VARCHAR(50),
  email VARCHAR(150) UNIQUE NOT NULL
);

CREATE TABLE clientProfile(
  CPID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  displayName VARCHAR(50) UNIQUE,
  UIMG VARCHAR(255),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE clientReward(
  CRID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  points INT(11) NOT NULL,
  level INT(11) NOT NULL,
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE clientAddress(
  CAID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  address VARCHAR(100),
  suburb VARCHAR(100),
  city VARCHAR(100),
  state VARCHAR(3),
  postCode INT(5),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE login(
  LID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  UName VARCHAR(100) UNIQUE NOT NULL,
  PWD VARCHAR(200) NOT NULL,
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE gameInventory(
  GIID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  productName VARCHAR(255) NOT NULL,
  releaseDates DATE NOT NULL,
  platForm TINYINT(2) NOT NULL,
  producer VARCHAR(255) NOT NULL,
  genre VARCHAR(100) NOT NULL,
  briefDescription TEXT(500) NOT NULL,
  longDescription TEXT(5000) NOT NULL,
  Requirements TEXT(500) NOT NULL,
  price DECIMAL(10,2)
);

CREATE TABLE  gameInventoryIMG (
  GIID INT(11) NOT NULL AUTO_INCREMENT,
  IMG VARCHAR(255) NOT NULL,
  PRIMARY KEY (GIID, IMG),
  FOREIGN KEY (GIID) REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE savedGameInventory(
  CDID INT(11) NOT NULL,
  GIID INT(11) NOT NULL,
  PRIMARY KEY (CDID, GIID),
  FOREIGN KEY (CDID)  REFERENCES clientData(CDID) ON DELETE CASCADE,
  FOREIGN KEY (GIID)  REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE guestGameComments(
  GGCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  GIID INT(11) NOT NULL,
  username VARCHAR(255) NOT NULL,
  date date NOT NULL,
  comment TEXT(5000) NOT NULL,
  FOREIGN KEY (GIID)  REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE userGameComment(
  UGCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CPID INT(11) NOT NULL,
  GIID INT(11) NOT NULL,
  date date NOT NULL,
  comment TEXT(5000) NOT NULL,
  FOREIGN KEY (CPID)  REFERENCES clientProfile(CPID) ON DELETE CASCADE,
  FOREIGN KEY (GIID)  REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE consoleInventory(
  CIID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  productName VARCHAR(255) NOT NULL,
  producer VARCHAR(255) NOT NULL,
  manufacturer VARCHAR(255) NOT NULL,
  platForm TINYINT(2) NOT NULL,
  releaseDates DATE NOT NULL,
  briefDescription TEXT(300) NOT NULL,
  longDescription TEXT(1000) NOT NULL,
  price DECIMAL(10,2)
);

CREATE TABLE  consoleInventoryIMG (
  CIID INT(11) NOT NULL AUTO_INCREMENT,
  IMG VARCHAR(255) NOT NULL,
  PRIMARY KEY (CIID, IMG),
  FOREIGN KEY (CIID) REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE savedConsoleInventory(
  CDID INT(11) NOT NULL,
  CIID INT(11) NOT NULL,
  PRIMARY KEY (CDID, CIID),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE,
  FOREIGN KEY (CIID) 	REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE guestConsoleComments(
  GCCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CIID INT(11) NOT NULL,
  username VARCHAR(255) NOT NULL,
  date date NOT NULL,
  comment TEXT(5000) NOT NULL,
  FOREIGN KEY (CIID) 	REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE userConsoleComment(
  UCCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CPID INT(11) NOT NULL,
  CIID INT(11) NOT NULL,
  date date NOT NULL,
  comment TEXT(5000) NOT NULL,
  FOREIGN KEY (CPID) 	REFERENCES clientProfile(CPID) ON DELETE CASCADE,
  FOREIGN KEY (CIID) 	REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

INSERT INTO clientData (`CDID`, `fName`, `lName`, `email`) VALUES
  (1, 'Arabella', 'NumNut', 'admin1@proxwebdev.com'),
  (2, 'Mariah', 'MarMight', 'admin@proxwebdev.com'),
  (3, 'Megga', 'Boi', 'spambi@420blaze.it');

INSERT INTO clientProfile (`CPID`, `CDID`, `displayName`, `UIMG`) VALUES
  (1, 1, 'Ara', 'stars.jpeg'),
  (2, 2, 'Marmight', '11e79c5bd7cf103d.png'),
  (3, 3, 'Morgs', '44fdc40.jpg');

INSERT INTO clientReward (`CRID`, `CDID`, `points`, `level`) VALUES
  (1, 1, 10, 1),
  (2, 2, 5, 2),
  (3, 3, 1, 1);

INSERT INTO clientAddress (CAID, CDID, address, suburb, city, state, postCode) VALUES
  (1, 1, 'Boundary st', 'Brisbane', 'Brisbane', 'QLD', 4000),
  (2, 2, 'Beddoes st', 'Holland pk', 'Brisbane', 'QLD', 4121),
  (3, 3, 'Boundary st', 'Holland pk', 'Brisbane', 'QLD', 4121);

INSERT INTO login (`LID`, `CDID`, `UName`, `PWD`) VALUES
  (1, 1, 'atcav', 'e6c83b282aeb2e022844595721cc00bbda47cb24537c1779f9bb84f04039e1676e6ba8573e588da1052510e3aa0a32a9e55879ae22b0c2d62136fc0a3e85f8bb'),
  (2, 2, 'admin', 'e6c83b282aeb2e022844595721cc00bbda47cb24537c1779f9bb84f04039e1676e6ba8573e588da1052510e3aa0a32a9e55879ae22b0c2d62136fc0a3e85f8bb'),
  (3, 3, 'spambi', '5e84464887949a798486c8ade17b49fc67a451eaee75f5e91aad42ea47060ceb5f9a4fd49eb487c9d851aac45fa788b7cfcb5408ad258bb017ea0b60bb17bfb1');

INSERT INTO gameInventory (GIID, productName, releaseDates, platForm, producer, genre, briefDescription , longDescription, Requirements, price)VALUES
  (1, 'Far Cry 5', '2018-03-27', 6, 'Ubisoft', 'FPS, SG, AAG', 'Far Cry 5 is a massive gameplay arena that''s filled with something new around every bend. The enemy AI behavior is more realistic, and the exploration is endless. Even when you feel like taking a break from the campaign, you can take in some leisurely fishing before diving back into your quest. It''s your mission.', 'Far Cry 5 is a first-person shooter video game developed by Ubisoft Montreal and Ubisoft Toronto and published by Ubisoft for Microsoft Windows, PlayStation 4 and Xbox One. It is the standalone successor to the 2014 video game Far Cry 4, and the fifth main installment in the Far Cry series. The game was released on March 27, 2018. The game takes place in Hope County, a fictional region of Montana, United States. The main story revolves around the Project at Eden''s Gate, a doomsday cult that has taken over the county at the command of its charismatic and powerful leader, Joseph Seed. Players control an unnamed junior deputy sheriff who becomes trapped in Hope County, and must work alongside factions of a resistance to liberate the county from the despotic rule of the Seeds and Eden''s Gate. Gameplay focuses on combat and exploration; players battle enemy soldiers and dangerous wildlife using a wide array of weapons. The game features many elements found in role-playing games, such as a branching storyline and side quests. The game also features a map editor, a co-operative multiplayer mode, and a competitive multiplayer mode. Announced in early 2017, development on Far Cry 5 was extensive. The team explored several concepts before settling on an American location. The game was heavily inspired by several socio-political events in modern history, such as the Cold War and the September 11 attacks. The development team sought to capture the despondent social climate after the events and re-purpose it for the game. Developed and published solely by Ubisoft, its competitive multiplayer mode was also created in-house, with the company''s worldwide studios gaining more creative input for Far Cry 5. Far Cry 5 was met with mostly positive critical reception upon release, although was the subject of controversy after being announced alongside a period of heightened political conflicts. Critics praised the open world design, visuals, and soundtrack, but directed criticisms towards its story and some of the characters. The game was a commercial success and became the fastest-selling title in the franchise, grossing over $310 million in its first week of sales. Several downloadable content packs have been released. A spin-off title and sequel to the narrative, Far Cry New Dawn, was released in February 15, 2019.', NULL, 50.20),
  (2, 'Metro Exodus', '2019-02-15', 6, 'Deep Silver', 'FPS, SG', 'Metro Exodus is a first-person shooter game with survival horror and stealth elements. ... The game features a mixture of linear levels and sandbox environments. It also includes a dynamic weather system, a day-night cycle, and environments that change along with the seasons as the story progresses.', 'Metro Exodus is a first-person shooter game with survival horror and stealth elements. Set in the post-apocalyptic wasteland of the former Russian Federation, the player must cope with the new hazards and engage in combat against mutated creatures as well as hostile humans.[1][2] The player wields an arsenal of hand-made weaponry which can be customised through scavenging materials and a crafting system.[2] The game features a mixture of linear levels and sandbox environments.[3] It also includes a dynamic weather system, a day-night cycle, and environments that change along with the seasons as the story progresses. It is set over the course of one whole in-game year.[2][3]', NULL, 911.03),
  (3, 'Prey', '2017-05-05', 6, 'Bethesda Softworks', 'FPS, IS, SG, AAG', 'Prey is a first-person shooter video game developed by Arkane Studios and published by Bethesda Softworks. The game was released worldwide on 5 May 2017, for Microsoft Windows, PlayStation 4 and Xbox One.', 'Prey is a first-person shooter video game developed by Arkane Studios and published by Bethesda Softworks. The game was released worldwide on 5 May 2017, for Microsoft Windows, PlayStation 4 and Xbox One. In Prey, the player controls Morgan Yu while exploring the space station Talos I, in orbit around Earth–Moon L2, where they had been researching a hostile alien species called the Typhon. As the Typhon escape confinement, the player uses a variety of weapons and abilities derived from the Typhon to avoid being killed by the aliens while looking to escape the station. The player gains access to areas of the station by acquiring key items and abilities, eventually allowing the player to fully explore the station in an open world setting. Arkane''s Prey is largely unrelated to the 2006 game Prey developed by Human Head Studios, and is considered a reimagining of the intellectual property set in a wholly new narrative. While Prey 2, a sequel to the 2006 game, had been planned by Human Head, it fell into development hell following transfer of the intellectual property from 3D Realms to Bethesda Softworks, and was eventually cancelled in 2014. Arkane''s game does not use any of the planned sequel''s assets, and only incorporates the previous game''s name and the broad theme of the protagonist being hunted by aliens. Arkane built Prey as a spiritual sequel to System Shock, providing the player with several potential means of progressing within the game.', NULL, 10.99),
  (4, 'Wolfenstein The New Order', '2014-05-20', 6, 'Bethesda Softworks', 'AAG, FPS, SG', 'Wolfenstein: The New Order is an action-adventure first-person shooter video game developed by MachineGames and published by Bethesda Softworks. It was released on 20 May 2014 for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360, and Xbox One.', 'Wolfenstein: The New Order is an action-adventure first-person shooter video game developed by MachineGames and published by Bethesda Softworks. It was released on 20 May 2014 for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360, and Xbox One. The game is the seventh main entry in the Wolfenstein series and the sequel to 2009''s Wolfenstein, set in an alternate history 1960s Europe where the Nazis won the Second World War. The story follows war veteran William "B.J." Blazkowicz and his efforts to stop the Nazis from ruling over the world. The game is played from a first-person perspective and most of its levels are navigated on foot. The story is arranged in chapters, which players complete in order to progress. A morality choice in the prologue alters the game''s entire storyline; some characters and small plot points are replaced throughout the timelines. The game features a variety of weapons, most of which can be dual wielded. A cover system is also present. Development began in 2010, soon after id Software gave MachineGames the rights for the franchise. The development team envisioned Wolfenstein: The New Order as a first-person action-adventure game, taking inspiration from previous games in the series and particularly focusing on the combat and adventure elements. The game attempts to delve into character development of Blazkowicz, unlike its predecessors—a choice from the developers to interest players in the story. They also aimed to portray him in a heroic fashion. At release, Wolfenstein: The New Order received generally positive reviews, with praise particularly directed at the combat and the narrative of the game. Critics considered it a positive change to the series and nominated it for multiple year-end accolades, including Game of the Year and Best Shooter awards from several gaming publications. A stand-alone expansion was released in May 2015, set before the events of the game and entitled Wolfenstein: The Old Blood. A sequel, Wolfenstein II: The New Colossus, was released in October 2017.', NULL, 25.99),
  (5, 'Far Cry New Dawn', '2019-02-15', 6, 'Sebastien Ebacher', 'AAG, FPS', 'Far Cry New Dawn is an action-adventure first-person shooter developed by Ubisoft Montreal and published by Ubisoft. The game is a spin-off of the Far Cry series and a narrative sequel to Far Cry 5.', 'Similar to its predecessors, Far Cry New Dawn is an action-adventure first-person shooter set in an open world environment which the player can explore freely on foot or via various vehicles. The game is set in the fictional Hope County, Montana and uses a reimagined version of Far Cry 5''s map. The nuclear war portrayed in Far Cry 5 has reshaped the landscape so that new areas have become available for the player to explore while others are inaccessible. The player assumes the role of a new character, whose gender and race can be customized.[1] The Guns for Hire and the Fangs for Hire systems from Far Cry 5 return, with the character being able to recruit human survivors and animals for combat assistance.[2] In addition to new characters, the game''s cast includes an array of returning characters from Far Cry 5. The player character can also encounter several specialists who have their own personal missions, special abilities and story and help players to repair their weapons. New weapons are introduced in the game, including a "Saw Launcher" that fires the blades of circular saws. Players acquire new weapons and attachments, which can be upgraded to three different levels through crafting and finishing missions. Vehicles can also be crafted.[3] Players can embark on treasure hunts and liberate different enemy encampments and outposts. Once liberated, they become fast travel points that enable players to quickly navigate the world. These outposts can be occupied and used to manufacture ethanol fuel or raided for resources which leaves the outpost open to "escalation", in which the Highwaymen may reclaim these camps.[2] This allows the player to replay the outposts on higher difficulty settings. The game also features an upgradable home base named Prosperity, which would slowly expand and grow in size as players progress. The game also features a mode called "Expeditions", which allows the player to travel to other locations in the United States such as Louisiana to look for more resources and packages.[1] As these regions are outside the main map and smaller in size, the development team was able to create more complex environments for Expeditions. Expedition missions can be', NULL, 60.20);

INSERT INTO gameInventoryIMG (GIID, IMG) VALUES
  (1, 'FarCry5.webp'),
  (1, 'FarCry5IMG1.jpg'),
  (1, 'FarCry5IMG2.jpg'),
  (1, 'FarCry5IMG3.jpg'),
  (1, 'FarCry5IMG4.jpg'),
  (1, 'FarCry5IMG5.jpg'),
  (2, 'MetroExodus.webp'),
  (2, 'MetroExodusIMG1.jpg'),
  (2, 'MetroExodusIMG2.jpg'),
  (2, 'MetroExodusIMG3.jpg'),
  (2, 'MetroExodusIMG4.jpg'),
  (2, 'MetroExodusIMG5.jpg'),
  (2, 'MetroExodusIMG6.jpg'),
  (3, 'Prey.png'),
  (3, 'PreyIMG1.jpg'),
  (3, 'PreyIMG2.jpg'),
  (3, 'PreyIMG3.jpg'),
  (4, 'WolfensteinTheNewOrder.webp'),
  (4, 'WolfensteinTheNewOrderIMG1.webp'),
  (4, 'WolfensteinTheNewOrderIMG2.webp'),
  (4, 'WolfensteinTheNewOrderIMG3.webp'),
  (4, 'WolfensteinTheNewOrderIMG4.webp'),
  (4, 'WolfensteinTheNewOrderIMG5.webp'),
  (4, 'WolfensteinTheNewOrderIMG6.webp'),
  (4, 'WolfensteinTheNewOrderIMG7.webp'),
  (4, 'WolfensteinTheNewOrderIMG8.webp'),
  (4, 'WolfensteinTheNewOrderIMG9.webp'),
  (4, 'WolfensteinTheNewOrderIMG10.webp'),
  (5, 'WolfensteinTheOldBlood.webp'),
  (5, 'WolfensteinTheOldBloodIMG1.jpg'),
  (5, 'WolfensteinTheOldBloodIMG2.jpg'),
  (5, 'WolfensteinTheOldBloodIMG3.jpg'),
  (5, 'WolfensteinTheOldBloodIMG4.jpg'),
  (5, 'WolfensteinTheOldBloodIMG5.jpg'),
  (5, 'FarcryNewDawn.jpg');

INSERT INTO savedGameInventory (CDID, GIID) VALUES
  (1, 1),
  (1, 3),
  (2, 1),
  (2, 2),
  (3, 3),
  (3, 5);

INSERT INTO guestGameComments (GGCID, GIID, username, date, comment) VALUES
  (1, 1, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (2, 2, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (3, 3, 'Prox', '2019-04-25 16:51:34', 'great game');

INSERT INTO userGameComment (UGCID, CPID, GIID, date, comment) VALUES
  (NULL, 1, 1, '2019-04-25 16:51:34', 'great game'),
  (NULL, 1, 2, '2019-04-25 16:51:34', 'great game'),
  (NULL, 1, 3, '2019-04-25 16:51:34', 'great game'),
  (NULL, 2, 2, '2019-04-25 16:51:34', 'great game'),
  (NULL, 3, 3, '2019-04-25 16:51:34', 'great game');

INSERT INTO consoleInventory(CIID, productName, producer, manufacturer, platForm, releaseDates, briefDescription, longDescription, price) VALUES
(1, 'Nintendo Switch Black', 'Nintendo', 'Foxconn', 4, '2017-03-03',  'The Nintendo Switch is a hybrid video game console, consisting of a console unit, a dock, and two Joy-Con controllers. Although it is a hybrid console, Nintendo classifies it as "a home console that you can take with you on the go', 'The Nintendo Switch[a] is a video game console developed by Nintendo and released on March 3, 2017. It is a hybrid console that can be used as both a stationary and portable device. Its wireless Joy-Con controllers, which include standard buttons and directional analog sticks for user input, motion sensing, and high-definition tactile feedback, can attach to both sides of the console to support handheld-style play. They can also connect to a Grip accessory to provide a traditional home console gamepad form, or be used individually in the hand like the Wii Remote and Nunchuk, supporting local multiplayer modes. The Nintendo Switch''s software supports online gaming through standard Internet connectivity, as well as local wireless ad hoc connectivity with other Switch consoles. Nintendo Switch games and software are available on both physical flash-based ROM cartridges and digital distribution via Nintendo eShop; the system does not use region locking. As an eighth-generation console, the Nintendo Switch competes with Microsoft''s Xbox One and Sony''s PlayStation 4. Known in development by its codename NX, the concept of the Switch came about as Nintendo''s reaction to several quarters of financial losses into 2014, attributed to poor sales of its previous console, the Wii U, and market competition from mobile gaming. Nintendo''s then-president Satoru Iwata pushed the company towards mobile gaming and novel hardware. The Nintendo Switch''s design is aimed at a wide demographic of video game players through the multiple modes of use. Nintendo opted to use more standard electronic components, such as a chipset based on Nvidia''s Tegra line, to make development for the console easier for programmers and more compatible with existing game engines. As the Wii U had struggled to gain external support, leaving it with a weak software library, Nintendo preemptively sought the support of many third-party developers and publishers to help build out the Switch''s game library alongside Nintendo''s own first-party titles, including many independent video game studios. While Nintendo initially anticipated around 100 titles for its first year, over 320 titles from first-party, third-party, and independent developers were released by the end of 2017. The Nintendo Switch was unveiled in October 2016 and was released in most areas worldwide on March 3, 2017.[b] The console shipped nearly three million in the first month of its launch, exceeding Nintendo''s initial projection of two million, and within a year of release achieved over 14 million units sold worldwide, outselling total lifetime sales of the Wii U. By the start of 2018, the Switch became the fastest-selling home console in both Japan and the United States. As of December 2018, Nintendo Switch has sold more than 32 million units worldwide. Switch sales have been strongly tied to sales of Nintendo''s first-party titles, with five games, The Legend of Zelda: Breath of the Wild, Super Smash Bros. Ultimate, Super Mario Odyssey, Mario Kart 8 Deluxe, and Pokémon: Let''s Go having sold over ten million units each. A handheld-focused revision of the system, called the Nintendo Switch Lite, is scheduled for release in September 2019.', 911.03),
(2, 'Nintendo Switch Red', 'Nintendo', 'Foxconn', 4, '2017-03-03', 'The Nintendo Switch is a hybrid video game console, consisting of a console unit, a dock, and two Joy-Con controllers. Although it is a hybrid console, Nintendo classifies it as "a home console that you can take with you on the go', 'The Nintendo Switch[a] is a video game console developed by Nintendo and released on March 3, 2017. It is a hybrid console that can be used as both a stationary and portable device. Its wireless Joy-Con controllers, which include standard buttons and directional analog sticks for user input, motion sensing, and high-definition tactile feedback, can attach to both sides of the console to support handheld-style play. They can also connect to a Grip accessory to provide a traditional home console gamepad form, or be used individually in the hand like the Wii Remote and Nunchuk, supporting local multiplayer modes. The Nintendo Switch''s software supports online gaming through standard Internet connectivity, as well as local wireless ad hoc connectivity with other Switch consoles. Nintendo Switch games and software are available on both physical flash-based ROM cartridges and digital distribution via Nintendo eShop; the system does not use region locking. As an eighth-generation console, the Nintendo Switch competes with Microsoft''s Xbox One and Sony''s PlayStation 4. Known in development by its codename NX, the concept of the Switch came about as Nintendo''s reaction to several quarters of financial losses into 2014, attributed to poor sales of its previous console, the Wii U, and market competition from mobile gaming. Nintendo''s then-president Satoru Iwata pushed the company towards mobile gaming and novel hardware. The Nintendo Switch''s design is aimed at a wide demographic of video game players through the multiple modes of use. Nintendo opted to use more standard electronic components, such as a chipset based on Nvidia''s Tegra line, to make development for the console easier for programmers and more compatible with existing game engines. As the Wii U had struggled to gain external support, leaving it with a weak software library, Nintendo preemptively sought the support of many third-party developers and publishers to help build out the Switch''s game library alongside Nintendo''s own first-party titles, including many independent video game studios. While Nintendo initially anticipated around 100 titles for its first year, over 320 titles from first-party, third-party, and independent developers were released by the end of 2017. The Nintendo Switch was unveiled in October 2016 and was released in most areas worldwide on March 3, 2017.[b] The console shipped nearly three million in the first month of its launch, exceeding Nintendo''s initial projection of two million, and within a year of release achieved over 14 million units sold worldwide, outselling total lifetime sales of the Wii U. By the start of 2018, the Switch became the fastest-selling home console in both Japan and the United States. As of December 2018, Nintendo Switch has sold more than 32 million units worldwide. Switch sales have been strongly tied to sales of Nintendo''s first-party titles, with five games, The Legend of Zelda: Breath of the Wild, Super Smash Bros. Ultimate, Super Mario Odyssey, Mario Kart 8 Deluxe, and Pokémon: Let''s Go having sold over ten million units each. A handheld-focused revision of the system, called the Nintendo Switch Lite, is scheduled for release in September 2019.', 911.03),
(3, 'Playstation 4 Black', 'Sony Corporation', 'Foxconn', 3, '2013-11-15',  'The original PS4 model can output in 4K and play multimedia in the format, but does not play games in 4K. The console includes a 500 gigabyte hard drive for additional storage, which can be upgraded by the user. ... The PlayStation 4 features Wi-Fi and Ethernet connectivity, Bluetooth, and two USB 3.0 ports.', 'The PlayStation 4 (officially abbreviated as PS4) is an eighth-generation home video game console developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 in February 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia, and on February 22, 2014, in Japan. It competes with Microsoft''s Xbox One and Nintendo''s Wii U and Switch. Moving away from the more complex Cell microarchitecture of its predecessor, the console features an AMD Accelerated Processing Unit (APU) built upon the x86-64 architecture, which can theoretically peak at 1.84 teraflops; AMD stated that it was the "most powerful" APU it had developed to date. The PlayStation 4 places an increased emphasis on social interaction and integration with other devices and services, including the ability to play games off-console on PlayStation Vita and other supported devices ("Remote Play"), the ability to stream gameplay online or to friends, with them controlling gameplay remotely ("Share Play"). The console''s controller was also redesigned and improved over the PlayStation 3, with improved buttons and analog sticks, and an integrated touchpad among other changes. The console also supports HDR10 High-dynamic-range video and playback of 4K resolution multimedia. The PlayStation 4 was released to critical acclaim, with critics praising Sony for acknowledging its consumers'' needs, embracing independent game development, and for not imposing the restrictive digital rights management schemes like those originally announced by Microsoft for the Xbox One. Critics and third-party studios also praised the capabilities of the PlayStation 4 in comparison to its competitors; developers described the performance difference between the console and Xbox One as "significant" and "obvious".[11] Heightened demand also helped Sony top global console sales. By the end of December 2018, over 94 million PlayStation 4 consoles had been shipped worldwide, surpassing lifetime sales of the PlayStation 3.[12] On September 7, 2016, Sony unveiled the PlayStation 4 Slim, a smaller version of the console; and a high-end version called the PlayStation 4 Pro, which features an upgraded GPU and a higher CPU clock rate to support enhanced performance and 4K resolution in supported games', 500.69),
(4, 'Playstation 4 White', 'Sony Corporation', 'Foxconn', 3, '2013-11-15',  'The original PS4 model can output in 4K and play multimedia in the format, but does not play games in 4K. The console includes a 500 gigabyte hard drive for additional storage, which can be upgraded by the user. ... The PlayStation 4 features Wi-Fi and Ethernet connectivity, Bluetooth, and two USB 3.0 ports.', 'The PlayStation 4 (officially abbreviated as PS4) is an eighth-generation home video game console developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 in February 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia, and on February 22, 2014, in Japan. It competes with Microsoft''s Xbox One and Nintendo''s Wii U and Switch. Moving away from the more complex Cell microarchitecture of its predecessor, the console features an AMD Accelerated Processing Unit (APU) built upon the x86-64 architecture, which can theoretically peak at 1.84 teraflops; AMD stated that it was the "most powerful" APU it had developed to date. The PlayStation 4 places an increased emphasis on social interaction and integration with other devices and services, including the ability to play games off-console on PlayStation Vita and other supported devices ("Remote Play"), the ability to stream gameplay online or to friends, with them controlling gameplay remotely ("Share Play"). The console''s controller was also redesigned and improved over the PlayStation 3, with improved buttons and analog sticks, and an integrated touchpad among other changes. The console also supports HDR10 High-dynamic-range video and playback of 4K resolution multimedia. The PlayStation 4 was released to critical acclaim, with critics praising Sony for acknowledging its consumers'' needs, embracing independent game development, and for not imposing the restrictive digital rights management schemes like those originally announced by Microsoft for the Xbox One. Critics and third-party studios also praised the capabilities of the PlayStation 4 in comparison to its competitors; developers described the performance difference between the console and Xbox One as "significant" and "obvious".[11] Heightened demand also helped Sony top global console sales. By the end of December 2018, over 94 million PlayStation 4 consoles had been shipped worldwide, surpassing lifetime sales of the PlayStation 3.[12] On September 7, 2016, Sony unveiled the PlayStation 4 Slim, a smaller version of the console; and a high-end version called the PlayStation 4 Pro, which features an upgraded GPU and a higher CPU clock rate to support enhanced performance and 4K resolution in supported games', 200.69),
(5, 'XBOX One S Black', 'Microsoft Corporation', 'Flex', 2, '2016-02-08',  'The original PS4 model can output in 4K and play multimedia in the format, but does not play games in 4K. The console includes a 500 gigabyte hard drive for additional storage, which can be upgraded by the user. ... The PlayStation 4 features Wi-Fi and Ethernet connectivity, Bluetooth, and two USB 3.0 ports.', 'The PlayStation 4 (officially abbreviated as PS4) is an eighth-generation home video game console developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 in February 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia, and on February 22, 2014, in Japan. It competes with Microsoft''s Xbox One and Nintendo''s Wii U and Switch. Moving away from the more complex Cell microarchitecture of its predecessor, the console features an AMD Accelerated Processing Unit (APU) built upon the x86-64 architecture, which can theoretically peak at 1.84 teraflops; AMD stated that it was the "most powerful" APU it had developed to date. The PlayStation 4 places an increased emphasis on social interaction and integration with other devices and services, including the ability to play games off-console on PlayStation Vita and other supported devices ("Remote Play"), the ability to stream gameplay online or to friends, with them controlling gameplay remotely ("Share Play"). The console''s controller was also redesigned and improved over the PlayStation 3, with improved buttons and analog sticks, and an integrated touchpad among other changes. The console also supports HDR10 High-dynamic-range video and playback of 4K resolution multimedia. The PlayStation 4 was released to critical acclaim, with critics praising Sony for acknowledging its consumers'' needs, embracing independent game development, and for not imposing the restrictive digital rights management schemes like those originally announced by Microsoft for the Xbox One. Critics and third-party studios also praised the capabilities of the PlayStation 4 in comparison to its competitors; developers described the performance difference between the console and Xbox One as "significant" and "obvious".[11] Heightened demand also helped Sony top global console sales. By the end of December 2018, over 94 million PlayStation 4 consoles had been shipped worldwide, surpassing lifetime sales of the PlayStation 3.[12] On September 7, 2016, Sony unveiled the PlayStation 4 Slim, a smaller version of the console; and a high-end version called the PlayStation 4 Pro, which features an upgraded GPU and a higher CPU clock rate to support enhanced performance and 4K resolution in supported games', 420.96),
(6, 'XBOX One S White', 'Microsoft Corporation', 'Flex', 2, '2016-02-08', 'The original PS4 model can output in 4K and play multimedia in the format, but does not play games in 4K. The console includes a 500 gigabyte hard drive for additional storage, which can be upgraded by the user. ... The PlayStation 4 features Wi-Fi and Ethernet connectivity, Bluetooth, and two USB 3.0 ports.', 'The PlayStation 4 (officially abbreviated as PS4) is an eighth-generation home video game console developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 in February 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia, and on February 22, 2014, in Japan. It competes with Microsoft''''s Xbox One and Nintendo''''s Wii U and Switch. Moving away from the more complex Cell microarchitecture of its predecessor, the console features an AMD Accelerated Processing Unit (APU) built upon the x86-64 architecture, which can theoretically peak at 1.84 teraflops; AMD stated that it was the "most powerful" APU it had developed to date. The PlayStation 4 places an increased emphasis on social interaction and integration with other devices and services, including the ability to play games off-console on PlayStation Vita and other supported devices ("Remote Play"), the ability to stream gameplay online or to friends, with them controlling gameplay remotely ("Share Play"). The console''''s controller was also redesigned and improved over the PlayStation 3, with improved buttons and analog sticks, and an integrated touchpad among other changes. The console also supports HDR10 High-dynamic-range video and playback of 4K resolution multimedia. The PlayStation 4 was released to critical acclaim, with critics praising Sony for acknowledging its consumers'''' needs, embracing independent game development, and for not imposing the restrictive digital rights management schemes like those originally announced by Microsoft for the Xbox One. Critics and third-party studios also praised the capabilities of the PlayStation 4 in comparison to its competitors; developers described the performance difference between the console and Xbox One as "significant" and "obvious".[11] Heightened demand also helped Sony top global console sales. By the end of December 2018, over 94 million PlayStation 4 consoles had been shipped worldwide, surpassing lifetime sales of the PlayStation 3.[12] On September 7, 2016, Sony unveiled the PlayStation 4 Slim, a smaller version of the console; and a high-end version called the PlayStation 4 Pro, which features an upgraded GPU and a higher CPU clock rate to support enhanced performance and 4K resolution in supported games', 420.96);

INSERT INTO consoleInventoryIMG (CIID, IMG) VALUE
  (1, 'NintendoSwitchBlack.webp'),
  (1, 'NintendoSwitchBlackIMG1.jpg'),
  (1, 'NintendoSwitchBlackIMG2.jpg'),
  (1, 'NintendoSwitchBlackIMG3.jpg'),
  (1, 'NintendoSwitchBlackIMG4.jpg'),
  (1, 'NintendoSwitchBlackIMG5.jpg'),
  (1, 'NintendoSwitchBlackIMG6.jpg'),
  (2, 'NintendoSwitchRed.webp'),
  (2, 'NintendoSwitchRedIMG1.jpg'),
  (2, 'NintendoSwitchRedIMG2.jpg'),
  (2, 'NintendoSwitchRedIMG3.jpg'),
  (2, 'NintendoSwitchRedIMG4.jpg'),
  (2, 'NintendoSwitchRedIMG5.jpg'),
  (2, 'NintendoSwitchRedIMG6.jpg'),
  (3, 'PS4Black.jpg'),
  (3, 'PS4BlackIMG1.jpg'),
  (4, 'PS4White.jpg'),
  (4, 'PS4WhiteIMG1.jpg'),
  (5, 'XBOXOneSBlack.jpg'),
  (5, 'XBOXOneSBlackIMG1.jpg'),
  (6, 'XBOXOneSWhite.jpg'),
  (6, 'XBOXOneSWhiteIMG1.jpg');


INSERT INTO savedConsoleInventory (CDID, CIID) VALUES
  (1, 1),
  (1, 2),
  (1, 3),
  (1, 4),
  (1, 5),
  (1, 6),
  (2, 2),
  (3, 3);

INSERT INTO guestConsoleComments (GCCID, CIID, username, date, comment) VALUES
  (1, 1, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (2, 2, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (3, 3, 'Prox', '2019-04-25 16:51:34', 'great game');

INSERT INTO userConsoleComment (UCCID, CPID, CIID, date, comment) VALUES
  (NULL, 1, 1, '2019-04-25 16:51:34', 'great console'),
  (NULL, 1, 2, '2019-04-25 16:51:34', 'great console'),
  (NULL, 1, 3, '2019-04-25 16:51:34', 'great console'),
  (NULL, 2, 2, '2019-04-25 16:51:34', 'great console'),
  (NULL, 3, 3, '2019-04-25 16:51:34', 'great console');