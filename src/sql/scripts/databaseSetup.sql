CREATE TABLE Customer (
    CID 		    integer, 
    Name		    char(20),
    PhoneNumber 	char(10),
    primary key (CID));
               
insert into Customer(CID, Name, PhoneNumber) values (1, "John Smith", "6041234567");
insert into Customer(CID, Name, PhoneNumber) values (2, "Bob Daniel", "6043334422");
insert into Customer(CID, Name, PhoneNumber) values (3, "Johnny James", "6044221345");               
insert into Customer(CID, Name, PhoneNumber) values (4, "Amber Jones", "6049901323");
insert into Customer(CID, Name, PhoneNumber) values  (5, "Karl Smith", "6042301323");              
               
CREATE TABLE OrderedParcel(
    OID         integer,
    CID	 	    integer not null,
    primary key (OID),
    foreign key (CID) References Customer(CID)
        on update cascade
);
               
insert into OrderedParcel(OID,CID) values (1, 1);
insert into OrderedParcel(OID,CID) values (2, 1);
insert into OrderedParcel(OID,CID) values (3, 2);               
insert into OrderedParcel(OID,CID) values (4, 3);               
insert into OrderedParcel(OID,CID) values (5, 4);   
               
CREATE TABLE PlacedOrder (			
    OID         integer,
    CID 		integer not null,

    primary key (OID, CID),
    foreign key (CID) references Customer(CID)
        ON UPDATE cascade
);

insert into PlacedOrder(OID,CID) values (1,1);
insert into PlacedOrder(OID,CID) values (2,1);
insert into PlacedOrder(OID,CID) values (3,2);
insert into PlacedOrder(OID,CID) values (4,3);
insert into PlacedOrder(OID,CID) values (5,4);

CREATE TABLE OrderStatus(
    OID	        integer,
    Status		char(40),
    primary key (OID),
    foreign key (OID) references PlacedOrder(OID)
        on update cascade
        on delete cascade
  );

insert into OrderStatus(OID, Status) values (1, "On the way!");
insert into OrderStatus(OID, Status) values (2,"Processing");
insert into OrderStatus(OID, Status) values (3,"On the way!");
insert into OrderStatus(OID, Status) values (4,"Delivered");
insert into OrderStatus(OID, Status) values (5,"Stored at local warehouse");
              
CREATE TABLE OrderDest(
    OID             integer,
    ShippingAddress char(60),
    primary key (OID)
);

insert into OrderDest(OID, ShippingAddress) values (1, "Vancouver, BC V6T 1Z4"); 
insert into OrderDest(OID, ShippingAddress) values (2, "1324 East 13nd Vancouver, BC V85 3N1"); 
insert into OrderDest(OID, ShippingAddress) values (3, "8223 North 22nd Vancouver, BC V15 3N1"); 
insert into OrderDest(OID, ShippingAddress) values (4, "8223 North 22nd Vancouver, BC V15 3N1"); 
insert into OrderDest(OID, ShippingAddress) values (5, "Vancouver, BC V6T 1Z4"); 

CREATE TABLE OrderOrig(
    OID             integer,
    ReturnAddress   char(60),
    primary key (OID)
);

insert into OrderOrig(OID, ReturnAddress) values (1, "1111 East 1st Vancouver, BC V5G 13N"); 
insert into OrderOrig(OID, ReturnAddress) values (2, "1324 East 13nd Vancouver, BC V85 3N1"); 
insert into OrderOrig(OID, ReturnAddress) values (3, "2223 West 22nd Vancouver, BC V85 3z1"); 
insert into OrderOrig(OID, ReturnAddress) values (4, "8223 North 22nd Vancouver, BC V15 3N1"); 
insert into OrderOrig(OID, ReturnAddress) values (5, "4111 South 1st Vancouver, BC V2G 13N"); 

CREATE TABLE OrderedOn(
    OID     integer,
    Date    date,
    primary key (OID)
);

insert into OrderedOn(OID, Date) values (1, "2020-06-01");
insert into OrderedOn(OID, Date) values (2, "2020-06-01");
insert into OrderedOn(OID, Date) values (3, "2020-06-02");
insert into OrderedOn(OID, Date) values (4, "2020-06-02");
insert into OrderedOn(OID, Date) values (5, "2020-06-03");

CREATE TABLE OrderETA(
    OID     integer,
    Date    date,
    primary key (OID)
);

insert into OrderETA(OID, Date) values (1, "2020-06-02");
insert into OrderETA(OID, Date) values (2, "2020-06-03");
insert into OrderETA(OID, Date) values (3, "2020-06-04");
insert into OrderETA(OID, Date) values (4, "2020-06-05");
insert into OrderETA(OID, Date) values (5, "2020-06-06");

               
CREATE TABLE Employee (
    SSN			    integer,
    Name			char(20),
    Gender		    char(7),
    Age			    integer,
    Email			char(40),
    PhoneNumber	    char(10),
    HomeAddress	    char(40),
    primary key (SSN)
);

insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343182, "Tony Towns", "Male", 23, "TT1997@gmail.com", "6043231204", "3321 East 23rd Vancouver, BC V3G 5N2");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (126343183, "Esmay Bostock", "Male", 26, "EB13239@hotmail.com", "6043421204", "2021 East 13rd Vancouver, BC V19 512");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (226343184, "Fleur Huynh
", "Female", 27, "FHuynh23@gmail.com", "6043231204", "1231 East 5rd Vancouver, BC V2G 572");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (153431851, "Usman Griffin
", "Male", 23, "UsmanGriffin7@gmail.com", "6041251204", "1821 East 19rd Vancouver, BC V7G 5N2");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (999999999, "Viet Pham", "Male", 23, "bvpham7@gmail.com", "6044462769", "2222 East 11rd Vancouver, BC V3G 5N1");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343187, "Daniel Escobar", "Male", 26, "DE1637@gmail.com", "6043236604", "3291 East 49rd Vancouver, BC V6G 7N2");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343188, "Jone Towns", "Male", 23, "JT1237@gmail.com", "6043231244", "1111 East 42rd Vancouver, BC V2C 5CN");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343189, "Jordan Mah", "Male", 28, "JordMah23@gmail.com", "6041331204", "862 East 13rd Vancouver, BC V1G 5N2");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343110, "Aaron Aaron", "Male", 31, "Aaaaron@gmail.com", "6043221204", "6721 West 23rd Vancouver, BC V23 5N2");
insert into Employee (SSN, Name, Gender, Age, Email, PhoneNumber, HomeAddress)
values (626343111, "Cornelius Ross", "Male", 32, "Corn@gmail.com", "6043231104", "1321 North 23rd Vancouver, BC N1G 6N2");

CREATE TABLE Schedule (
    ScheduleID      integer,
    Date            DATE,
    PRIMARY KEY (ScheduleID)
);

insert into Schedule(ScheduleID, Date) values (1, "2020-05-01");
insert into Schedule(ScheduleID, Date) values (2, "2020-05-08");
insert into Schedule(ScheduleID, Date) values (3, "2020-05-15");
insert into Schedule(ScheduleID, Date) values (4, "2020-05-22");
insert into Schedule(ScheduleID, Date) values (5, "2020-05-28");  
               
CREATE TABLE ScheduleTime(
    SSN            integer, 
    StartTime        Time,
    EndTime        Time,
    primary key (SSN)
);

insert into ScheduleTime(SSN, StartTime, EndTime)
values (626343111, "07:00:00", "15:00:00");
insert into ScheduleTime(SSN, StartTime, EndTime)
values (626343187, "09:30:00", "17:30:00");
insert into ScheduleTime(SSN, StartTime, EndTime)
values (626343188, "09:00:00", "17:00:00");
insert into ScheduleTime(SSN, StartTime, EndTime)
values (626343189, "09:00:00", "17:00:00");
insert into ScheduleTime(SSN, StartTime, EndTime)
values (999999999, "09:00:00", "17:00:00"); 

CREATE TABLE Courier (
    SSN					    integer,
    DriverLicenseNumber 	integer Unique not NULL,
    primary key (SSN),
    foreign key (SSN) references Employee(SSN)
        on delete cascade
        on update cascade
);
               
insert into Courier(SSN, DriverLicenseNumber) values (999999999, 9221270);
insert into Courier(SSN, DriverLicenseNumber) values (626343111, 5678568);
insert into Courier(SSN, DriverLicenseNumber) values (626343189, 6456737);
insert into Courier(SSN, DriverLicenseNumber) values (626343187, 3214215);
insert into Courier(SSN, DriverLicenseNumber) values (626343188, 1234145);

CREATE TABLE DrivesVehicle (
    VID			integer,
    SSN			integer not null,
    primary key (VID),
    FOREIGN KEY (SSN) REFERENCES Courier(SSN)
        ON UPDATE CASCADE
);

insert into DrivesVehicle(VID, SSN) values (12312344, 999999999);
insert into DrivesVehicle(VID, SSN) values (62362362, 626343188);
insert into DrivesVehicle(VID, SSN) values (65232725, 626343111);
insert into DrivesVehicle(VID, SSN) values (41236172, 626343187);  
insert into DrivesVehicle(VID, SSN) values (62562652, 626343189);

CREATE TABLE Office (
    OfficeID		integer,
    Location		char(60),
    primary key (OfficeID)
);
insert into Office(OfficeID, Location) values (1, "Pender St, 1312 Vancouver, BC, V21 681"); 
insert into Office(OfficeID, Location) values (2, "591 Grand Avenue,San Marcos CA 92069, US");
insert into Office(OfficeID, Location) values (3, "548 Market St, San Francisco, CA 94104-5401, US");
insert into Office(OfficeID, Location) values (4, "2334 N Jackson Starlington, Virginia, 22201, US"); 
insert into Office(OfficeID, Location) values (5, "500 Kingston Rd, Toronto ON M4L 1V3"); 
               
CREATE TABLE ManagedOffice(
    SSN			integer,
    OfficeID    integer,
    primary key (SSN),
    foreign key (OfficeID) references Office(OfficeID)
        on delete set null
        on update cascade,
    foreign key (SSN) references Employee(SSN)
        on delete cascade
        on update cascade
);
insert into ManagedOffice(SSN, OfficeID) values (626343182, 1);
insert into ManagedOffice(SSN, OfficeID) values (126343183, 1);
insert into ManagedOffice(SSN, OfficeID) values (226343184, 1);
insert into ManagedOffice(SSN, OfficeID) values (153431851, 1);
insert into ManagedOffice(SSN, OfficeID) values (626343110, 1);

CREATE TABLE Invoice(
    IID		integer,
    Cost	real,
    CID		integer,
    SSN		integer not null,
    OID     integer not null,
    primary key (IID),
    foreign key (CID) references Customer(CID)
        on update cascade,
    foreign key (SSN) references ManagedOffice(SSN),
    foreign key (OID) references PlacedOrder(OID)
);
insert into Invoice(IID, Cost, CID, SSN, OID) values (1, 50.39, 1, 226343184, 1);
insert into Invoice(IID, Cost, CID, SSN, OID) values (2, 100.00, 1, 226343184, 2);
insert into Invoice(IID, Cost, CID, SSN, OID) values (3, 70, 2, 226343184, 3);
insert into Invoice(IID, Cost, CID, SSN, OID) values (4, 30, 3, 226343184, 4);
insert into Invoice(IID, Cost, CID, SSN, OID) values (5, 22.99, 4, 226343184, 5);
               
CREATE TABLE Warehouse(
    WID		integer,
    Address	char(60),
    primary key (WID)
);

insert into Warehouse(WID, Address) values (1, "Pender St, 1313 Vancouver, BC, V21 682");
insert into Warehouse(WID, Address) values (2, "590 Grand Avenue,San Marcos CA 92068, US");
insert into Warehouse(WID, Address) values (3, "547 Market St, San Francisco, CA 94104-5400, US");
insert into Warehouse(WID, Address) values (4, "2333 N Jackson Starlington, Virginia, 22202, US");
insert into Warehouse(WID, Address) values (5, "505 Kingston Rd, Toronto ON M4L 1V7");
               
CREATE TABLE CreateSchedule (
    ScheduleID      integer,
    SSN             integer,
    DateCreated     DATE,
    PRIMARY KEY (ScheduleID, SSN),
    foreign key (SSN) references ManagedOffice(SSN)
        ON UPDATE cascade,
    foreign key (ScheduleID) references Schedule(ScheduleID)
        ON DELETE cascade
        ON UPDATE cascade
);
               
insert into CreateSchedule (ScheduleID, SSN, DateCreated) values (1, 626343182, "2020-04-27");
insert into CreateSchedule (ScheduleID, SSN, DateCreated) values (2, 126343183, "2020-05-07");
insert into CreateSchedule (ScheduleID, SSN, DateCreated) values (3, 226343184, "2020-05-14");
insert into CreateSchedule (ScheduleID, SSN, DateCreated) values (4, 153431851, "2020-05-21");
insert into CreateSchedule (ScheduleID, SSN, DateCreated) values (5, 626343110, "2020-05-27");  
               
CREATE TABLE ScheduledEmployee(
    ScheduleID      integer,
    SSN             integer,
    primary key (ScheduleID, SSN),
    foreign key (SSN) references Employee (SSN)
            ON DELETE cascade
            ON UPDATE cascade,
    foreign key (ScheduleID) references Schedule (ScheduleID)
            ON DELETE cascade
            ON UPDATE cascade
);

insert into ScheduledEmployee(ScheduleID, SSN) values (1, 626343182);    
insert into ScheduledEmployee(ScheduleID, SSN) values (2, 626343182);    
insert into ScheduledEmployee(ScheduleID, SSN) values (3, 626343182);    
insert into ScheduledEmployee(ScheduleID, SSN) values (4, 626343182);    
insert into ScheduledEmployee(ScheduleID, SSN) values (5, 626343182);     

CREATE TABLE AssignedRoute (
    RID			integer, 
    Distance 	real,
    SSN			integer,
    primary key (RID),
    FOREIGN KEY (SSN) REFERENCES Courier(SSN)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

insert into AssignedRoute(RID,Distance,SSN) values (1, 15.4, 999999999);
insert into AssignedRoute(RID,Distance,SSN) values (5, 4.2, 999999999);
insert into AssignedRoute(RID,Distance,SSN) values (4, 82.4, 999999999);
insert into AssignedRoute(RID,Distance,SSN) values (3, 0.3, 626343187);
insert into AssignedRoute(RID,Distance,SSN) values (2, 1.3, 626343188);

CREATE TABLE SetsRoute(
    SSN 	    integer, 
    RID			integer,
    primary key (SSN,RID),
    FOREIGN KEY (SSN) REFERENCES ManagedOffice(SSN)
        ON UPDATE CASCADE,
    FOREIGN KEY (RID) REFERENCES AssignedRoute(RID)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
insert into SetsRoute(SSN, RID) values (626343182, 1);
insert into SetsRoute(SSN, RID) values (626343110, 2);
insert into SetsRoute(SSN, RID) values (626343182, 3);
insert into SetsRoute(SSN, RID) values (626343110, 4);
insert into SetsRoute(SSN, RID) values (626343182, 5);          
               
CREATE TABLE StoredParcel(
    OID		integer,
    WID		integer,
    primary key (OID),
    foreign key (OID) references OrderedParcel(OID)
        on update cascade
        on delete cascade,
    foreign key (WID) references Warehouse(WID)
        on update cascade
        on delete cascade
);
insert into StoredParcel(OID, WID) values (1, 1);
insert into StoredParcel(OID, WID) values (2, 1);
insert into StoredParcel(OID, WID) values (3, 1);
insert into StoredParcel(OID, WID) values (4, 1);
insert into StoredParcel(OID, WID) values (5, 1);

CREATE TABLE Parcel(
    PID		    integer,
    Length 	    real,
    Width	    real,
    Height	    real,
    Weight	    real,
    OID			integer,
    VID			integer,
    primary key (PID),
    foreign key (OID) references OrderedParcel(OID)
        on update cascade
        on delete cascade,
    foreign key (VID) references DrivesVehicle(VID)
        on update cascade
        on delete set null
);
insert into Parcel(PID, Length, Width, Height, Weight, OID, VID) values (1, 2, 2, 2, 15, 1, 12312344); 
insert into Parcel(PID, Length, Width, Height, Weight, OID, VID) values (2, 3, 3, 3, 10, 2, 12312344); 
insert into Parcel(PID, Length, Width, Height, Weight, OID, VID) values (3, 2, 5, 12, 10.5, 3, 41236172); 
insert into Parcel(PID, Length, Width, Height, Weight, OID, VID) values (4, 1, 2.5, 13, 23, 4, 65232725); 
insert into Parcel(PID, Length, Width, Height, Weight, OID, VID) values (5, 2,5, 13, 29, 5, 62362362); 

CREATE TABLE IntransitParcel(
    VID         integer,
    SSN         integer,
    primary key (VID),
    foreign key (SSN) references Courier (SSN)
            on update cascade
            on delete set null,
    foreign key (VID) references DrivesVehicle (VID)
            ON UPDATE cascade
            ON DELETE cascade
);

insert into IntransitParcel(VID, SSN) values (12312344, 999999999);        
insert into IntransitParcel(VID, SSN) values (62362362, 626343188);
insert into IntransitParcel(VID, SSN) values (65232725, 626343111);       
insert into IntransitParcel(VID, SSN) values (41236172, 626343187);                  
insert into IntransitParcel(VID, SSN) values (62562652, 626343189);               

CREATE TABLE Accounts(
    Password        char(20), 
    Username        char(20),
    LvlAccess       integer,
    CID             integer,
    SSN             integer,
    primary key (Username),
    foreign key (SSN) references Employee (SSN)
        on delete cascade,
    foreign key (CID) references Customer (CID)
        on delete cascade
    );
    
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("qwerty123", "JS86", 1, 1, NULL);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("abcdefgh1", "BobbySublime", 1, 2, NULL);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("password", "Johnny32", 1, 3, NULL);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("BJones23", "AmberJones", 1, 4, NULL);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("password", "JS96", 1 ,5, NULL);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("James", "Harden", 3, NULL, 626343182);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("ABCD321", "Damian", 3, NULL, 126343183);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("Alphabet", "Johnny", 3, NULL, 226343184);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("Lion", "UsmanG", 3, NULL, 153431851);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("Jordan", "Michael", 3, NULL, 626343110);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("Phamily", "Viet", 2, NULL, 999999999);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("asdlfh1", "Corn23", 2, NULL, 626343187);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("asdf23r12", "Mary", 2, NULL, 626343188);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("43413AGdff", "Lamb", 2, NULL, 626343189);
insert into Accounts (Password, Username, LvlAccess, CID, SSN) values ("Lebron", "AaronJames", 2, NULL, 626343111);        