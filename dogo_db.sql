CREATE TABLE IF NOT EXISTS Company (
    IdCompany INT,
    companyName VARCHAR(255),
    Description VARCHAR(255),
    CreatedAt DATE,

    PRIMARY KEY (IdCompany)
);


CREATE TABLE IF NOT EXISTS Chenil (
    IdChenil INT,
    chenilName VARCHAR(255),
    IdCompany INT,
    IdLocation INT,

    PRIMARY KEY (IdChenil),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory),
    FOREIGN KEY (IdCompany) REFERENCES Company(IdCompany),
    FOREIGN KEY (IdLocation) REFERENCES Location(IdLocation)
);


CREATE TABLE IF NOT EXISTS Location (
    IdLocation INT,
    locationName VARCHAR(255),
    IdCompany INT,

    PRIMARY KEY (IdLocation),
    FOREIGN KEY (IdCompany) REFERENCES Company(IdCompany)
);


CREATE TABLE IF NOT EXISTS Employees (
    IdEmployee INT,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255),
    Password VARCHAR(255),
    Hire_date DATE,
    IdLocation INT,
    IdTask INT,
    IdCompany INT,

    PRIMARY KEY (IdEmployee),
    FOREIGN KEY (IdTask) REFERENCES Tasks(IdTask),
    FOREIGN KEY (IdCompany) REFERENCES Compeny(IdCompany)
);

CREATE TABLE IF NOT EXISTS Tasks (
    IdTask INT,
    taskName VARCHAR(255),
    Description VARCHAR(255),
    Work VARCHAR(255),
    StartDate DATE,
    EndDate DATE,
    CreatedAt DATE,
    UpdatedAt DATE,
    IdEmployee INT,

    PRIMARY KEY (IdTask),
    FOREIGN KEY (IdEmployee) REFERENCES Employees(IdEmployee)
);


CREATE TABLE IF NOT EXISTS Animals (
    IdAnimal INT,
    animalName VARCHAR(255),
    Food_allowed VARCHAR(255),
    ArrivedAt DATE,
    AdoptedAt DATE,
    BornAt DATE,
    IdCategory INT,
    IdRoom INT,
    IdFood INT,
    IdChenil INT,
    IdDonator INT,

    PRIMARY KEY (IdAnimal),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory),
    FOREIGN KEY (IdRoom) REFERENCES Rooms(IdRoom),
    FOREIGN KEY (IdFood) REFERENCES Food_items(IdFood),
    FOREIGN KEY (IdChenil) REFERENCES Chenil(IdChenil),
    FOREIGN KEY (IdDonator) REFERENCES Donators(IdDonator)
);


CREATE TABLE IF NOT EXISTS Rooms (
    IdRoom INT,
    roomName VARCHAR(255),
    Area VARCHAR(255),
    IdAnimal INT,

    PRIMARY KEY (IdRoom),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE IF NOT EXISTS Food_items (
    IdFood INT,
    foodName VARCHAR(255),
    Composition VARCHAR(255),

    PRIMARY KEY (IdFood)
);


CREATE TABLE IF NOT EXISTS Clients (
    IdClient INT,
    clientName VARCHAR(255),
    Type VARCHAR(255),
    IdAnimal INT,
    IdChenil INT,
    IdCategory INT,

    PRIMARY KEY (IdClient),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal),
    FOREIGN KEY (IdChenil) REFERENCES Chenil(IdChenil),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory)
);


CREATE TABLE IF NOT EXISTS Categories (
    IdCategory INT,
    categoryName VARCHAR(255),

    PRIMARY KEY (IdCategory)
);

CREATE TABLE IF NOT EXISTS Donators (
    IdDonator INT,
    GivenAt DATE,
    IdClient INT,
    IdAnimal INT,

    PRIMARY KEY (IdDonator),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal),
    FOREIGN KEY (IdClient) REFERENCES Clients(IdClient)
);

CREATE TABLE IF NOT EXISTS Buyers (
    IdBuyer INT,
    AdoptedAt DATE,
    IdInvoice INT,
    IdAnimal INT,

    PRIMARY KEY (IdBuyer),
    FOREIGN KEY (IdInvoice) REFERENCES Invoice(IdInvoice),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE IF NOT EXISTS Invoice (
    IdInvoice INT,
    Payement INT,
    IdClient INT,
    IdAnimal INT,

    PRIMARY KEY (IdInvoice),
    FOREIGN KEY (IdClient) REFERENCES Clients(IdClient),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE IF NOT EXISTS Races (
    IdRace INT,
    raceName VARCHAR(255),
    IdCategory INT,

    PRIMARY KEY (IdRace),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory)
);



/* INSERT DATAS */

INSERT INTO company (companyName, Description) VALUES ('PetHeaven', 'Some company description');

INSERT INTO chenil (Name, IdCompany, IdLocation) VALUES ('PetHeaven - Bordeaux', 1, 1);
INSERT INTO chenil (Name, IdCompany, IdLocation) VALUES ('PetHeaven - Marseille', 1, 2);

INSERT INTO location (locationName, IdCompany) VALUES ('Bordeaux', 1);
INSERT INTO location (locationName, IdCompany) VALUES ('Marseille', 1);

INSERT INTO categories (categoryName) VALUES ('Doggos');
INSERT INTO categories (categoryName) VALUES ('Cats');

INSERT INTO races (raceName, IdCategory) VALUES ('Berger Allemand', 1);
INSERT INTO races (raceName, IdCategory) VALUES ('Shiba', 1);
INSERT INTO races (raceName, IdCategory) VALUES ('Cocker', 1);
INSERT INTO races (raceName, IdCategory) VALUES ('Husky', 1);
INSERT INTO races (raceName, IdCategory) VALUES ('Persan', 2);
INSERT INTO races (raceName, IdCategory) VALUES ('Siamois', 2);
INSERT INTO races (raceName, IdCategory) VALUES ('Ragdoll', 2);
INSERT INTO races (raceName, IdCategory) VALUES ('Sphynx', 2);