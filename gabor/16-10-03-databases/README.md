# SELECT queries

  - `SELECT Fname, Lname FROM employee, department where dnumber = dno and dname = 'Research'`

# Inner join

  - `SELECT Fname, Lname FROM employee join department on dnumber = dno where dname = 'Research'`
  - `SELECT pname FROM employee, project, works_on WHERE essn = ssn AND pnumber = pno AND fname = 'John'`
  - Inner join results better performance

# Inner join inner join

  - `SELECT pname FROM employee join works_on join project on ssn=essn and pnumber=pno WHERE fname = 'John'`

# 