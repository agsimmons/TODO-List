-- Create 'user' table
DROP TABLE IF EXISTS user;
CREATE TABLE user (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                   username VARCHAR(32) NOT NULL,
                   password VARCHAR(255) NOT NULL);

-- Create 'task' table
DROP TABLE IF EXISTS task;
CREATE TABLE task (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                   fk_user INT NOT NULL,
                   FOREIGN KEY (fk_user) REFERENCES user(id) ON DELETE CASCADE,
                   name VARCHAR(255) NOT NULL,
                   due_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                   description VARCHAR(2048),
                   completed BOOLEAN NOT NULL DEFAULT 0);

-- Create 'tag' table
DROP TABLE IF EXISTS tag;
CREATE TABLE tag (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  fk_task INT NOT NULL,
                  FOREIGN KEY (fk_task) REFERENCES task(id) ON DELETE CASCADE,
                  name VARCHAR(32) NOT NULL);
