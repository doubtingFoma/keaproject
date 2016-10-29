# Creating database in SQL

  - `SELECT <attribute list> FROM <table list> {WHERE <condition>} {ORDER BY <attribute_list>}`;
  - `SELECT DISTINCT Salary FROM EMPLOYEE`
  - `SELECT DISTINCT Address, Bdate, Ssn, Salary FROM EMPLOYEE WHERE Fname = "Jennifer" AND Lname = "Wallace"`
  - `SELECT fname, minit, lname, ssn, bdate, address, sex, salary, super_ssn, dno FROM employee, department WHERE Dname = "Headquarters" AND Dno = Dnumber`
  - `SELECT fname, minit, lname, ssn, bdate, address, sex, salary, super_ssn, dno FROM employee, department WHERE department.Dname = "Headquarters" AND employee.Dno = department.Dnumber`
  - `Select supervisore.fname, supervisore.lname from employee as e, employee as supervisore where e.fname = "John" AND e.super_ssn = supervisore.ssn;`

  Houston project details and department contorolling the project