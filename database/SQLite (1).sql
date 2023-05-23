CREATE TABLE person (
  userid INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  birthday DATE NOT NULL
);

CREATE TABLE phone_numbers (
  person_id INT,
  phone_number VARCHAR(20) NOT NULL,
  PRIMARY KEY (person_id, phone_number),
  FOREIGN KEY (person_id) REFERENCES person (userid)
);

CREATE TABLE JobListing (
  listing_id INT PRIMARY KEY AUTO_INCREMENT,
  job_description TEXT NOT NULL,
  job_type VARCHAR(50) NOT NULL,
  job_title VARCHAR(100) NOT NULL,
  salary DECIMAL(10, 2),
  company_profile TEXT,
  application_deadline DATE
);

CREATE TABLE JobSeeker (
  userid INT PRIMARY KEY,
  field VARCHAR(100),
  experience TEXT,
  education TEXT,
  preferences TEXT,
  listingId INT,
  FOREIGN KEY (userid) REFERENCES person (userid),
  FOREIGN KEY (listingId) REFERENCES JobListing (listing_id)
);

CREATE TABLE Recruiter (
  userid INT PRIMARY KEY,
  rating DECIMAL(3, 2),
  pinnedPage TEXT,
  listingId INT,
  FOREIGN KEY (userid) REFERENCES person (userid),
  FOREIGN KEY (listingId) REFERENCES JobListing (listing_id)
);

CREATE TABLE Employer (
  employerId INT PRIMARY KEY,
  contactName VARCHAR(100),
  contactSurname VARCHAR(100),
  companyName VARCHAR(100),
  ownerName VARCHAR(100),
  ownerSurname VARCHAR(100),
  field VARCHAR(100),
  email VARCHAR(100),
  foundingDate DATE
);

CREATE TABLE EmployerPhone (
  employerId INT,
  phoneNumber VARCHAR(20),
  PRIMARY KEY (employerId, phoneNumber),
  FOREIGN KEY (employerId) REFERENCES Employer (employerId)
);
