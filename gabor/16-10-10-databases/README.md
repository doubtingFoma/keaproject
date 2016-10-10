# Nested queries

## Nested vs not nested:

  - `SELECT Fname, Lname FROM employee, department WHERE department.Dname = 'Headquarters' AND department.Dnumber = employee.Dno`

  - `SELECT Fname, Lname FROM employee WHERE Dno IN (select Dnumber from department Where dname = 'Headquarters')`

## Another example: 

The salary of employees who have at least one dependent:

  - `Select lname, salary from employee where ssn IN(Select essn from dependent)`

## Aggregation 

  - Aggregate functions are used to summarize information from multiple tuples into a single-tuple summary.
  - build-in aggregate aggregations: COUNT, MIN, MAX

Example: 

  - `SELECT max(salary) FROM employee where dno IN (select dnumber from department where dname = 'Administration')`
  - `SELECT count(distinct salary)FROM employee`