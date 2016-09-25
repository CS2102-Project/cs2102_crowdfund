DROP TABLE public.backing;
DROP TABLE public.project;
DROP TABLE public.user;

CREATE TABLE public.user (
  user_id serial NOT NULL,
  username varchar(30) NOT NULL,
  pass char(40) NOT NULL,
  email VARCHAR(256) PRIMARY KEY
);


CREATE TABLE public.project (
  title VARCHAR(256) PRIMARY KEY,
  descripton VARCHAR(256),
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  categories VARCHAR(62) NOT NULL,
  target_amount INTEGER NOT NULL,
  created_by VARCHAR(256) REFERENCES public.user(email) ON DELETE CASCADE
);

CREATE TABLE public.backing (
  backed_by VARCHAR(256) references public.user(email) ON DELETE CASCADE,
  backed_for VARCHAR(256) references public.project(title) ON DELETE CASCADE,
  amount MONEY NOT NULL
);

INSERT INTO public.user VALUES(
  1,
  'crphang',
  'password',
  'crphang@gmail.com'
);

INSERT INTO project VALUES(
  'High Tech Stuff',
  'You will like it alot',
  '04/10/16',
  '10/11/16',
  'Technology',
  '20000',
  'crphang@gmail.com'
);