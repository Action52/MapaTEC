--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: areas; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE areas (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    geom geometry(Polygon,4326)
);


ALTER TABLE areas OWNER TO leonvillapun;

--
-- Name: areas_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE areas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE areas_id_seq OWNER TO leonvillapun;

--
-- Name: areas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE areas_id_seq OWNED BY areas.id;


--
-- Name: campuses; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE campuses (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    geom geometry
);


ALTER TABLE campuses OWNER TO leonvillapun;

--
-- Name: campuses_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE campuses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE campuses_id_seq OWNER TO leonvillapun;

--
-- Name: campuses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE campuses_id_seq OWNED BY campuses.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE categories (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE categories OWNER TO leonvillapun;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categories_id_seq OWNER TO leonvillapun;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE categories_id_seq OWNED BY categories.id;


--
-- Name: cities; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE cities (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE cities OWNER TO leonvillapun;

--
-- Name: cities_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE cities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cities_id_seq OWNER TO leonvillapun;

--
-- Name: cities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE cities_id_seq OWNED BY cities.id;


--
-- Name: countries; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE countries (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE countries OWNER TO leonvillapun;

--
-- Name: countries_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE countries_id_seq OWNER TO leonvillapun;

--
-- Name: countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE countries_id_seq OWNED BY countries.id;


--
-- Name: courses; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE courses (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE courses OWNER TO leonvillapun;

--
-- Name: courses_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE courses_id_seq OWNER TO leonvillapun;

--
-- Name: courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE courses_id_seq OWNED BY courses.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT ('now'::text)::timestamp(0) with time zone NOT NULL
);


ALTER TABLE failed_jobs OWNER TO leonvillapun;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE failed_jobs_id_seq OWNER TO leonvillapun;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE failed_jobs_id_seq OWNED BY failed_jobs.id;


--
-- Name: jobs; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE jobs OWNER TO leonvillapun;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE jobs_id_seq OWNER TO leonvillapun;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE jobs_id_seq OWNED BY jobs.id;


--
-- Name: lines; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE lines (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    geom geometry(LineString,4326)
);


ALTER TABLE lines OWNER TO leonvillapun;

--
-- Name: lines_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE lines_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lines_id_seq OWNER TO leonvillapun;

--
-- Name: lines_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE lines_id_seq OWNED BY lines.id;


--
-- Name: location_has_area; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_area (
    id integer NOT NULL,
    location_id integer NOT NULL,
    area_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_area OWNER TO leonvillapun;

--
-- Name: location_has_area_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_area_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_area_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_area_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_area_id_seq OWNED BY location_has_area.id;


--
-- Name: location_has_city; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_city (
    id integer NOT NULL,
    location_id integer NOT NULL,
    city_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_city OWNER TO leonvillapun;

--
-- Name: location_has_city_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_city_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_city_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_city_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_city_id_seq OWNED BY location_has_city.id;


--
-- Name: location_has_country; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_country (
    id integer NOT NULL,
    location_id integer NOT NULL,
    country_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_country OWNER TO leonvillapun;

--
-- Name: location_has_country_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_country_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_country_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_country_id_seq OWNED BY location_has_country.id;


--
-- Name: location_has_line; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_line (
    id integer NOT NULL,
    location_id integer NOT NULL,
    line_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_line OWNER TO leonvillapun;

--
-- Name: location_has_line_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_line_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_line_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_line_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_line_id_seq OWNED BY location_has_line.id;


--
-- Name: location_has_point; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_point (
    id integer NOT NULL,
    location_id integer NOT NULL,
    point_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_point OWNER TO leonvillapun;

--
-- Name: location_has_point_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_point_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_point_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_point_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_point_id_seq OWNED BY location_has_point.id;


--
-- Name: location_has_state; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE location_has_state (
    id integer NOT NULL,
    location_id integer NOT NULL,
    state_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE location_has_state OWNER TO leonvillapun;

--
-- Name: location_has_state_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE location_has_state_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE location_has_state_id_seq OWNER TO leonvillapun;

--
-- Name: location_has_state_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE location_has_state_id_seq OWNED BY location_has_state.id;


--
-- Name: locations; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE locations (
    id integer NOT NULL,
    description character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE locations OWNER TO leonvillapun;

--
-- Name: locations_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE locations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE locations_id_seq OWNER TO leonvillapun;

--
-- Name: locations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE locations_id_seq OWNED BY locations.id;


--
-- Name: majors; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE majors (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    aka character varying(255) NOT NULL,
    program character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE majors OWNER TO leonvillapun;

--
-- Name: majors_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE majors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE majors_id_seq OWNER TO leonvillapun;

--
-- Name: majors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE majors_id_seq OWNED BY majors.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO leonvillapun;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO leonvillapun;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE password_resets OWNER TO leonvillapun;

--
-- Name: points; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE points (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    geom geometry(Point,4326)
);


ALTER TABLE points OWNER TO leonvillapun;

--
-- Name: points_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE points_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE points_id_seq OWNER TO leonvillapun;

--
-- Name: points_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE points_id_seq OWNED BY points.id;


--
-- Name: project_has_campus; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_campus (
    id integer NOT NULL,
    project_id integer NOT NULL,
    campus_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_campus OWNER TO leonvillapun;

--
-- Name: project_has_campus_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_campus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_campus_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_campus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_campus_id_seq OWNED BY project_has_campus.id;


--
-- Name: project_has_category; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_category (
    id integer NOT NULL,
    project_id integer NOT NULL,
    category_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_category OWNER TO leonvillapun;

--
-- Name: project_has_category_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_category_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_category_id_seq OWNED BY project_has_category.id;


--
-- Name: project_has_course; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_course (
    id integer NOT NULL,
    project_id integer NOT NULL,
    course_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_course OWNER TO leonvillapun;

--
-- Name: project_has_course_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_course_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_course_id_seq OWNED BY project_has_course.id;


--
-- Name: project_has_location; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_location (
    id integer NOT NULL,
    project_id integer NOT NULL,
    location_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_location OWNER TO leonvillapun;

--
-- Name: project_has_location_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_location_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_location_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_location_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_location_id_seq OWNED BY project_has_location.id;


--
-- Name: project_has_major; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_major (
    id integer NOT NULL,
    project_id integer NOT NULL,
    major_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_major OWNER TO leonvillapun;

--
-- Name: project_has_major_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_major_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_major_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_major_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_major_id_seq OWNED BY project_has_major.id;


--
-- Name: project_has_strategicpartner; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_strategicpartner (
    id integer NOT NULL,
    project_id integer NOT NULL,
    sp_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_strategicpartner OWNER TO leonvillapun;

--
-- Name: project_has_strategicpartner_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_strategicpartner_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_strategicpartner_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_strategicpartner_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_strategicpartner_id_seq OWNED BY project_has_strategicpartner.id;


--
-- Name: project_has_time; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_time (
    id integer NOT NULL,
    project_id integer NOT NULL,
    time_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_time OWNER TO leonvillapun;

--
-- Name: project_has_time_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_time_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_time_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_time_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_time_id_seq OWNED BY project_has_time.id;


--
-- Name: project_has_user; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE project_has_user (
    id integer NOT NULL,
    project_id integer NOT NULL,
    user_id integer NOT NULL,
    owner boolean NOT NULL,
    role character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE project_has_user OWNER TO leonvillapun;

--
-- Name: project_has_user_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE project_has_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE project_has_user_id_seq OWNER TO leonvillapun;

--
-- Name: project_has_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE project_has_user_id_seq OWNED BY project_has_user.id;


--
-- Name: projects; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE projects (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    status integer NOT NULL,
    pdf character varying(255) NOT NULL,
    has_pic smallint DEFAULT '0'::smallint NOT NULL,
    latitud double precision NOT NULL,
    longitud double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE projects OWNER TO leonvillapun;

--
-- Name: projects_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE projects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projects_id_seq OWNER TO leonvillapun;

--
-- Name: projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE projects_id_seq OWNED BY projects.id;


--
-- Name: states; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE states (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE states OWNER TO leonvillapun;

--
-- Name: states_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE states_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE states_id_seq OWNER TO leonvillapun;

--
-- Name: states_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE states_id_seq OWNED BY states.id;


--
-- Name: strategicpartners; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE strategicpartners (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    private_or_public boolean NOT NULL,
    moral_or_physical boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    geom geometry
);


ALTER TABLE strategicpartners OWNER TO leonvillapun;

--
-- Name: strategicpartners_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE strategicpartners_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE strategicpartners_id_seq OWNER TO leonvillapun;

--
-- Name: strategicpartners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE strategicpartners_id_seq OWNED BY strategicpartners.id;


--
-- Name: times; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE times (
    id integer NOT NULL,
    sem_start character varying(255) NOT NULL,
    year_start character varying(255) NOT NULL,
    sem_end character varying(255) NOT NULL,
    year_end character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE times OWNER TO leonvillapun;

--
-- Name: times_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE times_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE times_id_seq OWNER TO leonvillapun;

--
-- Name: times_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE times_id_seq OWNED BY times.id;


--
-- Name: user_has_category; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE user_has_category (
    id integer NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE user_has_category OWNER TO leonvillapun;

--
-- Name: user_has_category_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE user_has_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_has_category_id_seq OWNER TO leonvillapun;

--
-- Name: user_has_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE user_has_category_id_seq OWNED BY user_has_category.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    interests character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    verified smallint DEFAULT '0'::smallint NOT NULL,
    email_token character varying(255),
    has_profile_pic smallint DEFAULT '0'::smallint NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE users OWNER TO leonvillapun;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO leonvillapun;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: areas id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY areas ALTER COLUMN id SET DEFAULT nextval('areas_id_seq'::regclass);


--
-- Name: campuses id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY campuses ALTER COLUMN id SET DEFAULT nextval('campuses_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY categories ALTER COLUMN id SET DEFAULT nextval('categories_id_seq'::regclass);


--
-- Name: cities id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY cities ALTER COLUMN id SET DEFAULT nextval('cities_id_seq'::regclass);


--
-- Name: countries id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY countries ALTER COLUMN id SET DEFAULT nextval('countries_id_seq'::regclass);


--
-- Name: courses id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY courses ALTER COLUMN id SET DEFAULT nextval('courses_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY failed_jobs ALTER COLUMN id SET DEFAULT nextval('failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY jobs ALTER COLUMN id SET DEFAULT nextval('jobs_id_seq'::regclass);


--
-- Name: lines id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lines ALTER COLUMN id SET DEFAULT nextval('lines_id_seq'::regclass);


--
-- Name: location_has_area id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_area ALTER COLUMN id SET DEFAULT nextval('location_has_area_id_seq'::regclass);


--
-- Name: location_has_city id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_city ALTER COLUMN id SET DEFAULT nextval('location_has_city_id_seq'::regclass);


--
-- Name: location_has_country id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_country ALTER COLUMN id SET DEFAULT nextval('location_has_country_id_seq'::regclass);


--
-- Name: location_has_line id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_line ALTER COLUMN id SET DEFAULT nextval('location_has_line_id_seq'::regclass);


--
-- Name: location_has_point id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_point ALTER COLUMN id SET DEFAULT nextval('location_has_point_id_seq'::regclass);


--
-- Name: location_has_state id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_state ALTER COLUMN id SET DEFAULT nextval('location_has_state_id_seq'::regclass);


--
-- Name: locations id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY locations ALTER COLUMN id SET DEFAULT nextval('locations_id_seq'::regclass);


--
-- Name: majors id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY majors ALTER COLUMN id SET DEFAULT nextval('majors_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: points id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY points ALTER COLUMN id SET DEFAULT nextval('points_id_seq'::regclass);


--
-- Name: project_has_campus id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_campus ALTER COLUMN id SET DEFAULT nextval('project_has_campus_id_seq'::regclass);


--
-- Name: project_has_category id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_category ALTER COLUMN id SET DEFAULT nextval('project_has_category_id_seq'::regclass);


--
-- Name: project_has_course id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_course ALTER COLUMN id SET DEFAULT nextval('project_has_course_id_seq'::regclass);


--
-- Name: project_has_location id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_location ALTER COLUMN id SET DEFAULT nextval('project_has_location_id_seq'::regclass);


--
-- Name: project_has_major id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_major ALTER COLUMN id SET DEFAULT nextval('project_has_major_id_seq'::regclass);


--
-- Name: project_has_strategicpartner id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_strategicpartner ALTER COLUMN id SET DEFAULT nextval('project_has_strategicpartner_id_seq'::regclass);


--
-- Name: project_has_time id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_time ALTER COLUMN id SET DEFAULT nextval('project_has_time_id_seq'::regclass);


--
-- Name: project_has_user id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_user ALTER COLUMN id SET DEFAULT nextval('project_has_user_id_seq'::regclass);


--
-- Name: projects id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY projects ALTER COLUMN id SET DEFAULT nextval('projects_id_seq'::regclass);


--
-- Name: states id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY states ALTER COLUMN id SET DEFAULT nextval('states_id_seq'::regclass);


--
-- Name: strategicpartners id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY strategicpartners ALTER COLUMN id SET DEFAULT nextval('strategicpartners_id_seq'::regclass);


--
-- Name: times id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY times ALTER COLUMN id SET DEFAULT nextval('times_id_seq'::regclass);


--
-- Name: user_has_category id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY user_has_category ALTER COLUMN id SET DEFAULT nextval('user_has_category_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: areas; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY areas (id, name, created_at, updated_at, geom) FROM stdin;
1	Poligono	\N	\N	0103000020E61000000100000004000000AE47E17A146E3B405C8FC2F5285C14C0C3F5285C8F424140D7A3703D0A573540000000000000F03F0000000000000000AE47E17A146E3B405C8FC2F5285C14C0
\.


--
-- Name: areas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('areas_id_seq', 1, true);


--
-- Data for Name: campuses; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY campuses (id, name, created_at, updated_at, geom) FROM stdin;
1	Aguascalientes	\N	\N	0101000020E61000003AC489F903EF3540C495B377C69559C0
2	Central de Veracruz	\N	\N	0101000020E6100000316EB42D14E43240754D92F8A63E58C0
3	Chiapas	\N	\N	0101000020E610000097CD774BCDC3304059DAA9B9DC4C57C0
4	Chihuahua	\N	\N	0101000020E610000019709692E5AC3C4057DB036333855AC0
5	Ciudad de México	\N	\N	0101000020E61000000951BEA0854833401CEE23B7A6C858C0
6	Ciudad Juárez	\N	\N	0101000020E61000000152F6F12BB73F4083FC6CE43A995AC0
7	Ciudad Obregón	\N	\N	0101000020E6100000C252B8793E883B409B2386787F7C5BC0
8	Cuernavaca	\N	\N	0101000020E6100000CC78003043CE3240014F5AB82CCE58C0
9	Estado de México	\N	\N	0101000020E61000006F0734226298334037D263A593CE58C0
10	Guadalajara	\N	\N	0101000020E6100000723271AB20BC3440675CDD561FDD59C0
11	Hidalgo	\N	\N	0101000020E6100000AC91B8228C1834402DCE18E604B158C0
12	Irapuato	\N	\N	0101000020E6100000C26C020CCBAF3440F611537D425959C0
13	Laguna	\N	\N	0101000020E6100000991FC9F66B843940EF4CB21F73D959C0
14	León	\N	\N	0101000020E61000001497E315882A35403735D07CCE6D59C0
15	Monterrey	\N	\N	0101000020E6100000098F9147CBA63940506D1569871259C0
16	Morelia	\N	\N	0101000020E61000000622D5C10BA83340A878B70D7E4A59C0
17	Puebla	\N	\N	0101000020E61000003D258C0BAC043340E9D73109728F58C0
18	Querétaro	\N	\N	0101000020E6100000B2B8A40F029D34408BA71E69F01959C0
19	Saltillo	\N	\N	0101000020E6100000BD981C2DBD7239407769C361693E59C0
20	San Luis Potosí	\N	\N	0101000020E6100000D98DE32C912036402F617EB8754259C0
21	Santa Fe	\N	\N	0101000020E6100000DDABA0B3165C3340D5D0066083D058C0
22	Sinaloa	\N	\N	0101000020E6100000091B9E5E29CD384010FAE307F8DA5AC0
23	Sonora Norte	\N	\N	0101000020E6100000D052680F6A2B3D40A13B777151BA5BC0
24	Tampico	\N	\N	0101000020E6100000C683D2BC886136400C2BCBC6B97958C0
25	Toluca	\N	\N	0101000020E610000052EBA28DC8443340A9AB96CF4DED58C0
26	Zacatecas	\N	\N	0101000020E6100000FDDAFAE93FC336400289810937A259C0
\.


--
-- Name: campuses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('campuses_id_seq', 26, true);


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY categories (id, name, created_at, updated_at) FROM stdin;
1	Arquitectura	\N	\N
2	Mecánica	\N	\N
3	Programación	\N	\N
4	Deportes	\N	\N
5	Derecho	\N	\N
\.


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('categories_id_seq', 5, true);


--
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY cities (id, name, created_at, updated_at) FROM stdin;
1	Puebla	\N	\N
2	Cholula	\N	\N
3	Atlixco	\N	\N
4	Monterrey	\N	\N
\.


--
-- Name: cities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('cities_id_seq', 4, true);


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY countries (id, name, created_at, updated_at) FROM stdin;
1	México	\N	\N
\.


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('countries_id_seq', 1, true);


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY courses (id, name, code, created_at, updated_at) FROM stdin;
1	Calidad y Pruebas de Software	TC3045	\N	\N
2	Biología I	BT1009	\N	\N
3	Fundamentos de la programación	TC1014	\N	\N
\.


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('courses_id_seq', 3, true);


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('failed_jobs_id_seq', 1, false);


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('jobs_id_seq', 1, false);


--
-- Data for Name: lines; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY lines (id, name, created_at, updated_at, geom) FROM stdin;
1	Linea en 27.43 -5.09, 34.52 21.34	\N	\N	0102000020E610000002000000AE47E17A146E3B405C8FC2F5285C14C0C3F5285C8F424140D7A3703D0A573540
2	Linea en 52.78 -21.09, 35.52 21.24	\N	\N	0102000020E610000002000000A4703D0AD7634A40D7A3703D0A1735C0C3F5285C8FC241403D0AD7A3703D3540
\.


--
-- Name: lines_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('lines_id_seq', 2, true);


--
-- Data for Name: location_has_area; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_area (id, location_id, area_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: location_has_area_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_area_id_seq', 1, true);


--
-- Data for Name: location_has_city; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_city (id, location_id, city_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: location_has_city_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_city_id_seq', 1, true);


--
-- Data for Name: location_has_country; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_country (id, location_id, country_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: location_has_country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_country_id_seq', 1, true);


--
-- Data for Name: location_has_line; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_line (id, location_id, line_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: location_has_line_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_line_id_seq', 1, true);


--
-- Data for Name: location_has_point; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_point (id, location_id, point_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
2	2	2	\N	\N
\.


--
-- Name: location_has_point_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_point_id_seq', 2, true);


--
-- Data for Name: location_has_state; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY location_has_state (id, location_id, state_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: location_has_state_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('location_has_state_id_seq', 1, true);


--
-- Data for Name: locations; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY locations (id, description, created_at, updated_at) FROM stdin;
1	Punto en la coordenada X,X	\N	\N
2	Linea en las coordenadas X,X,X	\N	\N
3	Proyecto ubicado en la Ciudad de México	\N	\N
4	Proyecto desarrollándose en la Reserva Territorial Atlixcáyotl.	\N	\N
\.


--
-- Name: locations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('locations_id_seq', 4, true);


--
-- Data for Name: majors; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY majors (id, name, aka, program, created_at, updated_at) FROM stdin;
1	Ingeniería en Tecnologías Computacionales	ITC	ITC11	\N	\N
2	Ingeniería en Tecnologías Computacionales	ITC	ITC09	\N	\N
3	Ingeniería en Mecatrónica	IMT	IMT11	\N	\N
4	Arquitectura	ARQ	ARQ11	\N	\N
\.


--
-- Name: majors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('majors_id_seq', 4, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY migrations (id, migration, batch) FROM stdin;
741	2014_10_12_000000_create_users_table	1
742	2014_10_12_100000_create_password_resets_table	1
743	2017_04_12_020200_create_strategicpartners_table	1
744	2017_04_12_020246_create_campuses_table	1
745	2017_04_12_020316_create_categories_table	1
746	2017_04_12_020330_create_times_table	1
747	2017_04_12_020401_create_projects_table	1
748	2017_04_12_020419_create_locations_table	1
749	2017_04_12_020434_create_lines_table	1
750	2017_04_12_020442_create_areas_table	1
751	2017_04_12_020452_create_points_table	1
752	2017_04_12_020508_create_cities_table	1
753	2017_04_12_020515_create_states_table	1
754	2017_04_12_020526_create_countries_table	1
755	2017_04_12_030725_create_majors_table	1
756	2017_04_12_030739_create_courses_table	1
757	2017_06_24_003544_create_jobs_table	1
758	2017_06_24_003559_create_failed_jobs_table	1
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('migrations_id_seq', 758, true);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: points; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY points (id, name, created_at, updated_at, geom) FROM stdin;
1	Punto	\N	\N	0101000020E6100000E44FAFEF1EFD32402857C224268D58C0
2	Punto	\N	\N	0101000020E6100000000000000000F03F0000000000000000
3	Punto	\N	\N	0101000020E6100000F853E3A59B4414409A99999999990BC0
\.


--
-- Name: points_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('points_id_seq', 3, true);


--
-- Data for Name: project_has_campus; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_campus (id, project_id, campus_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: project_has_campus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_campus_id_seq', 1, true);


--
-- Data for Name: project_has_category; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_category (id, project_id, category_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
2	3	4	\N	\N
3	2	1	\N	\N
4	4	2	\N	\N
5	5	3	\N	\N
6	6	4	\N	\N
7	7	2	\N	\N
\.


--
-- Name: project_has_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_category_id_seq', 7, true);


--
-- Data for Name: project_has_course; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_course (id, project_id, course_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: project_has_course_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_course_id_seq', 1, true);


--
-- Data for Name: project_has_location; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_location (id, project_id, location_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
2	2	2	\N	\N
\.


--
-- Name: project_has_location_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_location_id_seq', 2, true);


--
-- Data for Name: project_has_major; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_major (id, project_id, major_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: project_has_major_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_major_id_seq', 1, true);


--
-- Data for Name: project_has_strategicpartner; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_strategicpartner (id, project_id, sp_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
2	2	1	\N	\N
\.


--
-- Name: project_has_strategicpartner_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_strategicpartner_id_seq', 2, true);


--
-- Data for Name: project_has_time; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_time (id, project_id, time_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
\.


--
-- Name: project_has_time_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_time_id_seq', 1, true);


--
-- Data for Name: project_has_user; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY project_has_user (id, project_id, user_id, owner, role, created_at, updated_at) FROM stdin;
1	1	1	t	Líder	\N	\N
2	1	2	f	Administrador	\N	\N
3	2	2	t	Líder	\N	\N
4	3	2	t	Líder	\N	\N
\.


--
-- Name: project_has_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('project_has_user_id_seq', 4, true);


--
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY projects (id, name, description, status, pdf, has_pic, latitud, longitud, created_at, updated_at) FROM stdin;
1	MapaTEC	NOVUS 2016 Proyecto con el objetivo de desarrollar una página web con mapa.	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
2	INC Monterrey	Congreso de emprendimiento.	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
3	Rescate de tortugas	Servicio social que consiste en rescatar tortugas marinas en la playa.	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
4	Mexcritores	Proyecto de emprendimiento para desarrollar una página web que ayude a escritores mexicanos emergentes a publicar sus escritos.	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
5	Semana i Supercomputo	Semana i 2017. Diplomado de supercómputo en CINVESTAV.	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
6	AsesoriasTEC	NOVUS 2016 Proyecto con el objetivo de desarrollar una interfaz de asesorias	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
7	Taller GameMaker	Taller de programación de videojuegos impartido cada semestre	1	dropbox.com	0	19.4326079999999983	-99.1332089999999937	\N	\N
\.


--
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('projects_id_seq', 7, true);


--
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY spatial_ref_sys (srid, auth_name, auth_srid, srtext, proj4text) FROM stdin;
\.


--
-- Data for Name: states; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY states (id, name, created_at, updated_at) FROM stdin;
1	Puebla	\N	\N
2	Jalisco	\N	\N
3	Nuevo León	\N	\N
4	Guanajuato	\N	\N
5	Texas	\N	\N
6	United States	\N	\N
\.


--
-- Name: states_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('states_id_seq', 6, true);


--
-- Data for Name: strategicpartners; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY strategicpartners (id, name, email, private_or_public, moral_or_physical, created_at, updated_at, geom) FROM stdin;
1	COCA-COLA	atencion@cocacola.mx	t	t	\N	\N	0101000020E6100000000000000000F03F000000000000F03F
\.


--
-- Name: strategicpartners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('strategicpartners_id_seq', 1, true);


--
-- Data for Name: times; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY times (id, sem_start, year_start, sem_end, year_end, created_at, updated_at) FROM stdin;
1	EM	16	EM	17	\N	\N
2	AD	15	V	16	\N	\N
3	AD	15	EM	16	\N	\N
\.


--
-- Name: times_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('times_id_seq', 3, true);


--
-- Data for Name: user_has_category; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY user_has_category (id, user_id, category_id, created_at, updated_at) FROM stdin;
1	1	1	\N	\N
2	1	2	\N	\N
3	2	3	\N	\N
4	2	1	\N	\N
5	2	4	\N	\N
\.


--
-- Name: user_has_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('user_has_category_id_seq', 5, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY users (id, name, lastname, description, interests, email, password, verified, email_token, has_profile_pic, remember_token, created_at, updated_at) FROM stdin;
1	Luis Alfredo	León Villapún	Estudiante de ITC de séptimo semestre. Amante de la astronomía, la ciencia y la computación.	Programación Astronomía Ciencia	A01322274@itesm.mx	$2y$10$pK7Q3L0zHLKZztB8CtTtneZr5L7eDhRcAelCWVt24a/u2p3jfzOzO	0	\N	0	\N	\N	\N
2	Ricardo	Rodiles Legaspi	Estudiante de ITC de séptimo semestre. Disfruto de la programación competitiva.	ACM Competitive Programming Finance	A01325081@itesm.mx	$2y$10$QW1prKd1Yu4Q06nQB8t1lezJl7/6yJ8amDHhE/pOYfqJRbQBMJQQK	0	\N	0	\N	\N	\N
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- Name: areas areas_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY areas
    ADD CONSTRAINT areas_pkey PRIMARY KEY (id);


--
-- Name: campuses campuses_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY campuses
    ADD CONSTRAINT campuses_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: cities cities_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY (id);


--
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: courses courses_code_unique; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT courses_code_unique UNIQUE (code);


--
-- Name: courses courses_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: lines lines_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lines
    ADD CONSTRAINT lines_pkey PRIMARY KEY (id);


--
-- Name: location_has_area location_has_area_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_area
    ADD CONSTRAINT location_has_area_pkey PRIMARY KEY (id);


--
-- Name: location_has_city location_has_city_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_city
    ADD CONSTRAINT location_has_city_pkey PRIMARY KEY (id);


--
-- Name: location_has_country location_has_country_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_country
    ADD CONSTRAINT location_has_country_pkey PRIMARY KEY (id);


--
-- Name: location_has_line location_has_line_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_line
    ADD CONSTRAINT location_has_line_pkey PRIMARY KEY (id);


--
-- Name: location_has_point location_has_point_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_point
    ADD CONSTRAINT location_has_point_pkey PRIMARY KEY (id);


--
-- Name: location_has_state location_has_state_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_state
    ADD CONSTRAINT location_has_state_pkey PRIMARY KEY (id);


--
-- Name: locations locations_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY locations
    ADD CONSTRAINT locations_pkey PRIMARY KEY (id);


--
-- Name: majors majors_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY majors
    ADD CONSTRAINT majors_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: points points_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY points
    ADD CONSTRAINT points_pkey PRIMARY KEY (id);


--
-- Name: project_has_campus project_has_campus_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_campus
    ADD CONSTRAINT project_has_campus_pkey PRIMARY KEY (id);


--
-- Name: project_has_category project_has_category_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_category
    ADD CONSTRAINT project_has_category_pkey PRIMARY KEY (id);


--
-- Name: project_has_course project_has_course_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_course
    ADD CONSTRAINT project_has_course_pkey PRIMARY KEY (id);


--
-- Name: project_has_location project_has_location_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_location
    ADD CONSTRAINT project_has_location_pkey PRIMARY KEY (id);


--
-- Name: project_has_major project_has_major_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_major
    ADD CONSTRAINT project_has_major_pkey PRIMARY KEY (id);


--
-- Name: project_has_strategicpartner project_has_strategicpartner_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_strategicpartner
    ADD CONSTRAINT project_has_strategicpartner_pkey PRIMARY KEY (id);


--
-- Name: project_has_time project_has_time_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_time
    ADD CONSTRAINT project_has_time_pkey PRIMARY KEY (id);


--
-- Name: project_has_user project_has_user_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_user
    ADD CONSTRAINT project_has_user_pkey PRIMARY KEY (id);


--
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);


--
-- Name: states states_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY states
    ADD CONSTRAINT states_pkey PRIMARY KEY (id);


--
-- Name: strategicpartners strategicpartners_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY strategicpartners
    ADD CONSTRAINT strategicpartners_pkey PRIMARY KEY (id);


--
-- Name: times times_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY times
    ADD CONSTRAINT times_pkey PRIMARY KEY (id);


--
-- Name: user_has_category user_has_category_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY user_has_category
    ADD CONSTRAINT user_has_category_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_reserved_at_index; Type: INDEX; Schema: public; Owner: leonvillapun
--

CREATE INDEX jobs_queue_reserved_at_index ON jobs USING btree (queue, reserved_at);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: leonvillapun
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: location_has_area location_has_area_area_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_area
    ADD CONSTRAINT location_has_area_area_id_foreign FOREIGN KEY (area_id) REFERENCES areas(id) ON DELETE CASCADE;


--
-- Name: location_has_area location_has_area_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_area
    ADD CONSTRAINT location_has_area_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_city location_has_city_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_city
    ADD CONSTRAINT location_has_city_city_id_foreign FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE CASCADE;


--
-- Name: location_has_city location_has_city_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_city
    ADD CONSTRAINT location_has_city_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_country location_has_country_country_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_country
    ADD CONSTRAINT location_has_country_country_id_foreign FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE CASCADE;


--
-- Name: location_has_country location_has_country_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_country
    ADD CONSTRAINT location_has_country_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_line location_has_line_line_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_line
    ADD CONSTRAINT location_has_line_line_id_foreign FOREIGN KEY (line_id) REFERENCES lines(id) ON DELETE CASCADE;


--
-- Name: location_has_line location_has_line_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_line
    ADD CONSTRAINT location_has_line_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_point location_has_point_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_point
    ADD CONSTRAINT location_has_point_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_point location_has_point_point_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_point
    ADD CONSTRAINT location_has_point_point_id_foreign FOREIGN KEY (point_id) REFERENCES points(id) ON DELETE CASCADE;


--
-- Name: location_has_state location_has_state_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_state
    ADD CONSTRAINT location_has_state_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: location_has_state location_has_state_state_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY location_has_state
    ADD CONSTRAINT location_has_state_state_id_foreign FOREIGN KEY (state_id) REFERENCES states(id) ON DELETE CASCADE;


--
-- Name: project_has_campus project_has_campus_campus_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_campus
    ADD CONSTRAINT project_has_campus_campus_id_foreign FOREIGN KEY (campus_id) REFERENCES campuses(id) ON DELETE CASCADE;


--
-- Name: project_has_campus project_has_campus_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_campus
    ADD CONSTRAINT project_has_campus_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_category project_has_category_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_category
    ADD CONSTRAINT project_has_category_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE;


--
-- Name: project_has_category project_has_category_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_category
    ADD CONSTRAINT project_has_category_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_course project_has_course_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_course
    ADD CONSTRAINT project_has_course_course_id_foreign FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE;


--
-- Name: project_has_course project_has_course_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_course
    ADD CONSTRAINT project_has_course_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_location project_has_location_location_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_location
    ADD CONSTRAINT project_has_location_location_id_foreign FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE;


--
-- Name: project_has_location project_has_location_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_location
    ADD CONSTRAINT project_has_location_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_major project_has_major_major_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_major
    ADD CONSTRAINT project_has_major_major_id_foreign FOREIGN KEY (major_id) REFERENCES majors(id) ON DELETE CASCADE;


--
-- Name: project_has_major project_has_major_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_major
    ADD CONSTRAINT project_has_major_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_strategicpartner project_has_strategicpartner_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_strategicpartner
    ADD CONSTRAINT project_has_strategicpartner_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_strategicpartner project_has_strategicpartner_sp_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_strategicpartner
    ADD CONSTRAINT project_has_strategicpartner_sp_id_foreign FOREIGN KEY (sp_id) REFERENCES strategicpartners(id) ON DELETE CASCADE;


--
-- Name: project_has_time project_has_time_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_time
    ADD CONSTRAINT project_has_time_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_time project_has_time_time_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_time
    ADD CONSTRAINT project_has_time_time_id_foreign FOREIGN KEY (time_id) REFERENCES times(id) ON DELETE CASCADE;


--
-- Name: project_has_user project_has_user_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_user
    ADD CONSTRAINT project_has_user_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;


--
-- Name: project_has_user project_has_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY project_has_user
    ADD CONSTRAINT project_has_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;


--
-- Name: user_has_category user_has_category_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY user_has_category
    ADD CONSTRAINT user_has_category_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE;


--
-- Name: user_has_category user_has_category_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY user_has_category
    ADD CONSTRAINT user_has_category_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

