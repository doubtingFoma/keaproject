# SQL Structured Query Language

  - Both for DDL and DML
  - Embeddable into general-purpose programming languages (e.g.: Java)

## Data types and domains

  - char and varchar: VARCHAR is variable-length, CHAR is fixed length
  - CLOB - (20m - 20 megabytes) - variable-length string data type caleld CHARACTER LARGE OBJECT
  - Strings of bits: B`11101100101` 
  - BLOB - BINARY LARGE OBJECT 
  - BOOLEAN - TRUE / FALSE / NULL
  - DATE, TIME, TIMESTAMP (DATE+TIME)
  - constraints and defaults `age INT NOT NULL CHECK (age>0 AND age<121)`
  - Specifying keys
  - Referential integrity