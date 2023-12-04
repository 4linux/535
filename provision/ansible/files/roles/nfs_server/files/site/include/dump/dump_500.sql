--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: banners; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE banners (
    id integer NOT NULL,
    nome character varying(100),
    descricao character varying(500),
    url character varying(500)
);


ALTER TABLE banners OWNER TO dexter;

--
-- Name: banners_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE banners_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE banners_id_seq OWNER TO dexter;

--
-- Name: banners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE banners_id_seq OWNED BY banners.id;


--
-- Name: clientes; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE clientes (
    id integer NOT NULL,
    nome_razao character varying NOT NULL,
    cpf_cnpj character varying NOT NULL,
    email character varying NOT NULL,
    telefone character varying NOT NULL,
    celular character varying,
    cep character varying(10) NOT NULL,
    endereco character varying NOT NULL,
    bairro character varying NOT NULL,
    cidade character varying NOT NULL,
    estado character varying NOT NULL,
    ip character varying(30)
);


ALTER TABLE clientes OWNER TO dexter;

--
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE clientes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clientes_id_seq OWNER TO dexter;

--
-- Name: clientes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE clientes_id_seq OWNED BY clientes.id;


--
-- Name: empresa; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE empresa (
    id integer NOT NULL,
    conteudo text,
    tipo character varying(100),
    titulo character varying(100)
);


ALTER TABLE empresa OWNER TO dexter;

--
-- Name: empresa_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE empresa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresa_id_seq OWNER TO dexter;

--
-- Name: empresa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE empresa_id_seq OWNED BY empresa.id;


--
-- Name: fale_conosco; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE fale_conosco (
    id integer NOT NULL,
    nome character varying NOT NULL,
    assunto character varying NOT NULL,
    mensagem text NOT NULL,
    email character varying(60) NOT NULL,
    ip character varying(30)
);


ALTER TABLE fale_conosco OWNER TO dexter;

--
-- Name: fale_conosco_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE fale_conosco_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fale_conosco_id_seq OWNER TO dexter;

--
-- Name: fale_conosco_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE fale_conosco_id_seq OWNED BY fale_conosco.id;


--
-- Name: funcionalidades; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE funcionalidades (
    id integer NOT NULL,
    nome character varying(200),
    descricao character varying(350),
    url_icone character varying(300),
    ip character varying(30)
);


ALTER TABLE funcionalidades OWNER TO dexter;

--
-- Name: funcionalidades_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE funcionalidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE funcionalidades_id_seq OWNER TO dexter;

--
-- Name: funcionalidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE funcionalidades_id_seq OWNED BY funcionalidades.id;


--
-- Name: funcionarios; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE funcionarios (
    id integer NOT NULL,
    prf_id integer NOT NULL,
    nome character varying NOT NULL,
    email character varying NOT NULL,
    senha character varying NOT NULL,
    ip character varying(30)
);


ALTER TABLE funcionarios OWNER TO dexter;

--
-- Name: funcionarios_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE funcionarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE funcionarios_id_seq OWNER TO dexter;

--
-- Name: funcionarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE funcionarios_id_seq OWNED BY funcionarios.id;


--
-- Name: new_perfis; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE new_perfis (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    ip character varying(30)
);


ALTER TABLE new_perfis OWNER TO dexter;

--
-- Name: paginas; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE paginas (
    id integer NOT NULL,
    url character varying(30) NOT NULL,
    label character varying(30) NOT NULL,
    ip character varying(30)
);


ALTER TABLE paginas OWNER TO dexter;

--
-- Name: paginas_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE paginas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paginas_id_seq OWNER TO dexter;

--
-- Name: paginas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE paginas_id_seq OWNED BY paginas.id;


--
-- Name: perfis_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE perfis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE perfis_id_seq OWNER TO dexter;

--
-- Name: perfis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE perfis_id_seq OWNED BY new_perfis.id;


--
-- Name: servicos; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE servicos (
    id integer NOT NULL,
    nome character varying(200),
    descricao character varying(350),
    url_icone character varying(300),
    home boolean DEFAULT false,
    ip character varying(30)
);


ALTER TABLE servicos OWNER TO dexter;

--
-- Name: servicos_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE servicos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE servicos_id_seq OWNER TO dexter;

--
-- Name: servicos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE servicos_id_seq OWNED BY servicos.id;


--
-- Name: tb_acls; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE tb_acls (
    acl_id integer NOT NULL,
    role_id integer,
    controller character varying NOT NULL,
    action character varying,
    allow boolean NOT NULL
);


