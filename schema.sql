CREATE TABLE user (
  email VARCHAR(256) PRIMARY KEY
);

CREATE TABLE project (
  name VARCHAR(256) PRIMARY KEY
  type VARCHAR(64)
  target INTEGER NOT NULL
  created_by VARCHAR(256) REFERENCES user(email) ON DELETE CASCADE
  current_value INTEGER DEFAULT 0
);

CREATE TABLE backing (
  backed_by VARCHAR(256) references user(email) ON DELETE CASCADE
  backed_for VARCHAR(256) references project(name) ON DELETE CASCADE
  amount DOUBLE
);