<?php
    
    class new{
        public function up()
        {
           return "CREATE TABLE IF NOT EXISTS  new (
                      id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                      username VARCHAR(50),
                      pimg VARCHAR(50),
                      email VARCHAR(50),
                      password VARCHAR(50)
           )
           ENGINE = INNODB;";
        }
        public function down()
        {
           return  "DROP TABLE IF EXISTS  new;";
     }
    }
    