create sequence quiz_id_seq
    as integer
    cache 5;

alter sequence quiz_id_seq owner to root;

create sequence demacia_id_seq
    as integer;

alter sequence demacia_id_seq owner to root;

create sequence runeterra_id_seq
    as integer;

alter sequence runeterra_id_seq owner to root;

create sequence noxus_id_seq
    as integer;

alter sequence noxus_id_seq owner to root;

create sequence freljord_id_seq
    as integer;

alter sequence freljord_id_seq owner to root;

create sequence targon_id_seq
    as integer;

alter sequence targon_id_seq owner to root;

create sequence ionia_id_seq
    as integer;

alter sequence ionia_id_seq owner to root;

create sequence shadow_id_seq
    as integer;

alter sequence shadow_id_seq owner to root;

create sequence piltzaun_id_seq
    as integer;

alter sequence piltzaun_id_seq owner to root;

create sequence shurima_id_seq
    as integer;

alter sequence shurima_id_seq owner to root;

create table shadow_highscore
(
    score integer,
    id    integer default nextval('shadow_id_seq'::regclass) not null
        constraint shadow_highscore_pk
            primary key
);

alter table shadow_highscore
    owner to root;

create table runeterra_highscore
(
    id    integer default nextval('runeterra_id_seq'::regclass) not null
        constraint runeterra_highscore_pk
            primary key,
    score integer
);

alter table runeterra_highscore
    owner to root;

create table demacia_highscore
(
    id    integer default nextval('demacia_id_seq'::regclass) not null
        constraint demacia_highscore_pk
            primary key,
    score integer
);

alter table demacia_highscore
    owner to root;

create table noxus_highscore
(
    id    integer default nextval('noxus_id_seq'::regclass) not null
        constraint noxus_highscore_pk
            primary key,
    score integer
);

alter table noxus_highscore
    owner to root;

create table ionia_highscore
(
    id    integer default nextval('ionia_id_seq'::regclass) not null
        constraint ionia_highscore_pk
            primary key,
    score integer
);

alter table ionia_highscore
    owner to root;

create table freljord_highscore
(
    id    integer default nextval('freljord_id_seq'::regclass) not null
        constraint freljord_highscore_pk
            primary key,
    score integer
);

alter table freljord_highscore
    owner to root;

create table piltzaun_highscore
(
    id    integer default nextval('piltzaun_id_seq'::regclass) not null
        constraint piltzaun_highscore_pk
            primary key,
    score integer
);

alter table piltzaun_highscore
    owner to root;

create table shurima_highscore
(
    id    integer default nextval('shurima_id_seq'::regclass) not null
        constraint shurima_highscore_pk
            primary key,
    score integer
);

alter table shurima_highscore
    owner to root;

create table targon_highscore
(
    id    integer default nextval('targon_id_seq'::regclass) not null
        constraint targon_highscore_pk
            primary key,
    score integer
);

alter table targon_highscore
    owner to root;

create table users
(
    id                  serial
        constraint users_pk
            primary key,
    username            varchar(100) not null,
    email               varchar(255) not null,
    password            varchar(255) not null,
    enabled             boolean,
    created_at          date default CURRENT_DATE,
    runeterra_highscore integer
        constraint runeterra_highscore
            references runeterra_highscore,
    demacia_highscore   integer
        constraint demacia_highscore
            references demacia_highscore,
    noxus_highscore     integer
        constraint noxus_highscore
            references noxus_highscore,
    freljord_highscore  integer
        constraint freljord_highscore
            references freljord_highscore,
    ionia_highscore     integer
        constraint ionia_highscore
            references ionia_highscore,
    targon_highscore    integer
        constraint targon_highscore
            references targon_highscore,
    shurima_highscore   integer
        constraint shurima_highscore
            references shurima_highscore,
    shadow_highscore    integer
        constraint shadow_highscore
            references shadow_highscore,
    piltzaun_highscore  integer
        constraint piltzaun_highscore
            references piltzaun_highscore
);

alter table users
    owner to root;

create table quiz
(
    id            integer default nextval('quiz_id_seq'::regclass) not null
        constraint quiz_pk
            primary key,
    region        integer,
    question      varchar(255),
    right_answer  varchar(255),
    wrong_answer  varchar(255),
    wrong_answer2 varchar(255),
    wrong_answer3 varchar(255)
);

alter table quiz
    owner to root;

create function uuid_nil() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_nil() owner to root;

create function uuid_ns_dns() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_dns() owner to root;

create function uuid_ns_url() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_url() owner to root;

create function uuid_ns_oid() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_oid() owner to root;

create function uuid_ns_x500() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_x500() owner to root;

create function uuid_generate_v1() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1() owner to root;

create function uuid_generate_v1mc() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1mc() owner to root;

create function uuid_generate_v3(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v3(uuid, text) owner to root;

create function uuid_generate_v4() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v4() owner to root;

create function uuid_generate_v5(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v5(uuid, text) owner to root;


