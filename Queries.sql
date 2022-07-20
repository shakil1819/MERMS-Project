
Creating A SEQUENCE

    create sequence order_id minvalue 1 start with 1 cache 10;
    create sequence demand_id minvalue 1 start with 1 cache 10;
    create sequence issue_status_id minvalue 1 start with 1 cache 10;
    create sequence return_id minvalue 1 start with 1 cache 10;


select Unit_name, demand_id, item_name, demand_quantity, held_quantity from item join demand_order using(item_id) join unit using(unit_id)
alter table issue_status add constraint is_uk UNIQUE(Demand_ID);

create view repair_info as select unit_name, order_id,equipment_id, priority,  order_date from repair_order join equipment using(equipment_id) join unit using(unit_id)

select shop_id, shop_password, shop_name, (select count(order_id) from repair_status join shop using(shop_id) group by shop_name)"Present Load" from shop  


create view pers_info_view("ID","Name","Trade","Shop","District","Mobile No","Service Length") as select pers_id, first_name ||' '||last_name, trade, shop_name, Dist, mob_no, (ROUND((SYSDATE-DOJ)/365))||' Years'"Service Length" from technician join shop using(shop_id)
Inventory:
    

All Demand Order:
    select demand_id"Demand ID", to_char(demand_date,'dd/mm/yyyy')"Placed On", unit_name"Unit", item_name, demand_quantity"Demanded Quantity", held_quantity"Held Quantity", order_priority"Priority", store_name"Store" from store join item using(store_id) join item_for_demand using (item_id) join demand_order using(demand_id) join unit using (unit_id)

All Repair Order:
    select o.order_id"Order No", u.unit_name"From", m.model_name"Equipment", to_char(o.order_date,'dd/mm/yyyy')"Order Date", o.priority, s.shop_name"Present Loc", r.repair_status_remark "Remarks" from shop s, repair_status r, repair_order o, equipment e, unit u, model m where s.shop_id=r.shop_id and r.order_id=o.order_id and o.equipment_id=e.equipment_id and e.unit_id=u.unit_id and e.model_id=m.model_id

Repair Status for Unit:
    select o.order_id"Order No", m.model_name"Equipment", to_char(o.order_date,'dd/mm/yyyy')"Order Date", o.priority, s.shop_name"Present State", to_char(rt.collection_date,'dd/mm/yyyyy')"Collection Date", rt.return_id"Collection ID", r.repair_status_remark"Remarks" from shop s, repair_status r, repair_order o, equipment e, unit u, model m, return rt where s.shop_id=r.shop_id and r.order_id=o.order_id and o.equipment_id=e.equipment_id and e.unit_id=u.unit_id and e.model_id=m.model_id and r.order_id=rt.order_id and u.unit_id='FD01'
    
Issue Status for Unit:
    select d.demand_id"Demand ID", to_char(d.demand_date,'dd/mm/yyyy')"Date", i.item_name"Item", f.demand_quantity"Qunatity", s.issue_status"Status", s.issue_quantity"Approved", to_char(s.issue_date,'dd/mm/yyyy')"Collection Date", s.issue_status_id"Collection ID" from demand_order d, item_for_demand f, item i, unit u, issue_status s where s.demand_id=d.demand_id and i.item_id=f.item_id and f.demand_id=d.demand_id and d.unit_id=u.unit_id and u.unit_id='FD01'

Technician:
	select pers_id"ID", First_name, Last_name, Shop_id"Wors On", Dist, Thana, Mob_no, ABS(ROUND((SYSDATE-doj)/365))||' Years'"Service Length" from technician

select unit_name, type, model_name, count(model_id) from model join equipment using(model_id) join unit using(unit_id) group by model_id where unit_id='FD01'


select item_name, SUM(Demand_Quantity) from item join item_for_demand using(item_id) group by item_name

create view item_view("Name", "Model", "Quantity", "Store") as select item_name, model_name, held_quantity, store_name  from store join item using(store_id) join model using(model_id)

*************
create or replace procedure 
create_demand(d_id out varchar2, unit in nvarchar2, item in varchar2, qty in varchar2,pri in varchar2, d_date out DATE)
as
begin

    d_id:='D_'||demand_id.nextval;
    d_date:=to_date(sysdate,'dd-mm-yyyy');
    insert into DEMAND_ORDER(demand_id,unit_id,item_id,demand_quantity,demand_priority,demand_date)
    values(d_id,unit,item,qty,pri,d_date);

end;


*******

create or replace procedure 
create_repair(r_id out varchar2, eqpt in varchar2, pri in varchar2, r_date out DATE)
as
begin

    r_id:='R_'||order_id.nextval;
    r_date:=to_date(sysdate,'dd-mm-yyyy');
    insert into REPAIR_ORDER(order_id,equipment_id,priority,order_date)
    values(r_id,eqpt,pri,r_date);

end;





*******
create or replace procedure 
create_issue(i_id out varchar2, d_id in varchar2, status in varchar2, i_date out DATE)
as
begin

    i_id:='I_'||issue_status_id.nextval;
    i_date:=to_date(sysdate+5,'dd-mm-yyyy');
    insert into issue_status(issue_status_id, demand_id, issue_status, issue_date)
    values(i_id,d_id,status,i_date);

end;




**********
create or replace procedure 
create_issue_p(i_id out varchar2, d_id in varchar2, status in varchar2)
as
begin

    i_id:='I_'||issue_status_id.nextval;

    insert into issue_status(issue_status_id, demand_id, issue_status)
    values(i_id,d_id,status);

end;


**********
create or replace procedure 
create_return(rt_id out varchar2, o_id in varchar2, rmk in varchar2, c_date out DATE)
as
begin

    rt_id:='RT_'||return_id.nextval;
    c_date:=to_date(sysdate+5,'dd-mm-yyyy');
    insert into RETURN(return_id, order_id, state, collection_date)
    values(rt_id, o_id, rmk, c_date);

end;


*************

CREATE TRIGGER repair_trig AFTER insert ON repair_order
FOR EACH ROW

BEGIN
    INSERT INTO repair_status(order_id)
       VALUES (:new.order_id);
END;