ALTER TABLE tb_acls OWNER TO dexter;

--
-- Name: tb_acls_acl_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE tb_acls_acl_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_acls_acl_id_seq OWNER TO dexter;

--
-- Name: tb_acls_acl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE tb_acls_acl_id_seq OWNED BY tb_acls.acl_id;


--
-- Name: tb_rel_func_roles; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE tb_rel_func_roles (
    rel_func_roles_id integer NOT NULL,
    role_id integer,
    func_id integer
);


ALTER TABLE tb_rel_func_roles OWNER TO dexter;

--
-- Name: tb_rel_func_roles_rel_func_roles_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE tb_rel_func_roles_rel_func_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_rel_func_roles_rel_func_roles_id_seq OWNER TO dexter;

--
-- Name: tb_rel_func_roles_rel_func_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE tb_rel_func_roles_rel_func_roles_id_seq OWNED BY tb_rel_func_roles.rel_func_roles_id;


--
-- Name: tb_roles; Type: TABLE; Schema: public; Owner: dexter; Tablespace: 
--

CREATE TABLE tb_roles (
    role_id integer NOT NULL,
    name character varying NOT NULL
);


ALTER TABLE tb_roles OWNER TO dexter;

--
-- Name: tb_roles_role_id_seq; Type: SEQUENCE; Schema: public; Owner: dexter
--

CREATE SEQUENCE tb_roles_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_roles_role_id_seq OWNER TO dexter;

--
-- Name: tb_roles_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dexter
--

