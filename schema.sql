CREATE TABLE public.user (

  user_id mediumint(8) UNSIGNED NOT NULL,
  username varchar(30) NOT NULL,
  pass char(40) NOT NULL,
  email VARCHAR(256) PRIMARY KEY
);

CREATE TABLE public.project (
  title VARCHAR(256) PRIMARY KEY,
  target_amount INTEGER NOT NULL,
  created_by VARCHAR(256) REFERENCES public.user(email) ON DELETE CASCADE,
  current_value INTEGER DEFAULT 0
);

CREATE TABLE public.backing (
  backed_by VARCHAR(256) references public.user(email) ON DELETE CASCADE,
  backed_for VARCHAR(256) references public.project(title) ON DELETE CASCADE,
  amount MONEY NOT NULL
);
