SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `steam-store` DEFAULT CHARACTER SET utf8 ;
USE `steam-store` ;

DROP TABLE IF EXISTS `steam-store`.`User` ;

CREATE TABLE IF NOT EXISTS `steam-store`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `firstName` VARCHAR(255) NOT NULL,
  `lastName` VARCHAR(255) NOT NULL,
  `imagePath` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `steam-store`.`Game` ;

CREATE TABLE IF NOT EXISTS `steam-store`.`Game` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `releaseDate` DATE NOT NULL,
  `developer` VARCHAR(255) NOT NULL,
  `publisher` VARCHAR(255) NOT NULL,
  `genres` VARCHAR(255) NOT NULL,
  `price` DOUBLE NOT NULL,
  `imageUrl` VARCHAR(500) NOT NULL,
  `description` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `steam-store`.`Library` ;

CREATE TABLE IF NOT EXISTS `steam-store`.`Library` (
  `userId` INT NOT NULL,
  `gameId` INT NOT NULL,
  PRIMARY KEY (`userId`, `gameId`),
  INDEX `fk_User_has_Game_Game1_idx` (`gameId` ASC),
  INDEX `fk_User_has_Game_User_idx` (`userId` ASC),
  CONSTRAINT `fk_User_has_Game_User`
    FOREIGN KEY (`userId`)
    REFERENCES `steam-store`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Game_Game1`
    FOREIGN KEY (`gameId`)
    REFERENCES `steam-store`.`Game` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `steam-store`.`Game` VALUES 
(1,
'Grand Theft Auto V',
'2015-04-14',
'Rockstar North',
'Rockstar Games',
'Open World, Action, Multiplayer, Automobile Sim',
14.79,
'https://www.gamershop99.com/wp-content/uploads/2021/04/Grand-Theft-Auto-V-300x300.jpg',
'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled 
with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and 
the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city 
in which they can trust nobody, least of all each other. Grand Theft Auto V for PC offers players the option 
to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, 
as well as the chance to experience the game running at 60 frames per second. The game offers players a 
huge range of PC-specific customization options, including over 25 separate configurable settings for 
texture quality, shaders, tessellation, anti-aliasing and more, as well as support and extensive 
customization for mouse and keyboard controls. Additional options include a population density slider 
to control car and pedestrian traffic, as well as dual and triple monitor support, 3D compatibility, 
and plug-and-play controller support. Grand Theft Auto V for PC also includes Grand Theft Auto Online, 
with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing 
gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, 
including Heists and Adversary modes. The PC version of Grand Theft Auto V and Grand Theft Auto Online 
features First Person Mode, giving players the chance to explore the incredibly detailed world of Los 
Santos and Blaine County in an entirely new way. Grand Theft Auto V for PC also brings the debut of 
the Rockstar Editor, a powerful suite of creative tools to quickly and easily capture, edit and share 
game footage from within Grand Theft Auto V and Grand Theft Auto Online. The Rockstar Editor’s Director 
Mode allows players the ability to stage their own scenes using prominent story characters, pedestrians, 
and even animals to bring their vision to life. Along with advanced camera manipulation and editing effects 
including fast and slow motion, and an array of camera filters, players can add their own music using songs 
from GTAV radio stations, or dynamically control the intensity of the game’s score. Completed videos can be 
uploaded directly from the Rockstar Editor to YouTube and the Rockstar Games Social Club for easy sharing. 
Soundtrack artists The Alchemist and Oh No return as hosts of the new radio station, The Lab FM. The station 
features new and exclusive music from the production duo based on and inspired by the game’s original soundtrack. 
Collaborating guest artists include Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Sam Herring 
from Future Islands, and more. Players can also discover Los Santos and Blaine County while enjoying their 
own music through Self Radio, a new radio station that will host player-created custom soundtracks. Special 
access content requires Rockstar Games Social Club account.'),
(2,
'Saints Row: The Third',
'2011-11-18',
'Volition',
'Deep Silver',
'Open World, Action, Comedy, Co-op, Funny',
9.99,
'https://savegame.pro/wp-content/uploads/2020/11/saints-row-the-third-remastered-cover.jpg',
'Years after taking Stilwater for their own, the Third Street Saints have evolved from street gang to 
household brand name, with Saints sneakers, Saints energy drinks and Johnny Gat bobble head dolls all 
available at a store near you. The Saints are kings of Stilwater, but their celebrity status has not 
gone unnoticed. The Syndicate, a legendary criminal fraternity with pawns in play all over the globe, 
has turned its eye on the Saints and demands tribute. Refusing to kneel to the Syndicate, you take the 
fight to Steelport, a once-proud metropolis reduced to a struggling city of sin under Syndicate control.
Take a tank skydiving, call in a satellite-targeted airstrike on a Mexican wrestling gang, and defend 
yourself against a highly-trained military force using only a sex toy in the most out- landish gameplay 
scenarios ever seen, igniting a city-wide war that will set Steelport on fire. Strap it on.'),
(3,
'Counter-Strike: Global Offensive',
'2012-08-21',
'Valve, Hidden Path Entertainment',
'Valve',
'FPS, Shooter, Multiplayer, Competitive, Action',
0.00,
'http://dunyapin.com/sites/files/urunler/counter-strike-global-offensive-csgo_1566634649.png',
'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered 
when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and 
delivers updated versions of the classic CS content (de_dust2, etc.). Counter-Strike took the gaming 
industry by surprise when the unlikely MOD became the most played online PC action game in the world 
almost immediately after its release in August 1999, said Doug Lombardi at Valve. For the past 12 
years, it has continued to be one of the most-played games in the world, headline competitive gaming 
tournaments and selling over 25 million units worldwide across the franchise. CS: GO promises to expand 
on CS award-winning gameplay and deliver it to gamers on the PC as well as the next gen consoles and the Mac.'),
(4,
'Watch Dogs',
'2014-05-26',
'Ubisoft',
'Ubisoft',
'Open World, Hacking, Action, Multiplayer, Epic',
29.99,
'https://m.media-amazon.com/images/S/aplus-media/sota/96934366-0e88-4cfd-a7c2-4cae742b81f4.__CR0,14,300,300_PT0_SX300_V1___.jpg',
'All it takes is the swipe of a finger. We connect with friends. We buy the latest gadgets and gear. We 
find out what’s happening in the world. But with that same simple swipe, we cast an increasingly expansive 
shadow. With each connection, we leave a digital trail that tracks our every move and milestone, our every 
like and dislike. And it’s not just people. Today, all major cities are networked. Urban infrastructures 
are monitored and controlled by complex operating systems. In Watch_Dogs, this system is called the Central 
Operating System (CTOS) – and it controls almost every piece of the city’s technology and holds key information 
on all of the city’s residents. You play as Aiden Pearce, a brilliant hacker and former thug, whose criminal 
past led to a violent family tragedy. Now on the hunt for those who hurt your family, you’ll be able to monitor 
and hack all who surround you by manipulating everything connected to the city’s network. Access omnipresent 
security cameras, download personal information to locate a target, control traffic lights and public 
transportation to stop the enemy…and more. Use the city of Chicago as your ultimate weapon and exact your 
own style of revenge.'),
(5,
'Watch Dogs 2',
'2016-11-29',
'Ubisoft',
'Ubisoft',
'Open World, Illuminati, Hacking, Action, Stealth',
59.99,
'https://savegame.pro/wp-content/uploads/2019/07/watch-dogs-2-cover.jpg',
'Play as Marcus Holloway, a brilliant young hacker living in the birthplace of the tech revolution, the San 
Francisco Bay Area. Team up with Dedsec, a notorious group of hackers, to execute the biggest hack in history; 
take down ctOS 2.0, an invasive operating system being used by criminal masterminds to monitor and manipulate 
citizens on a massive scale.'),
(6,
'Farming Simulator 22',
'2021-11-22',
'Giants Software',
'Giants Software',
'Co-op, Simulation, Farming Sim, Agriculture',
39.99,
'https://cheapdigitaldownload.com/wp-content/uploads/farming-simulator-22_featured-300x300-2.jpg',
'Take on the role of a modern farmer! Agriculture, animal husbandry and forestry offer a huge variety of 
farming activities while you face the challenges of the four seasons, especially when winter sets in. 
Creatively build your own farm and extend your farming operations with production chains - forming an 
agricultural empire! Even run your farm together with friends and enjoy crossplatform multiplayer together. 
Whether you create a lush vineyard or an olive orchard in the Mediterranean south of France, a vast 
farmland full of wheat, corn, potatoes and cotton in the US-Midwest or a lively animal farm in the hilly 
landscape of the European Alpine region: More than 400 machines and tools from over 100 real agricultural 
brands like Case IH, CLAAS, Fendt, John Deere, Massey Ferguson, New Holland, Valtra and many more are 
available for your farm. Farming Simulator 22 brings a multitude of new gameplay features and offers more 
content and player freedom than ever before, including new ground working features like mulching or stone 
picking, an improved build-mode adding greenhouses and beehives, as well as a new character creator to 
bring your own, individual farmer to life. A large variety of free community-created modifications, 
officially tested by the developer GIANTS Software, will extend your farming experience many times over. 
Rise to the challenges of becoming a successful farmer, start farming and let the good times grow!'),
(7,
'FIFA 22',
'2021-10-01',
'EA Canada & EA Romania',
'Electronic Arts',
'Soccer, Sports, Multiplayer, Competitive, PvP',
59.99,
'https://wolfer.rs/wp-content/uploads/2021/10/fifa-22-career-featured-300x300.jpg',
'Powered by Football, EA SPORTS FIFA 22 brings the game even closer to the real thing with fundamental 
gameplay advances and a new season of innovation across every mode. What is FIFA? Play The World’s Game 
with 17,000+ players, over 700 teams in 90+ stadiums and more than 30 leagues from all over the globe.'),
(8,
'Dota 2',
'2013-07-09',
'Valve',
'Valve',
'Free to Play, MOBA, Multiplayer, Strategy, PvP',
0.00,
'https://epins-gamestore.com/image/cache/catalog/Allsever/DirectTopup/imageedit_158_3532924931-300x300.jpg',
'Every day, millions of players worldwide enter battle as one of over a hundred Dota heroes. And no matter if it’s 
their 10th hour of play or 1,000th, there’s always something new to discover. With regular updates that ensure a 
constant evolution of gameplay, features, and heroes, Dota 2 has truly taken on a life of its own. When it comes 
to diversity of heroes, abilities, and powerful items, Dota boasts an endless array—no two games are the same. 
Any hero can fill multiple roles, and there’s an abundance of items to help meet the needs of each game. Dota doesn’t 
provide limitations on how to play, it empowers you to express your own style. Competitive balance is Dota’s crown 
jewel, and to ensure everyone is playing on an even field, the core content of the game—like the vast pool of 
heroes—is available to all players. Fans can collect cosmetics for heroes and fun add-ons for the world they inhabit, 
but everything you need to play is already included before you join your first match. Dota is deep, and constantly 
evolving, but it’s never too late to join. Learn the ropes playing co-op vs. bots. Sharpen your skills in the hero 
demo mode. Jump into the behavior- and skill-based matchmaking system that ensures you’ll be matched with the right 
players each game.'),
(9,
'Santa Claus in Trouble (HD)',
'2020-12-21',
'Joymania Development',
'Joymania Development',
'Action, Casual, 3D Platformer, Family Friendly',
9.99,
'https://www.allkeyshop.com/blog/wp-content/uploads/buy-santa-claus-in-trouble-hd-cd-key-compare-prices.jpg',
'Oh no - just before his busiest day of the year, Christmas Eve, Santa has lost all the presents! Help Santa Claus 
collect the colorful packages in this wonderful Jump’n’Run. In doing so you will not only save the day but Christmas 
as well! But it’s not as easy as you might think - there are presents all over the place. Santa Claus doesn’t just 
have to watch out that he doesn’t fall into an abyss, he also has to stay out of the way of nasty creatures. An 
exciting adventure is just waiting for the kids in your life and especially the kid in you!'),
(10,
'Call of Duty: Black Ops',
'2010-11-09',
'Treyarch',
'Activision',
'Action, FPS, Zombies, Multiplayer, Shooter',
39.99,
'https://i.pinimg.com/originals/c1/23/d0/c123d0752f71e46e6bdf9e9fed652f9f.jpg',
'The biggest first-person action series of all time and the follow-up to last year’s blockbuster Call of Duty: Modern 
Warfare 2 returns with Call of Duty: Black Ops. Call of Duty: Black Ops will take you behind enemy lines as a member 
of an elite special forces unit engaging in covert warfare, classified operations, and explosive conflicts across the 
globe. With access to exclusive weaponry and equipment, your actions will tip the balance during the most dangerous 
time period mankind has ever known.'),
(11,
'Rust',
'2018-02-08',
'Facepunch Studios',
'Facepunch Studios',
'Survival, Crafting, Multiplayer, Open World',
39.99,
'https://djwk.eu/wp-content/uploads/2019/07/EUST-300x300.png',
'The only aim in Rust is to survive. Everything wants you to die - the island’s wildlife and other inhabitants, the 
environment, other survivors. Do whatever it takes to last another night. Rust is in its 8th year and has now had 
over 300 content updates, with a guaranteed content patch every month. From regular balance fixes and improvements 
to AI and graphics updates to adding content like new maps, musical instruments, trains and drones, as well as 
regular seasons and events, there’s always something interesting or dangerous (or both) happening on the island. 
Updates to the game include: procedurally generated worlds with map editor support, host your own servers and with 
server-side modding support, horses, modular cars, hot air balloons, helicopters, trains, complex electrical systems, 
farming, new enemies, wildlife and factions, new monuments and areas to explore, gestures and contact system, 
musical instruments, large train network, huge recent graphics overhaul...'),
(12,
'The Sims 4',
'2014-09-02',
'Maxis',
'Electronic Arts',
'Life Sim, Character Customization, Building, Cute',
39.99,
'https://productscrack.com/wp-content/uploads/2020/12/The-Sims-4-Crack-300x300.jpg',
'Unleash your imagination and create a world of Sims that’s wholly unique. Explore and customize every detail 
from Sims to homes and much more. Choose how Sims look, act and dress. Determine how they’ll live out each day. 
Design and build incredible homes for every family, then decorate with your favorite furnishings and decor. 
Travel to different neighborhoods where you can meet other Sims and learn about their lives. Discover beautiful 
locations with distinctive environments, and go on spontaneous adventures. Manage the ups and downs of Sims’ 
everyday lives, and see what happens when you play out realistic or fantastical scenarios. Tell your stories 
your way while developing relationships, pursuing careers and life aspirations and immersing yourself in an 
extraordinary game where the possibilities are endless.');

INSERT INTO `steam-store`.`User` VALUES (1, 'risbo99', 'risbo99', 'Boris', 'Precijan', '');

INSERT INTO `steam-store`.`Library` VALUES (1, 1), (1, 2), (1, 3), (1, 4), (1, 8), (1, 9), (1, 11);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