ALTER SEQUENCE tb_roles_role_id_seq OWNED BY tb_roles.role_id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY banners ALTER COLUMN id SET DEFAULT nextval('banners_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY clientes ALTER COLUMN id SET DEFAULT nextval('clientes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY empresa ALTER COLUMN id SET DEFAULT nextval('empresa_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY fale_conosco ALTER COLUMN id SET DEFAULT nextval('fale_conosco_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY funcionalidades ALTER COLUMN id SET DEFAULT nextval('funcionalidades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY funcionarios ALTER COLUMN id SET DEFAULT nextval('funcionarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY new_perfis ALTER COLUMN id SET DEFAULT nextval('perfis_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY paginas ALTER COLUMN id SET DEFAULT nextval('paginas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY servicos ALTER COLUMN id SET DEFAULT nextval('servicos_id_seq'::regclass);


--
-- Name: acl_id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_acls ALTER COLUMN acl_id SET DEFAULT nextval('tb_acls_acl_id_seq'::regclass);


--
-- Name: rel_func_roles_id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_rel_func_roles ALTER COLUMN rel_func_roles_id SET DEFAULT nextval('tb_rel_func_roles_rel_func_roles_id_seq'::regclass);


--
-- Name: role_id; Type: DEFAULT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_roles ALTER COLUMN role_id SET DEFAULT nextval('tb_roles_role_id_seq'::regclass);


--
-- Data for Name: banners; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY banners (id, nome, descricao, url) FROM stdin;
11	Logística Integrada	Lorem ipsum dolor sit amet, ad error dolor corpora vis, ius ex rebum novum vitae. Eos ponderum expetenda at, at vix nemore persequeris. Assentior persequeris cu eum, exerci persecuti omittantur vix ad. Prima velit vel ei, agam fabulas has ne. Eos at suas deserunt consulatu. Eum an ludus decore.	banner.jpg
12	Soluções em Transporte	Mea id prima munere. Facer everti pro ex, nam no malis quodsi. Option delicata corrumpit an usu, quodsi equidem percipit vix cu, dolor periculis et pri. Id sea corpora phaedrum, no est rebum illud mollis. Et vel veri autem, nec alia dicit ex, eu vis dicant labores legimus	banner2.jpg
13	Terminais Marítimos	Cum simul mandamus no, sea veniam honestatis eu. Mucius nostrud ea quo, ius an dicunt eloquentiam, fabulas expetendis per ex. Liber definitionem eu nam. Cu pro dicit utamur conclusionemque, no vis audire maiestatis scribentur.	banner3.jpg
14	Dexter - Logística	Mel habeo homero commune te. Nostrud accumsan oporteat mea ex. Lorem ullum mei ne, duo ei amet primis incorrupte. Eos te alienum molestiae, iriure atomorum ei has.	banner4.jpg
\.


--
-- Name: banners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('banners_id_seq', 14, true);


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY clientes (id, nome_razao, cpf_cnpj, email, telefone, celular, cep, endereco, bairro, cidade, estado, ip) FROM stdin;
1	DHL Logi­stica ltda	09830583205	contato@dhl.com	4350984508	94894859	89899998	Rua dos Transportes, 99	Jardim Caminhão	São Paulo	SP	localhost
21	Zpcom Informatica	13121132123132132	cotato@zpcominformatica.com.br	40437784	962039978	09921040	Rua Canada,148	Centro	Diadema	SP	localhost
22	4linux Free Software Fundation	11111111111111111	contato@4linux.com.br	40437784	962039978	09921040	Rua Vergueiro,3057	Vl. Mariana	São Paulo	SP	localhost
25	Denis Perciliano Ribeiro	29250863810	dpr001@gmail.com	962039983	962039983	09921040	Rua Canadá, 148	Centro	Diadema	São Paulo	\N
28	Michelle Santos Leal	29250863820	mick.leal@gmail.com	960135783	960135783	09921040	Rua Canadá, 148	Centro	Diadema	São Paulo	\N
32	Larissa de Oliveira Silva	29250863810	mick.leal@gmail.com	960135783	960135783	09921040	Rua Canadá, 148	Centro	Diadema	São Paulo	\N
38	Denis	34234234	dpr001@gmail.com	343	2342342	23423	teste	teste	teste	CE	\N
39	4linux Free Software Solutions	1111111111111	contato@4linux.com.br	40442010	962039987	09921045	Rua Canada, 148	Centro	Diadema	SP	\N
\.


--
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('clientes_id_seq', 39, true);


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY empresa (id, conteudo, tipo, titulo) FROM stdin;
2	Respeito ao próximo\r\nTransparência\r\nResponsabilidade\r\nDedicaçao	valores	Valores da Empresa
1	Nossa missão é conseguir evoluir ao máximo toda empresa	missao	Missão da nossa Empresa
\.


--
-- Name: empresa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('empresa_id_seq', 3, true);


--
-- Data for Name: fale_conosco; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY fale_conosco (id, nome, assunto, mensagem, email, ip) FROM stdin;
90	Denis	teste	teste	dpr001@gmail.com	\N
91	Michelle Santos Leal	teste	Teste	mick.leal@gmail.com	\N
92	sdfsdfsdf	sgsdf	sdfsdfsdfsdfsdsdf	dpr001@gmail.com	\N
93	Teste de Contato	sgsdf	sdsdfsdfdfd	dpr001@gmail.com	\N
\.


--
-- Name: fale_conosco_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('fale_conosco_id_seq', 93, true);


--
-- Data for Name: funcionalidades; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY funcionalidades (id, nome, descricao, url_icone, ip) FROM stdin;
2	CLOUD DATABASE	Mudado ipsum dolor sit amet, consectetur adipisicing elit. Velit, fugit soluta aperiam corporis unde pariatur rerum officiis dignissimos blanditiis omnis.	icon-cloud.png	localhost
3	SUPORTE FULL TIME	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, a atque porro magnam facilis earum odit nisi dignissimos quas commodi!	icon-support.png	localhost
1	COLETA AGENDADA ALTERADA	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, ab odit officiis quam similique illum cum ex quae. Voluptates, magni.	icon-calendar.png	localhost
12	dfsdfsd	fsdfsdfsd	fsdfsdfsd	\N
13	sdfsdf	sdfsdfsdfsd	fsdfsdfsdfsdf	\N
\.


--
-- Name: funcionalidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('funcionalidades_id_seq', 13, true);


--
-- Data for Name: funcionarios; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY funcionarios (id, prf_id, nome, email, senha, ip) FROM stdin;
2	1	Fulano	fulano@dexter.com	e10adc3949ba59abbe56e057f20f883e	localhost
3	2	João	joao@dexter.com	e10adc3949ba59abbe56e057f20f883e	localhost
4	1	Denis	dpr001@gmail.com	e10adc3949ba59abbe56e057f20f883e	localhost
1	1	Admin	admin@dexter.com	e10adc3949ba59abbe56e057f20f883e	localhost
\.


--
-- Name: funcionarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('funcionarios_id_seq', 6, true);


--
-- Data for Name: new_perfis; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY new_perfis (id, name, ip) FROM stdin;
1	administrador	localhost
2	motorista	localhost
\.


--
-- Data for Name: paginas; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY paginas (id, url, label, ip) FROM stdin;
1	index.php	Início	localhost
2	cadastro.php	Cadastre-se	localhost
3	faleconosco.php	Fale Conosco	localhost
4	sobre.php	Sobre	localhost
\.


--
-- Name: paginas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('paginas_id_seq', 4, true);


--
-- Name: perfis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('perfis_id_seq', 2, true);


--
-- Data for Name: servicos; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY servicos (id, nome, descricao, url_icone, home, ip) FROM stdin;
4	Transporte Ferroviário	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?	service-trem.png	f	localhost
5	Transporte Fast	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?	service-fast.png	f	localhost
6	Transporte de Malote	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?	service-money.png	f	localhost
7	Coleta Agendada	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?	service-calendar.png	f	localhost
8	Suporte Full Time	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?	service-support.png	f	localhost
9	RÁPIDO E SIMPLES	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae a voluptatibus neque.	icon-flash.png	t	localhost
10	PARA SUA LOJA	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cumque mollitia rerum!	icon-shop.png	t	localhost
11	QUALQUER DESTINO	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque omnis provident totam?	icon-world.png	t	localhost
12	NA PALMA DA MÃO	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere mollitia esse delectus?	icon-mobile.png	t	localhost
1	Ecommerce Delivey	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?		f	localhost
2	Entregas Aéreas	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?		f	localhost
3	Entregas de Containers	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga?		f	localhost
\.


--
-- Name: servicos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('servicos_id_seq', 17, true);


--
-- Data for Name: tb_acls; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY tb_acls (acl_id, role_id, controller, action, allow) FROM stdin;
1	2	funcionalidades	listar	t
2	2	mensagens	listar	t
3	2	mensagens	index	t
\.


--
-- Name: tb_acls_acl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('tb_acls_acl_id_seq', 3, true);


--
-- Data for Name: tb_rel_func_roles; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY tb_rel_func_roles (rel_func_roles_id, role_id, func_id) FROM stdin;
1	1	1
2	2	2
\.


--
-- Name: tb_rel_func_roles_rel_func_roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('tb_rel_func_roles_rel_func_roles_id_seq', 2, true);


--
-- Data for Name: tb_roles; Type: TABLE DATA; Schema: public; Owner: dexter
--

COPY tb_roles (role_id, name) FROM stdin;
1	admin
2	clientes
\.


--
-- Name: tb_roles_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dexter
--

SELECT pg_catalog.setval('tb_roles_role_id_seq', 2, true);


--
-- Name: banners_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY banners
    ADD CONSTRAINT banners_pkey PRIMARY KEY (id);


--
-- Name: clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);


--
-- Name: empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id);


--
-- Name: fale_conosco_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY fale_conosco
    ADD CONSTRAINT fale_conosco_pkey PRIMARY KEY (id);


--
-- Name: funcionalidades_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY funcionalidades
    ADD CONSTRAINT funcionalidades_pkey PRIMARY KEY (id);


--
-- Name: funcionarios_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY funcionarios
    ADD CONSTRAINT funcionarios_pkey PRIMARY KEY (id);


--
-- Name: perfis_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY new_perfis
    ADD CONSTRAINT perfis_pkey PRIMARY KEY (id);


--
-- Name: servicos_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY servicos
    ADD CONSTRAINT servicos_pkey PRIMARY KEY (id);


--
-- Name: tb_acls_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY tb_acls
    ADD CONSTRAINT tb_acls_pkey PRIMARY KEY (acl_id);


--
-- Name: tb_rel_func_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY tb_rel_func_roles
    ADD CONSTRAINT tb_rel_func_roles_pkey PRIMARY KEY (rel_func_roles_id);


--
-- Name: tb_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: dexter; Tablespace: 
--

ALTER TABLE ONLY tb_roles
    ADD CONSTRAINT tb_roles_pkey PRIMARY KEY (role_id);


--
-- Name: funcionarios_prf_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY funcionarios
    ADD CONSTRAINT funcionarios_prf_id_fkey FOREIGN KEY (prf_id) REFERENCES new_perfis(id) ON UPDATE CASCADE;


--
-- Name: tb_acls_role_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_acls
    ADD CONSTRAINT tb_acls_role_id_fkey FOREIGN KEY (role_id) REFERENCES tb_roles(role_id);


--
-- Name: tb_rel_func_roles_func_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_rel_func_roles
    ADD CONSTRAINT tb_rel_func_roles_func_id_fkey FOREIGN KEY (func_id) REFERENCES funcionarios(id);


--
-- Name: tb_rel_func_roles_role_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: dexter
--

ALTER TABLE ONLY tb_rel_func_roles
    ADD CONSTRAINT tb_rel_func_roles_role_id_fkey FOREIGN KEY (role_id) REFERENCES tb_roles(role_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

