# Game of Three 
The goal is to implement a game with two independent agents – the “players” – communicating with each other using an interface.
When a player starts, a random whole number is generated and sent to the other player, which indicates the start of the game. The receiving player must now add one of { -1, 0, 1 } to get a number that is divisible by 3 and then divide it. The resulting number is then sent back to the original sender. The same rules apply until one of the players reaches the number 1 after division, which ends the game.

### Setup
- Clone repository to your local machine
- Set up the application, go inside the directory:
   
```
cd gameofthree 
```
- Make sure you have composer available:

```
php composer.phar -V
```

- Please install all necessary packages with the following link:
https://getcomposer.org/download/ and run the command 

```
php composer-setup.php --install-dir=bin --filename=composer
mv composer.phar /usr/local/bin/composer
```

- Install all all necessary packages for the task:

```
composer install
```

- Play the game and check the result of the game the the console
```
php play.php
```

- Run all tests for the task: 
```
./vendor/bin/simple-phpunit --debug
```
