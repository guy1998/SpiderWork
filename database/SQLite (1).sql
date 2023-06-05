CREATE TABLE person (
  userid INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  birthday DATE NOT NULL,
  profilepic TEXT NOT NULL
);

CREATE TABLE phone_numbers (
  person_id INT,
  phone_number VARCHAR(20) NOT NULL,
  PRIMARY KEY (person_id, phone_number),
  FOREIGN KEY (person_id) REFERENCES person (userid)
);

CREATE TABLE JobSeeker (
  userid INT PRIMARY KEY,
  field VARCHAR(100),
  experience TEXT,
  education TEXT,
  preferences TEXT,
  FOREIGN KEY (userid) REFERENCES person (userid)
);

CREATE TABLE Recruiter (
  userid INT PRIMARY KEY,
  rating DECIMAL(3, 2),
  pinnedPage TEXT,
  FOREIGN KEY (userid) REFERENCES person (userid)
);

CREATE TABLE Employer (
   employerId INT PRIMARY KEY AUTO_INCREMENT,
  contactName VARCHAR(100),
  contactSurname VARCHAR(100),
  companyName VARCHAR(100),
  ownerName VARCHAR(100),
  ownerSurname VARCHAR(100),
  field VARCHAR(100),
  email VARCHAR(100),
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  foundingDate DATE,
  profilepic TEXT NOT NULL
);

CREATE TABLE EmployerPhone (
  employerId INT,
  phoneNumber VARCHAR(20),
  PRIMARY KEY (employerId, phoneNumber),
  FOREIGN KEY (employerId) REFERENCES Employer (employerId)
);

CREATE TABLE JobListing (
  listing_id INT PRIMARY KEY AUTO_INCREMENT,
  job_description TEXT NOT NULL,
  job_type VARCHAR(50) NOT NULL,
  job_title VARCHAR(100) NOT NULL,
  salary DECIMAL(10, 2),
  company_profile TEXT,
  application_deadline DATE,
  employerid INT,
  FOREIGN KEY (employerid) REFERENCES Employer (employerId)
);

CREATE TABLE application_response (
  listing_id INT,
  userid INT,
  employerid INT,
  listing_id INT,
  application_date DATE,
  FOREIGN KEY (userid) REFERENCES person(userid),
  FOREIGN KEY (employerid) REFERENCES employer(employerid),
  FOREIGN KEY (listing_id) REFERENCES joblisting(listing_id)
);
