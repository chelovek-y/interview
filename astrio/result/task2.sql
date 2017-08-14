SELECT department.name FROM department, worker
WHERE department.id = worker.department_id
GROUP BY department.id
HAVING COUNT(worker.department_id) >5;


SELECT department.name, GROUP_CONCAT(worker.firstname) as names 
FROM department, worker
WHERE department.id = worker.department_id
GROUP BY department.id;