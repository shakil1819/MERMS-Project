CREATE TABLE TECHNICIAN 
( 
    pers_id VARCHAR2(12) NOT NULL constraint tech_pk PRIMARY KEY,
    first_name VARCHAR2(20) NOT NULL, 
    last_name VARCHAR2(20) NOT NULL, 
    shop_id VARCHAR2(12),
    dist VARCHAR2(10),
    thana VARCHAR2(10),
    mob_no VARCHAR2(11),
    doj DATE
);

CREATE TABLE UNIT
(
    unit_id VARCHAR2(12) NOT NULL constraint unit_pk PRIMARY KEY,
    unit_name VARCHAR2(100) NOT NULL,
    loc VARCHAR2(100) NOT NULL,
    type VARCHAR2(100) NOT NULL,
    user_id VARCHAR2(12)
);

CREATE TABLE MODEL
(
    model_id VARCHAR2(12) NOT NULL constraint model_pk PRIMARY KEY,
    model_name VARCHAR2(100) NOT NULL,
    type VARCHAR2(100) NOT NULL
);

CREATE TABLE SHOP
(
    shop_id VARCHAR2(12) NOT NULL constraint shop_pk PRIMARY KEY,
    shop_name VARCHAR2(100) NOT NULL,
    user_id VARCHAR2(12)
);

CREATE TABLE RETURN
(
    return_id INT NOT NULL constraint return_pk PRIMARY KEY,
    order_id NUMBER(6),
    state VARCHAR2(100) NOT NULL,
    collection_date DATE
);

CREATE TABLE REPAIR_ORDER
(
    order_id NUMBER(6) NOT NULL constraint ro_id_pk PRIMARY KEY,
    equipment_id VARCHAR2(12),
    priority VARCHAR2(100) NOT NULL,
    order_date DATE
);

CREATE TABLE EQUIPMENT
(
    equipment_id VARCHAR2(12) NOT NULL constraint equipment_pk PRIMARY KEY,    
    model_id VARCHAR2(12),
    unit_id VARCHAR2(12),
    shop_id VARCHAR2(12)
);

CREATE TABLE ITEM
(
    item_id VARCHAR2(12) NOT NULL constraint item_pk PRIMARY KEY,
    item_name VARCHAR2(100) NOT NULL,
    model_id VARCHAR2(12),
    store_id VARCHAR2(12),
    quantity VARCHAR2(100) NOT NULL
);

CREATE TABLE STORE
(
    store_id VARCHAR2(12) NOT NULL constraint store_pk PRIMARY KEY,
    store_name VARCHAR2(100) NOT NULL,
    storeman_name VARCHAR2(100) NOT NULL,
    user_id VARCHAR2(12)
);


CREATE TABLE ISSUE_STATUS
(
    issue_status_id VARCHAR2(12) NOT NULL constraint issue_status_pk PRIMARY KEY,
    demand_id VARCHAR2(12),
    issue_quantity VARCHAR2(100) NOT NULL,
    issue_date DATE,
    issue_status VARCHAR2(100)
);

CREATE TABLE REPAIR_STATUS
(
    repair_order_id NUMBER(6) NOT NULL constraint repair_status_pk PRIMARY KEY,
    shop_id VARCHAR2(12),
    repair_status_remark VARCHAR2(100)
);

CREATE TABLE DEMAND_ORDER
(
    demand_id VARCHAR2(12) NOT NULL constraint demand_order_pk PRIMARY KEY,
    unit_id VARCHAR2(12),
    shop_id VARCHAR2(12),
    order_priority VARCHAR2(100) NOT NULL,
    demand_date DATE
);


CREATE TABLE ITEM_FOR_DEMAND
(
    demand_id VARCHAR2(12),
    item_id VARCHAR2(12),
    quantity NUMBER(10)
);

CREATE TABLE ADMIN
(
    Admin_id VARCHAR2(12) constraint admin_pk PRIMARY KEY,
    name VARCHAR2(12),
    Rank VARCHAR2(12),
    user_id VARCHAR2(12)
);

CREATE TABLE USERS
(
    user_id VARCHAR2(12) constraint user_id_pk PRIMARY KEY,
    password VARCHAR2(12),
    previlege VARCHAR2(12)
)