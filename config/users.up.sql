CREATE TABLE IF NOT EXISTS users(
    user_id VARCHAR(255) PRIMARY KEY NOT NULL,
    user_type VARCHAR(5) NOT NULL,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    jwt_token TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL
)