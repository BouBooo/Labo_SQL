CREATE TABLE Company (
    IdCompany INT,
    Name VARCHAR(255),
    Description VARCHAR(255),
    CreatedAt DATE,
    IdChenil INT,

    PRIMARY KEY (IdCompany)
);


CREATE TABLE Chenil (
    IdChenil INT,
    Name VARCHAR(255),
    IdCategory INT,
    IdCompany INT,
    IdLocation INT,

    PRIMARY KEY (IdChenil),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory),
    FOREIGN KEY (IdCompany) REFERENCES Company(IdCompany),
    FOREIGN KEY (IdLocation) REFERENCES Location(IdLocation)
);


CREATE TABLE Location (
    IdLocation INT,
    Name VARCHAR(255),
    IdCompany INT,

    PRIMARY KEY (IdLocation),
    FOREIGN KEY (IdCompany) REFERENCES Company(IdCompany)
);


CREATE TABLE Employees (
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

CREATE TABLE Tasks (
    IdTask INT,
    Name VARCHAR(255),
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


CREATE TABLE Animals (
    IdAnimal INT,
    Name VARCHAR(255),
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


CREATE TABLE Rooms (
    IdRoom INT,
    Name VARCHAR(255),
    Area VARCHAR(255),
    IdAnimal INT,

    PRIMARY KEY (IdRoom),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE Food_items (
    IdFood INT,
    Name VARCHAR(255),
    Composition VARCHAR(255),

    PRIMARY KEY (IdFood)
);


CREATE TABLE Clients (
    IdClient INT,
    Name VARCHAR(255),
    Type VARCHAR(255),
    IdAnimal INT,
    IdChenil INT,
    IdCategory INT,

    PRIMARY KEY (IdClient),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal),
    FOREIGN KEY (IdChenil) REFERENCES Chenil(IdChenil),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory)
);


CREATE TABLE Categories (
    IdCategory INT,
    Name VARCHAR(255),

    PRIMARY KEY (IdCategory)
);

CREATE TABLE Donators (
    IdDonator INT,
    GivenAt DATE,
    IdClient INT,
    IdAnimal INT,

    PRIMARY KEY (IdDonator),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal),
    FOREIGN KEY (IdClient) REFERENCES Clients(IdClient)
);

CREATE TABLE Buyers (
    IdBuyer INT,
    AdoptedAt DATE,
    IdInvoice INT,
    IdAnimal INT,

    PRIMARY KEY (IdBuyer),
    FOREIGN KEY (IdInvoice) REFERENCES Invoice(IdInvoice),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE Invoice (
    IdInvoice INT,
    Payement INT,
    IdClient INT,
    IdAnimal INT,

    PRIMARY KEY (IdInvoice),
    FOREIGN KEY (IdClient) REFERENCES Clients(IdClient),
    FOREIGN KEY (IdAnimal) REFERENCES Animals(IdAnimal)
);


CREATE TABLE Races (
    IdRace INT,
    Name VARCHAR(255),
    IdCategory INT,

    PRIMARY KEY (IdRace),
    FOREIGN KEY (IdCategory) REFERENCES Categories(IdCategory)
);

