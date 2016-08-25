/* renomear local.php.dist para local.php e inserir as configurações do banco */
CREATE TABLE banco
(
  id serial NOT NULL,
  codigo character varying(6),
  descricao character varying(150),
  CONSTRAINT banco_pkey PRIMARY KEY (id)
)

CREATE TABLE agencia
(
  id serial NOT NULL,
  ban_id integer,
  nome character varying(50),
  endereco character varying(100),
  CONSTRAINT agencia_pkey PRIMARY KEY (id),
  CONSTRAINT agencia_ban_id_fkey FOREIGN KEY (ban_id)
      REFERENCES banco (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE RESTRICT
);