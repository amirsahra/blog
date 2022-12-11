
-- part one
SELECT MAX(salary) as salary FROM employees;


-- part two
SELECT teams.name as team,
       employees.name as employees,
       employees.salary as salary
FROM employees
         INNER JOIN teams ON employees.team_id=teams.id
WHERE employees.salary=(SELECT MAX(salary) FROM employees where team_id=teams.id);
