CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    published_date DATE,
    cover_image VARCHAR(255)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO books (title, author, genre, published_date, cover_image) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', '1925-04-10', 'uploads/great_gatsby.jpg'),
('To Kill a Mockingbird', 'Harper Lee', 'Classic', '1960-07-11', 'uploads/to_kill_a_mockingbird.jpg'),
('1984', 'George Orwell', 'Dystopian', '1949-06-08', 'uploads/1984.jpg');

INSERT INTO users (username, password) VALUES
('user1', MD5('user1')),
('user2', MD5('user2'));