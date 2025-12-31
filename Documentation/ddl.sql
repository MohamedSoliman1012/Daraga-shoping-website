CREATE TABLE users (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  email varchar(150) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
);

CREATE TABLE products (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  price decimal(10,2) NOT NULL,
  details text NOT NULL,
  image varchar(255) NOT NULL,
  category varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(20) NOT NULL,
  address text NOT NULL,
  city varchar(100) NOT NULL,
  payment_method varchar(50) NOT NULL,
  total_price decimal(10,2) NOT NULL,
  status varchar(50) DEFAULT 'pending',
  placed_on datetime DEFAULT current_timestamp(),
  PRIMARY KEY (id),
  KEY fk_orders_user (user_id),
  CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

CREATE TABLE cart (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(255) NOT NULL,
  category varchar(100) NOT NULL,
  quantity int(11) DEFAULT 1,
  PRIMARY KEY (id),
  KEY fk_cart_user (user_id),
  KEY fk_cart_product (product_id),
  CONSTRAINT fk_cart_product FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE,
  CONSTRAINT fk_cart_user FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);