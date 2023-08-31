--
-- PostgreSQL database dump
--

-- Dumped from database version 15.4
-- Dumped by pg_dump version 15.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cases; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cases (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE public.cases OWNER TO postgres;

--
-- Name: table_name_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.table_name_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.table_name_id_seq OWNER TO postgres;

--
-- Name: table_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.table_name_id_seq OWNED BY public.cases.id;


--
-- Name: thermal_history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.thermal_history (
    id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    temperature real NOT NULL
);


ALTER TABLE public.thermal_history OWNER TO postgres;

--
-- Name: thermal_history_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.thermal_history_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.thermal_history_id_seq OWNER TO postgres;

--
-- Name: thermal_history_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.thermal_history_id_seq OWNED BY public.thermal_history.id;


--
-- Name: cases id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cases ALTER COLUMN id SET DEFAULT nextval('public.table_name_id_seq'::regclass);


--
-- Name: thermal_history id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.thermal_history ALTER COLUMN id SET DEFAULT nextval('public.thermal_history_id_seq'::regclass);


--
-- Data for Name: cases; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cases (id, name) FROM stdin;
1	Case 1
2	Case 2
\.


--
-- Data for Name: thermal_history; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.thermal_history (id, created_at, temperature) FROM stdin;
1	2023-08-29 17:07:43	34.5
2	2023-08-29 18:08:06	35.6
36	2023-08-31 18:34:07	21
37	2023-08-31 19:56:56	20
40	2023-08-31 20:26:55	20
\.


--
-- Name: table_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.table_name_id_seq', 12, true);


--
-- Name: thermal_history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.thermal_history_id_seq', 40, true);


--
-- Name: cases table_name_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cases
    ADD CONSTRAINT table_name_pk PRIMARY KEY (id);


--
-- Name: thermal_history thermal_history_create_at_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.thermal_history
    ADD CONSTRAINT thermal_history_create_at_key UNIQUE (created_at);


--
-- Name: thermal_history thermal_history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.thermal_history
    ADD CONSTRAINT thermal_history_pkey PRIMARY KEY (id);


--
-- Name: table_name_id_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX table_name_id_uindex ON public.cases USING btree (id);


--
-- PostgreSQL database dump complete
--

